<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta name="theme-color" content="#0059B2" />
  <title><?php wp_title('|'); ?></title>
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)
    },i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-21229377-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
  </script>
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
