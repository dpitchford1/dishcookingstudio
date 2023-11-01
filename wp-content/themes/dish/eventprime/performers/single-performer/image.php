<?php
/**
 * View: Single Performer - Image
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/performers/single-performer/image.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<figure class="card-img--wrap">
    <img src="<?php echo esc_url( $args->performer->image_url ); ?>" alt="<?php echo esc_attr( $args->performer->name ); ?>" class="card--img">

    <figcaption class="detail--socials">
        <!-- Social links -->
    <?php if ( ! empty( $args->performer->em_social_links ) ) { ?>
    <ul class="inline-list socials--list">
    <?php if ( isset( $args->performer->em_social_links['facebook'] ) ) { ?>
        <li><a class="is-circle" href="<?php echo esc_url( $args->performer->em_social_links['facebook'] ); ?>" rel="external" target="blank"><span class="ico i-m i--fb">Facebook</span></a></li>

    <?php }
    if ( isset( $args->performer->em_social_links['instagram'] ) ) {?>
        <li><a class="is-circle" href="<?php echo esc_url( $args->performer->em_social_links['instagram'] ); ?>" rel="external" target="blank"><span class="ico i-m i--ig">Instagram</span></a></li>
        
    <?php }
    if ( isset( $args->performer->em_social_links['twitter'] ) ) {?>
        <li><a class="is-circle" href="<?php echo esc_url( $args->performer->em_social_links['twitter'] ); ?>" rel="external" target="blank"><span class="ico i-m i--tw">Twitter</span></a></li>

    <?php }
    if ( isset( $args->performer->em_social_links['linkedin'] ) ) {?>
        <li><a class="is-circle" href="<?php echo esc_url( $args->performer->em_social_links['linkedin'] ); ?>" rel="external" target="blank"><span class="ico i-m i--linked">Twitter</span></a></li>
        
    <?php }
    if ( isset( $args->performer->em_social_links['youtube'] ) ) {?>
        <li><a href="<?php echo esc_url( $args->performer->em_social_links['youtube'] ); ?>" target="_blank" class="ep-youtube">
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/youtube-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="YouTube" />
        </a></li>
    <?php }?>
    </ul>
    <?php }?> 
    </figcaption>
</figure>