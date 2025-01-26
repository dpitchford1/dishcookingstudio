<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Home
 *
 * @package dish
 */

get_header(); ?>


    <main id="main" class="site-main" role="main">
        <style>
            /* .has-post-thumbnail {
	left: 50%;
	margin-left: -50vw;
	margin-right: -50vw;
	max-width: 100vw;
	position: relative;
	right: 50%;
	width: 100vw; */
}
        </style>
        <?php
        while ( have_posts() ) :
            the_post();

            do_action( 'dish_page_before' );

            get_template_part( 'content-homepage', 'page' );

            /**
             * Functions hooked in to dish_page_after action
             *
             * @hooked dish_display_comments - 10
             */
            do_action( 'dish_page_after' );

        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->

<?php
get_footer();
