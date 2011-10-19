<?php
function pnw_fusion_settings($saved_settings) {
  $defaults = array(
    'site_handbook' => 'weed'
  );
  // Add site-wide theme settings
  $settings = array_merge($defaults, $saved_settings);
/**
 * Adds PNW handbook selector to theme settings
 */

  $form['site_handbook'] = array(
    '#type' => 'select',
    '#title' => t('PNW Management Handbook'),
    '#description' => t('Select the PNW handbook for this site.'),
    '#options' => array(
      'weed' => t('PNW Weed Management Handbook'),
      'plant' => t('PNW Plant Disease Management Handbook'),
      'insect' => t('PNW Insect Management Handbook'),
    ), 
    '#default_value' => $settings['site_handbook'],
    '#required' => TRUE,
    '#weight' => -10,
  );  
  return $form;
}