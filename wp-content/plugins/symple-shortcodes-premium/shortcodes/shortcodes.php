<?php
// Register scripts -------------------------------------------------------------------------- >
require_once( plugin_dir_path( __FILE__ ) .'/scripts.php' );


// Widget Support -------------------------------------------------------------------------- >
add_filter('widget_text', 'do_shortcode');


// "Fix" Shortcodes -------------------------------------------------------------------------- >
if( !function_exists('symple_fix_shortcodes') ) {
	function symple_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'symple_fix_shortcodes');
}


// Clear Floats -------------------------------------------------------------------------- >	
if( !function_exists('symple_clear_floats_shortcode') ) {
	function symple_clear_floats_shortcode() {
	   return '<div class="symple-clear-floats"></div>';
	}
	add_shortcode( 'symple_clear_floats', 'symple_clear_floats_shortcode' );
}


// Callout -------------------------------------------------------------------------- >	
if( !function_exists('symple_callout_shortcode') ) {
	function symple_callout_shortcode( $atts, $content = NULL  ) {		
		extract( shortcode_atts( array(
			'caption'				=> '',
			'button_text'			=> '',
			'fade_in'				=> '',
			'button_color'			=> 'blue',
			'button_size'			=> 'normal',
			'button_url'			=> 'http://www.wpexplorer.com',
			'button_rel'			=> 'nofollow',
			'button_target'			=> 'blank',
			'button_border_radius'	=> '',
			'button_title'			=> __('Visit Site', 'text_domain' ),
			'class'					=> '',
			'button_icon_left'		=> '',
			'button_icon_right'		=> ''
		), $atts ) );
		
		// Load required scripts
		if ( ( $button_icon_left && $button_icon_left !== 'none' ) || (  $button_icon_right && $button_icon_right !== 'none' ) ) {
			wp_enqueue_style('symple_shortcode_font_awesome');
		}
		
		// Fade in
		$fade_in_class = NULL;
		if ( $fade_in == 'true' ) {
			wp_enqueue_script('symple_scroll_fade');
			$fade_in_class = 'symple-fadein';
		}
		
		//Set Vars
		$button_border_radius = ( $button_border_radius ) ? 'style="border-radius:'. $button_border_radius .'"' : NULL;		
		$button_rel = ( $button_rel !== 'none' ) ? 'rel="'.$button_rel.'"' : NULL;
		
		// Display Callout
		$output = '<div class="symple-callout symple-clearfix '. $class .' '. $fade_in_class .'">';
		$output .= '<div class="symple-callout-caption">';
			$output .= do_shortcode ( $content );
		$output .= '</div>';	
		if ( $button_text !== '' ) {
			$output .= '<div class="symple-callout-button">';
				$output .= '<a href="' . $button_url . '" class="symple-button '. $button_size .' ' . $button_color . '" target="_'.$button_target.'" title="'. $button_title .'" '. $button_border_radius .' '. $button_rel .'>';
					$output.= '<span class="symple-button-inner" '.$button_border_radius.'>';
						if ( $button_icon_left && $button_icon_left !== 'none' ) $output.= '<i class="symple-button-icon-left icon-'. $button_icon_left .'"></i>';
							$output.= $button_text;
						if ( $button_icon_right && $button_icon_right !== 'none' ) $output.= '<i class="symple-button-icon-right icon-'. $button_icon_right .'"></i>';
					$output.= '</span>';			
				$output.= '</a>';
			$output .='</div>';
		}
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode( 'symple_callout', 'symple_callout_shortcode' );
}


// Skillbars -------------------------------------------------------------------------- >	
if( !function_exists('symple_skillbar_shortcode') ) {
	function symple_skillbar_shortcode( $atts  ) {		
		extract( shortcode_atts( array(
			'title'			=> '',
			'percentage'	=> '100',
			'color'			=> '#6adcfa',
			'class'			=> '',
			'show_percent'	=> 'true'
		), $atts ) );
		
		// Enque scripts
		wp_enqueue_script('symple_skillbar');
		
		// Display the accordion	';
		$output = '<div class="symple-skillbar symple-clearfix '. $class .'" data-percent="'. $percentage .'%">';
			if ( $title !== '' ) $output .= '<div class="symple-skillbar-title" style="background: '. $color .';"><span>'. $title .'</span></div>';
			$output .= '<div class="symple-skillbar-bar" style="background: '. $color .';"></div>';
			if ( $show_percent == 'true' ) {
				$output .= '<div class="symple-skill-bar-percent">'.$percentage.'%</div>';
			}
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode( 'symple_skillbar', 'symple_skillbar_shortcode' );
}


// Spacing -------------------------------------------------------------------------- >	
if( !function_exists('symple_spacing_shortcode') ) {
	function symple_spacing_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'size'	=> '20px',
			'class'	=> '',
		  ),
		  $atts ) );
	 return '<hr class="symple-spacing '. $class .'" style="height: '. $size .'" />';
	}
	add_shortcode( 'symple_spacing', 'symple_spacing_shortcode' );
}


// Bullets -------------------------------------------------------------------------- >
if( !function_exists('symple_bullets_shortcode') ) {
	function symple_bullets_shortcode( $atts, $content = NULL ) {
		extract( shortcode_atts( array(
			'style'	=> ''
		),
		$atts ) );
		return '<div class="symple-bullets symple-bullets-' . $style . '">' . do_shortcode( $content ) . '</div>';
	}
	add_shortcode('symple_bullets', 'symple_bullets_shortcode');
}


// Centered Container -------------------------------------------------------------------------- >	
if( !function_exists('symple_container_shortcode') ) {
	function symple_container_shortcode( $atts, $content=NULL ) {
		extract( shortcode_atts( array(
			'margin_top'	=> '0',
			'margin_bottom'	=> '',
			'class'			=> '',
		  ),
		  $atts ) );
	 return '<div class="symple-container container clr '. $class .'" style="margin-top: '. $margin_top .';"margin-bottom: '. $margin_bottom .'" />
	 			'. do_shortcode( $content ) .'
			</div>';
	}
	add_shortcode( 'symple_container', 'symple_container_shortcode' );
}


// Background Container -------------------------------------------------------------------------- >	
if( !function_exists('symple_background_shortcode') ) {
	function symple_background_shortcode( $atts, $content=NULL ) {
		extract( shortcode_atts( array(
			'background_color'	=> '#000',
			'background_image'	=> '',
			'background_style'	=> 'fixed', //fixed, repeat, parallax
			'center_content'	=> 'true',
			'padding_top'		=> '40px',
			'padding_bottom'	=> '40px',
			'padding_left'		=> '0',
			'padding_right'		=> '0',
			'margin_top'		=> '0',
			'margin_bottom'		=> '0',
			'text_color'		=> '#fff',
			'class'				=> '',
		),
		$atts ) );
		$bg_img=NULL;
		
		if ( wp_get_attachment_url( $background_image ) ) {
			$vc_bg_img = wp_get_attachment_url( $background_image );
			$bg_img = 'background-image: url('. $vc_bg_img .');';
		} else {
			if ( $background_image !== '' ) {
			  $bg_img = 'background-image: url('. $background_image .');';
			}		
		}
		
		if ( $background_style == 'parallax' ) {
		  wp_enqueue_script( 'symple_parallax' );
		}
		$container_class = NULL;
		if ( $center_content == 'true' ) {
			$container_class = 'container';
		}
		return '<div class="symple-background clr style-'. $background_style .' '. $class .'" style="'. $bg_img .';background-color: '. $background_color .';padding-top:'. $padding_top .';padding-bottom: '. $padding_bottom .';padding-left: '. $padding_left .';padding-right: '. $padding_right .';margin-top: '. $margin_top .';margin-bottom: '. $margin_bottom .';color:'. $text_color .';" />
	 			<div class="'. $container_class .' symple-background-content clr">'. do_shortcode( $content ) .'</div>
			</div>';
	}
	add_shortcode( 'symple_background', 'symple_background_shortcode' );
}


// Social Icons -------------------------------------------------------------------------- >	
if( !function_exists('symple_social_shortcode') ) {
	function symple_social_shortcode( $atts ){   
		extract( shortcode_atts( array(
			'icon'			=> 'twitter',
			'url'			=> 'http://www.twitter.com/',
			'title'			=> 'Follow Us',
			'target'		=> 'self',
			'rel'			=> '',
			'class'			=> '',
		), $atts ) );
		$icons_url = plugin_dir_url( __FILE__ ) .'images/social/';
		$icons_url = apply_filters( 'symple_social_icon_url', $icons_url );
		return '<a href="' . $url . '" class="symple-social-icon '. $class .'" target="_'.$target.'" title="'. $title .'" rel="'. $rel .'"
><img src="'. $icons_url . $icon .'.png" alt="'. $icon .'" /></a>';
	}
	add_shortcode('symple_social', 'symple_social_shortcode');
}


