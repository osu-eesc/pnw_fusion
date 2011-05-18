<?php
// $Id: template.php,v 1.1.2.3 2009/11/05 03:32:15 sociotech Exp $

/**
 * Changed breadcrumb separator
 */
function pnw_fusion_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' &rsaquo; ', $breadcrumb) .'</div>';
  }
}

/**
 * Theme override for theme_preprocess_page()
 * Adds template suggestion per content type
 * Also set a variable for a taxonomy term and tid 
 * for display on page-news_story.tpl.php
*/
/*function eesc_prosper_preprocess_page(&$vars, $hook) {
	if (isset($vars['node'])) {
   $vars['template_files'][] = 'page-'. $vars['node']->type; 
	}
} */
