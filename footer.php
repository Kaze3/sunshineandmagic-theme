<div id="footer">
  <div id="footer-menu">
    <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
  </div>
  <div id="footer-widget">
    <?php dynamic_sidebar('Footer'); ?>
  </div>
  <div id="colophon">
    <p>&copy; <?php bloginfo('name'); ?> <?php echo date("Y"); ?></p>
  </div>
</div>  <!-- footer -->

</div>  <!-- wrap -->
<?php wp_footer(); ?>
</body>
</html>