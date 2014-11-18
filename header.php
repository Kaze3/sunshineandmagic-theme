<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0059B2">
  <title><?php wp_title('|'); ?></title>
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
</head>

<body <?php body_class(); ?>>

<div id="header-container">
<div id="header">
  <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a><span class="tagline">Townhome Vacation Rentals in Florida</span></h1>
  <div id="header-menu">
    <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
  </div>
  <!-- <div class="call-to-action"><a href="/rates/enquiries"><p>Enquire<br>Now</p></a></div> -->
</div> <!-- header -->
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
</div>
