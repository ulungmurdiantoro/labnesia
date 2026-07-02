<?php
/*
Template Name: Optimasi Alat Laboratorium
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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<style>

:root {
  --navy: #0B1F3A;
  --navy-mid: #122845;
  --navy-light: #1C3A60;
  --teal: #1A9E75;
  --teal-light: #22C28F;
  --teal-pale: #E8F7F2;
  --amber: #F5A623;
  --amber-pale: #FEF3DC;
  --white: #FFFFFF;
  --gray-50: #F8F9FA;
  --gray-100: #F1F3F5;
  --gray-200: #E9ECEF;
  --gray-400: #ADB5BD;
  --gray-600: #6C757D;
  --gray-800: #343A40;
  --red-pale: #FEF0F0;
  --red: #E53935;
  --font-display: 'Plus Jakarta Sans', sans-serif;
  --font-body: 'Plus Jakarta Sans', sans-serif;
  --font-serif: 'Lora', serif;
}
* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: var(--font-body); color: var(--gray-800); background: var(--white); line-height: 1.6; }
a { color: inherit; }
section { padding: 88px 48px; }
.wrap { max-width: 1160px; margin: 0 auto; }

/* NAV */
nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 100;
  background: rgba(11,31,58,0.97); backdrop-filter: blur(8px);
  padding: 0 48px; height: 64px;
  display: flex; align-items: center; justify-content: space-between;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}
.nav-logo { display: flex; align-items: center; gap: 10px; }
.nav-logo-mark {
  width: 36px; height: 36px; background: var(--teal);
  border-radius: 8px; display: flex; align-items: center; justify-content: center;
  font-weight: 800; color: white; font-size: 14px; letter-spacing: -0.5px;
}
.nav-logo-text { color: white; font-weight: 700; font-size: 18px; letter-spacing: -0.3px; }
.nav-logo-sub { color: rgba(255,255,255,0.45); font-size: 11px; font-weight: 400; display: block; margin-top: -2px; }
.nav-links { display: flex; align-items: center; gap: 32px; }
.nav-links a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 14px; font-weight: 500; transition: color .2s; }
.nav-links a:hover { color: white; }
.nav-links a.current { color: var(--teal-light); }
.nav-cta {
  background: var(--amber); color: var(--navy); padding: 8px 20px;
  border-radius: 8px; font-weight: 700; font-size: 14px;
  text-decoration: none; transition: all .2s;
}
.nav-cta:hover { background: #e09620; }
@media (max-width: 980px){ .nav-links{ display:none; } }

/* HERO */
.page-hero { background: var(--navy); padding: 104px 48px 64px; position: relative; overflow: hidden; }
.page-hero::before {
  content: ''; position: absolute; inset: 0; opacity: 0.04;
  background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0);
  background-size: 40px 40px;
}
.page-hero-inner { max-width: 1200px; margin: 0 auto; position: relative; }
.breadcrumb { display: flex; align-items: center; gap: 8px; margin-bottom: 24px; }
.breadcrumb a { color: rgba(255,255,255,0.4); text-decoration: none; font-size: 13px; }
.breadcrumb-sep { color: rgba(255,255,255,0.2); font-size: 13px; }
.breadcrumb-cur { color: rgba(255,255,255,0.7); font-size: 13px; }
.page-eyebrow {
  display: inline-flex; align-items: center; gap: 8px; background: rgba(26,158,117,0.15);
  border: 1px solid rgba(26,158,117,0.3); color: var(--teal-light);
  padding: 5px 14px; border-radius: 100px; font-size: 11px; font-weight: 700;
  letter-spacing: .08em; text-transform: uppercase; margin-bottom: 20px;
}
.page-eyebrow-dot { width: 5px; height: 5px; border-radius: 50%; background: var(--teal-light); animation: pulse 2s infinite; }
@keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: .4; } }
.page-hero h1 { font-size: 46px; line-height: 1.12; color: white; font-weight: 800; letter-spacing: -1.3px; margin-bottom: 18px; max-width: 760px; }
.page-hero h1 span { color: var(--teal-light); }
.page-hero-sub {
  font-family: var(--font-serif); font-style: italic; color: rgba(255,255,255,0.6);
  font-size: 16px; line-height: 1.65; max-width: 640px;
  border-left: 3px solid var(--teal); padding-left: 18px; margin-bottom: 28px;
}
.hero-actions { display: flex; gap: 14px; flex-wrap: wrap; }
.btn-primary {
  background: var(--amber); color: var(--navy); padding: 13px 26px; border-radius: 8px;
  font-weight: 700; font-size: 15px; text-decoration: none; display: inline-block; transition: all .2s;
}
.btn-primary:hover { background: #e09620; }
.btn-ghost {
  border: 1px solid rgba(255,255,255,0.25); color: white; padding: 13px 26px; border-radius: 8px;
  font-weight: 600; font-size: 15px; text-decoration: none; display: inline-block; transition: all .2s;
}
.btn-ghost:hover { background: rgba(255,255,255,0.08); }

/* FUNNEL */
.funnel {
  margin-top: 32px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);
  border-radius: 14px; padding: 18px 22px; display: flex; align-items: center; flex-wrap: wrap; gap: 10px;
}
.funnel-step { color: white; font-weight: 700; font-size: 14px; background: rgba(26,158,117,0.18); padding: 8px 16px; border-radius: 999px; }
.funnel-arrow { color: rgba(255,255,255,0.35); font-size: 16px; }
.funnel-note { width: 100%; color: rgba(255,255,255,0.55); font-size: 13px; margin-top: 14px; }

