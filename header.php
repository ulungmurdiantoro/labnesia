<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- NAVIGATION -->
<header class="site-header" id="site-header" role="banner">
    <a class="nav-logo" href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
        <?php labnesia_logo(); ?>
    </a>

    <nav class="nav-links" id="primary-nav" aria-label="<?php esc_attr_e('Menu Utama','labnesia'); ?>">
        <a href="#give"><?php _e('Mulai Gratis','labnesia'); ?></a>
        <a href="#produk"><?php _e('Program','labnesia'); ?></a>
        <a href="#alumni"><?php _e('Alumni','labnesia'); ?></a>
        <a href="#mulai"><?php _e('Kontak','labnesia'); ?></a>
        <a href="<?php echo esc_url( get_theme_mod('labnesia_cta_url','#konsultasi') ); ?>" class="nav-cta">
            <?php _e('Konsultasi Gratis','labnesia'); ?>
        </a>
    </nav>

    <button class="nav-toggle" id="nav-toggle" aria-controls="primary-nav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle menu','labnesia'); ?>">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <rect y="4"  width="24" height="2" rx="1"/>
            <rect y="11" width="24" height="2" rx="1"/>
            <rect y="18" width="24" height="2" rx="1"/>
        </svg>
    </button>
</header>
