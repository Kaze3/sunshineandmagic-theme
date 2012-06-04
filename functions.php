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

function strip_empty_p($string) {
  return str_replace("<p> </p>","",$string);
}

function grid_6_alpha_shortcode($atts, $content = null) {
  return '<div class="container_12"><div class="grid_6 alpha">' . strip_empty_p($content) . '</div>';
}
add_shortcode('2col_first', 'grid_6_alpha_shortcode');

function grid_6_omega_shortcode($atts, $content = null) {
  return '<div class="grid_6 omega">' . strip_empty_p($content) . '</div></div>';
}
add_shortcode('2col_second', 'grid_6_omega_shortcode');

function grid_4_alpha_shortcode($atts, $content = null) {
  return '<div class="container_12"><div class="grid_4 alpha">' . strip_empty_p($content) . '</div>';
}
add_shortcode('3col_first', 'grid_4_alpha_shortcode');

function grid_4_shortcode($atts, $content = null) {
  return '<div class="grid_4">' . strip_empty_p($content) . '</div>';
}
add_shortcode('3col_second', 'grid_4_shortcode');

function grid_4_omega_shortcode($atts, $content = null) {
  return '<div class="grid_4 omega">' . strip_empty_p($content) . '</div></div>';
}
add_shortcode('3col_third', 'grid_4_omega_shortcode');
?>