/* PRINCIPLE BAND */
.principle { background: var(--teal-pale); }
.principle .wrap { display: grid; grid-template-columns: 1.1fr 1fr; gap: 56px; align-items: center; }
.principle h2 { font-size: 28px; color: var(--navy); font-weight: 800; line-height: 1.3; }
.principle p { color: var(--gray-800); font-size: 15.5px; margin-top: 16px; }
.principle-quote {
  font-family: var(--font-serif); font-style: italic; color: var(--navy); font-size: 17px;
  border-left: 3px solid var(--teal); padding-left: 18px; line-height: 1.6;
}
.principle-card {
  background: white; border-radius: 14px; padding: 28px; box-shadow: 0 8px 24px rgba(11,31,58,0.06);
}
.principle-card .row { display: flex; gap: 14px; padding: 14px 0; border-bottom: 1px solid var(--gray-100); }
.principle-card .row:last-child { border-bottom: none; }
.principle-card .row .ico { font-size: 20px; }
.principle-card .row b { display: block; color: var(--navy); font-size: 14.5px; }
.principle-card .row span { color: var(--gray-600); font-size: 13.5px; }

/* LAB SECTION */
.lab-section { background: var(--gray-50); }
.section-head { text-align: center; max-width: 680px; margin: 0 auto 48px; }
.section-eyebrow { color: var(--teal); font-weight: 700; font-size: 13px; letter-spacing: 0.4px; text-transform: uppercase; }
.section-head h2 { font-size: 32px; color: var(--navy); font-weight: 800; margin-top: 10px; letter-spacing: -0.3px; }
.section-head p { color: var(--gray-600); font-size: 15.5px; margin-top: 12px; }

.lab-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px; }
@media (max-width: 860px){ .lab-grid{ grid-template-columns: 1fr; } }

details.lab-card {
  background: white; border: 1px solid var(--gray-200); border-radius: 14px; padding: 22px 24px;
  transition: border-color .2s, box-shadow .2s;
}
details.lab-card[open] { border-color: var(--teal); box-shadow: 0 10px 28px rgba(11,31,58,0.07); }
details.lab-card summary {
  cursor: pointer; list-style: none; display: flex; align-items: center; justify-content: space-between; gap: 14px;
}
details.lab-card summary::-webkit-details-marker { display: none; }
.lab-summary-left { display: flex; align-items: center; gap: 14px; }
.lab-icon {
  width: 44px; height: 44px; border-radius: 10px; background: var(--teal-pale);
  display: flex; align-items: center; justify-content: center; font-size: 22px; flex-shrink: 0;
}
.lab-title { font-weight: 700; color: var(--navy); font-size: 16.5px; }
.lab-tagline { color: var(--gray-600); font-size: 13px; margin-top: 2px; }
.chevron { font-size: 14px; transition: transform .2s; flex-shrink: 0; }
details.lab-card[open] .chevron { transform: rotate(180deg); }

