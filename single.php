<?php
/**
 * Single post template — Labnesia.id
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<style>
  .post-hero{background:var(--navy);padding:104px 48px 56px;position:relative;overflow:hidden}
  .post-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .post-hero-inner{max-width:760px;margin:0 auto;position:relative;z-index:1}
  .post-back{display:inline-flex;align-items:center;gap:6px;color:rgba(255,255,255,0.55);font-size:13px;font-weight:600;text-decoration:none;margin-bottom:20px}
  .post-back:hover{color:#fff}
  .post-hero-meta{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:14px}
  .post-hero-cat{font-size:10px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--teal-light);background:rgba(77, 161, 169,0.15);border:1px solid rgba(77, 161, 169,0.3);padding:4px 12px;border-radius:100px}
  .post-hero-date{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,0.5)}
  .post-hero h1{font-size:36px;font-weight:800;color:#fff;line-height:1.25;letter-spacing:-0.8px}

  .post-section{padding:56px 48px 80px;background:#fff}
  .post-inner{max-width:760px;margin:0 auto}
  .post-thumb{width:100%;border-radius:16px;margin-bottom:40px;display:block}
  .post-content{font-size:16px;color:var(--gray-800);line-height:1.8}
  .post-content p{margin-bottom:20px}
  .post-content h2{font-size:26px;font-weight:800;color:var(--navy);margin:36px 0 16px;letter-spacing:-0.4px}
  .post-content h3{font-size:20px;font-weight:700;color:var(--navy);margin:28px 0 12px}
  .post-content ul,.post-content ol{margin:0 0 20px 22px}
  .post-content li{margin-bottom:8px}
  .post-content img{max-width:100%;border-radius:12px;height:auto}
  .post-content a{color:var(--teal);text-decoration:underline}
  .post-content blockquote{border-left:3px solid var(--teal);padding-left:18px;color:var(--gray-600);font-style:italic;margin:24px 0}
  .daftar-form-box{margin-top:40px;padding:28px;background:var(--gray-50);border:1px solid var(--gray-200);border-radius:16px}
  .daftar-form-title{font-size:20px;font-weight:800;color:var(--navy);margin-bottom:6px;letter-spacing:-0.3px}
  .daftar-form-sub{font-size:13px;color:var(--gray-600);margin-bottom:18px}
  .daftar-form{display:flex;flex-direction:column;gap:10px;max-width:420px}
  .daftar-input{padding:11px 14px;border:1px solid var(--gray-200);border-radius:9px;font-size:14px;font-family:inherit;outline:none;transition:border .2s}
  .daftar-input:focus{border-color:var(--teal)}
  .btn-daftar-submit{padding:12px;background:var(--teal);color:#fff;border:none;border-radius:9px;font-weight:700;font-size:14px;font-family:inherit;cursor:pointer;transition:background .2s}
  .btn-daftar-submit:hover{background:#43939A}
  .daftar-notice{padding:12px 16px;border-radius:9px;font-size:13px;margin-bottom:14px}
  .daftar-notice-ok{background:var(--teal-pale);color:#085041;border:1px solid rgba(77, 161, 169,0.3)}
  .daftar-notice-err{background:var(--amber-pale);color:#6B4400;border:1px solid rgba(255, 154, 18,0.3)}

  @media (max-width:768px){
    .post-hero{padding:88px 24px 40px}
    .post-hero h1{font-size:26px}
    .post-section{padding:40px 24px 56px}
  }
</style>

<?php
$is_jadwal_post = has_category( [ 'pelatihan', 'webinar' ] );
if ( $is_jadwal_post ) {
    $jadwal_slugs = [ 'pelatihan', 'webinar' ];
    $hero_cats = array_values( array_filter( get_the_category(), function( $c ) use ( $jadwal_slugs ) {
        return in_array( $c->slug, $jadwal_slugs, true );
    } ) );
    $event_start = get_post_meta( get_the_ID(), '_jadwal_tanggal', true );
    $event_end   = get_post_meta( get_the_ID(), '_jadwal_tanggal_selesai', true );
    $hero_date   = $event_start ? labnesia_format_jadwal_date( $event_start, $event_end ) : get_the_date();
    $back_url    = home_url( '/jadwal/' );
    $back_label  = 'Kembali ke Jadwal';
} else {
    $hero_cats  = get_the_category();
    $hero_date  = get_the_date();
    $back_url   = home_url( '/blog/' );
    $back_label = 'Kembali ke Blog';
}
?>
<div class="post-hero">
  <div class="post-hero-inner">
    <a class="post-back" href="<?php echo esc_url( $back_url ); ?>">&larr; <?php echo esc_html( $back_label ); ?></a>
    <div class="post-hero-meta">
      <?php if ( ! empty( $hero_cats ) ) : ?>
      <span class="post-hero-cat"><?php echo esc_html( $hero_cats[0]->name ); ?></span>
      <?php endif; ?>
      <span class="post-hero-date"><?php echo esc_html( $hero_date ); ?></span>
    </div>
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<section class="post-section">
  <div class="post-inner">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php
      $source_thumb = get_post_meta( get_the_ID(), '_source_featured_image', true );
      if ( has_post_thumbnail() ) :
      ?>
        <?php the_post_thumbnail( 'large', [ 'class' => 'post-thumb' ] ); ?>
      <?php elseif ( $source_thumb ) : ?>
        <img class="post-thumb" src="<?php echo esc_url( $source_thumb ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
      <?php endif; ?>
      <div class="post-content">
        <?php the_content(); ?>
      </div>
      <?php
      // Native registration form paused for now — reverted to Google Form embeds
      // (kept in post_content) until the custom form is ready to go live again.
      // if ( has_category( [ 'pelatihan', 'webinar' ] ) ) : labnesia_render_daftar_form( get_the_ID() ); endif;
      ?>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
