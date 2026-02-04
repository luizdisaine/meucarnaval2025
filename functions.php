<?php
// Enqueue styles and scripts
function meucarnaval2025_enqueue_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);

    // Bree
    wp_enqueue_style('bree', 'https://use.typekit.net/saw8rlb.css');

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');

    // Tooltip CSS
    wp_enqueue_style('tooltip-css', get_template_directory_uri(  ).'/css/tooltipster.bundle.min.css', array(), null, false);

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), null, true);

    // Confetti
    wp_enqueue_script('confetti', get_stylesheet_directory_uri(  ).'/js/confetti.js', array(), null, true);

    // Tooltip
    wp_enqueue_script('tooltip', get_stylesheet_directory_uri(  ).'/js/tooltipster.bundle.min.js', array(), null, true);

    // AJAX
    wp_enqueue_script('ajax_js', get_stylesheet_directory_uri().'/js/ajax.js', array(), null, true);
	wp_localize_script('ajax_js', 'ajax_post', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'meucarnaval2025_enqueue_scripts');

// Theme support for various features
function meucarnaval2025_theme_setup() {
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo');

    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for HTML5 markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'meucarnaval2025'),
        'footer' => __('Footer Menu', 'meucarnaval2025'),
    ));
}
add_action('after_setup_theme', 'meucarnaval2025_theme_setup');

// Register widget areas
function meucarnaval2025_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'meucarnaval2025'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'meucarnaval2025'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'meucarnaval2025_widgets_init');

// Enable excerpts for pages
add_post_type_support('page', 'excerpt');

require_once( __DIR__ .'/inc/post_type.php');
require_once( __DIR__ .'/inc/ajax.php');

?>