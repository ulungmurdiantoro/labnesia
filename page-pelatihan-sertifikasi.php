<?php
/*
Template Name: Pelatihan dan Sertifikasi
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
  :root{--navy:#0B1F3A;--navy-light:#1C3A60;--teal:#1A9E75;--teal-light:#22C28F;--teal-pale:#E8F7F2;--amber:#F5A623;--amber-pale:#FEF3DC;--white:#FFFFFF;--gray-50:#F8F9FA;--gray-100:#F1F3F5;--gray-200:#E9ECEF;--gray-400:#ADB5BD;--gray-600:#6C757D;--gray-800:#343A40;--font-display:'Plus Jakarta Sans',sans-serif;--font-serif:'Lora',serif}
  *{box-sizing:border-box;margin:0;padding:0}
  html{scroll-behavior:smooth}
  body{font-family:var(--font-display);color:var(--gray-800);background:var(--white);line-height:1.6}

  nav{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(11,31,58,0.97);backdrop-filter:blur(8px);padding:0 48px;height:64px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08)}
  .nav-logo{display:flex;align-items:center;gap:10px}
  .nav-logo-mark{width:36px;height:36px;background:var(--teal);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;color:white;font-size:14px}
  .nav-logo-text{color:white;font-weight:700;font-size:18px}
  .nav-logo-sub{color:rgba(255,255,255,0.45);font-size:11px;display:block;margin-top:-2px}
  .nav-links{display:flex;align-items:center;gap:24px}
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
  .page-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(245,166,35,0.15);border:1px solid rgba(245,166,35,0.3);color:var(--amber);padding:5px 14px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-eyebrow-dot{width:5px;height:5px;border-radius:50%;background:var(--amber);animation:pulse 2s infinite}
  @keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}
  .page-hero h1{font-size:46px;font-weight:800;color:white;line-height:1.12;letter-spacing:-1.3px;margin-bottom:18px;max-width:680px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-family:var(--font-serif);font-style:italic;color:rgba(255,255,255,0.6);font-size:16px;line-height:1.65;max-width:580px;border-left:3px solid var(--teal);padding-left:18px;margin-bottom:32px}
  .hero-meta{display:flex;gap:28px;flex-wrap:wrap}
  .hero-meta-item{display:flex;align-items:center;gap:8px}
  .hero-meta-icon{width:32px;height:32px;background:rgba(255,255,255,0.1);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px}
  .hero-meta-label{font-size:11px;color:rgba(255,255,255,0.45)}
  .hero-meta-val{font-size:14px;font-weight:700;color:white}

  .firewall-banner{background:var(--gray-50);border-bottom:1px solid var(--gray-200);padding:14px 48px}
  .firewall-banner-inner{max-width:1200px;margin:0 auto;display:flex;align-items:center;gap:12px}
  .firewall-icon{font-size:18px;flex-shrink:0}
  .firewall-text{font-size:12.5px;color:var(--gray-600);line-height:1.5}
  .firewall-text strong{color:var(--gray-800)}

  section{padding:64px 48px}
  .section-inner{max-width:1200px;margin:0 auto}
  .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}
  .h2{font-size:32px;font-weight:800;color:var(--navy);line-height:1.18;letter-spacing:-0.7px;margin-bottom:14px}
  .body-text{font-size:15px;color:var(--gray-600);line-height:1.7}

  .scheme-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-top:40px}
  .scheme-card{border:2px solid var(--gray-200);border-radius:18px;overflow:hidden;transition:all .2s}
  .scheme-card:hover{border-color:var(--teal);box-shadow:0 8px 28px rgba(26,158,117,0.1)}
  .scheme-header{padding:24px;color:white}
  .scheme-header.implementer{background:linear-gradient(135deg,#1A9E75,#0F6E56)}
  .scheme-header.auditor{background:linear-gradient(135deg,#0B1F3A,#1C3A60)}
  .scheme-tag{font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;opacity:.7;margin-bottom:6px}
  .scheme-name{font-size:22px;font-weight:800;margin-bottom:4px}
  .scheme-sub{font-size:13px;opacity:.85}
  .scheme-body{padding:24px;background:white}
  .scheme-block{margin-bottom:18px}
  .scheme-block:last-child{margin-bottom:0}
  .scheme-block-title{font-size:12px;font-weight:700;color:var(--navy);text-transform:uppercase;letter-spacing:.05em;margin-bottom:8px}
  .scheme-list{display:flex;flex-direction:column;gap:6px}
  .scheme-item{display:flex;align-items:flex-start;gap:8px;font-size:13.5px;color:var(--gray-600);line-height:1.5}
  .scheme-check{color:var(--teal);font-weight:700;flex-shrink:0;margin-top:1px}

  .summary-banner{background:var(--navy);border-radius:16px;padding:24px 28px;margin-top:32px;text-align:center}
  .summary-text{font-size:15px;color:white;font-weight:600}
  .summary-text span{color:var(--teal-light)}

  /* CURRICULUM ACCORDION */
  .curr-step{margin-bottom:10px}
  .curr-header{display:flex;align-items:center;gap:14px;padding:16px 20px;background:var(--gray-50);border:1px solid var(--gray-200);border-radius:12px;cursor:pointer;transition:all .2s}
  .curr-header:hover{border-color:var(--teal);background:var(--teal-pale)}
  .curr-header.active{border-color:var(--teal);background:var(--teal-pale)}
  .curr-num{width:32px;height:32px;border-radius:8px;background:var(--navy);color:white;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;flex-shrink:0}
  .curr-header.active .curr-num{background:var(--teal)}
  .curr-title{flex:1;font-size:14px;font-weight:700;color:var(--navy)}
  .curr-chevron{font-size:16px;color:var(--gray-400);transition:transform .2s}
  .curr-header.active .curr-chevron{transform:rotate(180deg)}
  .curr-body{display:none;padding:16px 20px;border:1px solid var(--teal);border-top:none;border-radius:0 0 12px 12px;background:white;margin-top:-4px}
  .curr-body.open{display:block}
  .curr-sub-item{display:flex;align-items:flex-start;gap:8px;margin-bottom:8px;font-size:13px;color:var(--gray-600);line-height:1.5}
  .curr-sub-check{color:var(--teal);flex-shrink:0;margin-top:2px}

  /* SYARAT & BENEFIT */
  .info-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:32px}
  .info-card{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:14px;padding:24px}
  .info-card-title{font-size:15px;font-weight:700;color:var(--navy);margin-bottom:14px;display:flex;align-items:center;gap:8px}
  .info-item{display:flex;align-items:flex-start;gap:10px;margin-bottom:10px;font-size:13.5px;color:var(--gray-600);line-height:1.5}
  .info-num{width:20px;height:20px;border-radius:50%;background:var(--teal);color:white;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0}
  .info-check{color:var(--teal);font-weight:700;flex-shrink:0}

  /* PRICING CARDS */
  .pricing-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:32px}
  .price-tier{border:1.5px solid var(--gray-200);border-radius:14px;padding:20px;text-align:center;transition:all .2s}
  .price-tier:hover{border-color:var(--teal)}
  .price-tier.featured{border-color:var(--amber);background:var(--amber-pale);position:relative}
  .price-tier-badge{position:absolute;top:-10px;left:50%;transform:translateX(-50%);background:var(--amber);color:var(--navy);font-size:10px;font-weight:800;padding:3px 12px;border-radius:100px;white-space:nowrap}
  .price-tier-label{font-size:11px;font-weight:600;color:var(--gray-600);text-transform:uppercase;letter-spacing:.05em;margin-bottom:8px}
  .price-tier-val{font-size:24px;font-weight:800;color:var(--navy)}
  .price-tier-unit{font-size:11px;color:var(--gray-400)}
  .price-tier-note{font-size:11px;color:var(--gray-500);margin-top:6px}

  /* DISCLAIMER BOX */
  .disclaimer-box{background:var(--gray-50);border:1px solid var(--gray-200);border-left:4px solid var(--gray-400);border-radius:0 12px 12px 0;padding:20px 24px;margin-top:32px}
  .disclaimer-title{font-size:12px;font-weight:700;color:var(--gray-600);text-transform:uppercase;letter-spacing:.06em;margin-bottom:8px;display:flex;align-items:center;gap:8px}
  .disclaimer-text{font-size:13px;color:var(--gray-600);line-height:1.7}
  .disclaimer-text strong{color:var(--gray-800)}

  /* JADWAL TABLE */
  .jadwal-section{background:var(--gray-50)}
  .jadwal-list{margin-top:32px;display:flex;flex-direction:column;gap:10px}
  .jadwal-item{background:white;border:1px solid var(--gray-200);border-radius:12px;padding:18px 22px;display:flex;align-items:center;gap:18px;transition:all .2s}
  .jadwal-item:hover{border-color:var(--teal)}
  .jadwal-tag{font-size:10px;font-weight:700;padding:3px 9px;border-radius:4px;text-transform:uppercase;letter-spacing:.04em;flex-shrink:0}
  .tag-implementer{background:rgba(26,158,117,0.15);color:var(--teal)}
  .tag-auditor{background:rgba(11,31,58,0.1);color:var(--navy)}
  .jadwal-info{flex:1}
  .jadwal-title{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:3px}
  .jadwal-meta{font-size:12.5px;color:var(--gray-600)}
  .jadwal-cta{flex-shrink:0}
  .btn-jadwal{background:var(--teal);color:white;padding:9px 18px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;transition:all .2s}
  .btn-jadwal:hover{background:#158a65}

  /* OTHER SCHEMES */
  .other-schemes{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:32px}
  .scheme-pill{background:white;border:1px solid var(--gray-200);border-radius:10px;padding:14px 16px;font-size:13px;color:var(--gray-700);font-weight:500;display:flex;align-items:center;gap:8px}
  .scheme-pill-icon{font-size:16px;flex-shrink:0}
  .new-tag{background:var(--teal-pale);color:var(--teal);font-size:9px;font-weight:800;padding:2px 6px;border-radius:3px;letter-spacing:.04em;text-transform:uppercase;margin-left:auto}

  /* CTA FORM */
  .cta-form-section{background:var(--navy);position:relative;overflow:hidden}
  .cta-form-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.2) 0%,transparent 60%)}
  .cta-form-inner{max-width:680px;margin:0 auto;text-align:center;position:relative}
  .cta-form-title{font-size:34px;font-weight:800;color:white;line-height:1.2;letter-spacing:-0.8px;margin-bottom:14px}
  .cta-form-sub{font-size:15px;color:rgba(255,255,255,0.6);line-height:1.6;margin-bottom:32px}
  .form-card{background:white;border-radius:18px;padding:28px;text-align:left}
  .form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:12px}
  .form-field-full{margin-bottom:12px}
  .form-label{font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px}
  .form-input{width:100%;padding:11px 14px;border:1px solid var(--gray-200);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s}
  .form-input:focus{border-color:var(--teal)}
  .form-select{width:100%;padding:11px 14px;border:1px solid var(--gray-200);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:white}
  .btn-submit-cta{width:100%;padding:13px;background:var(--teal);color:white;border:none;border-radius:9px;font-weight:700;font-size:15px;cursor:pointer;margin-top:8px;transition:all .2s}
  .btn-submit-cta:hover{background:#158a65}

  footer{background:var(--navy);padding:40px 48px;border-top:1px solid rgba(255,255,255,0.08)}
  .footer-bottom{max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;font-size:13px;color:rgba(255,255,255,0.4);flex-wrap:wrap;gap:10px}
  .footer-bottom a{color:rgba(255,255,255,0.35);text-decoration:none}
</style>
</head>
<body <?php body_class( 'page-pelatihan-sertifikasi' ); ?>>
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

<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo $url_home; ?>">Beranda</a>
      <span class="breadcrumb-sep">›</span>
      <span class="breadcrumb-cur">Pelatihan & Sertifikasi Kompetensi</span>
    </div>
    <div class="page-eyebrow"><div class="page-eyebrow-dot"></div> Produk Unggulan 2026 · Terpopuler</div>
    <h1>Pelatihan <span class="accent">Lead Implementer</span> & <span class="accent">Auditor Internal</span><br>ISO/IEC 17025:2017</h1>
    <p class="page-hero-sub">Pelatihan teori dan praktik untuk individu yang ingin membangun atau mengaudit sistem manajemen mutu laboratorium — pertama di Indonesia dengan kurikulum berstandar internasional.</p>
    <div class="hero-meta">
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'clock', '#ffffff', 15 ); ?></div>
        <div><div class="hero-meta-label">Total pelatihan</div><div class="hero-meta-val">40 JP per skema</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'globe', '#ffffff', 15 ); ?></div>
        <div><div class="hero-meta-label">Format</div><div class="hero-meta-val">Online / Onsite</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'user', '#ffffff', 15 ); ?></div>
        <div><div class="hero-meta-label">Untuk</div><div class="hero-meta-val">Individu & profesional lab</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'medal', '#ffffff', 15 ); ?></div>
        <div><div class="hero-meta-label">Track record</div><div class="hero-meta-val">100+ peserta terlatih</div></div>
      </div>
    </div>
  </div>
