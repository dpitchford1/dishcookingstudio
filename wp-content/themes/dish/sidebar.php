<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dish
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div id="secondary" class="widget-area" role="complementary">
    <h3>More from Dish</h3>
    <?php
        if ( is_page_template('template-corporate.php') ) {
            dynamic_sidebar( 'corporate' );
        }elseif ( is_page_template('template-classes.php') ){
            dynamic_sidebar( 'classes' );
        }elseif ( is_page_template('template-recipes.php') ){
            dynamic_sidebar( 'recipes' );
        }else{
            dynamic_sidebar( 'sidebar-1' );
        }  
    ?>
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
