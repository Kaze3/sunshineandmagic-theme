<?php get_header(); ?>

<div id="content">
  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
      <?php
        $parents = get_post_ancestors(the_ID());
        if ($parents):
          $id = $parents[count($parents)-1];
          $parent = get_page($id);
      ?>
        <p class="parent-title"><?php $parent->post_name; ?></p>
      <?php endif; ?> 
	      <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
		<?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>