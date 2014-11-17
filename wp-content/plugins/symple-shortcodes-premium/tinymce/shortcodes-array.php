<?php
/*
 * Symple Shortcodes Premium
 * @author WPExplorer.com
 * @copyright 2013
 *
*/

// Columns -------------------------------------------------------------------------- >
$symple_shortcodes['columns'] = array(
	'params'		=> array(),
	'shortcode'		=> ' {{child_shortcode}} ',
	'TB_title'		=> __('Insert Columns', 'text_domain'),
	'child_shortcode'	=> array(
		'params'		=> array(
			'size'		=> array(
				'type'		=> 'select',
				'label'		=> __('Size', 'text_domain'),
				'desc'		=> __('Select the width of the column.', 'text_domain'),
				'options'	=> array(
					'one-half'		=> '1/2',
					'one-third'		=> '1/3',
					'two-third'		=> '2/3',
					'one-fourth'	=> '1/4',
					'three-fourth'	=> '3/4',
					'one-fifth'		=> '1/5',
					'two-fifth'		=> '2/5',
					'three-fifth'	=> '3/5',
					'fourth-fifth'	=> '4/5',
					'one-sixth'		=> '1/6',
					'five-sixth'	=> '5/6',
				)
			),
			'position'	=> array(
				'type'		=> 'select',
				'label'		=> __('Position', 'text_domain'),
				'desc'		=> __('Is this a first, middle or last column?', 'text_domain'),
				'options'	=> array(
					'first'		=> 'first',
					'middle'	=> 'middle',
					'last'		=> 'last',
				)
			),
			'fade_in'	=> array(
				'desc'	=> '',
				'std'	=> 'false',
				'type'	=> 'select',
				'label'	=> __('Fade In', 'text_domain'),
				'options'	=> array (
					'false'	=> __('False', 'text_domain'),
					'true'	=> __('True', 'text_domain'),
				),
			),
			'content'	=> array(
				'std'	=> '',
				'type'	=> 'textarea',
				'label'	=> __('Column Content', 'text_domain'),
				'desc'	=> '',
			),
		),
		'shortcode'	=> '[symple_column size="{{size}}" position="{{position}}" fade_in="{{fade_in}}"] {{content}} [/symple_column]',
		'clone_button'	=> __('New Column', 'text_domain')
	)
);


// Spacing -------------------------------------------------------------------------- >
$symple_shortcodes['spacing'] = array(
	'params'	=> array(
		'size'	=> array(
			'std'	=> '30px',
			'type'	=> 'text',
			'label'	=> __('Size', 'text_domain'),
			'desc'	=> __('Enter a height in pixels for your spacing.', 'text_domain'),
		)
		
	),
	'shortcode'	=> '[symple_spacing size="{{size}}"]',
	'TB_title'	=> __('Insert Spacing', 'text_domain')
);


// Bullets -------------------------------------------------------------------------- >
$symple_shortcodes['bullets'] = array(
	'params'	=> array(
		'style'	=> array(
			'std'	=> 'check',
			'type'	=> 'select',
			'label'	=> __('Style', 'text_domain'),
			'desc'	=> '',
			'options'	=> array(
				'check'		=> 'check',
				'blue'		=> 'blue',
				'gray'		=> 'gray',
				'purple'	=> 'purple',
				'red'		=> 'red',
			),
		),
		
	),
	'shortcode'	=> '[symple_bullets style="{{style}}"]'. __( 'Insert your unordered list here', 'text_domain' ) .'[/symple_bullets]',
	'TB_title'	=> __('Insert Bullet', 'text_domain')
);


// Centered -------------------------------------------------------------------------- >
$symple_shortcodes['centered_container'] = array(
	'params'	=> array(
		'margin_top'	=> array(
				'std'	=> '0px',
				'type'	=> 'text',
				'label'	=> __('Margin Top', 'text_domain'),
				'desc'	=> '',
		),
		'margin_bottom'	=> array(
				'std'	=> '0px',
				'type'	=> 'text',
				'label'	=> __('Margin Bottom', 'text_domain'),
				'desc'	=> '',
		),
		'content'	=> array(
			'std'	=> '',
			'type'	=> 'textarea',
			'label'	=> __('Column Content', 'text_domain'),
			'desc'	=> '',
		),
	),
	'shortcode'	=> '[symple_container margin_top="{{margin_top}}" margin_bottom="{{margin_bottom}}"]{{content}}[/symple_container]',
	'TB_title'	=> __('Insert Centered Container', 'text_domain')
);


// Background Area -------------------------------------------------------------------------- >
$symple_shortcodes['background_area'] = array(
	'params'	=> array(
		'background_color'	=> array(
				'std'	=> '#000',
				'type'	=> 'text',
				'label'	=> __('Background Color (Hex)', 'text_domain'),
				'desc'	=> '',
		),
		'text_color'	=> array(
				'std'	=> '#fff',
				'type'	=> 'text',
				'label'	=> __('Text Color (Hex)', 'text_domain'),
				'desc'	=> __('This value might be easily overriten by the theme, so if this setting does not work you might have to add some custom css to your theme or  use the WP editor to alter the color of your elements.', 'text_domain'),
		),
		'background_image'	=> array(
				'std'	=> '',
				'type'	=> 'text',
				'label'	=> __('Background Image URL', 'text_domain'),
				'desc'	=> '',
		),
		'background_style' => array(
				'std'		=> '',
				'type'		=> 'select',
				'label'		=> __('Background Style', 'text_domain'),
				'desc'		=> '',
				'options'	=> array(
					'parallax'	=> 'parallax',
					'fixed'		=> 'fixed',
					'repeat'	=> 'repeat',
				),
		),
		'center_content' => array(
				'std'		=> '',
				'type'		=> 'select',
				'label'		=> __('Center Inner Content?', 'text_domain'),
				'desc'		=> '',
				'options'	=> array(
					'true'	=> 'true',
					'false'		=> 'false',
				),
		),
		'padding_top'	=> array(
				'std'	=> '40px',
				'type'	=> 'text',
				'label'	=> __('Padding Top', 'text_domain'),
				'desc'	=> '',
		),
		'padding_bottom'	=> array(
				'std'	=> '40px',
				'type'	=> 'text',
				'label'	=> __('Padding Bottom', 'text_domain'),
				'desc'	=> '',
		),
		'margin_top'	=> array(
				'std'	=> '0px',
				'type'	=> 'text',
				'label'	=> __('Margin Top', 'text_domain'),
				'desc'	=> '',
		),
		'margin_bottom'	=> array(
				'std'	=> '0px',
				'type'	=> 'text',
				'label'	=> __('Margin Bottom', 'text_domain'),
				'desc'	=> '',
		),
		'content'	=> array(
			'std'	=> '',
			'type'	=> 'textarea',
			'label'	=> __('Column Content', 'text_domain'),
			'desc'	=> '',
		),	
	),
	'shortcode'	=> '[symple_background background_color="{{background_color}}" background_image="{{background_image}}" background_style="{{background_style}}" center_content="{{center_content}}" text_color="{{text_color}}" padding_top="{{padding_top}}" padding_bottom="{{padding_bottom}}" margin_top="{{margin_top}}" margin_bottom="{{margin_bottom}}"]{{content}}[/symple_background]',
	'TB_title'	=> __('Insert Background Area', 'text_domain')
);


