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
$url_booklet   = esc_url( 'https://labnesia.id/wp-content/uploads/2026/07/Booklet-Kelas-Pendampingan-Labnesia-1.pdf' );

/* ===== PRICING TIERS (auto-switch by date) ===== */
$kp_pricing_tiers = array(
	'normal' => array(
		'label'  => 'Harga Normal',
		'sub'    => '',
		'start'  => null,
		'end'    => null,
		'prices' => array( 1 => 14000000, 2 => 27000000, 3 => 35000000 ),
	),
	'early1' => array(
		'label'  => 'Early Bird 1',
		'sub'    => '1 – 31 Juli 2026',
		'start'  => '2026-07-01 00:00:00',
		'end'    => '2026-07-31 23:59:59',
		'prices' => array( 1 => 10000000, 2 => 19000000, 3 => 27000000 ),
	),
	'early2' => array(
		'label'  => 'Early Bird 2',
		'sub'    => '1 Ags – 30 Sept 2026',
		'start'  => '2026-08-01 00:00:00',
		'end'    => '2026-09-30 23:59:59',
		'prices' => array( 1 => 11000000, 2 => 21000000, 3 => 30000000 ),
	),
);

$kp_now_ts        = current_time( 'timestamp' );
$kp_active_key    = 'normal';
foreach ( array( 'early1', 'early2' ) as $kp_tier_key ) {
	$kp_tier = $kp_pricing_tiers[ $kp_tier_key ];
	if ( $kp_now_ts >= strtotime( $kp_tier['start'] ) && $kp_now_ts <= strtotime( $kp_tier['end'] ) ) {
		$kp_active_key = $kp_tier_key;
		break;
	}
}
$kp_active        = $kp_pricing_tiers[ $kp_active_key ];
$kp_active_prices = $kp_active['prices'];

