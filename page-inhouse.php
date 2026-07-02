<?php
/*
Template Name: Inhouse Training
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
  :root{--navy:#0B1F3A;--navy-light:#1C3A60;--teal:#1A9E75;--teal-light:#22C28F;--teal-pale:#E8F7F2;--teal-dark:#085041;--amber:#F5A623;--amber-pale:#FEF3DC;--white:#FFFFFF;--gray-50:#F8F9FA;--gray-100:#F1F3F5;--gray-200:#E9ECEF;--gray-400:#ADB5BD;--gray-600:#6C757D;--gray-800:#343A40;--font-display:'Plus Jakarta Sans',sans-serif;--font-serif:'Lora',serif}
  *{box-sizing:border-box;margin:0;padding:0}
  html{scroll-behavior:smooth}
  body{font-family:var(--font-display);color:var(--gray-800);background:var(--white);line-height:1.6}

  nav{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(11,31,58,0.97);backdrop-filter:blur(8px);padding:0 48px;height:64px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08)}
  .nav-logo{display:flex;align-items:center;gap:10px}
  .nav-logo-mark{width:36px;height:36px;background:var(--teal);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;color:white;font-size:14px}
  .nav-logo-text{color:white;font-weight:700;font-size:18px}
  .nav-logo-sub{color:rgba(255,255,255,0.45);font-size:11px;display:block;margin-top:-2px}
  .nav-links{display:flex;align-items:center;gap:22px}
  .nav-links a{color:rgba(255,255,255,0.7);text-decoration:none;font-size:13px;font-weight:500;transition:color .2s}
  .nav-links a:hover{color:white}
  .nav-back{color:rgba(255,255,255,0.5)!important;display:flex;align-items:center;gap:6px}
  .nav-cta{background:var(--amber);color:var(--navy)!important;padding:8px 18px;border-radius:8px;font-weight:700;font-size:13px;text-decoration:none}

  .page-hero{background:var(--navy);padding:104px 48px 64px;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero-inner{max-width:1200px;margin:0 auto;position:relative}
  .breadcrumb{display:flex;align-items:center;gap:8px;margin-bottom:24px}
  .breadcrumb a{color:rgba(255,255,255,0.4);text-decoration:none;font-size:13px}
  .breadcrumb-sep{color:rgba(255,255,255,0.2);font-size:13px}
  .breadcrumb-cur{color:rgba(255,255,255,0.7);font-size:13px}
  .page-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 14px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-eyebrow-dot{width:5px;height:5px;border-radius:50%;background:var(--teal-light);animation:pulse 2s infinite}
  @keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}
  .page-hero h1{font-size:44px;font-weight:800;color:white;line-height:1.15;letter-spacing:-1.2px;margin-bottom:18px;max-width:700px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-family:var(--font-serif);font-style:italic;color:rgba(255,255,255,0.6);font-size:16px;line-height:1.65;max-width:600px;border-left:3px solid var(--teal);padding-left:18px}

  /* SPLIT SELECTOR */
  .split-section{padding:0;background:var(--gray-50)}
  .split-inner{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:0;position:relative}
  .split-card{padding:48px 48px;position:relative;cursor:pointer;transition:all .2s}
  .split-card.left{background:var(--navy);color:white}
  .split-card.right{background:var(--teal-dark);color:white}
  .split-vs{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);background:white;width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;color:var(--navy);box-shadow:0 4px 16px rgba(0,0,0,0.15);z-index:2}
  .split-eyebrow{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;opacity:.6;margin-bottom:10px}
  .split-title{font-size:26px;font-weight:800;line-height:1.2;margin-bottom:12px}
  .split-desc{font-size:14px;opacity:.7;line-height:1.6;margin-bottom:20px}
  .split-for{display:flex;align-items:center;gap:8px;background:rgba(255,255,255,0.1);border-radius:8px;padding:10px 14px;font-size:13px;font-weight:600}
  .split-arrow-link{display:inline-flex;align-items:center;gap:6px;margin-top:18px;font-size:13px;font-weight:700;color:white;text-decoration:none}

  section{padding:64px 48px}
  .section-inner{max-width:1200px;margin:0 auto}
  .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}
  .h2{font-size:32px;font-weight:800;color:var(--navy);line-height:1.18;letter-spacing:-0.7px;margin-bottom:14px}
  .body-text{font-size:15px;color:var(--gray-600);line-height:1.7}

  /* SECTION A: FULL PENDAMPINGAN */
  .section-anchor{scroll-margin-top:80px}
  .section-tag-blue{display:inline-block;background:rgba(11,31,58,0.08);color:var(--navy);font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:5px 14px;border-radius:6px;margin-bottom:14px}
  .section-tag-teal{display:inline-block;background:var(--teal-pale);color:var(--teal-dark);font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:5px 14px;border-radius:6px;margin-bottom:14px}

  .package-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:32px}
  .package-card{border:1.5px solid var(--gray-200);border-radius:18px;overflow:hidden;transition:all .2s}
  .package-card:hover{border-color:var(--navy);box-shadow:0 8px 28px rgba(11,31,58,0.1)}
  .package-card.featured{border-color:var(--amber);box-shadow:0 8px 28px rgba(245,166,35,0.15)}
  .package-header{padding:22px;background:var(--navy);color:white;position:relative}
  .package-header.featured-h{background:linear-gradient(135deg,#0B1F3A,#1C3A60)}
  .package-badge{position:absolute;top:14px;right:14px;background:var(--amber);color:var(--navy);font-size:9px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:4px}
  .package-eyebrow{font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;opacity:.6;margin-bottom:6px}
  .package-name{font-size:18px;font-weight:800;margin-bottom:4px}
  .package-price{font-size:22px;font-weight:800;color:var(--amber)}
  .package-unit{font-size:12px;opacity:.6;font-weight:400}
  .package-body{padding:22px}
  .package-feature{display:flex;align-items:flex-start;gap:9px;margin-bottom:10px}
  .pf-check{color:var(--teal);font-size:14px;flex-shrink:0;margin-top:2px}
  .pf-text{font-size:13px;color:var(--gray-600);line-height:1.5}
  .package-hok{background:var(--gray-50);border-radius:8px;padding:10px 12px;margin-top:14px;text-align:center}
  .hok-label{font-size:10px;color:var(--gray-500);text-transform:uppercase;letter-spacing:.05em}
  .hok-val{font-size:16px;font-weight:800;color:var(--navy)}

  /* COMPARISON A */
  .comp-mini-table{width:100%;border-collapse:collapse;margin-top:24px;font-size:13px}
  .comp-mini-table th{padding:10px 16px;text-align:left;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--gray-500);border-bottom:2px solid var(--gray-200)}
  .comp-mini-table td{padding:12px 16px;border-bottom:1px solid var(--gray-100)}
  .comp-mini-table td:first-child{font-weight:600;color:var(--navy)}
  .comp-mini-table tr:last-child td{border-bottom:none}
  .comp-highlight{background:rgba(245,166,35,0.06)}

  /* SECTION B: ANNUAL PARTNERSHIP */
  .annual-section{background:var(--teal-pale)}
  .annual-tier-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:32px}
  .annual-tier{background:white;border:1.5px solid var(--gray-200);border-radius:16px;overflow:hidden;transition:all .2s}
  .annual-tier:hover{border-color:var(--teal);transform:translateY(-2px)}
  .annual-tier.best{border-color:var(--teal);box-shadow:0 8px 28px rgba(26,158,117,0.15)}
  .annual-tier-header{padding:20px;text-align:center;border-bottom:1px solid var(--gray-100)}
  .annual-tier-best-badge{background:var(--teal);color:white;font-size:9px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;padding:3px 10px;border-radius:100px;display:inline-block;margin-bottom:10px}
  .annual-tier-name{font-size:18px;font-weight:800;color:var(--navy);margin-bottom:4px}
  .annual-tier-desc{font-size:12px;color:var(--gray-500)}
  .annual-tier-price-row{padding:18px 20px;text-align:center;background:var(--gray-50)}
  .annual-tier-normal{font-size:12px;color:var(--gray-400);text-decoration:line-through}
  .annual-tier-final{font-size:24px;font-weight:800;color:var(--teal-dark)}
  .annual-tier-unit{font-size:11px;color:var(--gray-500)}
  .annual-tier-body{padding:20px}
  .annual-feature{display:flex;align-items:flex-start;gap:8px;margin-bottom:9px;font-size:12.5px;color:var(--gray-600);line-height:1.5}
  .annual-check{color:var(--teal);flex-shrink:0;margin-top:2px}

  /* INDIVIDUAL PARTNERSHIP */
  .indiv-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:32px}
  .indiv-card{border-radius:16px;padding:24px;border:1.5px solid var(--gray-200);background:white}
  .indiv-card.gold{border-color:var(--amber);background:var(--amber-pale)}
  .indiv-tier-name{font-size:18px;font-weight:800;color:var(--navy);margin-bottom:6px}
  .indiv-price{font-size:26px;font-weight:800;color:var(--teal-dark);margin-bottom:14px}
  .indiv-card.gold .indiv-price{color:#8B5800}
  .indiv-price span{font-size:13px;font-weight:400;color:var(--gray-500)}

  /* WHY US */
  .why-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:32px}
  .why-card{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:14px;padding:22px}
  .why-icon{font-size:28px;margin-bottom:12px}
  .why-title{font-size:15px;font-weight:700;color:var(--navy);margin-bottom:6px}
  .why-desc{font-size:13px;color:var(--gray-600);line-height:1.55}

  /* CTA SPLIT */
  .cta-split-section{background:var(--navy);position:relative;overflow:hidden}
  .cta-split-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.2) 0%,transparent 60%)}
  .cta-split-inner{max-width:1000px;margin:0 auto;text-align:center;position:relative}
  .cta-split-title{font-size:32px;font-weight:800;color:white;margin-bottom:14px;letter-spacing:-0.7px}
  .cta-split-sub{font-size:15px;color:rgba(255,255,255,0.6);margin-bottom:32px}
  .cta-split-actions{display:grid;grid-template-columns:1fr 1fr;gap:16px}
  .cta-action-card{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:14px;padding:24px;text-align:left;text-decoration:none;transition:all .2s}
  .cta-action-card:hover{background:rgba(255,255,255,0.1);border-color:rgba(26,158,117,0.4)}
  .cta-action-tag{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--teal-light);margin-bottom:8px}
  .cta-action-title{font-size:16px;font-weight:700;color:white;margin-bottom:6px}
  .cta-action-desc{font-size:13px;color:rgba(255,255,255,0.45);line-height:1.5}

  footer{background:var(--navy);padding:40px 48px;border-top:1px solid rgba(255,255,255,0.08)}
  .footer-bottom{max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;font-size:13px;color:rgba(255,255,255,0.4);flex-wrap:wrap;gap:10px}
  .footer-bottom a{color:rgba(255,255,255,0.35);text-decoration:none}
