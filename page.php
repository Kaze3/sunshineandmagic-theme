<?php get_header(); ?>

<div id="sub-menu">
  <?php wp_list_pages('child_of=' . $post->ID); ?>
</div>

<div id="content">
  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
	    <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
		<?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>