</div>

<!-- FIREWALL BANNER -->
<div class="firewall-banner">
  <div class="firewall-banner-inner">
    <span class="firewall-icon"><?php labnesia_icon( 'info', 'var(--gray-600)', 18 ); ?></span>
    <p class="firewall-text"><strong>Pelatihan dan uji kompetensi adalah dua kegiatan yang independen.</strong> Labnesia menyelenggarakan pelatihan untuk meningkatkan kompetensi peserta. Uji kompetensi (jika diperlukan) diselenggarakan secara independen oleh Lembaga Sertifikasi Profesi/Person (LSP) terkait, dengan pendaftaran mandiri oleh peserta. <a href="<?php echo $url_faq; ?>#faq-umum" style="color:var(--teal);font-weight:600">Pelajari lebih lanjut <?php labnesia_icon( 'arrow-right', 'var(--teal)', 12 ); ?></a></p>
  </div>
</div>

<!-- TWO SCHEMES -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Dua Skema Pelatihan</p>
    <h2 class="h2">Pilih sesuai peran Anda<br>di laboratorium.</h2>
    <p class="body-text" style="max-width:560px">Lead Implementer fokus pada membangun sistem. Auditor Internal fokus pada menilai sistem yang sudah berjalan. Banyak profesional mengambil keduanya untuk pemahaman menyeluruh.</p>

    <div class="scheme-grid">
      <div class="scheme-card">
        <div class="scheme-header implementer">
          <div class="scheme-tag">Skema 1 · Membangun Sistem</div>
          <div class="scheme-name">Lead Implementer</div>
          <div class="scheme-sub">Standar Laboratorium ISO/IEC 17025:2017</div>
        </div>
        <div class="scheme-body">
          <div class="scheme-block">
            <div class="scheme-block-title">Tujuan Pelatihan</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Membekali peserta merancang, menerapkan, dan mengelola sistem manajemen mutu laboratorium</div>
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Fokus pada pengembangan sistem yang efektif dan keberlanjutan implementasi</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Peran Utama</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Mengembangkan sistem manajemen mutu dari awal hingga berjalan efektif</div>
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Menyusun prosedur, dokumentasi, dan kontrol operasional</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Cocok untuk</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kepala laboratorium, Koordinator mutu, Pimpinan institusi lab</div>
            </div>
          </div>
        </div>
      </div>

      <div class="scheme-card">
        <div class="scheme-header auditor">
          <div class="scheme-tag">Skema 2 · Menilai Sistem</div>
          <div class="scheme-name">Auditor Internal</div>
          <div class="scheme-sub">Standar Laboratorium ISO/IEC 17025:2017</div>
        </div>
        <div class="scheme-body">
          <div class="scheme-block">
            <div class="scheme-block-title">Tujuan Pelatihan</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Membekali peserta melakukan audit internal terhadap sistem yang sudah diimplementasikan</div>
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Fokus pada evaluasi kepatuhan, identifikasi ketidaksesuaian, dan tindak korektif</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Peran Utama</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Melakukan audit terhadap sistem yang sudah berjalan</div>
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Menyusun laporan audit dan rekomendasi perbaikan</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Cocok untuk</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Auditor mutu internal, Personel laboratorium, Pengawas teknis/manajer mutu</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="summary-banner">
      <p class="summary-text"><span>Lead Implementer</span> = Membangun & Menjalankan Sistem &nbsp;·&nbsp; <span>Auditor Internal</span> = Menilai & Memastikan Sistem Berjalan Sesuai Standar</p>
    </div>
  </div>
