<?php
/*
Template Name: Gallery List
*/
?>

<?php 
  function gallery_first_image($my_post){
    $pattern = get_shortcode_regex();
    $attachment_ids = array();
    $ids = array();

    if (preg_match_all('/'. $pattern .'/s', $my_post->post_content, $matches)) {
      $count=count($matches[3]);

      for ($j=0; $j<count($matches); $j++)
        echo $matches[$j];

      for ($i = 0; $i < $count; $i++) {
        $atts = shortcode_parse_atts($matches[3][$i]);
        echo $matches[3][$i];
        if (isset($atts[ids])) {
          $attachment_ids = explode(',', $atts[ids]);
          $ids = array_merge($ids, $attachment_ids);
        }
      }
    }

    return $ids;
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