// Buttons -------------------------------------------------------------------------- >
$symple_shortcodes['button'] = array(
	'params'	=> array(
		'url'	=> array(
			'std'	=> 'http://www.google.com/',
			'type'	=> 'text',
			'label'	=> __('Button URL', 'text_domain'),
		),
		'content'	=> array(
			'std'	=> 'Button Text',
			'type'	=> 'text',
			'label'	=> __('Button\'s Text', 'text_domain'),
		),
		'title'	=> array(
			'std'	=> 'Visit Site',
			'type'	=> 'text',
			'label'	=> __('Link Title', 'text_domain'),
		),
		'color'	=> array(
			'type'	=> 'select',
			'label'	=> __('Button Style', 'text_domain'),
			'options'	=> array(
				'black'		=> __( 'Black', 'text_domain'),
				'blue'		=> __( 'Blue', 'text_domain'),
				'brown'		=> __( 'Brown', 'text_domain'),
				'grey'		=> __( 'Grey', 'text_domain'),
				'green'		=> __( 'Green', 'text_domain'),
				'gold'		=> __( 'Gold', 'text_domain'),
				'orange'	=> __( 'Orange', 'text_domain'),
				'pink'		=> __( 'Pink', 'text_domain'),
				'red'		=> __( 'Red', 'text_domain'),
				'rosy'		=> __( 'Rosy', 'text_domain'),
				'teal'		=> __( 'Teal', 'text_domain'),
				
			),
		),
		'size'	=> array(
			'type'	=> 'select',
			'label'	=> __('Button Size', 'text_domain'),
			'options'	=> array(
				'small'		=> __( 'Small', 'text_domain'),
				'medium'	=> __( 'Medium', 'text_domain'),
				'large'		=> __( 'Large', 'text_domain'),
			)
		),
		'border_radius'	=> array(
			'type'	=> 'text',
			'std'	=> '3px',
			'label'	=> __('Border Radius', 'text_domain'),
		),
		'target'		=> array(
			'type'		=> 'select',
			'label'		=> __('Link Target', 'text_domain'),
			'options'	=> array(
				'self'	=> 'Self',
				'blank'	=> 'Blank'
			)
		),
		'rel'		=> array(
			'type'		=> 'select',
			'label'		=> __('Rel', 'text_domain'),
			'options'	=> array(
				'none'	=> 'None',
				'nofollow'	=> 'Nofollow',
			)
		),
		'icon_left'		=> array(
			'type'		=> 'select',
			'label'		=> __('Icon Left', 'text_domain'),
			'options'	=> ssp_font_icons_array()
		),
		'icon_right'	=> array(
			'type'		=> 'select',
			'label'		=> __('Icon Right', 'text_domain'),
			'options'	=> ssp_font_icons_array()
		),		
	),
	'shortcode'	=> '[symple_button url="{{url}}" title="{{title}}" color="{{color}}" size="{{size}}" border_radius="{{border_radius}}" target="{{target}}" rel="{{rel}}" icon_left="{{icon_left}}" icon_right="{{icon_right}}"] {{content}} [/symple_button]',
	'TB_title'	=> __('Insert Button', 'text_domain')
);


// Boxes -------------------------------------------------------------------------- >
$symple_shortcodes['boxes'] = array(
	'params'	=> array(
		'color'	=> array(
			'type'	=> 'select',
			'label'	=> __('Color', 'text_domain'),
			'options'	=> array(
				'black'		=> 'Black',
				'blue'		=> 'Blue',
				'green'		=> 'Green',
				'gray'		=> 'Gray',
				'red'		=> 'Red',
				'yellow'	=> 'Yellow',
				'white'		=> 'White',
			)
		),
		'fade_in'	=> array(
			'std'	=> 'false',
			'type'	=> 'select',
			'label'	=> __('Fade In', 'text_domain'),
			'options'	=> array (
				'false'	=> __('False', 'text_domain'),
				'true'	=> __('True', 'text_domain'),
			),
		),
		'float'	=> array(
			'std'	=> 'center',
			'type'	=> 'select',
			'label'	=> __('Float', 'text_domain'),
			'options'	=> array (
				'center'	=> __('Center', 'text_domain'),
				'left'		=> __('Left', 'text_domain'),
				'right'		=> __('Right', 'text_domain'),
			),
		),
		'text_align'	=> array(
			'std'	=> 'left',
			'type'	=> 'select',
			'label'	=> __('Text Align', 'text_domain'),
			'options'	=> array (
				'left'		=> __('Left', 'text_domain'),
				'right'		=> __('Right', 'text_domain'),
				'center'	=> __('Center', 'text_domain'),
			),
		),
		'width'	=> array(
			'std'	=> '100%',
			'type'	=> 'text',
			'label'	=> __('Width', 'text_domain'),
		),
		'content'	=> array(
			'std'	=> '',
			'type'	=> 'textarea',
			'label'	=> __('Box Content', 'text_domain'),
		),
		
	),
	'shortcode'	=> '[symple_box color="{{color}}" fade_in="{{fade_in}}" float="{{float}}" text_align="{{text_align}}" width="{{width}}"] {{content}} [/symple_box]',
	'TB_title'	=> __('Insert Box', 'text_domain')
);


// Callout -------------------------------------------------------------------------- >
$symple_shortcodes['callout'] = array(
	'params'		=> array(
		'content'	=> array(
			'std'	=> 'Callout Content',
			'type'	=> 'textarea',
			'label'	=> __('Callout Content', 'text_domain'),
		),
		'fade_in'	=> array(
			'std'	=> 'false',
			'type'	=> 'select',
			'label'	=> __('Fade In', 'text_domain'),
			'options'	=> array (
				'false'	=> __('False', 'text_domain'),
				'true'	=> __('True', 'text_domain'),
			),
		),
		'button_text'	=> array(
			'std'	=> 'Button Text',
			'type'	=> 'text',
			'label'	=> __('Button: Text', 'text_domain'),
		),
		'button_url'	=> array(
			'std'	=> 'http://www.google.com/',
			'type'	=> 'text',
			'label'	=> __('Button: URL', 'text_domain'),
		),
		'button_color'	=> array(
			'type'	=> 'select',
			'label'	=> __('Button: Style', 'text_domain'),
			'options'	=> array(
				'black'		=> 'Black',
				'blue'		=> 'Blue',
				'brown'		=> 'Brown',
				'grey'		=> 'Grey',
				'green'		=> 'Green',
				'green'		=> 'Green',
				'gold'		=> 'Gold',
				'orange'	=> 'Orange',
				'pink'		=> 'Pink',
				'red'		=> 'Red',
				'rosy'		=> 'Rosy',
				'teal'		=> 'Teal',
				
			),
		),
		'button_size'	=> array(
			'type'	=> 'select',
			'label'	=> __('Button: Size', 'text_domain'),
			'options'	=> array(
				'default'	=> 'default',
				'small'		=> 'Small',
				'medium'	=> 'Medium',
				'large'		=> 'Large'
			)
		),
		'button_border_radius'	=> array(
			'type'	=> 'text',
			'std'	=> '3px',
			'label'	=> __('Button: Border Radius', 'text_domain'),
		),
		'button_target'	=> array(
			'type'	=> 'select',
			'label'	=> __('Button: Link Target', 'text_domain'),
			'options'	=> array(
				'self'	=> 'Self',
				'blank'	=> 'Blank'
			)
		),
		'button_rel'	=> array(
			'type'	=> 'select',
			'label'	=> __('Button: Rel', 'text_domain'),
			'options'	=> array(
				'none'		=> 'None',
				'nofollow'	=> 'Nofollow',
			)
		),
		'button_icon_left'	=> array(
			'type'		=> 'select',
			'label'		=> __('Button: Icon Left', 'text_domain'),
			'options'	=> ssp_font_icons_array()
		),
		'button_icon_right'	=> array(
			'type'		=> 'select',
			'label'		=> __('Button: Icon Right', 'text_domain'),
			'options'	=> ssp_font_icons_array()
		),
		
	),
	'shortcode'	=> '[symple_callout fade_in="{{fade_in}}" button_text="{{button_text}}" button_url="{{button_url}}" button_color="{{button_color}}" button_size="{{button_size}}" button_border_radius="{{button_border_radius}}" button_target="{{button_target}}" button_rel="{{button_rel}}" button_icon_left="{{button_icon_left}}" button_icon_right="{{button_icon_right}}"] {{content}} [/symple_callout]',
	'TB_title'	=> __('Insert Callout', 'text_domain')
);


// Dividers -------------------------------------------------------------------------- >
$symple_shortcodes['divider'] = array(
	'params'	=> array(
		'style'	=> array(
			'type'	=> 'select',
			'label'	=> __('Style', 'text_domain'),
			'options'	=> array(
				'solid'		=> 'solid',
				'dashed'	=> 'dashed',
				'double'	=> 'double',
			)
		),
		'margin_top'	=> array(
			'std'	=> '20px',
			'type'	=> 'text',
			'label'	=> __( 'Margin Top', 'text_domain' ),
		),
		'margin_bottom'	=> array(
			'std'	=> '20px',
			'type'	=> 'text',
			'label'	=> __( 'Margin Bottom', 'text_domain' ),
		)
		
	),
	'shortcode'	=> '[symple_divider style="{{style}}" margin_top="{{margin_top}}" margin_bottom="{{margin_bottom}}"]',
	'TB_title'	=> __('Insert Box', 'text_domain')
);


