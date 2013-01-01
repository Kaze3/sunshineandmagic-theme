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
$all_pages = new WP_Query(array('post_type' => 'page'));
if ($all_pages->have_posts()) {
  $child_gallery_pages = get_page_children($post->ID, $all_pages);

  foreach ($child_gallery_pages as $gallery_page) {
    echo($gallery_page->ID);
    echo(get_the_title($gallery_page->ID));
  }
}
?>

</div> <!-- content -->
</div> <!-- content-container -->

<?php get_footer(); ?>