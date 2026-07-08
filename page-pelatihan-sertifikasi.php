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

/**
 * Fetch published jadwal posts for a given JP-tier category, soonest first.
 */
function labnesia_ps_jadwal_posts( $slug ) {
	$q = new WP_Query( [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'category_name'  => $slug,
	] );
	$posts = $q->posts;
	$today = strtotime( 'today' );
	usort( $posts, function( $a, $b ) use ( $today ) {
		$date_a = get_post_meta( $a->ID, '_jadwal_tanggal', true ) ?: $a->post_date;
		$date_b = get_post_meta( $b->ID, '_jadwal_tanggal', true ) ?: $b->post_date;
		$ts_a = strtotime( $date_a );
		$ts_b = strtotime( $date_b );
		$upcoming_a = $ts_a >= $today;
		$upcoming_b = $ts_b >= $today;
		if ( $upcoming_a !== $upcoming_b ) {
			return $upcoming_a ? -1 : 1;
		}
		return $upcoming_a ? ( $ts_a <=> $ts_b ) : ( $ts_b <=> $ts_a );
	} );
	return $posts;
}

/**
 * Render one jadwal-card for a JP-tier post — identical presentation to the
 * cards on /jadwal/ (poster, badge, date, title, excerpt, Daftar Sekarang).
 * Registration only — syllabus content lives in its own section, see
 * labnesia_ps_silabus_section().
 */