.lab-body { margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--gray-100); }
.lab-row { margin-bottom: 14px; }
.lab-row:last-child { margin-bottom: 0; }
.lab-row b { display: block; font-size: 12.5px; color: var(--gray-600); text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 8px; }
.tag-list { display: flex; flex-wrap: wrap; gap: 6px; }
.tag {
  background: var(--gray-100); color: var(--gray-800); font-size: 12.5px; font-weight: 500;
  padding: 5px 11px; border-radius: 999px;
}
.tag.alat { background: var(--teal-pale); color: #0d6b51; }
.demand-text { color: var(--gray-800); font-size: 14px; line-height: 1.55; }
.connect-tag {
  display: inline-flex; align-items: center; gap: 6px; margin-top: 12px;
  background: var(--amber-pale); color: #8a5a05; font-size: 12.5px; font-weight: 600;
  padding: 7px 12px; border-radius: 8px;
}

.coming-soon-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px; margin-top: 18px; }
@media (max-width: 860px){ .coming-soon-grid{ grid-template-columns: 1fr; } }
.coming-card {
  border: 1px dashed var(--gray-400); border-radius: 14px; padding: 20px 24px;
  display: flex; align-items: center; gap: 14px; background: white;
}
.coming-card .lab-icon { background: var(--gray-100); opacity: 0.8; }
.coming-card b { color: var(--navy); font-size: 15px; }
.coming-card span { display: block; color: var(--gray-600); font-size: 13px; margin-top: 2px; }
.soon-badge { margin-left: auto; background: var(--gray-100); color: var(--gray-600); font-size: 11.5px; font-weight: 700; padding: 5px 10px; border-radius: 999px; white-space: nowrap; }

/* BRIDGE / CONNECT SECTION */
.bridge { background: var(--navy); color: white; }
.bridge .section-head h2, .bridge .section-head p { color: white; }
.bridge .section-head p { color: rgba(255,255,255,0.65); }
.bridge-note {
  max-width: 760px; margin: 0 auto 48px; text-align: center; color: rgba(255,255,255,0.7);
  font-size: 15px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);
  padding: 16px 22px; border-radius: 12px;
}
.stage-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
@media (max-width: 980px){ .stage-grid{ grid-template-columns: 1fr 1fr; } }
@media (max-width: 600px){ .stage-grid{ grid-template-columns: 1fr; } }
.stage-card {
  background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px;
  padding: 22px; position: relative;
}
.stage-num { color: var(--teal-light); font-weight: 800; font-size: 13px; letter-spacing: 0.4px; }
.stage-card h3 { font-size: 16.5px; margin-top: 10px; font-weight: 700; }
.stage-card p { font-size: 13.5px; color: rgba(255,255,255,0.6); margin-top: 8px; line-height: 1.55; }
.stage-program {
  display: inline-block; margin-top: 14px; font-size: 12.5px; font-weight: 700; color: var(--navy);
  background: var(--teal-light); padding: 6px 11px; border-radius: 7px;
}
.stage-connector { display: none; }
@media (min-width: 981px){
  .stage-card:not(:last-child)::after {
    content: '→'; position: absolute; right: -20px; top: 50%; transform: translateY(-50%);
    color: rgba(255,255,255,0.25); font-size: 18px;
  }
}

/* CTA STEPS */
.cta-steps { background: var(--gray-50); }
.steps-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-top: 36px; }
@media (max-width: 860px){ .steps-grid{ grid-template-columns: 1fr; } }
.cta-card { background: white; border: 1px solid var(--gray-200); border-radius: 14px; padding: 26px; }
.cta-card .ico { font-size: 24px; }
.cta-card h4 { color: var(--navy); font-size: 16px; margin-top: 12px; font-weight: 700; }
.cta-card p { color: var(--gray-600); font-size: 14px; margin-top: 8px; }
.cta-card a.link { display: inline-block; margin-top: 14px; color: var(--teal); font-weight: 700; font-size: 14px; text-decoration: none; }

/* FOOTER */
footer { background: var(--navy-mid); color: rgba(255,255,255,0.6); padding: 64px 48px 24px; }
.footer-grid { max-width: 1160px; margin: 0 auto; display: grid; grid-template-columns: 1.6fr 1fr 1fr 1fr; gap: 40px; }
.footer-brand p { font-size: 13.5px; line-height: 1.7; margin-top: 14px; }
.footer-col h4 { color: white; font-size: 13.5px; margin-bottom: 14px; }
.footer-col a { display: block; color: rgba(255,255,255,0.55); text-decoration: none; font-size: 13.5px; margin-bottom: 10px; }
.footer-col a:hover { color: white; }
.footer-bottom {
  max-width: 1160px; margin: 48px auto 0; padding-top: 24px; border-top: 1px solid rgba(255,255,255,0.08);
  display: flex; justify-content: space-between; font-size: 12.5px; flex-wrap: wrap; gap: 10px;
}
.footer-bottom a { color: rgba(255,255,255,0.6); }
@media (max-width: 860px){ .footer-grid{ grid-template-columns: 1fr 1fr; } }

