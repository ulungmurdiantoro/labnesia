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
  .post-hero-date{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--teal-light);margin-bottom:14px}
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

  @media (max-width:768px){
    .post-hero{padding:88px 24px 40px}
    .post-hero h1{font-size:26px}
    .post-section{padding:40px 24px 56px}
  }
</style>

<div class="post-hero">
  <div class="post-hero-inner">
    <a class="post-back" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">&larr; Kembali ke Blog</a>
    <div class="post-hero-date"><?php echo esc_html( get_the_date() ); ?></div>
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<section class="post-section">
  <div class="post-inner">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'large', [ 'class' => 'post-thumb' ] ); ?>
      <?php endif; ?>
      <div class="post-content">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