</section>

<!-- CURRICULUM -->
<section style="background:var(--gray-50)">
  <div class="section-inner">
    <p class="eyebrow">Kurikulum Pelatihan</p>
    <h2 class="h2">Teori dan praktik,<br>4 modul pembelajaran.</h2>
    <p class="body-text" style="max-width:560px;margin-bottom:24px">Struktur kurikulum berlaku untuk kedua skema, dengan penekanan materi yang disesuaikan — implementasi untuk Lead Implementer, audit untuk Auditor Internal.</p>

    <div class="curr-step">
      <div class="curr-header active" onclick="toggleCurr(this)">
        <div class="curr-num">1</div>
        <div class="curr-title">Pengenalan ISO/IEC 17025:2017</div>
        <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
      </div>
      <div class="curr-body open">
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kerangka standar dan regulasi yang relevan</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Prinsip Sistem Manajemen Laboratorium dan Plan-Do-Check-Act (PDCA)</div>
      </div>
    </div>
    <div class="curr-step">
      <div class="curr-header" onclick="toggleCurr(this)">
        <div class="curr-num">2</div>
        <div class="curr-title">Perencanaan Implementasi ISO/IEC 17025:2017</div>
        <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
      </div>
      <div class="curr-body">
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Ketidakberpihakan, kerahasiaan, dan kode etik</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kepemimpinan, struktur organisasi, dan personel</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pengelolaan sistem dokumentasi dan informasi</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pengelolaan fasilitas, kondisi lingkungan, dan peralatan</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Perencanaan penyedia eksternal laboratorium</div>
      </div>
    </div>
    <div class="curr-step">
      <div class="curr-header" onclick="toggleCurr(this)">
        <div class="curr-num">3</div>
        <div class="curr-title">Implementasi ISO/IEC 17025:2017</div>
        <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
      </div>
      <div class="curr-body">
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pelayanan pelanggan, pengelolaan sampel, dan sampling</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pemilihan, verifikasi, dan validasi metode</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Ketertelusuran dan ketidakpastian pengukuran</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Jaminan mutu, pengendalian mutu, dan uji profisiensi</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Penerbitan laporan hasil pengukuran</div>
      </div>
    </div>
    <div class="curr-step">
      <div class="curr-header" onclick="toggleCurr(this)">
        <div class="curr-num">4</div>
        <div class="curr-title">Pemantauan, Evaluasi & Continual Improvement</div>
        <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
      </div>
      <div class="curr-body">
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pengelolaan pengaduan dan manajemen risiko</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Identifikasi ketidaksesuaian dan tindakan perbaikan</div>
        <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Audit internal dan kaji ulang manajemen</div>
      </div>
    </div>

    <!-- SYARAT & BENEFIT -->
    <div class="info-grid">
      <div class="info-card">
        <div class="info-card-title"><?php labnesia_icon( 'clipboard-list', 'var(--teal)', 18 ); ?> Syarat Mengikuti Pelatihan</div>
        <div class="info-item"><div class="info-num">1</div>Pendidikan minimal D3</div>
        <div class="info-item"><div class="info-num">2</div>Pengalaman bekerja (termasuk praktik/riset) di laboratorium</div>
        <div class="info-item"><div class="info-num">3</div>Memiliki sertifikat pelatihan pemahaman dan penerapan ISO/IEC 17025:2017 (untuk skema lanjutan)</div>
      </div>
      <div class="info-card">
        <div class="info-card-title"><?php labnesia_icon( 'gift', 'var(--teal)', 18 ); ?> Benefit Pelatihan</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Sertifikat Pelatihan 40 JP</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Soft copy materi pelatihan lengkap</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kunjungan ke laboratorium (bagi peserta onsite)</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Forum WhatsApp bersama pakar</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Gratis template dokumen ISO/IEC 17025:2017</div>
      </div>
    </div>

    <!-- DISCLAIMER -->
    <div class="disclaimer-box">
      <div class="disclaimer-title"><?php labnesia_icon( 'info', 'var(--gray-600)', 12 ); ?> Informasi Mengenai Uji Kompetensi</div>
      <p class="disclaimer-text">Program pelatihan ini dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administrasi untuk mengikuti uji kompetensi pada skema terkait di Lembaga Sertifikasi Profesi/Person (LSP) yang relevan, sesuai dengan persyaratan dan ketentuan yang berlaku. <strong>Keikutsertaan dalam pelatihan ini tidak menjamin kemudahan proses uji atau menjamin kelulusan sertifikasi kompetensi.</strong> Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta langsung kepada LSP terkait, dan jadwal resmi uji kompetensi dipublikasikan melalui media LSP secara terpisah.</p>
    </div>
  </div>
