<?php
/*
Template Name: FAQ dan Perbandingan
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
  /* PAGE HERO */
  .page-hero{background:var(--navy);padding:104px 48px 72px;text-align:center;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.15) 0%,transparent 60%)}
  .page-hero-inner{max-width:680px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-block;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-hero h1{font-size:48px;font-weight:800;color:white;line-height:1.1;letter-spacing:-1.5px;margin-bottom:16px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.55);line-height:1.65;margin-bottom:32px}

  /* JUMP NAV */
  .jump-nav{background:var(--gray-50);border-bottom:1px solid var(--gray-200);padding:16px 48px;position:sticky;top:64px;z-index:80}
  .jump-nav-inner{max-width:1100px;margin:0 auto;display:flex;gap:8px;flex-wrap:wrap}
  .jump-btn{padding:7px 16px;border-radius:100px;font-size:13px;font-weight:600;text-decoration:none;border:1px solid var(--gray-200);color:var(--gray-600);background:white;cursor:pointer;transition:all .2s}
  .jump-btn:hover,.jump-btn.active{background:var(--navy);color:white;border-color:var(--navy)}

  /* COMPARISON TABLE */
  .comp-section{padding:80px 48px;background:white}
  .comp-inner{max-width:1100px;margin:0 auto}
  .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}
  .h2{font-size:36px;font-weight:800;color:var(--navy);line-height:1.15;letter-spacing:-0.8px;margin-bottom:14px}
  .body-text{font-size:16px;color:var(--gray-600);line-height:1.7}

  /* FULL COMPARISON */
  .comp-wrap{overflow-x:auto;margin-top:40px}
  .comp-full{width:100%;border-collapse:collapse;min-width:700px}
  .comp-full th{padding:14px 20px;text-align:center;font-size:13px;font-weight:700;border-bottom:2px solid var(--gray-200);background:var(--gray-50)}
  .comp-full th:first-child{text-align:left}
  .comp-full th.col-featured{background:var(--teal);color:white;border-radius:12px 12px 0 0}
  .comp-full td{padding:14px 20px;text-align:center;font-size:14px;border-bottom:1px solid var(--gray-100)}
  .comp-full td:first-child{text-align:left;font-weight:600;color:var(--navy);font-size:13px}
  .comp-full tr:last-child td{border-bottom:none}
  .comp-full td.col-featured{background:rgba(26,158,117,0.04)}
  .check-yes{color:var(--teal);font-weight:700;font-size:16px}
  .check-no{color:var(--gray-300);font-size:16px}
  .check-partial{color:var(--amber);font-size:13px;font-weight:600}
  .price-tag{font-size:15px;font-weight:800;color:var(--navy)}
  .price-sub{font-size:11px;color:var(--gray-400);display:block}
  .comp-full tfoot td{padding:20px;background:var(--gray-50);font-size:13px}
  .comp-full tfoot td:first-child{font-weight:600;color:var(--gray-600)}
  .comp-cta-cell{background:var(--teal-pale) !important}
  .btn-comp{display:inline-block;padding:9px 20px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;transition:all .2s}
  .btn-comp-primary{background:var(--teal);color:white}
  .btn-comp-primary:hover{background:#158a65}
  .btn-comp-ghost{background:transparent;color:var(--teal);border:1.5px solid var(--teal)}
  .btn-comp-ghost:hover{background:var(--teal-pale)}
  .btn-comp-outline{background:transparent;color:var(--gray-600);border:1.5px solid var(--gray-200)}
  .row-group-header td{background:var(--gray-50);font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--gray-400);padding:10px 20px}

  /* FAQ SECTIONS */
  .faq-section{padding:80px 48px;background:var(--gray-50)}
  .faq-inner{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:280px 1fr;gap:48px;align-items:start}
  .faq-nav{position:sticky;top:140px}
  .faq-nav-title{font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--gray-400);margin-bottom:12px}
  .faq-nav-item{display:block;padding:10px 14px;border-radius:8px;font-size:14px;font-weight:500;color:var(--gray-600);text-decoration:none;transition:all .2s;cursor:pointer;border:none;background:none;width:100%;text-align:left;margin-bottom:2px}
  .faq-nav-item:hover{background:white;color:var(--navy)}
  .faq-nav-item.active{background:var(--navy);color:white;font-weight:600}
  .faq-content-area{ display: block; }
  .faq-group{margin-bottom:48px}
  .faq-group-title{font-size:20px;font-weight:800;color:var(--navy);margin-bottom:20px;padding-bottom:12px;border-bottom:2px solid var(--teal);display:flex;align-items:center;gap:10px}
  .faq-group-icon{font-size:22px}
  .faq-item{background:white;border:1px solid var(--gray-200);border-radius:12px;margin-bottom:10px;overflow:hidden}
  .faq-q{padding:18px 22px;font-size:15px;font-weight:700;color:var(--navy);cursor:pointer;display:flex;justify-content:space-between;align-items:center;gap:16px;transition:background .2s}
  .faq-q:hover{background:var(--gray-50)}
  .faq-chevron{font-size:16px;color:var(--gray-400);transition:transform .2s;flex-shrink:0}
  .faq-a{padding:0 22px 18px;font-size:15px;color:var(--gray-600);line-height:1.75;display:none}
  .faq-a.open{display:block}
  .faq-item.active .faq-q{background:var(--teal-pale)}
  .faq-item.active .faq-chevron{transform:rotate(180deg)}
  .faq-a strong{color:var(--navy)}
  .faq-a a{color:var(--teal);text-decoration:none}
  .faq-a a:hover{text-decoration:underline}
  .faq-highlight{background:var(--amber-pale);border:1px solid rgba(245,166,35,0.3);border-radius:8px;padding:14px 18px;margin-top:10px;font-size:13px;color:#6B4400}

  /* DECISION GUIDE */
  .decision-section{padding:80px 48px;background:white}
  .decision-inner{max-width:1100px;margin:0 auto}
  .decision-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:40px}
  .decision-card{border-radius:16px;overflow:hidden;border:1px solid var(--gray-200)}
  .decision-header{padding:24px;position:relative}
  .decision-num{font-size:40px;font-weight:800;opacity:.15;position:absolute;top:10px;right:16px}
  .decision-tag{font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:8px}
  .decision-title{font-size:20px;font-weight:800;line-height:1.2;margin-bottom:6px}
  .decision-price{font-size:15px;font-weight:700}
  .decision-body{padding:24px;background:var(--gray-50)}
  .decision-fit{margin-bottom:14px}
  .decision-fit-title{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--gray-400);margin-bottom:8px}
  .fit-item{display:flex;align-items:flex-start;gap:8px;margin-bottom:6px;font-size:13px;color:var(--gray-600)}
  .fit-check{color:var(--teal);font-weight:700;flex-shrink:0;margin-top:2px}
  .decision-body .btn{display:block;text-align:center;padding:11px;border-radius:9px;font-size:14px;font-weight:700;text-decoration:none;margin-top:16px;transition:all .2s}
  .btn-teal-d{background:var(--teal);color:white}
  .btn-teal-d:hover{background:#158a65}
  .btn-navy-d{background:var(--navy);color:white}
  .btn-navy-d:hover{background:#0f2845}
  .btn-outline-d{background:transparent;color:var(--teal);border:1.5px solid var(--teal)}
  .btn-outline-d:hover{background:var(--teal-pale)}
  .d-free{background:var(--teal-pale)}
  .d-free .decision-tag{color:var(--teal)}
  .d-free .decision-title{color:#085041}
  .d-free .decision-price{color:var(--teal)}
  .d-core{background:var(--navy)}
  .d-core .decision-num{color:white}
  .d-core .decision-tag{color:var(--teal-light)}
  .d-core .decision-title{color:white}
  .d-core .decision-price{color:var(--amber)}
  .d-premium{background:var(--amber-pale)}
  .d-premium .decision-tag{color:#8B5800}
  .d-premium .decision-title{color:var(--navy)}
  .d-premium .decision-price{color:#6B4400}

  /* LIVE CHAT */
  .chat-section{background:var(--navy);padding:64px 48px;position:relative;overflow:hidden}
  .chat-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.2) 0%,transparent 60%)}
  .chat-inner{max-width:1100px;margin:0 auto;position:relative;z-index:1;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center}
  .chat-left .eyebrow{color:var(--teal-light)}
  .chat-left h2{font-size:36px;font-weight:800;color:white;line-height:1.15;letter-spacing:-0.8px;margin-bottom:12px}
  .chat-left p{font-size:16px;color:rgba(255,255,255,0.55);line-height:1.65;margin-bottom:28px}
  .contact-options{display:flex;flex-direction:column;gap:10px}
  .contact-opt{background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);border-radius:12px;padding:16px 20px;display:flex;align-items:center;gap:14px;text-decoration:none;transition:all .2s}
  .contact-opt:hover{background:rgba(255,255,255,0.12);border-color:rgba(26,158,117,0.4)}
  .contact-icon{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0}
  .contact-name{font-size:14px;font-weight:700;color:white;margin-bottom:2px}
  .contact-val{font-size:13px;color:rgba(255,255,255,0.5)}
  .chat-right{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:20px;padding:28px}
  .chat-title{font-size:18px;font-weight:800;color:white;margin-bottom:6px}
  .chat-sub{font-size:14px;color:rgba(255,255,255,0.45);margin-bottom:22px}
  .chat-input{width:100%;padding:11px 14px;border:1px solid rgba(255,255,255,0.15);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:rgba(255,255,255,0.07);color:white;margin-bottom:10px;transition:border .2s}
  .chat-input:focus{border-color:var(--teal)}
  .chat-input::placeholder{color:rgba(255,255,255,0.3)}
  .chat-textarea{width:100%;padding:11px 14px;border:1px solid rgba(255,255,255,0.15);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:rgba(255,255,255,0.07);color:white;resize:vertical;min-height:100px;margin-bottom:10px;transition:border .2s}
  .chat-textarea:focus{border-color:var(--teal)}
  .chat-textarea::placeholder{color:rgba(255,255,255,0.3)}
  .btn-chat{width:100%;padding:13px;background:var(--teal);color:white;border:none;border-radius:9px;font-weight:700;font-size:15px;font-family:var(--font-display);cursor:pointer;transition:all .2s}
  .btn-chat:hover{background:#158a65}

</style>
</head>
<body <?php body_class( 'page-faq' ); ?>>
<?php wp_body_open(); ?>

<nav class="site-header">
  <div class="nav-logo">
    <a href="<?php echo $url_home; ?>">
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
    <div class="eyebrow-tag">Pusat Informasi Lengkap</div>
    <h1>Semua jawaban<br><span class="accent">yang Anda butuhkan.</span></h1>
    <p class="page-hero-sub">Perbandingan program, harga transparan, dan jawaban atas pertanyaan yang paling sering ditanyakan. Tidak ada yang disembunyikan.</p>
  </div>
</div>

<!-- JUMP NAV -->
<div class="jump-nav">
  <div class="jump-nav-inner">
    <a class="jump-btn active" href="#perbandingan">Perbandingan Program</a>
    <a class="jump-btn" href="#panduan">Panduan Memilih</a>
    <a class="jump-btn" href="#faq-umum">FAQ Umum</a>
    <a class="jump-btn" href="#faq-produk">FAQ Program</a>
    <a class="jump-btn" href="#faq-akreditasi">FAQ Akreditasi</a>
    <a class="jump-btn" href="#faq-harga">FAQ Harga</a>
    <a class="jump-btn" href="#kontak">Tanya Langsung</a>
  </div>
</div>

<!-- COMPARISON TABLE -->
<section class="comp-section" id="perbandingan">
  <div class="comp-inner">
    <p class="eyebrow">Perbandingan Lengkap</p>
    <h2 class="h2">Semua program, semua harga,<br>semua yang termasuk di dalamnya.</h2>
    <p class="body-text" style="max-width:560px">Kami sengaja tampilkan ini secara terbuka. Transparansi adalah fondasi kepercayaan — dan kami membangun bisnis di atas itu.</p>
    <div class="comp-wrap">
      <table class="comp-full">
        <thead>
          <tr>
            <th style="min-width:180px">Aspek</th>
            <th>Mandiri</th>
            <th>Pelatihan &amp;<br>Sertifikasi</th>
            <th class="col-featured">★ Kelas Pendampingan<br><span style="font-weight:400;font-size:12px">Produk Unggulan</span></th>
            <th>Kelas Lanjutan<br>(Privat)</th>
            <th>Full<br>Pendampingan</th>
            <th style="background:#085041;color:white;border-radius:12px 12px 0 0;font-size:12px">🔄 Annual Partnership<br><span style="font-weight:400;font-size:11px;opacity:.75">Lab sudah terakreditasi</span></th>
          </tr>
        </thead>
        <tbody>
          <tr class="row-group-header"><td colspan="7">Biaya &amp; Investasi</td></tr>
          <tr>
            <td>Investasi</td>
            <td><span class="price-tag">Rp 0</span><span class="price-sub">Modal waktu</span></td>
            <td><span class="price-tag">Rp 2–7 jt</span><span class="price-sub">Per orang</span></td>
            <td class="col-featured"><span class="price-tag">Rp 14–35 jt</span><span class="price-sub">1–3 peserta/lab</span></td>
            <td><span class="price-tag">Rp 36 jt</span><span class="price-sub">Per lab</span></td>
            <td><span class="price-tag">Rp 150–200 jt</span><span class="price-sub">Per lab</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="price-tag" style="color:#085041">Rp 36–70 jt</span><span class="price-sub">Per tahun · recurring</span></td>
          </tr>
          <tr>
            <td>Nilai benefit gratis</td>
            <td><span class="check-no">—</span></td>
            <td><span class="check-no">—</span></td>
            <td class="col-featured"><strong style="color:var(--teal)">s.d. Rp 20 jt</strong></td>
            <td><span class="check-no">—</span></td>
            <td><span class="check-partial">Termasuk biaya</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span> Hemat 40% vs satuan</td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Durasi &amp; Struktur</td></tr>
          <tr>
            <td>Durasi program</td>
            <td>2–4 tahun</td>
            <td>1–5 hari</td>
            <td class="col-featured"><strong>6 bulan terstruktur</strong></td>
            <td>2–3 bulan</td>
            <td>6–12 bulan</td>
            <td style="background:rgba(8,80,65,0.05)"><strong style="color:#085041">Tahunan · diperpanjang</strong></td>
          </tr>
          <tr>
            <td>Format pelaksanaan</td>
            <td>Mandiri</td>
            <td>Online / Offline</td>
            <td class="col-featured">Online + Hybrid</td>
            <td>Privat online</td>
            <td>In-house onsite</td>
            <td style="background:rgba(8,80,65,0.05)">Online + kunjungan berkala</td>
          </tr>
          <tr>
            <td>Jumlah peserta</td>
            <td>—</td>
            <td>Publik</td>
            <td class="col-featured"><strong>Maks. 10 instansi</strong></td>
            <td>1 lab (privat)</td>
            <td>1 lab (privat)</td>
            <td style="background:rgba(8,80,65,0.05)">1 lab (privat)</td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Pendampingan &amp; Pakar</td></tr>
          <tr>
            <td>Pendampingan pakar aktif</td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-partial">Selama pelatihan</span></td>
            <td class="col-featured"><span class="check-yes">✓</span> <strong>15+ pakar, 6 bln</strong></td>
            <td><span class="check-yes">✓</span></td>
            <td><span class="check-yes">✓</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span> Berkala per tahun</td>
          </tr>
          <tr>
            <td>Konsultasi privat 1-on-1</td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-no">✗</span></td>
            <td class="col-featured"><span class="check-yes">✓</span> <strong>GRATIS</strong></td>
            <td><span class="check-yes">✓</span></td>
            <td><span class="check-yes">✓</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span></td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Output &amp; Deliverable</td></tr>
          <tr>
            <td>Output dokumen</td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-no">✗</span></td>
            <td class="col-featured"><span class="check-yes">✓</span> <strong>Setiap sesi</strong></td>
            <td><span class="check-yes">✓</span></td>
            <td><span class="check-yes">✓</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span> Review &amp; update</td>
          </tr>
          <tr>
            <td>Template dokumen ISO 17025</td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-no">✗</span></td>
            <td class="col-featured"><span class="check-yes">✓</span> <strong>GRATIS</strong></td>
            <td><span class="check-partial">Tersedia</span></td>
            <td><span class="check-yes">✓</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span> Included</td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Sertifikasi &amp; Kompetensi</td></tr>
          <tr>
            <td>Sertifikat pelatihan (JP)</td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-yes">✓</span></td>
            <td class="col-featured"><span class="check-yes">✓</span> <strong>Setiap sesi</strong></td>
            <td><span class="check-yes">✓</span></td>
            <td><span class="check-yes">✓</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span></td>
          </tr>
          <tr>
            <td>Pelatihan terkait uji kompetensi*</td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-yes">✓</span></td>
            <td class="col-featured"><span class="check-yes">✓</span> <strong>Voucher GRATIS*</strong></td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-partial">Tersedia</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span> Untuk SDM baru*</td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Akses &amp; Komunitas</td></tr>
          <tr>
            <td>Akses webinar 1 tahun</td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-no">✗</span></td>
            <td class="col-featured"><span class="check-yes">✓</span> <strong>GRATIS</strong></td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-yes">✓</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span> Full akses</td>
          </tr>
          <tr>
            <td>Grup diskusi nasional</td>
            <td><span class="check-no">✗</span></td>
            <td><span class="check-no">✗</span></td>
            <td class="col-featured"><span class="check-yes">✓</span> Permanen</td>
            <td><span class="check-yes">✓</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes">✓</span></td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Hasil Akhir</td></tr>
          <tr>
            <td>Target capaian</td>
            <td>Tidak pasti</td>
            <td>Kompetensi individu</td>
            <td class="col-featured"><strong>Siap Audit Internal</strong></td>
            <td><strong>Siap Asesmen KAN</strong></td>
            <td><strong>Siap Akreditasi</strong></td>
            <td style="background:rgba(8,80,65,0.05)"><strong style="color:#085041">Akreditasi terjaga tiap tahun</strong></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td>Mulai dari sini</td>
            <td><span class="check-partial">Butuh waktu panjang</span></td>
            <td><a href="<?php echo $url_pelatihan; ?>" class="btn-comp btn-comp-outline">Lihat jadwal</a></td>
            <td class="comp-cta-cell"><a href="<?php echo $url_kelas; ?>#daftar" class="btn-comp btn-comp-primary">Daftar Sekarang</a></td>
            <td><a href="#kontak" class="btn-comp btn-comp-ghost">Konsultasi dulu</a></td>
            <td><a href="#kontak" class="btn-comp btn-comp-ghost">Konsultasi dulu</a></td>
            <td style="background:rgba(8,80,65,0.08)"><a href="<?php echo $url_inhouse; ?>" class="btn-comp" style="background:#085041;color:white;border:none">Lihat paket →</a></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>

<!-- DECISION GUIDE -->
<section class="decision-section" id="panduan">
  <div class="decision-inner">
    <p class="eyebrow">Panduan Memilih</p>
    <h2 class="h2">Tidak yakin harus mulai<br>dari mana? Ini panduannya.</h2>
    <p class="body-text" style="max-width:560px">Jawab pertanyaan sederhana ini: seberapa siap lab Anda, dan berapa anggaran yang tersedia?</p>
    <div class="decision-grid">
      <div class="decision-card">
        <div class="decision-header d-free">
          <div class="decision-num">01</div>
          <div class="decision-tag">Anggaran nol atau sangat terbatas</div>
          <div class="decision-title">Mulai dari yang gratis dulu.</div>
          <div class="decision-price">100% Gratis</div>
        </div>
        <div class="decision-body">
          <div class="decision-fit">
            <div class="decision-fit-title">Cocok jika...</div>
            <div class="fit-item"><div class="fit-check">✓</div>Belum ada anggaran dari institusi</div>
            <div class="fit-item"><div class="fit-check">✓</div>Masih tahap eksplorasi dan orientasi</div>
            <div class="fit-item"><div class="fit-check">✓</div>Ingin tahu dulu kondisi lab sebelum commit</div>
            <div class="fit-item"><div class="fit-check">✓</div>Mahasiswa atau fresh graduate</div>
          </div>
          <div style="font-size:13px;font-weight:700;color:var(--teal);margin-bottom:8px">Yang bisa dilakukan sekarang:</div>
          <div class="fit-item"><div class="fit-check">✓</div>GAP Analysis gratis</div>
          <div class="fit-item"><div class="fit-check">✓</div>Webinar Lab Talk mingguan</div>
          <div class="fit-item"><div class="fit-check">✓</div>Download panduan &amp; template</div>
          <div class="fit-item"><div class="fit-check">✓</div>Bergabung ke komunitas</div>
          <a href="<?php echo $url_gratis; ?>" class="btn btn-outline-d">Akses yang gratis →</a>
        </div>
      </div>

      <div class="decision-card">
        <div class="decision-header d-core">
          <div class="decision-num">02</div>
          <div class="decision-tag">Anggaran tersedia, ingin hasil nyata</div>
          <div class="decision-title">Kelas Pendampingan adalah pilihan terbaik.</div>
          <div class="decision-price">Rp 14–35 jt / lab</div>
        </div>
        <div class="decision-body">
          <div class="decision-fit">
            <div class="decision-fit-title">Cocok jika...</div>
            <div class="fit-item"><div class="fit-check">✓</div>Lab belum terakreditasi dan ingin mulai</div>
            <div class="fit-item"><div class="fit-check">✓</div>Punya Rp 14–35 jt tapi tidak mampu Rp 150+ jt</div>
            <div class="fit-item"><div class="fit-check">✓</div>Butuh pendampingan terstruktur 6 bulan</div>
            <div class="fit-item"><div class="fit-check">✓</div>Ingin hasil: siap audit internal KAN</div>
          </div>
          <div style="font-size:13px;font-weight:700;color:var(--teal-light);margin-bottom:8px">Rekomendasi paket:</div>
          <div class="fit-item"><div class="fit-check">✓</div>3 peserta (Rp 35 jt) — Manajer Mutu + Teknis + Admin</div>
          <div class="fit-item"><div class="fit-check">✓</div>Hemat s.d. Rp 20 jt dari nilai benefit</div>
          <div class="fit-item"><div class="fit-check">✓</div>Batch Juli 2026 — sisa 4 slot</div>
          <a href="<?php echo $url_kelas; ?>#daftar" class="btn btn-teal-d">Daftar Sekarang →</a>
        </div>
      </div>

      <div class="decision-card">
        <div class="decision-header d-premium">
          <div class="decision-num">03</div>
          <div class="decision-tag">Anggaran besar, butuh hasil cepat</div>
          <div class="decision-title">Kelas Lanjutan atau Full Pendampingan.</div>
          <div class="decision-price">Rp 36 jt – 200 jt</div>
        </div>
        <div class="decision-body">
          <div class="decision-fit">
            <div class="decision-fit-title">Cocok jika...</div>
            <div class="fit-item"><div class="fit-check">✓</div>Sudah selesai Tahap 1–4 dan siap daftar KAN</div>
            <div class="fit-item"><div class="fit-check">✓</div>Butuh pendampingan intensif &amp; privat</div>
            <div class="fit-item"><div class="fit-check">✓</div>Institusi punya anggaran besar untuk IHT</div>
            <div class="fit-item"><div class="fit-check">✓</div>Target akreditasi dalam 6–8 bulan ke depan</div>
          </div>
          <div style="font-size:13px;color:var(--gray-600);margin-top:12px;line-height:1.5">Kelas Lanjutan Privat diperuntukkan bagi yang sudah menyelesaikan Kelas Pendampingan Tahap 1–4.</div>
          <a href="#kontak" class="btn btn-navy-d">Konsultasi kebutuhan →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<div class="faq-section">
  <div class="faq-inner" style="padding:80px 48px">
    <div class="faq-nav">
      <div class="faq-nav-title">Topik FAQ</div>
      <button class="faq-nav-item active" onclick="scrollToFaq('faq-umum',this)">Pertanyaan Umum</button>
      <button class="faq-nav-item" onclick="scrollToFaq('faq-produk',this)">Tentang Program</button>
      <button class="faq-nav-item" onclick="scrollToFaq('faq-akreditasi',this)">Tentang Akreditasi</button>
      <button class="faq-nav-item" onclick="scrollToFaq('faq-harga',this)">Harga &amp; Pembayaran</button>
      <button class="faq-nav-item" onclick="scrollToFaq('faq-teknis',this)">Teknis &amp; Logistik</button>

      <div style="margin-top:28px;padding:16px;background:var(--teal-pale);border-radius:10px;border:1px solid rgba(26,158,117,0.2)">
        <p style="font-size:12px;font-weight:700;color:var(--teal);margin-bottom:6px">Tidak menemukan jawaban?</p>
        <p style="font-size:12px;color:#085041;line-height:1.5;margin-bottom:10px">Tim kami siap membantu dalam 1×24 jam.</p>
        <a href="#kontak" style="display:block;text-align:center;padding:8px;background:var(--teal);color:white;border-radius:7px;font-size:12px;font-weight:700;text-decoration:none">Tanya Tim →</a>
      </div>
    </div>

    <div class="faq-content-area">

      <!-- UMUM -->
      <div class="faq-group" id="faq-umum">
        <div class="faq-group-title"><span class="faq-group-icon">💬</span>Pertanyaan Umum</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apa itu Labnesia dan apa yang membedakannya dari penyedia pelatihan lain? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Labnesia adalah Pusat Kompetensi ISO/IEC 17025 yang berfokus pada pelatihan, workshop, dan pendampingan implementasi sistem manajemen mutu bagi laboratorium pengujian dan kalibrasi di Indonesia. Yang membedakan kami: <strong>(1) output nyata</strong> di setiap sesi bukan hanya materi, <strong>(2) para pakar</strong> yang berpengalaman dalam implementasi sistem manajemen laboratorium, <strong>(3) model publik yang terjangkau</strong> dibanding pendampingan privat konvensional, dan <strong>(4) track record</strong> — 30+ laboratorium yang telah kami dampingi dalam membangun sistem mutu dan meraih akreditasi.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah Labnesia terakreditasi resmi? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Labnesia adalah penyelenggara pelatihan dan pendampingan implementasi sistem manajemen laboratorium. Untuk uji kompetensi perseorangan, Labnesia dapat bekerja sama dengan Lembaga Sertifikasi Profesi (LSP) maupun Lembaga Sertifikasi Person (LSP) seperti LSP Edukia, yang menyelenggarakan uji kompetensi secara independen sesuai SNI ISO/IEC 17024. <strong>Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta langsung kepada LSP terkait</strong> — Labnesia tidak mendaftarkan peserta dan tidak terlibat dalam proses asesmen maupun keputusan kelulusan. Pelatihan dan uji kompetensi merupakan dua kegiatan yang sepenuhnya independen.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Jenis laboratorium apa saja yang bisa mengikuti program Labnesia? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Program kami terbuka untuk semua jenis laboratorium yang ingin mendapatkan akreditasi ISO/IEC 17025 dari KAN, termasuk: Lab Lingkungan, Lab Pangan/Gizi/Halal, Lab Sipil, Lab Pertanian &amp; Pascapanen, Lab Farmasi/Kimia, Lab Biologi &amp; Mikrobiologi, Lab Kalibrasi, Lab Peternakan &amp; Perikanan, dan Lab Energi/Mineral. Kami juga melayani lab dari perguruan tinggi, industri swasta, BUMN, dan pemerintah.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah ada yang benar-benar gratis dari Labnesia? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Ya, beberapa hal yang benar-benar gratis: <strong>GAP Analysis</strong> (laporan kondisi lab + roadmap), <strong>Webinar Lab Talk</strong> mingguan, <strong>Download panduan &amp; template</strong> dasar, dan <strong>Komunitas</strong> Forum Lab Kompeten. Ini bukan gimmick — ini adalah bagian dari filosofi "give first" kami. Kami percaya lab yang sudah merasakan manfaatnya akan memutuskan sendiri.</p><a href="<?php echo $url_gratis; ?>">Akses semua yang gratis →</a></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apa hubungan Labnesia dengan LSP Edukia? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Labnesia dan LSP yang menjadi mitra kerja sama adalah dua entitas yang independen dengan peran berbeda. <strong>Labnesia</strong> menyelenggarakan pelatihan, workshop, dan pendampingan implementasi sistem manajemen laboratorium — bertujuan meningkatkan kompetensi peserta. Labnesia dapat bekerja sama dengan <strong>Lembaga Sertifikasi Profesi (LSP)</strong> maupun <strong>Lembaga Sertifikasi Person (LSP)</strong>, seperti LSP Edukia, yang menyelenggarakan uji kompetensi secara independen dan objektif sesuai SNI ISO/IEC 17024.</p><p style="margin-top:10px">Pelatihan yang diselenggarakan Labnesia dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administrasi untuk mengikuti uji kompetensi pada skema tertentu di LSP mitra. Namun, <strong>keikutsertaan dalam pelatihan Labnesia tidak menjamin kelulusan uji kompetensi</strong>, tidak memberikan jalur khusus, dan tidak memengaruhi keputusan asesmen. Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta langsung kepada LSP terkait, dan jadwal resmi uji kompetensi dipublikasikan melalui media LSP secara terpisah.</p></div></div>
      </div>

      <!-- PRODUK -->
      <div class="faq-group" id="faq-produk">
        <div class="faq-group-title"><span class="faq-group-icon">📚</span>Tentang Program Kelas Pendampingan</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apa perbedaan Kelas Pendampingan dengan pelatihan biasa? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Pelatihan biasa memberikan materi — peserta keluar dengan pengetahuan. Kelas Pendampingan memberikan output dokumen nyata di setiap sesi. Contoh: di sesi Ketidakpastian Pengujian, peserta tidak hanya belajar konsep — mereka langsung mengerjakan <strong>Laporan Ketidakpastian sesuai parameter lab masing-masing</strong>. Keluar dari sesi, dokumen sudah jadi dan siap digunakan. Inilah perbedaan utamanya.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Berapa sesi dalam Kelas Pendampingan dan berapa total jam pelatihan? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Total ada <strong>13 sesi</strong> yang tersebar dalam 4 tahap, dengan total <strong>64 JP (jam pelatihan)</strong>. Ini belum termasuk 40 JP pelatihan tambahan (sudah termasuk dalam paket) bertema Lead Implementer atau Auditor Internal ISO/IEC 17025, yang bertujuan meningkatkan kompetensi peserta dan dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administrasi untuk mengikuti uji kompetensi di LSP Edukia secara mandiri, sesuai ketentuan yang berlaku. Setiap sesi rata-rata 4 JP, dengan beberapa sesi teknis yang lebih panjang (8–16 JP).</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah saya harus hadir di semua sesi? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Kami sangat merekomendasikan kehadiran di semua sesi karena setiap sesi membangun fondasi untuk sesi berikutnya. Namun kami memahami ada kondisi tak terduga — rekaman sesi tersedia untuk peserta yang tidak dapat hadir. Untuk mendapatkan sertifikat setiap sesi, peserta perlu hadir minimal 80% dari durasi sesi tersebut.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah ada yang perlu disiapkan sebelum ikut Kelas Pendampingan? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Tidak ada prasyarat khusus. Yang perlu disiapkan: <strong>(1)</strong> Data laboratorium dasar (parameter pengujian, peralatan yang dimiliki, struktur organisasi), <strong>(2)</strong> Koneksi internet yang stabil untuk sesi online, dan <strong>(3)</strong> Komitmen waktu — setiap sesi biasanya dilaksanakan di akhir pekan atau hari kerja pagi. Kami juga menyarankan untuk mengikuti GAP Analysis gratis terlebih dahulu agar lebih siap.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Setelah Kelas Pendampingan (Tahap 1–4) selesai, apa langkah selanjutnya? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Setelah Tahap 1–4, lab Anda sudah memiliki semua dokumen mutu dan sudah melakukan Audit Internal. Langkah selanjutnya adalah <strong>mendaftar akreditasi ke KAN</strong> dan menghadapi proses asesmen. Untuk ini tersedia dua opsi: <strong>Kelas Lanjutan Privat (Rp 36 jt/lab)</strong> untuk pendampingan Tahap 5 secara intensif, atau Anda bisa mencoba secara mandiri dengan bekal yang sudah ada.</p></div></div>
      </div>

      <!-- AKREDITASI -->
      <div class="faq-group" id="faq-akreditasi">
        <div class="faq-group-title"><span class="faq-group-icon">🏆</span>Tentang Akreditasi KAN</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah setelah mengikuti Kelas Pendampingan lab saya pasti terakreditasi? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Kelas Pendampingan Tahap 1–4 membawa lab Anda ke kondisi <strong>"siap Audit Internal"</strong> — bukan langsung terakreditasi. Proses akreditasi KAN adalah keputusan independen dari KAN setelah mereka melakukan asesmen. Yang kami pastikan: sistem mutu Anda sudah dibangun secara sistematis, dokumen sudah mengacu pada persyaratan standar, dan tim sudah mendapatkan pelatihan yang dibutuhkan. Keputusan akreditasi sepenuhnya berada di tangan KAN melalui proses asesmen yang independen.</p><div class="faq-highlight">Dari 30+ lab yang telah kami dampingi, mayoritas berhasil membangun sistem mutu yang solid dan meraih akreditasi KAN. Hasil asesmen sepenuhnya ditentukan oleh KAN secara independen.</div></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Berapa lama proses akreditasi KAN dari awal hingga mendapat sertifikat? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Secara keseluruhan, prosesnya berkisar 10–18 bulan: <strong>Persiapan sistem mutu</strong> (6 bulan dengan Kelas Pendampingan) + <strong>Pendaftaran di KANMIS</strong> (1–2 bulan) + <strong>Proses audit kecukupan KAN</strong> (1–3 bulan) + <strong>Asesmen lapangan KAN</strong> (1–3 bulan) + <strong>Terbitnya sertifikat</strong> (1–2 bulan). Total dengan jalur kami rata-rata <strong>12–15 bulan</strong>, lebih cepat dibanding jalur mandiri yang bisa 2–4 tahun.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apa saja jenis laboratorium yang bisa diakreditasi KAN? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>KAN memberikan akreditasi untuk dua jenis lab berdasarkan ISO/IEC 17025: <strong>Laboratorium Pengujian</strong> (menganalisis sampel untuk mengukur karakteristik) dan <strong>Laboratorium Kalibrasi</strong> (mengkalibrasi peralatan ukur). Semua bidang bisa diakreditasi — dari pangan, lingkungan, kimia, biologi, sipil, hingga energi dan mineral.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah ada biaya untuk proses akreditasi KAN sendiri? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Ya, ada biaya resmi dari KAN yang terpisah dari biaya program Labnesia. Biaya KAN biasanya berkisar antara Rp 3–15 juta tergantung jumlah parameter yang diakreditasi dan kompleksitas lab. Biaya ini dibayarkan langsung ke KAN, bukan ke Labnesia. Tim kami akan membantu menghitung estimasi biaya KAN untuk lab Anda selama program berlangsung.</p></div></div>
      </div>

      <!-- HARGA -->
      <div class="faq-group" id="faq-harga">
        <div class="faq-group-title"><span class="faq-group-icon">💰</span>Harga &amp; Pembayaran</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah harga di website ini adalah harga final? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Harga yang tertera adalah harga publik standar. Sesekali ada promo terbatas (early bird, promo Ramadhan, dll) yang berlaku sementara. Untuk kebutuhan instansi dengan multiple lab atau jumlah peserta besar, hubungi tim kami untuk mendiskusikan paket khusus. Kami percaya pada transparansi harga — tidak ada biaya tersembunyi.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah ada cicilan atau skema pembayaran bertahap? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Ya, tersedia skema pembayaran: <strong>(1) Lunas</strong> mendapat diskon tambahan 5%, <strong>(2) DP 50%</strong> di awal + pelunasan sebelum Sesi 4, <strong>(3) Cicilan 3×</strong> untuk institusi dengan surat komitmen. Hubungi tim kami untuk mengatur skema yang sesuai dengan alur pencairan anggaran institusi Anda.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah program ini bisa di-reimburse ke institusi / DIPA / anggaran dinas? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Ya, dan banyak peserta kami menggunakan jalur ini. Kami menyediakan: <strong>Invoice resmi</strong>, <strong>Kuitansi bermaterai</strong>, <strong>PKS (Perjanjian Kerja Sama)</strong>, dan <strong>Surat Keterangan Program</strong> sesuai kebutuhan dokumen pengadaan instansi Anda. Hubungi kami dan tim akan bantu mempersiapkan dokumen yang dibutuhkan untuk proses reimburse.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Ada refund jika saya tidak puas? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Kami berkomitmen pada kualitas. Jika setelah mengikuti 3 sesi pertama Anda merasa program tidak memberikan nilai yang dijanjikan, kami akan mendiskusikan solusi terbaik — termasuk kemungkinan pengembalian sebagian biaya atau penggantian sesi. Ini bukan sesuatu yang pernah kami hadapi, tapi komitmen ini kami pegang sungguh-sungguh.</p></div></div>
      </div>

      <!-- TEKNIS -->
      <div class="faq-group" id="faq-teknis">
        <div class="faq-group-title"><span class="faq-group-icon">⚙️</span>Teknis &amp; Logistik</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Platform apa yang digunakan untuk sesi online? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Sesi online menggunakan <strong>Zoom</strong> atau <strong>Google Meet</strong>. Peserta hanya perlu laptop/PC dengan kamera dan mikrofon. Untuk sesi Hybrid (di host laboratory), peserta bisa hadir langsung di lokasi host atau bergabung secara online.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Kapan jadwal sesi? Apakah bisa disesuaikan dengan jam kerja? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Jadwal sesi biasanya dilaksanakan <strong>Sabtu atau Minggu pagi</strong> (08.00–12.00 atau 13.00–17.00 WIB) untuk meminimalkan gangguan jam kerja. Beberapa sesi bisa dilaksanakan hari kerja jika mayoritas peserta batch tersebut menyetujui. Jadwal final ditetapkan di awal batch bersama seluruh peserta.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah rekaman sesi tersedia? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Ya, semua sesi direkam dan tersedia di platform peserta dalam 48 jam setelah sesi berlangsung. Akses rekaman berlaku selama 1 tahun penuh dari tanggal batch dimulai.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Bagaimana dengan peserta dari luar Jawa atau daerah terpencil? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Program ini dirancang online sehingga bisa diikuti dari mana saja di Indonesia. Kami sudah memiliki peserta dari Papua, Kalimantan, Sulawesi, NTT, dan Aceh. Yang dibutuhkan hanya koneksi internet yang cukup stabil. Untuk sesi yang ada komponen hybrid (kunjungan host lab), peserta dari luar kota bisa tetap mengikuti secara online atau memanfaatkan Lab Host yang lebih dekat dengan lokasi mereka.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Berapa lama respon setelah mendaftar GAP Analysis gratis? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Tim kami akan merespons dan menjadwalkan sesi GAP Analysis Anda dalam <strong>maksimal 3 hari kerja</strong> setelah pendaftaran. Untuk laboratorium dengan kebutuhan mendesak (misalnya menghadapi tenggat surveillance atau deadline pengajuan akreditasi), sebutkan kondisi tersebut saat mendaftar agar tim dapat memprioritaskan jadwal Anda.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah GAP Analysis dan pendampingan bisa dilakukan onsite (langsung di lab)? <span class="faq-chevron">▾</span></div><div class="faq-a"><p>Ya. GAP Analysis dan sesi pendampingan dapat dilaksanakan secara <strong>online maupun onsite (langsung di tempat)</strong> sesuai kebutuhan dan kesepakatan dengan laboratorium. Metode online lebih fleksibel dan efisien dari segi biaya, sementara metode onsite memungkinkan tim kami melihat langsung kondisi fasilitas, peralatan, dan proses kerja di lapangan. Untuk laboratorium di luar Jawa, kombinasi keduanya (sebagian online, sebagian onsite) juga dapat diatur.</p></div></div>
      </div>

    </div>
  </div>
</div>

<!-- LIVE CHAT / KONTAK -->
<div class="chat-section" id="kontak">
  <div class="chat-inner">
    <div class="chat-left">
      <p class="eyebrow">Tanya Tim Kami</p>
      <h2>Masih ada yang<br>perlu dijawab?</h2>
      <p>Tim kami siap membantu — tanpa tekanan, tanpa sales pitch. Ceritakan kondisi lab Anda dan kami akan berikan rekomendasi yang jujur.</p>
      <div class="contact-options">
        <a href="https://wa.me/6282172221567" class="contact-opt">
          <div class="contact-icon" style="background:rgba(37,211,102,0.2)">💬</div>
          <div>
            <div class="contact-name">Endang — WhatsApp</div>
            <div class="contact-val">+62 821-7222-1567 · Aktif 08.00–17.00</div>
          </div>
        </a>
        <a href="https://wa.me/6285185000367" class="contact-opt">
          <div class="contact-icon" style="background:rgba(37,211,102,0.2)">💬</div>
          <div>
            <div class="contact-name">Berryl — WhatsApp</div>
            <div class="contact-val">+62 851-8500-0367 · Aktif 08.00–17.00</div>
          </div>
        </a>
        <a href="https://wa.me/62811399523" class="contact-opt">
          <div class="contact-icon" style="background:rgba(37,211,102,0.2)">💬</div>
          <div>
            <div class="contact-name">Kintan — WhatsApp</div>
            <div class="contact-val">+62 811-399-523 · Aktif 08.00–17.00</div>
          </div>
        </a>
        <a href="mailto:info@labnesia.id" class="contact-opt">
          <div class="contact-icon" style="background:rgba(255,255,255,0.1)">📧</div>
          <div>
            <div class="contact-name">Email</div>
            <div class="contact-val">info@labnesia.id · Dijawab dalam 24 jam</div>
          </div>
        </a>
      </div>
    </div>
    <div class="chat-right">
      <div class="chat-title">Kirim pertanyaan Anda</div>
      <div class="chat-sub">Isi form ini dan tim kami akan menjawab dalam 1×24 jam kerja.</div>
      <input class="chat-input" type="text" placeholder="Nama Anda">
      <input class="chat-input" type="tel" placeholder="Nomor WhatsApp">
      <input class="chat-input" type="text" placeholder="Nama lab / instansi">
      <textarea class="chat-textarea" placeholder="Tuliskan pertanyaan atau kondisi lab Anda di sini..."></textarea>
      <button class="btn-chat" onclick="sendQuestion()">Kirim Pertanyaan →</button>
    </div>
  </div>
</div>

<footer class="site-footer">
    <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <span><a href="https://labnesia.id">labnesia.id</a></span>
  </div>
</footer>

<script>
function toggleFaq(el){
  const item=el.parentElement;
  const ans=item.querySelector('.faq-a');
  const isOpen=ans.classList.contains('open');
  document.querySelectorAll('.faq-a').forEach(a=>a.classList.remove('open'));
  document.querySelectorAll('.faq-item').forEach(i=>i.classList.remove('active'));
  if(!isOpen){ans.classList.add('open');item.classList.add('active')}
}
function scrollToFaq(id,btn){
  document.getElementById(id).scrollIntoView({behavior:'smooth',block:'start'});
  document.querySelectorAll('.faq-nav-item').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
}
function sendQuestion(){alert('Pertanyaan Anda sudah kami terima! Tim kami akan menghubungi Anda dalam 1×24 jam.')}
document.querySelectorAll('.jump-btn').forEach(btn=>{
  btn.addEventListener('click',function(){
    document.querySelectorAll('.jump-btn').forEach(b=>b.classList.remove('active'));
    this.classList.add('active');
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>

