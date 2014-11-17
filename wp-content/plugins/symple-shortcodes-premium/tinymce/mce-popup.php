<?php
// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup
$popup = trim( $_GET['popup'] );
$shortcode = new symple_shortcodes( $popup ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="symple-tb-wrap">
	<div id="symple-shortcode-wrap">
		<div id="symple-sc-form-wrap" class="symple-clr">
			<div id="symple-sc-form-head">
				<?php echo $shortcode->TB_title; ?>
			</div><!-- /#symple-sc-form-head -->
			<form method="post" id="symple-sc-form">
				<table id="symple-sc-form-table">
					<?php echo $shortcode->output; ?>
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child_shortcode ) { ?>
                            	<td class="label">&nbsp;</td>
							<?php } // has_child_shortcode check ?>
							<td class="field"><a href="#" class="button-primary symple-insert"><?php _e( 'Insert Shortcode', 'text_domain' ); ?></a></td>							
						</tr>
					</tbody>
				</table><!-- #symple-sc-form-table -->
			</form><!-- #symple-sc-form -->
		</div><!-- #symple-sc-form-wrap -->
	</div><!-- #symple-shortcode-wrap -->
</div><!-- #symple-tb-wrap -->
</body>
</html>