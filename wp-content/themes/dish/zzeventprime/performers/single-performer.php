<?php
/**
 * View: Single Performer
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/performers/single-performer.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<?php if( ! empty( $args ) && ! empty( $args->post ) ) {?>

<!-- box wrapper - img and desc -->
<article class="simple-grid gridx3-offset detail--card">
    <?php
    // Load single performer image template
    ep_get_template_part( 'performers/single-performer/image', null, $args );
    ?>
    <?php
    // Load single performer image template
    ep_get_template_part( 'performers/single-performer/detail', null, $args );
    ?>
</article>

<?php } else{ ?>

<div class="wrap">
    <?php echo esc_html_e( 'No Chefs found.', 'eventprime-event-calendar-management' ); ?>
</div>

<?php }?>

<div class="ep-box-wrap ep-view-container">
<?php
if( $args->event_args['show_events'] == 1 ) {
    // Load upcoming event template
    ep_get_template_part( 'performers/single-performer/upcoming-events', null, $args );
}?>
</div>