// Highlights -------------------------------------------------------------------------- >	
if ( !function_exists( 'symple_highlight_shortcode' ) ) {
	function symple_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'	=> 'yellow',
			'class'	=> '',
		  ),
		  $atts ) );
		  return '<span class="symple-highlight symple-highlight-'. $color .' '. $class .'">' . do_shortcode( $content ) . '</span>';
	
	}
	add_shortcode('symple_highlight', 'symple_highlight_shortcode');
}


// Buttons -------------------------------------------------------------------------- >
if( !function_exists('symple_button_shortcode') ) {
	function symple_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'			=> 'blue',
			'url'			=> 'http://www.sympleplorer.com',
			'title'			=> __('Visit Site', 'text_domain' ),
			'target'		=> 'self',
			'size'			=> 'normal',
			'rel'			=> '',
			'border_radius'	=> '',
			'class'			=> '',
			'icon_left'		=> '',
			'icon_right'	=> '',
			'fade_in'		=> 'false',
		), $atts ) );
		
		// Load required scripts
		if ( ( $icon_left && $icon_left !== 'none' ) || (  $icon_right && $icon_right !== 'none' ) ) {
			wp_enqueue_style('symple_shortcode_font_awesome');
		}
		
		//Set Vars
		$border_radius_style = ( $border_radius ) ? 'style="border-radius:'. $border_radius .'"' : NULL;		
		$rel = ( $rel !== 'none' ) ? 'rel="'.$rel.'"' : NULL;	
		$fade_in_class = NULL;
		if ( $fade_in == 'true' ) {
			wp_enqueue_script('symple_scroll_fade');
			$fade_in_class = 'symple-fadein';
		}
		
		// Display Button
		$output= NULL;
		$output.= '<a href="' . $url . '" class="symple-button '. $size .' ' . $color . ' '. $class .' '. $fade_in_class .'" target="_'.$target.'" title="'. $title .'" '. $border_radius_style .' '. $rel .'>';
			$output.= '<span class="symple-button-inner" '.$border_radius_style.'>';
				if ( $icon_left && $icon_left !== 'none' ) $output.= '<i class="symple-button-icon-left icon-'. $icon_left .'"></i>';
				$output.= $content;
				if ( $icon_right && $icon_right !== 'none' ) $output.= '<i class="symple-button-icon-right icon-'. $icon_right .'"></i>';
			$output.= '</span>';			
		$output.= '</a>';
		return $output;
	}
	add_shortcode('symple_button', 'symple_button_shortcode');
}


// Boxes -------------------------------------------------------------------------- >
if( !function_exists('symple_box_shortcode') ) { 
	function symple_box_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'			=> 'gray',
			'float'			=> 'center',
			'text_align'	=> 'left',
			'width'			=> '100%',
			'margin_top'	=> '',
			'margin_bottom'	=> '',
			'class'			=> '',
			'fade_in'		=> 'false',
		  ), $atts ) );		  
		$fade_in_class = NULL;
		if ( $fade_in == 'true' ) {
			wp_enqueue_script('symple_scroll_fade');
			$fade_in_class = 'symple-fadein';
		}
		$style_attr = '';
		if( $margin_bottom ) {
			$style_attr .= 'margin-bottom: '. $margin_bottom .';';
		}
		if ( $margin_top ) {
			$style_attr .= 'margin-top: '. $margin_top .';';
		}
		$alert_content = '';
		$alert_content .= '<div class="symple-box '. $fade_in_class .' ' . $color . ' '.$float.' '. $class .'" style="text-align:'. $text_align .'; width:'. $width .';'. $style_attr .'">';
		$alert_content .= ' '. do_shortcode($content) .'</div>';
		return $alert_content;
	}
	add_shortcode('symple_box', 'symple_box_shortcode');
}


// Testimonial -------------------------------------------------------------------------- >
if( !function_exists('symple_testimonial_shortcode') ) { 
	function symple_testimonial_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'by'		=> '',
			'class'		=> '',
			'fade_in'	=> 'false',
		), $atts ) );
		$fade_in_class = NULL;
		if ( $fade_in == 'true' ) {
			wp_enqueue_script('symple_scroll_fade');
			$fade_in_class = 'symple-fadein';
		}
		$testimonial_content = '<div class="symple-testimonial'. $class .' '. $fade_in_class .'"><div class="symple-testimonial-content">';
		$testimonial_content .= do_shortcode( $content );
		$testimonial_content .= '<div style="clear:both;"></div></div><div class="symple-testimonial-author">';
		$testimonial_content .= $by .'</div></div>';	
		return $testimonial_content;
	}
	add_shortcode( 'symple_testimonial', 'symple_testimonial_shortcode' );
}


// Columns -------------------------------------------------------------------------- >
if( !function_exists('symple_column_shortcode') ) {
	function symple_column_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'size'		=> 'one-third',
			'position'	=>'first',
			'fade_in'	=> 'false',
			'class'		=> '',
		), $atts ) );
		$fade_in_class = NULL;
		if ( $fade_in == 'true' ) {
			wp_enqueue_script('symple_scroll_fade');
			$fade_in_class = 'symple-fadein';
		}
		$output = '<div class="symple-column symple-' . $size . ' symple-column-'.$position.' '. $class .' '. $fade_in_class .'">' . do_shortcode($content) . '</div>';
		if ( $position == 'last' ) {
		  $output .= '<div class="symple-clear-floats"></div>';
		}
		return $output;
	}
	add_shortcode('symple_column', 'symple_column_shortcode');
}


// Toggle -------------------------------------------------------------------------- >
if( !function_exists('symple_toggle_shortcode') ) {
	function symple_toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title'	=> 'Toggle Title',
			'class'	=> '',
			'state'	=> 'closed',
		), $atts ) );
		 
		// Enque scripts
		wp_enqueue_script('symple_toggle');
		
		$active_class = ( $state == 'open' ) ? 'active' : NULL;
		
		// Display the Toggle
		return '<div class="symple-toggle state-'. $state .' '. $class .'"><h3 class="symple-toggle-trigger '. $active_class .'">'. $title .'</h3><div class="symple-toggle-container symple-clearfix">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('symple_toggle', 'symple_toggle_shortcode');
}


// Accordion -------------------------------------------------------------------------- >

// Main
if( !function_exists('symple_accordion_main_shortcode') ) {
	function symple_accordion_main_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(
			'class'	=> ''
		), $atts ) );
		
		// Enque scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('symple_accordion');
		
		// Display the accordion	
		return '<div class="symple-accordion '. $class .'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'symple_accordion', 'symple_accordion_main_shortcode' );
}


// Section
if( !function_exists('symple_accordion_section_shortcode') ) {
	function symple_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title'	=> 'Title',
			'class'	=> '',
		), $atts ) );
		  
	   return '<h3 class="symple-accordion-trigger '. $class .'"><a href="#">'. $title .'</a></h3><div class="symple-clearfix">' . do_shortcode($content) . '</div>';
	}
	
	add_shortcode( 'symple_accordion_section', 'symple_accordion_section_shortcode' );
}


// Tabs -------------------------------------------------------------------------- >
if ( !function_exists('symple_tabgroup_shortcode')) {
	function symple_tabgroup_shortcode( $atts, $content = null ) {
		
		//Enque scripts
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('symple_tabs');
		
		// Display Tabs
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		$output = '';
		if( count($tab_titles) ){
		    $output .= '<div id="symple-tab-'. rand(1, 100) .'" class="symple-tabs">';
			$output .= '<ul class="ui-tabs-nav symple-clearfix">';
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#symple-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		return $output;
	}
	add_shortcode( 'symple_tabgroup', 'symple_tabgroup_shortcode' );
}

if ( !function_exists('symple_tab_shortcode')) {
	function symple_tab_shortcode( $atts, $content = null ) {
		$defaults = array(
			'title'	=> 'Tab',
			'class'	=> ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		return '<div id="symple-tab-'. sanitize_title( $title ) .'" class="tab-content symple-clearfix '. $class .'">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'symple_tab', 'symple_tab_shortcode' );
}


// WPML -------------------------------------------------------------------------- >
if( !function_exists('symple_wpml_shortcode') ) {
	function symple_wpml_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'lang'	=> '',
		), $atts));
		if ( ! defined('ICL_LANGUAGE_CODE') ) return __( 'WPML ICL_LANGUAGE_CODE constant does not exist. If you want to translate something please first install the WPML plugin.', 'text_domain' );
		$lang_active = ICL_LANGUAGE_CODE;
		if($lang == $lang_active){
			return do_shortcode($content);
		}
	}
	add_shortcode('symple_wpml', 'symple_wpml_shortcode');
}


// Pricing Table -------------------------------------------------------------------------- >
 
