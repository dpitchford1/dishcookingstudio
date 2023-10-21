<?php
/**
 * View: Single Performer
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/performers/single-ep-performer.php
 *
 */
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            $performers = EventM_Factory_Service::ep_get_instance( 'EventM_Performer_Controller_List' );
            echo wp_kses_post( $performers->render_post_content() );
            ?>
            
        <?php endwhile; // end of the loop. ?>

        <?php // comments_template(); ?>

        </main><!-- #main -->
	</div><!-- #primary -->
    <?php get_sidebar( 'recipes' ); ?>
<?php get_footer(); ?>