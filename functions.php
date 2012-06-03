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

function grid_6_shortcode($atts, $content = null) {
  return '<div class="container_12 grid_6">' . $content . '</div>';
}

function grid_6_alpha_shortcode($atts, $content = null) {
  return '<div class="container_12 grid_6 alpha">' . $content . '</div>';
}

function grid_6_omega_shortcode($atts, $content = null) {
  return '<div class="container_12 grid_6 omega">' . $content . '</div>';
}

add_shortcode('grid_6', 'grid_6_shortcode');
add_shortcode('grid_6_alpha', 'grid_6_alpha_shortcode');
add_shortcode('grid_6_omega', 'grid_6_omega_shortcode');
?>