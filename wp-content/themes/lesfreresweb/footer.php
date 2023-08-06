<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ): ?>
<div class="breadcrumb u-text">
  <div class="container">
    <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
  </div>
</div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>