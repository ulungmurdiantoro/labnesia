<?php
/*
Template Name: Kelas Pendampingan
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
    --navy:#0B1F3A; --navy-mid:#122845; --navy-light:#1C3A60;
    --teal:#1A9E75; --teal-light:#22C28F; --teal-pale:#E8F7F2;
    --amber:#F5A623; --amber-pale:#FEF3DC;
    --white:#FFFFFF; --gray-50:#F8F9FA; --gray-100:#F1F3F5;
    --gray-200:#E9ECEF; --gray-400:#ADB5BD; --gray-600:#6C757D; --gray-800:#343A40;
    --font-display:'Plus Jakarta Sans',sans-serif; --font-serif:'Lora',serif;
  }
  *{box-sizing:border-box;margin:0;padding:0}
  html{scroll-behavior:smooth}
  body{font-family:var(--font-display);color:var(--gray-800);background:var(--white);line-height:1.6}

  /* NAV */
  nav{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(11,31,58,0.97);backdrop-filter:blur(8px);padding:0 48px;height:64px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08)}
  .nav-logo{display:flex;align-items:center;gap:10px}
  .nav-logo-mark{width:36px;height:36px;background:var(--teal);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;color:white;font-size:14px}
  .nav-logo-text{color:white;font-weight:700;font-size:18px;letter-spacing:-0.3px}
  .nav-logo-sub{color:rgba(255,255,255,0.45);font-size:11px;display:block;margin-top:-2px}
  .nav-links{display:flex;align-items:center;gap:28px}
  .nav-links a{color:rgba(255,255,255,0.7);text-decoration:none;font-size:14px;font-weight:500;transition:color .2s}
  .nav-links a:hover{color:white}
  .nav-cta{background:var(--amber);color:var(--navy);padding:8px 20px;border-radius:8px;font-weight:700;font-size:14px;text-decoration:none;transition:all .2s}
  .nav-back{color:rgba(255,255,255,0.5);font-size:13px;text-decoration:none;display:flex;align-items:center;gap:6px}
  .nav-back:hover{color:white}

  /* BREADCRUMB HERO */
  .page-hero{background:var(--navy);padding:104px 48px 64px;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero-inner{max-width:1200px;margin:0 auto;position:relative}
  .breadcrumb{display:flex;align-items:center;gap:8px;margin-bottom:24px}
  .breadcrumb a{color:rgba(255,255,255,0.4);text-decoration:none;font-size:13px;transition:color .2s}
  .breadcrumb a:hover{color:rgba(255,255,255,0.7)}
  .breadcrumb-sep{color:rgba(255,255,255,0.2);font-size:13px}
  .breadcrumb-cur{color:rgba(255,255,255,0.7);font-size:13px}
  .page-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 14px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-eyebrow-dot{width:5px;height:5px;border-radius:50%;background:var(--teal-light);animation:pulse 2s infinite}
  @keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}
  .page-hero h1{font-size:48px;font-weight:800;color:white;line-height:1.1;letter-spacing:-1.5px;margin-bottom:20px;max-width:720px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-family:var(--font-serif);font-style:italic;color:rgba(255,255,255,0.6);font-size:17px;line-height:1.65;max-width:600px;border-left:3px solid var(--teal);padding-left:18px;margin-bottom:36px}
  .hero-meta{display:flex;gap:32px;flex-wrap:wrap}
  .hero-meta-item{display:flex;align-items:center;gap:8px}
  .hero-meta-icon{width:32px;height:32px;background:rgba(255,255,255,0.1);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px}
  .hero-meta-label{font-size:12px;color:rgba(255,255,255,0.45)}
  .hero-meta-val{font-size:14px;font-weight:700;color:white}

  /* STICKY PRICING BAR */
  .sticky-bar{position:sticky;top:64px;z-index:80;background:white;border-bottom:1px solid var(--gray-200);padding:12px 48px;display:flex;align-items:center;justify-content:space-between;gap:16px}
  .sticky-bar-left{display:flex;align-items:baseline;gap:8px}
  .sticky-price{font-size:26px;font-weight:800;color:var(--navy)}
  .sticky-unit{font-size:14px;color:var(--gray-600)}
  .sticky-promo{background:var(--amber-pale);color:#8B6000;font-size:12px;font-weight:700;padding:3px 10px;border-radius:4px}
  .sticky-actions{display:flex;gap:10px}
  .btn-primary{background:var(--teal);color:white;padding:11px 24px;border-radius:9px;font-weight:700;font-size:14px;text-decoration:none;border:none;cursor:pointer;transition:all .2s;display:inline-block}
  .btn-primary:hover{background:#158a65;transform:translateY(-1px)}
  .btn-amber{background:var(--amber);color:var(--navy);padding:11px 24px;border-radius:9px;font-weight:700;font-size:14px;text-decoration:none;border:none;cursor:pointer;transition:all .2s;display:inline-block}
  .btn-amber:hover{background:#e09620}
  .btn-ghost{background:transparent;color:var(--navy);padding:11px 24px;border-radius:9px;font-weight:600;font-size:14px;text-decoration:none;border:1.5px solid var(--gray-200);cursor:pointer;transition:all .2s;display:inline-block}
  .btn-ghost:hover{border-color:var(--teal);color:var(--teal)}

  /* MAIN LAYOUT */
  .main-layout{max-width:1200px;margin:0 auto;padding:64px 48px;display:grid;grid-template-columns:1fr 360px;gap:64px;align-items:start}
  section{padding:64px 48px}
  .section-inner{max-width:1200px;margin:0 auto}

  /* CONTENT STYLES */
  .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}
  .h2{font-size:34px;font-weight:800;color:var(--navy);line-height:1.15;letter-spacing:-0.8px;margin-bottom:14px}
  .h3{font-size:22px;font-weight:800;color:var(--navy);margin-bottom:16px}
  .body{font-size:16px;color:var(--gray-600);line-height:1.7}

  /* OUTLINE STEPS */
  .outline-step{margin-bottom:12px}
  .outline-header{display:flex;align-items:center;gap:14px;padding:18px 20px;background:var(--gray-50);border:1px solid var(--gray-200);border-radius:12px;cursor:pointer;transition:all .2s}
  .outline-header:hover{border-color:var(--teal);background:var(--teal-pale)}
  .outline-header.active{border-color:var(--teal);background:var(--teal-pale)}
  .outline-num{width:40px;height:40px;border-radius:10px;background:var(--navy);color:white;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:16px;flex-shrink:0}
  .outline-header.active .outline-num{background:var(--teal)}
  .outline-title{flex:1}
  .outline-title-main{font-size:15px;font-weight:700;color:var(--navy)}
  .outline-title-sub{font-size:13px;color:var(--gray-600);margin-top:2px}
  .outline-badge{font-size:11px;font-weight:600;padding:3px 10px;border-radius:4px;background:var(--amber-pale);color:#8B6000;white-space:nowrap}
  .outline-body{display:none;padding:20px;border:1px solid var(--teal);border-top:none;border-radius:0 0 12px 12px;background:white;margin-top:-4px}
  .outline-body.open{display:block}
  .seri-list{display:grid;grid-template-columns:1fr 1fr;gap:12px}
  .seri-item{padding:14px;border:1px solid var(--gray-200);border-radius:10px;background:var(--gray-50)}
  .seri-name{font-size:13px;font-weight:700;color:var(--navy);margin-bottom:6px}
  .seri-outputs{font-size:12px;color:var(--gray-600);line-height:1.5}
  .jp-badge{display:inline-block;background:var(--teal-pale);color:var(--teal);font-size:11px;font-weight:600;padding:2px 8px;border-radius:4px;margin-top:6px}

  /* TIMELINE */
  .timeline{position:relative;padding-left:32px}
  .timeline::before{content:'';position:absolute;left:10px;top:0;bottom:0;width:2px;background:var(--gray-200)}
  .tl-item{position:relative;margin-bottom:20px}
  .tl-dot{position:absolute;left:-32px;top:4px;width:20px;height:20px;border-radius:50%;background:var(--teal);border:3px solid white;box-shadow:0 0 0 2px var(--teal)}
  .tl-month{font-size:11px;font-weight:700;color:var(--teal);letter-spacing:.06em;text-transform:uppercase;margin-bottom:3px}
  .tl-label{font-size:14px;font-weight:600;color:var(--navy);margin-bottom:2px}
  .tl-sub{font-size:13px;color:var(--gray-600)}

  /* BENEFIT LIST */
  .benefit-item{display:flex;align-items:flex-start;gap:14px;padding:16px 0;border-bottom:1px solid var(--gray-200)}
  .benefit-item:last-child{border-bottom:none}
  .benefit-icon{width:44px;height:44px;border-radius:10px;background:var(--teal-pale);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
  .benefit-content{flex:1}
  .benefit-title{font-size:15px;font-weight:700;color:var(--navy);margin-bottom:3px}
  .benefit-desc{font-size:13px;color:var(--gray-600);line-height:1.5}
  .benefit-value{font-size:12px;font-weight:600;color:var(--teal);margin-top:4px}
  .benefit-saving{font-size:12px;color:var(--gray-400);text-decoration:line-through}

  /* PRICING SIDEBAR */
  .price-card{background:white;border:2px solid var(--teal);border-radius:20px;overflow:hidden;position:sticky;top:140px}
  .price-card-header{background:var(--navy);padding:28px}
  .price-card-eyebrow{font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:8px}
  .price-card-title{font-size:22px;font-weight:800;color:white;margin-bottom:16px}
  .price-row{display:flex;align-items:baseline;gap:8px;margin-bottom:8px}
  .price-main{font-size:36px;font-weight:800;color:var(--amber);letter-spacing:-1px}
  .price-unit{font-size:14px;color:rgba(255,255,255,0.5)}
  .price-options{display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;margin-top:16px}
  .price-opt{background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:12px 8px;text-align:center;cursor:pointer;transition:all .2s}
  .price-opt:hover,.price-opt.active{background:rgba(26,158,117,0.2);border-color:rgba(26,158,117,0.5)}
  .price-opt-num{font-size:11px;color:rgba(255,255,255,0.4);margin-bottom:4px}
  .price-opt-val{font-size:15px;font-weight:800;color:white}
  .price-opt-sub{font-size:10px;color:rgba(255,255,255,0.4);margin-top:2px}
  .price-opt.active .price-opt-num,.price-opt.active .price-opt-sub{color:var(--teal-light)}
  .price-opt.best .price-opt-val{color:var(--amber)}
  .best-badge{background:var(--amber);color:var(--navy);font-size:9px;font-weight:800;padding:2px 6px;border-radius:3px;display:block;margin-top:4px;letter-spacing:.04em}
  .price-card-body{padding:24px}
  .price-feature{display:flex;align-items:flex-start;gap:10px;margin-bottom:12px}
  .pf-check{color:var(--teal);font-size:15px;flex-shrink:0;margin-top:2px;font-weight:700}
  .pf-text{font-size:13px;color:var(--gray-600);line-height:1.45}
  .pf-free{font-size:11px;font-weight:700;color:var(--teal);display:block}
  .price-cta{padding:0 24px 24px}
  .price-cta .btn-amber{display:block;width:100%;text-align:center;font-size:15px;padding:14px}
  .price-cta .btn-ghost{display:block;width:100%;text-align:center;margin-top:8px;font-size:14px;padding:11px}
  .urgency{background:var(--amber-pale);border:1px solid #F5A623;border-radius:8px;padding:10px 14px;text-align:center;margin:0 24px 20px}
  .urgency-text{font-size:12px;font-weight:600;color:#8B6000}
  .guarantee{display:flex;align-items:center;gap:10px;padding:14px 24px;background:var(--teal-pale);border-top:1px solid rgba(26,158,117,0.2)}
  .guarantee-icon{font-size:22px}
  .guarantee-text{font-size:12px;color:var(--teal);font-weight:500;line-height:1.4}

  /* EXPERT GRID */
  .expert-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
  .expert-card{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:12px;padding:18px}
  .expert-avatar{width:52px;height:52px;border-radius:50%;background:var(--navy);color:white;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:16px;margin-bottom:12px}
  .expert-name{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:4px;line-height:1.3}
  .expert-role{font-size:12px;color:var(--gray-600);line-height:1.5}
  .expert-tags{display:flex;flex-wrap:wrap;gap:4px;margin-top:8px}
  .expert-tag{font-size:10px;padding:2px 7px;background:var(--teal-pale);color:var(--teal);border-radius:3px;font-weight:600}

  /* FAQ */
  .faq-item{border-bottom:1px solid var(--gray-200);padding:20px 0}
  .faq-q{font-size:16px;font-weight:700;color:var(--navy);cursor:pointer;display:flex;justify-content:space-between;align-items:center;gap:16px}
  .faq-chevron{font-size:18px;color:var(--gray-400);transition:transform .2s;flex-shrink:0}
  .faq-a{font-size:15px;color:var(--gray-600);line-height:1.7;margin-top:12px;display:none}
  .faq-a.open{display:block}
  .faq-item.active .faq-chevron{transform:rotate(180deg)}

  /* COMPARISON */
  .comp-table{width:100%;border-collapse:collapse;margin-top:24px}
  .comp-table th{padding:12px 16px;text-align:left;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--gray-600);border-bottom:2px solid var(--gray-200)}
  .comp-table td{padding:14px 16px;font-size:14px;border-bottom:1px solid var(--gray-100)}
  .comp-table tr:last-child td{border-bottom:none}
  .comp-table .col-feat{color:var(--gray-800);font-weight:500}
  .comp-check{color:var(--teal);font-weight:700}
  .comp-cross{color:var(--gray-400)}
  .comp-table .highlight-col{background:var(--teal-pale)}
  .comp-table th.highlight-col{background:var(--teal);color:white;border-radius:8px 8px 0 0}

  /* TESTIMONIAL */
  .testimonial-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}
  .testimonial{background:white;border:1px solid var(--gray-200);border-radius:16px;padding:28px}
  .stars{color:var(--amber);font-size:16px;margin-bottom:14px;letter-spacing:2px}
  .test-text{font-family:var(--font-serif);font-style:italic;font-size:15px;color:var(--gray-800);line-height:1.7;margin-bottom:20px}
  .test-author{display:flex;align-items:center;gap:12px}
  .test-avatar{width:44px;height:44px;border-radius:50%;background:var(--teal);display:flex;align-items:center;justify-content:center;font-weight:700;color:white;font-size:15px;flex-shrink:0}
  .test-name{font-size:14px;font-weight:700;color:var(--navy)}
  .test-role{font-size:12px;color:var(--gray-600)}
  .lab-badge{display:inline-block;background:var(--teal-pale);color:var(--teal);font-size:11px;font-weight:600;padding:2px 8px;border-radius:4px;margin-top:4px}

  /* CTA SECTION */
  .cta-section{background:var(--navy);padding:80px 48px;text-align:center;position:relative;overflow:hidden}
  .cta-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.2) 0%,transparent 60%)}
  .cta-inner{max-width:680px;margin:0 auto;position:relative}
  .cta-title{font-size:40px;font-weight:800;color:white;line-height:1.15;letter-spacing:-1px;margin-bottom:14px}
  .cta-sub{font-size:17px;color:rgba(255,255,255,0.6);line-height:1.6;margin-bottom:36px}
  .cta-actions{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}
  .cta-note{font-size:13px;color:rgba(255,255,255,0.35);margin-top:16px}

  /* FOOTER */
  footer{background:var(--navy);padding:48px;border-top:1px solid rgba(255,255,255,0.08)}
  .footer-bottom{max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;font-size:13px;color:rgba(255,255,255,0.4)}
  .footer-bottom a{color:rgba(255,255,255,0.35);text-decoration:none}

  /* UTILITY */
  .bg-gray{background:var(--gray-50)}
  .tag-batch{display:inline-flex;align-items:center;gap:6px;background:rgba(245,166,35,0.15);border:1px solid rgba(245,166,35,0.3);color:#8B5800;padding:4px 12px;border-radius:6px;font-size:12px;font-weight:700}
</style>
</head>
<body <?php body_class( 'page-kelas-pendampingan' ); ?>>
<?php wp_body_open(); ?>

<!-- NAV -->
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

<!-- PAGE HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo $url_home; ?>">Beranda</a>
      <span class="breadcrumb-sep">›</span>
      <a href="#">Program</a>
      <span class="breadcrumb-sep">›</span>
      <span class="breadcrumb-cur">Kelas Pendampingan ISO/IEC 17025</span>
    </div>
    <div class="page-eyebrow"><div class="page-eyebrow-dot"></div> Produk Unggulan 2026</div>
    <h1>Kelas Pendampingan<br>Akreditasi <span class="accent">ISO/IEC 17025</span></h1>
    <p class="page-hero-sub">Program publik 6 bulan yang membawa lab Anda dari kondisi saat ini hingga siap menghadapi asesmen KAN — dengan output nyata di setiap tahap, bukan hanya materi seminar.</p>
    <div class="hero-meta">
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'calendar', 'rgba(255,255,255,.9)', 15 ); ?></div>
        <div>
          <div class="hero-meta-label">Durasi program</div>
          <div class="hero-meta-val">3–6 bulan</div>
        </div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'globe', 'rgba(255,255,255,.9)', 15 ); ?></div>
        <div>
          <div class="hero-meta-label">Format</div>
          <div class="hero-meta-val">Online / Hybrid</div>
        </div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'users', 'rgba(255,255,255,.9)', 15 ); ?></div>
        <div>
          <div class="hero-meta-label">Kapasitas</div>
          <div class="hero-meta-val">Maks. 10 instansi/batch</div>
        </div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'trophy', 'rgba(255,255,255,.9)', 15 ); ?></div>
        <div>
          <div class="hero-meta-label">Track record</div>
          <div class="hero-meta-val">30+ lab berhasil membangun sistem mutu & meraih akreditasi</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- STICKY PRICING BAR -->
