<?php

/**
 * Adds PNW handbook selector to theme settings
 */
function pnw_fusion_settings($settings) {
  if (!$settings['site_handbook']) $settings['site_handbook'] = 'weed';
  $form['site_handbook'] = array(
    '#type' => 'radios',
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