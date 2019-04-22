<?php

namespace Lib\Plugins\ACF;

/**
 * Add ACF Option Page
 */
if ( function_exists( 'acf_add_options_page' ) ) {

  $parent = acf_add_options_page( array(
    'page_title' => 'Site settings',
    'menu_title' => 'Site settings',
    'redirect'   => 'Site settings',
  ) );
}

// --------------------------------------------------------

/**
 * ACF style in admin
 */
function style_acf_object()
{
    echo '<style>
    .acf-repeater .acf-row td {
        border-bottom:2px solid #bbb;
    }
    .acf-field-message {
        background-color: #443377;
        padding-bottom: 5px !important;
        color: white;
    }
    .acf-flexible-content .layout { 
        border: 2px solid #b1b1b1;
    }
    .acf-flexible-content .layout .acf-fc-layout-handle {
        background-color: #e8e8e8;
    }
    .acf-field .acf-label p.description {
        font-style:italic;
    }
    </style>';
}
add_action('acf/input/admin_head', __NAMESPACE__ . '\\style_acf_object');