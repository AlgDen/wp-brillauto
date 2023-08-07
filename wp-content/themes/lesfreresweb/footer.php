<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ): ?>
<div class="breadcrumb u-text">
  <div class="container">
    <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
  </div>
</div>
<?php endif; ?>

<!-- FOOTER -->
<footer class="footer u-padding-vertical-big">
  <div class="container container--footer">

    <!-- FOOTER LEFT MENU -->
    <div class="footer__left">
      <div class="footer__menu">
        <div class="footer__menu-left">
          <div class="footer__lists">
            <?php wp_nav_menu(
                array (
                  'theme_location' => 'nav-bottom-left-1',
                  'container' => false,
                  'menu_class' => 'footer__list',
                  'lfw_menu_item_class' => 'footer__item',
                  'lfw_menu_link_class' => 'footer__link'
                )
              );
            ?>
            <?php wp_nav_menu(
                array (
                  'theme_location' => 'nav-bottom-left-2',
                  'container' => false,
                  'menu_class' => 'footer__list',
                  'lfw_menu_item_class' => 'footer__item',
                  'lfw_menu_link_class' => 'footer__link'
                )
              );
            ?>
          </div>
        </div>
        <div class="footer__menu-right">
          <?php wp_nav_menu(
              array (
                'theme_location' => 'nav-bottom-left-3',
                'container' => false,
                'menu_class' => 'footer__list',
                'lfw_menu_item_class' => 'footer__item',
                'lfw_menu_link_class' => 'footer__link'
              )
            );
          ?>
        </div>
      </div>
      <div class="contact-us footer__contact-us">
        <p class="contact-us__info-title contact-us__info-title--footer">
          Nous contacter
        </p>
        <?php echo do_shortcode('[contact-form-7 id="259" title="Contact Form Footer" html_class="form"]'); ?>
      </div>
    </div>
    <div class="footer__right">
      <div class="footer__block-head">
        <h4 class="u-title-little">Nous trouver</h4>
        <p class="u-text"><?php the_field('options_address', 'options'); ?></p>
      </div>
      <div class="footer__maps" id="map"></div>
      <div class="footer__socials">
        <a href="<?php the_field('options_instagram', 'options'); ?>" class="footer__social">
          <svg class="footer__icon">
            <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#instagram"></use>
          </svg>
        </a>
        <a href="<?php the_field('options_facebook', 'options'); ?>" class="footer__social">
          <svg class="footer__icon">
            <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#facebook"></use>
          </svg>
        </a>
        <a href="<?php the_field('options_twitter', 'options'); ?>" class="footer__social">
          <svg class="footer__icon">
            <use href="<?php echo get_template_directory_uri(); ?>/assets/svg-icons/sprite.svg#twitter"></use>
          </svg>
        </a>
      </div>
    </div>
    <div class="footer__bottom">
      <p class="u-text u-center-text">© <?php the_time('Y') ?> BrillAuto. Tous droits réservés.</p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>