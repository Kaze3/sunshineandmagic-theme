<?php get_header(); ?>

<div id="content">
  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
      <?php
        echo 'ID:' . the_ID();
        $parents = get_post_ancestors(the_ID());
        if ($parents) {    
          $pid = $parents[count($parents)-1];
          echo 'PID:' . $pid;
          $parent = get_page($pid);
      ?>
        <p class="parent-title"><?php get_the_title($parent); ?></p>
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