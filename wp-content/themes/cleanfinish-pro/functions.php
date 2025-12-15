<?php
/**
 * CleanFinish Pro Theme Functions
 *
 * @package CleanFinish Pro
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function cleanfinish_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cleanfinish-pro'),
        'footer' => __('Footer Menu', 'cleanfinish-pro'),
    ));

    // Add custom image sizes
    add_image_size('cleanfinish-blog-thumb', 400, 250, true);
    add_image_size('cleanfinish-hero', 1200, 600, true);
}
add_action('after_setup_theme', 'cleanfinish_theme_setup');

/**
 * Enqueue scripts and styles
 */
function cleanfinish_scripts() {
    // Remove all other stylesheets to prevent conflicts
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');

    // Theme stylesheet with cache busting
    wp_enqueue_style('cleanfinish-style', get_stylesheet_uri(), array(), '2.0.3');

    // Theme JavaScript
    wp_enqueue_script('cleanfinish-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '2.0.0', true);
}
add_action('wp_enqueue_scripts', 'cleanfinish_scripts', 100);

/**
 * Remove WordPress default styles
 */
function cleanfinish_remove_default_styles() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'cleanfinish_remove_default_styles', 1);

/**
 * Register widget areas
 */
function cleanfinish_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'cleanfinish-pro'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'cleanfinish-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'cleanfinish-pro'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'cleanfinish-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'cleanfinish-pro'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'cleanfinish-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'cleanfinish_widgets_init');

/**
 * Custom excerpt length
 */
function cleanfinish_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'cleanfinish_excerpt_length');

/**
 * Custom excerpt more
 */
function cleanfinish_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cleanfinish_excerpt_more');

/**
 * Add custom page templates
 */
function cleanfinish_add_template_to_select($post_templates, $wp_theme, $post, $post_type) {
    $post_templates['template-home.php'] = __('Home Page Template', 'cleanfinish-pro');
    $post_templates['template-services.php'] = __('Services Template', 'cleanfinish-pro');
    $post_templates['template-contact.php'] = __('Contact Template', 'cleanfinish-pro');
    return $post_templates;
}
add_filter('theme_page_templates', 'cleanfinish_add_template_to_select', 10, 4);
