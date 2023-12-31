<?php
/**
 * Dish Jetpack Class
 *
 * @package  dish
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Dish_Jetpack' ) ) :

	/**
	 * The Dish Jetpack integration class
	 */
	class Dish_Jetpack {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'jetpack_setup' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'jetpack_scripts' ), 10 );

			if ( dish_is_woocommerce_activated() ) {
				add_action( 'init', array( $this, 'jetpack_infinite_scroll_wrapper_columns' ) );
			}
		}

		/**
		 * Add theme support for Infinite Scroll.
		 * See: http://jetpack.me/support/infinite-scroll/
		 */
		public function jetpack_setup() {
			add_theme_support(
				'infinite-scroll',
				apply_filters(
					'dish_jetpack_infinite_scroll_args',
					array(
						'container'      => 'main',
						'footer'         => 'page',
						'render'         => array( $this, 'jetpack_infinite_scroll_loop' ),
						'footer_widgets' => array(
							'footer-1',
							'footer-2',
							'footer-3',
							'footer-4',
						),
					)
				)
			);
		}

		/**
		 * A loop used to display content appended using Jetpack infinite scroll
		 *
		 * @return void
		 */
		public function jetpack_infinite_scroll_loop() {
			do_action( 'dish_jetpack_infinite_scroll_before' );

			if ( function_exists( 'dish_is_product_archive' ) && dish_is_product_archive() ) {
				do_action( 'dish_jetpack_product_infinite_scroll_before' );
				woocommerce_product_loop_start();
			}

			while ( have_posts() ) :
				the_post();
				if ( function_exists( 'dish_is_product_archive' ) && dish_is_product_archive() ) {
					wc_get_template_part( 'content', 'product' );
				} else {
					get_template_part( 'content', get_post_format() );
				}
			endwhile; // end of the loop.

			if ( function_exists( 'dish_is_product_archive' ) && dish_is_product_archive() ) {
				woocommerce_product_loop_end();
				do_action( 'dish_jetpack_product_infinite_scroll_after' );
			}

			do_action( 'dish_jetpack_infinite_scroll_after' );
		}

		/**
		 * Adds columns wrapper to content appended by Jetpack infinite scroll
		 *
		 * @return void
		 */
		public function jetpack_infinite_scroll_wrapper_columns() {
			add_action( 'dish_jetpack_product_infinite_scroll_before', 'dish_product_columns_wrapper' );
			add_action( 'dish_jetpack_product_infinite_scroll_after', 'dish_product_columns_wrapper_close' );
		}

		/**
		 * Enqueue jetpack styles.
		 *
		 * @since  1.6.1
		 */
		public function jetpack_scripts() {
			global $dish_version;

			if ( wp_style_is( 'the-neverending-homepage', 'enqueued' ) ) {
				wp_enqueue_style( 'dish-jetpack-infinite-scroll', get_template_directory_uri() . '/assets/css/jetpack/infinite-scroll.css', array( 'the-neverending-homepage' ), $dish_version );
				wp_style_add_data( 'dish-jetpack-infinite-scroll', 'rtl', 'replace' );
			}

			wp_enqueue_style( 'dish-jetpack-widgets', get_template_directory_uri() . '/assets/css/jetpack/widgets.css', array(), $dish_version );
			wp_style_add_data( 'dish-jetpack-widgets', 'rtl', 'replace' );
		}
	}

endif;

return new Dish_Jetpack();