/*main*/
if( !function_exists('symple_pricing_table_shortcode') ) {
	function symple_pricing_table_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'class'	=> ''
		), $atts ) );
		return '<div class="symple-pricing-table '. $class .'">' . do_shortcode($content) . '</div><div class="symple-clear-floats"></div>';
	}
	add_shortcode( 'symple_pricing_table', 'symple_pricing_table_shortcode' );
}

/*section*/
if( !function_exists('symple_pricing_shortcode') ) {
	function symple_pricing_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(
			'size'					=> 'one-half',
			'position'				=> '',
			'featured'				=> 'no',
			'plan'					=> 'Basic',
			'cost'					=> '$20',
			'per'					=> 'month',
			'button_url'			=> '',
			'button_text'			=> 'Purchase',
			'button_color'			=> 'blue',
			'button_target'			=> 'self',
			'button_rel'			=> 'nofollow',
			'button_border_radius'	=> '',
			'class'					=> '',
		), $atts ) );
		
		//set variables
		$featured_pricing = ( $featured == 'yes' ) ? 'featured' : NULL;
		$border_radius_style = ( $button_border_radius ) ? 'style="border-radius:'. $button_border_radius .'"' : NULL;
		
		//start content  
		$pricing_content ='';
		$pricing_content .= '<div class="symple-pricing symple-'. $size .' '. $featured_pricing .' symple-column-'. $position. ' '. $class .'">';
			$pricing_content .= '<div class="symple-pricing-header">';
				$pricing_content .= '<h5>'. $plan. '</h5>';
				$pricing_content .= '<div class="symple-pricing-cost">'. $cost .'</div><div class="symple-pricing-per">'. $per .'</div>';
			$pricing_content .= '</div>';
			$pricing_content .= '<div class="symple-pricing-content">';
				$pricing_content .= ''. $content. '';
			$pricing_content .= '</div>';
			if( $button_url ) {
				$pricing_content .= '<div class="symple-pricing-button"><a href="'. $button_url .'" class="symple-button '. $button_color .'" target="_'. $button_target .'" rel="'. $button_rel .'" '. $border_radius_style .'><span class="symple-button-inner" '. $border_radius_style .'>'. $button_text .'</span></a></div>';
			}
		$pricing_content .= '</div>';  
		return $pricing_content;
	}
	
	add_shortcode( 'symple_pricing', 'symple_pricing_shortcode' );
}



// Heading -------------------------------------------------------------------------- >
if( !function_exists('symple_heading_shortcode') ) {
	function symple_heading_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'title'			=> __('Sample Heading', 'symple'),
			'type'			=> 'h2',
			'style'			=> 'double-line',
			'margin_top'	=> '',
			'margin_bottom'	=> '',
			'text_align'	=> '',
			'font_size'		=> '',
			'color'			=> '',
			'class'			=> '',
			'icon_left'		=> '',
			'icon_right'	=> ''
		  ),
		  $atts ) );
		  
		// Load required scripts
		if ( ( $icon_left && $icon_left !== 'none' ) || (  $icon_right && $icon_right !== 'none' ) ) {
			wp_enqueue_style('symple_shortcode_font_awesome');
		}
		  
		$style_attr = '';
		if ( $font_size ) {
			$style_attr .= 'font-size: '. $font_size .';';
		}
		if ( $color ) {
			$style_attr .= 'color: '. $color .';';
		}
		if( $margin_bottom ) {
			$style_attr .= 'margin-bottom: '. $margin_bottom .';';
		}
		if ( $margin_top ) {
			$style_attr .= 'margin-top: '. $margin_top .';';
		}
		
		if ( $text_align ) {
			$text_align = 'text-align-'. $text_align;
		} else {
			$text_align = 'text-align-left';
		}
		
	 	$output = '<'.$type.' class="symple-heading symple-heading-'. $style .' '. $text_align .' '. $class .'" style="'.$style_attr.'"><span>';
		if ( $icon_left !== '' && $icon_left !== 'none' ) $output .= '<i class="symple-heading-icon-left icon-'. $icon_left .'"></i>';
			$output .= $title;
		if ( $icon_right !== '' && $icon_right !== 'none' ) $output .= '<i class="symple-heading-icon-right icon-'. $icon_right .'"></i>';
		$output .= '</'.$type.'></span>';
		
		return $output;
	}
	add_shortcode( 'symple_heading', 'symple_heading_shortcode' );
}


// Google Maps -------------------------------------------------------------------------- >
if ( !function_exists( 'symple_shortcode_googlemaps' ) ) :
	function symple_shortcode_googlemaps($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'title'		=> '',
				'location'	=> '',
				'width'		=> '',
				'height'	=> '300',
				'zoom'		=> 8,
				'align'		=> '',
				'class'		=> '',
		), $atts));
		
		// load scripts
		wp_enqueue_script('symple_googlemap');
		wp_enqueue_script('symple_googlemap_api');
		
		
		$output = '<div id="map_canvas_'.rand(1, 100).'" class="googlemap '. $class .'" style="height:'.$height.'px;width:100%">';
			$output .= (!empty($title)) ? '<input class="title" type="hidden" value="'.$title.'" />' : '';
			$output .= '<input class="location" type="hidden" value="'.$location.'" />';
			$output .= '<input class="zoom" type="hidden" value="'.$zoom.'" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div>';
		
		return $output;
	   
	}
	add_shortcode("symple_googlemap", "symple_shortcode_googlemaps");
endif;


// Divider -------------------------------------------------------------------------- >
if( !function_exists('symple_divider_shortcode') ) {
	function symple_divider_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'style'			=> 'fadeout',
			'margin_top'	=> '20px',
			'margin_bottom'	=> '20px',
			'class'			=> '',
		  ),
		  $atts ) );
		$style_attr = '';
		if ( $margin_top && $margin_bottom ) {  
			$style_attr = 'style="margin-top: '. $margin_top .';margin-bottom: '. $margin_bottom .';"';
		} elseif( $margin_bottom ) {
			$style_attr = 'style="margin-bottom: '. $margin_bottom .';"';
		} elseif ( $margin_top ) {
			$style_attr = 'style="margin-top: '. $margin_top .';"';
		} else {
			$style_attr = NULL;
		}
	 return '<hr class="symple-divider '. $style .' '. $class .'" '.$style_attr.' />';
	}
	add_shortcode( 'symple_divider', 'symple_divider_shortcode' );
}


// Recent News -------------------------------------------------------------------------- >
if( !function_exists( 'symple_news_shortcode' ) ) {

	function symple_news_shortcode($atts) {
		
		// Define shortcode params
		extract( shortcode_atts( array(
				'unique_id'			=> '',
				'post_type'			=> 'post',
				'taxonomy'			=> '',
				'term_slug'			=> '',
				'count'				=> '12',
				'columns'			=> '3',
				'order'				=> 'DESC',
				'orderby'			=> 'date',
				'header'			=> __( 'News', 'text_domain' ),
				'heading'			=> 'h3',
				'date'				=> 'true',
				'excerpt_length'	=> '15',
				'read_more'			=> 'false',
				'read_more_text'	=> __( 'read more', 'text_domain' ),
				'filter_content'	=> 'false',
				'offset'			=> 0,
				'taxonomy'			=> '',
				'terms'				=>'',
			), $atts));
			
		// Too many!!
		if (strpos( $post_type, ',' ) !== false) return __( 'Please select only 1 post type.', 'text_domain' );
			
		// Post Type doesn't exist, get me out of here!
		if ( ! post_type_exists( $post_type ) ) return __( 'Sorry the post type you have selected does not exist', 'text_domain' );
		
		// Start Tax Query
		$tax_query = '';
		if( $taxonomy !== '' && $term_slug !== '' ) {
			if ( ! taxonomy_exists($taxonomy) ) return __( 'Your selected taxonomy does not exist', 'text_domain' );
			if ( ! term_exists( $term_slug, $taxonomy ) ) return __( 'Your selected term does not exist', 'text_domain' );
			$tax_query = array(
				array(
					'taxonomy'	=> $taxonomy,
					'field'		=> 'slug',
					'terms'		=> $term_slug,
				),
			);
		}
		
		// The Query
		$symple_news_query = new WP_Query(
			array(
				'post_type'			=> $post_type,
				'posts_per_page'	=> $count,
				'offset'			=> $offset,
				'order'				=> $order,
				'orderby'			=> $orderby,
				'tax_query'			=> $tax_query,
				'filter_content'	=> $filter_content,
				'no_found_rows'		=> true,
				'meta_query' => array(
									 array(
										'key' => '_thumbnail_id',
									)
								),
			)
		);

		$output = '';

		//Output posts
		if( $symple_news_query->posts ) :
		
			$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
		
			// Main wrapper div
			$output .= '<div class="symple-recent-news"'. $unique_id .'>';
			
			// Header
			if ( $header !== '' ) {
				$output .= '<h2 class="symple-recent-news-header">'. $header .'</h2>';
			}
		
			// Loop through posts
			foreach ( $symple_news_query->posts as $post ) :
			
				// Post VARS
				$postid			= $post->ID;
				$url			= get_permalink($postid);
				$post_title		= get_the_title($postid);
				$post_excerpt	= $post->post_excerpt;
				$custom_excerpt = wp_trim_words( strip_shortcodes( $post->post_content ), $excerpt_length);
	
				// News article start
				if ( $post_excerpt !== '' || $custom_excerpt !== '' ) {
					
					$output .= '<article id="post-'. $postid .'" class="symple-recent-news-entry fitvids">';
					
						// Date
						if ( $date ) {
							$output .= '<div class="symple-recent-news-date"><span class="day">'. get_the_time('d', $postid) .'</span><span class="month">'. get_the_time('M', $postid) .'</span></div>';
						}
					
						// Open recent news entry
						$output .='<div class="symple-news-entry-details symple-clearfix">';
	
							// Title
							$output .= '<header class="symple-recent-news-entry-title">';
								$output .= '<'. $heading .' class="symple-recent-news-entry-title-heading"><a href="'. $url .'" title="'. $post_title .'">'. $post_title .'</a></'. $heading .'>';
							$output .= '</header><!-- .symple-recent-news-entry-title -->';
							
							// Excerpt
							$output .='<div class="symple-recent-news-entry-excerpt symple-clearfix">';
								if ( !empty($post_excerpt) ) {
									$output .= $post_excerpt .'...';
								} else {
									$output .= $custom_excerpt;
								}
								if( $read_more == 'true' && empty($post_excerpt) ) { 
									$output .= '<a href="'. $url .'" title="'. $post_title .'" class="symple-recent-news-entry-readmore">'. $read_more_text .' &rarr;</a>';
								}
							$output .=' </div><!-- .symple-recent-news-entry-excerpt -->';
						
						// Close details div
						$output .='</div><!-- .symple-recent-news-entry-details -->';
						
					// Close main wrap	
					$output .= '</article><!-- .symple-recent-news-entry -->';
				
				}
			
			// End foreach loop
			endforeach;
			
			// Close main wrap
			$output .= '</div><!-- .symple-recent-news --><div class="symple-clear-floats"></div>';
		
		endif; // End has posts check
				
		// Set things back to normal
		$symple_news_query = NULL;
		wp_reset_postdata();

		// Return data
		return $output; 
		
	}
	add_shortcode("symple_news", "symple_news_shortcode");
}


