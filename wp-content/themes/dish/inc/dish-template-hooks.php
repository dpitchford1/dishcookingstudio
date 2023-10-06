<?php
/**
 * Dish hooks
 *
 * @package dish
 */

/**
 * General
 *
 * @see  dish_header_widget_region()
 * @see  dish_get_sidebar()
 */
add_action( 'dish_before_content', 'dish_header_widget_region', 10 );
add_action( 'dish_sidebar', 'dish_get_sidebar', 10 );

/**
 * Header
 *
 * @see  dish_skip_links()
 * @see  dish_secondary_navigation()
 * @see  dish_site_branding()
 * @see  dish_primary_navigation()
 */
add_action( 'dish_header', 'dish_header_container', 0 );
add_action( 'dish_header', 'dish_skip_links', 5 );
add_action( 'dish_header', 'dish_site_branding', 20 );
add_action( 'dish_header', 'dish_secondary_navigation', 30 );
add_action( 'dish_header', 'dish_header_container_close', 41 );
add_action( 'dish_header', 'dish_primary_navigation_wrapper', 42 );
add_action( 'dish_header', 'dish_primary_navigation', 50 );
add_action( 'dish_header', 'dish_primary_navigation_wrapper_close', 68 );

/**
 * Footer
 *
 * @see  dish_footer_widgets()
 * @see  dish_credit()
 */
add_action( 'dish_footer', 'dish_footer_widgets', 10 );
add_action( 'dish_footer', 'dish_credit', 20 );

/**
 * Homepage
 *
 * @see  dish_homepage_content()
 */
add_action( 'homepage', 'dish_homepage_content', 10 );

/**
 * Posts
 *
 * @see  dish_post_header()
 * @see  dish_post_meta()
 * @see  dish_post_content()
 * @see  dish_paging_nav()
 * @see  dish_single_post_header()
 * @see  dish_post_nav()
 * @see  dish_display_comments()
 */
add_action( 'dish_loop_post', 'dish_post_header', 10 );
add_action( 'dish_loop_post', 'dish_post_content', 30 );
add_action( 'dish_loop_post', 'dish_post_taxonomy', 40 );
add_action( 'dish_loop_after', 'dish_paging_nav', 10 );
add_action( 'dish_single_post', 'dish_post_header', 10 );
add_action( 'dish_single_post', 'dish_post_content', 30 );
add_action( 'dish_single_post_bottom', 'dish_edit_post_link', 5 );
add_action( 'dish_single_post_bottom', 'dish_post_taxonomy', 5 );
add_action( 'dish_single_post_bottom', 'dish_post_nav', 10 );
add_action( 'dish_single_post_bottom', 'dish_display_comments', 20 );
add_action( 'dish_post_header_before', 'dish_post_meta', 10 );
add_action( 'dish_post_content_before', 'dish_post_thumbnail', 10 );

/**
 * Pages
 *
 * @see  dish_page_header()
 * @see  dish_page_content()
 * @see  dish_display_comments()
 */
add_action( 'dish_page', 'dish_page_header', 10 );
add_action( 'dish_page', 'dish_page_content', 20 );
add_action( 'dish_page', 'dish_edit_post_link', 30 );
add_action( 'dish_page_after', 'dish_display_comments', 10 );

/**
 * Homepage Page Template
 *
 * @see  dish_homepage_header()
 * @see  dish_page_content()
 */
add_action( 'dish_homepage', 'dish_homepage_header', 10 );
add_action( 'dish_homepage', 'dish_page_content', 20 );
