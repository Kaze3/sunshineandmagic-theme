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

    return $array_id[0];
  }  
?>

<?php get_header(); ?>

<div id="content-container">
  <div id="content">
    <header class="entry-header">
      <h1 class="entry-title">Gallery</h1>
    </header>

<?php
  $args = array('post_type' => 'page', 'post_parent' => $post->ID);
  $child_gallery_pages = get_posts($args);

  foreach ($child_gallery_pages as $gallery_page) {
?>
  <h2><?php echo get_the_title($gallery_page->ID); ?></h2>
  <p><?php echo wp_get_attachment_thumb_url(gallery_first_image($gallery_page)); ?></p>
<?php } ?>

</div> <!-- content -->
</div> <!-- content-container -->

<?php get_footer(); ?>