// Recent Posts -------------------------------------------------------------------------- >
if( !function_exists( 'symple_posts_grid_shortcode' ) ) {

	function symple_posts_grid_shortcode($atts) {
		
		// Define shortcode params
		extract( shortcode_atts( array(
				'unique_id'			=> '',
				'post_type'			=> 'post',
				'taxonomy'			=> '',
				'term_slug'			=> '',
				'count'				=> '12',
				'style'				=> 'default', // Maybe add more styles in the future?
				'fade_in'			=> 'false',
				'columns'			=> '3',
				'order'				=> 'DESC',
				'orderby'			=> 'date',
				'thumbnail_link'	=> 'post',
				'img_crop'			=> 'true',
				'img_width'			=> '9999',
				'img_height'		=> '9999',
				'title'				=> 'true',
				'meta'				=> 'true',
				'excerpt'			=> 'true',
				'excerpt_length'	=> '15',
				'read_more'			=> 'false',
				'read_more_text'	=> __( 'read more', 'text_domain' ),
				'pagination'		=> 'false',
				'filter_content'	=> 'false',
				'offset'			=> 0,
				'taxonomy'			=> '',
				'terms'				=> '',
			), $atts));
			
		// Too many!!
		if (strpos( $post_type, ',' ) !== false) return __( 'Please select only 1 post type.', 'text_domain' );
		
		// Post Type doesn't exist, get me out of here!
		if ( ! post_type_exists( $post_type ) ) return __( 'Sorry the post type you have selected does not exist', 'text_domain' );
		
		// FadeIn Class
		$fade_in_class = NULL;
		if ( $fade_in == 'true' ) {
			wp_enqueue_script('symple_scroll_fade');
			$fade_in_class = 'symple-fadein';
		}
		
		// Start Tax Query
		$tax_query = '';
		if( $taxonomy !== '' && $term_slug !== '' ) {
			if ( ! taxonomy_exists($taxonomy) ) return __( 'Your selected taxonomy does not exist', 'text_domain' );
			if ( ! term_exists( $term_slug, $taxonomy ) ) return __( 'Your selected term does not exist', 'text_domain' );
			$tax_query = array(
				array(
					'taxonomy'	=> $taxonomy,
					'field'		=> 'slug',
					'terms'		=> $term_slug,
				),
			);
		}
		
		// Pagination var
		if( $pagination == 'true' ) {
			global $paged;
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		} else {
			$paged = NULL;
		}
		
		// The Query
		$symple_post_grid_query = new WP_Query(
			array(
				'post_type'			=> $post_type,
				'posts_per_page'	=> $count,
				'offset'			=> $offset,
				'order'				=> $order,
				'orderby'			=> $orderby,
				'tax_query'			=> $tax_query,
				'filter_content'	=> $filter_content,
				'paged'				=> $paged
			)
		);

		$output = '';

		//Output posts
		if( $symple_post_grid_query->posts ) :
		
			$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
		
			// Main wrapper div
			$output .= '<div class="symple-recent-posts"'. $unique_id .'>';
		
			// Loop through posts
			$count=0;
			foreach ( $symple_post_grid_query->posts as $post ) :
			$count++;
			
				// Post VARS
				$postid 			= $post->ID;
				$featured_img_url	= wp_get_attachment_url( get_post_thumbnail_id( $postid ) );
				$featured_img		= wp_get_attachment_url( get_post_thumbnail_id( $postid ) );
				$url 				= get_permalink($postid);
				$post_title			= get_the_title($postid);
				$post_excerpt		= $post->post_excerpt;
				$custom_excerpt 	= wp_trim_words( strip_shortcodes( $post->post_content ), $excerpt_length);
				
				// Load scripts
				if ( $thumbnail_link == 'lightbox' ) {
					wp_enqueue_script( 'magnific-popup' );
					wp_enqueue_script( 'symple_lightbox' );
				}
				
				// Crop featured images if necessary
				if( $img_crop == 'true' ) {
					require_once( plugin_dir_path( __FILE__ ) .'/functions/ssp-img-resize.php' );
					$thumbnail_hard_crop = $img_height == '9999' ? false : true;
					$featured_img = ssp_img_resize( $featured_img_url, $img_width, $img_height, $thumbnail_hard_crop );
				}
				
				// Set vars to remove margin on last item in row & clear floats
				$clear_floats = ( $count == $columns ) ? '<div class="symple-clear-floats clear"></div>' : NULL;
				
				// Reset counter
				if ( $count == $columns ) $count = '0';
	
				// Recent post article start
				$output .= '<article id="post-'. $postid .'" class="symple-recent-posts-entry symple-grid-col symple-grid-col-'. $count .' span_1_of_'.$columns.' fitvids '. $fade_in_class .' symple-grid-'. $post_type .'">';
				
					// Media Wrap
					if( has_post_thumbnail($postid) ) {
						$output .= '<div class="symple-recent-posts-entry-media">';
						
							if ( $thumbnail_link == 'none' ) {
								$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
							} elseif ( $thumbnail_link == 'lightbox' ) {
								$output .= '<a href="'. $featured_img_url .'" title="'. $post_title .'" class="symple-recent-posts-entry-img symple-shortcodes-lightbox">';
									$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
								$output .= '</a><!-- .symple-recent-posts-entry-img -->';
							} else {
								$output .= '<a href="'. $url .'" title="'. $post_title .'" class="symple-recent-posts-entry-img">';
									$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
								$output .= '</a><!-- .symple-recent-posts-entry-img -->';
							}
							
						$output .= '</div>';
					}
				
					// Open details div
					if( $title == 'true' ||  $excerpt == 'true' ) $output .='<div class="symple-recent-posts-entry-details">';

						// Title
						if( $title == 'true' ) {
							$output .= '<header class="symple-recent-posts-entry-heading">';
								$output .= '<h3 class="symple-recent-posts-entry-title"><a href="'. $url .'" title="'. $post_title .'">'. $post_title .'</a></h3>';
							$output .= '</header><!-- .symple-recent-posts-entry-heading -->';
						}
						
						// Excerpt
						if( $excerpt == 'true' ) {
							$output .='<div class="symple-recent-posts-entry-excerpt">';
								if ( !empty($post_excerpt) ) {
									$output .= $post_excerpt;
								} else {
									$output .= $custom_excerpt;
								}
								if( $read_more == 'true' && empty($post_excerpt) ) { 
									$output .= '<span class="symple-recent-posts-entry-readmore-wrap"><a href="'. $url .'" title="'. $post_title .'" class="symple-recent-posts-entry-readmore">'. $read_more_text .' &rarr;</a></span>';
								}
							$output .=' </div><!-- /symple-recent-posts-entry-excerpt -->';
						}
					
					// Close details div
					if( $title == 'true' || $excerpt == 'true' ) {
						$output .='</div><!-- .symple-recent-posts-entry-details -->';
					}
					
				// Close main wrap	
				$output .= '</article>';
				$output .= $clear_floats;
			
			// End foreach loop
			endforeach;
			
			// Close main wrap
			$output .= '</div><div class="symple-clear-floats"></div>';
			
			// Paginate Posts
			if( $pagination == 'true' ) {
				$total = $symple_post_grid_query->max_num_pages;
				$big = 999999999; // need an unlikely integer
				if( $total > 1 )  {
					 if( !$current_page = get_query_var('paged') )
						 $current_page = 1;
					 if( get_option('permalink_structure') ) {
						 $format = 'page/%#%/';
					 } else {
						 $format = '&paged=%#%';
					 }
					 $output .= paginate_links(array(
						'base'		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'	=> $format,
						'current'	=> max( 1, get_query_var('paged') ),
						'total'		=> $total,
						'mid_size'	=> 2,
						'type'		=> 'list',
						'prev_text'	=> '&laquo;',
						'next_text'	=> '&raquo;',
					 ));
				}
			}
		
		endif; // End has posts check
				
		// Set things back to normal
		$symple_post_grid_query = NULL;
		wp_reset_postdata();

		// Return data
		return $output; 
		
	}
	add_shortcode("symple_posts_grid", "symple_posts_grid_shortcode");
}