@media (max-width: 600px){
  section { padding: 64px 22px; }
  .hero { padding: 120px 22px 56px; }
  .hero h1 { font-size: 30px; }
  .principle .wrap { grid-template-columns: 1fr; gap: 28px; }
}
</style>
</head>
<body <?php body_class( 'page-optimasi-alat' ); ?>>
<?php wp_body_open(); ?>

<nav>
  <div class="nav-logo">
    <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;">
  </div>
    <div class="nav-links">
    <a href="<?php echo $url_home; ?>">Beranda</a>
    <a href="<?php echo $url_kelas; ?>">Kelas Pendampingan</a>
    <a href="<?php echo $url_inhouse; ?>">Inhouse Training</a>
    <a href="<?php echo $url_pelatihan; ?>">Pelatihan Sertifikasi</a>
    <a href="<?php echo $url_optimasi; ?>">Optimasi Alat</a>
    <a href="<?php echo $url_faq; ?>">FAQ</a>
    <a href="<?php echo $url_gratis; ?>" class="nav-cta">Mulai Gratis</a>
  </div>
</nav>

<!-- HERO -->
<header class="page-hero" id="optimasi-alat">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo $url_home; ?>">Beranda</a>
      <span class="breadcrumb-sep">›</span>
      <span class="breadcrumb-cur">Optimasi Alat</span>
    </div>
    <div class="page-eyebrow"><div class="page-eyebrow-dot"></div> <?php labnesia_icon( 'microscope', 'var(--teal-light)', 13 ); ?> Insight Khusus Pemilik Lab</div>
    <h1>Alat Lab Anda Sudah Ada.<br>Tinggal Dipetakan Jadi <span>Layanan & Income.</span></h1>
    <p class="page-hero-sub">Setiap jenis laboratorium punya alat dan ruang lingkup yang berbeda — karena itu kebutuhan optimasinya juga berbeda. Pilih jenis lab Anda di bawah, kenali demand khasnya, lalu hubungkan ke jalur program Labnesia yang sudah berjalan.</p>
    <div class="hero-actions">
      <a href="#jenis-lab" class="btn-primary">Pilih Jenis Lab Saya <?php labnesia_icon( 'arrow-down', 'var(--navy)', 14 ); ?></a>
      <a href="<?php echo $url_gratis; ?>" class="btn-ghost">Mulai dari Gap Analysis Gratis</a>
    </div>

    <div class="funnel">
      <div class="funnel-step">Punya Alat</div><div class="funnel-arrow"><?php labnesia_icon( 'arrow-right', 'rgba(255,255,255,0.35)', 16 ); ?></div>
      <div class="funnel-step">Parameter Uji</div><div class="funnel-arrow"><?php labnesia_icon( 'arrow-right', 'rgba(255,255,255,0.35)', 16 ); ?></div>
      <div class="funnel-step">Produk</div><div class="funnel-arrow"><?php labnesia_icon( 'arrow-right', 'rgba(255,255,255,0.35)', 16 ); ?></div>
      <div class="funnel-step">Layanan</div><div class="funnel-arrow"><?php labnesia_icon( 'arrow-right', 'rgba(255,255,255,0.35)', 16 ); ?></div>
      <div class="funnel-step">Income</div>
      <div class="funnel-note">Alur ini sama untuk semua jenis lab — yang berbeda hanya alat, parameter, dan pasarnya. Detail tiap bidang dibahas tuntas di rangkaian Webinar Nasional Labnesia 2026.</div>
    </div>
  </div>
</header>

