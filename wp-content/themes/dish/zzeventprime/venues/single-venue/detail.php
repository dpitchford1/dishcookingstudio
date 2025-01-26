<?php
/**
 * View: Single Venue - Detail
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/venues/single-venue/detail.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<div class="detail-card--content">
    <h2 class="ep-single-box-title ep-venue-name"><?php echo esc_html( $args->venue->name ); ?></h2>

    <ul class="detail--contacts">
        <?php if ( ! empty( $args->venue->em_established ) ) { ?>
            <li> 
                <?php esc_html_e('Established', 'eventprime-event-calendar-management'); ?>: <?php echo date_i18n( get_option('date_format'), $args->venue->em_established ); ?>
            </li>
            <?php } if( ! empty( $args->venue->em_type ) ) {?>
            <li>
                <?php echo esc_html__( 'Type', 'eventprime-event-calendar-management' ). ': '. esc_html__( ep_get_venue_type_label( $args->venue->em_type ), 'eventprime-event-calendar-management' ); ?>
            </li>
            <?php } if ( ! empty( $args->venue->em_seating_organizer ) ) { ?>
            <li>
                <?php esc_html_e( 'Coordinator', 'eventprime-event-calendar-management' ); ?>: <?php echo esc_html( $args->venue->em_seating_organizer ); ?>
            </li>
            <?php }?>

        <?php if ( ! empty( $args->venue->em_address ) && ! empty( $args->venue->em_display_address_on_frontend ) ) { ?>
            <li class="ep-d-inline-flex ep-box-w-100">
                <div class="em_color ep-fw-bold ep-d-inline-flex" style="min-width: 60px;">
                    <?php esc_html_e( 'Address', 'eventprime-event-calendar-management' ); ?>:  
                </div>
                <div class="kf-venue-address ep-ml-1">
                    <?php echo esc_html( $args->venue->em_address ); ?>
                    <span class="ep-vanue-directions ep-py-2">
                        <a target="blank" href='https://www.google.com/maps?saddr=My+Location&daddr=<?php echo urlencode($args->venue->em_address); ?>&dirflg=w' class="ep-d-inline-flex ep-align-items-center">
                            <?php esc_html_e(' - Get Directions On Google', 'eventprime-event-calendar-management'); ?>
                            <span class="material-icons-outlined ep-fs-6 ep-text-primary ep-align-text-bottom">open_in_new</span>
                        </a>
                    </span>
                </div>
            </li><?php 
        }?>
    </ul>

    <div class="detail--description">
        <?php if ( isset( $args->venue->description ) && $args->venue->description !== '' ) {
            echo wpautop( wp_kses_post( $args->venue->description ) );
        } else {
            esc_html_e( 'No description available', 'eventprime-event-calendar-management' );
        }?>
    </div>

    
    <?php if ( ! empty( $args->venue->em_gallery_images ) && is_array( $args->venue->em_gallery_images ) && count( $args->venue->em_gallery_images ) > 1 ) { ?>
    <!-- single venue gallery images -->
    <div class="ep-single-box-info">
        <div class="ep-single-box-content">

            <div class="em_photo_gallery em-single-venue-photo-gallery">
                <h3 class="ep-row-heading"><?php esc_html_e( 'Gallery', 'eventprime-event-calendar-management' ); ?></h3>
                <div id="ep_venue_gal_thumbs" class="ep-d-inline-flex ep-flex-wrap ep-mb-4">
                    <?php foreach ( $args->venue->em_gallery_images as $id ) { ?>
                        <a href="javascript:void(0);" rel="gal" class="ep_open_gal_modal ep-rounded-1 ep-mr-2 ep-mb-2" ep-modal-open="ep-venue-gal-modal">
                            <?php echo wp_get_attachment_image( $id, array(50, 50),["class" => "ep-rounded-1","alt"=>"Gallery Image"] ); ?>
                        </a>
                        <?php } ?>
                </div>
                <?php if( count( $args->venue->em_gallery_images ) > 0 ) {?>
                    <div class="ep_venue_gallery_modal_container ep-modal ep-modal-view" id="ep-venue-gallery-modal"  ep-modal="ep-venue-gal-modal" style="display: none;" >
                        <div class="ep-modal-overlay" ep-modal-close="ep-venue-gal-modal"></div>
                        <div class="ep-modal-wrap ep-modal-lg">
                            <div class="ep-modal-content">
                                <div class="ep-modal-titlebar ep-d-flex ep-items-center ep-py-2">
                                    <div class="ep-modal-title ep-px-3 ep-fs-5 ep-my-2">
                                        <?php esc_html_e( 'Gallery', 'eventprime-event-calendar-management' ); ?> 
                                    </div>
                                    <span class="ep-modal-close" id="ep_venue_gallery_modal_close" ep-modal-close="ep-venue-gal-modal"><span class="material-icons-outlined">close</span></span>
                                </div>
                                <div class="ep-modal-body">
                                    <ul class="ep-rslides" id="ep_venue_gal_modal">
                                        <?php foreach ( $args->venue->em_gallery_images as $id ) {
                                            $url = wp_get_attachment_url( $id, 'large' );?>
                                            <li>
                                                <img src="<?php echo esc_url( $url ); ?>" >
                                            </li>
                                        <?php }?>
                                    </ul>
                                    <div class="ep-single-event-nav"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>

        </div>
    </div>

    <?php }
                
if ( ! empty( ep_get_global_settings( 'gmap_api_key' ) ) && ! empty( $args->venue->em_address ) ) { ?>
    <div class="ep-single-venue-map">
        <div class="em-venue-direction" id="ep_venue_load_map_data" data-venue="<?php echo esc_attr( json_encode( $args->venue ) ); ?>">
            <div id="em_single_venue_map_canvas" style="height:400px;"></div>
        </div> 
    </div>
<?php }?>

<?php do_action( 'ep_venue_view_after_detail' );?>
</div>