<?php get_header(); ?>

  <!-- SECTION NOS FORMULES -->
  <section class="section-formules">
    <!-- <span class="halo halo--blue halo--first"></span>
    <span class="halo halo--yellow halo--second"></span>
    <span class="halo halo--yellow halo--third"></span>
    <span class="halo halo--blue halo--fourth"></span> -->
    <div class="container">
      <div class="formules">
        <h2 class="u-title u-center-text u-margin-bottom-bigger">
          Nos formules
        </h2>

        <div class="formules__wrapper">
          <?php 
            $nosFormules = get_field('nos-formules_a-la-une');
            if( $nosFormules ):
              foreach( $nosFormules as $post ):
                setup_postdata( $post );
          ?>
            <div class="formule-card">
              <div class="formule-card__icon">
                <svg>
                  <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#<?php the_field('formule_icon'); ?>"></use>
                </svg>
              </div>
              <h3 class="formule-card__title"><?php the_title(); ?></h3>
              <p class="formule-card__price"><span>à partir de <?php the_field('formule_price'); ?>€</span></p>
              <p class="formule-card__duration">Durée : <?php the_field('formule_duration'); ?></p>
              <div class="formule-card__services">
                <?php 
                  if( have_rows( 'formule_services' ) ):
                    while( have_rows( 'formule_services' ) ): the_row();
                ?>
                  <p class="formule-card__service">
                    ✓ <?php the_sub_field( 'formule_service' ); ?>
                  </p>
                <?php 
                    endwhile;
                  endif;
                ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="btn btn--blue"
                >Voir plus</a
              >
            </div>
          <?php 
                wp_reset_postdata();
              endforeach;
            endif;
          ?>

          <?php $serviceOpts = get_field('nos-formules_information'); ?>
          <?php if( $serviceOpts ): ?>
            <div class="service-options" style="background-color:<?php echo $serviceOpts['nos-formules_information-bg']; ?>">
              <h2 class="service-options__title u-margin-bottom-small">
                <?php echo $serviceOpts['nos-formules_information-title']; ?>
              </h2>
              <div class="service-options__paragraph">
                <?php echo $serviceOpts['nos-formules_information-text']; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>