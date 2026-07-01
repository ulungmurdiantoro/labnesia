<?php
/*
Template Name: Mulai Gratis
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
  :root{--navy:#0B1F3A;--teal:#1A9E75;--teal-light:#22C28F;--teal-pale:#E8F7F2;--amber:#F5A623;--amber-pale:#FEF3DC;--white:#FFFFFF;--gray-50:#F8F9FA;--gray-100:#F1F3F5;--gray-200:#E9ECEF;--gray-400:#ADB5BD;--gray-600:#6C757D;--gray-800:#343A40;--font-display:'Plus Jakarta Sans',sans-serif;--font-serif:'Lora',serif}
  *{box-sizing:border-box;margin:0;padding:0}
  html{scroll-behavior:smooth}
  body{font-family:var(--font-display);color:var(--gray-800);background:var(--white);line-height:1.6}

  nav{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(11,31,58,0.97);backdrop-filter:blur(8px);padding:0 48px;height:64px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08)}
  .nav-logo{display:flex;align-items:center;gap:10px}
  .nav-logo-mark{width:36px;height:36px;background:var(--teal);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;color:white;font-size:14px}
  .nav-logo-text{color:white;font-weight:700;font-size:18px}
  .nav-logo-sub{color:rgba(255,255,255,0.45);font-size:11px;display:block;margin-top:-2px}
  .nav-links{display:flex;align-items:center;gap:28px}
  .nav-links a{color:rgba(255,255,255,0.7);text-decoration:none;font-size:14px;font-weight:500;transition:color .2s}
  .nav-links a:hover{color:white}
  .nav-cta{background:var(--amber);color:var(--navy);padding:8px 20px;border-radius:8px;font-weight:700;font-size:14px;text-decoration:none}

  /* PAGE HERO */
  .page-hero{background:var(--navy);padding:104px 48px 72px;position:relative;overflow:hidden;text-align:center}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.18) 0%,transparent 60%)}
  .page-hero-inner{max-width:800px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-flex;align-items:center;gap:8px;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:6px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:24px}
  .dot-pulse{width:6px;height:6px;border-radius:50%;background:var(--teal-light);animation:pulse 2s infinite}
  @keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}
  .page-hero h1{font-size:52px;font-weight:800;color:white;line-height:1.1;letter-spacing:-1.5px;margin-bottom:20px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .hero-belief{font-family:var(--font-serif);font-style:italic;color:rgba(255,255,255,0.6);font-size:18px;line-height:1.65;margin-bottom:36px;max-width:560px;margin-left:auto;margin-right:auto}
  .hero-scroll-hint{font-size:13px;color:rgba(255,255,255,0.3);margin-top:12px}

  /* TRUST ROW */
  .trust-row{background:var(--teal-pale);border-bottom:1px solid rgba(26,158,117,0.2);padding:18px 48px}
  .trust-inner{max-width:1000px;margin:0 auto;display:flex;align-items:center;justify-content:center;gap:40px;flex-wrap:wrap}
  .trust-item{display:flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:#085041}
  .trust-check{width:22px;height:22px;background:var(--teal);border-radius:50%;color:white;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;flex-shrink:0}

  /* GIVE VALUE CARDS */
  section{padding:80px 48px}
  .section-inner{max-width:1100px;margin:0 auto}
  .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}
  .h2{font-size:36px;font-weight:800;color:var(--navy);line-height:1.15;letter-spacing:-0.8px;margin-bottom:14px}
  .body{font-size:16px;color:var(--gray-600);line-height:1.7}

  /* FEATURED: GAP ANALYSIS */
  .gap-feature{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:center;background:var(--navy);border-radius:24px;padding:48px;margin-bottom:20px;position:relative;overflow:hidden}
  .gap-feature::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:32px 32px}
  .gap-feature-left{position:relative;z-index:1}
  .gap-tag{display:inline-block;background:rgba(26,158,117,0.2);border:1px solid rgba(26,158,117,0.4);color:var(--teal-light);font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:5px 14px;border-radius:6px;margin-bottom:20px}
  .gap-title{font-size:34px;font-weight:800;color:white;line-height:1.15;letter-spacing:-0.8px;margin-bottom:14px}
  .gap-title .accent{color:var(--teal-light)}
  .gap-desc{font-family:var(--font-serif);font-style:italic;color:rgba(255,255,255,0.6);font-size:16px;line-height:1.65;margin-bottom:28px;border-left:3px solid var(--teal);padding-left:16px}
  .output-list{display:flex;flex-direction:column;gap:10px;margin-bottom:28px}
  .output-item{display:flex;align-items:center;gap:10px;color:rgba(255,255,255,0.8);font-size:14px}
  .output-check{width:22px;height:22px;background:var(--teal);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:11px;font-weight:700;flex-shrink:0}
  .gap-form{background:white;border-radius:16px;padding:32px;position:relative;z-index:1}
  .form-title{font-size:20px;font-weight:800;color:var(--navy);margin-bottom:4px}
  .form-sub{font-size:13px;color:var(--gray-600);margin-bottom:24px}
  .form-field{margin-bottom:14px}
  .form-label{font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:6px}
  .form-input{width:100%;padding:11px 14px;border:1px solid var(--gray-200);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s;background:var(--gray-50)}
  .form-input:focus{border-color:var(--teal);background:white}
  .form-select{width:100%;padding:11px 14px;border:1px solid var(--gray-200);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:var(--gray-50);cursor:pointer}
  .btn-submit{width:100%;padding:13px;background:var(--teal);color:white;border:none;border-radius:9px;font-weight:700;font-size:15px;font-family:var(--font-display);cursor:pointer;transition:all .2s;margin-top:4px}
  .btn-submit:hover{background:#158a65}
  .form-note{font-size:11px;color:var(--gray-400);text-align:center;margin-top:10px;line-height:1.5}
  .form-privacy{display:flex;align-items:flex-start;gap:8px;margin-top:10px}
  .form-privacy input{margin-top:3px}
  .form-privacy label{font-size:12px;color:var(--gray-600);line-height:1.4}

  /* OTHER GIVES */
  .gives-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:40px}
  .give-card{background:white;border:1px solid var(--gray-200);border-radius:16px;overflow:hidden;transition:all .2s;cursor:pointer}
  .give-card:hover{border-color:var(--teal);transform:translateY(-3px);box-shadow:0 8px 24px rgba(26,158,117,0.1)}
  .give-card-img{background:var(--navy);padding:28px 28px 20px;position:relative;overflow:hidden}
  .give-card-img::before{content:'';position:absolute;inset:0;opacity:0.05;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:24px 24px}
  .give-card-icon{font-size:40px;position:relative;z-index:1}
  .give-card-tag{position:absolute;top:16px;right:16px;font-size:10px;font-weight:700;padding:3px 10px;border-radius:4px;letter-spacing:.06em;text-transform:uppercase;z-index:1}
  .tag-free{background:rgba(26,158,117,0.25);color:var(--teal-light);border:1px solid rgba(26,158,117,0.4)}
  .tag-open{background:rgba(245,166,35,0.25);color:var(--amber);border:1px solid rgba(245,166,35,0.4)}
  .tag-member{background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.6);border:1px solid rgba(255,255,255,0.15)}
  .give-card-body{padding:20px}
  .give-card-title{font-size:16px;font-weight:700;color:var(--navy);margin-bottom:8px}
  .give-card-desc{font-size:13px;color:var(--gray-600);line-height:1.6;margin-bottom:14px}
  .give-card-outputs{margin-bottom:14px}
  .give-output-item{display:flex;align-items:flex-start;gap:7px;margin-bottom:5px;font-size:12px;color:var(--gray-600)}
  .give-output-check{color:var(--teal);font-weight:700;flex-shrink:0;margin-top:1px}
  .give-card-cta{display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:700;color:var(--teal);text-decoration:none;transition:gap .15s}
  .give-card-cta:hover{gap:10px}

  /* DOWNLOAD SECTION */
  .download-section{background:var(--gray-50)}
  .download-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:36px}
  .dl-card{background:white;border:1px solid var(--gray-200);border-radius:14px;padding:20px;text-align:center;transition:all .2s;cursor:pointer}
  .dl-card:hover{border-color:var(--teal);transform:translateY(-2px)}
  .dl-icon{font-size:36px;margin-bottom:12px}
  .dl-title{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:5px;line-height:1.3}
  .dl-desc{font-size:12px;color:var(--gray-600);line-height:1.5;margin-bottom:12px}
  .dl-btn{display:inline-flex;align-items:center;gap:5px;font-size:12px;font-weight:700;color:var(--teal);background:var(--teal-pale);padding:6px 14px;border-radius:6px;text-decoration:none;transition:all .2s}
  .dl-btn:hover{background:var(--teal);color:white}
  .dl-format{font-size:10px;color:var(--gray-400);margin-top:8px;text-transform:uppercase;letter-spacing:.05em}

  /* WEBINAR SCHEDULE */
  .webinar-list{margin-top:32px;display:flex;flex-direction:column;gap:12px}
  .webinar-item{background:white;border:1px solid var(--gray-200);border-radius:14px;padding:20px 24px;display:flex;align-items:center;gap:20px;transition:all .2s}
  .webinar-item:hover{border-color:var(--teal)}
  .webinar-date{background:var(--navy);color:white;border-radius:10px;padding:10px 14px;text-align:center;flex-shrink:0;min-width:64px}
  .webinar-day{font-size:22px;font-weight:800;line-height:1}
  .webinar-month{font-size:11px;color:rgba(255,255,255,0.5);text-transform:uppercase;letter-spacing:.06em;margin-top:2px}
  .webinar-info{flex:1}
  .webinar-title{font-size:15px;font-weight:700;color:var(--navy);margin-bottom:4px}
  .webinar-meta{font-size:13px;color:var(--gray-600);display:flex;gap:16px;flex-wrap:wrap}
  .webinar-meta-item{display:flex;align-items:center;gap:5px}
  .webinar-tag{font-size:11px;font-weight:600;padding:3px 9px;border-radius:4px;background:var(--teal-pale);color:var(--teal)}
  .webinar-cta{flex-shrink:0}
  .btn-daftar{background:var(--teal);color:white;padding:9px 18px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;transition:all .2s;border:none;cursor:pointer}
  .btn-daftar:hover{background:#158a65}
  .btn-daftar-outline{background:transparent;color:var(--teal);padding:9px 18px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;border:1.5px solid var(--teal);transition:all .2s}
  .btn-daftar-outline:hover{background:var(--teal-pale)}
  .webinar-full{background:var(--gray-100);color:var(--gray-400);padding:9px 18px;border-radius:8px;font-size:13px;font-weight:600}

  /* COMMUNITY */
  .community-section{background:var(--navy);position:relative;overflow:hidden}
  .community-section::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .community-inner{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;position:relative;z-index:1}
  .community-left .eyebrow{color:var(--teal-light)}
  .community-left .h2{color:white}
  .community-left .body{color:rgba(255,255,255,0.55)}
  .group-list{display:flex;flex-direction:column;gap:10px;margin-top:20px}
  .group-item{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:12px;padding:14px 18px;display:flex;align-items:center;gap:14px;transition:all .2s}
  .group-item:hover{background:rgba(255,255,255,0.1);border-color:rgba(26,158,117,0.4)}
  .group-icon{font-size:22px;flex-shrink:0}
  .group-name{font-size:14px;font-weight:700;color:white;margin-bottom:2px}
  .group-desc{font-size:12px;color:rgba(255,255,255,0.45)}
  .group-count{font-size:12px;font-weight:600;color:var(--teal-light);white-space:nowrap}
  .community-form{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:20px;padding:32px}
  .community-form-title{font-size:20px;font-weight:800;color:white;margin-bottom:6px}
  .community-form-sub{font-size:14px;color:rgba(255,255,255,0.5);margin-bottom:24px}
  .form-input-dark{width:100%;padding:11px 14px;border:1px solid rgba(255,255,255,0.15);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:rgba(255,255,255,0.07);color:white;transition:border .2s;margin-bottom:12px}
  .form-input-dark:focus{border-color:var(--teal)}
  .form-input-dark::placeholder{color:rgba(255,255,255,0.3)}
  .btn-teal-solid{width:100%;padding:13px;background:var(--teal);color:white;border:none;border-radius:9px;font-weight:700;font-size:15px;font-family:var(--font-display);cursor:pointer;transition:all .2s}
  .btn-teal-solid:hover{background:#158a65}
  .community-privacy{font-size:11px;color:rgba(255,255,255,0.3);text-align:center;margin-top:10px;line-height:1.5}
  .existing-members{display:flex;align-items:center;gap:10px;margin-top:16px}
  .avatar-stack{display:flex}
  .avatar-sm{width:28px;height:28px;border-radius:50%;background:var(--teal);border:2px solid var(--navy);display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;color:white;margin-left:-8px}
  .avatar-sm:first-child{margin-left:0}
  .member-count{font-size:12px;color:rgba(255,255,255,0.5)}

  /* PRAKTISI */
  .praktisi-section{background:var(--amber-pale);border-top:1px solid rgba(245,166,35,0.3)}
  .praktisi-inner{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center}
  .praktisi-tag{display:inline-block;background:rgba(245,166,35,0.3);color:#6B4400;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:5px 14px;border-radius:6px;margin-bottom:16px}
  .praktisi-title{font-size:34px;font-weight:800;color:var(--navy);line-height:1.15;letter-spacing:-0.8px;margin-bottom:14px}
  .praktisi-desc{font-size:15px;color:var(--gray-600);line-height:1.7;margin-bottom:24px}
  .praktisi-benefits{display:flex;flex-direction:column;gap:12px;margin-bottom:28px}
  .pb-item{display:flex;align-items:flex-start;gap:10px}
  .pb-check{width:22px;height:22px;background:var(--amber);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--navy);font-size:11px;font-weight:800;flex-shrink:0}
  .pb-text{font-size:14px;color:var(--gray-700);line-height:1.5}
  .btn-amber-solid{display:inline-block;padding:13px 28px;background:var(--amber);color:var(--navy);border-radius:10px;font-weight:700;font-size:15px;text-decoration:none;transition:all .2s;border:none;cursor:pointer}
  .btn-amber-solid:hover{background:#e09620;transform:translateY(-1px)}
  .praktisi-visual{background:white;border-radius:20px;padding:32px;border:1px solid rgba(245,166,35,0.3)}
  .praktisi-scenario{background:var(--gray-50);border-radius:12px;padding:18px;margin-bottom:12px}
  .ps-label{font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--teal);margin-bottom:6px}
  .ps-title{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:4px}
  .ps-desc{font-size:13px;color:var(--gray-600);line-height:1.5}
  .ps-tag{display:inline-block;background:var(--amber-pale);color:#8B6000;font-size:11px;font-weight:600;padding:2px 8px;border-radius:4px;margin-top:6px}

  /* FAQ MINI */
  .faq-mini-section{background:var(--gray-50)}
  .faq-mini-item{background:white;border:1px solid var(--gray-200);border-radius:12px;padding:20px 24px;margin-bottom:10px;cursor:pointer;transition:border .2s}
  .faq-mini-item:hover{border-color:var(--teal)}
  .faq-mini-q{font-size:15px;font-weight:700;color:var(--navy);display:flex;justify-content:space-between;align-items:center}
  .faq-mini-a{font-size:14px;color:var(--gray-600);line-height:1.7;margin-top:12px;display:none}
  .faq-mini-a.open{display:block}

  /* FOOTER */
  footer{background:var(--navy);padding:48px;border-top:1px solid rgba(255,255,255,0.08)}
  .footer-bottom{max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;font-size:13px;color:rgba(255,255,255,0.4)}
  .footer-bottom a{color:rgba(255,255,255,0.35);text-decoration:none}
</style>
</head>
<body <?php body_class( 'page-mulai-gratis' ); ?>>
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

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag"><div class="dot-pulse"></div>Give Value First</div>
    <h1>Rasakan manfaatnya<br>sebelum <span class="accent">memutuskan.</span></h1>
    <p class="hero-belief">Kami percaya laboratorium yang sudah merasakan nilai nyata dari pendampingan kami akan tahu sendiri langkah selanjutnya. Tidak perlu dipaksa.</p>
    <p class="hero-scroll-hint">↓ Semua ini tersedia untuk Anda hari ini, tanpa biaya</p>
  </div>
</div>

<!-- TRUST ROW -->
<div class="trust-row">
  <div class="trust-inner">
    <div class="trust-item"><div class="trust-check"><?php labnesia_icon( 'check', '#ffffff', 11 ); ?></div>Tidak perlu kartu kredit</div>
    <div class="trust-item"><div class="trust-check"><?php labnesia_icon( 'check', '#ffffff', 11 ); ?></div>Tidak ada komitmen apapun</div>
    <div class="trust-item"><div class="trust-check"><?php labnesia_icon( 'check', '#ffffff', 11 ); ?></div>Tidak ada spam email</div>
    <div class="trust-item"><div class="trust-check"><?php labnesia_icon( 'check', '#ffffff', 11 ); ?></div>Akses langsung, tidak perlu menunggu</div>
  </div>
</div>

<!-- FEATURED: GAP ANALYSIS -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Give Value #1 · Paling Berdampak</p>
    <h2 class="h2">Mulai dari GAP Analysis<br>— 100% Gratis.</h2>
    <p class="body" style="margin-bottom:40px;max-width:560px">Ini bukan sekadar checklist. Kami analisis kondisi lab Anda secara menyeluruh dan hasilkan 4 dokumen yang langsung bisa digunakan sebagai panduan implementasi.</p>

    <div class="gap-feature">
      <div class="gap-feature-left">
        <div class="gap-tag">100% Gratis · Nilai setara Rp 3–5 jt</div>
        <h3 class="gap-title">Laporan GAP Analysis<br><span class="accent">Lab Anda</span></h3>
        <p class="gap-desc">"Sebelum Anda mengeluarkan satu rupiah pun, kami ingin pastikan Anda tahu persis kondisi lab dan apa yang perlu dilakukan."</p>
        <div class="output-list">
          <div class="output-item"><div class="output-check"><?php labnesia_icon( 'check', '#ffffff', 11 ); ?></div>Laporan GAP Analysis — gap dokumen & teknis yang teridentifikasi</div>
          <div class="output-item"><div class="output-check"><?php labnesia_icon( 'check', '#ffffff', 11 ); ?></div>Penetapan Ruang Lingkup — parameter & metode yang akan diakreditasi</div>
          <div class="output-item"><div class="output-check"><?php labnesia_icon( 'check', '#ffffff', 11 ); ?></div>Struktur Organisasi Mutu — siapa harus pegang peran apa</div>
          <div class="output-item"><div class="output-check"><?php labnesia_icon( 'check', '#ffffff', 11 ); ?></div>Roadmap Implementasi — langkah konkret 6–12 bulan ke depan</div>
        </div>
      </div>

      <div class="gap-form">
        <div class="form-title">Daftar GAP Analysis Gratis</div>
        <div class="form-sub">Tim kami akan merespons dalam maksimal 3 hari kerja untuk menjadwalkan sesi — online maupun onsite sesuai kebutuhan Anda.</div>
        <div class="form-field">
          <label class="form-label">Nama lengkap *</label>
          <input class="form-input" type="text" placeholder="Nama Anda">
        </div>
        <div class="form-field">
          <label class="form-label">Jabatan / posisi *</label>
          <select class="form-select">
            <option value="">Pilih jabatan Anda</option>
            <option>Kepala Laboratorium</option>
            <option>Manajer Mutu</option>
            <option>Manajer Teknis</option>
            <option>Analis / Laboran</option>
            <option>Dosen / Peneliti</option>
            <option>Pimpinan / Manajemen Institusi</option>
            <option>Lainnya</option>
          </select>
        </div>
        <div class="form-field">
          <label class="form-label">Nama laboratorium &amp; institusi *</label>
          <input class="form-input" type="text" placeholder="Mis: Lab Pangan FTP UGM">
        </div>
        <div class="form-field">
          <label class="form-label">Bidang laboratorium *</label>
          <select class="form-select">
            <option value="">Pilih bidang lab</option>
            <option>Lab Lingkungan</option>
            <option>Lab Pangan / Gizi / Halal</option>
            <option>Lab Sipil</option>
            <option>Lab Pertanian / Pascapanen</option>
            <option>Lab Farmasi / Kimia</option>
            <option>Lab Biologi &amp; Mikrobiologi</option>
            <option>Lab Kalibrasi</option>
            <option>Lab Peternakan &amp; Perikanan</option>
            <option>Lab Energi / Mineral</option>
            <option>Lainnya</option>
          </select>
        </div>
        <div class="form-field">
          <label class="form-label">Nomor WhatsApp *</label>
          <input class="form-input" type="tel" placeholder="08xx-xxxx-xxxx">
        </div>
        <div class="form-field">
          <label class="form-label">Kondisi lab saat ini</label>
          <select class="form-select">
            <option>Belum punya dokumen mutu sama sekali</option>
            <option>Punya sebagian dokumen, belum lengkap</option>
            <option>Dokumen sudah ada tapi belum yakin apakah sesuai KAN</option>
            <option>Pernah gagal asesmen, ingin coba lagi</option>
            <option>Sudah terakreditasi, ingin re-akreditasi</option>
          </select>
        </div>
        <a href="<?php echo esc_url( home_url('/gap-analisis/') ); ?>" class="btn-submit" style="display:block;text-align:center;text-decoration:none;">Daftar GAP Analysis Gratis <?php labnesia_icon( 'arrow-right', '#ffffff', 15 ); ?></a>
        <p class="form-note">Data Anda aman. Kami tidak akan membagikan informasi Anda kepada pihak manapun.</p>
      </div>
    </div>

    <!-- OTHER GIVES -->
    <h3 style="font-size:24px;font-weight:800;color:var(--navy);margin-top:64px;margin-bottom:8px">Masih banyak lagi yang gratis.</h3>
    <p class="body" style="margin-bottom:0">Tidak semua orang langsung siap dengan GAP Analysis. Mulai dari mana yang paling nyaman untuk Anda.</p>

    <div class="gives-grid">
      <div class="give-card">
        <div class="give-card-img">
          <div class="give-card-icon"><?php labnesia_icon( 'mic', '#ffffff', 40 ); ?></div>
          <span class="give-card-tag tag-free">Gratis</span>
        </div>
        <div class="give-card-body">
          <div class="give-card-title">Webinar Lab Talk</div>
          <div class="give-card-desc">Sesi edukasi mingguan — insight, tips, studi kasus, dan update regulasi dari para pakar Labnesia.</div>
          <div class="give-card-outputs">
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Setiap Rabu, pukul 13.00–14.30 WIB</div>
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Rekaman tersedia untuk peserta terdaftar</div>
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Tanya jawab langsung dengan pakar</div>
          </div>
          <a href="#webinar" class="give-card-cta">Lihat jadwal <?php labnesia_icon( 'arrow-right', 'var(--teal)', 13 ); ?></a>
        </div>
      </div>

      <div class="give-card">
        <div class="give-card-img" style="background:#1C3A60">
          <div class="give-card-icon"><?php labnesia_icon( 'zap', '#ffffff', 40 ); ?></div>
          <span class="give-card-tag tag-open">Terbuka Umum</span>
        </div>
        <div class="give-card-body">
          <div class="give-card-title">Bootcamp 1 Hari</div>
          <div class="give-card-desc">Intensif online 7 jam — alur akreditasi dari awal hingga cara daftar di KANMIS 2.0. Investasi sangat terjangkau.</div>
          <div class="give-card-outputs">
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Online, 7 JP dalam satu hari</div>
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Sertifikat pelatihan diberikan</div>
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Jadwal bulanan — pilih yang paling cocok</div>
          </div>
          <a href="#bootcamp" class="give-card-cta">Lihat jadwal <?php labnesia_icon( 'arrow-right', 'var(--teal)', 13 ); ?></a>
        </div>
      </div>

      <div class="give-card">
        <div class="give-card-img" style="background:#0B2D1A">
          <div class="give-card-icon"><?php labnesia_icon( 'graduation-cap', '#ffffff', 40 ); ?></div>
          <span class="give-card-tag tag-free">Gratis untuk kampus mitra</span>
        </div>
        <div class="give-card-body">
          <div class="give-card-title">Kuliah Praktisi</div>
          <div class="give-card-desc">Labnesia hadir ke kampus Anda — sesi tatap muka untuk mahasiswa tingkat akhir &amp; fresh graduate tentang karir di bidang lab.</div>
          <div class="give-card-outputs">
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Untuk mahasiswa tingkat akhir &amp; wisudawan</div>
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Materi: Lab Career, Sertifikasi KAN, Dunia Lab</div>
            <div class="give-output-item"><div class="give-output-check"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></div>Gratis untuk kampus yang mengundang</div>
          </div>
          <a href="#praktisi" class="give-card-cta">Undang Labnesia <?php labnesia_icon( 'arrow-right', 'var(--teal)', 13 ); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DOWNLOAD SECTION -->
<section class="download-section" id="download">
  <div class="section-inner">
    <p class="eyebrow">Unduh Gratis</p>
    <h2 class="h2">Panduan &amp; template yang<br>langsung bisa Anda gunakan.</h2>
    <p class="body" style="max-width:540px">Tidak perlu daftar dulu untuk beberapa materi di bawah. Langsung unduh dan gunakan untuk lab Anda.</p>
    <div class="download-grid">
      <div class="dl-card">
        <div class="dl-icon">📘</div>
        <div class="dl-title">Panduan SNI ISO/IEC 17025:2017</div>
        <div class="dl-desc">Ringkasan klausul &amp; persyaratan standar yang mudah dipahami</div>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdhQfpt4a1KsUHVKBlJQks0ml5KCyu15jF4LvJDsRQ5QH2FLg/viewform" class="dl-btn">↓ Unduh PDF</a>
        <div class="dl-format">PDF · 24 halaman</div>
      </div>
      <div class="dl-card">
        <div class="dl-icon"><?php labnesia_icon( 'clipboard-list', 'var(--teal)', 36 ); ?></div>
        <div class="dl-title">Checklist Persiapan Akreditasi KAN</div>
        <div class="dl-desc">Daftar lengkap dokumen yang dibutuhkan sebelum mendaftar akreditasi</div>
        <a href="#" class="dl-btn">↓ Unduh Excel</a>
        <div class="dl-format">XLSX · checklist interaktif</div>
      </div>
      <div class="dl-card">
        <div class="dl-icon">📚</div>
        <div class="dl-title">Silabus Lengkap Kelas Pendampingan</div>
        <div class="dl-desc">Outline 13 sesi, output per sesi, dan timeline 6 bulan program</div>
        <a href="<?php echo $url_kelas; ?>" class="dl-btn">Lihat Program <?php labnesia_icon( 'arrow-right', 'var(--teal)', 12 ); ?></a>
        <div class="dl-format">PDF · 16 halaman</div>
      </div>
      <div class="dl-card">
        <div class="dl-icon">🗓️</div>
        <div class="dl-title">Template Roadmap Implementasi</div>
        <div class="dl-desc">Template Excel untuk menyusun rencana implementasi ISO 17025 lab Anda</div>
        <a href="#" class="dl-btn">↓ Unduh Excel</a>
        <div class="dl-format">XLSX · bisa disesuaikan</div>
      </div>
    </div>
  </div>
</section>

<!-- WEBINAR SCHEDULE -->
<section id="webinar">
  <div class="section-inner">
    <p class="eyebrow">Jadwal Webinar</p>
    <h2 class="h2">Lab Talk — edukasi mingguan<br>dari para pakar.</h2>
    <p class="body" style="max-width:520px;margin-bottom:0">Daftar webinar berikutnya dan pilih topik yang paling relevan dengan kondisi lab Anda saat ini.</p>
    <div class="webinar-list">
      <div class="webinar-item">
        <div class="webinar-date" style="background:var(--teal)"><div class="webinar-day">9</div><div class="webinar-month">Jul 26</div></div>
        <div class="webinar-info">
          <div class="webinar-title">Memahami Klausul ISO/IEC 17025 dari Perspektif Asesor KAN</div>
          <div class="webinar-meta">
            <span class="webinar-meta-item">🕐 13.00–14.30 WIB</span>
            <span class="webinar-meta-item">🌐 Zoom · Online</span>
            <span class="webinar-tag">Awareness</span>
          </div>
        </div>
        <div class="webinar-cta"><a href="#" class="btn-daftar">Daftar gratis</a></div>
      </div>
      <div class="webinar-item">
        <div class="webinar-date"><div class="webinar-day">16</div><div class="webinar-month">Jul 26</div></div>
        <div class="webinar-info">
          <div class="webinar-title">Cara Menyusun Dokumen Mutu ISO 17025 yang Benar-Benar Lulus Audit</div>
          <div class="webinar-meta">
            <span class="webinar-meta-item">🕐 13.00–14.30 WIB</span>
            <span class="webinar-meta-item">🌐 Zoom · Online</span>
            <span class="webinar-tag">Dokumen</span>
          </div>
        </div>
        <div class="webinar-cta"><a href="#" class="btn-daftar">Daftar gratis</a></div>
      </div>
      <div class="webinar-item">
        <div class="webinar-date"><div class="webinar-day">23</div><div class="webinar-month">Jul 26</div></div>
        <div class="webinar-info">
          <div class="webinar-title">Ketidakpastian Pengujian — Konsep Dasar yang Sering Disalahpahami</div>
          <div class="webinar-meta">
            <span class="webinar-meta-item">🕐 13.00–14.30 WIB</span>
            <span class="webinar-meta-item">🌐 Zoom · Online</span>
            <span class="webinar-tag">Teknis</span>
          </div>
        </div>
        <div class="webinar-cta"><a href="#" class="btn-daftar-outline">Ingatkan saya</a></div>
      </div>
      <div class="webinar-item" style="opacity:.6">
        <div class="webinar-date" style="background:var(--gray-400)"><div class="webinar-day">2</div><div class="webinar-month">Jul 26</div></div>
        <div class="webinar-info">
          <div class="webinar-title">Audit Internal ISO 17025 — Simulasi Temuan &amp; Tindakan Perbaikan</div>
          <div class="webinar-meta">
            <span class="webinar-meta-item">🕐 13.00–14.30 WIB</span>
            <span class="webinar-meta-item"><?php labnesia_icon( 'check', 'var(--gray-600)', 13 ); ?> Sudah selesai</span>
            <span class="webinar-tag" style="background:var(--gray-100);color:var(--gray-600)">Rekaman tersedia</span>
          </div>
        </div>
        <div class="webinar-cta"><a href="#" class="btn-daftar-outline">Minta rekaman</a></div>
      </div>
    </div>
  </div>
</section>

<!-- COMMUNITY -->
<section class="community-section">
  <div class="community-inner" style="padding:80px 48px">
    <div class="community-left">
      <p class="eyebrow">Bergabung dengan Komunitas</p>
      <h2 class="h2">Forum nasional<br>para profesional lab.</h2>
      <p class="body" style="margin-bottom:20px">Ribuan Manajer Mutu, analis, dan auditor internal dari seluruh Indonesia — sharing pengalaman, tanya pakar, dan update implementasi sistem manajemen laboratorium terbaru.</p>
      <div class="group-list">
        <div class="group-item">
          <div class="group-icon">🔬</div>
          <div style="flex:1">
            <div class="group-name">Forum Kompeten ISO/IEC 17025</div>
            <div class="group-desc">Diskusi umum implementasi standar lab, tanya jawab, info batch</div>
          </div>
          <div class="group-count">2.4k anggota</div>
        </div>
        <div class="group-item">
          <div class="group-icon">🏫</div>
          <div style="flex:1">
            <div class="group-name">Labnesia Expert Network (LEN) — Perguruan Tinggi</div>
            <div class="group-desc">Khusus untuk lab perguruan tinggi &amp; dosen</div>
          </div>
          <div class="group-count">&gt;400 anggota</div>
        </div>
        <div class="group-item">
          <div class="group-icon">🏭</div>
          <div style="flex:1">
            <div class="group-name">Labnesia Expert Network (LEN) — Industri &amp; Lembaga Pemerintah</div>
            <div class="group-desc">Lab industri, BUMN, dan laboratorium pemerintah</div>
          </div>
          <div class="group-count">&gt;200 anggota</div>
        </div>
        <div class="group-item">
          <div class="group-icon">⭐</div>
          <div style="flex:1">
            <div class="group-name">VIP Member — Alumni Program</div>
            <div class="group-desc">Eksklusif untuk peserta program Labnesia</div>
          </div>
          <div class="group-count">&gt;200 anggota</div>
        </div>
      </div>
    </div>
    <div class="community-form">
      <div class="community-form-title">Bergabung ke Komunitas</div>
      <div class="community-form-sub">Pilih grup yang paling sesuai dengan peran dan institusi Anda.</div>
      <input class="form-input-dark" type="text" placeholder="Nama lengkap Anda">
      <input class="form-input-dark" type="email" placeholder="Email aktif">
      <input class="form-input-dark" type="tel" placeholder="Nomor WhatsApp">
      <select style="width:100%;padding:11px 14px;border:1px solid rgba(255,255,255,0.15);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:rgba(255,255,255,0.07);color:rgba(255,255,255,0.7);margin-bottom:12px">
        <option value="">Pilih grup yang ingin diikuti</option>
        <option>Forum Kompeten ISO/IEC 17025 (Umum)</option>
        <option>Labnesia Expert Network (LEN) — Perguruan Tinggi</option>
        <option>Labnesia Expert Network (LEN) — Industri &amp; Lembaga Pemerintah</option>
        <option>VIP Member — Alumni Program</option>
      </select>
      <button class="btn-teal-solid" onclick="joinCommunity()">Bergabung ke Komunitas <?php labnesia_icon( 'arrow-right', '#ffffff', 15 ); ?></button>
      <div class="community-privacy">Gratis selamanya. Data Anda tidak akan dibagikan.</div>
      <div class="existing-members">
        <div class="avatar-stack">
          <div class="avatar-sm">WS</div>
          <div class="avatar-sm">RP</div>
          <div class="avatar-sm">HZ</div>
          <div class="avatar-sm">MY</div>
        </div>
        <div class="member-count">+4.700 profesional lab Indonesia sudah bergabung</div>
      </div>
    </div>
  </div>
</section>

<!-- PRAKTISI -->
<section class="praktisi-section" id="praktisi">
  <div class="praktisi-inner" style="padding:80px 48px">
    <div>
      <div class="praktisi-tag">Untuk Perguruan Tinggi</div>
      <h2 class="praktisi-title">Program Kuliah Praktisi<br>— gratis untuk kampus mitra.</h2>
      <p class="praktisi-desc">Labnesia hadir ke kampus Anda membawa wawasan nyata tentang dunia laboratorium — dari pengembangan kompetensi, implementasi ISO/IEC 17025, hingga karir profesional di bidang lab.</p>
      <div class="praktisi-benefits">
        <div class="pb-item"><div class="pb-check"><?php labnesia_icon( 'check', 'var(--navy)', 11 ); ?></div><div class="pb-text">Cocok untuk mahasiswa tingkat akhir, wisudawan, dan fresh graduate yang ingin berkarir di bidang lab</div></div>
        <div class="pb-item"><div class="pb-check"><?php labnesia_icon( 'check', 'var(--navy)', 11 ); ?></div><div class="pb-text">Materi: Lab Career Path, Sertifikasi KAN, Peluang Karir, dan Realita Dunia Lab Profesional</div></div>
        <div class="pb-item"><div class="pb-check"><?php labnesia_icon( 'check', 'var(--navy)', 11 ); ?></div><div class="pb-text">Bisa online atau onsite — sesuai kebutuhan kampus</div></div>
        <div class="pb-item"><div class="pb-check"><?php labnesia_icon( 'check', 'var(--navy)', 11 ); ?></div><div class="pb-text">Gratis untuk kampus yang mengundang — tidak ada biaya narasumber</div></div>
      </div>
      <a href="#" class="btn-amber-solid">Undang Labnesia ke Kampus <?php labnesia_icon( 'arrow-right', 'var(--navy)', 15 ); ?></a>
    </div>
    <div class="praktisi-visual">
      <p style="font-size:12px;font-weight:700;color:var(--teal);letter-spacing:.08em;text-transform:uppercase;margin-bottom:16px">Topik yang sering diminta kampus:</p>
      <div class="praktisi-scenario">
        <div class="ps-label">Untuk mahasiswa umum</div>
        <div class="ps-title">Karir di Bidang Lab: Lebih dari Sekadar Analis</div>
        <div class="ps-desc">Laboratory Quality Officer, Manajer Mutu, Auditor Internal, QC Analyst — peluang yang belum banyak diketahui</div>
        <span class="ps-tag">Lab Career</span>
      </div>
      <div class="praktisi-scenario">
        <div class="ps-label">Untuk mahasiswa lab / teknik / pertanian</div>
        <div class="ps-title">Apa itu ISO/IEC 17025 &amp; Mengapa Lab Wajib Terakreditasi</div>
        <div class="ps-desc">Pengenalan sistem mutu laboratorium, akreditasi KAN, dan peran SDM dalam membangun lab berkualitas</div>
        <span class="ps-tag">Awareness</span>
      </div>
      <div class="praktisi-scenario">
        <div class="ps-label">Untuk dosen &amp; pengelola lab PT</div>
        <div class="ps-title">Lab sebagai Profit Center &amp; Pencapaian IKU</div>
        <div class="ps-desc">Bagaimana akreditasi ISO 17025 mendukung IKU 2, 5, 9 dan menjadikan lab sumber pendapatan institusi</div>
        <span class="ps-tag">IKU &amp; Bisnis Lab</span>
      </div>
    </div>
  </div>
</section>

<!-- FAQ MINI -->
<section class="faq-mini-section">
  <div class="section-inner" style="max-width:720px">
    <p class="eyebrow" style="text-align:center">Pertanyaan yang sering muncul</p>
    <h2 class="h2" style="text-align:center;margin-bottom:32px">Seputar program gratis ini</h2>
    <div class="faq-mini-item" onclick="toggleFaqMini(this)">
      <div class="faq-mini-q">Apakah GAP Analysis benar-benar gratis? Ada catch-nya? <span><?php labnesia_icon( 'chevron-down', 'var(--navy)', 16 ); ?></span></div>
      <div class="faq-mini-a">Ya, benar-benar gratis — tidak ada kewajiban untuk mendaftar program berbayar setelahnya. Kami lakukan ini karena kami percaya bahwa laboratorium yang sudah merasakan kualitas pendampingan kami akan memutuskan sendiri langkah berikutnya. Ini adalah bagian dari filosofi "give first" yang kami pegang.</div>
    </div>
    <div class="faq-mini-item" onclick="toggleFaqMini(this)">
      <div class="faq-mini-q">Berapa lama proses GAP Analysis? <span><?php labnesia_icon( 'chevron-down', 'var(--navy)', 16 ); ?></span></div>
      <div class="faq-mini-a">Tim kami akan merespons dan menjadwalkan sesi GAP Analysis Anda dalam <strong>maksimal 3 hari kerja</strong> setelah pendaftaran. Sesi berlangsung sekitar 90–120 menit. Laporan dikirimkan dalam 3–5 hari kerja setelah sesi selesai.</div>
    </div>
    <div class="faq-mini-item" onclick="toggleFaqMini(this)">
      <div class="faq-mini-q">Apakah GAP Analysis dilakukan online atau langsung di lab? <span><?php labnesia_icon( 'chevron-down', 'var(--navy)', 16 ); ?></span></div>
      <div class="faq-mini-a">Keduanya tersedia. GAP Analysis dapat dilaksanakan secara <strong>online maupun onsite (langsung di tempat)</strong> sesuai kebutuhan dan kondisi laboratorium Anda. Metode online lebih cepat dijadwalkan, sementara onsite memungkinkan tim kami melihat langsung kondisi fasilitas dan peralatan lab.</div>
    </div>
    <div class="faq-mini-item" onclick="toggleFaqMini(this)">
      <div class="faq-mini-q">Apakah webinar tersedia secara rekaman? <span><?php labnesia_icon( 'chevron-down', 'var(--navy)', 16 ); ?></span></div>
      <div class="faq-mini-a">Ya, semua webinar yang sudah berlangsung tersedia rekamannya. Daftar ke komunitas kami dan minta akses rekaman melalui grup WhatsApp. Untuk peserta Kelas Pendampingan, semua rekaman tersedia otomatis.</div>
    </div>
    <div class="faq-mini-item" onclick="toggleFaqMini(this)">
      <div class="faq-mini-q">Saya mahasiswa, apakah bisa ikut? <span><?php labnesia_icon( 'chevron-down', 'var(--navy)', 16 ); ?></span></div>
      <div class="faq-mini-a">Tentu. Webinar dan komunitas terbuka untuk semua termasuk mahasiswa. Untuk Program Kuliah Praktisi, mintalah dosen atau pihak kampus Anda untuk mengundang Labnesia — gratis untuk kampus yang mengundang. Kelas Pendampingan berbayar lebih cocok untuk yang sudah berperan aktif di lab (Manajer Mutu, Manajer Teknis, dll).</div>
    </div>
    <div style="text-align:center;margin-top:24px">
      <a href="<?php echo $url_faq; ?>" style="font-size:14px;color:var(--teal);font-weight:600;text-decoration:none">Lihat semua FAQ &amp; perbandingan program <?php labnesia_icon( 'arrow-right', 'var(--teal)', 14 ); ?></a>
    </div>
  </div>
</section>

<footer>
    <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <span><a href="https://labnesia.id">labnesia.id</a></span>
  </div>
</footer>

<script>
function submitGap(){alert('Pendaftaran GAP Analysis diterima! Tim kami akan merespons dalam maksimal 3 hari kerja.')}
function joinCommunity(){alert('Terima kasih! Link grup WhatsApp akan kami kirimkan ke nomor Anda dalam beberapa menit.')}
function toggleFaqMini(el){
  const a=el.querySelector('.faq-mini-a');
  const isOpen=a.classList.contains('open');
  document.querySelectorAll('.faq-mini-a').forEach(x=>x.classList.remove('open'));
  if(!isOpen)a.classList.add('open');
}
</script>
<?php wp_footer(); ?>
</body>
</html>
