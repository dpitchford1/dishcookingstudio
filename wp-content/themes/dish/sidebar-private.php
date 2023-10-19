<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dish
 */

if ( ! is_active_sidebar( 'sidebar-corporate' ) ) {
	return;
}
?>
<div id="secondary" class="widget-area" role="complementary">
    <h3>Corporate Sidebars.php</h3>
    <h4>Coming from admin</h4>
	<?php dynamic_sidebar( 'sidebar-corporate' ); ?>
</div><!-- #secondary -->
