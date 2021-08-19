<?php
/**
 * Lex_lessons_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lex_lessons_theme
 */

if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (! function_exists('lex_lessons_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function lex_lessons_theme_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Lex_lessons_theme, use a find and replace
         * to change 'lex_lessons_theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('lex_lessons_theme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'lex_lessons_theme'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'lex_lessons_theme_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'lex_lessons_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lex_lessons_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('lex_lessons_theme_content_width', 640);
}
add_action('after_setup_theme', 'lex_lessons_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lex_lessons_theme_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'lex_lessons_theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'lex_lessons_theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'lex_lessons_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function lex_lessons_theme_scripts()
{
    wp_enqueue_style('lex_lessons_theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('lex_lessons_theme-style', 'rtl', 'replace');

    wp_enqueue_script('lex_lessons_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'lex_lessons_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

// ==========register acf block=============== //
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => '/template-parts/blocks/testimonial/testimonial.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}
include_once 'fields.php';

include_once 'blocks.php';

include_once 'guten.php';

//register taxonomy
add_action('init', 'create_taxonomy');
function create_taxonomy()
{

    register_taxonomy('taxonomy', [ 'primer' ], [
        'label'                 => '',
        'labels'                => [
            'name'              => 'Примерчики',
            'singular_name'     => 'Примерчик',
            'search_items'      => 'Search Примерчик',
            'all_items'         => 'All Примерчик',
            'view_item '        => 'View Примерчик',
            'parent_item'       => 'Parent Примерчик',
            'parent_item_colon' => 'Parent Примерчик:',
            'edit_item'         => 'Edit Примерчик',
            'update_item'       => 'Update Примерчик',
            'add_new_item'      => 'Add New Примерчик',
            'new_item_name'     => 'New Примерчик Name',
            'menu_name'         => 'Примерчик',
        ],
        'description'           => ' такса для примерчиков',
        'public'                => true,
        'hierarchical'          => false,
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null,
        'show_admin_column'     => false,
        'show_in_rest'          => null,
        'rest_base'             => null,
    ]);
}
//register post_type
add_action('init', 'create_primer');
function create_primer() {
    register_post_type('post_primer', [
        'label'  => null,
        'labels' => [
            'name'               => 'Примерчики',
            'singular_name'      => 'Примерчик',
            'add_new'            => 'Добавить примерчик',
            'add_new_item'       => 'Добавление примерчика',
            'edit_item'          => 'Редактирование примерчика',
            'new_item'           => 'Новое то ли еще будет',
            'view_item'          => 'Смотреть то ли еще будет',
            'search_items'       => 'Искать то ли еще будет',
            'not_found'          => 'Не найдено',
            'not_found_in_trash' => 'Не найдено в корзине',
            'parent_item_colon'  => '',
            'menu_name'          => 'Примерина',
        ],
        'description'         => 'пост для примера',
        'public'              => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'rest_base'           => null,
        'menu_position'       => null,
        'hierarchical'        => false,
        'supports'            => array( 'title','editor', 'custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'menu_icon'           => 'dashicons-cart',
        'query_var'           => true,
    ]);
}


