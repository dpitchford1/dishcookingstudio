<?php // @codingStandardsIgnoreLine.
/**
 * Class to create a Customizer control for displaying information
 *
 * @package  dish
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The 'more' Dish control class
 */
class More_Dish_Control extends WP_Customize_Control {

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">

			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

			<p>
				<?php
					/* translators: 1: Dish, 2: start <a> tag, 3: Dish, 4: end <a> tag */
					printf( esc_html__( 'There\'s a range of %1$s extensions available to put additional power in your hands. Check out the %2$s%3$s%4$s page in your dashboard for more information.', 'dish' ), 'Dish', '<a href="' . esc_url( admin_url() . 'themes.php?page=dish-welcome' ) . '">', 'Dish', '</a>' );
				?>
			</p>

			<span class="customize-control-title">
				<?php
					/* translators: %s: Dish */
					printf( esc_html__( 'Enjoying %s?', 'dish' ), 'Dish' );
				?>
			</span>

			<p>
				<?php
					/* translators: 1: start <a> tag, 2: end <a> tag */
					printf( esc_html__( 'Why not leave us a review on %1$sWordPress.org%2$s?  We\'d really appreciate it!', 'dish' ), '<a href="https://wordpress.org/themes/dish">', '</a>' );
				?>
			</p>

		</label>
		<?php
	}
}
