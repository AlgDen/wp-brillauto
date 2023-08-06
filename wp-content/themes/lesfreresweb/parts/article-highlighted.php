<li class="article__item article__item--highlighted <?php echo isset($args['data']) && $args['data']['last'] ? 'last' : '' ?>">
  <div class="article__left">
    <p class="article__info">
      <span class="article__date"><?php the_time('d/m/Y'); ?></span>
      <span class="article__categ"><?php echo get_the_category()[0]->cat_name; ?></span>
    </p>
    <h4 class="article__title">
      <a class="article__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <div class="article__desc">
      <?php the_excerpt(); ?>
    </div>
  </div>
  <div class="article__right">
    <?php the_post_thumbnail('', array('class' => 'article__img')); ?>
  </div>
</li>