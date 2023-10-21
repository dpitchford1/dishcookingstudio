<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dish
 */

if ( ! is_active_sidebar( 'sidebar-classes' ) ) {
	return;
}
?>
<div id="secondary" class="widget-area" role="complementary">
    <h3>More from Dish</h3>
	<?php dynamic_sidebar( 'sidebar-classes' ); ?>
</div><!-- #secondary -->
