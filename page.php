<?php get_header(); ?>

<?php $is_front_page = is_front_page() ?>

<?php if ($is_front_page && function_exists( 'meteor_slideshow' )) { ?>
  <div id="front-slideshow">
     <header class=frontpage-header>
       <h1 class="frontpage-title"><?php the_title(); ?></h1>
      </header>
    <?php meteor_slideshow(); ?>
  </div>
<?php } ?>

<?php if ($is_front_page) { ?>
  <?php
    $my_query = new WP_Query( 'category_name=Update&posts_per_page=1' );
    if ($my_query->have_posts()) {
  ?>
     <div id="update-container">
     <div id="update">
      <?php $my_query->the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <div class="update-content">
        <?php the_content(); ?>
      </div>
    </div>
    </div>
  <?php } ?>
<?php } ?>

<div id="content-container">
  <div id="content">
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if(!$is_front_page) { ?>
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
<?php } ?>
        <div class="entry-content">
      <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>
