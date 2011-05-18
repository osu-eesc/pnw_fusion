<?php
// $Id: node.tpl.php,v 1.4 2010/09/17 21:36:06 eternalistic Exp $
?>

<?php

 if (!function_exists("formatBytes")) {
	function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
  
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
  
    $bytes /= pow(1024, $pow);
  
    return round($bytes, $precision) . ' ' . $units[$pow];
	}
}

$path_array = split('/', $node_url);
$base_path =  '/' .$path_array[1]. '/';

?>

<div id="node-<?php print $node->nid; ?>" class="node <?php print $node_classes; ?>">
  <div class="inner">
  
    <?php if ($node_top && !$teaser): ?>
    <div id="node-top" class="node-top row nested">
      <div id="node-top-inner" class="node-top-inner inner">
        <?php print $node_top; ?>
      </div><!-- /node-top-inner -->
    </div><!-- /node-top -->
    <?php endif; ?>

    <div class="content clearfix">
      <?php
        if ($node->field_pdf_file[0]['fid']) {
          print '<a href="http://' . $_SERVER["HTTP_HOST"] . $base_path . $node->field_pdf_file[0]['filepath'] . '">' . check_plain($title) . '</a><a href="http://' . $_SERVER["HTTP_HOST"] . $base_path . $node->field_pdf_file[0]['filepath'] . '"><img style="margin-left: 4px;" src="http://' . $_SERVER["HTTP_HOST"] . $base_path . 'sites/default/files/icons/pdf-icon.gif"></a><br/> (' . formatbytes($node->field_pdf_file[0]['filesize']) . ')';
        }
      ?>
    </div>

  </div><!-- /inner -->

  <?php if ($node_bottom && !$teaser): ?>
  <div id="node-bottom" class="node-bottom row nested">
    <div id="node-bottom-inner" class="node-bottom-inner inner">
      <?php print $node_bottom; ?>
    </div><!-- /node-bottom-inner -->
  </div><!-- /node-bottom -->
  <?php endif; ?>
</div><!-- /node-<?php print $node->nid; ?> -->