</section>

<!-- PRICING -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Investasi Pelatihan</p>
    <h2 class="h2">Skema harga yang fleksibel,<br>online maupun onsite.</h2>
    <div class="pricing-grid">
      <div class="price-tier">
        <div class="price-tier-label">Online · Normal</div>
        <div class="price-tier-val">Rp 6,5 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">Rp 6 jt jika ≥3 peserta</div>
      </div>
      <div class="price-tier featured">
        <div class="price-tier-badge">Early Bird</div>
        <div class="price-tier-label">Online · Early Bird</div>
        <div class="price-tier-val">Rp 5,75 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">Rp 5,25 jt jika ≥3 peserta</div>
      </div>
      <div class="price-tier">
        <div class="price-tier-label">Onsite · Normal</div>
        <div class="price-tier-val">Rp 7,5 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">+Rp 1 jt dari harga online</div>
      </div>
      <div class="price-tier">
        <div class="price-tier-label">Onsite · Early Bird</div>
        <div class="price-tier-val">Rp 6,75 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">+Rp 1 jt dari harga online</div>
      </div>
    </div>
    <p style="font-size:12px;color:var(--gray-400);margin-top:16px;text-align:center">Harga belum termasuk biaya uji kompetensi di LSP terkait (jika peserta memilih mengikuti uji kompetensi secara mandiri).</p>
  </div>
