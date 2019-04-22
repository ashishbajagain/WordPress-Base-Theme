<?php

namespace Lib\Setup;


/**
 * Theme setup
 */
function setup() {

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(
  array(
    'primary' => __( 'Primary Menu', 'Huvudmeny' )
  )
  );

  // Enable post thumbnails
  add_theme_support( 'post-thumbnails' );
  // add_image_size( 'square-image', 720, 720, true );
  // add_image_size( 'hero-image-high', 1600, 800, true );

  // Add support for title
  add_theme_support( 'title-tag' );

  // Enable post formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');



// ----------------------------------------

/** 
* create defer load function for script
*/
 
// Async load
function ikreativ_async_scripts($url)
{
  if ( strpos( $url, '#asyncload') === false )
      return $url;
  else if ( is_admin() )
      return str_replace( '#asyncload', '', $url );
  else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', __NAMESPACE__ . '\\ikreativ_async_scripts', 11, 1 );

// ----------------------------------------

/**
 * Theme assets
 */

// Dequeue wordpress jquery
function move_wordpress_jquery()
{
    wp_dequeue_script('jquery');
    wp_dequeue_script('jquery-core');
    wp_dequeue_script('jquery-migrate');
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\move_wordpress_jquery');


// Enqueue scripts and styles
function assets() {
    // css
    wp_enqueue_style('css', get_stylesheet_directory_uri() .'/style.css', false, null);

    // jquery
    wp_enqueue_script('jquery', false, array(), false, true);
    wp_enqueue_script('jquery-core', false, array(), false, true);
    wp_enqueue_script('jquery-migrate', false, array(), false, true);

    // custom scripts
    wp_enqueue_script('js', get_stylesheet_directory_uri() .'/compiled-scripts.js','','',true );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

// ----------------------------------------

/**
 * Defer or async scripts for speed purpose
 */

// PRINT OUT EVERY SCRIPT HANDLE IN TO HEAD - ONLY FOR DEV PURPOSE ---> 
// add_action( 'wp_print_scripts', __NAMESPACE__ . '\\wsds_detect_enqueued_scripts' );
// function wsds_detect_enqueued_scripts() {
// 	global $wp_scripts;
// 	foreach( $wp_scripts->queue as $handle ) :
// 		echo $handle . ' | ';
// 	endforeach;
// }

add_filter( 'script_loader_tag', __NAMESPACE__ . '\\wsds_defer_scripts', 10, 3 );
function wsds_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'jquery',
		'jquery-core',
    'jquery-migrate',
    'js',
	);

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    return $tag;
} 

// ----------------------------------------

/**
* Remove Query String from Static Resources
*/
function remove_css_js_ver( $src ) {
  if( strpos( $src, '?ver=' ) )
  $src = remove_query_arg( 'ver', $src );
  return $src;
  }
  add_filter( 'style_loader_src', __NAMESPACE__ . '\\remove_css_js_ver', 10, 2 );
  add_filter( 'script_loader_src', __NAMESPACE__ . '\\remove_css_js_ver', 10, 2 ); 

// ----------------------------------------

// hide admin bar
// set this on your profile so client can easy find page to edit
// show_admin_bar(false);