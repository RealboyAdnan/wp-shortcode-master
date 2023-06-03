<?php
/*
	* Plugin Name: 		WP Shortcode Master
	* Plugin URI: 		https://softclever.com/downloads/
	* Description: 		This plugin registers a custom post type for managing shortcodes and provides a shortcode inserter button in the WordPress editor.
	
	* Author: 			Md Maruf Adnan Sami
	* Author URI: 		https://www.mdmarufadnansami.com
	* Version: 			1.0
*/

// Include other files
require_once plugin_dir_path( __FILE__ ) . 'inc/shortcode-post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/shortcode-column.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/shortcode-display.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/shortcode-inserter.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/shortcode-styles.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/shortcode-preview.php';
?>