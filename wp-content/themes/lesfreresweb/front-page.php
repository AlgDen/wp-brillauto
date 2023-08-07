<?php get_header(); ?>

<!-- MAIN -->
<main>

  <!-- SECTION DISCOVER -->
  <section class="section-discover u-padding-vertical-big">
    <div class="container">
      <div class="discover">
        <div class="discover__left">
          <h1 class="discover__title u-title"><?php the_field('discover_title'); ?></h1>
          <div class="discover__paragraph"><?php the_field('discover_text'); ?></div>
        </div>
        <div class="discover__right">
          <?php
            $img_id = get_field('discover_img');
            echo wp_get_attachment_image( $img_id, 'medium', false, array('class' => 'discover__img', 'decoding' => 'async', 'loading' => 'lazy') );
          ?>
          <!-- <img
            src=""
            alt="Image de découverte de la marque"
            class="discover__img"
          /> -->
        </div>
      </div>
    </div>
  </section>

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
            $posts = get_field('nos-formules_a-la-une');
            if( $posts ):
              foreach( $posts as $post ):
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
              <a href="<?php the_permalink(); ?>" class="btn btn--blue btn--animation-scale"
                >Voir plus</a
              >
            </div>
          <?php 
              endforeach;
              wp_reset_postdata();
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

  <!-- SECTION PROCESSUS -->
  <section class="section-processus u-padding-vertical-big">
    <div class="container container--small">
      <div class="processus">
        <h2 class="u-title u-margin-bottom-small"><?php the_field('notre-processus_title'); ?></h2>
        <div class="processus__desc u-margin-bottom-small">
          <?php the_field('notre-processus_description'); ?>
        </div>
        <?php
          $iframe = get_field('notre-processus_oembed');
          $iframe = str_replace('<iframe', '<iframe class="processus__iframe u-margin-bottom-small"', $iframe);
          echo $iframe;
        ?>
        <a href="<?php the_field('notre-processus_link'); ?>" class="link link--white">En savoir plus</a>
      </div>
    </div>
  </section>

  <!-- SECTION AVIS -->
  <section class="section-avis u-padding-vertical-big">
    <!-- <span class="halo halo--blue halo--first"></span>
    <span class="halo halo--yellow halo--second"></span>
    <span class="halo halo--yellow halo--third"></span>
    <span class="halo halo--blue halo--fourth"></span> -->
    <div class="container">
      <div class="avis">
        <h2 class="u-title u-center-text u-margin-bottom-small">
          Ce qu’ils en pensent
        </h2>
        <?php
          global $wpdb;
          $moyenne_notes = $wpdb->get_var(
              "SELECT AVG(CAST(meta_value AS DECIMAL(10,1))) 
              FROM $wpdb->postmeta
              WHERE meta_key = 'avis-google_rating' 
              AND post_id IN (SELECT ID FROM $wpdb->posts WHERE post_type = 'avis_google')"
          );
          $moyenne_notes = round($moyenne_notes, 1);
          $moyenne_notes = str_replace('.', ',', $moyenne_notes);
        
          // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
          $args = array(
            'post_type' => 'avis_google',
            'post_status' => 'publish', // Uniquement les avis publiés
            'posts_per_page' => -1, // Récupérer tous les avis
            'fields' => 'ids' // Récupérer uniquement les IDs des avis pour améliorer les performances
          );
          // 2. On exécute la WP Query
          $avis_query = new WP_Query( $args );
          // Récupérer le nombre total d'avis
          $nombre_total_avis = $avis_query->post_count;
        ?>
        <p class="avis__average u-margin-bottom-small">
          Noté <?php echo $moyenne_notes; ?> sur <?php echo $nombre_total_avis; ?> avis
        </p>

        <div class="avis__wrapper u-margin-bottom-small">
          <?php 
              $posts = get_field('their-thoughts_a-la-une');
              if( $posts ):
                foreach( $posts as $post ):
                  setup_postdata( $post );
          ?>
            <article class="avis-card">
              <svg class="avis-card__avatar">
                <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#avis-avatar"></use>
              </svg>
              <h3 class="avis-card__title"><?php the_title(); ?></h3>
              <p class="avis-card__desc">
                <?php the_field('avis-google_text'); ?>
              </p>
              <div class="avis-card__stars">
                <?php for( $i = 0; $i < get_field('avis-google_rating'); $i++ ): ?>
                  <svg class="avis-card__star">
                    <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#avis-star"></use>
                  </svg>
                <?php endfor; ?>
                <?php if( get_field('avis-google_rating') < 5 ): ?>
                  <?php for( $i = 0; $i < abs(5-get_field('avis-google_rating')); $i++ ): ?>
                    <svg class="avis-card__star">
                      <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#avis-star-stroke"></use>
                    </svg>
                  <?php endfor; ?>  
                <?php endif; ?>
              </div>
            </article>
          <?php
                endforeach;
                wp_reset_postdata();
              endif;
          ?>
        </div>

        <a href="#" class="link link--black">Voir tous les avis</a>
      </div>
    </div>
  </section>
  
  <!-- SECTION ENGAGEMENTS -->
  <section class="section-engagements u-padding-vertical-big">
    <div class="container">
      <h2 class="u-title u-center-text u-margin-bottom-small">
        Nos engagements
      </h2>
      <div class="engagements u-margin-bottom-small">
        <ul class="engagements__list">
          <?php 
            $posts = get_field('nos-engagements_a-la-une');
            if( $posts ):
              foreach( $posts as $key => $post ):
                setup_postdata( $post );
          ?>
            <li class="engagements__item <?php echo $key === 3 ? "engagements__hide-responsive" : ''; ?>">
              <svg class="engagements__icon">
                <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#<?php the_field('engagement_icon'); ?>"></use>
              </svg>
              <h3 class="engagements__title">
                <?php the_title(); ?>
              </h3>
              <p class="engagements__desc">
                <?php the_field('engagement_desc'); ?>
              </p>
            </li>
          <?php 
              endforeach;
              wp_reset_postdata();
            endif;
          ?>
        </ul>
      </div>
      <a href="<?php the_field('nos-engagements_link'); ?>" class="link link--white">En savoir plus</a>
    </div>
  </section>

  <!-- SECTION FAQ -->
  <section class="section-faq u-padding-vertical-bigger">
    <div class="faq container u-margin-bottom-big">
      <ul class="faq__list">
        <?php 
          $posts = get_field('faq_a-la-une');
          if( $posts ):
            foreach( $posts as $key => $post ):
              setup_postdata( $post );
              if($key < 4):
        ?>
          <li class="faq__item">
            <h3 class="faq__question">
              <?php the_title(); ?>
            </h3>
            <p class="faq__answer">
              <?php the_field('faq_answer'); ?>
            </p>
          </li>
        <?php 
              endif;
            endforeach;
            wp_reset_postdata();
          endif;
        ?>
      </ul>
      <ul class="faq__list">
        <?php 
          if( $posts ):
            foreach( $posts as $key => $post ):
              setup_postdata( $post );
              if($key >= 4):
        ?>
          <li class="faq__item">
            <h3 class="faq__question">
              <?php the_title(); ?>
            </h3>
            <p class="faq__answer">
              <?php the_field('faq_answer'); ?>
            </p>
          </li>
        <?php 
              endif;
            endforeach;
            wp_reset_postdata();
          endif;
        ?>
      </ul>
    </div>
    <a href="<?php the_field('faq_link'); ?>" class="link link--black">Consulter la FAQ</a>
  </section>

  <!-- SECTION CONTACT US -->
  <section class="section-contact-us u-padding-vertical-big">
    <div class="container container--contact-us">
      <div class="contact-us__decor">
        <?php 
          $img_id = get_field('contact_image');
          echo wp_get_attachment_image( $img_id, '', false, array('class' => 'contact-us__img') );
        ?>

      </div>
      <div class="contact-us">
        <p class="contact-us__info-title">Une question à nous poser ?</p>
        <p class="contact-us__info-subtitle">Ecrivez-nous un message !</p>
        <?php echo do_shortcode('[contact-form-7 id="191" title="Contact form" html_class="form"]'); ?>

        <!-- <form action="#" class="form">
          <input
            type="email"
            class="form__input"
            placeholder="Votre email"
          />
          <textarea
            name="#"
            id=""
            cols="30"
            rows="10"
            placeholder="Votre message"
            class="form__textarea"
          ></textarea>
          <button
            class="btn btn--blue btn--animation-scale btn--shadow form__submit"
          >
            Envoyer
          </button>
        </form> -->
      </div>
    </div>
  </section>

  <!-- SECTION BLOG -->
  <section class="section-blog u-padding-vertical-huge">
    <div class="container">
      <h2 class="u-title u-center-text u-margin-bottom-big">
        Nos derniers articles
      </h2>
      <ul class="article u-margin-bottom-small">
        <?php 
          $posts = get_field('nos-derniers-articles_a-la-une');
          if( $posts ):
            foreach( $posts as $post ):
              setup_postdata( $post );
        ?>
          <li class="article__item">
            <div class="article__left">
              <p class="article__info">
                <span class="article__date" title="Publié le <?php the_time( 'd/m/Y H:i:s' ); ?>"><?php the_time( 'd/m/Y' ); ?></span>
                <?php $categ = get_the_category(); ?>
                <span class="article__categ" title="Catégorie <?php echo $categ[0]->cat_name; ?>"><?php echo $categ[0]->cat_name; ?></span>
              </p>
              <h4 class="article__title" data-tooltip="Votre description alternative pour le titre">
                <a class="article__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h4>
              <div class="article__desc">
                <?php the_excerpt(); ?>
              </div>
            </div>
            <div class="article__right">
              <?php the_post_thumbnail( 'thumbnail' , array( 'class' => 'article__img') ); ?>
              <!-- <img src="" alt="" class="article__img" /> -->
            </div>
          </li>
        <?php 
            endforeach;
            wp_reset_postdata();
          endif;
        ?>
      </ul>
      <a href="<?php echo esc_url( home_url('/blog') ); ?>" class="link link--black">Notre blog</a>
    </div>
  </section>
  
</main>
<?php get_footer(); ?>