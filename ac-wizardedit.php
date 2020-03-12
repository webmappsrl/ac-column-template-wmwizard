<?php
/*
Plugin Name:    Admin Columns - Wizard Edit Route Button
Plugin URI:     PLUGIN_URL
Description:    A column type for Webmapp Wizard Route Edit Buttons
Version:        1.0
Author:         Pedram Katanchi
Author URI:     AUTHOR_URL
License:        GPLv2 or later
License URI:    http://www.gnu.org/licenses/gpl-2.0.html
*/

// 1. Set text domain
/* @link https://codex.wordpress.org/Function_Reference/load_plugin_textdomain */
load_plugin_textdomain( 'ac-wizardedit', false, plugin_dir_path( __FILE__ ) . '/languages/' );

// 2. Register the column.
add_action( 'ac/column_types', 'ac_register_column_wizardedit' );

function ac_register_column_wizardedit( \AC\ListScreen $list_screen ) {

	// Use the type: 'post', 'user', 'comment' or 'media'.
	if ( 'post' === $list_screen->get_group() ) {

		require_once plugin_dir_path( __FILE__ ) . 'ac-column-wizardedit.php';

		$list_screen->register_column_type( new AC_Column_wizardedit );
	}
}

// -------------------------------------- //
// This part is for the PRO version only. //
// -------------------------------------- //

// 3. (Optional) Register the PRO column.
add_action( 'ac/column_types', 'ac_register_pro_column_wizardedit' );

function ac_register_pro_column_wizardedit( \AC\ListScreen $list_screen ) {
	if ( ! class_exists( '\ACP\AdminColumnsPro' ) ) {
		return;
	}

	// Use the type: 'post', 'user', 'comment', 'media' or 'taxonomy'.
	if ( 'post' === $list_screen->get_group() ) {

		require_once plugin_dir_path( __FILE__ ) . 'ac-column-wizardedit.php';
		require_once plugin_dir_path( __FILE__ ) . 'acp-column-wizardedit.php';

		$list_screen->register_column_type( new ACP_Column_wizardedit );
	}
}