// GoogleMap -------------------------------------------------------------------------- >
$symple_shortcodes['googlemap'] = array(
	'params'	=> array(
		'title'	=> array(
			'type'	=> 'text',
			'std'	=> 'Welcome To Las Vegas',
			'label'	=> __('Title', 'text_domain'),
		),
		'location'	=> array(
			'type'	=> 'text',
			'std'	=> 'Las Vegas, Nevada',
			'label'	=> __('Location', 'text_domain'),
		),
		'height'	=> array(
			'type'	=> 'text',
			'std'	=> '300',
			'label'	=> __('Height', 'text_domain'),
		),
		'zoom'	=> array(
			'type'	=> 'text',
			'std'	=> '15',
			'label'	=> __('Zoom', 'text_domain'),
		),
		
	),
	'shortcode'	=> '[symple_googlemap title="{{title}}" location="{{location}}" height="{{height}}" zoom="{{zoom}}"]',
	'TB_title'	=> __('Insert Box', 'text_domain')
);


// Heading -------------------------------------------------------------------------- >
$symple_shortcodes['heading'] = array(
	'params'	=> array(
		'title'	=> array(
			'type'	=> 'text',
			'std'	=> 'This is a heading',
			'label'	=> __('Title', 'text_domain'),
		),
		'type'	=> array(
			'type'	=> 'text',
			'std'	=> 'h2',
			'label'	=> __('Type', 'text_domain'),
		),
		'margin_top'	=> array(
			'type'	=> 'text',
			'std'	=> '30px',
			'label'	=> __('Margin Top', 'text_domain'),
		),
		'margin_bottom'	=> array(
			'type'	=> 'text',
			'std'	=> '30px',
			'label'	=> __('Margin Bottom', 'text_domain'),
		),
		'font_size'	=> array(
			'type'	=> 'text',
			'std'	=> '',
			'label'	=> __('Font Size', 'text_domain'),
		),
		'color'	=> array(
			'type'	=> 'text',
			'std'	=> '',
			'label'	=> __('Color (hex)', 'text_domain'),
		),
		'style'	=> array(
			'label'		=> __('Style', 'text_domain'),
			'type'		=> 'select',
			'options'	=> array(
				'double-line'	=> 'Double Line',
				'dashed-line'	=> 'Dashed Line',
				'dotted-line'	=> 'Dotted Line',
			)
		),
		'text_align'	=> array(
			'label'		=> __('Text Align', 'text_domain'),
			'type'		=> 'select',
			'options'	=> array(
				'left'		=> 'left',
				'center'	=> 'center',
				'right'		=> 'right',
			)
		),
		'icon_left'		=> array(
			'type'		=> 'select',
			'label'		=> __('Icon Left', 'text_domain'),
			'options'	=> ssp_font_icons_array()
		),
		'icon_right'	=> array(
			'type'		=> 'select',
			'label'		=> __('Icon Right', 'text_domain'),
			'options'	=> ssp_font_icons_array()
		),		
		
	),
	'shortcode'	=> '[symple_heading style="{{style}}" title="{{title}}" type="{{type}}" font_size="{{font_size}}" text_align="{{text_align}}" margin_top="{{margin_top}}" margin_bottom="{{margin_bottom}}" color="{{color}}" icon_left="{{icon_left}}" icon_right="{{icon_right}}"]',
	'TB_title'	=> __('Insert Heading', 'text_domain')
);


// Highlight -------------------------------------------------------------------------- >
$symple_shortcodes['highlight'] = array(
	'params'	=> array(
		'color'	=> array(
			'type'	=> 'select',
			'label'	=> __('Color', 'text_domain'),
			'options'	=> array(
				'blue'		=> 'Blue',
				'green'		=> 'Green',
				'gray'		=> 'Gray',
				'red'		=> 'Red',
				'yellow'	=> 'Yellow',
			)
		),
		'content'	=> array(
			'std'	=> 'highlight me please',
			'type'	=> 'textarea',
			'label'	=> __('Highlighted Text', 'text_domain'),
		)
		
	),
	'shortcode'	=> '[symple_highlight color="{{color}}"] {{content}} [/symple_highlight]',
	'TB_title'	=> __('Insert Box', 'text_domain')
);



// Skillbar -------------------------------------------------------------------------- >
$symple_shortcodes['skillbar'] = array(
	'params'	=> array(
		'title'	=> array(
			'std'	=> 'Web Design',
			'type'	=> 'text',
			'label'	=> __('Title', 'text_domain'),
		),
		'percentage'	=> array(
			'std'		=> '70',
			'type'		=> 'text',
			'label'		=> __('Percentage', 'text_domain'),
		),
		'color'	=> array(
			'std'		=> '#65C25C',
			'type'		=> 'text',
			'label'		=> __('Color', 'text_domain'),
		),
		'show_percent'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Display % Number', 'text_domain'),
			'options'	=> array(
				'true'	=> 'true',
				'false'	=> 'false',
			)
		),
		
	),
	'shortcode'	=> '[symple_skillbar title="{{title}}" percentage="{{percentage}}" color="{{color}}" show_percent="{{show_percent}}"]',
	'TB_title'	=> __('Insert Skillbar', 'text_domain')
);


// Social -------------------------------------------------------------------------- >
$symple_shortcodes['social'] = array(
	'params'	=> array(
		'icon'	=> array(
			'std'		=> 'dribbble',
			'type'		=> 'select',
			'label'		=> __('Select Your Icon', 'text_domain'),
			'options'	=> ssp_social_icons_array(),
		),
		'url'	=> array(
			'std'		=> 'http://dribbble.com',
			'type'		=> 'text',
			'label'		=> __('URL', 'text_domain'),
		),
		'title'	=> array(
			'std'		=> 'Visit Website',
			'type'		=> 'text',
			'label'		=> __('URL Title', 'text_domain'),
		),
		'target'		=> array(
			'type'		=> 'select',
			'label'		=> __('Link Target', 'text_domain'),
			'options'	=> array(
				'self'	=> 'Self',
				'blank'	=> 'Blank'
			)
		),
		'rel'		=> array(
			'type'		=> 'select',
			'label'		=> __('Rel', 'text_domain'),
			'options'	=> array(
				'none'	=> 'None',
				'nofollow'	=> 'Nofollow',
			)
		),
				
	),
	'shortcode'	=> '[symple_social icon="{{icon}}" url="{{url}}" title="{{title}}" target="{{target}}" rel="{{rel}}"]',
	'TB_title'	=> __('Insert Social Icon', 'text_domain')
);




// Testimonial -------------------------------------------------------------------------- >
$symple_shortcodes['testimonial'] = array(
	'params'	=> array(
		'by'	=> array(
			'std'	=> 'Unknown Person',
			'type'	=> 'text',
			'label'	=> __( 'Author', 'text_domain' ),
		),
		'content'	=> array(
			'std'	=> 'This is where your testimonial goes.',
			'type'	=> 'textarea',
			'label'	=> __( 'Content', 'text_domain' ),
		),
		'fade_in'	=> array(
			'std'	=> 'false',
			'type'	=> 'select',
			'label'	=> __('Fade In', 'text_domain'),
			'options'	=> array (
				'false'	=> __('False', 'text_domain'),
				'true'	=> __('True', 'text_domain'),
			),
		),
	),
	'shortcode'	=> '[symple_testimonial by="{{by}}" fade_in="{{fade_in}}"] {{content}} [/symple_testimonial]',
	'TB_title'	=> __('Insert Testimonial', 'text_domain')
);




