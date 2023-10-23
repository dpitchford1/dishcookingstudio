<?php
/**
 * View: Upcoming Events - Card View 
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/events/upcoming-events/views/card.php
 *
 */
defined( 'ABSPATH' ) || exit;

foreach( $args->events->posts as $event ) {
    $event_controller = EventM_Factory_Service::ep_get_instance( 'EventM_Event_Controller_List' );
    $event_data = $event_controller->get_single_event( $event->ID );
    $new_window = ( ! empty( ep_get_global_settings( 'open_detail_page_in_new_tab' ) ) ? 'target="_blank"' : '' );
    if( ! empty( $event_data ) ) {?>

<article class="event-card">
    
        <div class="">
            <a href="<?php echo esc_url( $event_data->event_url ); ?>">
                <?php if( ! empty( $event_data->image_url ) ) {?>
                    <img class="card--img" src="<?php echo esc_url( $event_data->image_url ) ?>" alt="<?php echo esc_attr( $event_data->em_name ); ?>"><?php
                } else{?>
                    <img src="<?php echo esc_url( EP_BASE_URL . 'includes/assets/images/dummy_image.png' ) ?>" alt="<?php echo esc_attr( $event_data->em_name ); ?>"><?php
                }?>
            </a>
        </div>

        <?php do_action( 'ep_event_view_before_event_title', $event_data );?>
        
        <div class="card--content">
            
            <h4 class=""><a href="<?php echo esc_url( $event_data->event_url ); ?>"><?php echo esc_html( $event_data->em_name ); ?></a></h4> 
            
            <?php
            // venue
            if( ! empty( $event_data->venue_details ) ) {
                if( ! empty( $event_data->venue_details->name ) ) {?>
                <p class=""><strong>Location:</strong> <?php echo esc_html( $event_data->venue_details->name );?></p>
                <?php }
            }
            // event dates
            if( ! empty( $event_data->em_start_date ) ) {?>
                
            <p class=""><?php do_action( 'ep_event_view_event_dates', $event_data, 'card' );?></p>

            <?php }?>

            <!-- Event Description -->
            <p class="">
                <?php if ( ! empty( $event_data->description ) ) {
                    echo wp_trim_words( wp_kses_post( $event_data->description ), 20 );
                }?>
            </p>

            <!-- Hook after event description -->
            <?php // do_action( 'ep_event_view_after_event_description', $event_data );?>
            
            <!-- Event Price -->
            <?php do_action( 'ep_event_view_event_price', $event_data, 'card' );?>

            <!-- Booking Status -->
            <?php do_action('ep_events_booking_count_slider', $event_data);?>
        

        <?php // do_action( 'ep_event_view_before_event_button', $event_data );?>

        
        <?php do_action('ep_event_view_event_booking_button', $event_data); ?>
        <?php // do_action( 'ep_event_view_after_event_button', $event_data );?>
        </div>
    
</article>

<?php } }?>