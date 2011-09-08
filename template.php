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