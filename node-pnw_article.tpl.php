<?php
// $Id: node.tpl.php,v 1.1.2.2 2009/11/11 05:26:25 sociotech Exp $

$path_array = split('/', $node_url);
$base_path =  '/' .$path_array[1]. '/';
?>

<div id="node-<?php print $node->nid; ?>" class="node <?php print $node_classes; ?>">
  <div class="inner">
    <?php print $picture ?>
  
    <?php if ($page == 0): ?>
    <h2 class="title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php endif; ?>
  
    <?php if ($submitted): ?>
    <div class="meta">
      <span class="submitted"><?php print $submitted ?></span>
    </div>
    <?php endif; ?>
  
    <?php if ($node_top && !$teaser): ?>
    <div id="node-top" class="node-top row nested">
      <div id="node-top-inner" class="node-top-inner inner">
        <?php print $node_top; ?>
      </div><!-- /node-top-inner -->
    </div><!-- /node-top -->
    <?php endif; ?>

    <div class="content clearfix">
	  <?php
		print '<div class="links-inline">';
		print '<a class="add-link" href="' . $base_path . 'node/add/link/' . $node->nid . '">Add Link</a>';
		print '<a class="add-gallery" href="' . $base_path . 'node/add/gallery/' . $node->nid . '">Add Gallery</a>';
		print '</div>';
	  ?>
      <?php
        if ($node->content['section_contents_node_content_1']) {
          print '<div class="section-contents">' . $node->content['section_contents_node_content_1']['#value'] . '</div>';
        }
        if ($node->field_handbook_article_author[0]['view']) {
          print '<div class="author">' . $node->field_handbook_article_author[0]['view'] . '</div>';
        }
        if ($node->field_handbook_article_revised[0]['view']) {
          print '<div class="revision-date">Revised ' . $node->field_handbook_article_revised[0]['view'] . '</div>';
        }
      ?>
	    <?php print $node->field_pnw_body[0]['view'] ?>
    </div><!-- /content clearfix -->
  
    <?php if ($terms): ?>
    <div class="terms">
      <?php // print $terms; ?>
    </div>
    <?php endif;?>
    
    <?php if ($links): ?>
    <div class="links">
      <?php //print $links; ?>
    </div>
    <?php endif; ?>
  </div><!-- /inner -->

  <?php if ($node_bottom && !$teaser): ?>
  <div id="node-bottom" class="node-bottom row nested">
    <div id="node-bottom-inner" class="node-bottom-inner inner">
      <?php print $node_bottom; ?>
    </div><!-- /node-bottom-inner -->
  </div><!-- /node-bottom -->
  <?php endif; ?>
</div><!-- /node-<?php print $node->nid; ?> -->