<!-- PRINCIPLE BAND -->
<section class="principle">
  <div class="wrap">
    <div>
      <h2>Ini bukan layanan baru — ini cara pandang.</h2>
      <p>"Optimasi Alat" bukan paket atau produk terpisah dari Labnesia. Ini adalah sudut pandang untuk membaca <i>demand</i> tiap jenis laboratorium, yang ujungnya tetap kembali ke jalur yang sama: Gap Analysis, Kelas Pendampingan, hingga akreditasi ISO/IEC 17025.</p>
      <p style="margin-top:14px;">Tujuannya supaya Anda tidak bingung memilih layanan — cukup kenali bidang lab Anda, lihat demand khasnya, lalu masuk ke program yang sudah ada.</p>
    </div>
    <div class="principle-card">
      <div class="row"><div class="ico"><?php labnesia_icon( 'settings', 'var(--teal)', 20 ); ?></div><div><b>Instrumen = Aset</b><span>Bukan sekadar barang inventaris, tapi modal layanan.</span></div></div>
      <div class="row"><div class="ico"><?php labnesia_icon( 'clipboard-list', 'var(--teal)', 20 ); ?></div><div><b>Parameter = Produk</b><span>Tiap parameter uji yang bisa dijual ke pelanggan.</span></div></div>
      <div class="row"><div class="ico"><?php labnesia_icon( 'building-2', 'var(--teal)', 20 ); ?></div><div><b>Lab = Unit Layanan</b><span>Dikelola dengan sistem mutu, bukan sekadar ruang praktikum.</span></div></div>
      <div class="row"><div class="ico"><?php labnesia_icon( 'compass', 'var(--teal)', 20 ); ?></div><div><b>Demand = Penentu Jalur</b><span>Jenis lab Anda menentukan parameter, pasar, dan kebutuhan optimasinya.</span></div></div>
    </div>
  </div>
</section>