// Carousel -------------------------------------------------------------------------- >
if( !function_exists( 'symple_carousel_shortcode' ) ) {

	function symple_carousel_shortcode($atts) {
		
		// Define shortcode params
		extract( shortcode_atts( array(
				'unique_id'			=> '',
				'post_type'			=> 'post',
				'taxonomy'			=> '',
				'term_slug'			=> '',
				'count'				=> '8',
				'item_width'		=> '400',
				'min_slides'		=> '1',
				'max_slides'		=> '3',
				'animation'			=> 'CSS',
				'auto_play'			=> 'false',
				'pager'				=> 'true',
				'arrows'			=> 'true',
				'order'				=> 'DESC',
				'orderby'			=> 'date',
				'thumbnail_link'	=> 'post',
				'img_crop'			=> 'true',
				'img_width'			=> '400',
				'img_height'		=> '300',
				'title'				=> 'true',
				'filter_content'	=> 'false',
				'offset'			=> 0,
				'taxonomy'			=> '',
				'terms'				=>'',
			), $atts ) );
			
		$output = '';
		
		// Too many!!
		if (strpos( $post_type, ',' ) !== false) return __( 'Please select only 1 post type.', 'text_domain' );
		
		// Post Type doesn't exist, get me out of here!
		if ( ! post_type_exists( $post_type ) ) return __( 'Sorry the post type you have selected does not exist', 'text_domain' );
		
		// Required Scripts
		wp_enqueue_script( 'caroufredsel' );
		
		// Give caroufredsel a unique name
		$rand_num 			= rand(1, 100);
		$unique_carousel_id = 'caroufredsel-'. $rand_num;
		
		// Output filter JS into the footer like a WP Jedi Master
		$output .='
			<script type="text/javascript">
				jQuery(function($){
					$(document).ready(function(){
						$("#'. $unique_carousel_id .'").carouFredSel({
							responsive : true,
							height: "variable",
							width : "100%",
							auto : '. $auto_play .',
							swipe : {
								onTouch: true,
								onMouse: true
							},';
							if ( $arrows == 'true' ) {
								$output .= 'prev : "#prev-'. $rand_num .'",';
    							$output .= 'next : "#next-'. $rand_num .'",';
							}
							if ( $pager == 'true' ) {
								$output .= 'pagination : "#pager-'. $rand_num .'",';
							}
							$output .='items : {
								width : '. $item_width .',
								height: "variable",
								visible : {
									min : '. $min_slides .',
									max : '. $max_slides .'
								}
							}
						});
					});
					$(window).load(function(){
						$(".symple-caroufredsel-wrap").animate({ opacity: 1 })
					});
				});
			</script>';
		
		// Start Tax Query
		$tax_query = '';
		if( $taxonomy !== '' && $term_slug !== '' ) {
			if ( ! taxonomy_exists($taxonomy) ) return __( 'Your selected taxonomy does not exist', 'text_domain' );
			if ( ! term_exists( $term_slug, $taxonomy ) ) return __( 'Your selected term does not exist', 'text_domain' );
			$tax_query = array(
				array (
					'taxonomy'	=> $taxonomy,
					'field'		=> 'slug',
					'terms'		=> $term_slug,
				)
			);
		}
		
		// The Query
		$symple_carousel_query = new WP_Query(
			array(
				'post_type'			=> $post_type,
				'posts_per_page'	=> $count,
				'offset'			=> $offset,
				'order'				=> $order,
				'orderby'			=> $orderby,
				'filter_content'	=> $filter_content,
				'no_found_rows'		=> true,
				'tax_query'			=> $tax_query,
				'meta_query' 		=> array( array( 'key' => '_thumbnail_id' ) )
			)
		);

		//Output posts
		if( $symple_carousel_query->posts ) :
		
			$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
		
			// Main wrapper div
			$output .= '<div class="symple-caroufredsel-wrap clr symple-caroufredsel-'. $post_type .'"'. $unique_id  .'>';
			
				// Pagination
				if ( $pager == 'true' ) {
					$output .= '<div class="symple-caroufredsel-pag-wrap"><div id="pager-'. $rand_num .'" class="symple-caroufredsel-pag"></div></div>';
				}
				
				$output .= '<div class="symple-caroufredsel"><ul id="'. $unique_carousel_id .'">';
			
				// Loop through posts
				foreach ( $symple_carousel_query->posts as $post ) :
				
					// Post VARS
					$postid 			= $post->ID;
					$featured_img_url	= wp_get_attachment_url( get_post_thumbnail_id( $postid ) );
					$featured_img		= wp_get_attachment_url( get_post_thumbnail_id( $postid ) );
					$url 				= get_permalink($postid);
					$post_title			= get_the_title($postid);
					
					// Load scripts
					if ( $thumbnail_link == 'lightbox' ) {
						wp_enqueue_script( 'magnific-popup' );
						wp_enqueue_script( 'symple_lightbox' );
					}
					
					// Crop featured images if necessary
					if( $img_crop == 'true' ) {
						require_once( plugin_dir_path( __FILE__ ) .'/functions/ssp-img-resize.php' );
						$thumbnail_hard_crop = $img_height == '9999' ? false : true;
						$featured_img = ssp_img_resize( $featured_img_url, $img_width, $img_height, $thumbnail_hard_crop );
					}
		
					// Carousel item start
					$output .= '<li class="symple-caroufredsel-slide">';
					
						// Media Wrap
						if( has_post_thumbnail($postid) ) {
							$output .= '<div class="symple-caroufredsel-entry-media">';
							
								if ( $thumbnail_link == 'none' ) {
									$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
								} elseif ( $thumbnail_link == 'lightbox' ) {
									$output .= '<a href="'. $featured_img_url .'" title="'. $post_title .'" class="symple-caroufredsel-entry-img symple-shortcodes-lightbox">';
										$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
									$output .= '</a><!-- .symple-caroufredsel-entry-img -->';
								} else {
									$output .= '<a href="'. $url .'" title="'. $post_title .'" class="symple-caroufredsel-entry-img">';
										$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
									$output .= '</a><!-- .symple-caroufredsel-entry-img -->';
								}
								
								if ( $title == 'true' && $post_title ) {
									$output .= '<div class="symple-caroufredsel-entry-title"><a href="'. $url .'" title="'. $post_title .'">'. $post_title .'</a></div>';
								}
								
							$output .= '</div>';
						}
						
					// Close main wrap	
					$output .= '</li>';
				
				// End foreach loop
				endforeach;
				
				// End UL
				$output .= '</ul>';
				
				// Next/Prev arrows	
				if ( $arrows == 'true' ) {
					$output .= '<div id="prev-'. $rand_num .'" class="symple-caroufredsel-prev">Prev</div><div id="next-'. $rand_num .'" class="symple-caroufredsel-next">Next</div>';
				}
			
			// Close main wrap
			$output .= '</div></div><div class="symple-clear-floats"></div>';
		
		endif; // End has posts check
		
		
		// Set things back to normal
		$symple_carousel_query = NULL;
		wp_reset_postdata();

		// Return data
		return $output; 
		
	}
	add_shortcode("symple_carousel", "symple_carousel_shortcode");
}
	
	
// FlexSlider -------------------------------------------------------------------------- >
if( !function_exists( 'symple_flexslider_shortcode' ) ) {

	function symple_flexslider_shortcode($atts) {
		
		// Define shortcode params
		extract( shortcode_atts( array(
				'unique_id'			=> '',
				'style'				=> 'images',
				'post_type'			=> 'post',
				'taxonomy'			=> '',
				'term_slug'			=> '',
				'count'				=> '4',
				'animation'			=> 'slide',
				'slideshow'			=> 'true',
				'randomize'			=> 'false',
				'direction'			=> 'horizontal',
				'slideshow_speed'	=> '7000',
				'animation_speed'	=> '600',			
				'control_nav'		=> 'true',
				'direction_nav'		=> 'true',
				'pause_on_hover'	=> 'true',
				'smooth_height'		=> 'true',
				'order'				=> 'DESC',
				'orderby'			=> 'date',
				'thumbnail_link'	=> 'post',
				'img_crop'			=> 'false',
				'img_width'			=> '980',
				'img_height'		=> '400',
				'title'				=> 'true',
				'filter_content'	=> 'false',
				'offset'			=> 0,
				'taxonomy'			=> '',
				'terms'				=>'',
			), $atts ) );
			
		$output = '';
		
		// Too many!!
		if (strpos( $post_type, ',' ) !== false) return __( 'Please select only 1 post type.', 'text_domain' );
		
		// Post Type doesn't exist, get me out of here!
		if ( ! post_type_exists( $post_type ) ) return __( 'Sorry the post type you have selected does not exist', 'text_domain' );
		
		// Required Scripts
		wp_enqueue_script( 'flexslider' );
		
		// Give flexslider a unique name
		$rand_num 			= rand(1, 100);
		$unique_flexslider_id = 'flexslider-'. $rand_num;
		
		// Output filter JS into the footer like a WP Jedi Master
		$output .='
			<script type="text/javascript">
				jQuery(function($){
					$(window).load(function() {
						$(".symple-flexslider-wrap").removeClass("flexslider-loader");
						$("#'. $unique_flexslider_id .'").flexslider({
							animation: "'. $animation .'",
							slideshow : '. $slideshow .',
							randomize : '. $randomize .',
							direction: "'. $direction .'",
							slideshowSpeed: '. $slideshow_speed .',
							animationSpeed: '. $animation_speed .',
							controlNav : '. $control_nav .',
							directionNav: '. $direction_nav .',
							pauseOnHover: '. $pause_on_hover .',
							smoothHeight: '. $smooth_height .',
							prevText : \'<i class=icon-angle-left"></i>\',
							nextText : \'<i class="icon-angle-right"></i>\'
						});
					});
				});
			</script>';

		// Start Tax Query
		$tax_query = '';
		if( $taxonomy !== '' && $term_slug !== '' ) {
			if ( ! taxonomy_exists($taxonomy) ) return __( 'Your selected taxonomy does not exist', 'text_domain' );
			if ( ! term_exists( $term_slug, $taxonomy ) ) return __( 'Your selected term does not exist', 'text_domain' );
			$tax_query = array(
				array (
					'taxonomy'	=> $taxonomy,
					'field'		=> 'slug',
					'terms'		=> $term_slug,
				)
			);
		}
		
		// The Query
		$symple_flexslider_query = new WP_Query(
			array(
				'post_type'			=> $post_type,
				'posts_per_page'	=> $count,
				'offset'			=> $offset,
				'order'				=> $order,
				'orderby'			=> $orderby,
				'filter_content'	=> $filter_content,
				'no_found_rows'		=> true,
				'tax_query'			=> $tax_query,
				'meta_query' 		=> array(array('key' => '_thumbnail_id'))
			)
		);

		//Output posts
		if( $symple_flexslider_query->posts ) :
		
			$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
		
			// Main wrapper div
			$output .= '<div class="symple-flexslider-wrap clr symple-flexslider-'. $post_type .' flexslider-loader flexslider-style-'. $style .'"'. $unique_id  .'>';

				$output .= '<div id="'. $unique_flexslider_id .'" class="symple-flexslider flexslider"><ul class="slides">';
			
				// Loop through posts
				foreach ( $symple_flexslider_query->posts as $post ) :
				
					// Post VARS
					$postid 			= $post->ID;
					$featured_img_url	= wp_get_attachment_url( get_post_thumbnail_id( $postid ) );
					$featured_img		= wp_get_attachment_url( get_post_thumbnail_id( $postid ) );
					$url 				= get_permalink($postid);
					$post_title			= get_the_title($postid);
					
					// Load scripts
					if ( $thumbnail_link == 'lightbox' ) {
						wp_enqueue_script( 'magnific-popup' );
						wp_enqueue_script( 'symple_lightbox' );
					}
					
					// Crop featured images if necessary
					if( $img_crop == 'true' ) {
						require_once( plugin_dir_path( __FILE__ ) .'/functions/ssp-img-resize.php' );
						$thumbnail_hard_crop = $img_height == '9999' ? false : true;
						$featured_img = ssp_img_resize( $featured_img_url, $img_width, $img_height, $thumbnail_hard_crop );
					}
					
					// Media Wrap
					if( has_post_thumbnail($postid) ) {
		
						// Slide item start
						$output .= '<li class="symple-flexslider-slide slide">';
								$output .= '<div class="symple-flexslider-entry-media">';
								
									if ( $thumbnail_link == 'none' ) {
										$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
									} elseif ( $thumbnail_link == 'lightbox' ) {
										$output .= '<a href="'. $featured_img_url .'" title="'. $post_title .'" class="symple-flexslider-entry-img symple-shortcodes-lightbox">';
											$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
										$output .= '</a><!-- .symple-flexslider-entry-img -->';
									} else {
										$output .= '<a href="'. $url .'" title="'. $post_title .'" class="symple-flexslider-entry-img">';
											$output .= '<img src="'. $featured_img .'" alt="'. $post_title .'" />';
										$output .= '</a><!-- .symple-flexslider-entry-img -->';
									}
									
									if ( $title == 'true' && $post_title ) {
										$output .= '<div class="symple-flexslider-entry-title"><a href="'. $url .'" title="'. $post_title .'">'. $post_title .'</a></div>';
									}
									
								$output .= '</div>';
							
						// Close main wrap	
						$output .= '</li>';
					
					}
				
				// End foreach loop
				endforeach;
				
				// End UL
				$output .= '</ul>';
			
			// Close main wrap
			$output .= '</div></div><div class="symple-clear-floats"></div>';
		
		endif; // End has posts check
		
		
		// Set things back to normal
		$symple_flexslider_query = NULL;
		wp_reset_postdata();

		// Return data
		return $output; 
		
	}
	add_shortcode("symple_flexslider", "symple_flexslider_shortcode");
}




