<?php
/*
Plugin Name:        Head Cleanup
Plugin URI:         
Description:        Robust Head Cleanup to remove WP cruft - New WP install, Storefront theme, WC install.
Version:            1.0.0
Author:             Dylan Pitchford
Author URI:         
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'cleanup' ) ) :

	/**
	 * The main markup cleanup class
	 */
	class cleanup {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'language_attributes', array( $this, 'add_opengraph_doctype' ) );
			add_action( 'stop_heartbeat', array( $this, 'stop_heartbeat' ) );
			add_action( 'init', array( $this, 'disable_emojis' ) );
			add_action( 'tiny_mce_plugins', array( $this, 'disable_emojis_tinymce' ) );
			add_action( 'wp_resource_hints', array( $this, 'disable_emojis_remove_dns_prefetch' ), 10, 2 );
			add_action( 'wp_enqueue_scripts', array( $this, 'head_shampoo' ), 20 );

            // deal with all the general and global CSS BS
            add_action( 'wp_enqueue_scripts', array( $this, 'general_css_cleanup' ), 20 );
            add_action( 'wp_enqueue_scripts', array( $this, 'plugins_cleanup' ), 20 );

            // add_action( 'wp_enqueue_scripts', array( $this, 'woocommerce_cleanup' ), 20 );
            // add_action( 'wp_enqueue_scripts', array( $this, 'events_cleanup' ), 20 );

		}

/**
 * Ass Opengraph to html tag
 *
 * @since 2.4.0
 */
public function add_opengraph_doctype($output){
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}

/**
 * Disable Heartbeat API
 */
public function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}


/****************************************
* REMOVE WP EXTRAS *
****************************************/

/**
 * Disable the emoji's
 */
public function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	//add_filter( 'emoji_svg_url', '__return_false' );
}

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
public function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
public function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
return $urls;
}		

/**
 * Cleanup the WP Head
 */
public function head_shampoo() {
    // Remove unwanted SVG filter injection WP
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

    add_filter( 'wp_resource_hints', '__return_empty_array', 99 );

    // Remove junk from the head
    add_filter( 'feed_links_show_comments_feed', '__return_false' );

    // remove WP version from RSS
    remove_action('wp_head', 'wp_generator');
    add_filter( 'the_generator', 'ks_rss_version' ); 
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);

    // Disable cookies for comments
    remove_action('set_comment_cookies', 'wp_set_comment_cookies');

    remove_action( 'wp_head', 'rsd_link' );

    //Remove REST API link tag
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

    // disable REST API link in HTTP headers
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

    // Disable converting :) to smileys
    remove_filter('the_content', 'convert_smilies');

    //Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');
    
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
    
    //Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    
    //Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    
    //Remove oEmbed JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

/**
 * Disable All CSS output - files and inline - site, block editor, customizer etc.
 * Hard code links to site.css - create customizer.css and hard code, OR, enqueue the new files (whichever you prefer) 
 * Saves 30kb of html size and cache files
 * Disable google fonts loading in functions file, and add @font-face rules into customizer (or somewhere else) for SELF HOSTING fonts
 */
public function general_css_cleanup() {
    wp_deregister_style( 'dish-style' );
    wp_dequeue_style( 'dish-style-inline' );

    wp_deregister_style( 'classic-theme-styles' );
    wp_dequeue_style( 'classic-theme-styles' );

    wp_deregister_style( 'global-styles' );
    wp_dequeue_style( 'global-styles' );

    wp_deregister_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library' );

    // vendors and wc-blocks
    wp_deregister_style( 'wc-blocks-style' );
    wp_dequeue_style( 'wc-blocks-style' );

    wp_deregister_style( 'dish-gutenberg-blocks' );
    wp_dequeue_style( 'dish-gutenberg-blocks' );

    wp_deregister_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wp-block-library-theme' );
}

/**
 * Additional Plugins cleanup - Opiniated
 * Create new plugins css file to load, disable all css from plugins, combine it all into 1 file to load.
 */
public function plugins_cleanup() {
    // FAQ's
    wp_deregister_style( 'quick-and-easy-faqs' );
    wp_dequeue_style( 'quick-and-easy-faqs' );

    // CF7
    // wp_deregister_style( 'quick-and-easy-faqs' );
    // wp_dequeue_style( 'quick-and-easy-faqs' );
}

/**
 * Woocommerce Cleanup
 */
public function woocommerce_cleanup() {
    wp_dequeue_style( 'select2' );

    // vendors and wc-blocks
    wp_deregister_style( 'wc-blocks-style' );
    wp_dequeue_style( 'wc-blocks-style' );

    wp_deregister_style( 'woocommerce-general' );
    wp_dequeue_style( 'woocommerce-general' );

    wp_deregister_style( 'woocommerce-layout' );
    wp_dequeue_style( 'woocommerce-layout' );

    wp_deregister_style( 'dish-woocommerce-style-inline' );
    wp_dequeue_style( 'dish-woocommerce-style-inline' );

    wp_deregister_style( 'woocommerce-inline' );
    wp_dequeue_style( 'woocommerce-inline' );

    wp_deregister_style( 'wc-all-blocks-style' );
    wp_dequeue_style( 'wc-all-blocks-style' );

    wp_deregister_style( 'dish-gutenberg-blocks' );
    wp_dequeue_style( 'dish-gutenberg-blocks' );

    wp_deregister_style( 'woocommerce-smallscreen' );
    wp_dequeue_style( 'woocommerce-smallscreen' );
}

/**
 * Events Cleanup
 */
public function events_cleanup() {
    // remove all EventPrime CSS
    wp_dequeue_style( 'ep-public-css' );
    wp_dequeue_style( 'ep-material-fonts' );
    wp_dequeue_style( 'ep-toast-css' );

    // wp_deregister_style( 'em-front-jquery-ui' );
    // wp_dequeue_style( 'em-front-jquery-ui' );
    // wp_dequeue_style( 'em-front-select2-css' );
    // wp_dequeue_style( 'ep-front-event-calendar-css' );
    // wp_dequeue_style( 'ep-front-events-css' );
    // wp_dequeue_style( 'ep-responsive-slides-css' );

    // contact form
    wp_deregister_script( 'ep-responsive-slides-js' );
    wp_deregister_script( 'masonry' );

    wp_deregister_script( 'ep-front-events-js' );
    wp_deregister_script( 'ep-front-events-js-js' );
    wp_deregister_script( 'ep-front-event-fulcalendar-local-js' );
    wp_deregister_script( 'ep-front-event-fulcalendar-moment-js' );
    wp_deregister_script( 'ep-front-event-calendar-js' );

    wp_deregister_script( 'jquery-ui-core' );
    wp_dequeue_script( 'em-front-select2-js' );
    wp_dequeue_script( 'ep-front-event-moment-js' );
}

  

}
endif;

return new cleanup();

?>