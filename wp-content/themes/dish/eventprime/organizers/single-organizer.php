<?php
/**
 * View: Single Organizer
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/organizers/single-organizer.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<?php if( ! empty( $args ) && ! empty( $args->term ) ) {?>
<article class="simple-grid gridx3-offset detail--card">

<?php
// Load single organizer image template
ep_get_template_part( 'organizers/single-organizer/image', null, $args );
?>
<?php
// Load single organizer image template
ep_get_template_part( 'organizers/single-organizer/detail', null, $args );
?>

</article>

<?php } else{ ?>

<div class="wrap">
    <?php echo esc_html_e( 'No organizer found.', 'eventprime-event-calendar-management' ); ?>
</div>

<?php }?>

<?php if( $args->event_args['show_events'] == 1 ) {?>
    <div class="wrap">
    <?php ep_get_template_part( 'organizers/single-organizer/upcoming-events', null, $args ); ?>
    </div>
<?php }?>

