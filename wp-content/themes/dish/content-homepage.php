<?php
/**
 * The template used for displaying page content in template-homepage.php
 *
 * @package dish
 */

?>
<?php
$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
$home = get_field('main_hero'); // 'main' is level 1
$button1 = get_field('button_1');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="<?php dish_homepage_content_styles(); ?>" data-featured-image="<?php echo esc_url( $featured_image ); ?>">
	<div class="">
        
		<?php
		/**
		 * Functions hooked in to dish_page add_action
		 *
		 * @hooked dish_homepage_header      - 10
		 * @hooked dish_page_content         - 20
		 */
		do_action( 'dish_homepage' );
		?>
        <h3>Main Content here</h3>
        <?php if( have_rows('main_hero') ): ?>
            <?php while( have_rows('main_hero') ): the_row();?>
            <!-- <img src="<?php the_sub_field('main_image'); ?>" alt=""> -->

            <div style="background-image: url('<?php the_sub_field('main_image'); ?>'); background-repeat: no-repeat; min-height: 720px; text-align: center; padding-top: 3em; color: #fff;">
                <?php the_sub_field('feature_copy'); ?>
                <!-- <p><a href="<?php the_sub_field('button_1'); ?>">Book A Class</a></p> -->
               
                <?php 
                // don't forget to replace 'link' with your field name
                    if ($button1) {
                        // if the 'target' is presented, it's a bool. We've to convert it into the HTML format  
                        $target = isset($button1['target']) && $button1['target'] ? '_blank' : '_self';
                        // displays the link. Each %s in the string will be replaced with the related argument
                        printf("<a href='%s' target='%s'>%s</a>", esc_url($button1['url']), esc_html($target), esc_attr($button1['title']));
                    }
                ?>
            </div>
            
            
            

            <?php // the_sub_field('button_2'); ?>

            

            <?php endwhile; ?>
        <?php endif; ?>
	</div>
</div><!-- #post-## -->
