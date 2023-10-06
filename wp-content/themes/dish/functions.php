<?php
/**
 * Dish engine room
 *
 * @package dish
 */

/**
 * Assign the Dish version to a var
 */
$theme              = wp_get_theme( 'dish' );
$dish_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1440; /* pixels */
}

$dish = (object) array(
	'version'    => $dish_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-dish.php',
	'customizer' => require 'inc/customizer/class-dish-customizer.php',
);

require 'inc/dish-functions.php';
require 'inc/dish-template-hooks.php';
require 'inc/dish-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$dish->jetpack = require 'inc/jetpack/class-dish-jetpack.php';
}

if ( dish_is_woocommerce_activated() ) {
	$dish->woocommerce            = require 'inc/woocommerce/class-dish-woocommerce.php';
	$dish->woocommerce_customizer = require 'inc/woocommerce/class-dish-woocommerce-customizer.php';

	require 'inc/woocommerce/class-dish-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/dish-woocommerce-template-hooks.php';
	require 'inc/woocommerce/dish-woocommerce-template-functions.php';
	require 'inc/woocommerce/dish-woocommerce-functions.php';
}

if ( is_admin() ) {
	$dish->admin = require 'inc/admin/class-dish-admin.php';

	require 'inc/admin/class-dish-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-dish-nux-admin.php';
	require 'inc/nux/class-dish-nux-guided-tour.php';
	require 'inc/nux/class-dish-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
