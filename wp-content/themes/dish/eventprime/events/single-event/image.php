<?php
$event_gallery = ( ! empty( $args->event->em_gallery_image_ids ) ? $args->event->em_gallery_image_ids : '' );
if( ! empty( $args->event->image_url ) || ! empty( $event_gallery ) ) {?>

<figure class="card-img--wrap">
    <div class="ep-box-col-12" id="ep_single_event_image">
        <div class="ep-single-event-slide-container ep-text-center">
        <?php if( empty( $event_gallery ) ) {?>
            <img src="<?php echo esc_url( $args->event->image_url );?>" alt="<?php echo esc_attr( $args->event->name ); ?>" class="card--img" />
        <?php } else{?>
            <ul class="ep-rslides ep-m-0 ep-p-0" id="ep_single_event_image_gallery">
            <?php $event_gallery = explode( ',', $event_gallery );
            if( ! empty( $args->event->image_url ) && ! empty( has_post_thumbnail( $args->event->em_id ) ) ) {?>
                <li class="ep-m-0 ep-p-0">
                    <img src="<?php echo esc_url( $args->event->image_url );?>" alt="<?php echo esc_attr( $args->event->name );?>" class="card--img">
                </li>
            <?php }
            foreach( $event_gallery as $image ){ $gal_url = wp_get_attachment_image_url( $image, 'large' );
                if( ! empty( $gal_url ) ) {?>
                <li><img src="<?php echo esc_url( $gal_url );?>" alt="<?php echo esc_attr( $args->event->name );?>" class="card--img"></li>
            <?php } }?>
            </ul>
        <?php }?>      
            <div class="ep-single-event-nav"></div>
        </div>
    </div>

    <figcaption class="detail--socials">
        <!-- Social Information -->
        <?php if ( ! empty( $args->event->em_social_links ) ) { ?>
            <?php if ( ! empty( $args->event->em_social_links['facebook'] ) ) { ?>
                <a href="<?php echo esc_url( $args->event->em_social_links['facebook'] ); ?>" target="_blank" class="ep-facebook-f ep-px-2">
                    <?php $image_url = EP_BASE_URL . 'includes/assets/images/facebook-icon.png'; ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" width="24" alt="Facebook">
                </a><?php
            }
            if ( ! empty( $args->event->em_social_links['instagram'] ) ) { ?>
                <a href="<?php echo esc_url( $args->event->em_social_links['instagram'] ); ?>" target="_blank" class="ep-instagram ep-px-2">
                    <?php $image_url = EP_BASE_URL . 'includes/assets/images/instagram-icon.png'; ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" width="24" alt="Instagram">
                </a><?php
            }
            if ( ! empty( $args->event->em_social_links['linkedin'] ) ) { ?>
                <a href="<?php echo esc_url( $args->event->em_social_links['linkedin'] ); ?>" target="_blank" class="ep-linkedin ep-px-2">
                    <?php $image_url = EP_BASE_URL . 'includes/assets/images/linkedin-icon.png'; ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" width="24" alt="LinkedIn">
                </a><?php
            }
            if ( ! empty( $args->event->em_social_links['twitter'] ) ) { ?>
                <a href="<?php echo esc_url( $args->event->em_social_links['twitter'] ); ?>" target="_blank" class="ep-twitter ep-px-2">
                    <?php $image_url = EP_BASE_URL . 'includes/assets/images/twitter-icon.png'; ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" width="24" alt="X">
                </a><?php
            }
            if ( ! empty( $args->event->em_social_links['youtube'] ) ) { ?>
                <a href="<?php echo esc_url( $args->event->em_social_links['youtube'] ); ?>" target="_blank" class="ep-youtube ep-px-2">
                    <?php $image_url = EP_BASE_URL . 'includes/assets/images/youtube-icon.png'; ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" width="24" alt="Youtube">
                </a><?php
            }
        } ?>
        <div class="ep-sl-event-action ep-cursor ep-position-relative ep-event-ical-action">
            <p><span class="material-icons-outlined ep-exp-dropbtn ep-mr-3 ep-cursor">calendar_month</span> Add to Calendar</p>
            
            <ul class="ep-calendar-exp-dropdown-content ep-event-share ep-m-0 ep-p-0">
                <li class="ep-event-social-icon"><a href="javascript:void();"  id="ep_event_ical_export" data-event_id="<?php echo esc_attr( $args->event->id );?>"><?php esc_html_e( 'iCal Export','eventprime-event-calendar-management' ); ?></a></li>
                <?php
                // add to google calendar 
                $gcal_starts = $gcal_ends = $gcal_details = $location = $calendar_url = '';
                $gcal_starts = ep_convert_event_date_time_to_timestamp( $args->event, 'start' );
                if( ! empty( $gcal_starts ) ) {
                    $gcal_ends = ep_convert_event_date_time_to_timestamp( $args->event, 'end' );
                }
                $gcal_details = urlencode( wp_kses_post( $args->event->description ) );
                $calendar_url = 'https://www.google.com/calendar/event?action=TEMPLATE&text=' . urlencode( esc_attr( $args->event->name ) ) . '&dates=' . gmdate( 'Ymd\\THi00\\Z', esc_attr( $gcal_starts ) ) . '/' . gmdate('Ymd\\THi00\\Z', esc_attr( $gcal_ends ) ) . '&details=' . esc_attr( $gcal_details );
                if ( ! empty( $args->event->venue_details ) ) {
                    $location = urlencode( $args->event->venue_details->em_address );
                    if( ! empty( $location ) ) {
                        $calendar_url .= '&location=' . esc_attr( $location );
                    }
                }
        
                if( ! empty( $gcal_starts ) && ! empty( $gcal_ends ) ) {?>
                <li class="ep-event-social-icon"> <a href="<?php echo esc_url( $calendar_url );?>" target="_blank"><?php esc_html_e( 'Google Calendar','eventprime-event-calendar-management' ); ?></a></li>
                <?php }

                // add to Outlook 365  
                $outlook_starts = $outlook_ends = $outlook_details = $location = $outlook_url = '';
                $outlook_starts = ep_convert_event_date_time_to_timestamp( $args->event, 'start' );
                if( ! empty( $outlook_starts ) ) {
                    $outlook_ends = ep_convert_event_date_time_to_timestamp( $args->event, 'end' );
                }
                $outlook_details = urlencode( wp_kses_post( $args->event->description ) );
                $outlook_url = 'https://outlook.office365.com/owa/?path=/calendar/action/compose&subject=' . rawurlencode( esc_attr( $args->event->name ) ) . '&startdt='.date( 'Y-m-d\TH:i:s', $outlook_starts ).'&enddt='.date( 'Y-m-d\TH:i:s', $outlook_ends );
                if ( ! empty( $args->event->venue_details ) ) {
                    $location = urlencode( $args->event->venue_details->em_address );
                    if( ! empty( $location ) ) {
                        $outlook_url .= '&location=' . esc_attr( $location );
                    }
                }
                if ( ! empty( $outlook_details ) ) {
                    $outlook_url .= '&body=' . $outlook_details;
                }
                
                if( ! empty( $outlook_starts ) && ! empty( $outlook_ends ) ) {?>
                    <li class="ep-event-social-icon"><a href="<?php echo esc_url( $outlook_url );?>" target="_blank"><?php esc_html_e( 'Outlook 365','eventprime-event-calendar-management' ); ?></a></li>
                <?php  }

                // add to Outlook Live 
                $outlook_lv_starts = $outlook_lv_ends = $outlook_lv_details = $location = $outlook_lv_url = '';
                $outlook_lv_starts = ep_convert_event_date_time_to_timestamp( $args->event, 'start' );
                if( ! empty( $outlook_lv_starts ) ) {
                    $outlook_lv_ends = ep_convert_event_date_time_to_timestamp( $args->event, 'end' );
                }
                $outlook_lv_details = urlencode( wp_kses_post( $args->event->description ) );
                $outlook_lv_url = "https://outlook.live.com/owa/?path=/calendar/action/compose&startdt=".date( 'Ymd\THis\Z', $outlook_lv_starts )."&enddt=".date( 'Ymd\THis\Z', $outlook_lv_ends )."&subject=".rawurlencode( esc_attr( $args->event->name ) );
                if ( ! empty( $args->event->venue_details ) ) {
                    $location = urlencode( $args->event->venue_details->em_address );
                    if( ! empty( $location ) ) {
                        $outlook_lv_url .= '&location=' . esc_attr( $location );
                    }
                }
                if ( ! empty( $outlook_lv_details ) ) {
                    $outlook_lv_url .= '&body=' . $outlook_lv_details;
                }
                
                if( ! empty( $outlook_lv_starts ) && ! empty( $outlook_lv_ends ) ) {?>
                    <li class="ep-event-social-icon"><a href="<?php echo esc_url( $outlook_lv_url );?>" target="_blank"><?php esc_html_e( 'Outlook Live','eventprime-event-calendar-management' ); ?></a></li>
                <?php } ?>
            </ul>

        </div>
    </figcaption>
</figure>

<?php }?>