<div class="sticky-bar">
  <div style="display:flex;align-items:center;gap:20px">
    <div class="sticky-bar-left">
      <span class="sticky-price">Rp 14 jt</span>
      <span class="sticky-unit">/peserta · mulai dari</span>
    </div>
    <span class="sticky-promo"><?php labnesia_icon( 'zap', '#8B6000', 12 ); ?> Hemat s.d. Rp 20 juta</span>
    <span style="font-size:13px;color:var(--gray-600)">Batch dibuka tiap 1–2 bulan — kuota terbatas</span>
  </div>
  <div class="sticky-actions">
    <a href="#outline" class="btn-ghost">Lihat Outline</a>
    <a href="#daftar" class="btn-primary">Daftar Sekarang</a>
    <a href="<?php echo $url_gratis; ?>" class="btn-amber">Konsultasi Gratis Dulu</a>
  </div>
</div>

<!-- MAIN CONTENT + SIDEBAR -->
<div class="main-layout">
  <!-- LEFT CONTENT -->
  <div>

    <!-- WHO IS THIS FOR -->
    <div style="margin-bottom:56px">
      <p class="eyebrow">Untuk siapa program ini?</p>
      <h2 class="h2">Dirancang khusus untuk<br>laboratorium yang ingin bergerak.</h2>
      <p class="body" style="margin-bottom:24px">Program ini tepat untuk Anda jika laboratorium sedang menghadapi situasi berikut:</p>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
        <div style="display:flex;gap:10px;padding:14px;background:var(--teal-pale);border-radius:10px;border:1px solid rgba(26,158,117,0.2)">
          <span style="flex-shrink:0"><?php labnesia_icon( 'check', 'var(--teal)', 18 ); ?></span>
          <p style="font-size:14px;color:#085041;line-height:1.5">Lab belum punya sistem mutu sama sekali dan tidak tahu harus mulai dari mana</p>
        </div>
        <div style="display:flex;gap:10px;padding:14px;background:var(--teal-pale);border-radius:10px;border:1px solid rgba(26,158,117,0.2)">
          <span style="flex-shrink:0"><?php labnesia_icon( 'check', 'var(--teal)', 18 ); ?></span>
          <p style="font-size:14px;color:#085041;line-height:1.5">Punya dokumen tapi tidak yakin apakah sudah sesuai persyaratan KAN</p>
        </div>
        <div style="display:flex;gap:10px;padding:14px;background:var(--teal-pale);border-radius:10px;border:1px solid rgba(26,158,117,0.2)">
          <span style="flex-shrink:0"><?php labnesia_icon( 'check', 'var(--teal)', 18 ); ?></span>
          <p style="font-size:14px;color:#085041;line-height:1.5">Anggaran terbatas — tidak mampu konsultan in-house yang 150–200 juta</p>
        </div>
        <div style="display:flex;gap:10px;padding:14px;background:var(--teal-pale);border-radius:10px;border:1px solid rgba(26,158,117,0.2)">
          <span style="flex-shrink:0"><?php labnesia_icon( 'check', 'var(--teal)', 18 ); ?></span>
          <p style="font-size:14px;color:#085041;line-height:1.5">Proses pengadaan instansi panjang — perlu mulai sebagai individu dulu</p>
        </div>
        <div style="display:flex;gap:10px;padding:14px;background:var(--teal-pale);border-radius:10px;border:1px solid rgba(26,158,117,0.2)">
          <span style="flex-shrink:0"><?php labnesia_icon( 'check', 'var(--teal)', 18 ); ?></span>
          <p style="font-size:14px;color:#085041;line-height:1.5">Tim lab bergantung pada satu orang saja yang paham sistem mutu</p>
        </div>
        <div style="display:flex;gap:10px;padding:14px;background:var(--teal-pale);border-radius:10px;border:1px solid rgba(26,158,117,0.2)">
          <span style="flex-shrink:0"><?php labnesia_icon( 'check', 'var(--teal)', 18 ); ?></span>
          <p style="font-size:14px;color:#085041;line-height:1.5">Lab ingin menjadi profit center & income generator untuk institusi</p>
        </div>
      </div>
    </div>

    <!-- OUTLINE -->
    <div id="outline" style="margin-bottom:56px">
      <p class="eyebrow">Outline Program</p>
      <h2 class="h2">4 Tahap sistematis,<br>13 sesi, output nyata.</h2>
      <p class="body" style="margin-bottom:28px">Setiap sesi dirancang untuk menghasilkan dokumen, laporan, atau deliverable yang langsung bisa digunakan oleh lab Anda — bukan hanya catatan pelatihan.</p>

      <div class="outline-step">
        <div class="outline-header active" onclick="toggleOutline(this)">
          <div class="outline-num">1</div>
          <div class="outline-title">
            <div class="outline-title-main">Awareness & GAP Analysis</div>
            <div class="outline-title-sub">Memahami standar, sistem KANMIS, dan peta jalan lab Anda</div>
          </div>
          <span class="outline-badge">12 JP · 3 sesi</span>
          <span style="margin-left:8px"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 18 ); ?></span>
        </div>
        <div class="outline-body open">
          <div class="seri-list">
            <div class="seri-item">
              <div class="seri-name">Awareness ISO/IEC 17025:2017</div>
              <div class="seri-outputs">Output: Pedoman SNI ISO 17025, Daftar Induk Dokumen</div>
              <span class="jp-badge">4 JP</span>
            </div>
            <div class="seri-item">
              <div class="seri-name">Submission Akreditasi — KANMIS 2.0</div>
              <div class="seri-outputs">Output: Tutorial pendaftaran KANMIS, Checklist audit kecukupan</div>
              <span class="jp-badge">4 JP</span>
            </div>
            <div class="seri-item" style="grid-column:span 2">
              <div class="seri-name">GAP Analysis (Project-Based Learning)</div>
              <div class="seri-outputs">Output: Laporan GAP Analysis, Penetapan Ruang Lingkup, Struktur Organisasi Mutu, Roadmap Implementasi 6 bulan</div>
              <span class="jp-badge">4 JP</span>
            </div>
          </div>
        </div>
      </div>

      <div class="outline-step">
        <div class="outline-header" onclick="toggleOutline(this)">
          <div class="outline-num">2</div>
          <div class="outline-title">
            <div class="outline-title-main">Penyusunan Dokumen Standar ISO 17025</div>
            <div class="outline-title-sub">Panduan Mutu, SOP, Instruksi Kerja, dan Formulir siap pakai</div>
          </div>
          <span class="outline-badge">4 JP · 1 sesi</span>
          <span style="margin-left:8px"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 18 ); ?></span>
        </div>
        <div class="outline-body">
          <div class="seri-list">
            <div class="seri-item" style="grid-column:span 2">
              <div class="seri-name">Workshop Penyusunan Dokumen Standar ISO 17025</div>
              <div class="seri-outputs">Output: Template Dokumen Mutu ISO/IEC 17025:2017 lengkap — Level 1 (Panduan Mutu), Level 2 (SOP), Level 4 (Formulir). Siap diadaptasi untuk lab Anda.</div>
              <span class="jp-badge">4 JP</span>
            </div>
          </div>
        </div>
      </div>

      <div class="outline-step">
        <div class="outline-header" onclick="toggleOutline(this)">
          <div class="outline-num">3</div>
          <div class="outline-title">
            <div class="outline-title-main">Pelatihan Kompetensi Teknis Pengujian</div>
            <div class="outline-title-sub">Uji Profisiensi, Verifikasi Metode, Ketidakpastian, Jaminan Mutu Internal</div>
          </div>
          <span class="outline-badge">28 JP · 4 sesi</span>
          <span style="margin-left:8px"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 18 ); ?></span>
        </div>
        <div class="outline-body">
          <div class="seri-list">
            <div class="seri-item">
              <div class="seri-name">Uji Profisiensi / Uji Banding</div>
              <div class="seri-outputs">Output: Laporan Uji Profisiensi, Draft Rencana UP/UB 5 tahun</div>
              <span class="jp-badge">8 JP</span>
            </div>
            <div class="seri-item">
              <div class="seri-name">Verifikasi dan Validasi Metode</div>
              <div class="seri-outputs">Output: Laporan Verifikasi & Validasi Metode</div>
              <span class="jp-badge">8 JP</span>
            </div>
            <div class="seri-item">
              <div class="seri-name">Ketidakpastian Pengujian</div>
              <div class="seri-outputs">Output: Laporan Ketidakpastian sesuai parameter lab</div>
              <span class="jp-badge">8 JP</span>
            </div>
            <div class="seri-item">
              <div class="seri-name">Jaminan Mutu Internal</div>
              <div class="seri-outputs">Output: Laporan Control Chart, pengecekan antar alat, replika, uji banding antar analis</div>
              <span class="jp-badge">4 JP</span>
            </div>
          </div>
        </div>
      </div>

      <div class="outline-step">
        <div class="outline-header" onclick="toggleOutline(this)">
          <div class="outline-num">4</div>
          <div class="outline-title">
            <div class="outline-title-main">Evaluasi & Peningkatan</div>
            <div class="outline-title-sub">Audit Internal dan Kaji Ulang Manajemen — siap diverifikasi KAN</div>
          </div>
          <span class="outline-badge">20 JP · 2 sesi</span>
          <span style="margin-left:8px"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 18 ); ?></span>
        </div>
        <div class="outline-body">
          <div class="seri-list">
            <div class="seri-item">
              <div class="seri-name">Audit Internal (AI) — ISO 19011:2018</div>
              <div class="seri-outputs">Output: Program AI, Penunjukan Tim, Rencana Audit, Checklist, NCR, Laporan AI, Evaluasi Auditor</div>
              <span class="jp-badge">16 JP</span>
            </div>
            <div class="seri-item">
              <div class="seri-name">Kaji Ulang Manajemen (KUM)</div>
              <div class="seri-outputs">Output: Pemberitahuan, Penunjukan Tim, Matriks KUM, Laporan KUM</div>
              <span class="jp-badge">4 JP</span>
            </div>
          </div>
        </div>
      </div>

      <div style="background:var(--amber-pale);border:1px solid rgba(245,166,35,0.3);border-radius:12px;padding:20px;display:flex;gap:14px;align-items:flex-start;margin-top:16px">
        <span style="flex-shrink:0"><?php labnesia_icon( 'target', '#6B4400', 24 ); ?></span>
        <div>
          <p style="font-size:14px;font-weight:700;color:#6B4400;margin-bottom:4px">Setelah Tahap 4, lab Anda siap Audit Internal</p>
          <p style="font-size:13px;color:#8B5800;line-height:1.5">Untuk lanjut ke Tahap 5 (pendaftaran KAN, audit kelayakan, simulasi asesmen), tersedia <strong>Kelas Lanjutan Privat</strong> seharga Rp 36 jt/lab — atau langsung Full Pendampingan Rp 150–200 jt untuk jalur nol hingga akreditasi.</p>
        </div>
      </div>

      <div style="background:var(--teal-pale);border:1px solid rgba(26,158,117,0.25);border-radius:10px;padding:16px 18px;margin-top:12px;display:flex;gap:12px;align-items:flex-start">
        <span style="font-size:20px;flex-shrink:0"><?php labnesia_icon( 'refresh-cw', '#085041', 20 ); ?></span>
        <div>
          <p style="font-size:13px;font-weight:700;color:#085041;margin-bottom:3px">Setelah terakreditasi, jangan berhenti di sini.</p>
          <p style="font-size:13px;color:#0F6E56;line-height:1.5">Lab yang sudah terakreditasi perlu mempertahankan statusnya setiap tahun menghadapi surveillance dan menjaga kompetensi SDM yang terus berganti. <strong>Annual Partnership Labnesia</strong> hadir sebagai solusi — mulai Rp 36 jt/tahun, sudah include pelatihan premium untuk SDM, update dokumen, dan pendampingan audit internal. <a href="<?php echo $url_inhouse; ?>" style="color:var(--teal);font-weight:600">Pelajari Annual Partnership <?php labnesia_icon( 'arrow-right', 'var(--teal)', 13 ); ?></a></p>
        </div>
      </div>
    </div>

    <!-- TIMELINE -->
    <div style="margin-bottom:56px">
      <p class="eyebrow">Timeline Contoh Satu Batch</p>
      <h2 class="h2">6 bulan, setiap langkah<br>punya target jelas.</h2>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-top:28px">
        <div class="timeline">
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 1 · W3</div><div class="tl-label">Awareness ISO 17025</div><div class="tl-sub">Pemahaman standar & sistem mutu</div></div>
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 1 · W4</div><div class="tl-label">GAP Analysis</div><div class="tl-sub">Peta kondisi lab + roadmap program</div></div>
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 2 · W1</div><div class="tl-label">Workshop Dokumen ISO 17025</div><div class="tl-sub">Template PM, SOP, IK, Formulir</div></div>
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 2 · W3</div><div class="tl-label">Uji Profisiensi / Uji Banding</div><div class="tl-sub">Rencana & laporan UP/UB</div></div>
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 3 · W1</div><div class="tl-label">Verifikasi & Validasi Metode</div><div class="tl-sub">Laporan VVM per parameter</div></div>
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 3 · W3</div><div class="tl-label">Ketidakpastian Pengujian</div><div class="tl-sub">Laporan per parameter lab</div></div>
        </div>
        <div class="timeline">
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 4 · W1</div><div class="tl-label">Jaminan Mutu Internal</div><div class="tl-sub">Control chart, replika, antar analis</div></div>
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 4 · W3</div><div class="tl-label">Audit Internal</div><div class="tl-sub">Simulasi AI + laporan lengkap</div></div>
          <div class="tl-item"><div class="tl-dot"></div><div class="tl-month">Bulan 5 · W2</div><div class="tl-label">Kaji Ulang Manajemen</div><div class="tl-sub">Rapat KUM + matriks tindak lanjut</div></div>
          <div class="tl-item"><div class="tl-dot" style="background:var(--amber)"></div><div class="tl-month">Bulan 5 · W4</div><div class="tl-label"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?> Siap Audit Internal</div><div class="tl-sub">Lab selesai Tahap 1–4</div></div>
          <div class="tl-item"><div class="tl-dot" style="background:var(--gray-400)"></div><div class="tl-month">Bulan 6 (opsional)</div><div class="tl-label">Kelas Lanjutan (opsional)</div><div class="tl-sub">Pendaftaran akreditasi & simulasi asesmen</div></div>
        </div>
      </div>
    </div>

    <!-- BENEFITS -->
    <div style="margin-bottom:56px">
      <p class="eyebrow">Yang Anda dapatkan</p>
      <h2 class="h2">7 benefit, hemat hingga<br>Rp 20 juta.</h2>
      <div>
        <div class="benefit-item">
          <div class="benefit-icon"><?php labnesia_icon( 'user-check', 'var(--teal)', 20 ); ?></div>
          <div class="benefit-content">
            <div class="benefit-title">Pendampingan langsung oleh Pakar berpengalaman</div>
            <div class="benefit-desc">Dipandu oleh 15+ pakar aktif dengan rekam jejak akreditasi lab nyata di seluruh Indonesia — bukan hanya akademisi atau trainer teori.</div>
          </div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon"><?php labnesia_icon( 'graduation-cap', 'var(--teal)', 20 ); ?></div>
          <div class="benefit-content">
            <div class="benefit-title">GRATIS Pelatihan Tambahan 40 JP</div>
            <div class="benefit-desc">Materi: Lead Implementer atau Auditor Internal ISO/IEC 17025 — bertujuan meningkatkan kompetensi peserta dalam menerapkan standar. Pelatihan ini terpisah dan independen dari proses uji kompetensi di LSP Edukia.</div>
            <div style="display:flex;gap:8px;margin-top:6px">
              <span class="benefit-value">GRATIS</span>
              <span class="benefit-saving">Rp 6.500.000</span>
            </div>
          </div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon"><?php labnesia_icon( 'clipboard-list', 'var(--teal)', 20 ); ?></div>
          <div class="benefit-content">
            <div class="benefit-title">GRATIS Template Dokumen ISO/IEC 17025 Lengkap</div>
            <div class="benefit-desc">Panduan Mutu (PM), SOP, Instruksi Kerja (IK), dan Formulir (FM) — sudah terstandarisasi dan bisa langsung diadaptasi untuk lab Anda.</div>
            <div style="display:flex;gap:8px;margin-top:6px">
              <span class="benefit-value">GRATIS</span>
              <span class="benefit-saving">Rp 3.500.000</span>
            </div>
          </div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon"><?php labnesia_icon( 'message-circle', 'var(--teal)', 20 ); ?></div>
          <div class="benefit-content">
            <div class="benefit-title">GRATIS 1 Sesi Konsultasi Privat 1-on-1</div>
            <div class="benefit-desc">Setiap peserta mendapat satu sesi konsultasi personal dengan pakar pilihan untuk membahas kondisi spesifik lab Anda.</div>
            <div style="display:flex;gap:8px;margin-top:6px">
              <span class="benefit-value">GRATIS</span>
              <span class="benefit-saving">Rp 3.000.000</span>
            </div>
          </div>
        </div>

        <!-- DISCLAIMER WAJIB -->
        <div style="background:var(--gray-50);border:1px solid var(--gray-200);border-left:3px solid var(--gray-400);border-radius:0 8px 8px 0;padding:14px 16px;margin:8px 0 16px">
          <p style="font-size:11px;font-weight:700;color:var(--gray-600);margin-bottom:4px;text-transform:uppercase;letter-spacing:.05em">Catatan Penting — Uji Kompetensi</p>
          <p style="font-size:12px;color:var(--gray-600);line-height:1.65">Pelatihan yang diselenggarakan Labnesia dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administrasi untuk mengikuti uji kompetensi pada skema tertentu di LSP Edukia (Lembaga Sertifikasi Profesi) sesuai ketentuan yang berlaku. <strong>Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta langsung kepada LSP Edukia</strong> — Labnesia hanya berperan sebagai penyelenggara pelatihan dan penyampaian informasi. <strong>Keikutsertaan dalam pelatihan tidak menjamin kelulusan uji kompetensi.</strong> Keputusan dan seluruh proses uji kompetensi dilaksanakan secara independen oleh LSP Edukia sesuai SNI ISO/IEC 17024. Jadwal resmi uji kompetensi dipublikasikan melalui media LSP Edukia secara terpisah.</p>
        </div>

        <div class="benefit-item">
          <div class="benefit-icon"><?php labnesia_icon( 'mic', 'var(--teal)', 20 ); ?></div>
          <div class="benefit-content">
            <div class="benefit-title">GRATIS Akses Webinar, Bootcamp & Workshop 1 Tahun</div>
            <div class="benefit-desc">Semua event publik Labnesia selama satu tahun penuh bisa diikuti tanpa biaya tambahan — termasuk webinar tematik per bidang lab.</div>
            <div style="display:flex;gap:8px;margin-top:6px">
              <span class="benefit-value">GRATIS</span>
              <span class="benefit-saving">Rp 5.000.000</span>
            </div>
          </div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon"><?php labnesia_icon( 'award', 'var(--teal)', 20 ); ?></div>
          <div class="benefit-content">
            <div class="benefit-title">Sertifikat Pelatihan di Setiap Sesi</div>
            <div class="benefit-desc">Akumulasi jam pelatihan (JP) yang bisa digunakan untuk keperluan rekognisi kompetensi di institusi Anda.</div>
          </div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon"><?php labnesia_icon( 'globe', 'var(--teal)', 20 ); ?></div>
          <div class="benefit-content">
            <div class="benefit-title">Akses Grup Diskusi Eksklusif Nasional</div>
            <div class="benefit-desc">Forum antar Manajer Mutu, Manajer Teknis, dan analis lab dari seluruh Indonesia — konsultasi, sharing temuan asesmen, dan update regulasi KAN terbaru.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- EXPERTS -->
    <div style="margin-bottom:56px">
      <p class="eyebrow">Para Pakar</p>
      <h2 class="h2">Dipandu oleh praktisi —<br>bukan hanya pengajar.</h2>
      <div class="expert-grid">
        <div class="expert-card">
          <div class="expert-avatar">MY</div>
          <div class="expert-name">Mulyono, S.TP.</div>
          <div class="expert-role">Manajer Mutu Laboratorium · Konsultan Akreditasi</div>
          <div class="expert-tags"><span class="expert-tag">ISO 17025</span><span class="expert-tag">Kimia</span></div>
        </div>
        <div class="expert-card">
          <div class="expert-avatar">FI</div>
          <div class="expert-name">Ir. Fajri Mulya Iresha, Ph.D., CLLI, CLIA</div>
          <div class="expert-role">Trainer ISO/IEC 17025 · Lab Lingkungan</div>
          <div class="expert-tags"><span class="expert-tag">Lingkungan</span><span class="expert-tag">CLIA</span></div>
        </div>
        <div class="expert-card">
          <div class="expert-avatar">HA</div>
          <div class="expert-name">Hanim Zuhrotul Amanah, Ph.D.</div>
          <div class="expert-role">Manajer Mutu Lab Pangan · Konsultan Akreditasi</div>
          <div class="expert-tags"><span class="expert-tag">Pangan</span><span class="expert-tag">GLP</span></div>
        </div>
        <div class="expert-card">
          <div class="expert-avatar">IP</div>
          <div class="expert-name">Indra Permana, S.P., M.P.</div>
          <div class="expert-role">Manajer Teknis · Kepala Lab Tanah</div>
          <div class="expert-tags"><span class="expert-tag">Pertanian</span><span class="expert-tag">Ilmu Tanah</span></div>
        </div>
        <div class="expert-card">
          <div class="expert-avatar">CP</div>
          <div class="expert-name">Chandra Pribadi, S.T.</div>
          <div class="expert-role">Manajer Mutu · Batu Bara & Mineral</div>
          <div class="expert-tags"><span class="expert-tag">Mineral</span><span class="expert-tag">Energi</span></div>
        </div>
        <div class="expert-card">
          <div class="expert-avatar">PR</div>
          <div class="expert-name">Prof. Riyanto, Ph.D.</div>
          <div class="expert-role">Dekan FMIPA UII · Manajer Mutu Lab</div>
          <div class="expert-tags"><span class="expert-tag">Kimia</span><span class="expert-tag">K3</span></div>
        </div>
      </div>
      <p style="font-size:13px;color:var(--gray-600);margin-top:16px;text-align:center">+9 pakar lainnya sesuai bidang lab dan topik yang sedang berjalan</p>
    </div>

    <!-- COMPARISON TABLE -->
    <div style="margin-bottom:56px">
      <p class="eyebrow">Perbandingan Program</p>
      <h2 class="h2">Pilih yang sesuai<br>kondisi lab Anda.</h2>
      <div style="overflow-x:auto">
        <table class="comp-table">
          <thead>
            <tr>
              <th>Aspek</th>
              <th>Mandiri</th>
              <th class="highlight-col">Kelas Pendampingan <?php labnesia_icon( 'star', '#ffffff', 14 ); ?></th>
              <th>Full In-House</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="col-feat">Biaya</td>
              <td>Gratis (modal waktu)</td>
              <td class="highlight-col"><strong>Rp 14–35 jt/lab</strong></td>
              <td>Rp 150–200 jt/lab</td>
            </tr>
            <tr>
              <td class="col-feat">Durasi rata-rata</td>
              <td>2–4 tahun (banyak yang gagal)</td>
              <td class="highlight-col"><strong>6 bulan terstruktur</strong></td>
              <td>6–12 bulan</td>
            </tr>
            <tr>
              <td class="col-feat">Panduan pakar</td>
              <td><span class="comp-cross">—</span></td>
              <td class="highlight-col"><span class="comp-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span> 15+ pakar aktif</td>
              <td><span class="comp-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span> 1–2 konsultan</td>
            </tr>
            <tr>
              <td class="col-feat">Output per sesi</td>
              <td><span class="comp-cross">—</span></td>
              <td class="highlight-col"><span class="comp-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span> Dokumen siap pakai</td>
              <td><span class="comp-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span></td>
            </tr>
            <tr>
              <td class="col-feat">Pelatihan tambahan terkait uji kompetensi*</td>
              <td><span class="comp-cross">—</span></td>
              <td class="highlight-col"><span class="comp-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span> Gratis (Rp 6,5 jt)</td>
              <td><span class="comp-cross">Tambahan biaya</span></td>
            </tr>
            <tr>
              <td class="col-feat">Template dokumen</td>
              <td><span class="comp-cross">Cari sendiri</span></td>
              <td class="highlight-col"><span class="comp-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span> Gratis (Rp 3,5 jt)</td>
              <td><span class="comp-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span></td>
            </tr>
            <tr>
              <td class="col-feat">Peserta per batch</td>
              <td>—</td>
              <td class="highlight-col"><strong>Maks. 10 instansi</strong></td>
              <td>1 instansi</td>
            </tr>
            <tr>
              <td class="col-feat">Networking antar lab</td>
              <td><span class="comp-cross">—</span></td>
              <td class="highlight-col"><span class="comp-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span> Grup eksklusif nasional</td>
              <td><span class="comp-cross">—</span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <p style="font-size:11px;color:var(--gray-400);margin-top:10px;line-height:1.5">*Pelatihan terkait uji kompetensi bersifat independen dari proses sertifikasi. Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta kepada LSP Edukia. Keikutsertaan dalam pelatihan tidak menjamin kelulusan uji kompetensi.</p>
    </div>

    <!-- TESTIMONIALS -->
    <div style="margin-bottom:56px">
      <p class="eyebrow">Kata Alumni</p>
      <h2 class="h2">Mereka sudah membuktikan.<br>30+ lab berhasil membangun sistem mutu & meraih akreditasi.</h2>
      <div class="testimonial-grid">
        <div class="testimonial">
          <div class="stars">★★★★★</div>
          <div class="test-text">"Pendampingan yang dilakukan sangat baik dan menyenangkan, kami merasakan atmosfer kekeluargaan. Metode ini menjadi kunci kelancaran kami dalam proses Akreditasi KAN. Kami mendapat wawasan baru serta info terupdate seputar laboratorium."</div>
          <div class="test-author">
            <div class="test-avatar">WS</div>
            <div>
              <div class="test-name">Wawan Abdullah Setiawan, S.Si., M.Si.</div>
              <div class="test-role">Ketua Divisi Biomolekuler</div>
              <div class="lab-badge">UPT Lab Terpadu Universitas Lampung · LP-1130-IDN</div>
            </div>
          </div>
        </div>
        <div class="testimonial">
          <div class="stars">★★★★★</div>
          <div class="test-text">"Program ini berbeda dari pelatihan biasa — setiap sesi kami langsung mengerjakan dokumen nyata untuk lab kami. Keluar dari sesi, ada output yang langsung bisa dipakai. Tidak ada yang lebih efisien dari ini."</div>
          <div class="test-author">
            <div class="test-avatar">RT</div>
            <div>
              <div class="test-name">Manajer Mutu Laboratorium</div>
              <div class="test-role">Laboratorium Pangan & Gizi</div>
              <div class="lab-badge">Universitas Gadjah Mada · LP-1709-IDN</div>
            </div>
          </div>
        </div>
      </div>
      <div style="margin-top:20px;display:flex;flex-wrap:wrap;gap:8px;align-items:center">
        <span style="font-size:13px;color:var(--gray-600);font-weight:600">Lab yang sudah bergabung:</span>
        <span style="font-size:12px;background:white;border:1px solid var(--gray-200);padding:4px 12px;border-radius:6px;color:var(--gray-600)">UGM · LP-1709-IDN</span>
        <span style="font-size:12px;background:white;border:1px solid var(--gray-200);padding:4px 12px;border-radius:6px;color:var(--gray-600)">Univ. Jambi · LP-1774-IDN</span>
        <span style="font-size:12px;background:white;border:1px solid var(--gray-200);padding:4px 12px;border-radius:6px;color:var(--gray-600)">Univ. Lampung · LP-1130-IDN</span>
        <span style="font-size:12px;background:white;border:1px solid var(--gray-200);padding:4px 12px;border-radius:6px;color:var(--gray-600)">USU · LP-1779-IDN</span>
        <span style="font-size:12px;color:var(--teal);font-weight:600">+26 lainnya <?php labnesia_icon( 'arrow-right', 'var(--teal)', 12 ); ?></span>
      </div>
    </div>

  </div>

  <!-- RIGHT SIDEBAR -->
  <div id="daftar">
    <div class="price-card">
      <div class="price-card-header">
        <div class="price-card-eyebrow">Kelas Pendampingan · Batch Dibuka Rutin</div>
        <div class="price-card-title">Akreditasi Lab ISO/IEC 17025</div>
        <div class="price-row">
          <span class="price-main" id="price-display">Rp 14 jt</span>
          <span class="price-unit">/peserta</span>
        </div>
        <div class="price-options">
          <div class="price-opt active" onclick="selectPrice(this,'Rp 14 jt','1 peserta')">
            <div class="price-opt-num">1 peserta</div>
            <div class="price-opt-val">14 jt</div>
            <div class="price-opt-sub">per orang</div>
          </div>
          <div class="price-opt" onclick="selectPrice(this,'Rp 26 jt','2 peserta')">
            <div class="price-opt-num">2 peserta</div>
            <div class="price-opt-val">26 jt</div>
            <div class="price-opt-sub">hemat 2 jt</div>
          </div>
          <div class="price-opt best" onclick="selectPrice(this,'Rp 35 jt','3 peserta')">
            <div class="price-opt-num">3 peserta</div>
            <div class="price-opt-val">35 jt</div>
            <span class="best-badge">BEST VALUE</span>
          </div>
        </div>
      </div>

      <div class="price-card-body">
        <div class="price-feature">
          <div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 15 ); ?></div>
          <div class="pf-text">4 tahap, 13 sesi, 64 JP pendampingan<span class="pf-free">Durasi program: 3–6 bulan</span></div>
        </div>
        <div class="price-feature">
          <div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 15 ); ?></div>
          <div class="pf-text">Pelatihan tambahan 40 JP — Lead Implementer atau Auditor Internal ISO/IEC 17025*<span class="pf-free">GRATIS · termasuk dalam paket pelatihan</span></div>
        </div>
        <div class="price-feature">
          <div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 15 ); ?></div>
          <div class="pf-text">Template Dokumen ISO/IEC 17025 lengkap<span class="pf-free">GRATIS · senilai Rp 3.500.000</span></div>
        </div>
        <div class="price-feature">
          <div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 15 ); ?></div>
          <div class="pf-text">1 sesi konsultasi privat 1-on-1 per peserta<span class="pf-free">GRATIS · senilai Rp 3.000.000</span></div>
        </div>
        <div class="price-feature">
          <div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 15 ); ?></div>
          <div class="pf-text">Akses webinar & bootcamp 1 tahun penuh<span class="pf-free">GRATIS · senilai Rp 5.000.000</span></div>
        </div>
        <div class="price-feature">
          <div class="pf-check"><?php labnesia_icon( 'check', 'var(--teal)', 15 ); ?></div>
          <div class="pf-text">Grup diskusi eksklusif nasional (permanen)</div>
        </div>
        <div style="background:var(--teal-pale);border-radius:8px;padding:12px;margin-top:8px;text-align:center">
          <p style="font-size:12px;color:#085041;font-weight:600">Total nilai benefit: <span style="font-size:16px;font-weight:800;color:var(--teal)">Rp 18–20 juta</span></p>
          <p style="font-size:11px;color:#0F6E56;margin-top:2px">Sudah termasuk dalam harga program · *Pelatihan terkait uji kompetensi bersifat independen, lihat catatan di bawah</p>
        </div>
      </div>

      <div class="urgency">
        <p class="urgency-text"><?php labnesia_icon( 'hourglass', '#8B6000', 12 ); ?> Batch dibuka tiap 1–2 bulan — <strong>maks. 10 instansi/batch</strong></p>
      </div>

      <div class="price-cta">
        <a href="#form-daftar" class="btn-amber">Daftar Batch Berikutnya</a>
        <a href="<?php echo $url_gratis; ?>" class="btn-ghost">Konsultasi gratis dulu <?php labnesia_icon( 'arrow-right', 'var(--navy)', 14 ); ?></a>
      </div>

      <div class="guarantee">
        <div class="guarantee-icon"><?php labnesia_icon( 'shield-check', 'var(--teal)', 22 ); ?></div>
        <div class="guarantee-text">Jika output per sesi belum memenuhi standar yang disepakati, kami sediakan sesi konsultasi tambahan tanpa biaya. Track record kami: 30+ lab yang kami dampingi berhasil membangun sistem mutu yang solid.</div>
      </div>
    </div>

    <!-- MINI FORM -->
    <div id="form-daftar" style="margin-top:20px;background:white;border:1px solid var(--gray-200);border-radius:16px;padding:24px">
      <h3 style="font-size:17px;font-weight:800;color:var(--navy);margin-bottom:4px">Amankan slot Anda sekarang</h3>
      <p style="font-size:13px;color:var(--gray-600);margin-bottom:20px">Tim kami akan menghubungi Anda dalam 1×24 jam untuk konfirmasi dan detail pembayaran.</p>
      <div style="display:flex;flex-direction:column;gap:12px">
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Nama lengkap *</label>
          <input type="text" placeholder="Nama Anda" style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s" onfocus="this.style.borderColor='var(--teal)'" onblur="this.style.borderColor='var(--gray-200)'">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Nama laboratorium / instansi *</label>
          <input type="text" placeholder="Lab / Universitas / Perusahaan" style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s" onfocus="this.style.borderColor='var(--teal)'" onblur="this.style.borderColor='var(--gray-200)'">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Nomor WhatsApp *</label>
          <input type="tel" placeholder="08xx-xxxx-xxxx" style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s" onfocus="this.style.borderColor='var(--teal)'" onblur="this.style.borderColor='var(--gray-200)'">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Jumlah peserta</label>
          <select style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;background:white">
            <option>1 peserta — Rp 14.000.000</option>
            <option>2 peserta — Rp 26.000.000</option>
            <option value="3" selected>3 peserta — Rp 35.000.000 (Best Value)</option>
          </select>
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Bidang laboratorium</label>
          <select style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;background:white">
            <option>Lab Lingkungan</option>
            <option>Lab Pangan / Gizi / Halal</option>
            <option>Lab Sipil</option>
            <option>Lab Pertanian / Pascapanen</option>
            <option>Lab Farmasi / Kimia</option>
            <option>Lab Biologi & Mikrobiologi</option>
            <option>Lab Kalibrasi</option>
            <option>Lab Peternakan & Perikanan</option>
            <option>Lainnya</option>
          </select>
        </div>
        <button onclick="submitForm()" style="background:var(--teal);color:white;padding:13px;border-radius:9px;font-weight:700;font-size:15px;border:none;cursor:pointer;width:100%;font-family:var(--font-display);transition:all .2s" onmouseover="this.style.background='#158a65'" onmouseout="this.style.background='var(--teal)'">Daftar Sekarang <?php labnesia_icon( 'arrow-right', '#ffffff', 15 ); ?></button>
        <p style="font-size:11px;color:var(--gray-400);text-align:center;line-height:1.5">Dengan mendaftar, Anda menyetujui syarat & ketentuan program. Tidak ada biaya di tahap ini — tim kami akan menghubungi Anda terlebih dahulu.</p>
      </div>
    </div>
  </div>
