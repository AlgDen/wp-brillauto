<?php
/*
Template Name: Notre processus
*/

get_header();
?>

<!-- MAIN -->
<main class="main">
  <h1 class="u-title u-padding-vertical-big u-center-text">
    <?php the_title(); ?>
  </h1>
  <!-- SECTION PROCESSUS -->
  <section class="section-processus u-padding-vertical-big">
    <div class="container">
      <div class="processus">
        <?php
          $iframe = get_field('notre-processus_oembed');
          $iframe = str_replace('<iframe', '<iframe class="processus__iframe u-margin-bottom-small"', $iframe);
          echo $iframe;
        ?>
        <div class="processus__desc">
          <?php the_field('notre-processus_description'); ?>
        </d>
      </div>
    </div>
  </section>
  <section class="section-steps u-padding-vertical-bigger">
    <div class="container container--small">
      <div class="processus-steps">
        <ul class="processus-steps__list">
          <?php
            if( have_rows('notre-processus_steps') ):
              $i = 1;
              while( have_rows('notre-processus_steps') ): the_row();
          ?>
            <li class="processus-steps__item">
              <span class="processus-steps__number u-title-little"><?php echo $i; ?></span>
              <h2 class="processus-steps__title u-title-little">
                <?php the_sub_field('notre-processus_steps-title'); ?>
              </h2>
              <p class="processus-steps__paragraph u-text">
                <?php the_sub_field('notre-processus_steps-text'); ?>
              </p>
            </li>
          <?php
              $i++;
              endwhile;
            endif;
          ?>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="u-text u-margin-top-big">
        <h3 class="u-title-little u-margin-bottom-smaller">Mots de la fin...</h3>
        <?php the_field('notre-processus_steps-final-words'); ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>