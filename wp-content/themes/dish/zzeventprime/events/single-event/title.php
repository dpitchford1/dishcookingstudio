<div class="ep-box-col-12" id="ep-sl-event-name">
    <h2 class="ep-fw-bold ep-fs-2 ep-mt-3 ep-border-left ep-border-3 ep-border-warning ep-ps-3" id="ep_single_event_title">
        <?php echo esc_html( $args->post->post_title );?>
    </h2>
</div>
<div class="ep-event-category ep-box-row">
    <?php if( ! empty( $args->event->em_event_type ) ) {
        $styles = '';
        $styles .= ( ! empty( $args->event->event_type_details->em_color ) ? 'background-color:' . $args->event->event_type_details->em_color . ';' : '');
        $styles .= ( ! empty( $args->event->event_type_details->em_type_text_color ) ? 'color:' . $args->event->event_type_details->em_type_text_color . ';' : '');?>
        <div class="ep-box-col-12">
            <p><strong>Class Format:</strong> <span class="ep-bg-warning ep-py-2 ep-px-3 ep-mr-3" id="ep_single_event_event_type" style="<?php echo esc_attr( $styles );?>">
                <?php
                if( ! empty( $args->event->event_type_details ) ) {
                    echo esc_html( $args->event->event_type_details->name );
                }?>
            </span></p>
        </div><?php
    }?>
</div>