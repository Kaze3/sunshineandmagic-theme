<! DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" /> />
    <title><?php wp_title('', true, 'right'); ?> | <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>