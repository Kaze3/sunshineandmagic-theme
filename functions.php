<?php
$content_width = 960;

if (function_exists('register_sidebar')) {
  register_sidebar(array('name'=>'Footer 1'));
  register_sidebar(array('name'=>'Footer 2'));
}

function register_menus() {
  register_nav_menus(
    array('header-menu' => 'Header Menu')
  );
}
add_action('init', 'register_menus');
?>