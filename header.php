<! DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <title><?php is_front_page() ? bloginfo('description') : wp_title(''); ?> | <?php bloginfo('name'); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
  <?php wp_head(); ?>
</head>
  
<body <?php body_class(); ?>>
<div id="site">
<div id="wrap">
<div id="header">
  <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
  <div id="header-menu">
    <?php wp_nav_menu(array('theme_location' => 'header-menu',
                            'depth' => 2)); ?>
  </div>
</div> <!-- header -->