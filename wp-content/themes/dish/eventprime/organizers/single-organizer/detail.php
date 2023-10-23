<?php
/**
 * View: Single Organizer - Detail
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/organizers/single-organizer/detail.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<div class="detail-card--content">
    <h2 class="ep-single-box-title ep-organizer-name"><?php echo esc_html( $args->organizer->name ); ?></h2>

    <ul class="detail--contacts">
        <li> 
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/email-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="email">
            <?php 
            if ( ! empty( $args->organizer->em_organizer_emails ) && count( $args->organizer->em_organizer_emails ) > 0 && ! empty( $args->organizer->em_organizer_emails[0] ) ) { 
                foreach( $args->organizer->em_organizer_emails as $key => $val ) {
                    $args->organizer->em_organizer_emails[$key] = '<a href="mailto:'.$val.'">'.htmlentities( $val ).'</a>';
                }
                echo implode( ', ', $args->organizer->em_organizer_emails ); 
            } else {
                esc_html_e( 'Not Available', 'eventprime-event-calendar-management' );
            } ?>
        </li>
        <li>
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/phone-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="phone number">
            <?php if ( ! empty( $args->organizer->em_organizer_phones ) && count( $args->organizer->em_organizer_phones ) > 0  && ! empty( $args->organizer->em_organizer_phones[0] ) ) {
                echo implode( ', ', $args->organizer->em_organizer_phones ); 
            }else {
                esc_html_e( 'Not Available', 'eventprime-event-calendar-management' );
            } ?>
        </li>

        <li>
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/website-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="website">
            <?php if ( ! empty( $args->organizer->em_organizer_websites ) && count( $args->organizer->em_organizer_websites ) > 0 && ! empty( $args->organizer->em_organizer_websites[0] ) ) { 
                foreach( $args->organizer->em_organizer_websites as $key => $val ) {
                    if( ! empty( $val ) ){
                        $args->organizer->em_organizer_websites[$key] = '<a href="'.$val.'" rel="me">'.htmlentities( $val ).'</a>';
                    }
                }
                echo implode( ', ', $args->organizer->em_organizer_websites ); 
            } else {
                esc_html_e( 'Not Available', 'eventprime-event-calendar-management' ); 
            }?>
        </li>
    </ul>

    <!-- Description -->
    <div class="detail--description">
    <?php if ( isset( $args->organizer->description ) && $args->organizer->description !== '' ) {
        echo wpautop( wp_kses_post( $args->organizer->description ) );
    } else{
        esc_html_e( 'No description available', 'eventprime-event-calendar-management' );
    }?>
    </div>

</div>