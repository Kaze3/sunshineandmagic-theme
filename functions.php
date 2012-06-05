<?php
$content_width = 960;

if (function_exists('register_sidebar')) {
  register_sidebar(array('name'=>'Footer'));
}

function register_menus() {
  register_nav_menus(
    array('header-menu' => 'Header Menu'),
    array('footer-menu' => 'Footer Menu')
  );
}
add_action('init', 'register_menus');

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

function grid_6_alpha_shortcode($atts, $content = null) {
  return '<div class="container_12"><div class="grid_6 alpha">' . wpautop(trim($content)) . '</div>';
}
add_shortcode('2col_first', 'grid_6_alpha_shortcode');

function grid_6_omega_shortcode($atts, $content = null) {
  return '<div class="grid_6 omega">' . wpautop(trim($content)) . '</div></div>';
}
add_shortcode('2col_second', 'grid_6_omega_shortcode');

function grid_4_alpha_shortcode($atts, $content = null) {
  return '<div class="container_12"><div class="grid_4 alpha">' . wpautop(trim($content)) . '</div>';
}
add_shortcode('3col_first', 'grid_4_alpha_shortcode');

function grid_4_shortcode($atts, $content = null) {
  return '<div class="grid_4">' . wpautop(trim($content)) . '</div>';
}
add_shortcode('3col_second', 'grid_4_shortcode');

function grid_4_omega_shortcode($atts, $content = null) {
  return '<div class="grid_4 omega">' . wpautop(trim($content)) . '</div></div>';
}
add_shortcode('3col_third', 'grid_4_omega_shortcode');
?>