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
          <?php the_post_thumbnail('', array('class' => 'blog-article__img u-margin-bottom-small')) ?>
          <div class="blog-article__paragraph u-text">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; endif; ?>
      <div class="blog-article__nav">
        <div class="blog-article__previous">
          <a href="<?php get_previous_post_link(); ?>">Article précédent</a>
        </div>
        <div class="blog-article__next">
          <a href="<?php get_previous_post_link(); ?>">PROCHAIN ARTICLE</a>
        </div>
        
      </div>
      <div>
    </div>
  </section>
</main>
<?php get_footer(); ?>