# Handoff: Icon System Upgrade & Spacing Tightening — Labnesia.id

## Overview
This handoff covers two changes made in the design system exploration that should now be applied back to the **real Labnesia WordPress theme** (the `labnesia/` codebase — `front-page.php`/`index.php`, `page-*.php`, `style.css`, `assets/css/animations.css`, `assets/js/main.js`):

1. **Icon system upgrade**: replace every emoji used as an icon (in tiles, checklists, badges, and inline near CTAs) with a professional **Lucide** icon, recolored to match the brand palette (navy/teal/amber/white).
2. **Spacing tightening**: reduce the generous whitespace across sections/cards so pages read denser and more "product," not just marketing filler.

Emoji used purely as content punctuation in copy/testimonials (none currently exist) are unaffected — this only touches emoji that stood in for icons.

## About the design files
The bundled `.jsx`/`.html` files in this package are **design references** built in a design-system prototyping tool (React components + plain HTML demo pages) — **not code to paste directly into WordPress**. Labnesia's real site is PHP templates with plain CSS and vanilla JS (see `functions.php`, `front-page.php`, `assets/js/main.js` in the theme). Your task is to **recreate the same visual result — the icon technique and the spacing values — inside that existing PHP/CSS/JS environment**, following its conventions (inline `<style>` blocks per page-template, `:root` CSS custom properties in `style.css`, vanilla JS in `assets/js/main.js`), not to introduce React/JSX into the WordPress theme.

## Fidelity
**High-fidelity.** Icon names, colors, sizes, and spacing deltas below are exact — implement them as specified, not approximated.

---

## 1. Icon System

### Technique
Icons are **Lucide** (MIT-licensed, thin 2px stroke), loaded as flat SVG files from the `lucide-static` CDN and recolored with a CSS `mask-image` so they always render in the exact brand color needed (teal/navy/white) regardless of the source SVG's own stroke color:

```css
.icon {
  display: inline-block;
  width: 20px; height: 20px;         /* per-usage size */
  background-color: var(--teal);     /* the color you want the icon to be */
  -webkit-mask-image: url('https://unpkg.com/lucide-static@latest/icons/check.svg');
  mask-image: url('https://unpkg.com/lucide-static@latest/icons/check.svg');
  -webkit-mask-size: contain; mask-size: contain;
  -webkit-mask-repeat: no-repeat; mask-repeat: no-repeat;
  -webkit-mask-position: center; mask-position: center;
}
```

For self-hosting instead of the CDN (recommended for production — avoids a third-party runtime dependency): download the needed `.svg` files from https://lucide.dev into `assets/icons/` and point `mask-image`/`src` at the local path instead of the unpkg URL.

**Two usage patterns**, matching `components/core/IconTile.jsx` and `components/core/Icon.jsx` in this bundle:
- **IconTile** — a circular or rounded-square tile (64px default, white or `rgba(255,255,255,.06)` fill, bordered) with one centered icon at ~46% of the tile size. Used for problem-section cards, give-value cards, funnel/journey steps, and download cards.
- **Icon** (bare) — a plain inline glyph (14–20px, no tile) used inside buttons, badges, checklists, and comparison-table cells.

### Emoji → Icon mapping
Replace every occurrence of these emoji (all found in `front-page.php`/`index.php`, `page-mulai-gratis.php`, `page-kelas-pendampingan.php`, `page-faq.php`) with the mapped Lucide icon name:

| Old emoji | Context | Lucide icon name |
|---|---|---|
| 💸 | "Biaya konsultan terlalu mahal" (problem card) | `banknote` |
| 😕 | "Tidak tahu harus mulai dari mana" (problem card) | `compass` |
| ⏳ | "Proses terlalu lama & tidak jelas" (problem card) | `hourglass` |
| 👤 | "Bergantung pada satu orang saja" (problem card) | `user` |
| 🏢 | "Proses pengadaan instansi yang panjang" (problem card) | `building-2` |
| 🤔 | "Belum yakin dengan kualitas program" (problem card) | `search` |
| 📋 | Gap Analysis / checklist give-cards | `clipboard-list` |
| 🎓 | Webinar / Kuliah Praktisi / Pelatihan give-cards, journey step | `graduation-cap` |
| 📥 | Download Panduan give-card | `download` |
| ⚡ | Bootcamp 1 Hari give-card | `zap` |
| 💬 | Komunitas Lab / live-chat give-card | `message-circle` |
| 🏆 | "Laboratorium Terakreditasi" journey goal step | `trophy` |
| 🎯 | Funnel step 1 ("Kenali posisi lab Anda") | `target` |
| 🤝 | Funnel step 2 ("Pilih program yang tepat") | `handshake` |
| 🎤 | Webinar Lab Talk (mulai-gratis page) | `mic` |
| ✦ | Leading "100% Gratis" / "Give Value First" badge marker | `sparkles` |
| ✓ (as icon, not as prose) | Checklist items, output lists, trust-row checks, journey "done" dot, comparison-table yes | `check` (or `check-circle-2` for a bigger confirmation) |
| ✗ | Comparison-table "no" cells | `x` |
| ★ | "Featured"/"Terpopuler" ribbons, journey "active" dot | `star` |
| → | Trailing arrow on primary CTA buttons, "answer" reveal lines | `arrow-right` |
| ⌄ / ▾ | FAQ accordion chevron | `chevron-down` |
| 📧 | Footer/contact email | `mail` |
| 📞 | Footer/contact phone | `phone` |
| 📍 | Footer/contact address | `map-pin` |

