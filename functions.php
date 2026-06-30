<?php
/**
 * Labnesia Theme — functions.php
 * Theme resmi Labnesia.id
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ── Theme setup ──────────────────────────────────────────────────────────────
function labnesia_setup() {
    load_theme_textdomain( 'labnesia', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption','style','script' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );

    register_nav_menus([
        'primary' => __( 'Menu Utama', 'labnesia' ),
        'footer'  => __( 'Menu Footer', 'labnesia' ),
    ]);
}
add_action( 'after_setup_theme', 'labnesia_setup' );

// ── Enqueue styles & scripts ─────────────────────────────────────────────────
function labnesia_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'labnesia-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'labnesia-style',
        get_stylesheet_uri(),
        [ 'labnesia-fonts' ],
        wp_get_theme()->get('Version')
    );

    // Animations
    wp_enqueue_style(
        'labnesia-animations',
        get_template_directory_uri() . '/assets/css/animations.css',
        [ 'labnesia-style' ],
        wp_get_theme()->get('Version')
    );

    // Main JS
    wp_enqueue_script(
        'labnesia-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );

    // Pass theme data to JS
    wp_localize_script( 'labnesia-main', 'labnesiaData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('labnesia_nonce'),
    ]);
}
add_action( 'wp_enqueue_scripts', 'labnesia_scripts' );

// ── Content width ─────────────────────────────────────────────────────────────
if ( ! isset( $content_width ) ) $content_width = 1200;

// ── Custom Logo helper ────────────────────────────────────────────────────────
function labnesia_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else { ?>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo/LOGO-LABNESIA-003.gif' ); ?>" alt="<?php bloginfo('name'); ?>" style="height:44px;width:auto;display:block;">
    <?php }
}

// ── Custom Customizer settings ────────────────────────────────────────────────
function labnesia_customizer( $wp_customize ) {
    // Section: Labnesia Settings
    $wp_customize->add_section( 'labnesia_options', [
        'title'    => __( 'Labnesia Settings', 'labnesia' ),
        'priority' => 30,
    ]);

    // Tagline below logo
    $wp_customize->add_setting( 'labnesia_tagline', [
        'default'           => 'Pusat Kompetensi ISO/IEC 17025',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control( 'labnesia_tagline', [
        'label'   => __( 'Sub-tagline logo', 'labnesia' ),
        'section' => 'labnesia_options',
        'type'    => 'text',
    ]);

    // Hero headline
    $wp_customize->add_setting( 'labnesia_hero_title', [
        'default'           => 'Lab Anda Layak<br>Jadi <span class="accent">Laboratorium Unggul</span>',
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control( 'labnesia_hero_title', [
        'label'   => __( 'Hero Headline', 'labnesia' ),
        'section' => 'labnesia_options',
        'type'    => 'textarea',
    ]);

    // Hero belief quote
    $wp_customize->add_setting( 'labnesia_hero_quote', [
        'default'           => '"Laboratorium berkualitas dimulai dari SDM yang kompeten. Akreditasi adalah hasil — bukan tujuan akhir."',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control( 'labnesia_hero_quote', [
        'label'   => __( 'Hero Quote / Belief Statement', 'labnesia' ),
        'section' => 'labnesia_options',
        'type'    => 'textarea',
    ]);

    // CTA URL
    $wp_customize->add_setting( 'labnesia_cta_url', [
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control( 'labnesia_cta_url', [
        'label'   => __( 'URL Konsultasi Gratis (floating CTA)', 'labnesia' ),
        'section' => 'labnesia_options',
        'type'    => 'url',
    ]);

    // WhatsApp number
    $wp_customize->add_setting( 'labnesia_whatsapp', [
        'default'           => '6282172221567',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control( 'labnesia_whatsapp', [
        'label'       => __( 'Nomor WhatsApp (format: 628xxx)', 'labnesia' ),
        'section'     => 'labnesia_options',
        'type'        => 'text',
    ]);

    // Email
    $wp_customize->add_setting( 'labnesia_email', [
        'default'           => 'info@labnesia.id',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control( 'labnesia_email', [
        'label'   => __( 'Email kontak', 'labnesia' ),
        'section' => 'labnesia_options',
        'type'    => 'email',
    ]);
}
add_action( 'customize_register', 'labnesia_customizer' );

// ── Stats helper (editable via Customizer or hard-coded) ──────────────────────
function labnesia_hero_stats() {
    return [
        [ 'num' => '30+',   'label' => 'Laboratorium berhasil terakreditasi KAN' ],
        [ 'num' => '15',    'label' => 'Pakar berpengalaman di bidangnya' ],
        [ 'num' => '9',     'label' => 'Jenis laboratorium yang kami layani' ],
        [ 'num' => '6 bln', 'label' => 'Rata-rata waktu siap asesmen KAN' ],
    ];
}

// ── Excerpt length ────────────────────────────────────────────────────────────
function labnesia_excerpt_length( $length ) { return 20; }
add_filter( 'excerpt_length', 'labnesia_excerpt_length' );

// ── Remove emoji scripts (performance) ───────────────────────────────────────
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// ── Add body classes ──────────────────────────────────────────────────────────
function labnesia_body_classes( $classes ) {
    if ( ! is_singular() ) $classes[] = 'hfeed';
    return $classes;
}
add_filter( 'body_class', 'labnesia_body_classes' );
