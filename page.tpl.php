<?php
// $Id: page.tpl.php,v 1.1.2.5 2010/01/11 00:09:05 sociotech Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">

  <head>
    <title><?php print $head_title; ?></title>
    <meta name="google-site-verification" content="4WmhqfiQcr9izEQafz4n3Z39wcRcQ4a50nKWCX3y_fg" />  
    <?php print $head; ?>
    <?php print $styles; ?>
    <?php print $setting_styles; ?>
	  <link href="<?php print $base_path.drupal_get_path('theme', 'pnw_fusion') . '/css/' . $site_handbook . '.css';?>" media="all" rel="stylesheet" />
    <!--[if IE 8]>
      <?php print $ie8_styles; ?>
    <![endif]-->
    <!--[if IE 7]>
      <?php print $ie7_styles; ?>
    <![endif]-->
    <!--[if lte IE 6]>
      <?php print $ie6_styles; ?>
    <![endif]-->
    <?php print $scripts; ?>
  </head>
  
  <body id="<?php print $body_id; ?>" class="<?php print $body_classes; ?>">
    <div id="page" class="page">
      <div id="page-inner" class="page-inner">
        <div id="skip">
          <a href="#main-content-area"><?php print t('Skip to Main Content Area'); ?></a>
        </div>
  
        <!-- header-top row: width = grid_width -->
        <?php if ($header_top || $secondary_links || $search_box): ?>
          <div id="header-top-wrapper" class="header-top-wrapper full-width">
            <div id="header-top" class="<?php if ($search_box): ?>header-top-search<?php endif; ?> header-top row <?php print $grid_width; ?>">
              <div id="header-top-inner" class="header-top-inner inner clearfix">
                <?php print theme('grid_row', $header_top, 'header-top-region', 'full-width', $grid_width); ?>
                <?php print theme('grid_block', theme('links', $secondary_links), 'secondary-menu'); ?>
                <?php print theme('grid_block', $search_box, 'search-box'); ?>
              </div><!-- /header-top-inner -->
            </div><!-- /header-top -->
          </div><!-- /header-top-wrapper -->
        <?php endif; ?>
  
        <!-- header-group row: width = grid_width -->
        <div id="header-group-wrapper" class="header-group-wrapper full-width">
          <div id="header-group" class="header-group row <?php print $grid_width; ?>">
            <div id="header-group-inner" class="header-group-inner inner clearfix">
              <?php if ($logo || $site_name || $site_slogan): ?>
                <div id="header-site-info" class="header-site-info block">
                  <div id="header-site-info-inner" class="header-site-info-inner inner clearfix">
                    <?php if ($logo): ?>
                      <div id="logo">
                        <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
                      </div>
                    <?php endif; ?>
                    <?php if ($site_name || $site_slogan): ?>
                      <div id="site-name-slogan" class="site-name-slogan">
                        <?php if ($site_name): ?>
                          <span id="site-name">
                            <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>">
                              <![if gt IE 6]>
                                <img src="http://<?php print $_SERVER['SERVER_NAME'] . $base_path; ?>sites/default/themes/pnw_fusion/images/eesc/<?php print $site_handbook; ?>/site_name.png" alt="<?php print $site_name; ?> logo" />
                              <![endif]>
                              <?php print '<!--[if lte IE 6]><img src="http://'.$_SERVER['SERVER_NAME'] . $base_path .'sites/default/themes/pnw_fusion/images/eesc/'. $site_handbook . '/site_name.gif" alt="' . $site_name . ' logo" /><![endif]-->'; ?>
                            </a>
                          </span>
                        <?php endif; ?>
                        <?php if ($site_slogan): ?>
                          <span id="slogan"><?php print $site_slogan; ?></span>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div><!-- /header-site-info-inner -->
                </div><!-- /header-site-info -->
              <?php endif; ?>
              <?php print $header; ?>            
                <div id="login-button" class="login-button">
                  <?php // create link to login page or logout depending on user status
                    if ($logged_in) {
                      print '<a rel="no-follow" href="' . $base_path . 'logout" class="logout-link">logout</a>';
                    } else {
                      print '<a rel="no-follow" href="' . $base_path . 'user/login" class="login-link">login</a>';
                    }
                  ?>
                </div><!-- /login-button -->
            </div><!-- /header-group-inner -->
          </div><!-- /header-group -->
        </div><!-- /header-group-wrapper -->
  
  
        <!-- primary-menu row: width = grid_width -->
        <div id="header-primary-menu-wrapper" class="header-primary-menu-wrapper full-width">
          <div id="header-primary-menu" class="header-primary-menu row <?php print $grid_width; ?>">
            <div id="header-primary-menu-inner" class="header-primary-menu-inner inner clearfix">
              <?php print theme('grid_block', $primary_links_tree, 'primary-menu'); ?>
            </div><!-- /header-primary-menu-inner -->
          </div><!-- /header-primary-menu -->
        </div><!-- /header-primary-menu-wrapper -->
        
        <div id="main-content-wrapper">
        
          <!-- preface-top row: width = grid_width -->
          <?php print theme('grid_row', $preface_top, 'preface-top', 'full-width', $grid_width); ?>
    
          <!-- main row: width = grid_width -->
          <div id="main-wrapper" class="main-wrapper full-width">
            <div id="main" class="main row <?php print $grid_width; ?>">
              <div id="main-inner" class="main-inner inner clearfix">
                <?php print theme('grid_row', $sidebar_first, 'sidebar-first', 'nested', $sidebar_first_width); ?>
    
                <!-- main group: width = grid_width - sidebar_first_width -->
                <div id="main-group" class="main-group row nested <?php print $main_group_width; ?>">
                  <div id="main-group-inner" class="main-group-inner inner">
                    <?php print theme('grid_row', $preface_bottom, 'preface-bottom', 'nested'); ?>
    
                    <div id="main-content" class="main-content row nested">
                      <div id="main-content-inner" class="main-content-inner inner">
                        <!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
                        <div id="content-group" class="content-group row nested <?php print $content_group_width; ?>">
                          <div id="content-group-inner" class="content-group-inner inner">
                            <?php print theme('grid_block', $breadcrumb, 'breadcrumbs'); ?>
    
                            <?php if ($content_top || $help || $messages): ?>
                              <div id="content-top" class="content-top row nested">
                                <div id="content-top-inner" class="content-top-inner inner">
                                  <?php print theme('grid_block', $help, 'content-help'); ?>
                                  <?php print theme('grid_block', $messages, 'content-messages'); ?>
                                  <?php print $content_top; ?>
                                </div><!-- /content-top-inner -->
                              </div><!-- /content-top -->
                            <?php endif; ?>
    
                            <div id="content-region" class="content-region row nested">
                              <div id="content-region-inner" class="content-region-inner inner">
                                <a name="main-content-area" id="main-content-area"></a>
                                <?php print theme('grid_block', $tabs, 'content-tabs'); ?>
                                <div id="content-inner" class="content-inner block">
                                  <div id="content-inner-inner" class="content-inner-inner inner">
                                    <div class="clearfix"></div>
                                      <?php if ($title): ?>
                                        <h1 class="title"><?php print $title; ?></h1>
                                      <?php endif; ?>
                                      <?php if ($content): ?>
                                        <div id="content-content" class="content-content">
                                          <?php print $content; ?>
                                          <?php print $feed_icons; ?>
                                        </div><!-- /content-content -->
                                      <?php endif; ?>
                                    </div><!-- /content-inner-inner -->
                                  </div><!-- /content-inner -->
                                </div><!-- /content-region-inner -->
                              </div><!-- /content-region -->
    
                              <?php print theme('grid_row', $content_bottom, 'content-bottom', 'nested'); ?>
                            </div><!-- /content-group-inner -->
                          </div><!-- /content-group -->
    
                          <?php print theme('grid_row', $sidebar_last, 'sidebar-last', 'nested', $sidebar_last_width); ?>
                        </div><!-- /main-content-inner -->
                      </div><!-- /main-content -->
    
                      <?php print theme('grid_row', $postscript_top, 'postscript-top', 'nested'); ?>
                    </div><!-- /main-group-inner -->
                  </div><!-- /main-group -->
                </div><!-- /main-inner -->
              </div><!-- /main -->
            </div><!-- /main-wrapper -->
          
          <div id="main-footer-wrapper">
            <!-- postscript-bottom row: width = grid_width -->
            <?php print theme('grid_row', $postscript_bottom, 'postscript-bottom', 'full-width', $grid_width); ?>
            <!-- footer row: width = grid_width -->
            <?php print theme('grid_row', $footer, 'footer', 'full-width', $grid_width); ?>
            <!-- footer-message row: width = grid_width -->
            <div id="footer-message-wrapper" class="footer-message-wrapper full-width">
              <div id="footer-right"></div>
              <div id="footer-message" class="footer-message row <?php print $grid_width; ?>">
                <div id="footer-message-inner" class="footer-message-inner inner clearfix">
                
                  <div class="pnw-publication">
                    A Pacific Northwest Extension Publication
                    <div style="height: 10px;"></div>
                    <a href="http://oregonstate.edu/">Oregon State University</a><br />
                    <a href="http://www.wsu.edu/">Washington State University</a><br />
                    <a href="http://www.uidaho.edu/">University of Idaho</a>
                    </div>
    
                  <div class="emergency-info">
                    In case of emergency
                    <div style="height: 10px;"></div>
                    Call your poison control center: 1-800-222-1222<br />
                    If the patient has collapsed or is not breathing: call 9-1-1<br />
                    <?php print '<a href="' . base_path() . 'safety-checklist">' ?>Poison Safety Information</a>
                  </div>
                  
                  <div class="handbooks">
                    <a href="http://pnwhandbooks.org/">Pacific Northwest Handbooks</a>
                    <div style="height: 10px;"></div>
                    <a href="http://pnwhandbooks.org/weed">PNW Weed Management Handbook</a><br />
                    <a href="http://pnwhandbooks.org/insect">PNW Insect Management Handbook</a><br />
                    <a href="http://pnwhandbooks.org/plantdisease">PNW Plant Disease Management Handbook</a>
                  </div>

                </div><!-- /footer-message-inner -->
              </div><!-- /footer-message -->
            </div><!-- /footer-message-wrapper -->
          </div><!-- /main-footer-wrapper -->
        </div><!-- /main-content-wrapper -->
        <div id="footer-gradient" class="footer-gradient full-width">
          <div class="copyright">
            <a href="http://oregonstate.edu/main/about/copyright">Copyright</a> &copy; <?php print date("Y") ?> <a href="http://oregonstate.edu">Oregon State University</a>&nbsp;&nbsp;|&nbsp;&nbsp;<?php print '<a href="' . base_path() . 'disclaimer">' ?>Disclaimer</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://oregonstate.edu/main/about/disclaimer/">Web Disclaimer</a>
          </div><!-- /copyright -->
        </div><!-- /footer-gradient -->
  
      </div><!-- /page-inner -->
    </div><!-- /page -->
    <?php print $closure; ?>
  </body>
</html>
