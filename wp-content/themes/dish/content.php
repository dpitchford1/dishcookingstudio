<?php
/**
 * Template used to display post content.
 *
 * @package dish
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
/**
 * Functions hooked in to dish_loop_post action.
 *
 * @hooked dish_post_header          - 10
 * @hooked dish_post_content         - 30
 * @hooked dish_post_taxonomy        - 40
 */
do_action( 'dish_loop_post' );
?>
</article><!-- #post-## -->