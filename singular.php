<?php
/**
 * singular.php — fallback for single posts/pages
 * Keeps the header/footer consistent with the front page
 */
get_header(); ?>

<main id="main" style="padding:120px 48px 80px;max-width:900px;margin:0 auto;min-height:60vh;">
    <?php
    while ( have_posts() ) :
        the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header style="margin-bottom:32px;">
                <h1 style="font-size:36px;font-weight:800;color:var(--navy);line-height:1.2;letter-spacing:-1px;">
                    <?php the_title(); ?>
                </h1>
            </header>
            <div class="entry-content" style="font-size:17px;line-height:1.8;color:var(--gray-800);">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer();
