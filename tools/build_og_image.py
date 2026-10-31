"""Build the social share image (assets/og-image.jpg, 1200x630) from the hero truck photo.

    python tools/build_og_image.py

Run tools/build_wp_theme.py afterwards so the theme gets the new image.
"""
from pathlib import Path

from PIL import Image, ImageDraw, ImageFont

ROOT = Path(__file__).resolve().parent.parent
ASSETS = ROOT / "assets"
W, H = 1200, 630
DARK = (17, 19, 24)
RED = (227, 27, 35)

PHOTO = "truck-photo-3.png"
PHOTO_WIDTH = 850  # photo is scaled to this width and pinned to the right edge
PHOTO_TOP = 0.24   # share of the extra height cropped from the top

FONT_DIRS = [Path("C:/Windows/Fonts"), Path("/Library/Fonts"), Path("/usr/share/fonts/truetype/msttcorefonts")]


def font(name, size):
    for d in FONT_DIRS:
        if (d / name).exists():
            return ImageFont.truetype(str(d / name), size)
    raise FileNotFoundError(f"Font {name} not found in {FONT_DIRS}")


def build():
    img = Image.new("RGB", (W, H), DARK)

    # Truck photo on the right
    photo = Image.open(ASSETS / PHOTO).convert("RGB")
    ph = round(photo.height * PHOTO_WIDTH / photo.width)
    photo = photo.resize((PHOTO_WIDTH, ph), Image.LANCZOS)
    top = round((ph - H) * PHOTO_TOP)
    img.paste(photo.crop((0, top, PHOTO_WIDTH, top + H)), (W - PHOTO_WIDTH, 0))

    # Dark fade from the left so the text stays readable
    fade = Image.new("L", (W, 1))
    solid, clear = W - PHOTO_WIDTH + 20, 880
    for x in range(W):
        t = min(max((x - solid) / (clear - solid), 0), 1)
        fade.putpixel((x, 0), round(255 * (1 - t) ** 1.6))
    img = Image.composite(Image.new("RGB", (W, H), DARK), img, fade.resize((W, H)))

    logo = Image.open(ASSETS / "logo-white.png")
    logo = logo.resize((420, round(logo.height * 420 / logo.width)), Image.LANCZOS)
    img.paste(logo, (70, 92), logo)

    d = ImageDraw.Draw(img)
    d.text((72, 382), "Class A & B CDL Training", font=font("arialbd.ttf", 46), fill="white", anchor="ls")
    d.rectangle((72, 423, 134, 429), fill=RED)
    small = font("arial.ttf", 24)
    d.text((72, 474), "Dayton, Ohio  \u00b7  (937) 618-5304", font=small, fill=(214, 216, 222), anchor="ls")
    d.text((72, 516), "a1cdlschool.com", font=small, fill=(214, 216, 222), anchor="ls")

    img.save(ASSETS / "og-image.jpg", quality=86, optimize=True, progressive=True)
    print(f"Built {ASSETS / 'og-image.jpg'}")


if __name__ == "__main__":
    build()
