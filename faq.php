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
$arrival = new WP_Query(array('post_type' => 'faq', 'category_name' => 'Arrival'));
if ($arrival->have_posts())
  $queries[] = $arrival;
  
$general = new WP_Query(array('post_type' => 'faq', 'category_name' => 'General Information'));
if ($general->have_posts())
  $queries[] = $general;
  
$amenities = new WP_Query(array('post_type' => 'faq', 'category_name' => 'House Amenities'));
if ($amenities->have_posts())
  $queries[] = $amenities;
  
$area = new WP_Query(array('post_type' => 'faq', 'category_name' => 'Orlando Area')); 
if ($area->have_posts())
  $queries[] = $area;

$payment = new WP_Query(array('post_type' => 'faq', 'category_name' => 'Payment')); 
if ($payment->have_posts())
  $queries[] = $payment;

$amenities = new WP_Query(array('post_type' => 'faq', 'category_name' => 'Resort Amenities')); 
if ($amenities->have_posts())
  $queries[] = $amenities;
?>

<?php foreach ($queries as $my_query) {
  $wp_query = clone $my_query;
  the_post();
  $the_category = get_the_category(); ?>
  <h4><?php echo $the_category[0]->cat_name; ?></h4>
  <?php rewind_posts(); ?>
  <ul>  
    <?php while (have_posts()) : the_post(); ?>  
      <li><a href="#answer-<?php echo sanitize_title(get_the_title()); ?>"><?php the_title(); ?></a></li>  
    <?php endwhile; ?>  
  </ul>     
<?php } ?>
</div> <!-- questions -->
<div id="answers"> 
<?php    
foreach ($queries as $my_query) {
  $wp_query = clone $my_query;
  the_post();
  $the_category = get_the_category(); ?>
  <h2><?php echo $the_category[0]->cat_name; ?></h2>
  <?php rewind_posts(); ?>
  <ul>  
    <?php while (have_posts()) : the_post(); ?>  
      <li id="answer-<?php echo sanitize_title(get_the_title()); ?>">  
        <h4><?php the_title(); ?></h4>  
        <?php the_content(); ?>  
      </li>  
    <?php endwhile; ?>  
  </ul>  
<?php } ?>  

</div> <!-- answers -->
</div> <!-- content -->
</div> <!-- content-container -->

<?php get_footer(); ?>
