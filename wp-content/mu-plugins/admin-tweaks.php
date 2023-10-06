<?php
/*
Plugin Name:        Admin Tweaks
Plugin URI:         
Description:        Tweaks for the WP Admin
Version:            1.0.0
Author:             Dylan Pitchford
Author URI:         
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Hide always all email address encoder notifications
define( 'EAE_DISABLE_NOTICES', apply_filters( 'air_helper_remove_eae_admin_bar', true ) );



if ( ! class_exists( 'admintweaks' ) ) :

	/**
	 * The main markup cleanup class
	 */
	class admintweaks {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

            add_action( 'login_enqueue_scripts', array( $this, 'wpb_login_logo' ) );
            add_action( 'admin_menu', array( $this, 'air_helper_wphidenag' ) );
            add_filter( 'update_footer', '__return_empty_string', 11 );
            add_action( 'admin_bar_menu', array( $this, 'replace_howdy' ) );
            add_action( 'admin_footer_text', array( $this, 'template_custom_admin_footer' ) );
            add_action( 'tiny_mce_before_init', array( $this, 'cleanup_mce' ) );
            add_action( 'wp_print_scripts', array( $this, 'DisableAutoSave' ) );
            add_action( 'transition_post_status', array( $this, 'remove_transient_on_publish' ), 10, 3 );
            add_action( 'admin_menu', array( $this, 'hide_unnecessary_wordpress_menus' ), 999 );

            add_filter( 'auto_update_plugin', '__return_false' );
            add_filter( 'auto_update_theme', '__return_false' );


		}



/**
 * Replace the default Admin login logo
 * @since  0.1.0
 */
public function wpb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(/assets/img/logos/screenshot.png);
        height:220px;
        width:300px;
        background-size: 300px auto;
        background-repeat: no-repeat;
        }
    </style>
<?php }

/**
 * Hide WP updates nag.
 *
 * Turn off by using `remove_action( 'admin_menu', 'air_helper_wphidenag' )`
 *
 * @since  0.1.0
 */
public function air_helper_wphidenag() {
    remove_action( 'admin_notices', 'update_nag' );
} // end air_helper_wphidenag

/*
*   Replace Howdy in LogIn menu
*/
public function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as:', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
        ) 
    );
}

/*
*   Custom Backend Footer
*/
public function template_custom_admin_footer() {
    _e( '<span id="footer-thankyou">Kaneism Design', 'kaneizm' );
}

/*
*   Remove H1 from editor
*/
public function cleanup_mce($args) {
    // Just omit h1 from the list
    $args['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4; Heading 5=h5; Heading 6=h6';
    return $args;
}

/*
*   Disable autosave
*/
public function DisableAutoSave() {
    wp_deregister_script('autosave');
}

/*
*   Remove Transients on publish
*/
public function remove_transient_on_publish( $new, $old, $post ) {
    if( 'publish' == $new )
        delete_transient( 'recent_posts_query_results' );
}

/*
*   Hide Unnecessary Menus and Sub Menus
*/
function hide_unnecessary_wordpress_menus(){
    global $submenu;
    global $current_user;
    wp_get_current_user();

    foreach($submenu['themes.php'] as $menu_index => $theme_menu){
        if($theme_menu[0] == 'Header' || $theme_menu[0] == 'Background' || $theme_menu[0] == 'Customize' || $theme_menu[0] == 'Theme File Editor' || $theme_menu[0] == 'kaneizm')
        unset($submenu['themes.php'][$menu_index]);
    };
        // Hide Comments
        remove_menu_page( 'edit-comments.php' );
}




		
	}
endif;

return new admintweaks();



//add_filter( 'wp_resource_hints', '__return_empty_array', 99 );


?>