</div>

<!-- CTA SECTION -->
<div class="cta-section">
  <div class="cta-inner">
    <div class="tag-batch" style="margin-bottom:24px"><?php labnesia_icon( 'hourglass', '#8B5800', 12 ); ?> Batch baru dibuka tiap 1–2 bulan</div>
    <h2 class="cta-title">Belum yakin? Mulai dari<br>yang gratis dulu.</h2>
    <p class="cta-sub">Gap Analysis gratis, webinar, dan panduan sudah menunggu — tanpa perlu keputusan apapun dari Anda saat ini.</p>
    <div class="cta-actions">
      <a href="<?php echo $url_gratis; ?>" class="btn-primary" style="font-size:15px;padding:14px 28px">Akses semua yang gratis <?php labnesia_icon( 'arrow-right', '#ffffff', 15 ); ?></a>
      <a href="#form-daftar" class="btn-amber" style="font-size:15px;padding:14px 28px">Daftar Kelas Pendampingan</a>
    </div>
    <p class="cta-note">Atau hubungi tim: +62 821-7222-1567 (Endang) · +62 851-8500-0367 (Berryl) · +62 811-399-523 (Kintan)</p>
  </div>
</div>

<footer>
    <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <span><a href="https://labnesia.id">labnesia.id</a></span>
  </div>
