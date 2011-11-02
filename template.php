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
 if (theme_get_setting('fix_css_limit') && !variable_get('preprocess_css', FALSE)) {
    $css = drupal_add_css();
    $style_count = substr_count($vars['setting_styles'] . $vars['ie6_styles'] . $vars['ie7_styles'] . $vars['ie8_styles'] . $vars['local_styles'], '<link');
    if (fusion_core_css_count($css) > (30 - $style_count)) {
      $styles = '';
      $suffix = "\n".'</style>'."\n";
      foreach ($css as $media => $types) {
        $prefix = '<style type="text/css" media="'. $media .'">'."\n";
        $imports = array();
        foreach ($types as $files) {
          foreach ($files as $file => $preprocess) {
            $imports[] = '@import "'. base_path() . $file .'";';
            if (count($imports) == 30) {
              $styles .= $prefix . implode("\n", $imports) . $suffix;
              $imports = array();
            }
          }
        }
        $styles .= (count($imports) > 0) ? ($prefix . implode("\n", $imports) . $suffix) : '';
      }
      $vars['styles'] = $styles;
    }
  }
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

function pnw_fusion_pager($tags = array(), $limit = 4, $element = 0, $parameters = array(), $quantity = 9) {
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', (isset($tags[0]) ? $tags[0] : t('«')), $limit, $element, $parameters);
  $li_previous = theme('pager_previous', (isset($tags[1]) ? $tags[1] : t('‹')), $limit, $element, 1, $parameters);
  $li_next = theme('pager_next', (isset($tags[3]) ? $tags[3] : t('›')), $limit, $element, 1, $parameters);
  $li_last = theme('pager_last', (isset($tags[4]) ? $tags[4] : t('»')), $limit, $element, $parameters);

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => 'pager-first', 
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => 'pager-previous', 
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => 'pager-ellipsis', 
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => 'pager-item', 
            'data' => theme('pager_previous', $i, $limit, $element, ($pager_current - $i), $parameters),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => 'pager-current', 
            'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => 'pager-item', 
            'data' => theme('pager_next', $i, $limit, $element, ($i - $pager_current), $parameters),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => 'pager-ellipsis', 
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => 'pager-next', 
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => 'pager-last', 
        'data' => $li_last,
      );
    }
    return theme('item_list', $items, NULL, 'ul', array('class' => 'pager'));
  }
}