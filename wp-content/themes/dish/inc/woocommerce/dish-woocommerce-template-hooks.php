<?php
/**
 * Dish WooCommerce hooks
 *
 * @package dish
 */

/**
 * Homepage
 *
 * @see  dish_product_categories()
 * @see  dish_recent_products()
 * @see  dish_featured_products()
 * @see  dish_popular_products()
 * @see  dish_on_sale_products()
 * @see  dish_best_selling_products()
 */
add_action( 'homepage', 'dish_product_categories', 20 );
add_action( 'homepage', 'dish_recent_products', 30 );
add_action( 'homepage', 'dish_featured_products', 40 );
add_action( 'homepage', 'dish_popular_products', 50 );
add_action( 'homepage', 'dish_on_sale_products', 60 );
add_action( 'homepage', 'dish_best_selling_products', 70 );

/**
 * Layout
 *
 * @see  dish_before_content()
 * @see  dish_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  dish_shop_messages()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_main_content', 'dish_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'dish_after_content', 10 );
add_action( 'dish_content_top', 'dish_shop_messages', 15 );
add_action( 'dish_before_content', 'woocommerce_breadcrumb', 10 );

add_action( 'woocommerce_after_shop_loop', 'dish_sorting_wrapper', 9 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 30 );
add_action( 'woocommerce_after_shop_loop', 'dish_sorting_wrapper_close', 31 );

add_action( 'woocommerce_before_shop_loop', 'dish_sorting_wrapper', 9 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'dish_woocommerce_pagination', 30 );
add_action( 'woocommerce_before_shop_loop', 'dish_sorting_wrapper_close', 31 );

add_action( 'dish_footer', 'dish_handheld_footer_bar', 999 );

/**
 * Products
 *
 * @see dish_edit_post_link()
 * @see dish_upsell_display()
 * @see dish_single_product_pagination()
 * @see dish_sticky_single_add_to_cart()
 */
add_action( 'woocommerce_single_product_summary', 'dish_edit_post_link', 60 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'dish_upsell_display', 15 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );

add_action( 'woocommerce_after_single_product_summary', 'dish_single_product_pagination', 30 );
add_action( 'dish_after_footer', 'dish_sticky_single_add_to_cart', 999 );

/**
 * Header
 *
 * @see dish_product_search()
 * @see dish_header_cart()
 */
add_action( 'dish_header', 'dish_product_search', 40 );
add_action( 'dish_header', 'dish_header_cart', 60 );

/**
 * Cart fragment
 *
 * @see dish_cart_link_fragment()
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'dish_cart_link_fragment' );

/**
 * Integrations
 *
 * @see dish_woocommerce_brands_archive()
 * @see dish_woocommerce_brands_single()
 * @see dish_woocommerce_brands_homepage_section()
 */
if ( class_exists( 'WC_Brands' ) ) {
	add_action( 'woocommerce_archive_description', 'dish_woocommerce_brands_archive', 5 );
	add_action( 'woocommerce_single_product_summary', 'dish_woocommerce_brands_single', 4 );
	add_action( 'homepage', 'dish_woocommerce_brands_homepage_section', 80 );
}
