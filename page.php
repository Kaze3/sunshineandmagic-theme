<?php get_header(); ?>

<?php if (is_front_page()): ?>
  <div id="front-splash">
    <img src="<?php bloginfo('template_directory'); ?>/images/front_image.png" alt="Front Page Image" />
  </div>
<?php endif; ?>
<div id="content">
  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
      <?php
        $parents = get_post_ancestors(get_the_ID());
        if ($parents) {    
          $pid = $parents[count($parents)-1];
          $parent = get_page($pid);
      ?>
        <p class="parent-title"><?php echo get_the_title($parent); ?></p>
      <?php } ?> 
	      <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
		<?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>