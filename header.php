<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <title><?php wp_title('|'); ?></title>
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
</head>
  
<body <?php body_class(); ?>>

<div id="header">
  <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
  <div id="header-menu">
    <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
  </div>
  
  <?php 
    global $post;
	  $parents = get_post_ancestors( $post->ID );
    $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
  ?>

  <?php if (!is_front_page() && !is_404()) { ?>
  <div id="header-submenu">
    <ul>
      <?php wp_list_pages('child_of=' . $id . '&title_li='); ?>
    </ul>
  </div>
  <?php } ?>
</div> <!-- header -->