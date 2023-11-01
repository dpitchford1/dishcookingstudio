<?php 
$performers = $args->event->performer_details;
$performers_text = ep_global_settings_button_title('Performers');
$performer_text = ep_global_settings_button_title('Performer');
if( count( $performers ) > 0 && empty( ep_get_global_settings( 'hide_performers_section' ) ) ) {?>

<h4 class="sidebar-title">Class <?php echo esc_html( $performers_text ); ?></h4>
<?php foreach( $performers as $performer ){ if( ! empty( $performer ) ) {?>
<figure class="sidebar-media">
    <a class="sidebar-media--img" href="<?php echo esc_url( $performer->performer_url );?>"><img class="ep-performer-img ep-rounded-1" src="<?php echo esc_url( $performer->image_url );?>" width="96" height="96" alt="<?php echo esc_html( $performer->name );?>"></a>
    <figcaption class="sidebar-media--content">
        <h5 class="sidebar-media--subtitle"><a href="<?php echo esc_url( $performer->performer_url );?>" class="ep-button-text-color"><?php echo esc_html( $performer->name );?></a></h5>
        <p><?php echo esc_html( $performer->em_role );?></p>
    </figcaption>
</figure>
<?php } }?>

<?php }?>