</style>
</head>
<body <?php body_class( 'page-inhouse' ); ?>>
<?php wp_body_open(); ?>

<nav>
  <div class="nav-logo">
    <a href="<?php echo $url_home; ?>" style="display:flex;align-items:center;gap:10px;text-decoration:none">
      <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;">
    </a>
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

<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo $url_home; ?>">Beranda</a>
      <span class="breadcrumb-sep">›</span>
      <span class="breadcrumb-cur">In House Training &amp; Pendampingan Private</span>
    </div>
    <div class="page-eyebrow"><div class="page-eyebrow-dot"></div> Untuk Institusi &amp; Laboratorium</div>
    <h1>Solusi Privat untuk<br>Lab Anda — <span class="accent">Membangun</span> atau <span class="accent">Menjaga</span>.</h1>
    <p class="page-hero-sub">Dua kebutuhan yang berbeda, dua solusi yang tepat. Lab yang belum terakreditasi butuh dibangun sistemnya. Lab yang sudah terakreditasi butuh dijaga statusnya.</p>
  </div>
</div>

<!-- SPLIT SELECTOR -->
<div class="split-section">
  <div class="split-inner">
    <div class="split-vs">ATAU</div>
    <a href="#bangun" class="split-card left" style="text-decoration:none;color:white">
      <div class="split-eyebrow">Belum Terakreditasi</div>
      <div class="split-title">Full Pendampingan<br>(In House)</div>
      <div class="split-desc">Lab Anda belum punya sistem mutu sama sekali, atau prosesnya berhenti di tengah jalan. Kami bangun dari nol hingga siap akreditasi.</div>
      <div class="split-for"><?php labnesia_icon( 'target', '#ffffff', 14 ); ?> Tujuan: <strong>Mendapatkan</strong> akreditasi</div>
      <span class="split-arrow-link">Lihat paket Full Pendampingan <?php labnesia_icon( 'arrow-down', '#ffffff', 13 ); ?></span>
    </a>
    <a href="#jaga" class="split-card right" style="text-decoration:none;color:white">
      <div class="split-eyebrow">Sudah Terakreditasi</div>
      <div class="split-title">Annual Partnership<br>(Kemitraan Tahunan)</div>
      <div class="split-desc">Lab Anda sudah terakreditasi, tapi perlu mempertahankan status setiap tahun dan menjaga kompetensi SDM yang terus berganti.</div>
      <div class="split-for"><?php labnesia_icon( 'shield-check', '#ffffff', 14 ); ?> Tujuan: <strong>Mempertahankan</strong> akreditasi</div>
      <span class="split-arrow-link">Lihat paket Annual Partnership <?php labnesia_icon( 'arrow-down', '#ffffff', 13 ); ?></span>
    </a>
  </div>