// Accordion -------------------------------------------------------------------------- >
$symple_shortcodes['accordion'] = array(
    'params'		=> array(),
    'shortcode'		=> '[symple_accordion] {{child_shortcode}} [/symple_accordion]',
    'TB_title'	=> __('Insert Accordion', 'text_domain'),    
    'child_shortcode'	=> array(
        'params'	=> array(
            'title'	=> array(
                'std'	=> '',
                'type'	=> 'text',
                'label'	=> __('Section Title', 'text_domain'),
				'std'	=> __('Your Title', 'text_domain'),
				'desc'	=> '',

            ),
            'content'	=> array(
                'std'	=> '',
                'type'	=> 'textarea',
                'label'	=> __('Section Content', 'text_domain'),
				'std'	=> __('Your Content', 'text_domain'),
                'desc'	=> '',
            )
        ),
        'shortcode'	=> '[symple_accordion_section title="{{title}}"] {{content}} [/symple_accordion_section]',
        'clone_button'	=> __('Add Section', 'text_domain')
    )
);



// WPML -------------------------------------------------------------------------- >
$symple_shortcodes['wpml'] = array(
	'params'	=> array(
		'lang'	=> array(
			'type'	=> 'text',
			'label'	=> __('Language', 'text_domain'),
			'std'	=> 'es',
		),
		'content'	=> array(
			'type'	=> 'textarea',
			'label'	=> __('Content', 'text_domain'),
			'std'	=> __('Hola', 'text_domain'),
		),
		
	),
	'shortcode'	=> '[symple_wpml lang="{{lang}}"] {{content}} [/symple_wpml]',
	'TB_title'	=> __('Insert Translated Content', 'text_domain')
);


// Toggle -------------------------------------------------------------------------- >
$symple_shortcodes['toggle'] = array(
	'params'	=> array(
		'title'	=> array(
			'type'	=> 'text',
			'label'	=> __('Title', 'text_domain'),
			'std'	=> __('Your Title', 'text_domain'),
		),
		'content'	=> array(
			'type'	=> 'textarea',
			'label'	=> __('Content', 'text_domain'),
			'std'	=> __('Your Content', 'text_domain'),
		),
		'state'	=> array(
			'type'	=> 'select',
			'label'	=> __('State', 'text_domain'),
			'desc'	=> '',
			'options'	=> array(
				'closed'	=> 'Closed',
				'open'		=> 'Open',
			)
		),
		
	),
	'shortcode'	=> '[symple_toggle title="{{title}}" state="{{state}}"] {{content}} [/symple_toggle]',
	'TB_title'	=> __('Insert Toggle Content', 'text_domain')
);


// Tabs -------------------------------------------------------------------------- >
$symple_shortcodes['tabs'] = array(
    'params'	=> array(),
    'shortcode'	=> '[symple_tabgroup] {{child_shortcode}} [/symple_tabgroup]',
    'TB_title'	=> __('Insert Tab', 'text_domain'), 
    'child_shortcode'	=> array(
        'params'	=> array(
            'title'	=> array(
                'std'	=> 'Your Title',
                'type'	=> 'text',
                'label'	=> __('Tab Title', 'text_domain'),
                'desc'	=> __('Enter a unique title for your tab.', 'text_domain'),
            ),
            'content'	=> array(
                'std'	=> 'Your Content',
                'type'	=> 'textarea',
                'label'	=> __('Tab Content', 'text_domain'),
                'desc'	=> '',
            )
        ),
        'shortcode'	=> '[symple_tab title="{{title}}"] {{content}} [/symple_tab]',
        'clone_button'	=> __('Add Tab', 'text_domain')
    )
);


// Pricing Table -------------------------------------------------------------------------- >
$symple_shortcodes['pricing'] = array(
    'params'			=> array(),
    'shortcode'			=> '[symple_pricing_table] {{child_shortcode}} [/symple_pricing_table]',
    'TB_title'			=> __('Insert Tab', 'text_domain'),    
    'child_shortcode'	=> array(
        'params'		=> array(
            'size'		=> array(
				'type'		=> 'select',
				'label'		=> __('Size', 'text_domain'),
				'desc'		=> __('Select the width of the column.', 'text_domain'),
				'options'	=> array(
					'one-half'		=> '1/2',
					'one-third'		=> '1/3',
					'two-third'		=> '2/3',
					'one-fourth'	=> '1/4',
					'three-fourth'	=> '3/4',
					'one-fifth'		=> '1/5',
					'two-fifth'		=> '2/5',
					'three-fifth'	=> '3/5',
					'four-fifth'	=> '4/5',
					'one-sixth'		=> '1/6',
					'five-sixth'	=> '5/6',
				)
			),
			'position'	=> array(
				'type'		=> 'select',
				'label'		=> __('Position', 'text_domain'),
				'desc'		=> __('Is this a first, middle or last column?', 'text_domain'),
				'options'	=> array(
					'first'		=> 'first',
					'middle'	=> 'middle',
					'last'		=> 'last',
				)
			),
			'featured'	=> array(
				'type'		=> 'select',
				'label'		=> __('Featured', 'text_domain'),
				'desc'		=> '',
				'options'	=> array(
					'no'	=> 'No',
					'yes'	=> 'Yes',
				)
			),
			'plan'	=> array(
                'std'	=> 'Basic',
                'type'	=> 'text',
                'label'	=> __('Plan', 'text_domain'),
                'desc'	=> '',
            ),
			'cost'	=> array(
                'std'	=> '$20',
                'type'	=> 'text',
                'label'	=> __('Cost', 'text_domain'),
                'desc'	=> '',
            ),
			'per'	=> array(
                'std'	=> 'month',
                'type'	=> 'text',
                'label'	=> __('Per (optional)', 'text_domain'),
                'desc'	=> '',
            ),
			'button_text'	=> array(
				'std'	=> 'Button Text',
				'type'	=> 'text',
				'label'	=> __('Button: Text', 'text_domain'),
				 'desc'	=> '',
			),
			'button_url'	=> array(
				'std'	=> 'http://www.google.com/',
				'type'	=> 'text',
				'label'	=> __('Button: URL', 'text_domain'),
				'desc'	=> '',
			),
			'button_color'	=> array(
				'type'	=> 'select',
				'label'	=> __('Button: Style', 'text_domain'),
				'desc'	=> '',
				'options'	=> array(
					'black'		=> 'Black',
					'blue'		=> 'Blue',
					'brown'		=> 'Brown',
					'grey'		=> 'Grey',
					'green'		=> 'Green',
					'green'		=> 'Green',
					'gold'		=> 'Gold',
					'orange'	=> 'Orange',
					'pink'		=> 'Pink',
					'red'		=> 'Red',
					'rosy'		=> 'Rosy',
					'teal'		=> 'Teal',
					
				),
			),
			'button_size'	=> array(
				'type'	=> 'select',
				'label'	=> __('Button: Size', 'text_domain'),
				'desc'	=> '',
				'options'	=> array(
					'default'	=> 'default',
					'small'		=> 'Small',
					'medium'	=> 'Medium',
					'large'		=> 'Large',
				)
			),
			'button_border_radius'	=> array(
				'type'	=> 'text',
				'std'	=> '3px',
				'desc'	=> '',
				'label'	=> __('Button: Border Radius', 'text_domain'),
			),
			'button_target'	=> array(
				'type'	=> 'select',
				'label'	=> __('Button: Link Target', 'text_domain'),
				'desc'	=> '',
				'options'	=> array(
					'self'	=> 'Self',
					'blank'	=> 'Blank'
				)
			),
			'button_rel'	=> array(
				'type'	=> 'select',
				'label'	=> __('Button: Rel', 'text_domain'),
				'desc'	=> '',
				'options'	=> array(
					'none'		=> 'None',
					'nofollow'	=> 'Nofollow',
				)
			),
			'button_icon_left'	=> array(
				'type'		=> 'select',
				'label'		=> __('Button: Icon Left', 'text_domain'),
				'desc'		=> '',
				'options'	=> ssp_font_icons_array()
			),
			'button_icon_right'	=> array(
				'type'		=> 'select',
				'label'		=> __('Button: Icon Right', 'text_domain'),
				'desc'		=> '',
				'options'	=> ssp_font_icons_array()
			),
            'content'	=> array(
                'std'	=> '
<ul>
	<li>30GB Storage</li>
	<li>512MB Ram</li>
	<li>10 databases</li>
	<li>1,000 Emails</li>
	<li>25GB Bandwidth</li>
</ul>',
                'type'	=> 'textarea',
                'label'	=> __('Features', 'text_domain'),
                'desc'	=> '',
            )
        ),
        'shortcode'	=> '[symple_pricing size="{{size}}" plan="{{plan}}" cost="{{cost}}" per="{{per}}" button_url="{{button_url}}" button_text="{{button_text}} button_color="{{button_color}}" button_border_radius="{{button_border_radius}}" button_target="{{button_target}}" button_rel="{{button_rel}}" position="{{position}}"] {{content}} [/symple_pricing]',
        'clone_button'	=> __('Add Column', 'text_domain')
    )
);



