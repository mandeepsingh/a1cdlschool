# A1 CDL School Website

Website for A1 CDL School, a CDL training school and third-party testing site in Dayton, Ohio.

The site comes in two versions built from the same files:

| Version | Where | Use it when |
| --- | --- | --- |
| **Plain HTML site** | Repository root (`*.html`, `css/`, `js/`, `assets/`) | Hosting as static files (GitHub Pages, Netlify, any web server) |
| **WordPress theme** | `wp-theme/a1cdlschool/` | Hosting on WordPress |

The plain HTML site is the source of truth. The WordPress theme is generated from it, so both versions look the same.

## Project structure

```
index.html, about.html, ...   Site pages
css/styles.css                All site styles
js/main.js                    Menu, scroll effects and form validation
assets/                       Images, logo and icons
robots.txt, sitemap.xml       Search engine files for the plain HTML site
llms.txt                      Site summary for AI assistants (the theme serves it at /llms.txt)
tools/build_wp_theme.py       Builds the WordPress theme from the HTML pages
tools/wp/functions.php        Source for the theme's functions.php
wp-theme/a1cdlschool/         Generated WordPress theme (committed)
```

## Plain HTML site

No build step is needed. Open `index.html` in a browser, or upload the root files (everything except `tools/` and `wp-theme/`) to any web host.

The contact form validates input in the browser and shows a thank-you message, but **it doesn't send anything yet**. To make it send requests, connect it to a form service such as Formspree or Netlify Forms; see the `TODO` in `js/main.js`.

## WordPress theme

### Install

1. Build the theme zip (see [Updating the site](#updating-the-site)). This creates `wp-theme/a1cdlschool.zip`.
2. In WordPress, go to **Appearance → Themes → Add New → Upload Theme**, choose the zip, then activate it.

On activation the theme creates any missing pages (Home, About Us, Contact, Pricing, CDL Testing, CDL School Training, Company Contract Training, Privacy Policy, Terms & Conditions) and sets Home as the front page.

### How it differs from the plain HTML site

- **Page content is built into the theme.** Editing these pages in the WordPress editor has no effect. To change their content, edit the HTML and rebuild. New pages created in WordPress use a simple layout that shows the editor content.
- **Links** use WordPress addresses, for example `/about/` instead of `about.html`. The privacy page is at `/privacy-policy/`.
- **The contact form sends email** to the site's admin email address (**Settings → General**). Many hosts don't deliver WordPress email reliably, so install an SMTP plugin such as WP Mail SMTP and send a test request after setup.
- **SEO tags:** each page keeps its title, description, social sharing tags and structured data. If an SEO plugin (Yoast, Rank Math, All in One SEO or SEOPress) is active, the theme leaves those tags to the plugin.

## Updating the site

1. Edit the HTML pages, `css/styles.css`, `js/main.js` or `assets/`. Theme-only PHP changes go in `tools/wp/functions.php`.
2. Rebuild the WordPress theme:

   ```
   python tools/build_wp_theme.py
   ```

   This needs Python 3 with Pillow (`pip install pillow`). It regenerates `wp-theme/a1cdlschool/` and `wp-theme/a1cdlschool.zip`.
3. Commit the HTML changes together with the regenerated theme, so the two versions stay in sync. The zip isn't committed.

Don't edit files in `wp-theme/a1cdlschool/` directly; the next build overwrites them.

## Before launch

- Prices on the program, testing and pricing pages are sample figures. Replace them with the school's real prices.
- If moving from the plain HTML site to WordPress on the same domain, redirect the old `.html` addresses to the new WordPress addresses.
