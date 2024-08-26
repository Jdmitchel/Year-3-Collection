<?php

/***** Fetch Theme Data & Options *****/

$mh_newsdesk_lite_data = wp_get_theme('mh_newsdesk_lite');
$mh_newsdesk_lite_version = $mh_newsdesk_lite_data['Version'];
$mh_newsdesk_lite_lite_options = get_option('mh_newsdesk_lite_options');

/***** Custom Hooks *****/

function mh_newsdesk_lite_before_page_content() {
    do_action('mh_newsdesk_lite_before_page_content');
}

function mh_newsdesk_lite_before_post_content() {
    do_action('mh_newsdesk_lite_before_post_content');
}

/***** Theme Setup *****/

if (!function_exists('mh_newsdesk_lite_themes_setup')) {
	function mh_newsdesk_lite_themes_setup() {
		load_theme_textdomain('mh-newsdesk-lite', get_template_directory() . '/languages');
		add_filter('use_default_gallery_style', '__return_false');
		add_post_type_support('page', 'excerpt');
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('search-form'));
		add_theme_support('custom-background', array('default-color' => 'efefef'));
		add_theme_support('post-thumbnails');
		add_theme_support('custom-header', array('default-image' => '', 'default-text-color' => '1f1e1e', 'width' => 300, 'height' => 100, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('customize-selective-refresh-widgets');
		add_image_size('content-single', 777, 437, true);
		add_image_size('content-list', 260, 146, true);
		add_image_size('cp-thumb-small', 120, 67, true);
		register_nav_menus(array('main_nav' => esc_html__('Main Navigation', 'mh-newsdesk-lite')));
	}
}
add_action('after_setup_theme', 'mh_newsdesk_lite_themes_setup');

/***** Set Content Width *****/

if (!function_exists('mh_newsdesk_lite_content_width')) {
	function mh_newsdesk_lite_content_width() {
		global $content_width;
		if (!isset($content_width)) {
			if (is_page_template('page-full.php')) {
				$content_width = 1180;
			} else {
				$content_width = 777;
			}
		}
	}
}
add_action('template_redirect', 'mh_newsdesk_lite_content_width');

/***** Load CSS & JavaScript *****/

if (!function_exists('mh_newsdesk_lite_scripts')) {
	function mh_newsdesk_lite_scripts() {
		global $mh_newsdesk_lite_version;
		wp_enqueue_style('mh-google-fonts', "https://fonts.googleapis.com/css?family=Oswald:400,700,300|PT+Serif:400,400italic,700,700italic", array(), null);
		wp_enqueue_style('mh-font-awesome', get_template_directory_uri() . '/includes/font-awesome.min.css', array(), null);
		wp_enqueue_style('mh-style', get_stylesheet_uri(), false, $mh_newsdesk_lite_version);
		wp_enqueue_script('mh-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), $mh_newsdesk_lite_version);
		if (is_singular() && comments_open() && get_option('thread_comments') == 1) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'mh_newsdesk_lite_scripts');

if (!function_exists('mh_newsdesk_lite_admin_scripts')) {
	function mh_newsdesk_lite_admin_scripts($hook) {
		if ('appearance_page_newsdesk' === $hook || 'widgets.php' === $hook) {
			wp_enqueue_style('mh-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'mh_newsdesk_lite_admin_scripts');

/***** Register Widget Areas / Sidebars	*****/

if (!function_exists('mh_newsdesk_lite_widgets_init')) {
	function mh_newsdesk_lite_widgets_init() {
		register_sidebar(array('name' => esc_html__('Global Sidebar', 'mh-newsdesk-lite'), 'id' => 'sidebar', 'description' => esc_html__('Sidebar used globally throughout your site.', 'mh-newsdesk-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget mh-clearfix %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title"><span>', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => esc_html__('Home 1 - Large Column (Top)', 'mh-newsdesk-lite'), 'id' => 'home-1', 'description' => esc_html__('Large column on Homepage.', 'mh-newsdesk-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title"><span>', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => esc_html__('Home 2 - First Column', 'mh-newsdesk-lite'), 'id' => 'home-2', 'description' => esc_html__('First column on Homepage.', 'mh-newsdesk-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title"><span>', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => esc_html__('Home 3 - Second Column', 'mh-newsdesk-lite'), 'id' => 'home-3', 'description' => esc_html__('Second column on Homepage.', 'mh-newsdesk-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title"><span>', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => esc_html__('Home 4 - Large Column (Bottom)', 'mh-newsdesk-lite'), 'id' => 'home-4', 'description' => esc_html__('Large column on Homepage.', 'mh-newsdesk-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title"><span>', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => esc_html__('Home 5 - Sidebar', 'mh-newsdesk-lite'), 'id' => 'home-5', 'description' => esc_html__('Sidebar on Homepage.', 'mh-newsdesk-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title"><span>', 'after_title' => '</span></h4>'));
	}
}
add_action('widgets_init', 'mh_newsdesk_lite_widgets_init');

/***** Include Several Functions *****/

require_once('includes/mh-customizer.php');
require_once('includes/mh-custom-functions.php');
require_once('includes/mh-widgets.php');

if (is_admin()) {
	require_once('admin/admin.php');
}

/***** Include Custom Post Types *****/

register_post_type('Cruise', array(
	'labels' => array(
		'name' => 'Cruise',
		'singular_name' => 'Cruise',
		'add_new' => 'Add New Cruise',
		'add_new_item' => 'Add New Cruise',
		'edit_item' => 'Edit Cruise',
		'new_item' => 'New Cruise',
		'view_item' => 'View Cruise',
		'search_items' => 'Search Cruise',
		'not_found' => 'No Cruise found',
		'not_found_in_trash' => 'No Cruise found in Trash'
	),
	'public' => true,
	'supports' => array('title', 'editor', 'thumbnail'),
	'taxonomies' => array(''),
	'menu_icon' => 'dashicons-tide',
	'has_archive' => true
));

register_post_type('Vacation', array(
	'labels' => array(
		'name' => 'Vacation',
		'singular_name' => 'Vacation',
		'add_new' => 'Add New Vacation',
		'add_new_item' => 'Add New Vacation',
		'edit_item' => 'Edit Vacation',
		'new_item' => 'New Vacation',
		'view_item' => 'View Vacation',
		'search_items' => 'Search Vacation',
		'not_found' => 'No Vacation found',
		'not_found_in_trash' => 'No Vacation found in Trash'
	),
	'public' => true,
	'supports' => array('title', 'editor', 'thumbnail'),
	'taxonomies' => array(''),
	'menu_icon' => 'dashicons-buddicons-activity',
	'has_archive' => true
));

register_post_type('Attractions', array(
	'labels' => array(
		'name' => 'Attractions',
		'singular_name' => 'Attractions',
		'add_new' => 'Add New Attractions',
		'add_new_item' => 'Add New Attractions',
		'edit_item' => 'Edit Attractions',
		'new_item' => 'New Attractions',
		'view_item' => 'View Attractions',
		'search_items' => 'Search Attractions',
		'not_found' => 'No Attractions found',
		'not_found_in_trash' => 'No Attractions found in Trash'
	),
	'public' => true,
	'supports' => array('title', 'editor', 'thumbnail'),
	'taxonomies' => array(''),
	'menu_icon' => 'dashicons-palmtree',
	'has_archive' => true
));





?>