if ( ! function_exists( 'labnesia_kp_rp' ) ) {
	function labnesia_kp_rp( $n ) {
		return 'Rp' . number_format( $n, 0, ',', '.' ) . ',-';
	}
}
?>
<?php get_header(); ?>
<style>
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
  .btn-booklet{background:linear-gradient(135deg,#F5A623 0%,#FFC24D 100%);color:var(--navy);padding:11px 24px;border-radius:9px;font-weight:800;font-size:14px;text-decoration:none;border:none;cursor:pointer;transition:all .2s;display:inline-flex;align-items:center;gap:8px;box-shadow:0 4px 14px rgba(245,166,35,.45)}
  .btn-booklet:hover{transform:translateY(-1px);box-shadow:0 6px 18px rgba(245,166,35,.6)}

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

  /* BATCH TIMELINE */
  .batch-tabs{display:flex;gap:8px;margin-bottom:24px;flex-wrap:wrap}
  .batch-tab{padding:10px 20px;border-radius:9px;border:1.5px solid var(--gray-200);background:white;font-size:14px;font-weight:700;color:var(--gray-600);cursor:pointer;transition:all .2s}
  .batch-tab:hover{border-color:var(--teal);color:var(--teal)}
  .batch-tab.active{background:var(--navy);border-color:var(--navy);color:white}
  .batch-panel{display:none}
  .batch-panel.active{display:block}
  .bt-item{display:flex;align-items:center;margin-bottom:14px}
  .bt-num{width:36px;height:36px;border-radius:50%;background:white;border:2px solid var(--teal);color:var(--teal);font-weight:800;font-size:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
  .bt-dash{width:14px;height:2px;background:var(--gray-200);flex-shrink:0}
  .bt-date{background:var(--teal);border-radius:10px;padding:9px 14px;text-align:center;min-width:100px;flex-shrink:0}
  .bt-date-day{font-size:9px;font-weight:700;color:rgba(255,255,255,.8);text-transform:uppercase;letter-spacing:.03em}
  .bt-date-num{font-size:18px;font-weight:800;color:white;line-height:1.15}
  .bt-date-month{font-size:10px;font-weight:700;color:white;text-transform:uppercase}
  .bt-date-time{background:var(--navy);color:white;font-size:9px;font-weight:700;padding:3px 8px;border-radius:5px;margin-top:5px;white-space:nowrap;display:inline-block}
  .bt-card{flex:1;background:white;border:1px solid var(--gray-200);border-radius:10px;padding:12px 18px;margin-left:14px;font-size:14px;font-weight:700;color:var(--navy);line-height:1.4}
  .bt-coming-soon{background:var(--gray-50);border:1.5px dashed var(--gray-200);border-radius:16px;padding:48px 24px;text-align:center}
  .bt-coming-soon-title{font-size:18px;font-weight:800;color:var(--navy);margin-bottom:8px}
  .bt-coming-soon-sub{font-size:14px;color:var(--gray-600);max-width:420px;margin:0 auto}

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
  .price-card{background:white;border:2px solid var(--teal);border-radius:20px;overflow:hidden}
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

  /* PRICE TABLE (full width, auto highlight by date) */
  .price-table-wrap{max-width:1200px;margin:0 auto;padding:48px 48px 0}
  .price-table-title{font-size:14px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:.04em;margin-bottom:20px}
  .price-table{width:100%;border-collapse:separate;border-spacing:10px 14px}
  .price-table tr.pt-head-row td{padding:0;text-align:center;font-size:13px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:.03em}
  .pt-best-badge{background:var(--teal);color:white;font-size:10px;font-weight:800;padding:2px 9px;border-radius:100px;margin-left:6px;vertical-align:middle;text-transform:none;letter-spacing:0}
  .pt-row-label{width:190px;padding:0 10px 0 0!important}
  .pt-row-label-main{font-size:15px;font-weight:800;color:var(--navy)}
  .pt-row-label-sub{font-size:12px;color:var(--gray-600);margin-top:2px}
  .pt-box{border-radius:12px;padding:16px 12px;text-align:center;position:relative}
  .pt-box-normal{background:white;border:1.5px solid var(--gray-200)}
  .pt-box-normal .pt-price{color:var(--gray-400);text-decoration:line-through}
  .pt-box-normal .pt-sub{color:var(--gray-400);text-decoration:line-through}
  .pt-box-early1{background:var(--teal)}
  .pt-box-early1 .pt-price,.pt-box-early1 .pt-sub{color:white}
  .pt-box-early2{background:var(--navy)}
  .pt-box-early2 .pt-price,.pt-box-early2 .pt-sub{color:white}
  .pt-price{font-size:19px;font-weight:800;line-height:1.2}
  .pt-sub{font-size:11px;opacity:.9;margin-top:3px}
  .pt-active-ring{box-shadow:0 0 0 3px rgba(245,166,35,.6)}
  .pt-active-tag{position:absolute;top:-11px;left:50%;transform:translateX(-50%);background:var(--amber);color:var(--navy);font-size:9px;font-weight:800;padding:3px 10px;border-radius:100px;letter-spacing:.03em;white-space:nowrap;box-shadow:0 2px 6px rgba(0,0,0,.15)}
  @media (max-width:860px){.price-table{border-spacing:6px 10px}.pt-row-label{width:110px}.price-table tr.pt-head-row td{font-size:11px}.pt-price{font-size:15px}}

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

  /* UTILITY */
  .bg-gray{background:var(--gray-50)}
  .tag-batch{display:inline-flex;align-items:center;gap:6px;background:rgba(245,166,35,0.15);border:1px solid rgba(245,166,35,0.3);color:#8B5800;padding:4px 12px;border-radius:6px;font-size:12px;font-weight:700}
</style>

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
      <span class="sticky-price"><?php echo labnesia_kp_rp( $kp_active_prices[1] ); ?></span>
      <span class="sticky-unit">/peserta · mulai dari<?php echo $kp_active_key !== 'normal' ? ' (' . esc_html( $kp_active['label'] ) . ')' : ''; ?></span>
    </div>
    <span class="sticky-promo"><?php labnesia_icon( 'zap', '#8B6000', 12 ); ?> Hemat s.d. Rp 20 juta</span>
  </div>
  <div class="sticky-actions">
    <a href="<?php echo $url_booklet; ?>" class="btn-booklet" target="_blank" rel="noopener"><?php labnesia_icon( 'download', 'var(--navy)', 14 ); ?> Unduh Booklet</a>
    <a href="#outline" class="btn-ghost">Lihat Outline</a>
    <a href="#form-daftar" class="btn-primary">Daftar Sekarang</a>
    <a href="<?php echo $url_gratis; ?>" class="btn-amber">Konsultasi Gratis Dulu</a>
  </div>
</div>

<!-- PRICE TABLE -->
<div class="price-table-wrap">
  <p class="price-table-title">Harga per Instansi / Laboratorium:</p>
  <div style="overflow-x:auto">
    <table class="price-table">
      <tr class="pt-head-row">
        <td></td>
        <?php foreach ( array( 1, 2, 3 ) as $kp_n ) : ?>
        <td>
          <?php echo $kp_n; ?> Peserta<?php if ( 3 === $kp_n ) : ?><span class="pt-best-badge">BEST VALUE</span><?php endif; ?>
        </td>
        <?php endforeach; ?>
      </tr>
      <?php foreach ( $kp_pricing_tiers as $kp_key => $kp_tier ) :
        $kp_is_active = ( $kp_key === $kp_active_key );
      ?>
      <tr class="pt-row">
        <td class="pt-row-label">
          <div class="pt-row-label-main"><?php echo esc_html( $kp_tier['label'] ); ?></div>
          <?php if ( $kp_tier['sub'] ) : ?><div class="pt-row-label-sub"><?php echo esc_html( $kp_tier['sub'] ); ?></div><?php endif; ?>
        </td>
        <?php foreach ( array( 1, 2, 3 ) as $kp_n ) :
          $kp_price     = $kp_tier['prices'][ $kp_n ];
          $kp_per_orang = floor( $kp_price / $kp_n );
        ?>
        <td>
          <div class="pt-box pt-box-<?php echo esc_attr( $kp_key ); ?><?php echo $kp_is_active ? ' pt-active-ring' : ''; ?>">
            <?php if ( $kp_is_active ) : ?><span class="pt-active-tag">Harga Saat Ini</span><?php endif; ?>
            <div class="pt-price"><?php echo labnesia_kp_rp( $kp_price ); ?></div>
            <div class="pt-sub"><?php echo ( 1 === $kp_n ) ? '/ orang' : labnesia_kp_rp( $kp_per_orang ) . '/ orang'; ?></div>
          </div>
        </td>
        <?php endforeach; ?>
      </tr>
      <?php endforeach; ?>
    </table>
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
    <?php
    $kp_batch1_sessions = array(
      array( 'day' => 'Senin',          'date' => '29',    'month' => 'Juni 2026',      'time' => '09.00 – 12.00 WIB', 'title' => 'Pemahaman SNI ISO/IEC 17025:2017' ),
      array( 'day' => 'Selasa',         'date' => '30',    'month' => 'Juni 2026',      'time' => '09.00 – 12.00 WIB', 'title' => 'GAP Analysis Kesiapan Akreditasi Laboratorium' ),
      array( 'day' => 'Senin – Selasa', 'date' => '13–14', 'month' => 'Juli 2026',      'time' => '09.00 – 12.00 WIB', 'title' => 'Penyusunan Dokumen Sistem Manajemen SNI ISO/IEC 17025:2017' ),
      array( 'day' => 'Senin – Selasa', 'date' => '27–28', 'month' => 'Juli 2026',      'time' => '09.00 – 12.00 WIB', 'title' => 'Implementasi Uji Profisiensi dan Uji Banding Antar Laboratorium' ),
      array( 'day' => 'Senin – Selasa', 'date' => '10–11', 'month' => 'Agustus 2026',   'time' => '09.00 – 12.00 WIB', 'title' => 'Verifikasi dan Validasi Metode Pengujian' ),
      array( 'day' => 'Senin – Selasa', 'date' => '24–25', 'month' => 'Agustus 2026',   'time' => '09.00 – 12.00 WIB', 'title' => 'Ketidakpastian Pengukuran Sesuai SNI ISO/IEC 17025:2017' ),
      array( 'day' => 'Senin – Selasa', 'date' => '07–08', 'month' => 'September 2026', 'time' => '09.00 – 12.00 WIB', 'title' => 'Penerapan Jaminan Mutu Internal dan Pengendalian Mutu Hasil Uji' ),
      array( 'day' => 'Senin – Rabu',   'date' => '21–23', 'month' => 'Oktober 2026',   'time' => '09.00 – 16.00 WIB', 'title' => 'Audit Internal Laboratorium Berdasarkan SNI ISO/IEC 17025:2017' ),
      array( 'day' => 'Senin – Selasa', 'date' => '26–27', 'month' => 'Oktober 2026',   'time' => '09.00 – 12.00 WIB', 'title' => 'Implementasi Kaji Ulang Manajemen Sesuai SNI ISO/IEC 17025:2017' ),
    );
    $kp_batch2_sessions = array(
      array( 'month' => 'Oktober 2026',   'time' => '09.00 – 12.00 WIB', 'title' => 'Pemahaman SNI ISO/IEC 17025:2017' ),
      array( 'month' => 'Oktober 2026',   'time' => '09.00 – 12.00 WIB', 'title' => 'GAP Analysis Kesiapan Akreditasi Laboratorium' ),
      array( 'month' => 'Oktober 2026',   'time' => '09.00 – 12.00 WIB', 'title' => 'Penyusunan Dokumen Sistem Manajemen SNI ISO/IEC 17025:2017' ),
      array( 'month' => 'November 2026',  'time' => '09.00 – 12.00 WIB', 'title' => 'Implementasi Uji Profisiensi dan Uji Banding Antar Laboratorium' ),
      array( 'month' => 'November 2026',  'time' => '09.00 – 12.00 WIB', 'title' => 'Verifikasi dan Validasi Metode Pengujian' ),
      array( 'month' => 'Desember 2026',  'time' => '09.00 – 12.00 WIB', 'title' => 'Ketidakpastian Pengukuran Sesuai SNI ISO/IEC 17025:2017' ),
      array( 'month' => 'Desember 2026',  'time' => '09.00 – 12.00 WIB', 'title' => 'Penerapan Jaminan Mutu Internal dan Pengendalian Mutu Hasil Uji' ),
      array( 'month' => 'Januari 2027',   'time' => '09.00 – 12.00 WIB', 'title' => 'Audit Internal Laboratorium Berdasarkan SNI ISO/IEC 17025:2017' ),
      array( 'month' => 'Januari 2027',   'time' => '09.00 – 12.00 WIB', 'title' => 'Implementasi Kaji Ulang Manajemen Sesuai SNI ISO/IEC 17025:2017' ),
    );
    ?>
    <div style="margin-bottom:56px">
      <p class="eyebrow">Timeline Per Batch</p>
      <h2 class="h2">Pilih batch yang sesuai<br>jadwal lab Anda.</h2>
      <p class="body" style="margin-bottom:24px">Setiap batch mengikuti alur 9 sesi yang sama — hanya jadwal pelaksanaannya yang berbeda.</p>

      <div class="batch-tabs">
        <button type="button" class="batch-tab" onclick="showBatch(this,'batch-1')">Batch 1 · Juni 2026 <span style="opacity:.7;font-weight:600">(Pendaftaran ditutup)</span></button>
        <button type="button" class="batch-tab active" onclick="showBatch(this,'batch-2')">Batch 2 · Oktober 2026</button>
        <button type="button" class="batch-tab" onclick="showBatch(this,'batch-3')">Batch 3</button>
      </div>

      <div class="batch-panel" id="batch-1">
        <?php foreach ( $kp_batch1_sessions as $kp_i => $kp_s ) : ?>
        <div class="bt-item">
          <div class="bt-num"><?php echo str_pad( $kp_i + 1, 2, '0', STR_PAD_LEFT ); ?></div>
          <div class="bt-dash"></div>
          <div class="bt-date">
            <div class="bt-date-day"><?php echo esc_html( $kp_s['day'] ); ?></div>
            <div class="bt-date-num"><?php echo esc_html( $kp_s['date'] ); ?></div>
            <div class="bt-date-month"><?php echo esc_html( $kp_s['month'] ); ?></div>
            <div class="bt-date-time"><?php echo esc_html( $kp_s['time'] ); ?></div>
          </div>
          <div class="bt-card"><?php echo esc_html( $kp_s['title'] ); ?></div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="batch-panel active" id="batch-2">
        <?php foreach ( $kp_batch2_sessions as $kp_i => $kp_s ) : ?>
        <div class="bt-item">
          <div class="bt-num"><?php echo str_pad( $kp_i + 1, 2, '0', STR_PAD_LEFT ); ?></div>
          <div class="bt-dash"></div>
          <div class="bt-date">
            <div class="bt-date-month" style="font-size:12px;margin-top:2px"><?php echo esc_html( $kp_s['month'] ); ?></div>
            <div class="bt-date-time"><?php echo esc_html( $kp_s['time'] ); ?></div>
          </div>
          <div class="bt-card"><?php echo esc_html( $kp_s['title'] ); ?></div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="batch-panel" id="batch-3">
        <div class="bt-coming-soon">
          <div class="bt-coming-soon-title">🚧 Jadwal Batch 3 — Coming Soon</div>
          <p class="bt-coming-soon-sub">Jadwal lengkap Batch 3 akan segera diumumkan. Hubungi tim kami untuk mendapat info paling awal begitu jadwal dan kuota dibuka.</p>
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
      <?php
      $kp_jt1    = $kp_active_prices[1] / 1000000;
      $kp_jt2    = $kp_active_prices[2] / 1000000;
      $kp_jt3    = $kp_active_prices[3] / 1000000;
      $kp_hemat2 = ( $kp_active_prices[1] * 2 - $kp_active_prices[2] ) / 1000000;
      ?>
      <div class="price-card-header">
        <div class="price-card-eyebrow">Kelas Pendampingan<?php echo ( 'normal' !== $kp_active_key ) ? ' · ' . esc_html( $kp_active['label'] ) . ' Aktif' : ' · Pendaftaran Dibuka'; ?></div>
        <div class="price-card-title">Akreditasi Lab ISO/IEC 17025</div>
        <div class="price-row">
          <span class="price-main" id="price-display">Rp <?php echo $kp_jt1; ?> jt</span>
          <span class="price-unit">/peserta</span>
        </div>
        <div class="price-options">
          <div class="price-opt active" onclick="selectPrice(this,'Rp <?php echo $kp_jt1; ?> jt','1 peserta')">
            <div class="price-opt-num">1 peserta</div>
            <div class="price-opt-val"><?php echo $kp_jt1; ?> jt</div>
            <div class="price-opt-sub">per orang</div>
          </div>
          <div class="price-opt" onclick="selectPrice(this,'Rp <?php echo $kp_jt2; ?> jt','2 peserta')">
            <div class="price-opt-num">2 peserta</div>
            <div class="price-opt-val"><?php echo $kp_jt2; ?> jt</div>
            <div class="price-opt-sub"><?php echo $kp_hemat2 > 0 ? 'hemat ' . $kp_hemat2 . ' jt' : 'per instansi'; ?></div>
          </div>
          <div class="price-opt best" onclick="selectPrice(this,'Rp <?php echo $kp_jt3; ?> jt','3 peserta')">
            <div class="price-opt-num">3 peserta</div>
            <div class="price-opt-val"><?php echo $kp_jt3; ?> jt</div>
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
        <p class="urgency-text"><?php labnesia_icon( 'hourglass', '#8B6000', 12 ); ?> Batch Oktober 2026 dibuka — <strong>maks. 10 instansi/batch</strong></p>
      </div>

      <div class="price-cta">
        <a href="#form-daftar" class="btn-amber">Daftar Batch Berikutnya</a>
        <a href="<?php echo $url_booklet; ?>" class="btn-booklet" style="justify-content:center;width:100%" target="_blank" rel="noopener"><?php labnesia_icon( 'download', 'var(--navy)', 14 ); ?> Unduh Booklet Program</a>
        <a href="<?php echo $url_gratis; ?>" class="btn-ghost">Konsultasi gratis dulu <?php labnesia_icon( 'arrow-right', 'var(--navy)', 14 ); ?></a>
      </div>

      <div class="guarantee">
        <div class="guarantee-icon"><?php labnesia_icon( 'shield-check', 'var(--teal)', 22 ); ?></div>
        <div class="guarantee-text">Jika output per sesi belum memenuhi standar yang disepakati, kami sediakan sesi konsultasi tambahan tanpa biaya. Track record kami: 30+ lab yang kami dampingi berhasil membangun sistem mutu yang solid.</div>
      </div>
    </div>

    <!-- MINI FORM -->
    <form id="form-daftar" onsubmit="return submitForm(event)" style="margin-top:20px;background:white;border:1px solid var(--gray-200);border-radius:16px;padding:24px">
      <h3 style="font-size:17px;font-weight:800;color:var(--navy);margin-bottom:4px">Amankan slot Anda sekarang</h3>
      <p style="font-size:13px;color:var(--gray-600);margin-bottom:20px">Tim kami akan menghubungi Anda dalam 1×24 jam untuk konfirmasi dan detail pembayaran.</p>
      <div style="display:flex;flex-direction:column;gap:12px">
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Nama lengkap *</label>
          <input type="text" id="mf-nama" placeholder="Nama Anda" required style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s" onfocus="this.style.borderColor='var(--teal)'" onblur="this.style.borderColor='var(--gray-200)'">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Nama laboratorium / instansi *</label>
          <input type="text" id="mf-institusi" placeholder="Lab / Universitas / Perusahaan" required style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s" onfocus="this.style.borderColor='var(--teal)'" onblur="this.style.borderColor='var(--gray-200)'">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Nomor WhatsApp *</label>
          <input type="tel" id="mf-whatsapp" placeholder="08xx-xxxx-xxxx" required style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s" onfocus="this.style.borderColor='var(--teal)'" onblur="this.style.borderColor='var(--gray-200)'">
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Jumlah peserta</label>
          <select id="mf-jumlah" style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;background:white">
            <option>1 peserta — <?php echo labnesia_kp_rp( $kp_active_prices[1] ); ?></option>
            <option>2 peserta — <?php echo labnesia_kp_rp( $kp_active_prices[2] ); ?></option>
            <option selected>3 peserta — <?php echo labnesia_kp_rp( $kp_active_prices[3] ); ?> (Best Value)</option>
          </select>
        </div>
        <div>
          <label style="font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px">Bidang laboratorium</label>
          <select id="mf-bidang" style="width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:var(--font-display);outline:none;background:white">
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
        <button type="submit" id="mf-submit-btn" style="background:var(--teal);color:white;padding:13px;border-radius:9px;font-weight:700;font-size:15px;border:none;cursor:pointer;width:100%;font-family:var(--font-display);transition:all .2s" onmouseover="this.style.background='#158a65'" onmouseout="this.style.background='var(--teal)'">Daftar Sekarang <?php labnesia_icon( 'arrow-right', '#ffffff', 15 ); ?></button>
        <p style="font-size:11px;color:var(--gray-400);text-align:center;line-height:1.5">Dengan mendaftar, Anda menyetujui syarat & ketentuan program. Tidak ada biaya di tahap ini — tim kami akan menghubungi Anda terlebih dahulu.</p>
      </div>
    </form>
    <div id="mf-success" style="display:none;margin-top:20px;background:var(--teal-pale);border:1px solid rgba(26,158,117,0.3);border-radius:16px;padding:24px;text-align:center">
      <div style="font-size:16px;font-weight:800;color:#085041;margin-bottom:6px">Pendaftaran terkirim!</div>
      <p style="font-size:13px;color:#085041;line-height:1.6">Tim kami akan menghubungi Anda dalam 1×24 jam melalui WhatsApp untuk konfirmasi dan detail pembayaran.</p>
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
    <p class="cta-note">Atau hubungi tim: <?php labnesia_whatsapp_link( '6282172221567', '+62 821-7222-1567 (Endang)', 'rgba(255,255,255,0.35)', 13 ); ?> · <?php labnesia_whatsapp_link( '6285185000367', '+62 851-8500-0367 (Berryl)', 'rgba(255,255,255,0.35)', 13 ); ?> · <?php labnesia_whatsapp_link( '62811399523', '+62 811-399-523 (Kintan)', 'rgba(255,255,255,0.35)', 13 ); ?></p>
  </div>
</div>

<script>
function showBatch(el,id){
  document.querySelectorAll('.batch-tab').forEach(t=>t.classList.remove('active'));
  document.querySelectorAll('.batch-panel').forEach(p=>p.classList.remove('active'));
  el.classList.add('active');
  document.getElementById(id).classList.add('active');
}
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
const MF_GAS_URL   = <?php echo wp_json_encode( get_theme_mod( 'labnesia_gas_url', '' ) ); ?>;

function submitForm(event){
  event.preventDefault();

  const nama      = document.getElementById('mf-nama').value.trim();
  const institusi = document.getElementById('mf-institusi').value.trim();
  const whatsapp  = document.getElementById('mf-whatsapp').value.trim();
  const jumlahSel = document.getElementById('mf-jumlah');
  const jumlah    = jumlahSel.selectedOptions[0].text;
  const bidangSel = document.getElementById('mf-bidang');
  const bidang    = bidangSel.selectedOptions[0].text;

  if(!nama || !institusi || !whatsapp){
    alert('Mohon lengkapi Nama, Nama laboratorium/instansi, dan Nomor WhatsApp.');
    return false;
  }

  const btn = document.getElementById('mf-submit-btn');
  btn.disabled = true;
  const originalLabel = btn.innerHTML;
  btn.innerHTML = 'Mengirim...';

  function showSuccess(){
    document.getElementById('form-daftar').style.display = 'none';
    document.getElementById('mf-success').style.display = 'block';
  }

  if(!MF_GAS_URL){
    btn.disabled = false;
    btn.innerHTML = originalLabel;
    showSuccess();
    return false;
  }

  const formData = new FormData();
  formData.append('form', 'kelas-pendampingan');
  formData.append('nama', nama);
  formData.append('institusi', institusi);
  formData.append('whatsapp', whatsapp);
  formData.append('jumlah', jumlah);
  formData.append('bidang', bidang);

  fetch(MF_GAS_URL, { method: 'POST', mode: 'no-cors', body: formData })
    .catch(function(){ /* no-cors gives an opaque response either way — still proceed */ })
    .finally(function(){
      btn.disabled = false;
      btn.innerHTML = originalLabel;
      showSuccess();
    });

  return false;
}
</script>
<?php get_footer(); ?>
