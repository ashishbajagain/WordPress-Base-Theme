<?php

namespace Lib\Plugins\Polylang;

/**
 * Add function to copy acf to new language page/post
 */
add_filter( 'pll_copy_post_metas', __NAMESPACE__ . '\\copy_post_metas' );
 
function copy_post_metas( $metas ) {
    return array_merge( $metas, array( 'my_post_meta' ) );
}