</footer>

<script>
function toggleOutline(el){
  const body=el.nextElementSibling;
  const isOpen=body.classList.contains('open');
  document.querySelectorAll('.outline-body').forEach(b=>b.classList.remove('open'));
  document.querySelectorAll('.outline-header').forEach(h=>h.classList.remove('active'));
  if(!isOpen){body.classList.add('open');el.classList.add('active')}
}
function selectPrice(el,price,label){
  document.querySelectorAll('.price-opt').forEach(o=>o.classList.remove('active'));
  el.classList.add('active');
  document.getElementById('price-display').textContent=price;
}
document.querySelectorAll('.faq-q').forEach(q=>{
  q.addEventListener('click',()=>{
    const item=q.parentElement;
    const ans=item.querySelector('.faq-a');
    const isOpen=ans.classList.contains('open');
    document.querySelectorAll('.faq-a').forEach(a=>a.classList.remove('open'));
    document.querySelectorAll('.faq-item').forEach(i=>i.classList.remove('active'));
    if(!isOpen){ans.classList.add('open');item.classList.add('active')}
  });
});
function submitForm(){
  alert('Terima kasih! Tim Labnesia akan menghubungi Anda dalam 1×24 jam untuk konfirmasi pendaftaran.');
}
</script>
<?php wp_footer(); ?>
</body>
</html>
