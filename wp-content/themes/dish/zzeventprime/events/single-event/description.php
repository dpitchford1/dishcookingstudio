<!-- Class Format -->
<?php if( ! empty( $args->event->em_event_type ) ) {
    $styles = '';
    $styles .= ( ! empty( $args->event->event_type_details->em_color ) ? 'background-color:' . $args->event->event_type_details->em_color . ';' : '');
    $styles .= ( ! empty( $args->event->event_type_details->em_type_text_color ) ? 'color:' . $args->event->event_type_details->em_type_text_color . ';' : '');?>
    
    <p><strong>Class Format:</strong> <a href="/class-formats/"><span class="ep-bg-warning ep-py-2 ep-px-3 ep-mr-3" id="ep_single_event_event_type" style="<?php echo esc_attr( $styles );?>">
    <?php if( ! empty( $args->event->event_type_details ) ) { echo esc_html( $args->event->event_type_details->name ); }?>
    
    </span></a></p>
    
<?php }?>


<div class="" id="ep_single_event_description">
    <?php $content = apply_filters( 'the_content', $args->post->post_content ); echo $content;?>

<?php
// Attendee Note
    if( ! empty( $args->event->em_audience_notice ) && empty( ep_get_global_settings('hide_note_section') ) ) {?>

        <h4 class="">
            <?php esc_html_e( 'Attendee Note', 'eventprime-event-calendar-management' );?>
        </h4>
        <p><em><?php echo esc_html( $args->event->em_audience_notice );?></em></p>
    <?php }?>
<?php ?>

</div>