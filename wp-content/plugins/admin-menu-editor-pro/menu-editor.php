<?php
/*
Plugin Name: Admin Menu Editor Pro
Plugin URI: http://adminmenueditor.com/
Description: Lets you directly edit the WordPress admin menu. You can re-order, hide or rename existing menus, add custom menus and more. 
Version: 2.7
Author: Janis Elsts
Author URI: http://w-shadow.com/
Slug: admin-menu-editor-pro
*/

if ( include(dirname(__FILE__) . '/includes/version-conflict-check.php') ) {
	return;
}

if ( !defined('AME_ROOT_DIR') ) {
	define('AME_ROOT_DIR', dirname(__FILE__));
}

//Load the plugin
require dirname(__FILE__) . '/includes/menu-editor-core.php';
global $wp_menu_editor;
$wp_menu_editor = new WPMenuEditor(__FILE__, 'ws_menu_editor_pro');

//Load Pro version extras
$ws_me_extras_file = dirname(__FILE__).'/extras.php';
if ( file_exists($ws_me_extras_file) ){
	include $ws_me_extras_file;
}

if ( defined('AME_TEST_MODE') ) {
	require dirname(__FILE__) . '/tests/helpers.php';
	ameTestUtilities::init();
}
