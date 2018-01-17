<?php
/**
 * The Box Theme Options
 *
 * @package thebox
 * @since thebox 1.0
 */


add_action( 'admin_init', 'thebox_options_init' );
add_action( 'admin_menu', 'thebox_options_add_page' );


/**
 * Init plugin options to white list our options
 *
 */
 
function thebox_options_init(){
	register_setting( 'thebox_options', 'thebox_theme_options', 'thebox_options_validate' );
}


/**
 * Load up the menu page
 *
 */
 
function thebox_options_add_page() {
	add_theme_page( __( 'Theme Options', 'thebox' ), __( 'Theme Options', 'thebox' ), 'edit_theme_options', 'theme_options', 'thebox_options_do_page' );
}


/**
 * Create the options page
 *
 */
 
function thebox_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'thebox' ) . "</h2>"; ?>
		
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'thebox' ); ?></strong></p></div>
		<?php endif; ?>	
		
		<hr>
		<h3><?php _e( 'Social Links', 'thebox' ); ?></h3>
		<p><?php _e( 'These options will let you setup the social icons at the top of the theme. You can enter the URLs of your profiles to have the icons show up.', 'thebox' ); ?></p>
		<p><?php _e( 'Leave blank to hide the social icons.', 'thebox' ); ?></p>

		<form method="post" action="options.php">
		<?php settings_fields( 'thebox_options' ); ?>
		<?php $options = get_option( 'thebox_theme_options' ); ?>
			
			<table class="form-table">

				<?php
				/**
				 * RSS Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide RSS Icon?', 'thebox' ); ?></th>
					<td>
						<input id="thebox_theme_options[hiderss]" name="thebox_theme_options[hiderss]" type="checkbox" value="1" <?php checked( '1', $options['hiderss'] ); ?> />
						<label class="description" for="thebox_theme_options[hiderss]"><?php _e( 'Hide the RSS feed icon?', 'thebox' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Facebook Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Facebook URL', 'thebox' ); ?></th>
					<td>
						<input id="thebox_theme_options[facebookurl]" class="regular-text" type="text" name="thebox_theme_options[facebookurl]" value="<?php echo esc_attr( $options['facebookurl'] ); ?>" />
					</td>
				</tr>
				
				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Twitter URL', 'thebox' ); ?></th>
					<td>
						<input id="thebox_theme_options[twitterurl]" class="regular-text" type="text" name="thebox_theme_options[twitterurl]" value="<?php echo esc_attr( $options['twitterurl'] ); ?>" />
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'thebox' ); ?>" />
			</p>
			
		</form>
	</div>
	<?php
}


/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 *
 */
 
function thebox_options_validate( $input ) {
		
	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['hiderss'] ) )
		$input['hiderss'] = null;
		$input['hiderss'] = ( $input['hiderss'] == 1 ? 1 : 0 );

	// Our text option must be safe text with no HTML tags
	$input['twitterurl'] = wp_filter_nohtml_kses( $input['twitterurl'] );
	$input['facebookurl'] = wp_filter_nohtml_kses( $input['facebookurl'] );
	
	// Encode URLs
	$input['twitterurl'] = esc_url_raw( $input['twitterurl'] );
	$input['facebookurl'] = esc_url_raw( $input['facebookurl'] );
	
	return $input;
}