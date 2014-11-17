<?php
/**
 * This file is used to extend the Visual Composer
 * Adds all symple shortcodes to the visual composer plugin
 * http://codecanyon.net/item/visual-composer-for-wordpress/242431
 */

if ( function_exists( 'vc_map' ) ) :


	// Load some CSS to style the visual composer symple shortcode items
	add_action( 'admin_head', 'symple_visual_composer_css' );
	if ( ! function_exists( 'symple_visual_composer_css' ) ) {
		function symple_visual_composer_css() { ?>
        	<?php $icons = array( 'spacing', 'bullets', 'background', 'button', 'box', 'callout', 'divider', 'heading', 'highlight', 'skillbar', 'social', 'testimonial', 'wpml', 'pricing', 'posts_grid', 'news', 'carousel', 'flexslider', 'attachments_flexslider', 'attachments_carousel', 'icon' ); ?>
			<style>
				body .wpb_content_element > .wpb_element_wrapper { height: auto; }
				body .wpb_element_wrapper div p:last-child { margin: 0; }
				<?php foreach ( $icons as $icon ) { ?>
					body .wpb_bootstrap_modals .icon-wpb-symple-<?php echo $icon; ?> { background: url(<?php echo plugins_url( 'visual-composer/icons/'. $icon .'.png', dirname( __FILE__ ) ); ?>); }
					body .wpb_symple_<?php echo $icon; ?> .wpb_element_wrapper { background-image: url(<?php echo plugins_url( 'visual-composer/icons-large/'. $icon .'.png', dirname( __FILE__ ) ); ?>); }
					body .wpb_symple_<?php echo $icon; ?> .wpb_element_wrapper div { display: block; float: left; margin-right: 10px; margin-top: 10px; color: #999; border: 2px solid #eee; padding: 3px 6px; }
				<?php } ?>
			</style>
		<?php }
	}
	
	if ( function_exists( 'lsSliders' ) ) {
		//$layer_sliders = lsSliders( $limit = 50, $desc = true, $withData = true );
		// Layer Slider -------------------------------------------------------------------------- >
		vc_map( array(
			"name"				=> __( "LayerSlider", 'text_domain' ),
			"base"				=> "layerslider",
			"class"				=> "",
			"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
			'admin_enqueue_js'	=> "",
			'admin_enqueue_css'	=> "",
			"icon" 				=> "icon-wpb-symple-layerslider",
			"params"			=> array(
				array(
					"type"			=> "textfield",
					"holder"		=> "div",
					"class"			=> "",
					"heading"		=> __( "Enter your slider ID", 'text_domain' ),
					"param_name"	=> "id",
					"value"			=> "1",
					"description"	=> ""
				),
			)
		) );
	
	}


	// Spacing -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Spacing", 'text_domain' ),
		"base"				=> "symple_spacing",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-spacing",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Spacing", 'text_domain' ),
				"param_name"	=> "size",
				"value"			=> "30px",
				"description"	=> __( "Enter a height in pixels for your spacing.", 'text_domain' )
			),
		)
	) );
	
	
	// Bullets -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Bullets", 'text_domain' ),
		"base"				=> "symple_bullets",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes' , 'text_domain'),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-bullets",
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Style", 'text_domain' ),
				"param_name"	=> "style",
				"value"			=> array(
					 __( "Check", "text_domain")	=> "check",
					 __( "Blue", "text_domain" )	=> "blue",
					 __( "Gray", "text_domain" )	=> "gray",
					 __( "Purple", "text_domain" )	=> "purple",
					 __( "Red", "text_domain" )		=> "red",
				),
				"description"	=> __( "Select your bullet style.", 'text_domain' )
			),
			array(
				"type"			=> "textarea_html",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "List", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> "<ul><li>List 1</li><li>List 2</li><li>List 3</li><li>List 4</li></ul>",
				"description"	=> __( "Insert your unordered list here.", 'text_domain' )
			),
		)
	) );
	
	
	// Background Area -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Background Area", 'text_domain' ),
		"base"				=> "symple_background",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-background",
		"params"			=> array(
			array(
				"type"			=> "colorpicker",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Background Color", 'text_domain' ),
				"param_name"	=> "background_color",
				"value"			=> "#fff",
				"description"	=> __( "Background Color (Hex)", 'text_domain' ),
			),
			array(
				"type"			=> "colorpicker",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Text Color", 'text_domain' ),
				"param_name"	=> "text_color",
				"value"			=> "#000",
				"description"	=> __( "Text Color (Hex)", 'text_domain' ),
			),
			array(
				"type"			=> "attach_image",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Background Image", 'text_domain' ),
				"param_name"	=> "background_image",
				"value"			=> "",
				"description"	=> __( "Upload a custom background image.", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Background Style", 'text_domain' ),
				"param_name"	=> "background_style",
				"description"	=> __( "Select a background style.", 'text_domain' ),
				"value"			=> array(
					 __( "Parallax", "text_domain")	=> "parallax",
					 __( "Fixed", "text_domain" )	=> "fixed",
					 __( "Repeat", "text_domain" )	=> "repeat",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Center Content", 'text_domain' ),
				"param_name"	=> "center_content",
				"description"	=> __( "Center inner content?", 'text_domain' ),
				"value"			=> array(
					 __( "True", "text_domain")	=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Padding Top", 'text_domain' ),
				"param_name"	=> "padding_top",
				"value"			=> "40px",
				"description"	=> __( "Increase the bacground padding above your content.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Padding Bottom", 'text_domain' ),
				"param_name"	=> "padding_bottom",
				"value"			=> "40px",
				"description"	=> __( "Increase the bacground padding below your content.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Margin Top", 'text_domain' ),
				"param_name"	=> "margin_top",
				"value"			=> "0px",
				"description"	=> __( "Add space above your content with a top margin.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Margin Bottom", 'text_domain' ),
				"param_name"	=> "margin_bottom",
				"value"			=> "0px",
				"description"	=> __( "Add space below your content with a top margin.", 'text_domain' ),
			),
			array(
				"type"			=> "textarea_html",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Content", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> __( "Enter your content here.", 'text_domain' ),
				"description"	=> __( "Add your content here.", 'text_domain' )
			),
		)
	) );	
	
	
	// Buttons -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Button", 'text_domain' ),
		"base"				=> "symple_button",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-button",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "URL", 'text_domain' ),
				"param_name"	=> "url",
				"value"			=> "http://www.google.com/",
				"description"	=> __( "Button URL", 'text_domain' )
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Content", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> "Button Text",
				"description"	=> __( "Button\'s Text", 'text_domain' )
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Link Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> "Visit Site",
				"description"	=> __( "Add A Link Title", 'text_domain' )
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button Color", 'text_domain' ),
				"param_name"	=> "color",
				"description"	=> __( "Select a button color.", 'text_domain' ),
				"value"			=> array(
					 __( "Black", "text_domain")	=> "black",
					 __( "Blue", "text_domain" )	=> "blue",
					 __( "Brown", "text_domain" )	=> "brown",
					 __( "Grey", "text_domain" )	=> "grey",
					 __( "Green", "text_domain" )	=> "green",
					 __( "Gold", "text_domain" )	=> "gold",
					 __( "Orange", "text_domain" )	=> "orange",
					 __( "Pink", "text_domain" )	=> "pink",
					 __( "Red", "text_domain" )		=> "red",
					 __( "Rosy", "text_domain" )	=> "rosy",
					 __( "Teal", "text_domain" )	=> "teal",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button Size", 'text_domain' ),
				"param_name"	=> "size",
				"description"	=> __( "Select a button size.", 'text_domain' ),
				"value"			=> array(
					 __( "Small", "text_domain")	=> "small",
					 __( "Medium", "text_domain" )	=> "medium",
					 __( "Large", "text_domain" )	=> "large",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Border Radius", 'text_domain' ),
				"param_name"	=> "border_radius",
				"value"			=> "3px",
				"description"	=> __( "Border Radius", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Link Target", 'text_domain' ),
				"param_name"	=> "target",
				"value"			=> array(
					 __( "Self", "text_domain")		=> "self",
					 __( "Blank", "text_domain" )	=> "blank",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Link Rel", 'text_domain' ),
				"param_name"	=> "rel",
				"value"			=> array(
					 __( "None", "text_domain")			=> "none",
					 __( "Nofollow", "text_domain" )	=> "nofollow",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Icon Left", 'text_domain' ),
				"param_name"	=> "icon_left",
				"description"	=> sprintf( __( 'Icon to the left of your button text. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Icon Right", 'text_domain' ),
				"param_name"	=> "icon_right",
				"description"	=> sprintf( __( 'Icon to the right of your button text. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
		)
	) );
	
	
	// Boxes -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Box", 'text_domain' ),
		"base"				=> "symple_box",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes' , 'text_domain'),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-box",
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Color", 'text_domain' ),
				"param_name"	=> "color",
				"value"			=> array(
					 __( "Black", "text_domain")	=> "black",
					 __( "Blue", "text_domain" )	=> "blue",
					 __( "Gray", "text_domain" )	=> "gray",
					 __( "Green", "text_domain" )	=> "green",
					 __( "Red", "text_domain" )		=> "red",
					 __( "Yellow", "text_domain" )	=> "yellow",
					 __( "White", "text_domain" )	=> "white",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Fade In", 'text_domain' ),
				"param_name"	=> "fade_in",
				"description"	=> __( "Fade In Animation", 'text_domain' ),
				"value"			=> array(
					 __( "True", "text_domain")	=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Float", 'text_domain' ),
				"param_name"	=> "float",
				"description"	=> __( "Select a box float.", 'text_domain' ),
				"value"			=> array(
					 __( "Center", "text_domain" )	=> "center",
					 __( "Left", "text_domain")		=> "left",
					 __( "Right", "text_domain" )	=> "right",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Text Alignment", 'text_domain' ),
				"param_name"	=> "text_align",
				"description"	=> __( "Select a text alignment", 'text_domain' ),
				"value"			=> array(
					 __( "Left", "text_domain")		=> "left",
					 __( "Center", "text_domain" )	=> "center",
					 __( "Right", "text_domain" )	=> "right",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Box Width", 'text_domain' ),
				"param_name"	=> "width",
				"value"			=> "100%",
				"description"	=> __( "Set a box width %.", 'text_domain' ),
			),
			array(
				"type"			=> "textarea_html",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Box Content", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> "This is your box content.",
			),
		)
	) );
	
	
	// Callouts -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Callout", 'text_domain' ),
		"base"				=> "symple_callout",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-callout",
		"params"			=> array(
			array(
				"type"			=> "textarea_html",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Callout Content", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> __( "Enter your content here.", 'text_domain' ),
				"description"	=> __( "Callout Content", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Fade In", 'text_domain' ),
				"param_name"	=> "fade_in",
				"description"	=> __( "Fade In Animation", 'text_domain' ),
				"value"			=> array(
					 __( "True", "text_domain")	=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: URL", 'text_domain' ),
				"param_name"	=> "button_url",
				"value"			=> "http://www.google.com/",
				"description"	=> __( "Button: URL", 'text_domain' )
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Text", 'text_domain' ),
				"param_name"	=> "button_text",
				"value"			=> "Button Text",
				"description"	=> __( "Button: Text", 'text_domain' )
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Color", 'text_domain' ),
				"param_name"	=> "button_color",
				"description"	=> __( "Select a button color.", 'text_domain' ),
				"value"			=> array(
					 __( "Black", "text_domain")	=> "black",
					 __( "Blue", "text_domain" )	=> "blue",
					 __( "Brown", "text_domain" )	=> "brown",
					 __( "Grey", "text_domain" )	=> "grey",
					 __( "Green", "text_domain" )	=> "green",
					 __( "Gold", "text_domain" )	=> "gold",
					 __( "Orange", "text_domain" )	=> "orange",
					 __( "Pink", "text_domain" )	=> "pink",
					 __( "Red", "text_domain" )		=> "red",
					 __( "Rosy", "text_domain" )	=> "rosy",
					 __( "Teal", "text_domain" )	=> "teal",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Size", 'text_domain' ),
				"param_name"	=> "button_size",
				"description"	=> __( "Select a button size.", 'text_domain' ),
				"value"			=> array(
					 __( "Small", "text_domain")	=> "small",
					 __( "Medium", "text_domain" )	=> "medium",
					 __( "Large", "text_domain" )	=> "large",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Border Radius", 'text_domain' ),
				"param_name"	=> "button_border_radius",
				"value"			=> "3px",
				"description"	=> __( "Button: Border Radius", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Link Target", 'text_domain' ),
				"param_name"	=> "button_target",
				"value"			=> array(
					 __( "Self", "text_domain")		=> "self",
					 __( "Blank", "text_domain" )	=> "blank",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Rel", 'text_domain' ),
				"param_name"	=> "button_rel",
				"value"			=> array(
					 __( "None", "text_domain")			=> "none",
					 __( "Nofollow", "text_domain" )	=> "nofollow",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Icon Left", 'text_domain' ),
				"param_name"	=> "button_icon_left",
				"description"	=> sprintf( __( 'Icon to the left of your button text. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Icon Right", 'text_domain' ),
				"param_name"	=> "button_icon_right",
				"description"	=> sprintf( __( 'Icon to the right of your button text. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
		)
	) );
	
	
	// Dividers -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Divider", 'text_domain' ),
		"base"				=> "symple_divider",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-divider",
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Style", 'text_domain' ),
				"param_name"	=> "style",
				"description"	=> __( "Select a divider style.", 'text_domain' ),
				"value"			=> array(
					 __( "Solid", "text_domain")	=> "solid",
					 __( "Dashed", "text_domain" )	=> "dashed",
					 __( "Dotted", "text_domain" )	=> "dotted",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Margin Top", 'text_domain' ),
				"param_name"	=> "margin_top",
				"value"			=> "20px",
				"description"	=> __( "Add space above your heading with a top margin.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Margin Bottom", 'text_domain' ),
				"param_name"	=> "margin_bottom",
				"value"			=> "20px",
				"description"	=> __( "Add space below your heading with a bottom margin.", 'text_domain' ),
			),
		)
	) );
	
	
	// Headings -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Heading", 'text_domain' ),
		"base"				=> "symple_heading",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-heading",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> "This is a Heading",
				"description"	=> __( "Enter a heading title.", 'text_domain' )
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Type", 'text_domain' ),
				"param_name"	=> "type",
				"value"			=> "h2",
				"description"	=> __( "Choose a heading type (h1, h2, h3, etc.)", 'text_domain' )
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Margin Top", 'text_domain' ),
				"param_name"	=> "margin_top",
				"value"			=> "30px",
				"description"	=> __( "Add space above your heading with a top margin.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Margin Bottom", 'text_domain' ),
				"param_name"	=> "margin_bottom",
				"value"			=> "30px",
				"description"	=> __( "Add space below your heading with a bottom margin.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Font Size", 'text_domain' ),
				"param_name"	=> "font_size",
				"value"			=> "",
				"description"	=> __( "Set a Font Size (in px).", 'text_domain' )
			),
			array(
				"type"			=> "colorpicker",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Heading Color", 'text_domain' ),
				"param_name"	=> "color",
				"value"			=> "#000",
				"description"	=> __( "Heading text color (Hex value).", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Heading Style", 'text_domain' ),
				"param_name"	=> "style",
				"description"	=> __( "Select a heading style.", 'text_domain' ),
				"value"			=> array(
					 __( "Double Line", "text_domain")	=> "double-line",
					 __( "Dashed Line", "text_domain" )	=> "dashed-line",
					 __( "Dotted Line", "text_domain" )	=> "dotted-line",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Text Alignment", 'text_domain' ),
				"param_name"	=> "text_align",
				"description"	=> __( "Select a text alignment", 'text_domain' ),
				"value"			=> array(
					 __( "Left", "text_domain")		=> "left",
					 __( "Center", "text_domain" )	=> "center",
					 __( "Right", "text_domain" )	=> "right",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Icon Left", 'text_domain' ),
				"param_name"	=> "icon_left",
				"description"	=> sprintf( __( 'Icon to the left of your heading text. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Icon Right", 'text_domain' ),
				"param_name"	=> "icon_right",
				"description"	=> sprintf( __( 'Icon to the right of your heading text. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
		)
	) );
	
	
	// Highlights -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Highlight", 'text_domain' ),
		"base"				=> "symple_highlight",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes' , 'text_domain'),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-highlight",
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Color", 'text_domain' ),
				"param_name"	=> "color",
				"value"			=> array(
					 __( "Blue", "text_domain" )	=> "blue",
					 __( "Green", "text_domain" )	=> "green",
					 __( "Gray", "text_domain" )	=> "gray",
					 __( "Red", "text_domain" )		=> "red",
					 __( "Yellow", "text_domain" )	=> "yellow",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Highlighted Text", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> "highlight me please",
				"description"	=> __( "Add the text to be highlighted.", 'text_domain' )
			),
		)
	) );
	
	
	// Skillbars -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Skillbar", 'text_domain' ),
		"base"				=> "symple_skillbar",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes' , 'text_domain'),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-skillbar",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> "Web Design",
				"description"	=> __( "Add your skillbar title.", 'text_domain' )
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Percentage", 'text_domain' ),
				"param_name"	=> "percentage",
				"value"			=> "70",
				"description"	=> __( "Add a percentage value.", 'text_domain' )
			),
			array(
				"type"			=> "colorpicker",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Background", 'text_domain' ),
				"param_name"	=> "color",
				"value"			=> "#65C25C",
				"description"	=> __( "Choose your custom background color (Hex value).", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display % Number", 'text_domain' ),
				"param_name"	=> "show_percent",
				"value"			=> array(
					 __( "True", "text_domain" )	=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
		)
	) );
	
	
	// Social -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Social", 'text_domain' ),
		"base"				=> "symple_social",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-social",
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Social Icon", 'text_domain' ),
				"param_name"	=> "icon",
				"description"	=> __( "Select your social icon.", 'text_domain' ),
				"value"			=> ssp_social_icons_array(),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "URL", 'text_domain' ),
				"param_name"	=> "url",
				"value"			=> "http://dribbble.com",
				"description"	=> __( "Social Profile URL", 'text_domain' )
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Link Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> "Visit Site",
				"description"	=> __( "Add A Social Link Title", 'text_domain' )
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Link Target", 'text_domain' ),
				"param_name"	=> "target",
				"value"			=> array(
					 __( "Self", "text_domain")		=> "self",
					 __( "Blank", "text_domain" )	=> "blank",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Link Rel", 'text_domain' ),
				"param_name"	=> "rel",
				"value"			=> array(
					 __( "None", "text_domain")			=> "none",
					 __( "Nofollow", "text_domain" )	=> "nofollow",
				),
			),
		)
	) );
	
	
	// Testimonials -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Testimonial", 'text_domain' ),
		"base"				=> "symple_testimonial",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-testimonial",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Author", 'text_domain' ),
				"param_name"	=> "by",
				"value"			=> "Unknown Person",
				"description"	=> __( "Testimonial Author", 'text_domain' )
			),
			array(
				"type"			=> "textarea_html",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Testimonial Content", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> __( "This product is amazing!", 'text_domain' ),
				"description"	=> __( "This is where your testimonial goes.", 'text_domain' )
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Fade In", 'text_domain' ),
				"param_name"	=> "fade_in",
				"description"	=> __( "Fade In Animation", 'text_domain' ),
				"value"			=> array(
					 __( "True", "text_domain")	=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
		)
	) );
	
	
	// WPML -------------------------------------------------------------------------- >
	/*if ( function_exists( 'icl_get_languages' ) ) {
		$ssp_wpml_type = 'dropdown';
		$ssp_wpml_value = icl_get_languages();
	} else {
		$ssp_wpml_type = 'textfield';
		$ssp_wpml_value = "es";
	}*/
	
	vc_map( array(
		"name"				=> __( "WPML", 'text_domain' ),
		"base"				=> "symple_wpml",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-wpml",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Language", 'text_domain' ),
				"param_name"	=> "lang",
				"value"			=> "es",
				"description"	=> __( "Select a WPML language.", 'text_domain' ),
			),
			array(
				"type"			=> "textarea_html",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Content", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> "Hola",
			),
		)
	) );
	
	
	// Pricing Tables -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Pricing Table", 'text_domain' ),
		"base"				=> "symple_pricing",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-pricing",
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Featured", 'text_domain' ),
				"param_name"	=> "featured",
				"value"			=> array(
					 __( "Yes", "text_domain")	=> "yes",
					 __( "No", "text_domain" )	=> "no",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Plan", 'text_domain' ),
				"param_name"	=> "plan",
				"value"			=> "Basic",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Cost", 'text_domain' ),
				"param_name"	=> "cost",
				"value"			=> "$20",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Per (optional)", 'text_domain' ),
				"param_name"	=> "per",
				"value"			=> "month",
			),
			array(
				"type"			=> "textarea_html",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Features", 'text_domain' ),
				"param_name"	=> "content",
				"value"			=> "<ul>
										<li>30GB Storage</li>
										<li>512MB Ram</li>
										<li>10 databases</li>
										<li>1,000 Emails</li>
										<li>25GB Bandwidth</li>
									</ul>",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Text", 'text_domain' ),
				"param_name"	=> "button_text",
				"value"			=> "Button Text",
				"description"	=> __( "Button: Text", 'text_domain' )
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: URL", 'text_domain' ),
				"param_name"	=> "button_url",
				"value"			=> "http://www.google.com/",
				"description"	=> __( "Button: URL", 'text_domain' )
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Color", 'text_domain' ),
				"param_name"	=> "button_color",
				"description"	=> __( "Select a button color.", 'text_domain' ),
				"value"			=> array(
					 __( "Black", "text_domain")	=> "black",
					 __( "Blue", "text_domain" )	=> "blue",
					 __( "Brown", "text_domain" )	=> "brown",
					 __( "Grey", "text_domain" )	=> "grey",
					 __( "Green", "text_domain" )	=> "green",
					 __( "Gold", "text_domain" )	=> "gold",
					 __( "Orange", "text_domain" )	=> "orange",
					 __( "Pink", "text_domain" )	=> "pink",
					 __( "Red", "text_domain" )		=> "red",
					 __( "Rosy", "text_domain" )	=> "rosy",
					 __( "Teal", "text_domain" )	=> "teal",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Size", 'text_domain' ),
				"param_name"	=> "button_size",
				"description"	=> __( "Select a button size.", 'text_domain' ),
				"value"			=> array(
					 __( "Small", "text_domain")	=> "small",
					 __( "Medium", "text_domain" )	=> "medium",
					 __( "Large", "text_domain" )	=> "large",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Border Radius", 'text_domain' ),
				"param_name"	=> "button_border_radius",
				"value"			=> "3px",
				"description"	=> __( "Button: Border Radius", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Link Target", 'text_domain' ),
				"param_name"	=> "button_target",
				"value"			=> array(
					 __( "Self", "text_domain")		=> "self",
					 __( "Blank", "text_domain" )	=> "blank",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Rel", 'text_domain' ),
				"param_name"	=> "button_rel",
				"value"			=> array(
					 __( "None", "text_domain")			=> "none",
					 __( "Nofollow", "text_domain" )	=> "nofollow",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Icon Left", 'text_domain' ),
				"param_name"	=> "button_icon_left",
				"description"	=> sprintf( __( 'Icon to the left of your button text. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Button: Icon Right", 'text_domain' ),
				"param_name"	=> "button_icon_right",
				"description"	=> sprintf( __( 'Icon to the right of your button text. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
		)
	) );
	
	
	// Posts Grid -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Post Grid", 'text_domain' ),
		"base"				=> "symple_posts_grid",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-posts_grid",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Unique Id", 'text_domain' ),
				"param_name"	=> "unique_id",
				"value"			=> "",
				"description"	=> __( "You can enter a unique ID here for styling purposes.", 'text_domain' ),
			),
			array(
				"type"			=> "posttypes",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Post Type (Only Select One)", 'text_domain' ),
				"param_name"	=> "post_type",
				"value"			=> "",
				"description"	=> __( "Select a post type to get posts from.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Taxonomy Name", 'text_domain' ),
				"param_name"	=> "taxonomy",
				"value"			=> "",
				"description"	=> __( "Select a custom taxonomy if you want to show items only from a specific taxonomy. Leave blank to display recent items from the whole post type. Ex: category", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Term Slug", 'text_domain' ),
				"param_name"	=> "term_slug",
				"value"			=> "",
				"description"	=> __( "Enter the Term slug to get your posts from. This term must be a part of the taxonomy above. You can find your slug on your taxonomy dashboard. For regular posts that would be the Categories page.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Post Count", 'text_domain' ),
				"param_name"	=> "count",
				"value"			=> "10",
				"description"	=> __( "How many items do you wish to show.", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Pagination", 'text_domain' ),
				"param_name"	=> "pagination",
				"description"	=> __( "Note: Pagination will not work on your homepage.", 'text_domain' ),
				"value"			=> array(
					 __( "False", "text_domain")	=> "false",
					 __( "True", "text_domain" )	=> "true",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Columns", 'text_domain' ),
				"param_name"	=> "columns",
				"value"			=> array(
					 __( "1", "text_domain")	=> "1",
					 __( "2", "text_domain" )	=> "2",
					 __( "3", "text_domain")	=> "3",
					 __( "4", "text_domain" )	=> "4",
					 __( "5", "text_domain")	=> "5",
					 __( "6", "text_domain" )	=> "6",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order", 'text_domain' ),
				"param_name"	=> "order",
				"description"	=> sprintf( __( 'Designates the ascending or descending order. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "DESC", "text_domain")	=> "DESC",
					 __( "ASC", "text_domain" )	=> "ASC",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order By", 'text_domain' ),
				"param_name"	=> "orderby",
				"description"	=> sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "Date", "text_domain")				=> "date",
					 __( "Name", "text_domain" )			=> "name",
					 __( "Modified", "text_domain")			=> "modified",
					 __( "Author", "text_domain" )			=> "author",
					 __( "Random", "text_domain")			=> "random",
					 __( "Comment Count", "text_domain" )	=> "comment_count",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Link", 'text_domain' ),
				"param_name"	=> "thumbnail_link",
				"value"			=> array(
					 __( "Post", "text_domain")			=> "post",
					 __( "None", "text_domain" )		=> "none",
					 __( "Lightbox", "text_domain" )	=> "lightbox",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Crop", 'text_domain' ),
				"param_name"	=> "img_crop",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Width", 'text_domain' ),
				"param_name"	=> "img_width",
				"value"			=> "450",
				"description"	=> __( "Enter a width in pixels.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Height", 'text_domain' ),
				"param_name"	=> "img_height",
				"value"			=> "350",
				"description"	=> __( 'Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Excerpt", 'text_domain' ),
				"param_name"	=> "excerpt",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Excerpt Length", 'text_domain' ),
				"param_name"	=> "excerpt_length",
				"value"			=> "30",
				"description"	=> __( "How many words do you want to display for your excerpt?", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Read More Link?", 'text_domain' ),
				"param_name"	=> "read_more",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),	
		)
	) );
	
	
	// Recent News -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Recent News", 'text_domain' ),
		"base"				=> "symple_news",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-news",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Unique Id", 'text_domain' ),
				"param_name"	=> "unique_id",
				"value"			=> "",
				"description"	=> __( "You can enter a unique ID here for styling purposes.", 'text_domain' ),
			),
			array(
				"type"			=> "posttypes",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Post Type (Only Select One)", 'text_domain' ),
				"param_name"	=> "post_type",
				"value"			=> "",
				"description"	=> __( "Select a post type to get posts from.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Header", 'text_domain' ),
				"param_name"	=> "header",
				"value"			=> "News",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Taxonomy Name", 'text_domain' ),
				"param_name"	=> "taxonomy",
				"value"			=> "",
				"description"	=> __( "Select a custom taxonomy if you want to show items only from a specific taxonomy. Leave blank to display recent items from the whole post type. Ex: category", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Term Slug", 'text_domain' ),
				"param_name"	=> "term_slug",
				"value"			=> "",
				"description"	=> __( "Enter the Term slug to get your posts from. This term must be a part of the taxonomy above. You can find your slug on your taxonomy dashboard. For regular posts that would be the Categories page.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Post Count", 'text_domain' ),
				"param_name"	=> "count",
				"value"			=> "3",
				"description"	=> __( "How many items do you wish to show.", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order", 'text_domain' ),
				"param_name"	=> "order",
				"description"	=> sprintf( __( 'Designates the ascending or descending order. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "DESC", "text_domain")		=> "DESC",
					 __( "ASC", "text_domain" )	=> "ASC",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order By", 'text_domain' ),
				"param_name"	=> "orderby",
				"description"	=> sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "Date", "text_domain")				=> "date",
					 __( "Name", "text_domain" )			=> "name",
					 __( "Modified", "text_domain")			=> "modified",
					 __( "Author", "text_domain" )			=> "author",
					 __( "Random", "text_domain")			=> "random",
					 __( "Comment Count", "text_domain" )	=> "comment_count",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Excerpt Length", 'text_domain' ),
				"param_name"	=> "excerpt_length",
				"value"			=> "30",
				"description"	=> __( "How many words do you want to display for your excerpt?", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Read More Link?", 'text_domain' ),
				"param_name"	=> "read_more",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),	
		)
	) );
	
	
	// Post Carousel -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Post Carousel", 'text_domain' ),
		"base"				=> "symple_carousel",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-carousel",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Unique Id", 'text_domain' ),
				"param_name"	=> "unique_id",
				"value"			=> "",
				"description"	=> __( "You can enter a unique ID here for styling purposes.", 'text_domain' ),
			),
			array(
				"type"			=> "posttypes",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Post Type (Only Select One)", 'text_domain' ),
				"param_name"	=> "post_type",
				"value"			=> "",
				"description"	=> __( "Select a post type to get posts from.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Taxonomy Name", 'text_domain' ),
				"param_name"	=> "taxonomy",
				"value"			=> "",
				"description"	=> __( "Select a custom taxonomy if you want to show items only from a specific taxonomy. Leave blank to display recent items from the whole post type. Ex: category", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Term Slug", 'text_domain' ),
				"param_name"	=> "term_slug",
				"value"			=> "",
				"description"	=> __( "Enter the Term slug to get your posts from. This term must be a part of the taxonomy above. You can find your slug on your taxonomy dashboard. For regular posts that would be the Categories page.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Post Count", 'text_domain' ),
				"param_name"	=> "count",
				"value"			=> "8",
				"description"	=> __( "How many items do you wish to show.", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order", 'text_domain' ),
				"param_name"	=> "order",
				"description"	=> sprintf( __( 'Designates the ascending or descending order. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "DESC", "text_domain")		=> "DESC",
					 __( "ASC", "text_domain" )	=> "ASC",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order By", 'text_domain' ),
				"param_name"	=> "orderby",
				"description"	=> sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "Date", "text_domain")				=> "date",
					 __( "Name", "text_domain" )			=> "name",
					 __( "Modified", "text_domain")			=> "modified",
					 __( "Author", "text_domain" )			=> "author",
					 __( "Random", "text_domain")			=> "random",
					 __( "Comment Count", "text_domain" )	=> "comment_count",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Item Width", 'text_domain' ),
				"param_name"	=> "item_width",
				"value"			=> "400",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Min Slides", 'text_domain' ),
				"param_name"	=> "min_slides",
				"value"			=> "1",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Max Slides", 'text_domain' ),
				"param_name"	=> "max_slides",
				"value"			=> "3",
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Auto Play", 'text_domain' ),
				"param_name"	=> "auto_play",
				"value"			=> array(
					 __( "True", "text_domain" )	=> "true",
					 __( "False", "text_domain")	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Pager?", 'text_domain' ),
				"param_name"	=> "pager",
				"value"			=> array(
					 __( "True", "text_domain" )	=> "true",
					 __( "False", "text_domain")	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Arrows?", 'text_domain' ),
				"param_name"	=> "arrows",
				"value"			=> array(
					 __( "True", "text_domain" )	=> "true",
					 __( "False", "text_domain")	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Link", 'text_domain' ),
				"param_name"	=> "thumbnail_link",
				"value"			=> array(
					 __( "Post", "text_domain")			=> "post",
					 __( "None", "text_domain" )		=> "none",
					 __( "Lightbox", "text_domain" )	=> "lightbox",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Crop", 'text_domain' ),
				"param_name"	=> "img_crop",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Width", 'text_domain' ),
				"param_name"	=> "img_width",
				"value"			=> "450",
				"description"	=> __( "Enter a width in pixels.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Height", 'text_domain' ),
				"param_name"	=> "img_height",
				"value"			=> "350",
				"description"	=> __( 'Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
		)
	) );
	
	
	// Post Slider -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Post Slider", 'text_domain' ),
		"base"				=> "symple_flexslider",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-flexslider",
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Unique Id", 'text_domain' ),
				"param_name"	=> "unique_id",
				"value"			=> "",
				"description"	=> __( "You can enter a unique ID here for styling purposes.", 'text_domain' ),
			),
			array(
				"type"			=> "posttypes",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Post Type (Only Select One)", 'text_domain' ),
				"param_name"	=> "post_type",
				"value"			=> "",
				"description"	=> __( "Select a post type to get posts from.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Taxonomy Name", 'text_domain' ),
				"param_name"	=> "taxonomy",
				"value"			=> "",
				"description"	=> __( "Select a custom taxonomy if you want to show items only from a specific taxonomy. Leave blank to display recent items from the whole post type. Ex: category", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Term Slug", 'text_domain' ),
				"param_name"	=> "term_slug",
				"value"			=> "",
				"description"	=> __( "Enter the Term slug to get your posts from. This term must be a part of the taxonomy above. You can find your slug on your taxonomy dashboard. For regular posts that would be the Categories page.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Post Count", 'text_domain' ),
				"param_name"	=> "count",
				"value"			=> "8",
				"description"	=> __( "How many items do you wish to show.", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order", 'text_domain' ),
				"param_name"	=> "order",
				"description"	=> sprintf( __( 'Designates the ascending or descending order. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "DESC", "text_domain")		=> "DESC",
					 __( "ASC", "text_domain" )	=> "ASC",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order By", 'text_domain' ),
				"param_name"	=> "orderby",
				"description"	=> sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "Date", "text_domain")				=> "date",
					 __( "Name", "text_domain" )			=> "name",
					 __( "Modified", "text_domain")			=> "modified",
					 __( "Author", "text_domain" )			=> "author",
					 __( "Random", "text_domain")			=> "random",
					 __( "Comment Count", "text_domain" )	=> "comment_count",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Link", 'text_domain' ),
				"param_name"	=> "thumbnail_link",
				"value"			=> array(
					 __( "Post", "text_domain")			=> "post",
					 __( "None", "text_domain" )		=> "none",
					 __( "Lightbox", "text_domain" )	=> "lightbox",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Crop", 'text_domain' ),
				"param_name"	=> "img_crop",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Width", 'text_domain' ),
				"param_name"	=> "img_width",
				"value"			=> "450",
				"description"	=> __( "Enter a width in pixels.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Height", 'text_domain' ),
				"param_name"	=> "img_height",
				"value"			=> "350",
				"description"	=> __( 'Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Animation", 'text_domain' ),
				"param_name"	=> "animation",
				"value"			=> array(
					 __( "Slide", "text_domain")	=> "slide",
					 __( "Fade", "text_domain" )	=> "fade",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Slideshow", 'text_domain' ),
				"param_name"	=> "slideshow",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Randomize", 'text_domain' ),
				"param_name"	=> "randomize",
				"value"			=> array(
					 __( "False", "text_domain" )	=> "false",
					 __( "True", "text_domain")		=> "true",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Control Nav", 'text_domain' ),
				"param_name"	=> "control_nav",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Direction Nav", 'text_domain' ),
				"param_name"	=> "direction_nav",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Slideshow Speed", 'text_domain' ),
				"param_name"	=> "slideshow_speed",
				"value"			=> "7000",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Animation Speed", 'text_domain' ),
				"param_name"	=> "animation_speed",
				"value"			=> "600",
			),
		)
	) );
	
		
	// Attachments Carousel -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Image Carousel", 'text_domain' ),
		"base"				=> "symple_attachments_carousel",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-attachments_carousel",
		"params"			=> array(
			array(
				"type"			=> "attach_images",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Attach Images", 'text_domain' ),
				"param_name"	=> "image_ids",
				"description"	=> __( "Attach images to your post.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Unique Id", 'text_domain' ),
				"param_name"	=> "unique_id",
				"value"			=> "",
				"description"	=> __( "You can enter a unique ID here for styling purposes.", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Pagination", 'text_domain' ),
				"param_name"	=> "pagination",
				"description"	=> __( "Note: Pagination will not work on your homepage.", 'text_domain' ),
				"value"			=> array(
					 __( "False", "text_domain")	=> "false",
					 __( "True", "text_domain" )	=> "true",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order", 'text_domain' ),
				"param_name"	=> "order",
				"description"	=> sprintf( __( 'Designates the ascending or descending order. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "DESC", "text_domain")		=> "DESC",
					 __( "ASC", "text_domain" )	=> "ASC",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Item Width", 'text_domain' ),
				"param_name"	=> "item_width",
				"value"			=> "400",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Min Slides", 'text_domain' ),
				"param_name"	=> "min_slides",
				"value"			=> "1",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Max Slides", 'text_domain' ),
				"param_name"	=> "max_slides",
				"value"			=> "3",
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Auto Play", 'text_domain' ),
				"param_name"	=> "auto_play",
				"value"			=> array(
					 __( "True", "text_domain" )	=> "true",
					 __( "False", "text_domain")	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Pager?", 'text_domain' ),
				"param_name"	=> "pager",
				"value"			=> array(
					 __( "True", "text_domain" )	=> "true",
					 __( "False", "text_domain")	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Arrows?", 'text_domain' ),
				"param_name"	=> "arrows",
				"value"			=> array(
					 __( "True", "text_domain" )	=> "true",
					 __( "False", "text_domain")	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Link", 'text_domain' ),
				"param_name"	=> "thumbnail_link",
				"value"			=> array(
					 __( "None", "text_domain" )		=> "none",
					 __( "Lightbox", "text_domain" )	=> "lightbox",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Crop", 'text_domain' ),
				"param_name"	=> "img_crop",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Width", 'text_domain' ),
				"param_name"	=> "img_width",
				"value"			=> "450",
				"description"	=> __( "Enter a width in pixels.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Height", 'text_domain' ),
				"param_name"	=> "img_height",
				"value"			=> "350",
				"description"	=> __( 'Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
		)
	) );
	
	
	// Attachments FlexSlider -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Image FlexSlider", 'text_domain' ),
		"base"				=> "symple_attachments_flexslider",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-attachments_flexslider",
		"params"			=> array(
			array(
				"type"			=> "attach_images",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Attach Images", 'text_domain' ),
				"param_name"	=> "image_ids",
				"description"	=> __( "Attach images to your post.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Unique Id", 'text_domain' ),
				"param_name"	=> "unique_id",
				"value"			=> "",
				"description"	=> __( "You can enter a unique ID here for styling purposes.", 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Order", 'text_domain' ),
				"param_name"	=> "order",
				"description"	=> sprintf( __( 'Designates the ascending or descending order. More at %s.', 'text_domain' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
				"value"			=> array(
					 __( "DESC", "text_domain" )	=> "DESC",
					 __( "ASC", "text_domain" )		=> "ASC",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Link", 'text_domain' ),
				"param_name"	=> "thumbnail_link",
				"value"			=> array(
					 __( "None", "text_domain" )		=> "none",
					 __( "Lightbox", "text_domain" )	=> "lightbox",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Crop", 'text_domain' ),
				"param_name"	=> "img_crop",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Width", 'text_domain' ),
				"param_name"	=> "img_width",
				"value"			=> "450",
				"description"	=> __( "Enter a width in pixels.", 'text_domain' ),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Thumbnail Height", 'text_domain' ),
				"param_name"	=> "img_height",
				"value"			=> "350",
				"description"	=> __( 'Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain' ),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Display Title", 'text_domain' ),
				"param_name"	=> "title",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Animation", 'text_domain' ),
				"param_name"	=> "animation",
				"value"			=> array(
					 __( "Slide", "text_domain")	=> "slide",
					 __( "Fade", "text_domain" )	=> "fade",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Slideshow", 'text_domain' ),
				"param_name"	=> "slideshow",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Randomize", 'text_domain' ),
				"param_name"	=> "randomize",
				"value"			=> array(
					 __( "False", "text_domain" )	=> "false",
					 __( "True", "text_domain")		=> "true",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Control Nav", 'text_domain' ),
				"param_name"	=> "control_nav",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Direction Nav", 'text_domain' ),
				"param_name"	=> "direction_nav",
				"value"			=> array(
					 __( "True", "text_domain")		=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Slideshow Speed", 'text_domain' ),
				"param_name"	=> "slideshow_speed",
				"value"			=> "7000",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Animation Speed", 'text_domain' ),
				"param_name"	=> "animation_speed",
				"value"			=> "600",
			),
		)
	) );

	
	// Icons -------------------------------------------------------------------------- >
	vc_map( array(
		"name"				=> __( "Icon", 'text_domain' ),
		"base"				=> "symple_icon",
		"class"				=> "",
		"category"			=> __( 'Symple Shortcodes', 'text_domain' ),
		'admin_enqueue_js'	=> "",
		'admin_enqueue_css'	=> "",
		"icon" 				=> "icon-wpb-symple-icon",
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Icon", 'text_domain' ),
				"param_name"	=> "icon",
				"description"	=> sprintf( __( 'Select a FontAwesome icon. See all the icons at %s', 'text_domain' ), '<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a>' ),
				"value"			=> ssp_font_icons_array(),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Icon Size", 'text_domain' ),
				"param_name"	=> "size",
				"description"	=> __( "Select an icon size.", 'text_domain' ),
				"value"			=> array(
					 __( "Extra Large", "text_domain" )	=> "xlarge",
					 __( "Large", "text_domain" )		=> "large",
					 __( "Normal", "text_domain" )		=> "normal",
					 __( "Small", "text_domain")		=> "small",
					 __( "Tiny", "text_domain" )		=> "tiny",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Fade In", 'text_domain' ),
				"param_name"	=> "fade_in",
				"description"	=> __( "Fade In Animation", 'text_domain' ),
				"value"			=> array(
					 __( "True", "text_domain")	=> "true",
					 __( "False", "text_domain" )	=> "false",
				),
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Float", 'text_domain' ),
				"param_name"	=> "float",
				"value"			=> array(
					 __( "Center", "text_domain" )	=> "center",
					 __( "Left", "text_domain")		=> "left",
					 __( "Right", "text_domain" )	=> "right",
				),
			),
			array(
				"type"			=> "colorpicker",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Icon Color", 'text_domain' ),
				"param_name"	=> "color",
				"value"			=> "#fff",
			),
			array(
				"type"			=> "colorpicker",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Background Color", 'text_domain' ),
				"param_name"	=> "background",
				"value"			=> "#000",
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __( "Border Radius", 'text_domain' ),
				"param_name"	=> "border_radius",
				"value"			=> "99px",
				"description"	=> __( "Change the background border radius (99px for a circle, down to 0px for a square)", 'text_domain' ),
			),
		)
	) );
	
	
endif; // end vc_map function check