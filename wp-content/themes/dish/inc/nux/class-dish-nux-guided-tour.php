<?php
/**
 * Dish NUX Guided Tour Class
 *
 * @package  dish
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Dish_NUX_Guided_Tour' ) ) :

	/**
	 * The Dish NUX Guided Tour class
	 */
	class Dish_NUX_Guided_Tour {
		/**
		 * Setup class.
		 *
		 * @since 2.2.0
		 */
		public function __construct() {
			add_action( 'admin_init', array( $this, 'customizer' ) );
		}

		/**
		 * Customizer.
		 *
		 * @since 2.2.0
		 */
		public function customizer() {
			global $pagenow;

			if ( 'customize.php' === $pagenow && false === (bool) get_option( 'dish_nux_guided_tour', false ) ) {
				add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_scripts' ) );
				add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_templates' ) );

				if ( current_user_can( 'manage_options' ) ) {

					// Set Guided Tour flag so it doesn't show up again.
					update_option( 'dish_nux_guided_tour', true );
				}
			}
		}

		/**
		 * Customizer enqueues.
		 *
		 * @since 2.2.0
		 */
		public function customize_scripts() {
			global $dish_version;

			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_style( 'sp-guided-tour', get_template_directory_uri() . '/assets/css/admin/customizer/customizer.css', array(), $dish_version, 'all' );
			wp_style_add_data( 'sp-guided-tour', 'rtl', 'replace' );

			wp_enqueue_script( 'sf-guided-tour', get_template_directory_uri() . '/assets/js/admin/customizer' . $suffix . '.js', array( 'jquery', 'wp-backbone' ), $dish_version, true );

			wp_localize_script( 'sf-guided-tour', '_wpCustomizeSFGuidedTourSteps', $this->guided_tour_steps() );
		}

		/**
		 * Template for steps.
		 *
		 * @since 2.2.0
		 */
		public function print_templates() {
			?>
			<script type="text/html" id="tmpl-sf-guided-tour-step">
				<div class="sf-guided-tour-step">
					<# if ( data.title ) { #>
						<h2>{{ data.title }}</h2>
					<# } #>
					{{{ data.message }}}
					<a class="sf-nux-button" href="#">
						<# if ( data.button_text ) { #>
							{{ data.button_text }}
						<# } else { #>
							<?php esc_attr_e( 'Next', 'dish' ); ?>
						<# } #>
					</a>
					<# if ( ! data.last_step ) { #>
						<a class="sf-guided-tour-skip" href="#">
						<# if ( data.first_step ) { #>
							<?php esc_attr_e( 'No thanks, skip the tour', 'dish' ); ?>
						<# } else { #>
							<?php esc_attr_e( 'Skip this step', 'dish' ); ?>
						<# } #>
						</a>
					<# } #>
				</div>
			</script>
			<?php
		}

		/**
		 * Guided tour steps.
		 *
		 * @since 2.2.0
		 */
		public function guided_tour_steps() {
			$steps = array();

			$steps[] = array(
				'title'       => __( 'Welcome to the Customizer', 'dish' ),
				/* translators: %s: 'End Of Line' symbol */
				'message'     => sprintf( __( 'Here you can control the overall look and feel of your store.%sTo get started, let\'s add your logo', 'dish' ), PHP_EOL . PHP_EOL ),
				'button_text' => __( 'Let\'s go!', 'dish' ),
				'section'     => '#customize-info',
			);

			if ( ! has_custom_logo() ) {
				$steps[] = array(
					'title'   => __( 'Add your logo', 'dish' ),
					'message' => __( 'Open the Site Identity Panel, then click the \'Select Logo\' button to upload your logo.', 'dish' ),
					'section' => 'title_tagline',
				);
			}

			$steps[] = array(
				'title'   => __( 'Customize your navigation menus', 'dish' ),
				'message' => __( 'Organize your menus by adding Pages, Categories, Tags, and Custom Links.', 'dish' ),
				'section' => 'nav_menus',
			);

			$steps[] = array(
				'title'   => __( 'Choose your accent color', 'dish' ),
				'message' => __( 'In the typography panel you can specify an accent color which will be applied to things like links and star ratings. We recommend using your brand color for this setting.', 'dish' ),
				'section' => 'dish_typography',
			);

			$steps[] = array(
				'title'   => __( 'Color your buttons', 'dish' ),
				'message' => __( 'Choose colors for your button backgrounds and text. Once again, brand colors are good choices here.', 'dish' ),
				'section' => 'dish_buttons',
			);

			$steps[] = array(
				'title'       => '',
				/* translators: 1: open <strong> tag, 2: close <strong> tag, 3: 'End Of Line' symbol */
				'message'     => sprintf( __( 'All set! Remember to %1$ssave & publish%2$s your changes when you\'re done.%3$sYou can return to your dashboard by clicking the X in the top left corner.', 'dish' ), '<strong>', '</strong>', PHP_EOL . PHP_EOL ),
				'section'     => '#customize-header-actions .save',
				'button_text' => __( 'Done', 'dish' ),
			);

			return $steps;
		}
	}

endif;

return new Dish_NUX_Guided_Tour();
