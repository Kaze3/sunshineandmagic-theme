<?php
/*
Template Name: FAQ
*/
?>

<?php get_header(); ?>

<?php query_posts('post_type=faq&order=ASC') ?>  

<div id="content-container">
  <div id="content">
    <?php if (have_posts()) : ?>
      <header class="entry-header">
        <h1 class="entry-title">FAQs</h1>
      </header>

      <div id="questions">  
        <ul>  
          <?php while (have_posts()) : the_post(); ?>  
            <li><a href="#answer-<?php sanitize_title(the_title()); ?>"><?php the_title(); ?></a></li>  
          <?php endwhile; ?>  
        </ul>  
      </div>  
    <?php else : ?>  
      <header class="entry-header">
        <h1 class="entry-title">Not Found</h1>
      </header>  
      <p>Sorry, No FAQs created yet.</p>  
    <?php endif; ?>
    
    <?php rewind_posts(); ?>
    
    <?php if (have_posts()) : ?>  
      <div id="answers">  
        <ul>  
          <?php while (have_posts()) : the_post(); ?>  
            <li id="answer-<?php sanitize_title(the_title()); ?>">  
              <h2><?php the_title(); ?></h2>  
              <?php the_content(); ?>  
            </li>  
          <?php endwhile; ?>  
        </ul>  
      </div>  
    <?php endif; ?>
    
    <?php wp_reset_query(); ?>  
  </div>
</div>

<?php get_footer(); ?>
