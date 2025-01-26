<?php
/**
 * View: Performers List
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/performers/list.php
 *
 */
$ep_functions = new Eventprime_Basic_Functions;
?>
<?php
if( isset( $args->events->posts ) && ! empty( $args->events->posts ) && count( $args->events->posts ) > 0 ) {?>
    <?php
    switch ( $args->event_args['event_style'] ) {
        case 'card':
        case 'grid':
            $ep_functions->ep_get_template_part( 'events/upcoming-events/views/card', null, $args );
            break;
        case 'mini-list':
        case 'plain_list':
            $ep_functions->ep_get_template_part( 'events/upcoming-events/views/mini-list', null, $args );
            break;
        case 'list':
        case 'rows':
            $ep_functions->ep_get_template_part( 'events/upcoming-events/views/list', null, $args );
            break;
        default: 
            $ep_functions->ep_get_template_part( 'events/upcoming-events/views/mini-list', null, $args );
    }
}