// Custom FlexSlider -------------------------------------------------------------------------- >
if( !function_exists( 'symple_flexslider_custom_shortcode' ) ) {

	function symple_flexslider_custom_shortcode( $atts, $content=NULL ) {
		
		// Define shortcode params
		extract( shortcode_atts( array(
				'unique_id'			=> '',
				'style'				=> 'content',
				'animation'			=> 'slide',
				'slideshow'			=> 'true',
				'randomize'			=> 'false',
				'direction'			=> 'horizontal',
				'slideshow_speed'	=> '7000',
				'animation_speed'	=> '600',			
				'control_nav'		=> 'true',
				'direction_nav'		=> 'true',
				'pause_on_hover'	=> 'true',
				'smooth_height'		=> 'true',
			), $atts ) );
			
		$output = '';
		
		// Required Scripts
		wp_enqueue_script( 'flexslider' );
		
		// Give flexslider a unique name
		$rand_num 			= rand(1, 100);
		$unique_flexslider_id = 'flexslider-'. $rand_num;
		
		// Output filter JS into the footer like a WP Jedi Master
		$output .='
		<script type="text/javascript">
			jQuery(function($){
				$(window).load(function() {
					$(".symple-flexslider-wrap").removeClass("flexslider-loader");
					$("#'. $unique_flexslider_id .'").flexslider({
						animation: "'. $animation .'",
						slideshow : '. $slideshow .',
						randomize : '. $randomize .',
						direction: "'. $direction .'",
						slideshowSpeed: '. $slideshow_speed .',
						animationSpeed: '. $animation_speed .',
						controlNav : '. $control_nav .',
						directionNav: '. $direction_nav .',
						pauseOnHover: '. $pause_on_hover .',
						smoothHeight: '. $smooth_height .',
						prevText : "&larr; '. __( 'Previous', 'text_domain' ) .'",
						nextText : "'. __( 'Next', 'text_domain' ) .' &rarr;"
					});
				});
			});
		</script>';
	
		$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
	
		// Main wrapper div
		$output .= '<div class="symple-flexslider-wrap clr flexslider-loader flexslider-style-'. $style .'"'. $unique_id  .'>';

			// Flex slider start
			$output .= '<div id="'. $unique_flexslider_id .'" class="symple-flexslider flexslider"><ul class="slides">';					
				
				// Slides will display here
				$output .= do_shortcode ( $content ); 
			
			// End UL
			$output .= '</ul>';
		
		// Close main wrap
		$output .= '</div></div><div class="symple-clear-floats"></div>';

		// Return data
		return $output; 
		
	}
	add_shortcode("symple_flexslider_custom", "symple_flexslider_custom_shortcode");
}


