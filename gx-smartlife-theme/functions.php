<?php
/**
 * GX Smart Life Theme Functions
 *
 * @package GX_Smart_Life
 * @version 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function gx_smartlife_setup() {
    // Make theme available for translation
    load_theme_textdomain('gx-smartlife', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1024, 576, true);
    add_image_size('gx-hero', 3000, 1500, true);
    add_image_size('gx-card', 600, 400, true);
    add_image_size('gx-thumbnail', 300, 200, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'gx-smartlife'),
        'footer' => __('Footer Menu', 'gx-smartlife'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for Block Styles
    add_theme_support('wp-block-styles');

    // Add support for editor styles
    add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'gx_smartlife_setup');

/**
 * Set the content width in pixels
 */
function gx_smartlife_content_width() {
    $GLOBALS['content_width'] = apply_filters('gx_smartlife_content_width', 1200);
}
add_action('after_setup_theme', 'gx_smartlife_content_width', 0);

/**
 * Register widget areas
 */
function gx_smartlife_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'gx-smartlife'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'gx-smartlife'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Area', 'gx-smartlife'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'gx-smartlife'),
        'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'gx_smartlife_widgets_init');

/**
 * Enqueue scripts and styles
 */
function gx_smartlife_scripts() {
    // Main stylesheet
    wp_enqueue_style('gx-smartlife-style', get_stylesheet_uri(), array(), '1.0.0');

    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');

    // Responsive styles
    wp_enqueue_style('gx-smartlife-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('gx-smartlife-style'), '1.0.0');

    // Main JavaScript
    wp_enqueue_script('gx-smartlife-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0.0', true);

    // Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

    // Swiper initialization
    wp_enqueue_script('gx-smartlife-swiper', get_template_directory_uri() . '/assets/js/swiper-init.js', array('swiper-js'), '1.0.0', true);

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'gx_smartlife_scripts');

/**
 * Custom excerpt length
 */
function gx_smartlife_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'gx_smartlife_excerpt_length', 999);

/**
 * Custom excerpt more
 */
function gx_smartlife_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'gx_smartlife_excerpt_more');

/**
 * Add custom body classes
 */
function gx_smartlife_body_classes($classes) {
    // Add class for sidebar
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }

    // Add class for mobile
    if (wp_is_mobile()) {
        $classes[] = 'is-mobile';
    }

    return $classes;
}
add_filter('body_class', 'gx_smartlife_body_classes');

/**
 * Custom logo support
 */
function gx_smartlife_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => false,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'gx_smartlife_custom_logo_setup');

/**
 * Register Company Profile Widget
 */