</div>

<!-- SECTION A: FULL PENDAMPINGAN -->
<section class="section-anchor" id="bangun">
  <div class="section-inner">
    <span class="section-tag-blue"><?php labnesia_icon( 'construction', 'var(--navy)', 12 ); ?> Untuk Lab yang Belum Terakreditasi</span>
    <h2 class="h2">Full Pendampingan (In House)<br>— Privat, Dari Nol hingga Akreditasi.</h2>
    <p class="body-text" style="max-width:620px">Bimbingan langsung dari tim ahli untuk membangun atau menyempurnakan sistem manajemen laboratorium — ISO/IEC 17025:2017, GLP, ISO 9001, ISO 45001 (K3), ISO 14001 (Lingkungan). Dilakukan privat, khusus untuk lab Anda, di lokasi Anda.</p>

    <div class="package-grid">
      <div class="package-card">
        <div class="package-header">
          <div class="package-eyebrow">Tahap 5 Saja · Privat</div>
          <div class="package-name">Kelas Lanjutan Privat</div>
          <div class="package-price">Rp 36 jt <span class="package-unit">/lab</span></div>
        </div>
        <div class="package-body">
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Untuk lab yang sudah selesai Tahap 1–4 (Kelas Pendampingan publik)</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Pendampingan pendaftaran akreditasi</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Pendampingan audit kelayakan</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Persiapan &amp; simulasi asesmen</div></div>
          <div class="package-hok"><div class="hok-label">Output</div><div class="hok-val">Siap Asesmen</div></div>
        </div>
      </div>

      <div class="package-card featured">
        <div class="package-header featured-h">
          <div class="package-badge"><?php labnesia_icon( 'star', 'var(--navy)', 9 ); ?> Lengkap</div>
          <div class="package-eyebrow">Tahap 1–5 · Privat Penuh</div>
          <div class="package-name">Full Pendampingan</div>
          <div class="package-price">Rp 150–200 jt <span class="package-unit">/lab</span></div>
        </div>
        <div class="package-body">
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Diagnosis awal hingga pendaftaran akreditasi — seluruh tahap</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Dipandu langsung oleh tim pakar berpengalaman</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Penguatan sistem manajemen &amp; kompetensi teknis</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Audit internal &amp; evaluasi manajemen lengkap</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Free akses webinar &amp; bootcamp sepanjang tahun</div></div>
          <div class="package-hok"><div class="hok-label">Output</div><div class="hok-val">Siap Akreditasi Penuh</div></div>
        </div>
      </div>

      <div class="package-card">
        <div class="package-header">
          <div class="package-eyebrow">Per Tema · Modular</div>
          <div class="package-name">IHT Tematik</div>
          <div class="package-price">Mulai 12,5 jt <span class="package-unit">/tema</span></div>
        </div>
        <div class="package-body">
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Pilih tema spesifik sesuai kebutuhan: GLP, ISO 9001, ISO 45001, ISO 14001</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Cocok untuk lab yang sudah maju di sebagian sistem</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Bisa dikombinasikan dengan beberapa tema sekaligus</div></div>
          <div class="package-feature"><div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div><div class="pf-text">Fleksibel sesuai HOK (Hari Orang Kerja) yang dibutuhkan</div></div>
          <div class="package-hok"><div class="hok-label">Estimasi</div><div class="hok-val">2–5 HOK/tema</div></div>
        </div>
      </div>
    </div>

    <table class="comp-mini-table">
      <thead>
        <tr><th>Aspek</th><th>Kelas Lanjutan</th><th class="comp-highlight">Full Pendampingan <?php labnesia_icon( 'star', 'var(--teal)', 11 ); ?></th><th>IHT Tematik</th></tr>
      </thead>
      <tbody>
        <tr><td>Cakupan</td><td>Tahap 5 saja</td><td class="comp-highlight">Tahap 1–5 lengkap</td><td>Per tema spesifik</td></tr>
        <tr><td>Cocok untuk</td><td>Sudah selesai Kelas Pendampingan publik</td><td class="comp-highlight">Belum mulai sama sekali</td><td>Sudah punya sebagian sistem</td></tr>
        <tr><td>Durasi</td><td>2–3 bulan</td><td class="comp-highlight">6–12 bulan</td><td>Sesuai HOK yang dipilih</td></tr>
        <tr><td>Output</td><td>Siap asesmen</td><td class="comp-highlight">Siap akreditasi penuh</td><td>Sistem tema terkait selesai</td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- SECTION B: ANNUAL PARTNERSHIP -->