if ( !function_exists('symple_slide_shortcode')) {
	function symple_slide_shortcode( $atts, $content = NULL ) {
		$output = '<li class="symple-flexslider-slide slide">'. do_shortcode( $content ) .'</li>';
		return $output;
	}
	add_shortcode( 'symple_flex_slide', 'symple_slide_shortcode' );
}



// Carousel Custom -------------------------------------------------------------------------- >
if( !function_exists( 'symple_carousel_custom_shortcode' ) ) {

	function symple_carousel_custom_shortcode($atts, $content = NULL) {
		
		// Define shortcode params
		extract( shortcode_atts( array(
				'unique_id'			=> '',
				'item_width'		=> '400',
				'min_slides'		=> '1',
				'max_slides'		=> '3',
				'animation'			=> 'CSS',
				'auto_play'			=> 'false',
				'pager'				=> 'true',
				'arrows'			=> 'true',
			), $atts ) );
			
		$output = '';
		
		// Required Scripts
		wp_enqueue_script( 'caroufredsel' );
		
		// Give caroufredsel a unique name
		$rand_num 			= rand(1, 100);
		$unique_carousel_id = 'caroufredsel-'. $rand_num;
		
		// Output filter JS into the footer like a WP Jedi Master
		$output .='
			<script type="text/javascript">
				jQuery(function($){
					$(document).ready(function(){
						$("#'. $unique_carousel_id .'").carouFredSel({
							responsive : true,
							height: "variable",
							width : "100%",
							auto : '. $auto_play .',
							swipe : {
								onTouch: true,
								onMouse: true
							},';
							if ( $arrows == 'true' ) {
								$output .= 'prev : "#prev-'. $rand_num .'",';
    							$output .= 'next : "#next-'. $rand_num .'",';
							}
							if ( $pager == 'true' ) {
								$output .= 'pagination : "#pager-'. $rand_num .'",';
							}
							$output .='items : {
								width : '. $item_width .',
								height: "variable",
								visible : {
									min : '. $min_slides .',
									max : '. $max_slides .'
								}
							}
						});
					});
					$(window).load(function(){
						$(".symple-caroufredsel-wrap").animate({ opacity: 1 })
					});
				});
			</script>';
		
			$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
		
			// Main wrapper div
			$output .= '<div class="symple-caroufredsel-wrap clr"'. $unique_id  .'>';
			
				// Pagination
				if ( $pager == 'true' ) {
					$output .= '<div class="symple-caroufredsel-pag-wrap"><div id="pager-'. $rand_num .'" class="symple-caroufredsel-pag"></div></div>';
				}
				
				$output .= '<div class="symple-caroufredsel"><ul id="'. $unique_carousel_id .'">';
					
						// Output slides here
						$output .= do_shortcode( $content );
				
				// End UL
				$output .= '</ul>';
				
				// Next/Prev arrows	
				if ( $arrows == 'true' ) {
					$output .= '<div id="prev-'. $rand_num .'" class="symple-caroufredsel-prev">Prev</div><div id="next-'. $rand_num .'" class="symple-caroufredsel-next">Next</div>';
				}
			
			// Close main wrap
			$output .= '</div></div><div class="symple-clear-floats"></div>';
		// Return data
		return $output; 
		
	}
	add_shortcode("symple_carousel_custom", "symple_carousel_custom_shortcode");
}

if ( !function_exists('symple_slide_carousel_shortcode')) {
	function symple_slide_carousel_shortcode( $atts, $content = NULL ) {
		$output = '<li class="symple-caroufredsel-slide"><div class="symple-caroufredsel-entry-media">'. do_shortcode( $content ) .'</div></li>';
		return $output;
	}
	add_shortcode( 'symple_carousel_slide', 'symple_slide_carousel_shortcode' );
}


// Attachments Carousel -------------------------------------------------------------------------- >
if( !function_exists( 'symple_attachments_carousel_shortcode' ) ) {

	function symple_attachments_carousel_shortcode($atts) {
		
		// Define shortcode params
		extract( shortcode_atts( array(
				'unique_id'			=> '',
				'image_ids'			=> '',
				'item_width'		=> '400',
				'min_slides'		=> '1',
				'max_slides'		=> '3',
				'animation'			=> 'CSS',
				'auto_play'			=> 'false',
				'pager'				=> 'true',
				'arrows'			=> 'true',
				'order'				=> 'DESC',
				'orderby'			=> 'menu_order',
				'thumbnail_link'	=> 'lightbox',
				'img_crop'			=> 'true',
				'img_width'			=> '400',
				'img_height'		=> '300',
				'title'				=> 'true',
			), $atts ) );
			
		$output = '';
		
		// Required Scripts
		wp_enqueue_script( 'caroufredsel' );
		
		// Give caroufredsel a unique name
		$rand_num 			= rand(1, 100);
		$unique_carousel_id = 'caroufredsel-'. $rand_num;
		
		// Output filter JS into the footer like a WP Jedi Master
		$output .='
			<script type="text/javascript">
				jQuery(function($){
					$(document).ready(function(){
						$("#'. $unique_carousel_id .'").carouFredSel({
							responsive : true,
							height: "variable",
							width : "100%",
							auto : '. $auto_play .',
							swipe : {
								onTouch: true,
								onMouse: true
							},';
							if ( $arrows == 'true' ) {
								$output .= 'prev : "#prev-'. $rand_num .'",';
    							$output .= 'next : "#next-'. $rand_num .'",';
							}
							if ( $pager == 'true' ) {
								$output .= 'pagination : "#pager-'. $rand_num .'",';
							}
							$output .='items : {
								width : '. $item_width .',
								height: "variable",
								visible : {
									min : '. $min_slides .',
									max : '. $max_slides .'
								}
							}
						});
					});
					$(window).load(function(){
						$(".symple-caroufredsel-wrap").animate({ opacity: 1 })
					});
				});
			</script>';
		
		// Get specific ID's
		$include = $post_in = NULL;
		$post_parent = get_the_ID();
		if ( $image_ids ) {
			$post_parent = NULL;
			$post_in = explode(",",$image_ids);
			$post_in = array_combine($post_in,$post_in);
		}
		
		// The Query
		$attachments = get_posts( array(		
			'orderby'			=> $order,
			'order' 			=> $orderby,
			'post_type' 		=> 'attachment',
			'post_parent' 		=> $post_parent,
			'post_mime_type' 	=> 'image',
			'post_status' 		=> null,
			'posts_per_page'	=> -1,
			'post__in' 			=> $post_in,
		) );

		//Output posts
		if( $attachments ) :
		
			$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
		
			// Main wrapper div
			$output .= '<div class="symple-caroufredsel-wrap clr symple-caroufredsel-attachments"'. $unique_id  .'>';
			
				// Pager
				if ( $pager == 'true' ) {
					$output .= '<div class="symple-caroufredsel-pag-wrap"><div id="pager-'. $rand_num .'" class="symple-caroufredsel-pag"></div></div>';
				}
				
				$output .= '<div class="symple-caroufredsel"><ul id="'. $unique_carousel_id .'">';
			
				// Loop through attachments
				foreach ( $attachments as $attachment ) :
				
					// Attachment VARS
					$attachment_id		= $attachment->ID ;
					$attachment_link	= get_post_meta( $attachment_id, '_wp_attachment_url', true );
					$attachment_img_url	= wp_get_attachment_url( $attachment_id );
					$attachment_img		= wp_get_attachment_url( $attachment_id );
					$attachment_alt		= get_the_title($attachment_id);
					$attachment_title	= $attachment->post_title;
					
					// Load scripts
					if ( $thumbnail_link == 'lightbox' ) {
						wp_enqueue_script( 'magnific-popup' );
						wp_enqueue_script( 'symple_lightbox' );
					}
					
					// Crop featured images if necessary
					if( $img_crop == 'true' ) {
						require_once( plugin_dir_path( __FILE__ ) .'/functions/ssp-img-resize.php' );
						$thumbnail_hard_crop = $img_height == '9999' ? false : true;
						$attachment_img = ssp_img_resize( $attachment_img, $img_width, $img_height, $thumbnail_hard_crop );
					}
		
					// Carousel item start
					$output .= '<li class="symple-caroufredsel-slide">';
					
						// Media Wrap
						$output .= '<div class="symple-caroufredsel-entry-media">';
						
							if ( $thumbnail_link == 'lightbox' ) {
								$output .= '<a href="'. $attachment_img_url .'" title="'. $attachment_title .'" class="symple-caroufredsel-entry-img symple-shortcodes-lightbox">';
									$output .= '<img src="'. $attachment_img .'" alt="'. $attachment_alt .'" />';
								$output .= '</a><!-- .symple-caroufredsel-entry-img -->';
							} else {
								$output .= '<img src="'. $attachment_img .'" alt="'. $attachment_alt .'" />';
							}
							
							if ( $title == 'true' && $attachment_title ) {
								if ( $attachment_link ) {
								$output .= '<div class="symple-caroufredsel-entry-title"><a href="'. $attachment_link .'" title="'. $attachment_title .'">'. $attachment_title .'</a></div>';
								} else {
									$output .= '<div class="symple-caroufredsel-entry-title">'. $attachment_title .'</div>';
								}
							}
							
						$output .= '</div>';
						
					// Close main wrap	
					$output .= '</li>';
				
				// End foreach loop
				endforeach;
				
				// End UL
				$output .= '</ul>';
				
				// Next/Prev arrows	
				if ( $arrows == 'true' ) {
					$output .= '<div id="prev-'. $rand_num .'" class="symple-caroufredsel-prev">Prev</div><div id="next-'. $rand_num .'" class="symple-caroufredsel-next">Next</div>';
				}
			
			// Close main wrap
			$output .= '</div></div><div class="symple-clear-floats"></div>';
		
		endif; // End has attachments check
		
		// Reset query
		wp_reset_postdata();

		// Return data
		return $output; 
		
	}
	add_shortcode("symple_attachments_carousel", "symple_attachments_carousel_shortcode");
}