class GX_Company_Profile_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'gx_company_profile',
            __('Company Profile', 'gx-smartlife'),
            array('description' => __('Display company profile information', 'gx-smartlife'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Display company profile
        get_template_part('template-parts/company-sidebar');

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('会社情報', 'gx-smartlife');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('Title:', 'gx-smartlife'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                   type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }
}

/**
 * Register widgets
 */
function gx_smartlife_register_widgets() {
    register_widget('GX_Company_Profile_Widget');
}
add_action('widgets_init', 'gx_smartlife_register_widgets');

/**
 * Fallback menu for when no menu is assigned
 */
function gx_smartlife_fallback_menu() {
    echo '<ul id="primary-menu" class="menu">';

    // ホーム
    echo '<li class="menu-item"><a href="' . esc_url(home_url('/')) . '"><i class="fas fa-home"></i> ' . esc_html__('ホーム', 'gx-smartlife') . '</a></li>';

    // サービス（ドロップダウン）
    echo '<li class="menu-item menu-item-has-children">';
    echo '<a href="#"><i class="fas fa-solar-panel"></i> ' . esc_html__('サービス', 'gx-smartlife') . '</a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . esc_url(home_url('/fit-solution')) . '"><i class="fas fa-battery-full"></i> ' . esc_html__('卒FIT対策', 'gx-smartlife') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/bcp-solution')) . '"><i class="fas fa-shield-alt"></i> ' . esc_html__('BCP対策・UPS', 'gx-smartlife') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/installation-examples')) . '"><i class="fas fa-wrench"></i> ' . esc_html__('太陽光発電施工', 'gx-smartlife') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/premium-battery-technology')) . '"><i class="fas fa-plug"></i> ' . esc_html__('ポータブル電源', 'gx-smartlife') . '</a></li>';
    echo '</ul>';
    echo '</li>';

    // お知らせ
    $blog_page_id = get_option('page_for_posts');
    if ($blog_page_id) {
        echo '<li class="menu-item"><a href="' . esc_url(get_permalink($blog_page_id)) . '"><i class="fas fa-bell"></i> ' . esc_html__('お知らせ', 'gx-smartlife') . '</a></li>';
    }

    // 会社情報
    echo '<li class="menu-item"><a href="' . esc_url(home_url('/about')) . '"><i class="fas fa-building"></i> ' . esc_html__('会社概要', 'gx-smartlife') . '</a></li>';

    // お問い合わせ
    echo '<li class="menu-item menu-item-cta"><a href="' . esc_url(home_url('/contact')) . '"><i class="fas fa-envelope"></i> ' . esc_html__('お問い合わせ', 'gx-smartlife') . '</a></li>';

    echo '</ul>';
}

/**
 * Add Google Analytics to header
 */
function gx_smartlife_google_analytics() {
    $ga_id = get_theme_mod('gx_ga_tracking_id', 'G-X94V70LTRP');

    if (!empty($ga_id)) {
        ?>
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_id); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo esc_attr($ga_id); ?>');
        </script>
        <?php
    }
}
add_action('wp_head', 'gx_smartlife_google_analytics');

/**
 * Customize Theme Settings
 */
