<?php
/**
 * View: Single Event
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/eventprime/events/single-event.php
 *
 */
defined( 'ABSPATH' ) || exit;
?>
<div class="emagic" id="ep_single_event_detail_page_content">
    <?php if( ! empty( $args ) && ! empty( $args->post ) ) {?>
    <section class="simple-grid gridx3-offset detail--card">
            <?php do_action( 'ep_before_single_event_contant');?>
            <?php
            // Load image template
            ep_get_template_part( 'events/single-event/image', null, $args );
            ?>

            <?php
            // Load image template
            ep_get_template_part( 'events/single-event/detail', null, $args );
            ?>
    
            <!-- Event Loader -->
            <?php do_action( 'ep_add_loader_section' );?>
            <?php
            // Load icon template
            //ep_get_template_part( 'events/single-event/icons', null, $args );

            // Load result template
            //ep_get_template_part( 'events/single-event/result', null, $args );
            ?>
    </section>



            <div class="ep-box-row ep-gx-5">
                <div class="ep-box-col-8" id="ep-sl-left-area">
                    <div class="ep-box-row">

                        <h3>Class Details</h3>
                        <?php
                        // Load date time template
                        //ep_get_template_part( 'events/single-event/date-time', null, $args );

                        // Load title template
                        //ep_get_template_part( 'events/single-event/title', null, $args );

                        ep_get_template_part( 'events/single-event/description', null, $args );

                        // Load venue template
                        ep_get_template_part( 'events/single-event/venue', null, $args );

                        // Load organizers template
                        //ep_get_template_part( 'events/single-event/organizers', null, $args );

                        // Load performers template
                        //ep_get_template_part( 'events/single-event/performers', null, $args );
                        ?>
                    </div> 
                    <?php // echo do_shortcode('[faqs style="accordion" filter="cooking-classes" order="ASC"]');
                    //[faqs style="accordion" filter="cooking-classes" order="ASC"]
                    // Load description template
                    // ep_get_template_part( 'events/single-event/description', null, $args );
                    ?>
                    
                    <?php do_action( 'ep_after_single_events_description', $args );?>
                </div>
                <?php
                // Load tickets template
                //ep_get_template_part( 'events/single-event/tickets', null, $args );?> 

                <section id="secondary" class="sidebar widget-area" role="complementary">
                    <h3 class="sidebar-heading">More From Dish</h3>

                    <div class="sidebar-section">
                        <?php ep_get_template_part( 'events/single-event/organizers', null, $args ); ?>
                    </div>

                    <div class="sidebar-section">
                        <?php ep_get_template_part( 'events/single-event/performers', null, $args ); ?>
                    </div>

                    <div class="sidebar-section">
                        <?php ep_get_template_part( 'events/single-event/products', null, $args ); ?>
                    </div>
                </section>
            </div>
        

        <?php // do_action( 'ep_after_single_event_contant', $args );

    } else{?>
        <div class="ep-alert ep-alert-warning ep-mt-3">
            <?php echo esc_html_e( 'No Classes found.', 'eventprime-event-calendar-management' ); ?>
        </div><?php
    }?>
</div>