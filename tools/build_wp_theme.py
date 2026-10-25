"""Build the A1 CDL School WordPress theme from the static HTML site.

The static HTML pages stay the source of truth. Run this after editing them:

    python tools/build_wp_theme.py

Output: wp-theme/a1cdlschool/ (the theme) and wp-theme/a1cdlschool.zip (ready to upload).
"""
import re
import shutil
import zipfile
from pathlib import Path

from PIL import Image

ROOT = Path(__file__).resolve().parent.parent
OUT_DIR = ROOT / "wp-theme"
THEME = OUT_DIR / "a1cdlschool"
VERSION = "1.0.0"

# static page -> (template file, page key used by the theme)
PAGES = {
    "index": "front-page.php",
    "about": "page-about.php",
    "contact": "page-contact.php",
    "pricing": "page-pricing.php",
    "cdl-testing": "page-cdl-testing.php",
    "cdl-school-training": "page-cdl-school-training.php",
    "company-contract-training": "page-company-contract-training.php",
    "privacy": "page-privacy-policy.php",
    "terms": "page-terms.php",
    "404": "404.php",
}

# Shared header/footer come from a subpage, whose links all point at other pages
CHROME_SOURCE = "about"


def read(name):
    return (ROOT / f"{name}.html").read_text(encoding="utf-8")


def between(s, start, end):
    i = s.index(start)
    return s[i:s.index(end, i)]


def php_str(s):
    return "'" + s.replace("\\", "\\\\").replace("'", "\\'") + "'"


def url_call(func, key, frag=None):
    args = php_str(key) + (", " + php_str(frag) if frag else "")
    return f"<?php echo esc_url( {func}( {args} ) ); ?>"


def asset_call(path):
    return f"<?php echo esc_url( a1cdl_asset( {php_str(path)} ) ); ?>"


def rewrite_urls(s):
    """Point static links and asset paths at WordPress pages and theme files."""
    # Absolute URLs (meta tags, JSON-LD) stay absolute
    s = re.sub(r"https://a1cdlschool\.com/assets/([\w./-]+)", lambda m: asset_call(m[1]), s)
    s = re.sub(r"https://a1cdlschool\.com/(?:([\w-]+)\.html)?(?:#([\w-]+))?",
               lambda m: url_call("a1cdl_url", m[1] or "index", m[2]), s)
    # Relative links and assets in the markup
    s = re.sub(r'(href|src)="/?assets/([\w./-]+)"', lambda m: f'{m[1]}="{asset_call(m[2])}"', s)
    s = re.sub(r'href="/?([\w-]+)\.html(?:#([\w-]+))?"',
               lambda m: f'href="{url_call("a1cdl_link", m[1], m[2])}"', s)
    return s


def head_meta(page):
    """Page-specific head tags (description, Open Graph, JSON-LD); shared tags come from functions.php."""
    head = between(read(page), "<head>", "</head>")[len("<head>"):]
    for pat in [r"<meta charset[^>]*>", r'<meta name="viewport"[^>]*>', r"<title>.*?</title>",
                r'<link rel="(?:canonical|icon|apple-touch-icon|preconnect|stylesheet)"[^>]*>',
                r'<link href="https://fonts\.googleapis\.com[^>]*>']:
        head = re.sub(pat, "", head, flags=re.S)
    lines = [l for l in head.splitlines() if l.strip()]
    return rewrite_urls("\n".join(lines)) + "\n"


def page_title(page):
    return re.search(r"<title>(.*?)</title>", read(page), re.S)[1].strip()


def nav_key(href):
    if href.startswith("index.html#"):
        return href.split("#")[1]  # home / training
    return href[:-len(".html")]


def build_header():
    src = read(CHROME_SOURCE)
    body = between(src, "<body>", "<main")[len("<body>"):]
    # Drop this page's hard-coded active state; PHP decides it per request
    for marker in [' class="active" aria-current="page"', ' aria-current="page"', ' class="active"']:
        body = body.replace(marker, "")
    nav_start = body.index('<nav class="main-nav"')
    nav_end = body.index('class="btn btn-primary nav-cta"', nav_start)
    nav_end = body.rindex("<a href", nav_start, nav_end)  # stop before the nav's Get Started button
    nav = re.sub(r'<a href="([^"]+)"',
                 lambda m: f'<a href="{m[1]}"<?php a1cdl_nav_attrs( {php_str(nav_key(m[1]))} ); ?>',
                 body[nav_start:nav_end])
    body = body[:nav_start] + nav + body[nav_end:]
    body = re.sub(r'<a href="contact\.html" class="btn btn-primary (nav-cta|header-cta)"',
                  r'<a href="<?php echo esc_url( a1cdl_cta_url() ); ?>" class="btn btn-primary \1"', body)
    assert body.count("a1cdl_cta_url") == 2, "expected two Get Started buttons"
    body = rewrite_urls(body)
    return f"""<?php
/**
 * Site header: top bar and main navigation.
 *
 * @package A1CDLSchool
 */
?><!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
{body.rstrip()}

"""


def build_footer():
    src = read(CHROME_SOURCE)
    foot = between(src, "<!-- ============ Footer", "<script")
    foot = re.sub(r'<span id="year">\d+</span>',
                  '<span id="year"><?php echo esc_html( gmdate( \'Y\' ) ); ?></span>', foot)
    foot = rewrite_urls(foot)
    return f"""<?php
/**
 * Site footer.
 *
 * @package A1CDLSchool
 */
?>
  {foot.strip()}

  <?php wp_footer(); ?>
</body>

</html>
"""