// Attachments / FlexSlider -------------------------------------------------------------------------- >
if( !function_exists( 'symple_attachments_flexslider_shortcode' ) ) {

	function symple_attachments_flexslider_shortcode($atts) {
		
		// Define shortcode params
		extract( shortcode_atts( array(
				'unique_id'			=> '',
				'style'				=> 'images',
				'image_ids'			=> '',
				'animation'			=> 'slide',
				'slideshow'			=> 'true',
				'randomize'			=> 'false',
				'direction'			=> 'horizontal',
				'slideshow_speed'	=> '7000',
				'animation_speed'	=> '600',			
				'control_nav'		=> 'true',
				'direction_nav'		=> 'true',
				'pause_on_hover'	=> 'true',
				'smooth_height'		=> 'true',
				'order'				=> 'DESC',
				'orderby'			=> 'date',
				'thumbnail_link'	=> 'lightbox',
				'img_crop'			=> 'false',
				'img_width'			=> '980',
				'img_height'		=> '400',
				'title'				=> 'true',
				'filter_content'	=> 'false',
				'offset'			=> 0,
			), $atts ) );
			
		$output = '';
		
		// Required Scripts
		wp_enqueue_script( 'flexslider' );
		
		// Give flexslider a unique name
		$rand_num 				= rand(1, 100);
		$unique_flexslider_id	= 'flexslider-'. $rand_num;
		
		// Output filter JS into the footer like a WP Jedi Master
		$output .='
			<script type="text/javascript">
				jQuery(function($){
					$(window).load(function() {
						$(".symple-flexslider-wrap").removeClass("flexslider-loader");
						$("#'. $unique_flexslider_id .'").flexslider({
							animation: "'. $animation .'",
							slideshow : '. $slideshow .',
							randomize : '. $randomize .',
							direction: "'. $direction .'",
							slideshowSpeed: '. $slideshow_speed .',
							animationSpeed: '. $animation_speed .',
							controlNav : '. $control_nav .',
							directionNav: '. $direction_nav .',
							pauseOnHover: '. $pause_on_hover .',
							smoothHeight: '. $smooth_height .',
							prevText : \'<i class=icon-angle-left"></i>\',
							nextText : \'<i class="icon-angle-right"></i>\'
						});
					});
				});
			</script>';
		
		// Get specific ID's
		$include = NULL;
		$post_parent = get_the_ID();
		if ( $image_ids ) {
			$post_parent = NULL;
			$post_in = explode(",",$image_ids);
			$post_in = array_combine($post_in,$post_in);
		}
		
		// The Query
		$attachments = get_posts( array(		
			'orderby'			=> $order,
			'order' 			=> $orderby,
			'post_type' 		=> 'attachment',
			'post_parent' 		=> $post_parent,
			'post_mime_type' 	=> 'image',
			'post_status' 		=> null,
			'posts_per_page'	=> -1,
			'post__in' 			=> $post_in,
		) );

		//Output posts
		if( $attachments ) :
		
			$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
		
			// Main wrapper div
			$output .= '<div class="symple-flexslider-wrap clr symple-flexslider-attachments flexslider-loader flexslider-style-'. $style .'"'. $unique_id  .'>';

				$output .= '<div id="'. $unique_flexslider_id .'" class="symple-flexslider flexslider"><ul class="slides">';
			
				// Loop through attachments
				foreach ( $attachments as $attachment ) :
				
					// Attachment VARS
					$attachment_id		= $attachment->ID ;
					$attachment_link	= get_post_meta( $attachment_id, '_wp_attachment_url', true );
					$attachment_img_url	= wp_get_attachment_url( $attachment_id );
					$attachment_img		= wp_get_attachment_url( $attachment_id );
					$attachment_alt		= get_the_title($attachment_id);
					$attachment_title	= $attachment->post_title;
					
					// Load scripts
					if ( $thumbnail_link == 'lightbox' ) {
						wp_enqueue_script( 'magnific-popup' );
						wp_enqueue_script( 'symple_lightbox' );
					}
					
					// Crop featured images if necessary
					if( $img_crop == 'true' ) {
						require_once( plugin_dir_path( __FILE__ ) .'/functions/ssp-img-resize.php' );
						$thumbnail_hard_crop = $img_height == '9999' ? false : true;
						$attachment_img = ssp_img_resize( $attachment_img, $img_width, $img_height, $thumbnail_hard_crop );
					}
		
					// Slide item start
					$output .= '<li class="symple-flexslider-slide slide">';
					
							$output .= '<div class="symple-flexslider-entry-media">';
							
								if ( $thumbnail_link == 'lightbox' ) {
									$output .= '<a href="'. $attachment_img_url .'" title="'. $attachment_title .'" class="symple-flexslider-entry-img symple-shortcodes-lightbox">';
										$output .= '<img src="'. $attachment_img .'" alt="'. $attachment_alt .'" />';
									$output .= '</a><!-- .symple-flexslider-entry-img -->';
								} else {
									$output .= '<img src="'. $attachment_img .'" alt="'. $attachment_alt .'" />';
								}
								
								if ( $title == 'true' && $attachment_title ) {
									$output .= '<div class="symple-flexslider-entry-title">'. $attachment_title .'</div>';
								}
								
							$output .= '</div>';
						
					// Close main wrap
					$output .= '</li>';
				
				// End foreach loop
				endforeach;
				
				// End UL
				$output .= '</ul>';
			
			// Close main wrap
			$output .= '</div></div><div class="symple-clear-floats"></div>';
		
		endif; // End has posts check
		
		// Reset query
		wp_reset_postdata();

		// Return data
		return $output; 
		
	}
	add_shortcode("symple_attachments_flexslider", "symple_attachments_flexslider_shortcode");
}


// Font Awesome -------------------------------------------------------------------------- >
if ( !function_exists('symple_icon_shortcode')) {
	function symple_icon_shortcode( $atts, $content = NULL ) {
		
		extract( shortcode_atts( array(
				'unique_id'		=> '',
				'icon'			=> 'cloud',
				'style'			=> 'circle',
				'float'			=> 'left',
				'size'			=> 'normal',
				'color'			=> '#fff',
				'background'	=> '#000',
				'border_radius'	=> '99px',
				'fade_in'		=> 'false',
		), $atts ) );
		
		wp_enqueue_style('symple_shortcode_font_awesome');
		
		$fade_in_class = NULL;
		if ( $fade_in == 'true' ) {
			wp_enqueue_script('symple_scroll_fade');
			$fade_in_class = 'symple-fadein';
		}
		
		$icon = ( $icon == 'none' ) ? 'remove' : $icon;
		
		$color			= 'color:'. $color .';';
		$background		= 'background-color:'. $background .';';
		$border_radius	= 'border-radius:'. $border_radius .';';
		
		$unique_id = $unique_id ? ' id="'. $unique_id .'"' : NULL;
			
		$output = '<i class="symple-icon symple-icon-'. $style.' symple-icon-'. $size .' symple-icon-float-'. $float .' icon-'. $icon .' '. $fade_in_class .'"'. $unique_id.' style="'. $background . $color . $border_radius .'"></i>';
		
		return $output;
	}
	add_shortcode( 'symple_icon', 'symple_icon_shortcode' );
}
?>