<?php
/*
Plugin Name: Symple Shortcodes Premium
Plugin URI: http://www.wpexplorer.com/symple-shortcodes/
Description: Exclusive premium version of the Symple Shortcodes plugin by WPExplorer
Version: 1.0
Author: WPExplorer
Author URI: http://www.wpexplorer.com
Copyright: 2013 All Rights Reserved Symple Workz LLC.
*/


// Start Class
class SympleShortcodes {


	// Constructor
    function __construct() {
		if ( !function_exists( 'vc_map' ) ) {	
        	add_action( 'init', array( &$this, 'register_mce_btn' ) );
		}
        add_action( 'admin_init', array( &$this, 'load_scripts') );
		add_action( 'plugins_loaded', array( &$this, 'load_text_domain' ) );
		require_once( plugin_dir_path( __FILE__ ) .'/arrays.php' );
		require_once( plugin_dir_path( __FILE__ ) .'/shortcodes/shortcodes.php' ); // The actual shortcodes are here
		require_once( plugin_dir_path( __FILE__ ) .'/visual-composer/extend-visual-composer.php' ); // The actual shortcodes are here
	}


	// Load text domain
	function load_text_domain() {
		load_plugin_textdomain( 'text_domain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
	}


	// Registers TinyMCE rich editor buttons
	function register_mce_btn() {
		if ( is_admin() ) {
			if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
				return; // Sorry you are not allowed!
			if ( get_user_option('rich_editing') == 'true' ) {
				add_filter( 'mce_external_plugins', array( &$this, 'add_rich_plugins' ) );
				add_filter( 'mce_buttons', array( &$this, 'register_rich_buttons' ) );
			}
		}
	}
	
	
	// Defines TinyMCE rich editor js plugin
	function add_rich_plugins( $plugin_array ) {
		$plugin_array['sympleShortcodesPremium'] = plugin_dir_url( __FILE__ ) .'tinymce/mce-btns.js';
		return $plugin_array;
	}
	
	
	// Adds TinyMCE rich editor buttons
	function register_rich_buttons( $buttons ) {
		array_push( $buttons, "|", 'symple_button_premium' );
		return $buttons;
	}

	// Enqueue Scripts and Styles
	function load_scripts() {
		wp_enqueue_style( 'symple-shortcodes-thickbox', plugin_dir_url( __FILE__ ) .'tinymce/css/symple-shortcodes-thickbox.css', false, '1.0', 'all' );
		wp_enqueue_script( 'jquery-livequery', plugin_dir_url( __FILE__ ) .'tinymce/js/jquery.livequery.js', array( 'jquery' ), '1.1.1', true );
		wp_enqueue_script( 'jquery-appendo', plugin_dir_url( __FILE__ ) .'tinymce/js/jquery.appendo.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'symple-shortcodes-thickbox', plugin_dir_url( __FILE__ ) .'tinymce/js/symple-shortcodes-thickbox.js', array( 'jquery', 'jquery-livequery', 'jquery-appendo' ), '1.0', true );
	}
	
    
}
$symple_shortcodes = new SympleShortcodes();
?>