function gx_smartlife_customize_register($wp_customize) {
    // Company Information Section
    $wp_customize->add_section('gx_company_info', array(
        'title'    => __('Company Information', 'gx-smartlife'),
        'priority' => 30,
    ));

    // Company Name
    $wp_customize->add_setting('gx_company_name', array(
        'default'   => 'GXスマートライフ株式会社',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_company_name', array(
        'label'    => __('Company Name', 'gx-smartlife'),
        'section'  => 'gx_company_info',
        'type'     => 'text',
    ));

    // Representative Name
    $wp_customize->add_setting('gx_representative_name', array(
        'default'   => '鈴木繁樹',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_representative_name', array(
        'label'    => __('Representative Name', 'gx-smartlife'),
        'section'  => 'gx_company_info',
        'type'     => 'text',
    ));

    // Phone Number
    $wp_customize->add_setting('gx_phone_number', array(
        'default'   => '070-2668-7130',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_phone_number', array(
        'label'    => __('Phone Number', 'gx-smartlife'),
        'section'  => 'gx_company_info',
        'type'     => 'text',
    ));

    // Email
    $wp_customize->add_setting('gx_email', array(
        'default'   => 'info@gx-smartlife.com',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_email', array(
        'label'    => __('Email Address', 'gx-smartlife'),
        'section'  => 'gx_company_info',
        'type'     => 'email',
    ));

    // Location
    $wp_customize->add_setting('gx_location', array(
        'default'   => '千葉県市原市',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_location', array(
        'label'    => __('Location', 'gx-smartlife'),
        'section'  => 'gx_company_info',
        'type'     => 'text',
    ));

    // Facebook URL
    $wp_customize->add_setting('gx_facebook_url', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_facebook_url', array(
        'label'    => __('Facebook URL', 'gx-smartlife'),
        'section'  => 'gx_company_info',
        'type'     => 'url',
    ));

    // Twitter URL
    $wp_customize->add_setting('gx_twitter_url', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_twitter_url', array(
        'label'    => __('Twitter/X URL', 'gx-smartlife'),
        'section'  => 'gx_company_info',
        'type'     => 'url',
    ));

    // LINE Official Account URL
    $wp_customize->add_setting('gx_line_url', array(
        'default'   => 'https://lin.ee/kJdicywN',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_line_url', array(
        'label'    => __('LINE Official Account URL', 'gx-smartlife'),
        'section'  => 'gx_company_info',
        'type'     => 'url',
    ));

    // Google Analytics Section
    $wp_customize->add_section('gx_analytics', array(
        'title'    => __('Analytics', 'gx-smartlife'),
        'priority' => 40,
    ));

    // GA Tracking ID
    $wp_customize->add_setting('gx_ga_tracking_id', array(
        'default'   => 'G-X94V70LTRP',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gx_ga_tracking_id', array(
        'label'    => __('Google Analytics Tracking ID', 'gx-smartlife'),
        'section'  => 'gx_analytics',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'gx_smartlife_customize_register');

/**
 * Schema.org markup for website
 */
function gx_smartlife_schema_markup() {
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => get_bloginfo('name'),
        'url' => home_url(),
        'description' => get_bloginfo('description'),
        'publisher' => array(
            '@type' => 'Organization',
            'name' => get_theme_mod('gx_company_name', 'GXスマートライフ株式会社'),
            'telephone' => get_theme_mod('gx_phone_number', '070-2668-7130'),
            'email' => get_theme_mod('gx_email', 'info@gx-smartlife.com'),
        ),
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
}
add_action('wp_head', 'gx_smartlife_schema_markup');

/**
 * Add custom post type for Installation Examples
 */
function gx_smartlife_register_installation_examples() {
    $labels = array(
        'name'                  => _x('Installation Examples', 'Post Type General Name', 'gx-smartlife'),
        'singular_name'         => _x('Installation Example', 'Post Type Singular Name', 'gx-smartlife'),
        'menu_name'             => __('Installation Examples', 'gx-smartlife'),
        'name_admin_bar'        => __('Installation Example', 'gx-smartlife'),
        'archives'              => __('Installation Archives', 'gx-smartlife'),
        'attributes'            => __('Installation Attributes', 'gx-smartlife'),
        'all_items'             => __('All Installations', 'gx-smartlife'),
        'add_new_item'          => __('Add New Installation', 'gx-smartlife'),
        'add_new'               => __('Add New', 'gx-smartlife'),
        'new_item'              => __('New Installation', 'gx-smartlife'),
        'edit_item'             => __('Edit Installation', 'gx-smartlife'),
        'update_item'           => __('Update Installation', 'gx-smartlife'),
        'view_item'             => __('View Installation', 'gx-smartlife'),
        'view_items'            => __('View Installations', 'gx-smartlife'),
        'search_items'          => __('Search Installation', 'gx-smartlife'),
    );

    $args = array(
        'label'                 => __('Installation Example', 'gx-smartlife'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-hammer',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type('installation', $args);

    // Register taxonomy for installation types
    $tax_labels = array(
        'name'              => _x('Installation Types', 'taxonomy general name', 'gx-smartlife'),
        'singular_name'     => _x('Installation Type', 'taxonomy singular name', 'gx-smartlife'),
        'search_items'      => __('Search Types', 'gx-smartlife'),
        'all_items'         => __('All Types', 'gx-smartlife'),
        'edit_item'         => __('Edit Type', 'gx-smartlife'),
        'update_item'       => __('Update Type', 'gx-smartlife'),
        'add_new_item'      => __('Add New Type', 'gx-smartlife'),
        'new_item_name'     => __('New Type Name', 'gx-smartlife'),
        'menu_name'         => __('Installation Types', 'gx-smartlife'),
    );

    $tax_args = array(
        'labels'            => $tax_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'show_in_rest'      => true,
    );

    register_taxonomy('installation_type', array('installation'), $tax_args);
}
add_action('init', 'gx_smartlife_register_installation_examples');
