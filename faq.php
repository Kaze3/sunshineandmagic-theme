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

<?php
$payment = new WP_Query(array('post_type' => 'faq', 'category_name' => 'payment'));
if ($payment->have_posts())
  $queries[] = $payment;
  
$arrival = new WP_Query(array('post_type' => 'faq', 'category_name' => 'arrival'));
if ($arrival->have_posts())
  $queries[] = $arrival;
  
$amenities = new WP_Query(array('post_type' => 'faq', 'category_name' => 'amenities'));
if ($amenities->have_posts())
  $queries[] = $amenities;
  
$location = new WP_Query(array('post_type' => 'faq', 'category_name' => 'location')); 
if ($location->have_posts())
  $queries[] = $location
?>

<?php
foreach ($queries as $my_query) {
      <?php $wp_query = clone $my_query; ?>
      <?php the_post(); ?>
      <?php $the_category = get_the_category(); ?>
        <h3><?php echo $the_category[0]->cat_name; ?></h3>
        <?php rewind_posts(); ?>
        <ul>  
          <?php while (have_posts()) : the_post(); ?>  
            <li><a href="#answer-<?php echo sanitize_title(get_the_title()); ?>"><?php the_title(); ?></a></li>  
          <?php endwhile; ?>  
        </ul>     
    <?php } ?>
    </div>
    
foreach ($queries as $my_query) {
<?php $wp_query = clone $my_query; ?>
      <div id="answers">  
        <ul>  
          <?php while (have_posts()) : the_post(); ?>  
            <li id="answer-<?php echo sanitize_title(get_the_title()); ?>">  
              <h2><?php the_title(); ?></h2>  
              <?php the_content(); ?>  
            </li>  
          <?php endwhile; ?>  
        </ul>  
      </div>  
    
<?php } ?>  
  </div>
</div>

<?php get_footer(); ?>
