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

// Standard pre-filled WhatsApp message used across static contact links/buttons
// (footer, floating CTA, Kontak cards, Inhouse CTAs, "hubungi tim" links). Not
// used on the Gap Analysis WA link, which builds its own message from quiz results.
function labnesia_wa_default_message() {
    return "Halo Tim Labnesia, saya ingin berkonsultasi mengenai akreditasi laboratorium.\n\n"
         . "Nama: \n"
         . "Instansi: \n"
         . "Jabatan: \n"
         . "Kebutuhan saat ini: (misalnya persiapan akreditasi ISO/IEC 17025, pelatihan, pendampingan, sertifikasi, atau lainnya)";
}

// WhatsApp icon + number, wrapped in a wa.me deep link. $number is digits only (country code, no +/spaces).
// Note: builds the href via esc_attr(), not esc_url() — esc_url() strips %0a/%0d
// (anti-CRLF-injection), which would silently delete the message's line breaks.
function labnesia_whatsapp_link( $number, $label, $color = 'currentColor', $size = 14 ) {
    $url = 'https://wa.me/' . preg_replace( '/\D/', '', $number ) . '?text=' . rawurlencode( labnesia_wa_default_message() );
    printf(
        '<a href="%1$s" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:none">',
        esc_attr( $url )
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
    $message = labnesia_wa_default_message();
    $url     = 'https://wa.me/' . preg_replace( '/\D/', '', $number ) . '?text=' . rawurlencode( $message );
    printf(
        '<a href="%1$s" class="float-cta" id="konsultasi" target="_blank" rel="noopener noreferrer">',
        esc_attr( $url )
    );
    labnesia_icon( 'whatsapp', 'var(--navy)', 16 );
    echo ' Konsultasi Gratis</a>';
}

// Resolve category slugs to term_ids at runtime — term_ids are auto-increment
// values that differ per install (e.g. after a WXR import), so pages must never
// hardcode them; slugs are the only stable identifier across environments.
function labnesia_category_ids_by_slug( $slugs ) {
    $ids = [];
    foreach ( (array) $slugs as $slug ) {
        $term = get_category_by_slug( $slug );
        if ( $term ) $ids[] = $term->term_id;
    }
    return $ids;
}

// ── Add body classes ──────────────────────────────────────────────────────────
function labnesia_body_classes( $classes ) {
    if ( ! is_singular() ) $classes[] = 'hfeed';
    return $classes;
}
add_filter( 'body_class', 'labnesia_body_classes' );

// ── Jadwal event fields (Tanggal Pelaksanaan & Link Pendaftaran) ─────────────
// Lets editors fill in the actual event date/registration link for posts in the
// Pelatihan/Webinar categories, shown on the /jadwal/ page instead of falling
// back to the post's publish date.
function labnesia_jadwal_meta_box() {
    add_meta_box(
        'labnesia_jadwal',
        'Info Jadwal (Pelatihan/Webinar)',
        'labnesia_jadwal_meta_box_html',
        'post',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'labnesia_jadwal_meta_box' );

function labnesia_jadwal_meta_box_html( $post ) {
    wp_nonce_field( 'labnesia_jadwal_save', 'labnesia_jadwal_nonce' );
    $event_date     = get_post_meta( $post->ID, '_jadwal_tanggal', true );
    $event_date_end = get_post_meta( $post->ID, '_jadwal_tanggal_selesai', true );
    $daftar_url     = get_post_meta( $post->ID, '_jadwal_link_daftar', true );
    ?>
    <p>
        <label for="labnesia_jadwal_tanggal"><strong>Tanggal Mulai</strong></label><br>
        <input type="date" id="labnesia_jadwal_tanggal" name="labnesia_jadwal_tanggal" value="<?php echo esc_attr( $event_date ); ?>" style="width:100%">
    </p>
    <p>
        <label for="labnesia_jadwal_tanggal_selesai"><strong>Tanggal Selesai</strong> <span style="font-weight:400;color:#666">(opsional, untuk acara multi-hari)</span></label><br>
        <input type="date" id="labnesia_jadwal_tanggal_selesai" name="labnesia_jadwal_tanggal_selesai" value="<?php echo esc_attr( $event_date_end ); ?>" style="width:100%">
    </p>
    <p>
        <label for="labnesia_jadwal_link"><strong>Link Pendaftaran</strong></label><br>
        <input type="url" id="labnesia_jadwal_link" name="labnesia_jadwal_link" value="<?php echo esc_attr( $daftar_url ); ?>" placeholder="https://wa.me/... atau link form" style="width:100%">
    </p>
    <p style="color:#666;font-size:12px">Isi hanya untuk post kategori Pelatihan/Webinar yang ingin muncul di halaman Jadwal. Kosongkan Tanggal Selesai jika acara hanya 1 hari.</p>
    <?php
}

function labnesia_jadwal_meta_box_save( $post_id ) {
    if ( ! isset( $_POST['labnesia_jadwal_nonce'] ) || ! wp_verify_nonce( $_POST['labnesia_jadwal_nonce'], 'labnesia_jadwal_save' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['labnesia_jadwal_tanggal'] ) ) {
        update_post_meta( $post_id, '_jadwal_tanggal', sanitize_text_field( $_POST['labnesia_jadwal_tanggal'] ) );
    }
    if ( isset( $_POST['labnesia_jadwal_tanggal_selesai'] ) ) {
        update_post_meta( $post_id, '_jadwal_tanggal_selesai', sanitize_text_field( $_POST['labnesia_jadwal_tanggal_selesai'] ) );
    }
    if ( isset( $_POST['labnesia_jadwal_link'] ) ) {
        update_post_meta( $post_id, '_jadwal_link_daftar', esc_url_raw( $_POST['labnesia_jadwal_link'] ) );
    }
}
add_action( 'save_post', 'labnesia_jadwal_meta_box_save' );

// Format a Jadwal event date (or date range) for display, e.g. "3–4 Jul 2026",
// "30 Jun – 2 Jul 2026", or a plain single date when there's no end date.
function labnesia_format_jadwal_date( $start, $end = '' ) {
    if ( ! $start ) return '';
    $start_ts = strtotime( $start );
    if ( ! $end || $end === $start ) {
        return date_i18n( 'j M Y', $start_ts );
    }
    $end_ts = strtotime( $end );
    if ( $end_ts <= $start_ts ) {
        return date_i18n( 'j M Y', $start_ts );
    }
    if ( date_i18n( 'Y', $start_ts ) !== date_i18n( 'Y', $end_ts ) ) {
        return date_i18n( 'j M Y', $start_ts ) . ' – ' . date_i18n( 'j M Y', $end_ts );
    }
    if ( date_i18n( 'M', $start_ts ) !== date_i18n( 'M', $end_ts ) ) {
        return date_i18n( 'j M', $start_ts ) . ' – ' . date_i18n( 'j M Y', $end_ts );
    }
    return date_i18n( 'j', $start_ts ) . '–' . date_i18n( 'j M Y', $end_ts );
}

// ── Native registration form (replaces the Google Form embed) ───────────────
// One shared form + one shared handler for every Pelatihan/Webinar post — editors
// never build a form per post. Submissions are stored as a comment (comment_type
// 'pendaftaran'), visible in wp-admin ▸ Comments, plus an email notification.
function labnesia_render_daftar_form( $post_id ) {
    $notice = '';
    if ( isset( $_GET['daftar'] ) && (int) ( $_GET['daftar_post'] ?? 0 ) === (int) $post_id ) {
        if ( $_GET['daftar'] === 'sukses' ) {
            $notice = '<div class="daftar-notice daftar-notice-ok">Pendaftaran Anda sudah kami terima. Tim kami akan menghubungi Anda melalui WhatsApp/email untuk konfirmasi.</div>';
        } elseif ( $_GET['daftar'] === 'gagal' ) {
            $notice = '<div class="daftar-notice daftar-notice-err">Mohon lengkapi Nama dan Nomor WhatsApp terlebih dahulu.</div>';
        }
    }
    ?>
    <div class="daftar-form-box">
        <h2 class="daftar-form-title">Formulir Pendaftaran</h2>
        <p class="daftar-form-sub">Isi data di bawah ini, tim kami akan menghubungi Anda untuk konfirmasi kehadiran.</p>
        <?php echo $notice; ?>
        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="daftar-form">
            <?php wp_nonce_field( 'labnesia_daftar_event', 'labnesia_daftar_nonce' ); ?>
            <input type="hidden" name="action" value="labnesia_daftar_event">
            <input type="hidden" name="post_id" value="<?php echo (int) $post_id; ?>">
            <input class="daftar-input" type="text" name="nama" placeholder="Nama Anda" required>
            <input class="daftar-input" type="tel" name="whatsapp" placeholder="Nomor WhatsApp" required>
            <input class="daftar-input" type="text" name="instansi" placeholder="Nama lab / instansi">
            <input class="daftar-input" type="email" name="email" placeholder="Email (opsional)">
            <button type="submit" class="btn-daftar-submit">Daftar Sekarang</button>
        </form>
    </div>
    <?php
}

function labnesia_handle_daftar_event() {
    $post_id = isset( $_POST['post_id'] ) ? (int) $_POST['post_id'] : 0;
    $redirect_base = $post_id ? get_permalink( $post_id ) : home_url( '/' );

    if ( ! isset( $_POST['labnesia_daftar_nonce'] ) || ! wp_verify_nonce( $_POST['labnesia_daftar_nonce'], 'labnesia_daftar_event' ) ) {
        wp_safe_redirect( add_query_arg( [ 'daftar' => 'gagal', 'daftar_post' => $post_id ], $redirect_base ) );
        exit;
    }

    $nama     = sanitize_text_field( $_POST['nama'] ?? '' );
    $whatsapp = sanitize_text_field( $_POST['whatsapp'] ?? '' );
    $instansi = sanitize_text_field( $_POST['instansi'] ?? '' );
    $email    = sanitize_email( $_POST['email'] ?? '' );

    if ( ! $nama || ! $whatsapp || ! $post_id ) {
        wp_safe_redirect( add_query_arg( [ 'daftar' => 'gagal', 'daftar_post' => $post_id ], $redirect_base ) );
        exit;
    }

    $comment_id = wp_insert_comment( [
        'comment_post_ID'      => $post_id,
        'comment_author'       => $nama,
        'comment_author_email' => $email,
        'comment_content'      => 'Instansi/Lab: ' . ( $instansi ?: '-' ),
        'comment_type'         => 'pendaftaran',
        'comment_approved'     => 1,
    ] );
    if ( $comment_id ) {
        update_comment_meta( $comment_id, '_daftar_whatsapp', $whatsapp );
    }

    $to = get_theme_mod( 'labnesia_email', 'info@labnesia.id' );
    $subject = 'Pendaftaran Baru: ' . get_the_title( $post_id );
    $message = "Ada pendaftaran baru untuk \"" . get_the_title( $post_id ) . "\"\n\n"
             . "Nama: $nama\nWhatsApp: $whatsapp\nInstansi: " . ( $instansi ?: '-' ) . "\nEmail: " . ( $email ?: '-' ) . "\n\n"
             . 'Link post: ' . get_permalink( $post_id );
    wp_mail( $to, $subject, $message );

    wp_safe_redirect( add_query_arg( [ 'daftar' => 'sukses', 'daftar_post' => $post_id ], $redirect_base ) );
    exit;
}
add_action( 'admin_post_labnesia_daftar_event', 'labnesia_handle_daftar_event' );
add_action( 'admin_post_nopriv_labnesia_daftar_event', 'labnesia_handle_daftar_event' );

// ── SEO: Title tag & meta description override ────────────────────────────────
// Hardcode title dan meta description langsung dari tema, tanpa bergantung
// pada nilai Tagline di WordPress Admin atau konfigurasi plugin SEO.

// Override <title> tag untuk setiap halaman
add_filter( 'pre_get_document_title', function( $title ) {
    if ( is_front_page() || is_home() ) {
        return 'Labnesia - Pusat Pelatihan & Pendampingan Akreditasi ISO/IEC 17025';
    }
    // Halaman lain: "Judul Halaman - Labnesia"
    return $title;
}, 99 );

// Inject <meta name="description"> di <head>
add_action( 'wp_head', function() {
    if ( is_front_page() || is_home() ) {
        echo '<meta name="description" content="Labnesia membantu laboratorium meraih akreditasi ISO/IEC 17025 melalui pelatihan, pendampingan, dan konsultasi oleh pakar berpengalaman.">' . "\n";
    } elseif ( is_singular() ) {
        $excerpt = get_the_excerpt();
        if ( $excerpt ) {
            echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $excerpt ) ) . '">' . "\n";
        }
    }
}, 1 );