// Posts Grid -------------------------------------------------------------------------- >
$symple_shortcodes['posts_grid'] = array(
	'params'	=> array(
		'unique_id'	=> array(
			'std'	=> '',
			'type'	=> 'text',
			'label'	=> __('Unique Id', 'text_domain'),
			'desc'	=>  __('You can enter a unique ID here for styling purposes.', 'text_domain'),
		),
		'post_type'	=> array(
			'std'		=> 'post',
			'type'		=> 'select',
			'label'		=> __('Post Type', 'text_domain'),
			'desc'		=> '',
			'options'	=> ssp_post_type_array(),
		),
		'taxonomy'	=> array(
			'std'	=> '',
			'type'	=> 'text',
			'label'	=> __('Taxonomy Name', 'text_domain'),
			'desc'	=>  __('Select a custom taxonomy if you want to show items only from a specific taxonomy. Leave blank to display recent items from the whole post type. Ex: category.', 'text_domain'),
		),
		'term_slug'	=> array(
			'std'	=> '',
			'type'	=> 'text',
			'label'	=> __('Term Slug', 'text_domain'),
			'std'	=> '',
			'desc'	=>  __('Enter the Term slug to get your posts from. This term must be a part of the taxonomy above. You can find your slug on your taxonomy dashboard. For regular posts that would be the "Categories" page.', 'text_domain'),
		),
		'count'	=> array(
			'type'	=> 'text',
			'label'	=> __('Count', 'text_domain'),
			'std'	=> '10',
			'desc'	=>  __('How many items do you wish to show.', 'text_domain'),
		),
		'pagination'	=> array(
			'type'		=> 'select',
			'label'		=> __('Pagination', 'text_domain'),
			'desc'		=> __('Note: Pagination will not work on your homepage.', 'text_domain'),
			'options'	=> array(
				'false'		=> 'False',
				'true'	=> 'True',
			)
		),
		'columns'	=> array(
			'std'		=> '3',
			'type'		=> 'select',
			'label'		=> __('Columns', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
					'1'	=> '1',
					'2'	=> '2',
					'3'	=> '3',
					'4'	=> '4',
					'5'	=> '5',
					'6'	=> '6'
				),
		),
		'order'	=> array(
			'std'		=> 'DESC',
			'type'		=> 'select',
			'label'		=> __('Order', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'DESC'	=> 'DESC',
				'ASC'	=> 'ASC',
			),
		),
		'orderby'	=> array(
			'std'		=> 'DESC',
			'type'		=> 'select',
			'label'		=> __('Order By', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'date'				=> 'Date',
				'name'				=> 'Name',
				'modified'			=> 'Modified',
				'author'			=> 'Author',
				'modified'			=> 'Modified',
				'rand'				=> 'Random',
				'comment_count'		=> 'Comment Count',
			),
		),
		'thumbnail_link' => array(
			'std'	=> 'post',
			'type'	=> 'select',
				'label'		=> __('Thumbnail Link', 'text_domain'),
				'std'		=> '',
				'desc'		=> '',
				'options'	=> array(
					'post'	=> 'Post',
					'none'	=> 'None',
					'lightbox'	=> 'Lightbox',
				),
		),
		'img_crop'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Thumbnail Crop', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'img_width'	=> array(
			'type'	=> 'text',
			'label'	=> __('Thumbnail Width', 'text_domain'),
			'std'	=> '450',
			'desc'	=>  '',
		),
		'img_height'	=> array(
			'type'	=> 'text',
			'label'	=> __('Thumbnail Height', 'text_domain'),
			'std'	=> '350',
			'desc'	=>  __('Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain'),
		),
		'title'	=> array(
			'type'		=> 'select',
			'label'		=> __('Display Title', 'text_domain'),
			'std'		=> 'true',
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'excerpt'	=> array(
			'type'		=> 'select',
			'label'		=> __('Display Excerpt', 'text_domain'),
			'std'		=> 'true',
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'excerpt_length'	=> array(
			'type'		=> 'text',
			'label'		=> __('Excerpt Length', 'text_domain'),
			'std'		=> '30',
			'desc'		=>  __('How many words do you want to display for your excerpt?', 'text_domain'),
		),
		'read_more'	=> array(
			'type'		=> 'select',
			'label'		=> __('Read More Link?', 'text_domain'),
			'std'		=> 'true',
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
				),
		),
	),
	'shortcode'		=> '[symple_posts_grid unique_id="{{unique_id}}" post_type="{{post_type}}" taxonomy="{{taxonomy}}" term_slug="{{term_slug}}" count="{{count}}" columns="{{columns}}" pagination="{{pagination}}" order="{{order}}" orderby="{{orderby}}" thumbnail_link="{{thumbnail_link}}" img_crop="{{img_crop}}" img_height="{{img_height}}" img_width="{{img_width}}" title="{{title}}" excerpt="{{excerpt}}" excerpt_length="{{excerpt_length}}" read_more="{{read_more}}"]',
	'TB_title'	=> __('Insert Posts Grid', 'text_domain')
);




