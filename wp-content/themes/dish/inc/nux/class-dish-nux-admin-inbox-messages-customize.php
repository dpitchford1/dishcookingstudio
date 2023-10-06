<?php
/**
 * Dish NUX Admin Inbox Messages.
 *
 * @package  dish
 * @since    3.0.0
 */

use Automattic\WooCommerce\Admin\Notes\Note;
use Automattic\WooCommerce\Admin\Notes\NoteTraits;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Dish_NUX_Admin_Inbox_Messages_Customize' ) ) :
	/**
	 * The initial Dish inbox Message.
	 */
	class Dish_NUX_Admin_Inbox_Messages_Customize {

		use NoteTraits;

		/**
		 * Name of the note for use in the database.
		 */
		const NOTE_NAME = 'dish-customize';

		/**
		 * Get the note.
		 *
		 * @return Note
		 */
		public static function get_note() {
			$note = new Note();
			$note->set_title( __( 'Design your store with Dish 🎨', 'dish' ) );
			$note->set_content( __( 'Visit the Dish settings page to start setup and customization of your shop.', 'dish' ) );
			$note->set_type( Note::E_WC_ADMIN_NOTE_INFORMATIONAL );
			$note->set_name( self::NOTE_NAME );
			$note->set_content_data( (object) array() );
			$note->set_source( 'dish' );
			$note->add_action(
				'customize-store-with-dish',
				__( 'Let\'s go!', 'dish' ),
				admin_url( 'themes.php?page=dish-welcome' ),
				Note::E_WC_ADMIN_NOTE_ACTIONED,
				true
			);
			return $note;
		}
	}
endif;
