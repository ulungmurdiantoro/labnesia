<?php
/*
Template Name: Blog
*/
if ( ! defined( 'ABSPATH' ) ) exit;

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$blog_query = new WP_Query( [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 9,
    'paged'          => $paged,
] );
?>
<?php get_header(); ?>
<style>
  .page-hero{background:var(--navy);padding:104px 48px 72px;text-align:center;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.15) 0%,transparent 60%)}
  .page-hero-inner{max-width:680px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-block;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-hero h1{font-size:44px;font-weight:800;color:white;line-height:1.15;letter-spacing:-1.2px;margin-bottom:16px}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.55);line-height:1.65}

  .blog-section{padding:72px 48px;background:var(--gray-50)}
  .blog-inner{max-width:1200px;margin:0 auto}
  .blog-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
  .blog-card{background:#fff;border:1px solid var(--gray-200);border-radius:16px;overflow:hidden;text-decoration:none;display:flex;flex-direction:column;transition:box-shadow .2s,transform .2s}
  .blog-card:hover{box-shadow:0 12px 28px rgba(11,31,58,0.1);transform:translateY(-2px)}
  .blog-card-thumb{width:100%;aspect-ratio:16/10;object-fit:cover;display:block;background:var(--gray-100)}
  .blog-card-thumb-fallback{width:100%;aspect-ratio:16/10;background:var(--navy);display:flex;align-items:center;justify-content:center}
  .blog-card-body{padding:20px 22px 24px;display:flex;flex-direction:column;flex:1}
  .blog-card-date{font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--teal);margin-bottom:8px}
  .blog-card-title{font-size:17px;font-weight:800;color:var(--navy);line-height:1.35;margin-bottom:8px}
  .blog-card-excerpt{font-size:13px;color:var(--gray-600);line-height:1.6;flex:1}
  .blog-card-more{margin-top:14px;font-size:13px;font-weight:700;color:var(--teal)}

  .blog-empty{text-align:center;padding:64px 24px;color:var(--gray-600)}

  .blog-pagination{display:flex;justify-content:center;gap:8px;margin-top:40px;flex-wrap:wrap}
  .blog-pagination a,.blog-pagination span{padding:8px 14px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;border:1px solid var(--gray-200);color:var(--gray-600);background:#fff}
  .blog-pagination .current{background:var(--navy);color:#fff;border-color:var(--navy)}
  .blog-pagination a:hover{background:var(--gray-100)}

  @media (max-width:1024px){ .blog-grid{grid-template-columns:repeat(2,1fr)} }
  @media (max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:30px}
    .blog-section{padding:48px 24px}
    .blog-grid{grid-template-columns:1fr}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Blog</div>
    <h1>Wawasan seputar<br><span class="accent">mutu &amp; akreditasi laboratorium.</span></h1>
    <p class="page-hero-sub">Artikel, studi kasus, dan update regulasi ISO/IEC 17025 dari tim Labnesia.</p>
  </div>
</div>

<!-- POSTS -->
<section class="blog-section">
  <div class="blog-inner">
    <?php if ( $blog_query->have_posts() ) : ?>
    <div class="blog-grid">
      <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="blog-card">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'medium_large', [ 'class' => 'blog-card-thumb' ] ); ?>
        <?php else : ?>
          <div class="blog-card-thumb-fallback"><?php labnesia_icon( 'book-open', 'rgba(255,255,255,0.5)', 32 ); ?></div>
        <?php endif; ?>
        <div class="blog-card-body">
          <div class="blog-card-date"><?php echo esc_html( get_the_date() ); ?></div>
          <div class="blog-card-title"><?php the_title(); ?></div>
          <div class="blog-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></div>
          <div class="blog-card-more">Baca selengkapnya <?php labnesia_icon( 'arrow-right', 'currentColor', 12 ); ?></div>
        </div>
      </a>
      <?php endwhile; ?>
    </div>

    <div class="blog-pagination">
      <?php
      echo paginate_links( [
          'total'   => $blog_query->max_num_pages,
          'current' => $paged,
          'mid_size'=> 2,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;',
      ] );
      ?>
    </div>
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p class="blog-empty">Belum ada artikel yang dipublikasikan. Nantikan wawasan seputar akreditasi laboratorium dari kami segera.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