// Recent News -------------------------------------------------------------------------- >
$symple_shortcodes['recent_news'] = array(
	'params'	=> array(
		'unique_id'	=> array(
			'std'		=> '',
			'type'		=> 'text',
			'label'		=> __('Unique Id', 'text_domain'),
			'desc'		=>  __('You can enter a unique ID here for styling purposes.', 'text_domain'),
		),
		'post_type'	=> array(
			'std'		=> 'post',
			'type'		=> 'select',
			'label'		=> __('Post Type', 'text_domain'),
			'desc'		=> '',
			'options'	=> ssp_post_type_array(),
		),
		'header'	=> array(
			'std'		=> __('News', 'text_domain'),
			'type'		=> 'text',
			'label'		=> __('Header', 'text_domain'),
			'desc'		=>  '',
		),
		'taxonomy'	=> array(
			'std'		=> '',
			'type'		=> 'text',
			'label'		=> __('Taxonomy Name', 'text_domain'),
			'desc'		=>  __('Select a custom taxonomy if you want to show items only from a specific taxonomy. Leave blank to display recent items from the whole post type. Ex: category.', 'text_domain'),
		),
		'term_slug'	=> array(
			'std'		=> '',
			'type'		=> 'text',
			'label'		=> __('Term Slug', 'text_domain'),
			'desc'		=>  __('Enter the Term slug to get your posts from. This term must be a part of the taxonomy above. You can find your slug on your taxonomy dashboard. For regular posts that would be the "Categories" page.', 'text_domain'),
	),
		'count'	=> array(
			'type'	=> 'text',
			'label'	=> __('Count', 'text_domain'),
			'std'	=> '3',
			'desc'	=>  __('How many items do you wish to show.', 'text_domain'),
		),
		'order'	=> array(
			'std'		=> 'DESC',
			'type'		=> 'select',
			'label'		=> __('Order', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'DESC'	=> 'DESC',
				'ASC'	=> 'ASC',
			),
		),
		'orderby'	=> array(
			'std'		=> 'DESC',
			'type'		=> 'select',
			'label'		=> __('Order By', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'date'				=> 'Date',
				'name'				=> 'Name',
				'modified'			=> 'Modified',
				'author'			=> 'Author',
				'modified'			=> 'Modified',
				'rand'				=> 'Random',
				'comment_count'		=> 'Comment Count',
			),
		),
		'excerpt_length'	=> array(
			'type'	=> 'text',
			'label'		=> __('Excerpt Length', 'text_domain'),
			'std'		=> '30',
			'desc'		=>  __('How many words do you want to display for your excerpt?', 'text_domain'),
		),
		'read_more'	=> array(
			'type'	=> 'select',
			'label'		=> __('Read More Link?', 'text_domain'),
			'std'		=> 'true',
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
	),
	'shortcode'		=> '[symple_news unique_id="{{unique_id}}" post_type="{{post_type}}" header="{{header}}" taxonomy="{{taxonomy}}" term_slug="{{term_slug}}" count="{{count}}" order="{{order}}" orderby="{{orderby}}" excerpt_length="{{excerpt_length}}" read_more="{{read_more}}"]',
	'TB_title'	=> __('Insert Recent News', 'text_domain')
);


// Posts Carousel -------------------------------------------------------------------------- >
$symple_shortcodes['posts_carousel'] = array(
	'params'	=> array(
		'unique_id'	=> array(
			'std'		=> '',
			'type'		=> 'text',
			'label'		=> __('Unique Id', 'text_domain'),
			'desc'		=>  __('You can enter a unique ID here for styling purposes.', 'text_domain'),
		),
		'post_type'	=> array(
			'std'		=> 'post',
			'type'		=> 'select',
			'label'		=> __('Post Type', 'text_domain'),
			'desc'		=> '',
			'options'	=> ssp_post_type_array(),
		),
		'taxonomy'	=> array(
			'std'		=> '',
			'type'		=> 'text',
			'label'		=> __('Taxonomy Name', 'text_domain'),
			'desc'		=>  __('Select a custom taxonomy if you want to show items only from a specific taxonomy. Leave blank to display recent items from the whole post type. Ex: category.', 'text_domain'),
		),
		'term_slug'	=> array(
			'std'		=> '',
			'type'		=> 'text',
			'label'		=> __('Term Slug', 'text_domain'),
			'std'		=> '',
			'desc'		=>  __('Enter the Term slug to get your posts from. This term must be a part of the taxonomy above. You can find your slug on your taxonomy dashboard. For regular posts that would be the "Categories" page.', 'text_domain'),
		),
		'count'	=> array(
			'type'	=> 'text',
			'label'	=> __('Count', 'text_domain'),
			'std'	=> '8',
			'desc'	=>  __('How many items do you wish to show.', 'text_domain'),
		),
		'pagination'	=> array(
			'type'		=> 'select',
			'label'		=> __('Pagination', 'text_domain'),
			'desc'		=> __('Note: Pagination will not work on your homepage.', 'text_domain'),
			'options'	=> array(
				'false'		=> 'False',
				'true'	=> 'True',
			)
		),
		'order'	=> array(
			'std'	=> 'DESC',
			'type'	=> 'select',
			'label'		=> __('Order', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'DESC'	=> 'DESC',
				'ASC'	=> 'ASC',
			),
		),
		'orderby'	=> array(
			'std'		=> 'date',
			'type'		=> 'select',
			'label'		=> __('Order By', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'date'				=> 'Date',
				'name'				=> 'Name',
				'modified'			=> 'Modified',
				'author'			=> 'Author',
				'modified'			=> 'Modified',
				'rand'				=> 'Random',
				'comment_count'		=> 'Comment Count',
			),
		),
		'item_width'	=> array(
			'type'		=> 'text',
			'label'		=> __('Item Width', 'text_domain'),
			'std'		=> '400',
			'desc'		=> '',
		),
		'min_slides'	=> array(
			'type'		=> 'text',
			'label'		=> __('Minimum Slides', 'text_domain'),
			'std'		=> '1',
			'desc'		=> '',
		),
		'max_slides'	=> array(
			'type'		=> 'text',
			'label'		=> __('Max Slides', 'text_domain'),
			'std'		=> '3',
			'desc'		=> '',
		),
		'auto_play' => array(
			'type'		=> 'select',
			'label'		=> __('Auto Play', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
		'pager' => array(
			'type'		=> 'select',
			'label'		=> __('Display Pager?', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
		'arrows' => array(
			'type'		=> 'select',
			'label'		=> __('Display Arrows?', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
		'thumbnail_link' => array(
			'type'		=> 'select',
			'label'		=> __('Thumbnail Link', 'text_domain'),
			'std'		=> 'post',
			'desc'		=> '',
			'options'	=> array(
				'post'		=> 'Post',
				'none'		=> 'None',
				'lightbox'	=> 'Lightbox',
			),
		),
		'img_crop'	=> array(
			'std'	=> 'true',
			'type'	=> 'select',
			'label'		=> __('Thumbnail Crop', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'img_width'	=> array(
			'type'		=> 'text',
			'label'		=> __('Thumbnail Width', 'text_domain'),
			'std'		=> '450',
			'desc'		=>  '',
		),
		'img_height'	=> array(
			'type'	=> 'text',
			'label'		=> __('Thumbnail Height', 'text_domain'),
			'std'		=> '350',
			'desc'		=>  __('Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain'),
		),
		'title'	=> array(
			'type'		=> 'select',
			'label'		=> __('Display Title', 'text_domain'),
			'std'		=> 'true',
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
	),
	'shortcode'	=> '[symple_carousel unique_id="{{unique_id}}" post_type="{{post_type}}" taxonomy="{{taxonomy}}" term_slug="{{term_slug}}" count="{{count}}" order="{{order}}" orderby="{{orderby}}" item_width="{{item_width}}" min_slides="{{min_slides}}" max_slides="{{max_slides}}" auto_play="{{auto_play}}" pager="{{pager}}" arrows="{{arrows}}" thumbnail_link="{{thumbnail_link}}" img_crop="{{img_crop}}" img_width="{{img_width}}" img_height="{{img_height}}" title="{{title}}"]',
	'TB_title'	=> __('Insert Carousel', 'text_domain')
);


// Posts FlexSlider -------------------------------------------------------------------------- >
$symple_shortcodes['posts_flexslider'] = array(
	'params'	=> array(
		'unique_id'	=> array(
			'std'	=> '',
			'type'	=> 'text',
			'label'		=> __('Unique Id', 'text_domain'),
			'desc'		=>  __('You can enter a unique ID here for styling purposes.', 'text_domain'),
		),
		'post_type'	=> array(
			'std'	=> 'post',
			'type'	=> 'select',
			'label'		=> __('Post Type', 'text_domain'),
			'desc'		=> '',
			'options'	=> ssp_post_type_array(),
		),
		'taxonomy'	=> array(
			'std'	=> '',
			'type'	=> 'text',
				'label'		=> __('Taxonomy Name', 'text_domain'),
				'desc'		=>  __('Select a custom taxonomy if you want to show items only from a specific taxonomy. Leave blank to display recent items from the whole post type. Ex: category.', 'text_domain'),
		),
		'term_slug'	=> array(
			'type'	=> 'text',
			'label'		=> __('Term Slug', 'text_domain'),
			'std'		=> '',
			'desc'		=>  __('Enter the Term slug to get your posts from. This term must be a part of the taxonomy above. You can find your slug on your taxonomy dashboard. For regular posts that would be the "Categories" page.', 'text_domain'),
		),
		'count'	=> array(
			'type'	=> 'text',
			'label'	=> __('Count', 'text_domain'),
			'std'	=> '3',
			'desc'	=>  __('How many items do you wish to show.', 'text_domain'),
		),
		'order'	=> array(
			'std'		=> 'DESC',
			'type'		=> 'select',
			'label'		=> __('Order', 'text_domain'),
			'std'		=> '',
			'desc'		=> '',
			'options'	=> array(
				'DESC'	=> 'DESC',
				'ASC'	=> 'ASC',
			),
		),
		'orderby'	=> array(
			'std'		=> 'date',
			'type'		=> 'select',
			'label'		=> __('Order By', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'date'				=> 'Date',
				'name'				=> 'Name',
				'modified'			=> 'Modified',
				'author'			=> 'Author',
				'modified'			=> 'Modified',
				'rand'				=> 'Random',
				'comment_count'		=> 'Comment Count',
			),
		),
		'thumbnail_link' => array(
			'type'		=> 'select',
			'label'		=> __('Thumbnail Link', 'text_domain'),
			'std'		=> '',
			'desc'		=> '',
			'options'	=> array(
				'post'		=> 'Post',
				'none'		=> 'None',
				'lightbox'	=> 'Lightbox',
			),
		),
		'img_crop'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Thumbnail Crop', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'img_width'	=> array(
			'type'		=> 'text',
			'label'		=> __('Thumbnail Width', 'text_domain'),
			'std'		=> '980',
			'desc'		=>  '',
		),
		'img_height'	=> array(
			'type'		=> 'text',
			'label'		=> __('Thumbnail Height', 'text_domain'),
			'std'		=> '400',
			'desc'		=>  __('Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain'),
		),
		'title'	=> array(
		'type'		=> 'select',
		'label'		=> __('Display Title', 'text_domain'),
		'std'		=> 'true',
		'desc'		=>  '',
		'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'animation'	=> array(
			'std'		=> 'slide',
			'type'		=> 'select',
			'label'		=> __('Animation', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'slide'	=> 'Slide',
				'fade'	=> 'Fade',
			),
		),
		'slideshow'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Slideshow', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'randomize'	=> array(
			'std'		=> 'false',
			'type'		=> 'select',
			'label'		=> __('Randomize', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'false'	=> 'False',
				'true'	=> 'True',
			),
		),
		'control_nav'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Control Nav', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'direction_nav'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Direction Nav', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'slideshow_speed' => array(
			'std'		=> '7000',
			'type'		=> 'text',
			'label'		=> __('Slideshow Speed', 'text_domain'),
			'desc'		=>  '',
		),
		'animation_speed' => array(
			'std'		=> '600',
			'type'		=> 'text',
			'label'		=> __('Animation Speed', 'text_domain'),
			'desc'		=>  '',
		),
	),
	'shortcode'	=> '[symple_flexslider unique_id="{{unique_id}}" post_type="{{post_type}}" taxonomy="{{taxonomy}}" term_slug="{{term_slug}}" count="{{count}}" order="{{order}}" orderby="{{orderby}}" thumbnail_link="{{thumbnail_link}}" img_crop="{{img_crop}}" img_width="{{img_width}}" img_height="{{img_height}}" title="{{title}}" animation="{{animation}}" slideshow="{{slideshow}}" randomize="{{randomize}}" control_nav="{{control_nav}}" direction_nav="{{direction_nav}}" ="{{}}" animation_speed="{{animation_speed}}"]',
	'TB_title'	=> __('Insert FlexSlider', 'text_domain')
);


// Custom FlexSlider -------------------------------------------------------------------------- >
$symple_shortcodes['custom_flexslider'] = array(
    'params'	=> array(),
    'shortcode'	=> '[symple_flexslider_custom unique_id="{{unique_id}}" style="{{style}}" animation="{{animation}}" slideshow="{{slideshow}}" randomize="{{randomize}}" control_nav="{{control_nav}}" direction_nav="{{direction_nav}}" ="{{}}" animation_speed="{{animation_speed}}"] {{child_shortcode}} [/symple_flexslider_custom]',
    'TB_title'	=> __('Insert FlexSlider', 'text_domain'), 
	'params'	=> array(
		'unique_id'	=> array(
			'std'	=> '',
			'type'	=> 'text',
			'label'		=> __('Unique Id', 'text_domain'),
			'desc'		=>  __('You can enter a unique ID here for styling purposes.', 'text_domain'),
		),
		'style'	=> array(
			'std'		=> 'content',
			'type'		=> 'select',
			'label'		=> __('Style', 'text_domain'),
			'desc'		=>  __('Select your slider style. Select content if you are adding text, images, HTMl shortcodes..etc. Select images if this slider will only be images.', 'text_domain'),
			'options'	=> array(
				'content'	=> 'Content',
				'images'	=> 'Images',
			),
		),
		'animation'	=> array(
			'std'		=> 'slide',
			'type'		=> 'select',
			'label'		=> __('Animation', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'slide'	=> 'Slide',
				'fade'	=> 'Fade',
			),
		),
		'slideshow'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Slideshow', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'randomize'	=> array(
			'std'		=> 'false',
			'type'		=> 'select',
			'label'		=> __('Randomize', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'false'	=> 'False',
				'true'	=> 'True',
			),
		),
		'control_nav'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Control Nav', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'direction_nav'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Direction Nav', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'slideshow_speed' => array(
			'std'		=> '7000',
			'type'		=> 'text',
			'label'		=> __('Slideshow Speed', 'text_domain'),
			'desc'		=>  '',
		),
		'animation_speed' => array(
			'std'		=> '600',
			'type'		=> 'text',
			'label'		=> __('Animation Speed', 'text_domain'),
			'desc'		=>  '',
		),
	),
    'child_shortcode'	=> array(
        'params'	=> array(
            'content'	=> array(
                'std'	=> 'Your Content',
                'type'	=> 'textarea',
                'label'	=> __('Slide Content', 'text_domain'),
                'desc'	=> __('Enter your slide content. This can be images, HTMl, shortcodes..etc. You can always enter something simple then add images and more text via your post editor.', 'text_domain'),
            )
        ),
        'shortcode'	=> '[symple_flex_slide] {{content}} [/symple_flex_slide]',
        'clone_button'	=> __('Add Slide', 'text_domain')
    )
);


// Attachments Carousel -------------------------------------------------------------------------- >
$symple_shortcodes['attachments_carousel'] = array(
	'params'	=> array(
		'unique_id'	=> array(
			'std'		=> '',
			'type'		=> 'text',
			'label'		=> __('Unique Id', 'text_domain'),
			'desc'		=>  __('You can enter a unique ID here for styling purposes.', 'text_domain'),
		),
		'pagination'	=> array(
			'type'		=> 'select',
			'label'		=> __('Pagination', 'text_domain'),
			'desc'		=> __('Note: Pagination will not work on your homepage.', 'text_domain'),
			'options'	=> array(
				'false'		=> 'False',
				'true'	=> 'True',
			)
		),
		'order'	=> array(
			'std'	=> 'DESC',
			'type'	=> 'select',
			'label'		=> __('Order', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'DESC'	=> 'DESC',
				'ASC'	=> 'ASC',
			),
		),
		'item_width'	=> array(
			'type'		=> 'text',
			'label'		=> __('Item Width', 'text_domain'),
			'std'		=> '400',
			'desc'		=> '',
		),
		'min_slides'	=> array(
			'type'		=> 'text',
			'label'		=> __('Minimum Slides', 'text_domain'),
			'std'		=> '1',
			'desc'		=> '',
		),
		'max_slides'	=> array(
			'type'		=> 'text',
			'label'		=> __('Max Slides', 'text_domain'),
			'std'		=> '3',
			'desc'		=> '',
		),
		'auto_play' => array(
			'type'		=> 'select',
			'label'		=> __('Auto Play', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
		'pager' => array(
			'type'		=> 'select',
			'label'		=> __('Display Pager?', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
		'arrows' => array(
			'type'		=> 'select',
			'label'		=> __('Display Arrows?', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
		'thumbnail_link' => array(
			'type'		=> 'select',
			'label'		=> __('Thumbnail Link', 'text_domain'),
			'std'		=> 'post',
			'desc'		=> '',
			'options'	=> array(
				'lightbox'	=> 'Lightbox',
				'none'		=> 'None',
			),
		),
		'img_crop'	=> array(
			'std'	=> 'true',
			'type'	=> 'select',
			'label'		=> __('Thumbnail Crop', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'img_width'	=> array(
			'type'		=> 'text',
			'label'		=> __('Thumbnail Width', 'text_domain'),
			'std'		=> '450',
			'desc'		=>  '',
		),
		'img_height'	=> array(
			'type'	=> 'text',
			'label'		=> __('Thumbnail Height', 'text_domain'),
			'std'		=> '350',
			'desc'		=>  __('Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain'),
		),
		'title'	=> array(
			'type'		=> 'select',
			'label'		=> __('Display Title', 'text_domain'),
			'std'		=> 'true',
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
	),
	'shortcode'	=> '[symple_attachments_carousel unique_id="{{unique_id}}" order="{{order}}" item_width="{{item_width}}" min_slides="{{min_slides}}" max_slides="{{max_slides}}" auto_play="{{auto_play}}" pager="{{pager}}" arrows="{{arrows}}" thumbnail_link="{{thumbnail_link}}" img_crop="{{img_crop}}" img_width="{{img_width}}" img_height="{{img_height}}" title="{{title}}"]',
	'TB_title'	=> __('Insert Carousel', 'text_domain')
);


// Attachments FlexSlider -------------------------------------------------------------------------- >
$symple_shortcodes['attachments_slider'] = array(
	'params'	=> array(
		'unique_id'	=> array(
			'std'	=> '',
			'type'	=> 'text',
			'label'		=> __('Unique Id', 'text_domain'),
			'desc'		=>  __('You can enter a unique ID here for styling purposes.', 'text_domain'),
		),
		'order'	=> array(
			'std'		=> 'DESC',
			'type'		=> 'select',
			'label'		=> __('Order', 'text_domain'),
			'std'		=> '',
			'desc'		=> '',
			'options'	=> array(
				'DESC'	=> 'DESC',
				'ASC'	=> 'ASC',
			),
		),
		'thumbnail_link' => array(
			'type'		=> 'select',
			'label'		=> __('Thumbnail Link', 'text_domain'),
			'std'		=> '',
			'desc'		=> '',
			'options'	=> array(
				'none'		=> 'None',
				'lightbox'	=> 'Lightbox',
			),
		),
		'img_crop'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Thumbnail Crop', 'text_domain'),
			'desc'		=> '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'img_width'	=> array(
			'type'		=> 'text',
			'label'		=> __('Thumbnail Width', 'text_domain'),
			'std'		=> '980',
			'desc'		=>  '',
		),
		'img_height'	=> array(
			'type'		=> 'text',
			'label'		=> __('Thumbnail Height', 'text_domain'),
			'std'		=> '400',
			'desc'		=>  __('Enter a height in pixels. Set to "9999" to disable vertical cropping and keep image proportions.', 'text_domain'),
		),
		'title'	=> array(
		'type'		=> 'select',
		'label'		=> __('Display Title', 'text_domain'),
		'std'		=> 'true',
		'desc'		=>  '',
		'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'animation'	=> array(
			'std'		=> 'slide',
			'type'		=> 'select',
			'label'		=> __('Animation', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'slide'	=> 'Slide',
				'fade'	=> 'Fade',
			),
		),
		'slideshow'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Slideshow', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'randomize'	=> array(
			'std'		=> 'false',
			'type'		=> 'select',
			'label'		=> __('Randomize', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'false'	=> 'False',
				'true'	=> 'True',
			),
		),
		'control_nav'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Control Nav', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'direction_nav'	=> array(
			'std'		=> 'true',
			'type'		=> 'select',
			'label'		=> __('Direction Nav', 'text_domain'),
			'desc'		=>  '',
			'options'	=> array(
				'true'	=> 'True',
				'false'	=> 'False',
			),
		),
		'slideshow_speed' => array(
			'std'		=> '7000',
			'type'		=> 'text',
			'label'		=> __('Slideshow Speed', 'text_domain'),
			'desc'		=>  '',
		),
		'animation_speed' => array(
			'std'		=> '600',
			'type'		=> 'text',
			'label'		=> __('Animation Speed', 'text_domain'),
			'desc'		=>  '',
		),
	),
	'shortcode'	=> '[symple_attachments_flexslider unique_id="{{unique_id}}" order="{{order}}" thumbnail_link="{{thumbnail_link}}" img_crop="{{img_crop}}" img_width="{{img_width}}" img_height="{{img_height}}" title="{{title}}" animation="{{animation}}" slideshow="{{slideshow}}" randomize="{{randomize}}" control_nav="{{control_nav}}" direction_nav="{{direction_nav}}" ="{{}}" animation_speed="{{animation_speed}}"]',
	'TB_title'	=> __('Insert FlexSlider', 'text_domain')
);


// Custom Carousel -------------------------------------------------------------------------- >
$symple_shortcodes['custom_carousel'] = array(
	'shortcode'	=> '[symple_carousel_custom unique_id="{{unique_id}}" item_width="{{item_width}}" min_slides="{{min_slides}}" max_slides="{{max_slides}}" auto_play="{{auto_play}}" pager="{{pager}}" arrows="{{arrows}}"]{{child_shortcode}}[/symple_carousel_custom]',
	'TB_title'	=> __('Insert Carousel', 'text_domain'),
	'params'	=> array(
		'unique_id'	=> array(
			'std'		=> '',
			'type'		=> 'text',
			'label'		=> __('Unique Id', 'text_domain'),
			'desc'		=>  __('You can enter a unique ID here for styling purposes.', 'text_domain'),
		),
		'item_width'	=> array(
			'type'		=> 'text',
			'label'		=> __('Item Width', 'text_domain'),
			'std'		=> '400',
			'desc'		=> '',
		),
		'min_slides'	=> array(
			'type'		=> 'text',
			'label'		=> __('Minimum Slides', 'text_domain'),
			'std'		=> '1',
			'desc'		=> '',
		),
		'max_slides'	=> array(
			'type'		=> 'text',
			'label'		=> __('Max Slides', 'text_domain'),
			'std'		=> '3',
			'desc'		=> '',
		),
		'auto_play' => array(
			'type'		=> 'select',
			'label'		=> __('Auto Play', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
		'pager' => array(
			'type'		=> 'select',
			'label'		=> __('Display Pager?', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
		'arrows' => array(
			'type'		=> 'select',
			'label'		=> __('Display Arrows?', 'text_domain'),
			'std'		=> 'true',
			'desc'		=> '',
			'options'	=> array(
				'true'		=> 'True',
				'false'		=> 'False',
			),
		),
	),
	'child_shortcode'	=> array(
        'params'	=> array(
            'content'	=> array(
                'std'	=> 'Your Content',
                'type'	=> 'textarea',
                'label'	=> __('Slide Content', 'text_domain'),
                'desc'	=> __('Enter your slide content. This can be images, HTMl, shortcodes..etc. You can always enter something simple then add images and more text via your post editor.', 'text_domain'),
            )
        ),
        'shortcode'	=> '[symple_carousel_slide] {{content}} [/symple_carousel_slide]',
        'clone_button'	=> __('Add Slide', 'text_domain')
    )
);

// Icons -------------------------------------------------------------------------- >
$symple_shortcodes['icon'] = array(
	'params'	=> array(
		'icon'	=> array(
			'type'		=> 'select',
			'label'		=> __('Icon', 'text_domain'),
			'options'	=> ssp_font_icons_array()
		),
		'size'	=> array(
			'type'		=> 'select',
			'label'		=> __('Size', 'text_domain'),
			'options'	=> array (
				'xlarge'	=> __('Extra Large', 'text_domain'),
				'large'		=> __('Large', 'text_domain'),
				'normal'	=> __('Normal', 'text_domain'),
				'small'		=> __('Small', 'text_domain'),
				'tiny'		=> __('Tiny', 'text_domain'),
			),
		),
		'fade_in'	=> array(
			'std'	=> 'false',
			'type'	=> 'select',
			'label'	=> __('Fade In', 'text_domain'),
			'options'	=> array (
				'false'	=> __('False', 'text_domain'),
				'true'	=> __('True', 'text_domain'),
			),
		),
		'float'	=> array(
			'type'		=> 'select',
			'label'		=> __('Float', 'text_domain'),
			'options'	=> array (
				'left'	=> __('Left', 'text_domain'),
				'right'	=> __('Right', 'text_domain'),
				'none'	=> __('None', 'text_domain'),
			),
		),
		'color'	=> array(
			'std'	=> '#fff',
			'type'	=> 'text',
			'label'	=> __('Color Hex', 'text_domain'),
		),
		'background'	=> array(
			'std'	=> '#000',
			'type'	=> 'text',
			'label'	=> __('Background', 'text_domain'),
		),
		'border_radius'	=> array(
			'std'	=> '99px',
			'type'	=> 'text',
			'label'	=> __('Border Radius', 'text_domain'),
		),
		
	),
	'shortcode'	=> '[symple_icon icon="{{icon}}" size="{{size}}" fade_in="{{fade_in}}" float="{{float}}" color="{{color}}" background="{{background}}" border_radius="{{border_radius}}"]',
	'TB_title'	=> __('Insert Box', 'text_domain')
);
?>