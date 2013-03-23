<?php
/*
Template Name: Gallery List
*/
?>

<?php 
  function gallery_first_image($my_post){
    if (preg_match('/\[gallery.*ids=.(.*).\]/', $my_post->post_content, $ids)) {
      $array_id = explode(",", $ids[1]);
    }

    return $array_id;
  }  
?>

<?php get_header(); ?>

<div id="content-container">
  <div id="content">
    <header class="entry-header">
      <h1 class="entry-title">Gallery</h1>
    </header>
    <div class="entry-content">
    <div class="container_12">

<?php
  $args = array('post_type' => 'page', 'post_parent' => $post->ID, 'order' => 'ASC');
  $child_gallery_pages = get_posts($args);
  $count = 0;

  foreach ($child_gallery_pages as $gallery_page) {
    $count += 1;
    $ids = gallery_first_image($gallery_page);
    $number_of_images = count($ids);
    $alt = get_post_meta($ids[0], '_wp_attachment_image_alt', true);
    $gallery_id = $gallery_page->ID;
    $description = get_post_custom_values('gallery-description', $gallery_id);

    if ($count % 2 == 0) {
      $tags = 'grid_6 omega';
    } else {
      $tags = 'grid_6 alpha';
    }

?>
  <div class="gallery-summary <?php echo $tags ?>">
    <h2><?php echo get_the_title($gallery_page->ID); ?></h2>
    <a href="<?php echo get_permalink($gallery_id); ?>" title="<?php echo get_the_title($gallery_id); ?>">
      <img src="<?php echo wp_get_attachment_thumb_url($ids[0]); ?>" <?php if ($alt) echo 'alt="' . $alt . '"'; ?>>
    </a>
    <div class="gallery-info">
      <p><?php echo $description[0]; ?></p>
      <p>Number of images: <?php echo $number_of_images; ?></p>
    </div>
  </div>
<?php } ?>

    </div> <!-- container_12 -->
    </div> <!-- entry-content -->
  </div> <!-- content -->
</div> <!-- content-container -->

<?php get_footer(); ?>