</section>

<!-- JADWAL -->
<section class="jadwal-section">
  <div class="section-inner">
    <p class="eyebrow">Jadwal Pelatihan</p>
    <h2 class="h2">Dibuka rutin sepanjang 2026.</h2>
    <p class="body-text" style="max-width:560px">Jadwal dan tema menyesuaikan kebutuhan & ketersediaan pakar. Hubungi tim kami untuk konfirmasi jadwal terdekat.</p>
    <div class="jadwal-list">
      <div class="jadwal-item">
        <span class="jadwal-tag tag-implementer">Implementer</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Lead Implementer ISO/IEC 17025 — Umum</div>
          <div class="jadwal-meta">Online · 40 JP · Jadwal dibuka rutin tiap bulan</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
      <div class="jadwal-item">
        <span class="jadwal-tag tag-auditor">Auditor Internal</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Auditor Internal ISO/IEC 17025 — Umum</div>
          <div class="jadwal-meta">Online · 40 JP · Jadwal dibuka rutin tiap bulan</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
      <div class="jadwal-item">
        <span class="jadwal-tag tag-implementer">Implementer</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Implementer ISO/IEC 17025 — Lab Lingkungan</div>
          <div class="jadwal-meta">Online · 40 JP · Bidang spesifik laboratorium lingkungan</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
      <div class="jadwal-item">
        <span class="jadwal-tag tag-implementer">Implementer</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Implementer ISO/IEC 17025 — Lab Pangan, Gizi, Halal</div>
          <div class="jadwal-meta">Online · 40 JP · Bidang spesifik laboratorium pangan</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
      <div class="jadwal-item">
        <span class="jadwal-tag tag-implementer">Implementer</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Implementer ISO/IEC 17025 — Lab Biologi/Mikrobiologi</div>
          <div class="jadwal-meta">Online · 40 JP · Bidang spesifik laboratorium biologi</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
    </div>
  </div>
