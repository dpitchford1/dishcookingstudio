<?php 
$organizers = $args->event->organizer_details;
if( count( $organizers ) > 0 && empty( ep_get_global_settings( 'hide_organizers_section' ) ) ) {
    $organized_by_label = ep_global_settings_button_title( 'Organized by' );?>

<!-- <h4 class="sidebar-title">Organized By</h4> -->
<?php foreach( $organizers as $organizer ) { if( ! empty( $organizer ) ) {?>

<p class="sidebar-media"><img class="sidebar-media--img" src="<?php echo esc_url( $organizer->image_url ); ?>" alt="<?php esc_attr( $organizer->name ); ?>">
<a class="sidebar-media--content" href="<?php echo esc_url( $organizer->organizer_url );?>"><?php echo esc_html( $organizer->name );?></a></p>

<?php } }?>
<?php }?>