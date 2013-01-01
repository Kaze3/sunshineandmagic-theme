<?php
/*
Template Name: Gallery List
*/
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
    echo($gallery_page->ID);
    echo(get_the_title($gallery_page->ID));
  }
?>

</div> <!-- content -->
</div> <!-- content-container -->

<?php get_footer(); ?>