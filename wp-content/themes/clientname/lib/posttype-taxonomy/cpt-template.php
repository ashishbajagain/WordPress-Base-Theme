<?php

namespace Lib\CPT\Cpt;

/**
 * Add CPT
 */
function codex_custom_init() {
  /*
  $labels = array(
    'name'               => _x( 'Tjänster', 'post type general name' ),
    'singular_name'      => _x( 'Tjänster', 'post type singular name' ),
    'add_new'            => _x( 'Lägg till tjänst', 'book' ),
    'add_new_item'       => __( 'Lägg till ny Tjänster' ),
    'edit_item'          => __( 'Redigera Tjänster' ),
    'new_item'           => __( 'Ny Tjänster' ),
    'all_items'          => __( 'Alla Tjänster' ),
    'view_item'          => __( 'Se Tjänster' ),
    'search_items'       => __( 'Sök Tjänster' ),
    'not_found'          => __( 'Inga Tjänster hittade' ),
    'not_found_in_trash' => __( 'Inga Tjänster hittade i papperskorgen' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Tjänster'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Tjänster and Tjänster specific data',
    'public'        => true,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions' ),
    'has_archive'   => true,
    'taxonomies' => array('category'),
    'hierarchical' => true,
    'menu_position' => 2,
    'rewrite'   => array( 'slug' => 'erbjudande/tjanster', 'with_front' => false ),
  );
  register_post_type( 'tjanster', $args );
  */

}
add_action( 'init', __NAMESPACE__ . '\\codex_custom_init' );