</section>

<!-- OTHER SCHEMES -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Skema Lainnya</p>
    <h2 class="h2">Pelatihan kompetensi lain<br>untuk profesional lab.</h2>
    <p class="body-text" style="max-width:560px">Selain dua skema utama di atas, tersedia juga skema pelatihan tematik berikut sesuai kebutuhan peran Anda di laboratorium.</p>
    <div class="other-schemes">
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'utensils', 'var(--teal)', 16 ); ?></span>Food Safety Management Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'user-check', 'var(--teal)', 16 ); ?></span>Panelis Terlatih Pengujian Sensori<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'flask', 'var(--teal)', 16 ); ?></span>GLP Laboratory Technician<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'vest', 'var(--teal)', 16 ); ?></span>Laboratory HSE Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'settings', 'var(--teal)', 16 ); ?></span>Laboratory Operations Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'chart', 'var(--teal)', 16 ); ?></span>Quality Management System (ISO 9001) Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'microscope', 'var(--teal)', 16 ); ?></span>QC Laboratory Analyst<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span>Quality Assurance Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'dna', 'var(--teal)', 16 ); ?></span>Research and Development Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'scroll', 'var(--teal)', 16 ); ?></span>Regulatory Affairs Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'seedling', 'var(--teal)', 16 ); ?></span>Sustainability Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon"><?php labnesia_icon( 'recycle', 'var(--teal)', 16 ); ?></span>Environmental Management (ISO 14001) Officer<span class="new-tag">New</span></div>
    </div>
  </div>
