<?php

namespace Lib\Extras;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

// ----------------------------------------

/**
 * Remove link on images from wysiwyg-editor
 */
function wpb_imagelink_setup() {
  $image_set = get_option( 'image_default_link_type' );
  if ($image_set !== 'none') {
  update_option('image_default_link_type', 'none');
  }
}
add_action('admin_init', __NAMESPACE__ . '\\wpb_imagelink_setup');

// ----------------------------------------

/**
 * Remove default post type from admin
 */
function remove_default_post_type() {
	remove_menu_page('edit.php');
}
add_action('admin_menu', __NAMESPACE__ . '\\remove_default_post_type');

// ----------------------------------------

/**
 * Add support to upload ogv-files
 */
function ogx_upload_mimes( $existing_mimes = array() ) {
  $existing_mimes['ogx'] = 'application/ogg';
  $existing_mimes['ogv'] = 'video/ogg';
  return $existing_mimes;
}
add_filter( 'upload_mimes', __NAMESPACE__ . '\\ogx_upload_mimes' );