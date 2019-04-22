<?php

namespace Lib\CPT\Tax;

/**
 * Add Custom tax
 */
function create_activity_taxonomies() {
  /*
  $labels = array(
    'name' => _x( 'Typ av tjänst', 'taxonomy general name' ),
    'singular_name' => _x( 'Typ av tjänst', 'taxonomy singular name' ),
    'search_items' => __( 'Search Typ av tjänst' ),
    'all_items' => __( 'All Typ av tjänst' ),
    'parent_item' => __( 'Parent Typ av tjänst' ),
    'parent_item_colon' => __( 'Parent Typ av tjänst:' ),
    'edit_item' => __( 'Edit Typ av tjänst' ),
    'update_item' => __( 'Update Typ av tjänst' ),
    'add_new_item' => __( 'Add New Typ av tjänst' ),
    'new_item_name' => __( 'New Typ av tjänst Name' ),
    'menu_name' => __( 'Typer av tjänster' ),
  );

  register_taxonomy( 'tjanster-omrade', array( 'tjanster' ), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tjanster-omrade' ),
  ));
  */
}
add_action( 'init', __NAMESPACE__ . '\\create_activity_taxonomies' );
