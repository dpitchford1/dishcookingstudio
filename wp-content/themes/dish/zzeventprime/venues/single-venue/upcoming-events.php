<?php
/**
 * View: Single Venue - Upcoming Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/venues/single-venue/upcoming-events.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<section class="simple-grid gridx4">
    <h3 class="has--heading">Upcoming Classes <span class="em_events_count-wrap em_bg"></span></h3>

    <?php if( isset( $args->events->posts ) && ! empty( $args->events->posts ) && count( $args->events->posts ) > 0 ) {?>
        <?php
        switch ( $args->event_args['event_style'] ) {
            case 'card':
            case 'grid':  
                ep_get_template_part( 'events/upcoming-events/views/card', null, $args );
                break;
            case 'mini-list': 
            case 'plain_list':
                ep_get_template_part( 'events/upcoming-events/views/mini-list', null, $args );
                break;
            case 'list': 
            case 'rows': 
                ep_get_template_part( 'events/upcoming-events/views/list', null, $args );
                break;
            default: 
                ep_get_template_part( 'events/upcoming-events/views/mini-list', null, $args );
        }?>

    <?php } else{?>
    <div class="ep-alert ep-alert-warning ep-mt-3 ep-py-2">
        <?php esc_html_e( 'No upcoming event found.', 'eventprime-event-calendar-management' ); ?>
    </div>
    <?php }?>
</section>