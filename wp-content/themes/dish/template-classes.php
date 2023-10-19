<?php
/**
 * The template for displaying event pages.
 *
 * Template Name: Classes
 *
 * @package dish
 */

get_header(); ?>
<?php 
// global $wp_styles;
// echo '<pre>';
// var_dump($wp_styles);
// echo '</pre>';
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        while ( have_posts() ) :
            the_post();

            do_action( 'dish_page_before' );

            get_template_part( 'content', 'page' );

            /**
             * Functions hooked in to dish_page_after action
             *
             * @hooked dish_display_comments - 10
             */
            do_action( 'dish_page_after' );

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->   
<?php get_sidebar( 'classes' ); ?>
<?php
get_footer();
