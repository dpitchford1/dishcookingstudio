<?php
/**
 * View: Single Venue - Image
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/venues/single-venue/image.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<figure class="card-img--wrap">

    <img src="<?php echo esc_url( $args->venue->image_url ); ?>" alt="<?php echo esc_attr( $args->venue->name ); ?>" class="card--img">

    <figcaption class="detail--socials">
    <?php if ( ! empty( $args->venue->em_facebook_page ) || ! empty( $args->venue->em_instagram_page ) ) { ?> 

    <?php if ( ! empty( $args->venue->em_facebook_page ) ) {?>
        <a href="<?php echo esc_url( $args->venue->em_facebook_page ); ?>" target="_blank" class="ep-facebook-f"> 
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/facebook-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="Facebook page">
        </a>
        <?php } if ( ! empty( $args->venue->em_instagram_page ) ) {?>
        <a href="<?php echo esc_url( $args->venue->em_instagram_page ); ?>" target="_blank" class="ep-instagram-f"> 
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/instagram-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="Instagram Page">   
        </a>
        <?php }?>

        <?php }?>
    </figcaption>

</figure>