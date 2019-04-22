<?php

namespace Lib\Plugins\Extendedsearch;

/**
 * Add Fuzzy search
 */
function my_fuzzy_word_length()
{
return 1;
}
add_filter( 'searchwp_fuzzy_min_length', __NAMESPACE__ . '\\my_fuzzy_word_length' );

function my_fuzzy_threshold()
{
return 50;
}
add_filter( 'searchwp_fuzzy_threshold', __NAMESPACE__ . '\\my_fuzzy_threshold' );

function myChangeDigitThreshold()
{
return 15; // 15% maximum threshold
}
add_filter( 'searchwp_fuzzy_digit_threshold', __NAMESPACE__ . '\\myChangeDigitThreshold' );

// --------------------------------------------------------

/**
* Sets number of search result in fuzzy search
*/

function my_searchwp_live_search_posts_per_page() {
return 40;
}
add_filter( 'searchwp_live_search_posts_per_page', __NAMESPACE__ . '\\my_searchwp_live_search_posts_per_page' );

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', __NAMESPACE__ . '\\wp_generator');

// --------------------------------------------------------

/**
* Enable wordpress search in ACF
*/
function cf_search_join( $join ) {
    global $wpdb;
    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', __NAMESPACE__ . '\\cf_search_join' );

// --------------------------------------------------------

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}
add_filter( 'posts_where', __NAMESPACE__ . '\\cf_search_where' );

// --------------------------------------------------------

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;
    if ( is_search() ) {
        return "DISTINCT";
    }
    return $where;
}
add_filter( 'posts_distinct', __NAMESPACE__ . '\\cf_search_distinct' );
