<?php
/**
 * Dish functions.
 *
 * @package dish
 */

if ( ! function_exists( 'dish_is_woocommerce_activated' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function dish_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.4.6
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function dish_do_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

/**
 * Get the content background color
 * Accounts for the Dish Designer and Dish Powerpack content background option.
 *
 * @since  1.6.0
 * @return string the background color
 */
function dish_get_content_background_color() {
	if ( class_exists( 'Dish_Designer' ) ) {
		$content_bg_color = get_theme_mod( 'sd_content_background_color' );
		$content_frame    = get_theme_mod( 'sd_fixed_width' );
	}

	if ( class_exists( 'Dish_Powerpack' ) ) {
		$content_bg_color = get_theme_mod( 'sp_content_frame_background' );
		$content_frame    = get_theme_mod( 'sp_content_frame' );
	}

	$bg_color = str_replace( '#', '', get_theme_mod( 'background_color' ) );

	if ( class_exists( 'Dish_Powerpack' ) || class_exists( 'Dish_Designer' ) ) {
		if ( $content_bg_color && ( 'true' === $content_frame || 'frame' === $content_frame ) ) {
			$bg_color = str_replace( '#', '', $content_bg_color );
		}
	}

	return '#' . $bg_color;
}

/**
 * Apply inline style to the Dish header.
 *
 * @uses  get_header_image()
 * @since  2.0.0
 */
function dish_header_styles() {
	$is_header_image = get_header_image();
	$header_bg_image = '';

	if ( $is_header_image ) {
		$header_bg_image = 'url(' . esc_url( $is_header_image ) . ')';
	}

	$styles = array();

	if ( '' !== $header_bg_image ) {
		$styles['background-image'] = $header_bg_image;
	}

	$styles = apply_filters( 'dish_header_styles', $styles );

	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}

/**
 * Apply inline style to the Dish homepage content.
 *
 * @uses  get_the_post_thumbnail_url()
 * @since  2.2.0
 */
function dish_homepage_content_styles() {
	$featured_image   = get_the_post_thumbnail_url( get_the_ID() );
	$background_image = '';

	if ( $featured_image ) {
		$background_image = 'url(' . esc_url( $featured_image ) . ')';
	}

	$styles = array();

	if ( '' !== $background_image ) {
		$styles['background-image'] = $background_image;
	}

	$styles = apply_filters( 'dish_homepage_content_styles', $styles );

	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}

/**
 * Given an hex colors, returns an array with the colors components.
 *
 * @param  strong $hex Hex color e.g. #111111.
 * @return bool        Array with color components (r, g, b).
 * @since  2.5.8
 */
function get_rgb_values_from_hex( $hex ) {
	// Format the hex color string.
	$hex = str_replace( '#', '', $hex );

	if ( 3 === strlen( $hex ) ) {
		$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
	}

	// Get decimal values.
	$r = hexdec( substr( $hex, 0, 2 ) );
	$g = hexdec( substr( $hex, 2, 2 ) );
	$b = hexdec( substr( $hex, 4, 2 ) );

	return array(
		'r' => $r,
		'g' => $g,
		'b' => $b,
	);
}

/**
 * Returns true for light colors and false for dark colors.
 *
 * @param  strong $hex Hex color e.g. #111111.
 * @return bool        True if the average lightness of the three components of the color is higher or equal than 127.5.
 * @since  2.5.8
 */
function is_color_light( $hex ) {
	$rgb_values        = get_rgb_values_from_hex( $hex );
	$average_lightness = ( $rgb_values['r'] + $rgb_values['g'] + $rgb_values['b'] ) / 3;
	return $average_lightness >= 127.5;
}

/**
 * Adjust a hex color brightness
 * Allows us to create hover styles for custom link colors
 *
 * @since 2.5.8 Added $opacity argument.
 *
 * @param  strong  $hex     Hex color e.g. #111111.
 * @param  integer $steps   Factor by which to brighten/darken ranging from -255 (darken) to 255 (brighten).
 * @param  float   $opacity Opacity factor between 0 and 1.
 * @return string           Brightened/darkened color (hex by default, rgba if opacity is set to a valid value below 1).
 * @since  1.0.0
 */
function dish_adjust_color_brightness( $hex, $steps, $opacity = 1 ) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter.
	$steps = max( -255, min( 255, $steps ) );

	$rgb_values = get_rgb_values_from_hex( $hex );

	// Adjust number of steps and keep it inside 0 to 255.
	$r = max( 0, min( 255, $rgb_values['r'] + $steps ) );
	$g = max( 0, min( 255, $rgb_values['g'] + $steps ) );
	$b = max( 0, min( 255, $rgb_values['b'] + $steps ) );

	if ( $opacity >= 0 && $opacity < 1 ) {
		return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
	}

	$r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
	$g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
	$b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

	return '#' . $r_hex . $g_hex . $b_hex;
}

/**
 * Sanitizes choices (selects / radios)
 * Checks that the input matches one of the available choices
 *
 * @param array $input the available choices.
 * @param array $setting the setting object.
 * @since  1.3.0
 */
function dish_sanitize_choices( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 * @since  1.5.0
 */
function dish_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * CF 7 - version 5.4.1 
 * Load JS & CSS only when necessary
 * 
 * Use WP functions '__return_true', '__return_false' to load the
 * necessary files. The 'is_page()' should be called after the init
 * hook and the js+css must be enqueued before the wp_head hook.
 * 
 */
 
 add_filter( 'wpcf7_load_js', '__return_false' );
 add_filter( 'wpcf7_load_css', '__return_false' );
 
 function fm_cf7_activate_scripts() {
     if (is_page('contact-us') || is_page('waiting-list') || is_singular( array( 'cd', 'book' ) )) {
         add_filter( 'wpcf7_load_js', '__return_true' );
         // add_filter( 'wpcf7_load_css', '__return_true' );
     }
 }
 
add_action( 'get_header', 'fm_cf7_activate_scripts', 20 );


add_filter('after_setup_theme', 'remove_redundant_shortlink');

function remove_redundant_shortlink() {
    // remove HTML meta tag
    // <link rel='shortlink' href='http://example.com/?p=25' />
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);

    // remove HTTP header
    // Link: <https://example.com/?p=25>; rel=shortlink
    remove_action( 'template_redirect', 'wp_shortlink_header', 11);
}

function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );


function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');



// function fix_slash( $string, $type )
// {
// global $wp_rewrite;
// if ( $wp_rewrite->use_trailing_slashes == false )
// {
//     if ( $type != 'single' && $type != 'category' )
//         return trailingslashit( $string );

//     if ( $type == 'single' && ( strpos( $string, '.html/' ) !== false ) )
//         return trailingslashit( $string );

//     if ( $type == 'category' && ( strpos( $string, 'category' ) !== false ) )
//     {
//         $aa_g = str_replace( "/category/", "/", $string );
//         return trailingslashit( $aa_g );
//     }
//     if ( $type == 'category' )
//         return trailingslashit( $string );
// }
// return $string;
// }

// add_filter( 'user_trailingslashit', 'fix_slash', 55, 2 );

