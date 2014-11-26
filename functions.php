<?php
$content_width = 960;

if (function_exists('register_sidebar')) {
  register_sidebar(array('name'=>'Footer'));
}

function register_menus() {
  register_nav_menus(
    array('header-menu' => 'Header Menu',
          'footer-menu' => 'Footer Menu')
  );
}
add_action('init', 'register_menus');

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

function grid_6_alpha_shortcode($atts, $content = null) {
  return '<div class="row"><div class="col2">' . wpautop(trim($content)) . '</div>';
}
add_shortcode('2col_first', 'grid_6_alpha_shortcode');

function grid_6_omega_shortcode($atts, $content = null) {
  return '<div class="col2">' . wpautop(trim($content)) . '</div></div>';
}
add_shortcode('2col_second', 'grid_6_omega_shortcode');

function grid_4_alpha_shortcode($atts, $content = null) {
  return '<div class="row"><div class="col3">' . wpautop(trim($content)) . '</div>';
}
add_shortcode('3col_first', 'grid_4_alpha_shortcode');

function grid_4_shortcode($atts, $content = null) {
  return '<div class="col3">' . wpautop(trim($content)) . '</div>';
}
add_shortcode('3col_second', 'grid_4_shortcode');

function grid_4_omega_shortcode($atts, $content = null) {
  return '<div class="col3">' . wpautop(trim($content)) . '</div></div>';
}
add_shortcode('3col_third', 'grid_4_omega_shortcode');

// ADDING CUSTOM POST TYPE FAQ - http://net.tutsplus.com/tutorials/wordpress/creating-an-interactive-faq-with-wordpress-and-jquery-ui/
add_action('init', 'my_custom_init');

function my_custom_init()
{
  $labels = array(
    'name' => _x('FAQs', 'post type general name'),
    'singular_name' => _x('FAQ', 'post type singular name'),
    'add_new' => _x('Add New', 'FAQ'),
    'add_new_item' => __('Add New FAQ'),
    'edit_item' => __('Edit FAQ'),
    'new_item' => __('New FAQ'),
    'view_item' => __('View FAQ'),
    'search_items' => __('Search FAQs'),
    'not_found' =>  __('No FAQs found'),
    'not_found_in_trash' => __('No FAQs found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor'),
    'taxonomies' => array('category')
  );
  register_post_type('faq',$args);
}

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
  // Define the style_formats array
  $style_formats = array(
    // Each array child is a format with it's own settings
    array(
      'title' => 'Small Print',
      'block' => 'small',
    ),
  );
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );

  return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


function theme_name_wp_title( $title, $sep ) {
  if ( is_feed() ) {
    return $title;
  }

  global $page, $paged;

  // Add the blog name
  $title .= get_bloginfo( 'name', 'display' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " $sep $site_description";

  }

  // Add a page number if necessary:
  if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
    $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

  }

  return $title;

}
add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );


function filter_ptags_on_images($content) {
  return preg_replace('/<p[^>]*>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\/p>/', '<div class="content-image">$1</div>', $content);
}

add_filter('the_content', 'filter_ptags_on_images', 99);

?>
