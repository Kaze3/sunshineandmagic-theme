<?php
/*
Template Name: FAQ
*/
?>

<?php get_header(); ?>

<div id="content-container">
  <div id="content">
    <header class="entry-header">
      <h1 class="entry-title">FAQs</h1>
    </header>
    <div id="questions">

<?php $categories = array('payment', 'arrival', 'amenities', 'location');

foreach ($categories as $category) {
  $query = new WP_Query(array('post_type' => 'faq', 'category_name' => $category)); 
  $the_category = get_the_category() ?>
  
    <?php if ($query->have_posts()) : ?>
        <h3><?php echo $the_category[0]->cat_name; ?></h3>
        <ul>  
          <?php while ($query->have_posts()) : $query->the_post(); ?>  
            <li><a href="#answer-<?php echo sanitize_title(get_the_title()); ?>"><?php the_title(); ?></a></li>  
          <?php endwhile; ?>  
        </ul>     
    <?php endif; ?>
    <?php } ?>
    </div>
    
<?php foreach ($categories as $category) {
  $query = new WP_Query(array('post_type' => 'faq', 'category_name' => $category)); ?>
    
    <?php if ($query->have_posts()) : ?>  
      <div id="answers">  
        <ul>  
          <?php while ($query->have_posts()) : $query->the_post(); ?>  
            <li id="answer-<?php echo sanitize_title(get_the_title()); ?>">  
              <h2><?php the_title(); ?></h2>  
              <?php the_content(); ?>  
            </li>  
          <?php endwhile; ?>  
        </ul>  
      </div>  
    <?php endif; ?>
    
<?php } ?>  
  </div>
</div>

<?php get_footer(); ?>