Leave decorative/non-icon emoji as-is if any are found elsewhere (there weren't any at last read — everything emoji-based in this theme is functioning as an icon).

### Color rules
- On **white/gray-50 cards**: icon color = `var(--teal)` by default (matches the "positive/accent" brand color), unless the icon is inside a red-topped problem card, where it can stay teal too (the red is just the card's top accent stripe, not the icon color).
- On **navy backgrounds** (hero, give-section, funnel): icon color = `#ffffff` or `rgba(255,255,255,.9)`.
- Inside a **primary/teal button**: icon color = the button's text color (navy on amber, white on teal).
- Journey-map dots: `done` = white icon on teal circle; `active` = navy icon on amber circle; `locked` keeps a plain step number (no icon).

---

## 2. Spacing Tightening

Apply these reductions in `style.css` (and the matching inline `<style>` blocks duplicated per page template — `page-mulai-gratis.php`, `page-faq.php`, `page-inhouse.php`, etc., all currently repeat the same values):

| Token / selector | Old value | New value |
|---|---|---|
| `.site-section` padding (desktop) | `96px 48px` | `56px 48px` |
| `.site-section` padding (mobile, `max-width:768px`) | `64px 24px` | `48px 24px` |
| `.hero` top padding | `140px 48px 80px` | `120px 48px 56px` |
| `.hero-inner` grid `gap` | `80px` | `44px` |
| `.problem-grid`, `.give-grid`, `.product-cards` `gap` | `20px` | `16px` |
| `.problem-card`, `.give-card`, `.product-card-body` padding | `28px` | `20–22px` |
| `.give-header` `margin-bottom` | `64px` | `32px` |
| `.stats-row` `margin-bottom` | `56px` | `28px` |
| `.journey-step` padding | `14px 16px` | `11px 14px` |
| `.journey-step` `margin-bottom` | `8px` | `6px` |
| FAQ accordion (`.faq-item` question) padding | `18px 22px` | `15px 20px` |

General rule of thumb applied: **cut large section/hero paddings by ~35–40%, grid gaps and card-internal padding by ~20–25%, and small component paddings (badges, journey rows, accordion rows) by ~15%.** Don't touch type sizes, colors, radii, or border widths — only the spacing scale.

---

## Files in this bundle (reference only — do not import directly into WordPress)
All reference source files are saved with a `.txt` suffix (e.g. `Icon.jsx.txt`) so they're inert documentation, not live source — open them in any text editor to read the code.
- `components/core/Icon.jsx.txt` — bare recolorable icon (the CSS mask technique, in component form)
- `components/core/IconTile.jsx.txt` — tiled icon (circle/rounded, light/dark tone)
- `components/core/Button.jsx.txt` — button with optional leading/trailing icon
- `components/feedback/Badge.jsx.txt` — status pill with optional leading icon
- `components/data-display/JourneyStep.jsx.txt`, `ProductCard.jsx.txt`, `FaqAccordion.jsx.txt` — components that embed icons in place of the old Unicode marks
- `guidelines/brand-iconography.html` — small specimen card showing the new icon tiles
- `ui_kits/website/HomeScreen.jsx.txt`, `FaqScreen.jsx.txt`, `MulaiGratisScreen.jsx.txt`, `index.html` — full click-through recreation of the 3 main pages with both changes applied (use these to see the target look/spacing side-by-side)
- `styles.css`, `tokens/*.css` — the design system's token values (colors, spacing scale, radii) for cross-reference

## Assets
No new binary assets — icons are fetched as SVG from `https://unpkg.com/lucide-static@latest/icons/<name>.svg` (or self-host by downloading the same files into `assets/icons/`). No other new images/logos are introduced by this change.

## Suggested implementation order
1. Add the `.icon`/`.icon-tile` CSS mask utility classes to `style.css`.
2. Sweep `front-page.php`/`index.php` first (highest-traffic page): replace each emoji span with `<span class="icon" style="--icon-url:url(.../check.svg)"></span>` (or a small PHP helper `labnesia_icon($name, $color, $size)` that echoes the markup — recommended, since the same icon+color combo repeats often).
3. Apply the same swap to `page-mulai-gratis.php`, `page-kelas-pendampingan.php`, `page-faq.php`, `page-inhouse.php`, `page-pelatihan-sertifikasi.php`, `page-optimasi-alat.php`, `footer.php` (contact icons).
4. Apply the spacing table above to `style.css` `@media`-safe, then re-check each page template's inline `<style>` block for the same literal values (they currently duplicate `style.css` per-page rather than referencing it).
5. Visually diff each page against `ui_kits/website/index.html` in this bundle before/after.
