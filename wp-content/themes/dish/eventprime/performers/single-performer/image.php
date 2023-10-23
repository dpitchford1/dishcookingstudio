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
    
    <?php if ( isset( $args->performer->em_social_links['facebook'] ) ) { ?>
        <a href="<?php echo esc_url( $args->performer->em_social_links['facebook'] ); ?>" target="_blank" class="ep-facebook-f"> 
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/facebook-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="facebook" />
        </a><?php
    }
    if ( isset( $args->performer->em_social_links['instagram'] ) ) {?>
        <a href="<?php echo esc_url( $args->performer->em_social_links['instagram'] ); ?>" target="_blank" class="ep-instagram">
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/instagram-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="intagram" />
        </a><?php
    }
    if ( isset( $args->performer->em_social_links['linkedin'] ) ) {?>
        <a href="<?php echo esc_url( $args->performer->em_social_links['linkedin'] ); ?>" target="_blank" class="ep-linkedin"> 
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/linkedin-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="LinkedIn" />
        </a><?php
    }
    if ( isset( $args->performer->em_social_links['twitter'] ) ) {?>
        <a href="<?php echo esc_url( $args->performer->em_social_links['twitter'] ); ?>" target="_blank" class="ep-twitter">
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/twitter-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="X" />
        </a><?php 
    }
    if ( isset( $args->performer->em_social_links['youtube'] ) ) {?>
        <a href="<?php echo esc_url( $args->performer->em_social_links['youtube'] ); ?>" target="_blank" class="ep-youtube">
            <?php $image_url = EP_BASE_URL . 'includes/assets/images/youtube-icon.png';?>
            <img src="<?php echo esc_url( $image_url );?>" width="30" alt="YouTube" />
        </a><?php 
    }?>

    <?php }?> 
    </figcaption>
</figure>