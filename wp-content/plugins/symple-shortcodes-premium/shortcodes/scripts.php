<?php
/*
 * This file registers all scripts used for your symple shortcodes
 * 
 * Symple Shortcodes Premium
 * @since 1.0
 */

if( !function_exists ( 'symple_shortcodes_scripts' ) ) :
	function symple_shortcodes_scripts() {
		
		// JS
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'symple_tabs', plugin_dir_url( __FILE__ ) . 'js/symple_tabs.js', array ( 'jquery', 'jquery-ui-tabs' ), '1.0', true );
		wp_register_script( 'symple_toggle', plugin_dir_url( __FILE__ ) . 'js/symple_toggle.js', 'jquery', '1.0', true );
		wp_register_script( 'symple_accordion', plugin_dir_url( __FILE__ ) . 'js/symple_accordion.js', array ( 'jquery', 'jquery-ui-accordion' ), '1.0', true );
		wp_register_script( 'symple_googlemap',  plugin_dir_url( __FILE__ ) . 'js/symple_googlemap.js', array( 'jquery' ), '1.0', true);
		wp_register_script( 'symple_googlemap_api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array( 'jquery' ), '1.0', true);
		wp_register_script( 'symple_skillbar', plugin_dir_url( __FILE__ ) . 'js/symple_skillbar.js', array ( 'jquery' ), '1.0', true );
		wp_register_script( 'magnific-popup', plugin_dir_url( __FILE__ ) . 'js/magnific-popup.min.js', array ( 'jquery' ), '0.9.4', true );
		wp_register_script( 'symple_lightbox', plugin_dir_url( __FILE__ ) . 'js/symple_lightbox.js', array ( 'jquery', 'magnific-popup' ), '1.0', true );
		wp_register_script( 'touchSwipe', plugin_dir_url( __FILE__ ) . 'js/touchSwipe.js', array ( 'jquery' ), '6.2.1', true );
		wp_register_script( 'caroufredsel', plugin_dir_url( __FILE__ ) . 'js/caroufredsel.js', array ( 'jquery', 'touchSwipe' ), '6.2.1', true );
		wp_register_script( 'flexslider', plugin_dir_url( __FILE__ ) . 'js/flexslider.js', array ( 'jquery' ), '2.2.0', true );
		wp_register_script( 'symple_parallax', plugin_dir_url( __FILE__ ) . 'js/symple_parallax.js', array ( 'jquery' ), '1.0', true );
		wp_register_script( 'symple_scroll_fade', plugin_dir_url( __FILE__ ) . 'js/symple_scroll_fade.js', array ( 'jquery' ), '1.0', true );
		
		// CSS
		wp_enqueue_style( 'symple_shortcode_styles', plugin_dir_url( __FILE__ ) . 'css/symple_shortcodes_styles.css' );
		wp_register_style( 'symple_shortcode_font_awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css' );
		
	}
	add_action( 'wp_enqueue_scripts', 'symple_shortcodes_scripts' );
endif;