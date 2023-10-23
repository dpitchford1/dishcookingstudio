<?php
/**
 * View: Single Organizer - Image
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/organizers/single-organizer/image.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>

<figure class="card-img--wrap">
<?php if( ! empty( $args->organizer->image_url ) ) {?>
    <img src="<?php echo esc_url( $args->organizer->image_url ); ?>" alt="<?php echo esc_attr( $args->organizer->name ); ?>" class="card--img">
<?php }?>

    <figcaption class="detail--socials">

<?php if ( ! empty( $args->organizer->em_social_links ) ){ ?>
    
    <?php if( ! empty( $args->organizer->em_social_links['facebook'] ) ){ ?>
        <a href="<?php echo esc_url( $args->organizer->em_social_links['facebook'] );?>" target="_blank" title="<?php echo esc_attr( 'Facebook' );?>" class="ep-facebook-f"> 
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/facebook-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="Facebook">
        </a>
    <?php } if( ! empty( $args->organizer->em_social_links['instagram'] ) ){ ?>
        <a href="<?php echo esc_url( $args->organizer->em_social_links['instagram'] );?>" target="_blank" title="<?php echo esc_attr( 'Instagram' );?>" class="ep-instagram">
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/instagram-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="Instagram">
        </a>
    <?php } if( ! empty( $args->organizer->em_social_links['linkedin'] ) ) { ?>
        <a href="<?php echo esc_url( $args->organizer->em_social_links['linkedin'] );?>" target="_blank" title="<?php echo esc_attr( 'Linkedin' );?>" class="ep-twitter"> 
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/linkedin-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="LinkedIn">
        </a>
    <?php } if( ! empty( $args->organizer->em_social_links['twitter'] ) ){ ?>
        <a href="<?php echo esc_url( $args->organizer->em_social_links['twitter'] );?>" target="_blank" title="<?php echo esc_attr( 'Twitter' );?>" class="ep-twitter">
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/twitter-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="Twitter - X">
        </a>
    <?php } if ( ! empty( $args->organizer->em_social_links['youtube'] ) ) {?>
        <a href="<?php echo esc_url( $args->organizer->em_social_links['youtube'] ); ?>" target="_blank" title="<?php echo esc_attr('Youtube'); ?>" class="ep-youtube">
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/youtube-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="youtube">
        </a>
    <?php }?>
    
<?php } ?>

    </figcaption>
</figure>