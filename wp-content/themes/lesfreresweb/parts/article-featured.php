<li class="article__item article__item--featured">
  <div class="article__left">
    <p class="article__info article__info--featured">
      <span class="article__date article__date--featured"
        >Publié le <?php the_time('d/m/Y'); ?></span
      >
      <span class="article__categ article__categ--featured"
        >Catégorie <?php echo isset(get_the_category()[0]) ? get_the_category()[0]->cat_name : ''; ?></span
      >
    </p>
    <h4 class="article__title article__title--featured">
      <a class="article__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <div class="article__desc article__desc--featured">
      <?php the_excerpt(); ?>
    </div>
  </div>
  <div class="article__right article__right--featured">
    <?php the_post_thumbnail('', array('class' => 'article__img')); ?>
  </div>
</li>