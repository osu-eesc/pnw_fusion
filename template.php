<?php
// $Id: template.php,v 1.1.2.3 2009/11/05 03:32:15 sociotech Exp $

/**
 * Adds site handbook-specific CSS
 */


function pnw_fusion_preprocess_page(&$vars) {
	if (is_null(theme_get_setting('pnw_fusion'))) {  // <-- change this line
	  global $theme_key;

	  /*
	   * The default values for the theme variables. Make sure $defaults exactly
	   * matches the $defaults in the theme-settings.php file.
	   */
	  $defaults = array(             // <-- change this array
	    'site_handbook' => 'weed'
	  );

	  // Get default theme settings.
	  $settings = theme_get_settings($theme_key);
	  // Don't save the toggle_node_info_ variables.
	  if (module_exists('node')) {
	    // NOTE: node_get_types() is renamed to node_type_get_types() in Drupal 7
	    foreach (node_get_types() as $type => $name) {    
	      unset($settings['toggle_node_info_' . $type]);
	    }
	  }
	  // Save default theme settings.
	  variable_set(
	    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
	    array_merge($defaults, $settings)
	  );
	  // Force refresh of Drupal internals.
	  theme_get_setting('', TRUE);
	}
  $theme_settings = theme_get_settings('pnw_fusion');
  $site_handbook = $theme_settings['site_handbook'];
  $vars['styles'] = drupal_get_css();
  $vars['site_handbook'] = $site_handbook;
}


/**
 * Changes breadcrumb separator
 */
function pnw_fusion_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' &rsaquo; ', $breadcrumb) .'</div>';
  }
}