<?php
  get_header();
?>
<!-- MAIN -->
<main class="main">
  <section class="section-article u-padding-vertical-big">
    <div class="container">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <article class="blog-article">
          <h1 class="u-title u-margin-bottom-smaller">
            <?php the_title(); ?>
          </h1>
          <p class="blog-article__date u-subtitle">
            Publié le <?php the_time( 'd/m/Y' ); ?>
          </p>
          <p class="blog-article__date u-subtitle u-margin-bottom-small">
            Dans la catégorie <?php echo get_the_category()[0]->cat_name; ?>
          </p>
          <?php the_post_thumbnail('', array('class' => 'blog-article__img u-margin-bottom-small')); ?>
          <div class="blog-article__paragraph u-text">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; endif; ?>
    </div>
    <div class="blog-article__nav">
      <nav class="container blog-article__nav container--blog-article-nav">
        <?php
          $prev = get_previous_post();
          $next = get_next_post();
        ?>
        <a class="blog-article__link blog-article__previous" href="<?php $prev ? the_permalink($prev->ID) : ''; ?>">
          <p class="blog-article__direction">&larr; PRÉCÉDENT ARTICLE</p>
          <p class="blog-article__title"><?php echo $prev ? get_the_title($prev->ID) : 'Vous avez atteint le premier article'; ?></p>
        </a>
        <a class="blog-article__link blog-article__next" href="<?php $next ? the_permalink($next->ID) : ''; ?>">
          <p class="blog-article__direction">PROCHAIN ARTICLE &rarr;</p>
          <p class="blog-article__title"><?php echo $next ? get_the_title($next->ID) : 'Vous avez atteint le dernier article' ?></p>
        </a>

      </nav>
    </div>
  </section>
</main>
<?php get_footer(); ?>