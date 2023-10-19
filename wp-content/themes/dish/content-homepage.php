<?php
/**
 * The template used for displaying page content in template-homepage.php
 *
 * @package dish
 */

?>
<?php
$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="<?php dish_homepage_content_styles(); ?>" data-featured-image="<?php echo esc_url( $featured_image ); ?>">
	<div class="col-full">
		<?php
		/**
		 * Functions hooked in to dish_page add_action
		 *
		 * @hooked dish_homepage_header      - 10
		 * @hooked dish_page_content         - 20
		 */
		do_action( 'dish_homepage' );
		?>
	</div>
</div><!-- #post-## -->
