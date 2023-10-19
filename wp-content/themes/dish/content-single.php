<?php
/**
 * Template used to display post content on single pages.
 *
 * @package dish
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
do_action( 'dish_single_post_top' );
/**
 * Functions hooked into dish_single_post add_action
 *
 * @hooked dish_post_header          - 10
 * @hooked dish_post_content         - 30
 */
do_action( 'dish_single_post' );
/**
 * Functions hooked in to dish_single_post_bottom action
 *
 * @hooked dish_post_nav         - 10
 * @hooked dish_display_comments - 20
 */
do_action( 'dish_single_post_bottom' );
?>
</article><!-- #post-## -->