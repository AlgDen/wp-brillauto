<?php get_header(); ?>

<!-- MAIN -->
<main class="main">
  <!-- SINGLE FORMULE -->
  <section class="section-single-formule u-padding-vertical-big">
    <div class="container">
      <div class="single-formule">
        <div class="single-formule__head u-margin-bottom-bigger">
          <div class="single-formule__left">
            <h1 class="single-formule__title u-title">
              <?php the_title(); ?>
            </h1>
            <p class="single-formule__price u-title-little">
              À partir de <?php the_field('formule_price'); ?>€
            </p>
            <p class="single-formule__duration u-subtitle">Durée : <?php the_field('formule_duration') ?></p>
            <div class="u-text">
              <?php the_field('formule_text'); ?>
            </div>
          </div>
          <div class="single-formule__right">
            <?php the_post_thumbnail( '', array( 'class' => 'single-formule__img' ) ) ?>
          </div>
        </div>
        <div class="single-formule__content">
            <h2 class="u-title-little u-center-text u-margin-bottom-small">Quelques unes des étapes du nettoyage</h2>
          <ul class="single-formule__list">
            <?php
              // Check rows exists
              if( have_rows('formule_steps') ):
                // Loop through rows
                while( have_rows('formule_steps') ) : the_row();
            ?>
              <li class="single-formule__item">
                <div class="single-formule__icon">
                  <svg>
                    <?php if( get_sub_field('formule_steps-icon') ): ?>
                      <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#<?php the_sub_field('formule_steps-icon'); ?>"></use>
                    <?php else: ?>
                      <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#sanitizer"></use>
                    <?php endif; ?>
                  </svg>
                </div>
                <div class="single-formule__item-right">
                  <h3 class="single-formule__name u-text">
                    <?php the_sub_field('formule_steps-title'); ?>
                  </h3>
                  <p class="single-formule__desc u-text">
                    <?php the_sub_field('formule_steps-text'); ?>
                  </p>
                </div>
              </li>
            <?php
                endwhile;
              endif;
            ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>