FORM_OPEN = '<form class="contact-form reveal" id="contact-form" novalidate>'
FORM_SUCCESS = '<p class="form-success" role="status" hidden>'


def build_template(page):
    main = between(read(page), "<main", "</main>") + "</main>"
    if FORM_OPEN in main:
        main = main.replace(FORM_OPEN, (
            '<form class="contact-form reveal" id="contact-form" method="post" '
            'action="<?php echo esc_url( admin_url( \'admin-post.php\' ) ); ?>" novalidate>\n'
            "          <?php a1cdl_contact_form_fields(); ?>"))
        assert FORM_SUCCESS in main
        main = main.replace(FORM_SUCCESS, '<?php a1cdl_contact_form_error(); ?>\n          '
                            '<p class="form-success" role="status"<?php a1cdl_contact_form_success_attr(); ?>>')
    main = rewrite_urls(main)
    return f"""<?php
/**
 * Template for the {page_title(page)} page (generated from {page}.html).
 *
 * @package A1CDLSchool
 */

get_header();
?>

  {main}

<?php
get_footer();
"""


def build_js():
    js = (ROOT / "js" / "main.js").read_text(encoding="utf-8")
    start = js.index('  form.addEventListener("submit"')
    end = js.index("})();", start)
    js = js[:start] + """  // Let valid forms post to WordPress; block and focus the first invalid field otherwise
  form.addEventListener("submit", (e) => {
    const inputs = Object.keys(rules).map((n) => form.elements[n]);
    const results = inputs.map(validate);
    const firstInvalid = inputs[results.indexOf(false)];
    if (firstInvalid) { e.preventDefault(); firstInvalid.focus(); }
  });
""" + js[end:]
    js = js.replace('  const success = form.querySelector(".form-success");\n', "")
    return js


STYLE_CSS = f"""/*
Theme Name: A1 CDL School
Theme URI: https://a1cdlschool.com/
Author: A1 CDL School
Description: Custom theme for A1 CDL School in Dayton, Ohio. Generated from the static site by tools/build_wp_theme.py.
Version: {VERSION}
Requires at least: 6.0
Requires PHP: 7.4
License: All rights reserved
Text Domain: a1cdlschool
*/

/* Main styles live in css/styles.css. Additions for WordPress only go below. */

.form-error {{
  margin-top: 18px;
  padding: 14px 16px;
  border-radius: 8px;
  background: #fdecec;
  color: #a50f16;
  border: 1px solid #f5c2c4;
  font-weight: 600;
  font-size: 15px;
}}
"""

GENERIC_TEMPLATE = """<?php
/**
 * {doc}
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <section class="page-hero">
      <div class="container">
        <span class="rule"></span>
        <h1><?php the_title(); ?></h1>
      </div>
    </section>

    <section class="legal">
      <div class="container legal-body">
        <?php the_content(); ?>
      </div>
    </section>
    <?php endwhile; ?>
  </main>

<?php
get_footer();
"""


def build():
    if THEME.exists():
        shutil.rmtree(THEME)
    (THEME / "inc" / "head").mkdir(parents=True)
    shutil.copytree(ROOT / "assets", THEME / "assets")
    (THEME / "css").mkdir()
    shutil.copy(ROOT / "css" / "styles.css", THEME / "css" / "styles.css")
    (THEME / "js").mkdir()

    def write(rel, text):
        (THEME / rel).write_text(text, encoding="utf-8", newline="\n")

    write("style.css", STYLE_CSS)
    write("js/main.js", build_js())
    write("header.php", build_header())
    write("footer.php", build_footer())
    write("functions.php", (ROOT / "tools" / "wp" / "functions.php").read_text(encoding="utf-8"))
    write("page.php", GENERIC_TEMPLATE.format(doc="Default template for pages without their own template."))
    write("index.php", GENERIC_TEMPLATE.format(doc="Fallback template."))

    titles = []
    for page, template in PAGES.items():
        write(template, build_template(page))
        write(f"inc/head/{page}.php", head_meta(page))
        titles.append(f"\t{php_str(page)} => {php_str(page_title(page))},")
    write("inc/titles.php", "<?php\n/**\n * Document titles for each page (generated).\n *\n"
          " * @package A1CDLSchool\n */\n\nreturn array(\n" + "\n".join(titles) + "\n);\n")

    # Theme screenshot shown in Appearance > Themes (1200x900)
    shot = Image.open(ROOT / "assets" / "truck-photo-2.jpg").convert("RGB")
    w, h = shot.size
    scale = max(1200 / w, 900 / h)
    shot = shot.resize((round(w * scale), round(h * scale)), Image.LANCZOS)
    left, top = (shot.width - 1200) // 2, (shot.height - 900) // 2
    shot.crop((left, top, left + 1200, top + 900)).save(THEME / "screenshot.png", optimize=True)

    zip_path = OUT_DIR / "a1cdlschool.zip"
    with zipfile.ZipFile(zip_path, "w", zipfile.ZIP_DEFLATED) as z:
        for f in sorted(THEME.rglob("*")):
            if f.is_file():
                z.write(f, f.relative_to(OUT_DIR).as_posix())
    print(f"Built {THEME} and {zip_path}")


if __name__ == "__main__":
    build()
