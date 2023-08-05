<?php get_header(); ?>

<!-- MAIN -->
<main class="main">
  <section class="section-engagements-detail u-padding-vertical-big">
    <h1 class="u-title u-center-text u-margin-bottom-bigger">
      Nos engagements
    </h1>
    <div class="container container--small">
      <div class="engagements u-margin-bottom-small">
        <ul class="engagements__list engagements__list--detail-page">
          <?php
            if ( have_posts() ) :
              while ( have_posts() ) : the_post();
          ?>
            <li class="engagements__item engagements__item--detail-page">
              <div class="engagements__icon engagements__icon--detail-page">
                <svg>
                  <?php if( get_field('engagement_icon') ): ?>
                    <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#<?php the_field('engagement_icon'); ?>"></use>
                  <?php else: ?>
                    <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#engagements-time"></use>
                  <?php endif; ?>
                </svg>
              </div>
              <h3 class="engagements__title engagements__title--detail-page">
                <span><?php the_title(); ?></span>
              </h3>
              <p class="engagements__desc engagements__desc--detail-page">
                <?php the_field('engagement_desc'); ?>
              </p>
            </li>
          <?php
              endwhile;
            endif;
          ?>
        </ul>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>