<section class="annual-section section-anchor" id="jaga">
  <div class="section-inner">
    <span class="section-tag-teal"><?php labnesia_icon( 'shield-check', 'var(--teal-dark)', 12 ); ?> Untuk Lab yang Sudah Terakreditasi</span>
    <h2 class="h2">Annual Partnership<br>— Pastikan Tetap Terakreditasi, Setiap Tahun.</h2>
    <p class="body-text" style="max-width:620px">"Lab Anda sudah terakreditasi? Pastikan tetap terakreditasi tahun depan, tahun depannya lagi, dan seterusnya — tanpa perlu memulai dari awal." Satu paket, dua manfaat: <strong>untuk lab</strong> (pendampingan surveillance &amp; review sistem) dan <strong>untuk SDM Anda</strong> (akses event sepanjang tahun + pelatihan premium berskema).</p>

    <!-- TWO BENEFIT PILLARS -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:32px;margin-bottom:8px">
      <div style="background:white;border:1px solid var(--gray-200);border-radius:12px;padding:18px 20px;display:flex;gap:14px;align-items:flex-start">
        <span style="flex-shrink:0"><?php labnesia_icon( 'building-2', 'var(--teal)', 24 ); ?></span>
        <div>
          <p style="font-size:13px;font-weight:700;color:var(--navy);margin-bottom:4px">Untuk Lab Anda</p>
          <p style="font-size:12.5px;color:var(--gray-600);line-height:1.5">Pendampingan onsite, review sistem mutu, dan kesiapan menghadapi surveillance — akreditasi tetap terjaga setiap tahun.</p>
        </div>
      </div>
      <div style="background:white;border:1px solid var(--gray-200);border-radius:12px;padding:18px 20px;display:flex;gap:14px;align-items:flex-start">
        <span style="font-size:24px;flex-shrink:0"><?php labnesia_icon( 'users', 'var(--navy)', 24 ); ?></span>
        <div>
          <p style="font-size:13px;font-weight:700;color:var(--navy);margin-bottom:4px">Untuk SDM Lab Anda</p>
          <p style="font-size:12.5px;color:var(--gray-600);line-height:1.5">Akses webinar &amp; bootcamp sepanjang tahun, plus pelatihan premium berskema untuk personel — kompetensi tim tetap terjaga meski ada pergantian SDM.</p>
        </div>
      </div>
    </div>

    <div class="annual-tier-grid" style="grid-template-columns:repeat(2,1fr);max-width:760px;margin-left:auto;margin-right:auto">
      <div class="annual-tier">
        <div class="annual-tier-header">
          <div class="annual-tier-name">Surveillance Lite</div>
          <div class="annual-tier-desc">Untuk lab dengan kebutuhan dasar</div>
        </div>
        <div class="annual-tier-price-row">
          <div class="annual-tier-final">Rp 36 jt</div>
          <div class="annual-tier-unit">per tahun</div>
        </div>
        <div class="annual-tier-body">
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><strong>5 HOK</strong> pendampingan onsite — fokus kesiapan surveillance</div>
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Review dokumen mutu tahunan</div>
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Akses webinar &amp; bootcamp sepanjang tahun untuk seluruh tim</div>
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><strong>1 tema pelatihan premium</strong> + akses uji kompetensi terkait, untuk 1 personel</div>
        </div>
      </div>

      <div class="annual-tier best">
        <div class="annual-tier-header">
          <div class="annual-tier-best-badge"><?php labnesia_icon( 'star', '#ffffff', 9 ); ?> Direkomendasikan</div>
          <div class="annual-tier-name">Surveillance Pro</div>
          <div class="annual-tier-desc">Untuk lab dengan kebutuhan lebih intensif</div>
        </div>
        <div class="annual-tier-price-row">
          <div class="annual-tier-final">Rp 70 jt</div>
          <div class="annual-tier-unit">per tahun</div>
        </div>
        <div class="annual-tier-body">
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><strong>10 HOK</strong> pendampingan onsite — review menyeluruh sistem &amp; teknis</div>
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Review dokumen mutu + pendampingan audit internal tahunan</div>
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Akses webinar &amp; bootcamp sepanjang tahun untuk seluruh tim</div>
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><strong>2 tema pelatihan premium</strong> + akses uji kompetensi terkait, untuk 2 personel</div>
          <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Prioritas penjadwalan konsultasi</div>
        </div>
      </div>
    </div>

    <p style="font-size:13px;color:var(--gray-600);background:var(--gray-50);border:1px solid var(--gray-200);border-radius:8px;padding:12px 16px;margin-top:16px;line-height:1.6">
      <?php labnesia_icon( 'info', 'var(--gray-600)', 13 ); ?> Biaya menyesuaikan dengan besaran ruang lingkup laboratorium dan rekomendasi terbaik untuk penyelesaian temuan dan optimalisasi sistem mutu laboratorium.
    </p>

    <p style="font-size:13px;color:var(--gray-600);margin-top:16px;text-align:center">Butuh skema institusional untuk kebutuhan lebih besar (multi-lab, multi-kampus)? <a href="#kontak" style="color:var(--teal-dark);font-weight:600">Hubungi tim kami untuk paket on-demand <?php labnesia_icon( 'arrow-right', 'var(--teal-dark)', 13 ); ?></a></p>

    <!-- INDIVIDUAL -->
    <h3 style="font-size:20px;font-weight:800;color:var(--navy);margin-top:48px;margin-bottom:8px">Kemitraan Individu</h3>
    <p class="body-text" style="margin-bottom:20px">Untuk profesional lab yang ingin akses berkelanjutan secara personal, bukan atas nama institusi.</p>
    <div class="indiv-grid">
      <div class="indiv-card">
        <div class="indiv-tier-name"><?php labnesia_icon( 'medal', '#9AA5B1', 17 ); ?> Silver</div>
        <div class="indiv-price">Rp 7 jt <span>/tahun</span></div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Akses webinar &amp; bootcamp sepanjang tahun</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><strong>1 pelatihan</strong> + akses uji kompetensi (1 skema)</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><strong>3 pelatihan premium</strong></div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Template dokumen dasar</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Forum diskusi VIP</div>
      </div>
      <div class="indiv-card gold">
        <div class="indiv-tier-name"><?php labnesia_icon( 'medal', '#8B5800', 17 ); ?> Gold</div>
        <div class="indiv-price">Rp 13 jt <span>/tahun</span></div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Semua benefit Silver</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Akses webinar & bootcamp sepanjang tahun</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><strong>2 pelatihan</strong> + akses uji kompetensi (2 skema)</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>5 pelatihan premium</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Template dokumen dasar</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>Forum diskusi VIP</div>
        <div class="annual-feature"><span class="annual-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span>2 sesi konsultasi privat dengan pakar</div>
      </div>
    </div>
  </div>