</section>

<!-- CTA FORM -->
<section class="cta-form-section" id="daftar">
  <div class="cta-form-inner">
    <p class="eyebrow" style="color:var(--teal-light)">Daftar Sekarang</p>
    <h2 class="cta-form-title">Tingkatkan kompetensi Anda<br>mulai hari ini.</h2>
    <p class="cta-form-sub">Tim kami akan menghubungi Anda untuk konfirmasi jadwal dan detail pembayaran.</p>
    <form class="form-card" id="pf-form" onsubmit="return submitPelatihanForm(event)">
      <div class="form-row">
        <div>
          <label class="form-label">Nama lengkap *</label>
          <input class="form-input" type="text" id="pf-nama" placeholder="Nama Anda" required>
        </div>
        <div>
          <label class="form-label">Nomor WhatsApp *</label>
          <input class="form-input" type="tel" id="pf-whatsapp" placeholder="08xx-xxxx-xxxx" required>
        </div>
      </div>
      <div class="form-field-full">
        <label class="form-label">Institusi / Laboratorium</label>
        <input class="form-input" type="text" id="pf-institusi" placeholder="Nama institusi Anda">
      </div>
      <div class="form-row">
        <div>
          <label class="form-label">Skema pelatihan *</label>
          <select class="form-select" id="pf-skema" required>
            <option>Lead Implementer ISO/IEC 17025</option>
            <option>Auditor Internal ISO/IEC 17025</option>
            <option>Skema lainnya (sebutkan di catatan)</option>
          </select>
        </div>
        <div>
          <label class="form-label">Format</label>
          <select class="form-select" id="pf-format">
            <option>Online — Early Bird</option>
            <option>Online — Normal</option>
            <option>Onsite — Early Bird</option>
            <option>Onsite — Normal</option>
          </select>
        </div>
      </div>
      <button class="btn-submit-cta" type="submit" id="pf-submit-btn">Daftar Pelatihan <?php labnesia_icon( 'arrow-right', '#ffffff', 15 ); ?></button>
      <p style="font-size:11px;color:var(--gray-400);text-align:center;margin-top:10px">Tidak ada biaya di tahap ini — tim kami akan menghubungi Anda terlebih dahulu.</p>
    </form>
  </div>
