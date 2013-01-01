<?php
/*
Template Name: Gallery List
*/
?>

<?php 
  function gallery_first_image($post_id){
 
    global $post;
 
    $args = array(
        'post_type'   => 'attachment',
        'numberposts' => 1,
        'post_parent' => $post_id,
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post_mime_type' => 'image'
        );
 
    $attachments = get_posts( $args );
 
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            return wp_get_attachment_url( $attachment->ID );
        }
    }
    return false;
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
  <p><?php echo gallery_first_image($gallery_page->ID); ?></p>
<?php } ?>

</div> <!-- content -->
</div> <!-- content-container -->

<?php get_footer(); ?>