function labnesia_ps_jadwal_item( $post, $tag_label ) {
	$event_date     = get_post_meta( $post->ID, '_jadwal_tanggal', true );
	$event_date_end = get_post_meta( $post->ID, '_jadwal_tanggal_selesai', true );
	$event_display  = $event_date
		? labnesia_format_jadwal_date( $event_date, $event_date_end )
		: date_i18n( 'j M Y', strtotime( $post->post_date ) );
	$daftar_url = get_post_meta( $post->ID, '_jadwal_link_daftar', true );
	if ( ! $daftar_url ) $daftar_url = get_permalink( $post );
	$source_thumb = get_post_meta( $post->ID, '_source_featured_image', true );
	$permalink    = get_permalink( $post );
	?>
	<div class="jadwal-card">
		<a href="<?php echo esc_url( $permalink ); ?>">
			<?php if ( has_post_thumbnail( $post ) ) : ?>
				<?php echo get_the_post_thumbnail( $post, 'medium_large', [ 'class' => 'jadwal-card-thumb' ] ); ?>
			<?php elseif ( $source_thumb ) : ?>
				<img class="jadwal-card-thumb" src="<?php echo esc_url( $source_thumb ); ?>" alt="<?php echo esc_attr( get_the_title( $post ) ); ?>" loading="lazy">
			<?php else : ?>
				<div class="jadwal-card-thumb-fallback"><?php labnesia_icon( 'calendar', 'rgba(255,255,255,0.5)', 32 ); ?></div>
			<?php endif; ?>
		</a>
		<div class="jadwal-card-body">
			<div class="jadwal-card-meta">
				<span class="jadwal-card-cat"><?php echo esc_html( $tag_label ); ?></span>
				<span class="jadwal-card-date">
					<?php labnesia_icon( 'calendar', 'var(--amber)', 11 ); ?>
					<?php echo esc_html( $event_display ); ?>
				</span>
			</div>
			<a href="<?php echo esc_url( $permalink ); ?>" style="text-decoration:none">
				<div class="jadwal-card-title"><?php echo esc_html( get_the_title( $post ) ); ?></div>
			</a>
			<div class="jadwal-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post ), 16 ) ); ?></div>
			<div class="jadwal-card-actions">
				<a href="<?php echo esc_url( $daftar_url ); ?>" class="jadwal-card-daftar" target="_blank" rel="noopener noreferrer">Daftar Sekarang</a>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Render a single combined "Silabus" section listing the syllabus for every
 * post in $posts that has structured silabus meta (_jadwal_silabus_data).
 * Kept entirely separate from the registration cards.
 */
function labnesia_ps_silabus_section( $posts ) {
	$entries = [];
	foreach ( $posts as $post ) {
		$silabus = get_post_meta( $post->ID, '_jadwal_silabus_data', true );
		if ( is_array( $silabus ) && ! empty( $silabus['silabus'] ) ) {
			$entries[] = [ 'post' => $post, 'silabus' => $silabus ];
		}
	}
	if ( empty( $entries ) ) return;
	?>
	<div class="silabus-section">
		<p class="eyebrow">Silabus Pelatihan</p>
		<h3 class="silabus-section-title">Lihat materi lengkap tiap skema.</h3>
		<div class="silabus-accordion">
			<?php foreach ( $entries as $i => $entry ) : $post = $entry['post']; $silabus = $entry['silabus']; ?>
			<div class="sil-step">
				<div class="sil-header<?php echo 0 === $i ? ' active' : ''; ?>" onclick="toggleSilabus(this)">
					<div class="sil-title"><?php echo esc_html( get_the_title( $post ) ); ?></div>
					<span class="sil-chevron">&#8250;</span>
				</div>
				<div class="sil-body<?php echo 0 === $i ? ' open' : ''; ?>">
					<?php foreach ( $silabus['silabus'] as $block ) : ?>
					<div class="jsb-block">
						<?php if ( ! empty( $block['heading'] ) ) : ?><div class="jsb-block-title"><?php echo esc_html( $block['heading'] ); ?></div><?php endif; ?>
						<div class="jsb-list">
							<?php foreach ( $block['items'] as $item ) : ?>
							<div class="jsb-item"><span class="jsb-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><?php echo esc_html( $item ); ?></div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endforeach; ?>

					<div class="jsb-grid">
						<?php if ( ! empty( $silabus['output'] ) ) : ?>
						<div class="jsb-block">
							<div class="jsb-block-title">Output</div>
							<div class="jsb-list">
								<?php foreach ( $silabus['output'] as $item ) : ?>
								<div class="jsb-item"><span class="jsb-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><?php echo esc_html( $item ); ?></div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
						<?php if ( ! empty( $silabus['benefit'] ) ) : ?>
						<div class="jsb-block">
							<div class="jsb-block-title">Benefit</div>
							<div class="jsb-list">
								<?php foreach ( $silabus['benefit'] as $item ) : ?>
								<div class="jsb-item"><span class="jsb-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><?php echo esc_html( $item ); ?></div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
						<?php if ( ! empty( $silabus['rekomendasi'] ) ) : ?>
						<div class="jsb-block">
							<div class="jsb-block-title">Direkomendasikan untuk</div>
							<div class="jsb-list">
								<?php foreach ( $silabus['rekomendasi'] as $item ) : ?>
								<div class="jsb-item"><span class="jsb-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><?php echo esc_html( $item ); ?></div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $silabus['investasi'] ) ) : ?>
					<div class="jsb-investasi">Investasi: <?php echo esc_html( $silabus['investasi'] ); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}
?>
<?php get_header(); ?>
<style>
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

  .jp-tabs{display:inline-flex;gap:6px;background:var(--gray-50);padding:6px;border-radius:12px;flex-wrap:wrap;justify-content:center}
  .jp-tab{background:transparent;border:none;padding:10px 20px;border-radius:8px;font-size:14px;font-weight:700;color:var(--gray-600);cursor:pointer;transition:all .2s;font-family:var(--font-display)}
  .jp-tab:hover{color:var(--navy)}
  .jp-tab.active{background:var(--navy);color:white}
  .jp-panel{display:none}
  .jp-panel.active{display:block}

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

  /* JADWAL — registration cards only, matching /jadwal/ exactly */
  .jadwal-section{background:var(--gray-50)}
  .jadwal-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
  .jadwal-card{background:#fff;border:1px solid var(--gray-200);border-radius:16px;overflow:hidden;display:flex;flex-direction:column;transition:box-shadow .2s,transform .2s}
  .jadwal-card:hover{box-shadow:0 12px 28px rgba(11,31,58,0.1);transform:translateY(-2px)}
  .jadwal-card-thumb{width:100%;aspect-ratio:16/10;object-fit:cover;display:block;background:var(--gray-100)}
  .jadwal-card-thumb-fallback{width:100%;aspect-ratio:16/10;background:var(--navy);display:flex;align-items:center;justify-content:center}
  .jadwal-card-body{padding:20px 22px 24px;display:flex;flex-direction:column;flex:1}
  .jadwal-card-meta{display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:8px}
  .jadwal-card-cat{font-size:10px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--teal);background:var(--teal-pale);padding:3px 9px;border-radius:100px}
  .jadwal-card-date{font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--amber);display:flex;align-items:center;gap:4px}
  .jadwal-card-title{font-size:17px;font-weight:800;color:var(--navy);line-height:1.35;margin-bottom:8px}
  .jadwal-card-excerpt{font-size:13px;color:var(--gray-600);line-height:1.6;flex:1;margin-bottom:14px}
  .jadwal-card-actions{display:flex;gap:8px;flex-wrap:wrap}
  .jadwal-card-actions a{font-size:13px;font-weight:700;padding:8px 14px;border-radius:8px;text-decoration:none}
  .jadwal-card-daftar{background:var(--teal);color:#fff}
  .jadwal-card-daftar:hover{background:#158a65}
  @media (max-width:1024px){.jadwal-grid{grid-template-columns:repeat(2,1fr)}}
  @media (max-width:640px){.jadwal-grid{grid-template-columns:1fr}}

  /* SILABUS — standalone section, separate from the registration cards */
  .silabus-section{margin-bottom:40px}
  .silabus-section-title{font-size:22px;font-weight:800;color:var(--navy);letter-spacing:-0.4px;margin-bottom:20px}
  .silabus-accordion{display:flex;flex-direction:column;gap:10px}
  .sil-step{background:white;border:1px solid var(--gray-200);border-radius:12px;overflow:hidden}
  .sil-header{display:flex;align-items:center;justify-content:space-between;gap:14px;padding:16px 20px;cursor:pointer;transition:background .2s}
  .sil-header:hover{background:var(--gray-50)}
  .sil-header.active{background:var(--teal-pale)}
  .sil-title{font-size:14px;font-weight:700;color:var(--navy)}
  .sil-chevron{font-size:16px;color:var(--gray-400);transition:transform .2s;flex-shrink:0;display:inline-block}
  .sil-header.active .sil-chevron{transform:rotate(90deg)}
  .sil-body{display:none;padding:0 20px 20px;border-top:1px solid var(--gray-100)}
  .sil-body.open{display:block;padding-top:18px}
  .jsb-block{margin-bottom:14px}
  .jsb-block:last-child{margin-bottom:0}
  .jsb-block-title{font-size:12px;font-weight:700;color:var(--navy);text-transform:uppercase;letter-spacing:.04em;margin-bottom:6px}
  .jsb-list{display:flex;flex-direction:column;gap:5px}
  .jsb-item{display:flex;align-items:flex-start;gap:8px;font-size:13px;color:var(--gray-600);line-height:1.5}
  .jsb-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:6px}
  .jsb-investasi{background:var(--teal-pale);border-radius:8px;padding:10px 14px;margin-top:14px;font-size:13px;color:#085041;font-weight:700}
  @media (max-width:640px){.jsb-grid{grid-template-columns:1fr}}

  /* OTHER SCHEMES */
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

</style>

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

<!-- CATATAN PENTING -->
<div style="background:var(--gray-50);padding:24px 48px">
  <div style="max-width:1200px;margin:0 auto;display:flex;gap:14px;align-items:flex-start;background:var(--amber-pale);border:1px solid rgba(245,166,35,0.35);border-left:4px solid var(--amber);border-radius:0 12px 12px 0;padding:18px 22px">
    <span style="flex-shrink:0;margin-top:2px"><?php labnesia_icon( 'info', '#8B6000', 18 ); ?></span>
    <div>
      <p style="font-size:12px;font-weight:700;color:#6B4400;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px">Catatan Penting</p>
      <p style="font-size:13px;color:#8B5800;line-height:1.65">Pelatihan yang kami selenggarakan bertujuan untuk meningkatkan kompetensi sumber daya manusia (SDM) di lingkungan perguruan tinggi, serta dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administratif untuk mengikuti uji kompetensi pada skema tertentu di LSP Edukia, sesuai dengan ketentuan yang berlaku. </p>
      <p style="font-size:13px;color:#8B5800;line-height:1.65">Perlu ditegaskan bahwa keikutsertaan dalam pelatihan ini tidak menjamin kelulusan dalam proses sertifikasi kompetensi. Seluruh proses sertifikasi diselenggarakan secara independen oleh LSP Edukia berdasarkan asesmen yang objektif dan mengacu pada standar SNI ISO/IEC 17024.</p>
    </div>
  </div>
</div>

<!-- JP TABS -->
<div style="background:#fff;padding:28px 48px 0;text-align:center">
  <div class="jp-tabs">
    <button type="button" class="jp-tab active" onclick="showJP(this,'jp-40')">Pelatihan 40 JP</button>
    <button type="button" class="jp-tab" onclick="showJP(this,'jp-24')">Pelatihan 24 JP</button>
    <button type="button" class="jp-tab" onclick="showJP(this,'jp-16')">Pelatihan 16 JP</button>
  </div>
</div>

<div id="jp-40" class="jp-panel active">
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
<?php $jp40_posts = labnesia_ps_jadwal_posts( 'pelatihan-40-jp' ); ?>
<section class="jadwal-section">
  <div class="section-inner">
    <p class="eyebrow">Jadwal Pelatihan</p>
    <h2 class="h2">Dibuka rutin sepanjang 2026.</h2>
    <p class="body-text" style="max-width:560px">Jadwal dan tema menyesuaikan kebutuhan & ketersediaan pakar. Hubungi tim kami untuk konfirmasi jadwal terdekat.</p>
    <?php if ( $jp40_posts ) : ?>
    <div class="jadwal-grid">
      <?php foreach ( $jp40_posts as $p ) : labnesia_ps_jadwal_item( $p, '40 JP' ); endforeach; ?>
    </div>
    <?php else : ?>
    <p class="body-text" style="margin-top:16px">Belum ada jadwal 40 JP yang dipublikasikan. <a href="<?php echo esc_url( home_url( '/jadwal/?kategori=pelatihan-40-jp' ) ); ?>" style="color:var(--teal);font-weight:600">Lihat semua jadwal &rarr;</a></p>
    <?php endif; ?>
  </div>
</section>
</div>
<!-- /jp-40 -->

<!-- JP 24 PANEL -->
<?php $jp24_posts = labnesia_ps_jadwal_posts( 'pelatihan-24-jp' ); ?>
<div id="jp-24" class="jp-panel">
<section>
  <div class="section-inner">
    <p class="eyebrow">Skema 24 JP</p>
    <h2 class="h2">Pelatihan kompetensi tematik<br>untuk profesional lab.</h2>
    <p class="body-text" style="max-width:560px;margin-bottom:32px">Skema pelatihan 2 hari (24 JP), online via Zoom, sesuai kebutuhan peran spesifik Anda di laboratorium maupun organisasi. Investasi Rp 1.750.000/peserta.</p>

    <?php labnesia_ps_silabus_section( $jp24_posts ); ?>

    <?php if ( $jp24_posts ) : ?>
    <p class="eyebrow">Daftar Batch</p>
    <div class="jadwal-grid">
      <?php foreach ( $jp24_posts as $p ) : labnesia_ps_jadwal_item( $p, '24 JP' ); endforeach; ?>
    </div>
    <p style="font-size:12px;color:var(--gray-400);margin-top:16px">Setiap skema termasuk e-sertifikat 24 JP, soft copy materi, rekaman pelatihan, dan kartu member Labnesia. Sertifikat pelatihan dapat menjadi salah satu syarat untuk melanjutkan ke uji sertifikasi kompetensi di LSP terkait.</p>
    <?php else : ?>
    <p class="body-text" style="margin-top:16px">Belum ada jadwal 24 JP yang dipublikasikan. <a href="<?php echo esc_url( home_url( '/jadwal/?kategori=pelatihan-24-jp' ) ); ?>" style="color:var(--teal);font-weight:600">Lihat semua jadwal &rarr;</a></p>
    <?php endif; ?>
  </div>
</section>
</div>
<!-- /jp-24 -->

<!-- JP 16 PANEL -->
<?php $jp16_posts = labnesia_ps_jadwal_posts( 'pelatihan-16-jp' ); ?>
<div id="jp-16" class="jp-panel">
<section>
  <div class="section-inner">
    <p class="eyebrow">Skema 16 JP</p>
    <h2 class="h2">Pelatihan topik teknis spesifik,<br>lebih singkat dan fokus.</h2>
    <p class="body-text" style="max-width:560px;margin-bottom:32px">Skema pelatihan 2 hari (16 JP), online via Zoom, untuk pendalaman satu topik teknis penerapan ISO/IEC 17025. Investasi Rp 1.250.000/peserta — diskon Rp 250.000/peserta untuk pendaftaran 2 peserta atau lebih.</p>

    <?php labnesia_ps_silabus_section( $jp16_posts ); ?>

    <?php if ( $jp16_posts ) : ?>
    <p class="eyebrow">Daftar Batch</p>
    <div class="jadwal-grid">
      <?php foreach ( $jp16_posts as $p ) : labnesia_ps_jadwal_item( $p, '16 JP' ); endforeach; ?>
    </div>
    <p style="font-size:12px;color:var(--gray-400);margin-top:16px">Setiap skema termasuk e-sertifikat 16 JP, soft copy materi, rekaman pelatihan, dan kartu member Labnesia. Sertifikat pelatihan dapat menjadi salah satu syarat untuk melanjutkan ke uji sertifikasi kompetensi di LSP terkait.</p>
    <?php else : ?>
    <p class="body-text" style="margin-top:16px">Belum ada jadwal 16 JP yang dipublikasikan. <a href="<?php echo esc_url( home_url( '/jadwal/?kategori=pelatihan-16-jp' ) ); ?>" style="color:var(--teal);font-weight:600">Lihat semua jadwal &rarr;</a></p>
    <?php endif; ?>
  </div>
</section>
</div>
<!-- /jp-16 -->

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
    <div id="pf-success" style="display:none;margin-top:20px;background:var(--teal-pale);border:1px solid rgba(26,158,117,0.3);border-radius:16px;padding:24px;text-align:center">
      <div style="font-size:16px;font-weight:800;color:#085041;margin-bottom:6px">Pendaftaran terkirim!</div>
      <p style="font-size:13px;color:#085041;line-height:1.6">Tim kami akan menghubungi Anda dalam 1×24 jam melalui WhatsApp untuk konfirmasi dan detail pembayaran.</p>
    </div>
  </div>
</section>


<script>
function showJP(el,id){
  document.querySelectorAll('.jp-tab').forEach(t=>t.classList.remove('active'));
  document.querySelectorAll('.jp-panel').forEach(p=>p.classList.remove('active'));
  el.classList.add('active');
  document.getElementById(id).classList.add('active');
}
function toggleSilabus(el){
  const body = el.nextElementSibling;
  const isOpen = body.classList.contains('open');
  const accordion = el.closest('.silabus-accordion');
  accordion.querySelectorAll('.sil-body').forEach(b=>b.classList.remove('open'));
  accordion.querySelectorAll('.sil-header').forEach(h=>h.classList.remove('active'));
  if(!isOpen){body.classList.add('open');el.classList.add('active')}
}
function toggleCurr(el){
  const body=el.nextElementSibling;
  const isOpen=body.classList.contains('open');
  document.querySelectorAll('.curr-body').forEach(b=>b.classList.remove('open'));
  document.querySelectorAll('.curr-header').forEach(h=>h.classList.remove('active'));
  if(!isOpen){body.classList.add('open');el.classList.add('active')}
}

const PF_GAS_URL  = <?php echo wp_json_encode( get_theme_mod( 'labnesia_gas_url', '' ) ); ?>;

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

  function showSuccess(){
    document.getElementById('pf-form').style.display = 'none';
    document.getElementById('pf-success').style.display = 'block';
  }

  if(!PF_GAS_URL){
    btn.disabled = false;
    btn.innerHTML = originalLabel;
    showSuccess();
    return false;
  }

  const formData = new FormData();
  formData.append('form', 'pelatihan-sertifikasi');
  formData.append('nama', nama);
  formData.append('whatsapp', whatsapp);
  formData.append('institusi', institusi);
  formData.append('skema', skema);
  formData.append('format', format);

  fetch(PF_GAS_URL, { method: 'POST', mode: 'no-cors', body: formData })
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