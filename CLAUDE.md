# Labnesia WordPress Theme — Panduan Pengembangan

## Arsitektur CSS: SATU FILE, BUKAN BANYAK

**Aturan terpenting:** CSS bersama (nav, footer, tombol, variabel warna) HANYA ditulis di `style.css`.
Setiap template PHP **tidak boleh** mengulang CSS yang sudah ada di `style.css`.

### style.css sudah memuat:
- CSS variables / design tokens (`:root { --navy, --teal, dll. }`)
- Reset & base (`*, html, body, img, a`)
- Nav: `.site-header`, `.nav-logo`, `.nav-links`, `.nav-cta`, `.nav-toggle`
- Buttons: `.btn-primary`, `.btn-ghost`, `.btn-teal`
- Section generics: `.site-section`, `.section-inner`, `.section-eyebrow`, `.section-title`
- Footer: `.site-footer`, `.footer-*`
- Form: `.form-group`, `.form-input`, `.form-label`, dll.
- Responsive breakpoints untuk nav

### Apa yang BOLEH ada di `<style>` dalam template PHP:
HANYA CSS yang unik untuk halaman tersebut dan tidak ada di `style.css`.
Tidak perlu menulis ulang `:root`, nav CSS, footer CSS, atau komponen yang sudah global.

### Cara kerja: style.css dimuat via `wp_head()`
Semua template memanggil `<?php wp_head(); ?>` — WordPress otomatis mengantrikan `style.css`.
Jadi CSS global tersedia di semua halaman tanpa perlu ditulis ulang.

---

## Struktur Template PHP

Setiap template adalah **self-contained** (tidak menggunakan get_header/get_footer).
Template wajib punya:

```php
<?php
/*
Template Name: Nama Halaman
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$url_home      = esc_url( home_url( '/' ) );
$url_kelas     = esc_url( home_url( '/kelas-pendampingan/' ) );
$url_gratis    = esc_url( home_url( '/mulai-gratis/' ) );
$url_faq       = esc_url( home_url( '/faq/' ) );
$url_inhouse   = esc_url( home_url( '/inhouse/' ) );
$url_pelatihan = esc_url( home_url( '/pelatihan-sertifikasi/' ) );
$url_optimasi  = esc_url( home_url( '/optimasi-alat/' ) );
$logo_url      = esc_url( get_template_directory_uri() . '/assets/logo/LOGO-LABNESIA-004.gif' );
?>
```

### Struktur HTML wajib:
```html
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Judul Halaman — Labnesia</title>
<?php wp_head(); ?>
<!-- <style> HANYA CSS unik halaman ini, tidak duplikasi dari style.css -->
</head>
<body <?php body_class('page-nama-halaman'); ?>>
<?php wp_body_open(); ?>

<!-- NAV (copy persis dari bawah) -->
<!-- KONTEN HALAMAN -->
<!-- FOOTER (copy persis dari bawah) -->

<?php wp_footer(); ?>
</body>
</html>
```

---

## Nav Standar (copy persis ini di semua template)

```html
<header class="site-header" id="site-header">
  <a class="nav-logo" href="<?php echo $url_home; ?>">
    <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;">
  </a>
  <nav class="nav-links" id="primary-nav">
    <a href="<?php echo $url_home; ?>">Beranda</a>
    <a href="<?php echo $url_kelas; ?>">Kelas Pendampingan</a>
    <a href="<?php echo $url_inhouse; ?>">Inhouse Training</a>
    <a href="<?php echo $url_pelatihan; ?>">Pelatihan Sertifikasi</a>
    <a href="<?php echo $url_optimasi; ?>">Optimasi Alat</a>
    <a href="<?php echo $url_faq; ?>">FAQ</a>
    <a href="<?php echo $url_gratis; ?>" class="nav-cta">Mulai Gratis</a>
  </nav>
  <button class="nav-toggle" id="nav-toggle" aria-label="Toggle menu">
    <svg viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</header>
```

---

## Footer Standar (copy persis ini di semua template)

```html
<footer class="site-footer">
  <div class="footer-inner" style="max-width:1100px;margin:0 auto;padding:40px 48px;display:grid;grid-template-columns:2fr 1fr 1fr;gap:48px">
    <div>
      <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;margin-bottom:16px;">
      <p style="color:rgba(255,255,255,0.5);font-size:14px;line-height:1.7;max-width:300px;">Membangun SDM Kompeten, Menguatkan Laboratorium Indonesia. Terakreditasi KAN.</p>
    </div>
    <div>
      <div style="color:rgba(255,255,255,0.3);font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px;">Program</div>
      <div style="display:flex;flex-direction:column;gap:10px;">
        <a href="<?php echo $url_kelas; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">Kelas Pendampingan</a>
        <a href="<?php echo $url_inhouse; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">Inhouse Training</a>
        <a href="<?php echo $url_pelatihan; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">Pelatihan &amp; Sertifikasi</a>
        <a href="<?php echo $url_optimasi; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">Optimasi Alat Lab</a>
        <a href="<?php echo $url_faq; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">FAQ &amp; Perbandingan</a>
      </div>
    </div>
    <div>
      <div style="color:rgba(255,255,255,0.3);font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px;">Kontak</div>
      <div style="color:rgba(255,255,255,0.6);font-size:14px;line-height:2;">
        📧 info@labnesia.id<br>
        📞 +62 821-7222-1567<br>
        📞 +62 851-8500-0367<br>
        📍 labnesia.id
      </div>
    </div>
  </div>
  <div style="border-top:1px solid rgba(255,255,255,0.08);padding:20px 48px;max-width:1100px;margin:0 auto;display:flex;justify-content:space-between;font-size:12px;color:rgba(255,255,255,0.3);">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <a href="https://labnesia.id" style="color:rgba(255,255,255,0.3);">labnesia.id</a>
  </div>
</footer>
```

---

## Daftar Halaman (Template Files)

| File | Template Name | Slug WordPress |
|------|---------------|----------------|
| `front-page.php` | (homepage otomatis) | `/` |
| `page-kelas-pendampingan.php` | Kelas Pendampingan | `/kelas-pendampingan/` |
| `page-inhouse.php` | Inhouse Training | `/inhouse/` |
| `page-pelatihan-sertifikasi.php` | Pelatihan Sertifikasi | `/pelatihan-sertifikasi/` |
| `page-optimasi-alat.php` | Optimasi Alat | `/optimasi-alat/` |
| `page-faq.php` | FAQ | `/faq/` |
| `page-mulai-gratis.php` | Mulai Gratis | `/mulai-gratis/` |
| `page-gap-analysis.php` | Gap Analysis | `/gap-analysis/` |

---

## Logo

File: `assets/logo/LOGO-LABNESIA-004.gif`
Ukuran tampil: `height:44px; width:auto; display:block;`
Selalu gunakan `$logo_url` (sudah di-`esc_url`). Jangan hardcode path.

---

## Deployment

- Git remote: GitHub (push dari lokal)
- Server: Hostinger SSH `u297990197@93.127.220.229 -p 65002`
- Remote path: `/home/u297990197/domains/palegreen-gorilla-158235.hostingersite.com/public_html/wp-content/themes/labnesia`
- Alur: edit lokal → `git add` → `git commit` → `git push` → SSH ke server → `git pull origin main`

---

## Kontak WhatsApp (untuk form/CTA)
- Endang: `+6282172221567` → `https://wa.me/6282172221567`
- Berryl: `+6285185000367`
