<?php

namespace Lib\Plugins\Gravityforms;

/**
 * load gravity forms javascript after DOM is complete
 * this will enable jquery to be added after GF and 
 * avoid jQuery is not a function error
 */
add_filter( 'gform_cdata_open', __NAMESPACE__ . '\\wrap_gform_cdata_open' );
function wrap_gform_cdata_open( $content = '' ) {
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
    return $content;
}
add_filter( 'gform_cdata_close', __NAMESPACE__ . '\\wrap_gform_cdata_close' );
function wrap_gform_cdata_close( $content = '' ) {
    $content = ' }, false );';
    return $content;
}