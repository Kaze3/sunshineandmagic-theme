<?php get_header(); ?>

<?php if (is_front_page() && function_exists( 'meteor_slideshow' )) { ?>
  <div id="front-slideshow">
    <?php meteor_slideshow(); ?>
  </div>
<?php } ?>

<div id="content-container">
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
</div>

<?php get_footer(); ?>