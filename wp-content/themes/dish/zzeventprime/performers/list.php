<?php
/**
 * View: Performers List
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/performers/list.php
 *
 */
?>
<div class="emagics performers-list-php">
    <div class="simple-grid gridx3 simple--card">
        <?php if( isset( $args->performers ) && !empty( $args->performers ) ) {?>

        <?php
        switch ( $args->display_style ) {
            case 'card':
            case 'grid':
                ep_get_template_part( 'performers/list/views/card', null, $args );
                break;
            case 'box': 
            case 'colored_grid':
                ep_get_template_part( 'performers/list/views/box', null, $args );
                break;
            case 'list':
            case 'rows': 
                ep_get_template_part( 'performers/list/views/list', null, $args );
                break;
            default: 
                ep_get_template_part( 'performers/list/views/card', null, $args ); // Loading card view by default
        }?>

        <?php } else{?>
        <div class="ep-alert ep-alert-warning ep-mt-3 ep-fs-6">
            <?php ( isset( $_GET['ep_search'] ) ) ? esc_html_e( 'No Chefs found related to your search.', 'eventprime-event-calendar-management' ) : esc_html_e( 'Currently, there are no Chefs. Please check back later.', 'eventprime-event-calendar-management' ); ?>
        </div>
        <?php }?>
    </div>
</div>