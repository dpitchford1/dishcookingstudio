<?php
/**
 * View: Single Venue
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/venues/single-ep-venue.php
 *
 */
defined( 'ABSPATH' ) || exit;

get_header(); ?>
<main id="primary" class="content-area" role="main">

    <?php
    $venue = EventM_Factory_Service::ep_get_instance( 'EventM_Venue_Controller_List' );
    echo wp_kses_post( $venue->render_term_content() );
    ?>

</main><!-- #primary -->
<?php get_sidebar( 'recipes' ); ?>
<?php get_footer();