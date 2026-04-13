<?php

// Function file theme: Shopery

if(!defined('_S_VERSION')){
	define('_S_VERSION', '1.0.0');
}

$folders = [
	'/function/setup_theme/',
	'/function/helpers/'
];

foreach ($folders as $folder) {
	foreach (glob(get_template_directory() . $folder . '*.php') as $setup) {
		require_once $setup;
	}
}


// WP_Hook
add_action('wp_enqueue_scripts', 'shopery_enqueue_scripts');
add_action('after_setup_theme', 'shopery_setup_theme');
add_action('wp_head', 'shopery_add_favicon');
add_action('wp_head', 'shopery_add_fonts');
add_filter('script_loader_tag', 'shopery_add_attributes_for_script', 10, 3);
add_filter('show_admin_bar', '__return_false');
add_action('customize_register', 'shopery_customize_register');