</section>

<!-- WHY US -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Mengapa Privat Bersama Labnesia</p>
    <h2 class="h2">Bukan sekadar konsultan,<br>tapi mitra jangka panjang.</h2>
    <div class="why-grid">
      <div class="why-card">
        <div class="why-icon"><?php labnesia_icon( 'teacher', 'var(--teal)', 28 ); ?></div>
        <div class="why-title">Praktik Langsung dari Pakarnya</div>
        <div class="why-desc">Dibimbing oleh praktisi berpengalaman dengan pendekatan sistematis — bukan hanya konsultan teori.</div>
      </div>
      <div class="why-card">
        <div class="why-icon"><?php labnesia_icon( 'chart', 'var(--teal)', 28 ); ?></div>
        <div class="why-title">Progress Terpantau, Timeline Terkontrol</div>
        <div class="why-desc">Pendampingan dipantau tim internal dengan dukungan administratif yang rapi dan transparan.</div>
      </div>
      <div class="why-card">
        <div class="why-icon"><?php labnesia_icon( 'target', 'var(--teal)', 28 ); ?></div>
        <div class="why-title">Output Jelas, Outcome Berdampak</div>
        <div class="why-desc">Program dirancang untuk memberikan hasil nyata bagi laboratorium dan institusi Anda.</div>
      </div>
      <div class="why-card">
        <div class="why-icon"><?php labnesia_icon( 'money-bag', 'var(--teal)', 28 ); ?></div>
        <div class="why-title">Skema Disesuaikan Anggaran</div>
        <div class="why-desc">Biaya terjangkau dan fleksibel — disesuaikan dengan anggaran dan kebutuhan laboratorium Anda.</div>
      </div>
      <div class="why-card">
        <div class="why-icon"><?php labnesia_icon( 'trophy', 'var(--teal)', 28 ); ?></div>
        <div class="why-title">Track Record Terbukti</div>
        <div class="why-desc">30+ laboratorium telah kami dampingi dalam membangun sistem mutu dan meraih akreditasi.</div>
      </div>
      <div class="why-card">
        <div class="why-icon"><?php labnesia_icon( 'lightbulb', 'var(--teal)', 28 ); ?></div>
        <div class="why-title">Lab Jadi Unit Layanan &amp; Income Generator</div>
        <div class="why-desc">Buka potensi baru untuk mendukung institusi secara nyata — dari cost center menjadi revenue center.</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA SPLIT -->
