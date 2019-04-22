<?php
/**
 * Function includes.
 *
 * The $function_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 */
$function_includes = [
  // General
  'lib/setup.php',     // Theme setup
  'lib/extras.php',    // Custom functions
  'lib/clean-up.php',    // Clean up

  // Post meta
  'lib/posttype-taxonomy/tax-template.php',    // Custom taxonomies
  'lib/posttype-taxonomy/cpt-template.php',    // Custom post types

  // Plugins
  'lib/plugins/acf-settings.php',    // ACF Settings
  'lib/plugins/gravity-forms.php',    // Gravity Forms Settings
  'lib/plugins/custom_navwalker.php',    // Navwalker
  // 'lib/plugins/expanded-search.php',  // Expand WP Search
  // 'lib/plugins/polylang-settings.php', // Polylang
];

foreach ($function_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);
