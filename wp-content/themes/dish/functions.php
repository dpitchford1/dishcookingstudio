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
require 'inc/template-dev.php';

// if ( class_exists( 'Jetpack' ) ) {
// 	$dish->jetpack = require 'inc/jetpack/class-dish-jetpack.php';
// }

if ( dish_is_woocommerce_activated() ) {
	$dish->woocommerce            = require 'inc/woocommerce/class-dish-woocommerce.php';
	$dish->woocommerce_customizer = require 'inc/woocommerce/class-dish-woocommerce-customizer.php';

	require 'inc/woocommerce/class-dish-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/dish-woocommerce-template-hooks.php';
	require 'inc/woocommerce/dish-woocommerce-template-functions.php';
	require 'inc/woocommerce/dish-woocommerce-functions.php';
}

if ( is_admin() ) {
	// $dish->admin = require 'inc/admin/class-dish-admin.php';

	// require 'inc/admin/class-dish-plugin-install.php';

    // unregister all widgets
    function unregister_default_widgets() {

        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Media_Audio');
        unregister_widget('WP_Widget_Media_Video');
        unregister_widget('WP_Widget_RSS');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_Search');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Nav_Menu_Widget');
        unregister_widget('WP_Widget_Custom_HTML');

        // woo
        unregister_widget('WC_Widget_Cart');
        unregister_widget('WC_Widget_Product_Tag_Cloud');
        // unregister_widget('WC_Widget_Cart');
        // unregister_widget('WC_Widget_Cart');


        // Events
        unregister_widget('eventm_event_countdown');
        unregister_widget('eventm_calendar');
        // unregister_widget('eventm_event_countdown');
        // unregister_widget('eventm_event_countdown');
        // unregister_widget('eventm_event_countdown');
        // unregister_widget('eventm_event_countdown');

        // unregister_widget('WP_Widget_Pages');
        // unregister_widget('WP_Widget_Archives');
        // unregister_widget('WP_Widget_Text');
        // unregister_widget('WP_Widget_Categories');
        // unregister_widget('WP_Widget_Media_Image');
    }
    add_action('widgets_init', 'unregister_default_widgets', 11);




    function remove() {

        // calendar?
        wp_dequeue_style( 'ep-front-event-calendar-css' );
        wp_deregister_style( 'ep-front-event-calendar-css' );

        // events?
        wp_dequeue_style( 'ep-front-events-css' );
        wp_deregister_style( 'ep-front-events-css' );

        // widgets?
        wp_dequeue_style( 'ep-widgets-style' );
        wp_deregister_style( 'ep-widgets-style' );

    }
    //remove_action( 'wp_print_styles', 'remove', 100 );

    // function custom_dequeue() {
    //     // calendar?
    //     wp_dequeue_style( 'ep-front-event-calendar-css' );
    //     wp_deregister_style( 'ep-front-event-calendar-css' );

    //     // events?
    //     wp_dequeue_style( 'ep-front-events-css' );
    //     wp_deregister_style( 'ep-front-events-css' );

    //     // widgets?
    //     wp_dequeue_style( 'ep-widgets-style' );
    //     wp_deregister_style( 'ep-widgets-style' );
    
    // }
    
    // add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );
    // add_action( 'wp_head', 'custom_dequeue', 9999 );

}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
// if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
// 	require 'inc/nux/class-dish-nux-admin.php';
// 	require 'inc/nux/class-dish-nux-guided-tour.php';
// 	require 'inc/nux/class-dish-nux-starter-content.php';
// }

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