</section>

<footer>
    <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <span><a href="https://labnesia.id">labnesia.id</a></span>
  </div>
</footer>

<script>
function toggleCurr(el){
  const body=el.nextElementSibling;
  const isOpen=body.classList.contains('open');
  document.querySelectorAll('.curr-body').forEach(b=>b.classList.remove('open'));
  document.querySelectorAll('.curr-header').forEach(h=>h.classList.remove('active'));
  if(!isOpen){body.classList.add('open');el.classList.add('active')}
}

const PF_GAS_URL  = <?php echo wp_json_encode( get_theme_mod( 'labnesia_pelatihan_gas_url', '' ) ); ?>;
const PF_WA_NUMBER = <?php echo wp_json_encode( get_theme_mod( 'labnesia_whatsapp', '6282172221567' ) ); ?>;

function submitPelatihanForm(event){
  event.preventDefault();

  const nama      = document.getElementById('pf-nama').value.trim();
  const whatsapp  = document.getElementById('pf-whatsapp').value.trim();
  const institusi = document.getElementById('pf-institusi').value.trim();
  const skema     = document.getElementById('pf-skema').value;
  const format    = document.getElementById('pf-format').value;

  if(!nama || !whatsapp || !skema){
    alert('Mohon lengkapi Nama, Nomor WhatsApp, dan Skema pelatihan.');
    return false;
  }

  const btn = document.getElementById('pf-submit-btn');
  btn.disabled = true;
  const originalLabel = btn.innerHTML;
  btn.innerHTML = 'Mengirim...';

  function goToWhatsApp(){
    let pesan = 'Halo Labnesia, saya ingin mendaftar Pelatihan & Sertifikasi.\n\n'
      + 'Nama: ' + nama + '\n'
      + 'WhatsApp: ' + whatsapp + '\n';
    if(institusi) pesan += 'Institusi: ' + institusi + '\n';
    pesan += 'Skema: ' + skema + '\n'
      + 'Format: ' + format;
    window.location.href = 'https://wa.me/' + PF_WA_NUMBER + '?text=' + encodeURIComponent(pesan);
  }

  if(!PF_GAS_URL){
    // Belum dikonfigurasi (lihat Customizer > Labnesia Settings) — langsung ke WhatsApp saja.
    goToWhatsApp();
    return false;
  }

  const formData = new FormData();
  formData.append('nama', nama);
  formData.append('whatsapp', whatsapp);
  formData.append('institusi', institusi);
  formData.append('skema', skema);
  formData.append('format', format);

  fetch(PF_GAS_URL, { method: 'POST', mode: 'no-cors', body: formData })
    .catch(function(){ /* no-cors gives an opaque response either way — still proceed to WhatsApp */ })
    .finally(function(){
      btn.disabled = false;
      btn.innerHTML = originalLabel;
      goToWhatsApp();
    });

  return false;
}
</script>
<?php labnesia_floating_cta(); ?>
<?php wp_footer(); ?>
</body>
</html>
