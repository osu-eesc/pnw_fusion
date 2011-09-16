<?php
// $Id: template.php,v 1.1.2.3 2009/11/05 03:32:15 sociotech Exp $

/**
 * Adds site handbook-specific CSS
 */
function pnw_fusion_preprocess_page(&$vars) {
  $theme_settings = theme_get_settings('pnw_fusion');
  $site_handbook = $theme_settings['site_handbook'];
  $css_path = drupal_get_path('theme', 'pnw_fusion') . '/css/' . $site_handbook . '.css';
  drupal_add_css($css_path, 'theme', 'all', TRUE);
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