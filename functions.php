<?php
function register_menus() {
  register_nav_menus(
    array('header-menu' => 'Header Menu')
  );
}
add_action('init', 'register_menus');
?>