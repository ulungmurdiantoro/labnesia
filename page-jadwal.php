<?php
/*
Template Name: Jadwal
*/
if ( ! defined( 'ABSPATH' ) ) exit;

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$jadwal_query = new WP_Query( [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 9,
    'paged'          => $paged,
    'category__in'   => labnesia_category_ids_by_slug( [ 'pelatihan', 'webinar' ] ),
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
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.55);line-height:1.65}

  .jadwal-section{padding:72px 48px;background:var(--gray-50)}
  .jadwal-inner{max-width:1200px;margin:0 auto}
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
  .jadwal-card-detail{background:var(--gray-100);color:var(--navy)}
  .jadwal-card-detail:hover{background:var(--gray-200)}

  .jadwal-empty{padding:96px 48px;text-align:center}
  .jadwal-empty-inner{max-width:520px;margin:0 auto}
  .jadwal-empty-icon{width:72px;height:72px;border-radius:50%;background:var(--teal-pale);display:flex;align-items:center;justify-content:center;margin:0 auto 24px}
  .jadwal-empty h2{font-size:24px;font-weight:800;color:var(--navy);margin-bottom:10px;letter-spacing:-0.4px}
  .jadwal-empty p{font-size:14px;color:var(--gray-600);line-height:1.7;margin-bottom:28px}
  .jadwal-empty-actions{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}

  .jadwal-pagination{display:flex;justify-content:center;gap:8px;margin-top:40px;flex-wrap:wrap}
  .jadwal-pagination a,.jadwal-pagination span{padding:8px 14px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;border:1px solid var(--gray-200);color:var(--gray-600);background:#fff}
  .jadwal-pagination .current{background:var(--navy);color:#fff;border-color:var(--navy)}
  .jadwal-pagination a:hover{background:var(--gray-100)}

  @media (max-width:1024px){ .jadwal-grid{grid-template-columns:repeat(2,1fr)} }
  @media (max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:30px}
    .jadwal-section{padding:48px 24px}
    .jadwal-grid{grid-template-columns:1fr}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Jadwal</div>
    <h1>Jadwal program &amp;<br><span class="accent">batch pelatihan.</span></h1>
    <p class="page-hero-sub">Jadwal Pelatihan &amp; Sertifikasi dan Webinar terdekat dari tim Labnesia.</p>
  </div>
</div>

<!-- JADWAL LIST -->
<section class="jadwal-section">
  <div class="jadwal-inner">
    <?php if ( $jadwal_query->have_posts() ) : ?>
    <div class="jadwal-grid">
      <?php while ( $jadwal_query->have_posts() ) : $jadwal_query->the_post();
        $event_date = get_post_meta( get_the_ID(), '_jadwal_tanggal', true );
        $daftar_url = get_post_meta( get_the_ID(), '_jadwal_link_daftar', true );
        $source_thumb = get_post_meta( get_the_ID(), '_source_featured_image', true );
        // Only ever show Pelatihan/Webinar as the badge here, never Kegiatan
        // (or any other category a post might also carry).
        $jadwal_slugs = [ 'pelatihan', 'webinar' ];
        $cats = array_values( array_filter( get_the_category(), function( $c ) use ( $jadwal_slugs ) {
            return in_array( $c->slug, $jadwal_slugs, true );
        } ) );
      ?>
      <div class="jadwal-card">
        <a href="<?php the_permalink(); ?>">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large', [ 'class' => 'jadwal-card-thumb' ] ); ?>
          <?php elseif ( $source_thumb ) : ?>
            <img class="jadwal-card-thumb" src="<?php echo esc_url( $source_thumb ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
          <?php else : ?>
            <div class="jadwal-card-thumb-fallback"><?php labnesia_icon( 'calendar', 'rgba(255,255,255,0.5)', 32 ); ?></div>
          <?php endif; ?>
        </a>
        <div class="jadwal-card-body">
          <div class="jadwal-card-meta">
            <?php if ( ! empty( $cats ) ) : ?>
            <span class="jadwal-card-cat"><?php echo esc_html( $cats[0]->name ); ?></span>
            <?php endif; ?>
            <span class="jadwal-card-date">
              <?php labnesia_icon( 'calendar', 'var(--amber)', 11 ); ?>
              <?php echo esc_html( $event_date ? date_i18n( 'd M Y', strtotime( $event_date ) ) : get_the_date() ); ?>
            </span>
          </div>
          <a href="<?php the_permalink(); ?>" style="text-decoration:none">
            <div class="jadwal-card-title"><?php the_title(); ?></div>
          </a>
          <div class="jadwal-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?></div>
          <div class="jadwal-card-actions">
            <?php if ( $daftar_url ) : ?>
            <a href="<?php echo esc_url( $daftar_url ); ?>" class="jadwal-card-daftar" target="_blank" rel="noopener noreferrer">Daftar Sekarang</a>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="jadwal-card-detail">Lihat Detail</a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

    <div class="jadwal-pagination">
      <?php
      echo paginate_links( [
          'total'   => $jadwal_query->max_num_pages,
          'current' => $paged,
          'mid_size'=> 2,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;',
      ] );
      ?>
    </div>
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
    <div class="jadwal-empty">
      <div class="jadwal-empty-inner">
        <div class="jadwal-empty-icon"><?php labnesia_icon( 'calendar', 'var(--teal)', 30 ); ?></div>
        <h2>Belum ada jadwal</h2>
        <p>Belum ada jadwal Pelatihan atau Webinar yang dipublikasikan. Hubungi tim kami langsung untuk info batch terdekat.</p>
        <div class="jadwal-empty-actions">
          <a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>" class="btn-primary">Tanya Jadwal Terdekat</a>
          <a href="<?php echo esc_url( home_url( '/mulai-gratis/' ) ); ?>" class="btn-ghost" style="color:var(--navy);border-color:var(--gray-200)">Mulai dari yang Gratis</a>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
