<?php
/**
 * Get wp-load.php to use in popup
 */
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $parse_uri[0].'wp-load.php';
require_once($wp_load);

/* Old methor, not as safe
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp . '/wp-load.php' );
*/


/**
 * Start SympleShortcodes class
 */
class symple_shortcodes {
	
	
	var	$conf;
	var $errors;
	var	$popup;
	var	$params;
	var	$output;
	var $TB_title;
	var	$shortcode;
	var $child_params;
	var $child_shortcode;
	var $has_child_shortcode;


	function __construct( $popup ) {
		if( file_exists( dirname(__FILE__) . '/shortcodes-array.php' ) ) {
			$this->conf = dirname(__FILE__) . '/shortcodes-array.php';
			$this->popup = $popup;
			$this->format_shortcode();
		} else {
			$this->append_error( 'Can not locate your shortcode configuration file.', 'text_domain' );
		}
	}
	
	
	function format_shortcode() {
		
		require_once( $this->conf );
		
		if( isset( $symple_shortcodes[$this->popup]['child_shortcode'] ) )
			$this->has_child_shortcode = true;
		
		if( isset( $symple_shortcodes ) && is_array( $symple_shortcodes ) ) {

			$this->params		= $symple_shortcodes[$this->popup]['params'];
			$this->shortcode	= $symple_shortcodes[$this->popup]['shortcode'];
			$this->TB_title		= $symple_shortcodes[$this->popup]['TB_title'];
			
			$this->append_output( "\n" . '<div id="_symple_shortcode" class="hidden">' . $this->shortcode . '</div>' );
			$this->append_output( "\n" . '<div id="_symple_popup" class="hidden">' . $this->popup . '</div>' );
			
			foreach( $this->params as $param_key => $param ) {

				$param_key = 'symple_' . $param_key;
				
				// Row Start
				$row_start  = '<tbody>' . "\n";
					$row_start .= '<tr class="form-row">' . "\n";
					$row_start .= '<td class="label">' . $param['label'] . '</td>' . "\n";
					$row_start .= '<td class="field">' . "\n";
					
				// Row End
					$row_end ='';
					if ( isset( $param['desc'] ) ) {
						$row_end	.= '<span class="symple-form-desc">' . $param['desc'] . '</span>' . "\n";
						$row_end   .= '</td>' . "\n";
					}
					$row_end   .= '</tr>' . "\n";					
				$row_end   .= '</tbody>' . "\n";
				
				
				// Loop through cases
				switch( $param['type'] ) {
					

					
					/* Text
					**************************/
					case 'text' :
						
						$output  = $row_start;
						$output .= '<input type="text" class="symple-form-text symple-input" name="' . $param_key . '" id="' . $param_key . '" value="' . $param['std'] . '" />' . "\n";
						$output .= $row_end;					
						$this->append_output( $output );
						
						break;
					

					
					/* Textarea
					**************************/	
					case 'textarea' :
						
						$output  = $row_start;
						$output .= '<textarea rows="10" cols="30" name="' . $param_key . '" id="' . $param_key . '" class="symple-form-textarea symple-input">' . $param['std'] . '</textarea>' . "\n";
						$output .= $row_end;
						$this->append_output( $output );
						
						break;


					
					/* Select
					**************************/	
					case 'select' :
						
						$output  = $row_start;
						$output .= '<select name="' . $param_key . '" id="' . $param_key . '" class="symple-form-select symple-input">' . "\n";
						foreach( $param['options'] as $value => $option ) {
							$output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
						}
						$output .= '</select>' . "\n";
						$output .= $row_end;
						$this->append_output( $output );
						
						break;
					
					
					/* Checkbox
					**************************/
					case 'checkbox' :
					
						$output  = $row_start;
						$output .= '<label for="' . $param_key . '" class="symple-form-checkbox">' . "\n";
						$output .= '<input type="checkbox" class="symple-input" name="' . $param_key . '" id="' . $param_key . '" ' . ( $param['std'] ? 'checked' : '' ) . ' />' . "\n";
						$output .= ' ' . $param['checkbox_text'] . '</label>' . "\n";
						$output .= $row_end;
						$this->append_output( $output );
						
						break;
						
				} // End switch
				
			} // End foreach
			
			
			/* Child Shortcodes
			**************************/	
			if( isset( $symple_shortcodes[$this->popup]['child_shortcode'] ) ) {
				
				$this->child_params		= $symple_shortcodes[$this->popup]['child_shortcode']['params'];
				$this->child_shortcode	= $symple_shortcodes[$this->popup]['child_shortcode']['shortcode'];
			
				// Row Start
				$prow_start  = '<tbody>' . "\n";
				$prow_start .= '<tr class="form-row has-child">' . "\n";
				$prow_start .= '<td><a href="#" id="form-child-add" class="button-secondary">' . $symple_shortcodes[$this->popup]['child_shortcode']['clone_button'] . '</a>' . "\n";
				$prow_start .= '<div class="child-clone-rows">' . "\n";
				$prow_start .= '<div id="_symple_child_shortcode" class="hidden">' . $this->child_shortcode . '</div>' . "\n";
				$prow_start .= '<div class="child-clone-row">' . "\n";
				$prow_start .= '<ul class="child-clone-row-form">' . "\n";
				
				$this->append_output( $prow_start );
				
				// Loop through child parameters
				foreach( $this->child_params as $child_param_key => $child_param ) {
				
					// prefix fild names
					$child_param_key = 'symple_' . $child_param_key;
					
					// popup form row start
					$crow_start	= '<li class="child-clone-row-form-row">' . "\n";
					$crow_start	.= '<div class="child-clone-row-label">' . "\n";
					$crow_start	.= '<label>' . $child_param['label'] . '</label>' . "\n";
					$crow_start	.= '</div>' . "\n";
					$crow_start	.= '<div class="child-clone-row-field">' . "\n";
					
					// popup form row end
					$crow_end	= '<span class="child-clone-row-desc">' . $child_param['desc'] . '</span>' . "\n";
					$crow_end	.= '</div>' . "\n";
					$crow_end	.= '</li>' . "\n";
					
					// Loop through child parameters
					switch( $child_param['type'] ) {
						
						case 'text' :
							
							$coutput  = $crow_start;
							$coutput .= '<input type="text" class="symple-form-text symple-cinput" name="' . $child_param_key . '" id="' . $child_param_key . '" value="' . $child_param['std'] . '" />' . "\n";
							$coutput .= $crow_end;
							
							$this->append_output( $coutput );
							
							break;
							
							
						/* Textarea
						**************************/
						case 'textarea' :
							
							$coutput  = $crow_start;
							$coutput .= '<textarea rows="10" cols="30" name="' . $child_param_key . '" id="' . $child_param_key . '" class="symple-form-textarea symple-cinput">' . $child_param['std'] . '</textarea>' . "\n";
							$coutput .= $crow_end;
							$this->append_output( $coutput );
							
							break;
						
						
						/* Select
						**************************/
						case 'select' :
							
							$coutput  = $crow_start;
							$coutput .= '<select name="' . $child_param_key . '" id="' . $child_param_key . '" class="symple-form-select symple-cinput">' . "\n";
							
							foreach( $child_param['options'] as $value => $option ) {
								$coutput .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
							}
							
							$coutput .= '</select>' . "\n";
							$coutput .= $crow_end;
							
							$this->append_output( $coutput );
							
							break;
							
							
						/* Checkbox
						**************************/	
						case 'checkbox' :
							
							$coutput  = $crow_start;
							$coutput .= '<label for="' . $child_param_key . '" class="symple-form-checkbox">' . "\n";
							$coutput .= '<input type="checkbox" class="symple-cinput" name="' . $child_param_key . '" id="' . $child_param_key . '" ' . ( $child_param['std'] ? 'checked' : '' ) . ' />' . "\n";
							$coutput .= ' ' . $child_param['checkbox_text'] . '</label>' . "\n";
							$coutput .= $crow_end;
							
							$this->append_output( $coutput );
							
							break;
					}
				}
				
				// popup parent form row end
				$prow_end    = '</ul>' . "\n";
				$prow_end   .= '<a href="#" class="child-clone-row-remove">Remove</a>' . "\n";
				$prow_end   .= '</div>' . "\n";
				$prow_end   .= '</div>' . "\n";
				$prow_end   .= '</td>' . "\n";
				$prow_end   .= '</tr>' . "\n";					
				$prow_end   .= '</tbody>' . "\n";
				
				// add $prow_end to output
				$this->append_output( $prow_end );
			}			
		}
	}
	
	function append_output( $output ) {
		$this->output = $this->output . "\n" . $output;		
	}
	
	function reset_output( $output ) {
		$this->output = '';
	}
	
	function append_error( $error ) {
		$this->errors = $this->errors . "\n" . $error;
	}
}
?>