<!-- LAB GRID -->
<section class="lab-section" id="jenis-lab">
  <div class="wrap">
    <div class="section-head">
      <div class="section-eyebrow">Pilih Bidang Laboratorium Anda</div>
      <h2>Ruang Lingkup & Alat per Jenis Lab</h2>
      <p>Klik salah satu untuk melihat ruang lingkup, contoh alat utama, dan demand optimasi yang biasa muncul di bidang tersebut.</p>
    </div>

    <div class="lab-grid">

      <details class="lab-card" name="lab-jenis" open>
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon"><?php labnesia_icon( 'seedling', 'var(--teal)', 22 ); ?></div>
            <div><div class="lab-title">Lab Lingkungan</div><div class="lab-tagline">Air, udara, tanah & limbah</div></div>
          </div>
          <div class="chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 14 ); ?></div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Air bersih & minum</span><span class="tag">Air limbah</span><span class="tag">Udara ambien</span><span class="tag">Tanah & sedimen</span><span class="tag">Mikrobiologi air</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">pH / DO / Turbidity meter</span><span class="tag alat">Spektrofotometer UV-Vis</span><span class="tag alat">AAS</span><span class="tag alat">GC-MS / HPLC</span><span class="tag alat">Autoclave & Inkubator</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Banyak lab kampus sudah punya alat dasar lingkungan, tapi belum memetakan parameter mana yang bisa dijual ke industri, DLH, atau PDAM sebagai layanan rutin.</p></div>
          <div class="connect-tag"><?php labnesia_icon( 'arrow-turn-down', '#8a5a05', 12 ); ?> Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card" name="lab-jenis">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon"><?php labnesia_icon( 'construction', 'var(--teal)', 22 ); ?></div>
            <div><div class="lab-title">Lab Sipil</div><div class="lab-tagline">Material & struktur konstruksi</div></div>
          </div>
          <div class="chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 14 ); ?></div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Beton</span><span class="tag">Tanah</span><span class="tag">Agregat</span><span class="tag">Aspal & hotmix</span><span class="tag">Baja tulangan</span><span class="tag">Paving block</span><span class="tag">Kayu konstruksi</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Alat uji kuat tekan/tarik</span><span class="tag alat">CBR test set</span><span class="tag alat">Sieve shaker</span><span class="tag alat">Alat uji Marshall</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Demand datang dari proyek konstruksi & kontraktor yang butuh hasil uji material cepat dan diakui — peluang besar untuk lab kampus jadi rujukan uji daerah.</p></div>
          <div class="connect-tag"><?php labnesia_icon( 'arrow-turn-down', '#8a5a05', 12 ); ?> Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card" name="lab-jenis">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon"><?php labnesia_icon( 'utensils', 'var(--teal)', 22 ); ?></div>
            <div><div class="lab-title">Lab Pangan, Gizi & Halal</div><div class="lab-tagline">Mutu, gizi & kehalalan produk</div></div>
          </div>
          <div class="chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 14 ); ?></div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Kandungan gizi</span><span class="tag">Mutu pangan</span><span class="tag">Keamanan pangan</span><span class="tag">Kehalalan produk</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Instrumen analisis nutrisi</span><span class="tag alat">PCR (deteksi DNA babi)</span><span class="tag alat">AAS (logam berat)</span><span class="tag alat">GC / HPLC (pengawet, gula)</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Industri pangan & UMKM butuh bukti gizi, keamanan, dan sertifikasi halal sebelum produk bisa naik kelas ke pasar yang lebih luas.</p></div>
          <div class="connect-tag"><?php labnesia_icon( 'arrow-turn-down', '#8a5a05', 12 ); ?> Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card" name="lab-jenis">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon"><?php labnesia_icon( 'wheat', 'var(--teal)', 22 ); ?></div>
            <div><div class="lab-title">Lab Pertanian & Pascapanen</div><div class="lab-tagline">Mutu hasil panen & alsintan</div></div>
          </div>
          <div class="chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 14 ); ?></div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Mutu fisik & kimia hasil panen</span><span class="tag">Pupuk</span><span class="tag">Tanah & media tanam</span><span class="tag">Kinerja alat mesin pertanian</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">UV-Vis, HPLC, GC-MS</span><span class="tag alat">AAS / ICP-OES</span><span class="tag alat">Moisture analyzer & NIR</span><span class="tag alat">Sensor uji alsintan (load cell, torque meter)</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Lab pascapanen punya peluang ganda: menjual paket uji mutu produk ke petani/agribisnis, sekaligus menguji performa mesin — bukan cuma sampelnya.</p></div>
          <div class="connect-tag"><?php labnesia_icon( 'arrow-turn-down', '#8a5a05', 12 ); ?> Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card" name="lab-jenis">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon"><?php labnesia_icon( 'pills', 'var(--teal)', 22 ); ?></div>
            <div><div class="lab-title">Lab Farmasi</div><div class="lab-tagline">Mutu & keamanan obat</div></div>
          </div>
          <div class="chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 14 ); ?></div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Bahan baku</span><span class="tag">Produk jadi</span><span class="tag">Uji stabilitas</span><span class="tag">Validasi/verifikasi metode</span><span class="tag">Zat aktif & impuritas</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">AAS / ICP (logam berat)</span><span class="tag alat">HPLC / GC (senyawa organik & zat aktif)</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Industri farmasi & herbal sangat bergantung pada data valid untuk menjamin mutu, keamanan, dan khasiat produk sebelum beredar.</p></div>
          <div class="connect-tag"><?php labnesia_icon( 'arrow-turn-down', '#8a5a05', 12 ); ?> Cocok mulai dari: Kelas Pendampingan + Kelas Lanjutan</div>
        </div>
      </details>

      <details class="lab-card" name="lab-jenis">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon"><?php labnesia_icon( 'flask', 'var(--teal)', 22 ); ?></div>
            <div><div class="lab-title">Lab Kimia</div><div class="lab-tagline">Riset, sintesis & QC industri</div></div>
          </div>
          <div class="chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 14 ); ?></div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Riset & sintesis senyawa</span><span class="tag">QC/QA industri</span><span class="tag">Analisis logam & senyawa organik</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Instrumen analitik umum</span><span class="tag alat">LIMS (manajemen data uji)</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Lab kimia kampus sering dipakai untuk riset internal saja, padahal berpeluang jadi Tempat Uji Kompetensi dan melayani industri sekitar.</p></div>
          <div class="connect-tag"><?php labnesia_icon( 'arrow-turn-down', '#8a5a05', 12 ); ?> Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card" name="lab-jenis">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon"><?php labnesia_icon( 'cow', 'var(--teal)', 22 ); ?></div>
            <div><div class="lab-title">Lab Peternakan</div><div class="lab-tagline">Mutu pakan & kesehatan ternak</div></div>
          </div>
          <div class="chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 14 ); ?></div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Mutu pakan (proksimat & energi)</span><span class="tag">Mineral mikro ternak</span><span class="tag">Kontaminasi biologis/kimiawi</span><span class="tag">Residu obat</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Instrumen analisis proksimat</span><span class="tag alat">Instrumen mineral</span><span class="tag alat">Alat deteksi kontaminan biologis/kimiawi</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Industri pakan dan peternakan butuh kepastian mutu pakan serta jaminan bebas residu sebelum produk ternak beredar ke pasar.</p></div>
          <div class="connect-tag"><?php labnesia_icon( 'arrow-turn-down', '#8a5a05', 12 ); ?> Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card" name="lab-jenis">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon"><?php labnesia_icon( 'fish', 'var(--teal)', 22 ); ?></div>
            <div><div class="lab-title">Lab Perikanan</div><div class="lab-tagline">Mutu, ekspor & genetik produk laut</div></div>
          </div>
          <div class="chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 14 ); ?></div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Mikrobiologi (keamanan pangan)</span><span class="tag">Kimia & proksimat</span><span class="tag">Residu & kontaminan (ekspor)</span><span class="tag">Genetik / molekuler (eDNA)</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Nanodrop & RT-/Digital PCR</span><span class="tag alat">MALDI-TOF</span><span class="tag alat">GC-MS / LC-HRMS</span><span class="tag alat">ICP-AES</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Ekspor produk perikanan menuntut paket uji lengkap dan status lab acuan resmi — peluang besar untuk lab dengan instrumen canggih tapi utilisasi rendah.</p></div>
          <div class="connect-tag"><?php labnesia_icon( 'arrow-turn-down', '#8a5a05', 12 ); ?> Cocok mulai dari: Kelas Pendampingan + Kelas Lanjutan</div>
        </div>
      </details>

    </div>

    <div class="coming-soon-grid">
      <div class="coming-card">
        <div class="lab-icon"><?php labnesia_icon( 'petri-dish', 'var(--gray-600)', 22 ); ?></div>
        <div><b>Lab Biologi & Mikrobiologi</b><span>Webinar tematik · 4 Juli 2026</span></div>
        <div class="soon-badge">Segera Hadir</div>
      </div>
      <div class="coming-card">
        <div class="lab-icon"><?php labnesia_icon( 'ruler', 'var(--gray-600)', 22 ); ?></div>
        <div><b>Lab Kalibrasi</b><span>Webinar tematik · 11 Juli 2026</span></div>
        <div class="soon-badge">Segera Hadir</div>
      </div>
    </div>
  </div>