<section class="cta-split-section" id="kontak">
  <div class="cta-split-inner">
    <p class="eyebrow" style="color:var(--teal-light)">Konsultasi Kebutuhan Lab Anda</p>
    <h2 class="cta-split-title">Mana yang sesuai<br>kondisi lab Anda?</h2>
    <p class="cta-split-sub">Tim kami akan bantu petakan kebutuhan spesifik institusi Anda — tanpa tekanan, tanpa komitmen di awal.</p>
    <div class="cta-split-actions">
      <a href="https://wa.me/6282172221567?text=Halo%2C%20saya%20ingin%20konsultasi%20Full%20Pendampingan%20untuk%20lab%20kami" class="cta-action-card">
        <div class="cta-action-tag">Belum Terakreditasi</div>
        <div class="cta-action-title">Konsultasi Full Pendampingan</div>
        <div class="cta-action-desc">Ceritakan kondisi lab Anda saat ini. Kami bantu rancang jalur tercepat menuju akreditasi.</div>
      </a>
      <a href="https://wa.me/6285185000367?text=Halo%2C%20saya%20ingin%20konsultasi%20Annual%20Partnership%20untuk%20lab%20kami" class="cta-action-card">
        <div class="cta-action-tag">Sudah Terakreditasi</div>
        <div class="cta-action-title">Konsultasi Annual Partnership</div>
        <div class="cta-action-desc">Diskusikan paket kemitraan tahunan yang sesuai dengan ukuran dan kebutuhan institusi Anda.</div>
      </a>
    </div>
    <p style="font-size:13px;color:rgba(255,255,255,0.4);margin-top:24px"><?php labnesia_whatsapp_link( '6282172221567', '+62 821-7222-1567 (Endang)', 'rgba(255,255,255,.9)', 13 ); ?> · <?php labnesia_whatsapp_link( '6285185000367', '+62 851-8500-0367 (Berryl)', 'rgba(255,255,255,.9)', 13 ); ?> · <?php labnesia_whatsapp_link( '62811399523', '+62 811-399-523 (Kintan)', 'rgba(255,255,255,.9)', 13 ); ?></p>
  </div>
</section>

<footer>
    <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <span><a href="https://labnesia.id">labnesia.id</a></span>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
