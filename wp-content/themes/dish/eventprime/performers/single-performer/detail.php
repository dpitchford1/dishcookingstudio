<?php
/**
 * View: Single Performer - Detail
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/performers/single-performer/detail.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<div class="detail-card--content">
    
    <h2 class="ep-single-box-title ep-performer-name"><?php echo esc_html( $args->performer->name ); ?></h2>
    <?php if ( isset( $args->performer->em_role ) ){ ?>   
        <p class="ep-single-box-designation"><?php echo esc_html( $args->performer->em_role ); ?></p>
    <?php } ?>
    
    <!-- Personal and contacts -->
    <ul class="detail--contacts">
        <?php if ( ! empty( $args->performer->em_performer_emails ) ) {?>
            <li>
                <?php $image_url = EP_BASE_URL . 'includes/assets/images/email-icon.png';?><img src="<?php echo esc_url( $image_url );?>" width="30" alt="email">
                <?php foreach ( $args->performer->em_performer_emails as $key => $val ) {
                        $args->performer->em_performer_emails[$key] = '<a href="mailto:' . $val . '">' . htmlentities($val) . '</a>';
                    }
                    echo implode( ', ', $args->performer->em_performer_emails );?>
            </li>
        <?php } ?>
        
        <?php if ( ! empty( $args->performer->em_performer_phones ) ) {?>
            <li>
                <?php $image_url = EP_BASE_URL . 'includes/assets/images/phone-icon.png';?><img src="<?php echo esc_url( $image_url );?>" width="30" alt="phone">
                <?php
                    echo implode( ', ', $args->performer->em_performer_phones );?>
            </li>
        <?php } ?>
        <?php if ( ! empty( $args->performer->em_performer_websites ) ) {?>
            <li>
                <?php $image_url = EP_BASE_URL . 'includes/assets/images/website-icon.png';?><img src="<?php echo esc_url( $image_url );?>" width="30" alt="email">
                <?php
                    foreach ( $args->performer->em_performer_websites as $key => $val ) {
                        if ( ! empty( $val ) ) {
                            $args->performer->em_performer_websites[$key] = '<a href="' . $val . '" target="_blank">' . htmlentities($val) . '</a>';
                        }
                    }
                    echo implode( ', ', $args->performer->em_performer_websites );?>
            </li>
        <?php } ?>
    </ul> 

    <!-- Description -->
    <div class="detail--description">
        <?php
        if ( isset( $args->performer->description ) && $args->performer->description !== '' ) {
            $content = apply_filters('the_content', $args->performer->description);
            echo $content;
            
        } else {
            esc_html_e( 'No description available', 'eventprime-event-calendar-management' );
        }?>
    </div>

<?php if ( is_array( $args->performer->em_performer_gallery ) && count( $args->performer->em_performer_gallery ) > 1 ) { ?>
    <!-- single perfomer gallery images -->
    <div class="em_photo_gallery em-single-perfomer-photo-gallery" >
        <h3 class="kf-row-heading"><?php esc_html_e( 'Gallery', 'eventprime-event-calendar-management' ); ?></h3>
        <div id="ep_perfomer_gal_thumbs" class="ep-d-inline-flex ep-flex-wrap ep-mb-4">
            <?php if(get_post_thumbnail_id($args->performer->id)):?>
            <a href="javascript:void(0);" rel="gal" class="ep_open_gal_modal ep-rounded-1 ep-mr-2 ep-mb-2" ep-modal-open="ep-perfomer-gal-modal">
                <?php echo wp_get_attachment_image( get_post_thumbnail_id($args->performer->id), array(50, 50),["class" => "ep-rounded-1","alt"=>"Gallery Image"] ); ?>
            </a>
            <?php endif;?>
            <?php foreach ( $args->performer->em_performer_gallery as $id ) { ?>
                <a href="javascript:void(0);" rel="gal" class="ep_open_gal_modal ep-rounded-1 ep-mr-2 ep-mb-2" ep-modal-open="ep-perfomer-gal-modal">
                    <?php echo wp_get_attachment_image( $id, array(50, 50),["class" => "ep-rounded-1","alt"=>"Gallery Image"] ); ?>
                </a>
            <?php } ?>
        </div>
        <?php if( ! empty( $args->performer->em_performer_gallery ) && count( $args->performer->em_performer_gallery ) > 0 ) {?>
            <div class="ep_perfomer_gallery_modal_container ep-modal ep-modal-view" id="ep-perfomer-gallery-modal"  ep-modal="ep-perfomer-gal-modal" style="display: none;" >
                <div class="ep-modal-overlay" ep-modal-close="ep-perfomer-gal-modal"></div>
                <div class="ep-modal-wrap ep-modal-lg">
                    <div class="ep-modal-content">
                        <div class="ep-modal-titlebar ep-d-flex ep-items-center ep-py-2">
                            <div class="ep-modal-title ep-px-3 ep-fs-5 ep-my-2">
                                <?php esc_html_e( 'Gallery', 'eventprime-event-calendar-management' ); ?> 
                            </div>
                            <span class="ep-modal-close" id="ep_performer_gallery_modal_close" ep-modal-close="ep-perfomer-gal-modal"><span class="material-icons-outlined">close</span></span>
                        </div>
                        <div class="ep-modal-body">
                            <ul class="ep-rslides" id="ep_perfomer_gal_modal">
                            <?php if(get_post_thumbnail_id($args->performer->id)): $url = wp_get_attachment_url( get_post_thumbnail_id($args->performer->id), 'large' )?>
                                <li>
                                    <img src="<?php echo esc_url( $url ); ?>" alt="Gallery Image">
                                </li>
                            <?php endif;?>
                            <?php foreach ( $args->performer->em_performer_gallery as $id ) { $url = wp_get_attachment_url( $id, 'large' )?>
                                <li>
                                    <img src="<?php echo esc_url( $url ); ?>" alt="Gallery Image" >
                                </li>
                            <?php }?>
                            </ul>
                            <div class="ep-single-event-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div><?php 
} ?>

<?php do_action( 'ep_performer_view_after_detail' );?>
</div>