</section>

<!-- BRIDGE TO EXISTING PROGRAMS -->
<section class="bridge">
  <div class="wrap">
    <div class="section-head">
      <div class="section-eyebrow" style="color:var(--teal-light)">Bagaimana Ini Terhubung</div>
      <h2>Dari Demand Lab Anda, Kembali ke Jalur yang Sama</h2>
      <p>Apa pun bidang lab Anda, langkahnya tetap mengikuti peta perjalanan akreditasi Labnesia yang sudah berjalan.</p>
    </div>
    <div class="bridge-note">Tidak ada paket "Optimasi Alat" terpisah. Yang berbeda hanya <i>pintu masuknya</i> — disesuaikan dengan ruang lingkup dan alat di bidang lab Anda.</div>

    <div class="stage-grid">
      <div class="stage-card">
        <div class="stage-num">TAHAP 1</div>
        <h3>Kenali Posisi Lab</h3>
        <p>Petakan alat, parameter, dan ruang lingkup yang sudah dimiliki lab Anda saat ini.</p>
        <div class="stage-program">Gap Analysis Gratis</div>
      </div>
      <div class="stage-card">
        <div class="stage-num">TAHAP 2</div>
        <h3>Bangun Sistem & Dokumen</h3>
        <p>Ubah parameter uji dan SOP alat menjadi dokumen mutu serta paket layanan yang siap dijual.</p>
        <div class="stage-program">Kelas Pendampingan</div>
      </div>
      <div class="stage-card">
        <div class="stage-num">TAHAP 3</div>
        <h3>Siap Diaudit</h3>
        <p>Audit kelayakan instrumen, simulasi asesmen, hingga pendaftaran KAN.</p>
        <div class="stage-program">Kelas Lanjutan / Full Pendampingan</div>
      </div>
      <div class="stage-card">
        <div class="stage-num">TAHAP 4</div>
        <h3>Jaga Mutu Tiap Tahun</h3>
        <p>Review berkala kompetensi alat & SDM agar status akreditasi tetap terjaga.</p>
        <div class="stage-program">Annual Partnership</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA STEPS -->
