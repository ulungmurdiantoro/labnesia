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
        <a href="<?php echo esc_url( home_url('/') ); ?>"><?php _e('Beranda','labnesia'); ?></a>
        <a href="<?php echo esc_url( home_url('/tentang-kami/') ); ?>"><?php _e('Tentang Kami','labnesia'); ?></a>

        <div class="nav-dropdown-wrap">
            <button type="button" class="nav-dropdown-toggle" id="layanan-toggle" aria-expanded="false" aria-controls="layanan-menu">
                <?php _e('Layanan','labnesia'); ?>
                <svg class="nav-caret" viewBox="0 0 24 24" width="10" height="10" aria-hidden="true">
                    <path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="nav-dropdown-menu" id="layanan-menu">
                <a href="<?php echo esc_url( home_url('/pelatihan-sertifikasi/') ); ?>"><?php _e('Pelatihan 16, 24 dan 40 JP','labnesia'); ?></a>
                <a href="<?php echo esc_url( home_url('/kelas-pendampingan/') ); ?>"><?php _e('Kelas Pendampingan','labnesia'); ?></a>
                <a href="<?php echo esc_url( home_url('/inhouse/') ); ?>"><?php _e('Inhouse Training','labnesia'); ?></a>
                <a href="<?php echo esc_url( home_url('/optimasi-alat/') ); ?>"><?php _e('Optimasi Alat','labnesia'); ?></a>
                <a href="<?php echo esc_url( home_url('/perbandingan-program/') ); ?>"><?php _e('Perbandingan Program','labnesia'); ?></a>
                <a href="<?php echo esc_url( home_url('/panduan-memilih/') ); ?>"><?php _e('Panduan Memilih','labnesia'); ?></a>
            </div>
        </div>

        <a href="<?php echo esc_url( home_url('/jadwal/') ); ?>"><?php _e('Jadwal','labnesia'); ?></a>
        <a href="<?php echo esc_url( home_url('/blog/') ); ?>"><?php _e('Artikel','labnesia'); ?></a>
        <a href="<?php echo esc_url( home_url('/faq/') ); ?>"><?php _e('FAQ','labnesia'); ?></a>
        <a href="<?php echo esc_url( home_url('/kontak/') ); ?>"><?php _e('Kontak','labnesia'); ?></a>
        <a href="<?php echo esc_url( home_url('/mulai-gratis/') ); ?>" class="nav-cta">
            <?php _e('Mulai Gratis','labnesia'); ?>
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
