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

    // Font Awesome (icon system)
    wp_enqueue_style(
        'labnesia-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        [],
        '6.5.2'
    );

    // Main stylesheet
    wp_enqueue_style(
        'labnesia-style',
        get_stylesheet_uri(),
        [ 'labnesia-fonts', 'labnesia-fontawesome' ],
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
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo/LOGO-LABNESIA-004.gif' ); ?>" alt="<?php bloginfo('name'); ?>" style="height:44px;width:auto;display:block;">
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

    // Google Apps Script URL — shared handler for all site forms (pelatihan-sertifikasi,
    // gap-analysis, komunitas). See google-apps-script/labnesia-forms.gs.
    $wp_customize->add_setting( 'labnesia_gas_url', [
        'default'           => 'https://script.google.com/macros/s/AKfycbwt5E_b9XfUbNPm2mViJerOLcUtOxrenwHneGG1u_uJsL0wB-6m5UQ_n9f8UgE70_vmOg/exec',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control( 'labnesia_gas_url', [
        'label'       => __( 'Google Apps Script Web App URL (semua form: Pelatihan, GAP Analysis, Komunitas)', 'labnesia' ),
        'description' => __( 'Deploy script di google-apps-script/labnesia-forms.gs sebagai Web App, lalu tempel URL /exec di sini.', 'labnesia' ),
        'section'     => 'labnesia_options',
        'type'        => 'url',
    ]);

    // WhatsApp Channel link — form "Bergabung ke Komunitas" di page-mulai-gratis.php
    $wp_customize->add_setting( 'labnesia_wa_channel_url', [
        'default'           => 'https://whatsapp.com/channel/0029VbBteTG5fM5a4WMflu0S',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control( 'labnesia_wa_channel_url', [
        'label'   => __( 'Link WhatsApp Channel (form Bergabung ke Komunitas)', 'labnesia' ),
        'section' => 'labnesia_options',
        'type'    => 'url',
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

// ── Icon helpers (Font Awesome glyphs, replaces emoji-as-icon) ───────────────
// Uses real font glyphs (Font Awesome, loaded via CDN in labnesia_scripts()) instead
// of CSS-masked SVGs — avoids the mask-image/CSS-custom-property browser quirks and
// container-clipping issues that came up with the earlier Lucide-mask approach.
// Bare inline glyph — buttons, badges, checklists, comparison-table cells.
function labnesia_icon( $name, $color = 'currentColor', $size = 20 ) {
    static $map = [
        'arrow-right'    => 'arrow-right',
        'award'          => 'award',
        'banknote'       => 'money-bill-wave',
        'book-open'      => 'book-open',
        'building-2'     => 'building',
        'calendar'       => 'calendar',
        'check'          => 'check',
        'chevron-down'   => 'chevron-down',
        'clipboard-list' => 'clipboard-list',
        'compass'        => 'compass',
        'download'       => 'download',
        'globe'          => 'globe',
        'graduation-cap' => 'graduation-cap',
        'handshake'      => 'handshake',
        'hourglass'      => 'hourglass-half',
        'mail'           => 'envelope',
        'map-pin'        => 'map-pin',
        'message-circle' => 'comment',
        'mic'            => 'microphone',
        'phone'          => 'phone',
        'refresh-cw'     => 'rotate',
        'search'         => 'magnifying-glass',
        'settings'       => 'gear',
        'shield-check'   => 'shield-halved',
        'sparkles'       => 'wand-magic-sparkles',
        'star'           => 'star',
        'target'         => 'bullseye',
        'trophy'         => 'trophy',
        'user'           => 'user',
        'user-check'     => 'user-check',
        'users'          => 'users',
        'x'              => 'xmark',
        'zap'            => 'bolt',
        // extended set — added when sweeping domain-specific emoji beyond the original handoff table
        'arrow-down'     => 'arrow-down',
        'arrow-turn-down'=> 'arrow-turn-down',
        'construction'   => 'helmet-safety',
        'medal'          => 'medal',
        'teacher'        => 'chalkboard-user',
        'chart'          => 'chart-column',
        'money-bag'      => 'sack-dollar',
        'lightbulb'      => 'lightbulb',
        'info'           => 'circle-info',
        'gift'           => 'gift',
        'utensils'       => 'utensils',
        'flask'          => 'flask',
        'vest'           => 'vest',
        'dna'            => 'dna',
        'scroll'         => 'scroll',
        'seedling'       => 'seedling',
        'recycle'        => 'recycle',
        'microscope'     => 'microscope',
        'wheat'          => 'wheat-awn',
        'pills'          => 'pills',
        'cow'            => 'cow',
        'fish'           => 'fish',
        'petri-dish'     => 'vial',
        'ruler'          => 'ruler',
        'clock'          => 'clock',
        'book'           => 'book',
        'school'         => 'school',
        'industry'       => 'industry',
        'whatsapp'       => 'whatsapp',
    ];
    // Brand glyphs (logos) live in Font Awesome's "brands" style, not "solid".
    static $brands = [ 'whatsapp' => true ];
    $fa    = isset( $map[ $name ] ) ? $map[ $name ] : $name;
    $style = isset( $brands[ $name ] ) ? 'fa-brands' : 'fa-solid';
    printf(
        '<i class="icon %1$s fa-%2$s" style="color:%3$s;font-size:%4$dpx;" aria-hidden="true"></i>',
        $style,
        esc_attr( $fa ),
        esc_attr( $color ),
        (int) $size
    );
}

// WhatsApp icon + number, wrapped in a wa.me deep link. $number is digits only (country code, no +/spaces).
function labnesia_whatsapp_link( $number, $label, $color = 'currentColor', $size = 14 ) {
    printf(
        '<a href="%1$s" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none">',
        esc_url( 'https://wa.me/' . preg_replace( '/\D/', '', $number ) )
    );
    labnesia_icon( 'whatsapp', $color, $size );
    printf( ' %s</a>', esc_html( $label ) );
}

// Tiled icon — circular/rounded-square tile with a centered icon (~46% of tile size).
function labnesia_icon_tile( $name, $color = 'var(--teal)', $tile_size = 64, $tone = 'light', $round = false ) {
    printf(
        '<span class="icon-tile icon-tile-%1$s%2$s" style="--tile-size:%3$dpx;">',
        esc_attr( $tone ),
        $round ? ' icon-tile-round' : '',
        (int) $tile_size
    );
    labnesia_icon( $name, $color, (int) round( $tile_size * 0.46 ) );
    echo '</span>';
}

// Floating "Konsultasi Gratis" WhatsApp CTA — call once near the end of every page template
// so it appears consistently site-wide, always pointed at the WhatsApp number (Endang by default).
function labnesia_floating_cta() {
    $number  = get_theme_mod( 'labnesia_whatsapp', '6282172221567' );
    $message = 'Halo Labnesia, saya ingin konsultasi gratis tentang akreditasi lab.';
    printf(
        '<a href="%1$s" class="float-cta" id="konsultasi" target="_blank" rel="noopener noreferrer">',
        esc_url( 'https://wa.me/' . preg_replace( '/\D/', '', $number ) . '?text=' . rawurlencode( $message ) )
    );
    labnesia_icon( 'whatsapp', 'var(--navy)', 16 );
    echo ' Konsultasi Gratis</a>';
}

// ── Add body classes ──────────────────────────────────────────────────────────
function labnesia_body_classes( $classes ) {
    if ( ! is_singular() ) $classes[] = 'hfeed';
    return $classes;
}
add_filter( 'body_class', 'labnesia_body_classes' );