<section class="cta-steps">
  <div class="wrap">
    <div class="section-head">
      <div class="section-eyebrow">Mulai Dari Mana?</div>
      <h2>Tiga Langkah Sederhana</h2>
      <p>Tidak ada tekanan. Mulai dari yang gratis, rasakan manfaatnya, lalu putuskan langkah berikutnya bersama kami.</p>
    </div>
    <div class="steps-grid">
      <div class="cta-card">
        <div class="ico"><?php labnesia_icon( 'target', 'var(--teal)', 24 ); ?></div>
        <h4>1. Pilih jenis lab Anda</h4>
        <p>Lihat ruang lingkup & alat khas bidang Anda di daftar di atas, lalu kenali demand optimasinya.</p>
        <a href="#jenis-lab" class="link">Lihat daftar jenis lab <?php labnesia_icon( 'arrow-right', 'var(--teal)', 14 ); ?></a>
      </div>
      <div class="cta-card">
        <div class="ico"><?php labnesia_icon( 'clipboard-list', 'var(--teal)', 24 ); ?></div>
        <h4>2. Daftar Gap Analysis Gratis</h4>
        <p>Dapatkan laporan gap dokumen & teknis, penetapan ruang lingkup, dan roadmap implementasi.</p>
        <a href="<?php echo $url_gratis; ?>" class="link">Daftar Gap Analysis <?php labnesia_icon( 'arrow-right', 'var(--teal)', 14 ); ?></a>
      </div>
      <div class="cta-card">
        <div class="ico"><?php labnesia_icon( 'handshake', 'var(--teal)', 24 ); ?></div>
        <h4>3. Lanjut sesuai roadmap</h4>
        <p>Masuk ke Kelas Pendampingan atau konsultasikan dulu kebutuhan lab Anda bersama tim kami.</p>
        <a href="<?php echo $url_kelas; ?>" class="link">Lihat Kelas Pendampingan <?php labnesia_icon( 'arrow-right', 'var(--teal)', 14 ); ?></a>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="nav-logo" style="margin-bottom:16px">
        <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;">
      </div>
      <p>Membangun SDM Kompeten, Menguatkan Laboratorium Indonesia. Terakreditasi Komite Akreditasi Nasional (KAN).</p>
      <p style="margin-top:16px;font-size:13px;line-height:1.8;"><?php labnesia_icon( 'mail', 'rgba(255,255,255,.9)', 13 ); ?> info@labnesia.id<br><?php labnesia_whatsapp_link( '6282172221567', '+62 821-7222-1567 (Endang)', 'rgba(255,255,255,.9)', 13 ); ?><br><?php labnesia_whatsapp_link( '6285185000367', '+62 851-8500-0367 (Berryl)', 'rgba(255,255,255,.9)', 13 ); ?><br><?php labnesia_whatsapp_link( '62811399523', '+62 811-399-523 (Kintan)', 'rgba(255,255,255,.9)', 13 ); ?><br><?php labnesia_icon( 'map-pin', 'rgba(255,255,255,.9)', 13 ); ?> labnesia.id</p>
    </div>
    <div class="footer-col">
      <h4>Mulai Gratis</h4>
      <a href="<?php echo $url_gratis; ?>">Gap Analysis Gratis</a>
      <a href="#">Webinar Lab Talk</a>
      <a href="#">Download Panduan</a>
      <a href="#">Komunitas Lab</a>
    </div>
    <div class="footer-col">
      <h4>Program</h4>
      <a href="<?php echo $url_pelatihan; ?>">Pelatihan & Sertifikasi</a>
      <a href="<?php echo $url_kelas; ?>">Kelas Pendampingan</a>
      <a href="<?php echo $url_inhouse; ?>">Full Pendampingan</a>
      <a href="<?php echo $url_optimasi; ?>">Optimasi Alat per Bidang</a>
    </div>
    <div class="footer-col">
      <h4>Tentang</h4>
      <a href="<?php echo $url_faq; ?>">FAQ</a>
      <a href="#">Para Pakar</a>
      <a href="#">Alumni & Testimoni</a>
      <a href="#">Hubungi Kami</a>
    </div>
  </div>
    <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <span><a href="https://labnesia.id">labnesia.id</a></span>
  </div>
</footer>

<?php labnesia_floating_cta(); ?>

<script>
  window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 50) { nav.style.borderBottomColor = 'rgba(255,255,255,0.12)'; }
    else { nav.style.borderBottomColor = 'rgba(255,255,255,0.08)'; }
  });
</script>

<?php wp_footer(); ?>
</body>
</html>
