<?php
/**
 * View: Single Venue
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/venues/single-venue.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<?php if( ! empty( $args ) && ! empty( $args->term ) ) {?>
<article class="simple-grid gridx3-offset detail--card">
<?php
    // Load single venue image template
    ep_get_template_part( 'venues/single-venue/image', null, $args );
    ?>
    <?php
    // Load single venue image template
    ep_get_template_part( 'venues/single-venue/detail', null, $args );
?>
</article>

<?php } else{ ?>

<div class="wrap">
    <?php echo esc_html_e( 'No venue found.', 'eventprime-event-calendar-management' ); ?>
</div>

<?php }?>

<?php if( $args->event_args['show_events'] == 1 ) { ?>
<div class="wrap">
    <?php ep_get_template_part( 'venues/single-venue/upcoming-events', null, $args ); ?>
</div>
<?php }?>