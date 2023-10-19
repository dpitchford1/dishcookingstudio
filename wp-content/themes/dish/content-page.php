<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package dish
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to dish_page add_action
	 *
	 * @hooked dish_page_header          - 10
	 * @hooked dish_page_content         - 20
	 */
	do_action( 'dish_page' );
	?>
</article><!-- #post-## -->
