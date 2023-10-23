<?php
/**
 * View: Single Organizer
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/organizers/single-ep-event-organizer.php
 *
 */
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="content-area" role="main">

    <?php
    $event_organizer = EventM_Factory_Service::ep_get_instance( 'EventM_Organizer_Controller_List' );
    echo wp_kses_post( $event_organizer->render_term_content() );
    ?>

</main><!-- #primary -->
<?php get_sidebar( 'recipes' ); ?>
<?php get_footer();