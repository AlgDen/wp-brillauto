<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <?php wp_head(); ?>

    <title>Brillauto</title>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>

    <!-- HEADER -->
    <header class="header header--full-height">
      <div class="navigation">

        <!-- @todo: dynamiser le logo -->
        <a href="<?php echo home_url( '/' ); ?>" class="navtop__logo">
          <img src="img/svg-icons/logo.svg" alt="Logo de Brillauto" />
        </a>
        
        <!-- @todo: dynamiser les 2 menus -->
        <nav class="navtop">
          <!-- mobile version -->
          <input type="checkbox" class="navtop__checkbox" id="navi-toggle" />
          <label for="navi-toggle" class="navtop__button">
            <span class="navtop__mobile-icon"></span>
          </label>
          
          <?php wp_nav_menu(
              array (
                'theme_location' => 'main-top',
                'container_class' => 'container container--navigation',
                'menu_class' => 'navtop__list',
              )
            );
          ?>
        </nav>

        <?php wp_nav_menu( array( 'theme_location' => 'main-bottom' ) ); ?>

        <!-- <nav class="navtop">
          <input type="checkbox" class="navtop__checkbox" id="navi-toggle" />
          <label for="navi-toggle" class="navtop__button">
            <span class="navtop__mobile-icon"></span>
          </label>

          <div class="container container--navigation">
            <ul class="navtop__list">
              <li class="navtop__item">Service de nettoyage à domicile</li>
              <li class="navtop__item navtop__item--phone">
                <a href="tel:+33767078200" class="navtop__link">
                  <svg class="navtop__icon">
                    <use href="img/svg-icons/sprite.svg#mobile-phone"></use>
                  </svg>
                  +33 7 67 07 82 00
                </a>
              </li>
              <li class="navtop__item">
                <a href="#" class="navtop__link">Contact</a>
              </li>
              <li class="navtop__item">
                <a href="#" class="navtop__link">FAQ</a>
              </li>
            </ul>
          </div>
        </nav> -->

        <!-- <nav class="navbot">
          <div class="container container--navigation">
            <ul class="navbot__list">
              <li class="navbot__item">
                <a href="#" class="navbot__link navbot__link--first">Accueil</a>
              </li>
              <li class="navbot__item navbot__item--formules">
                <a href="#" class="navbot__link">
                  <span class="navbot__link--formules"> Nos formules</span>
                </a>
                <ul class="navbot__child-list">
                  <li class="navbot__child-item">
                    <a href="#" class="navbot__child-link">
                      Nettoyage intérieur classique
                    </a>
                  </li>
                  <li class="navbot__child-item">
                    <a href="#" class="navbot__child-link">
                      Nettoyage intérieur deluxe
                    </a>
                  </li>
                  <li class="navbot__child-item">
                    <a href="#" class="navbot__child-link">
                      Traitement déperlant vitres
                    </a>
                  </li>
                  <li class="navbot__child-item">
                    <a href="#" class="navbot__child-link">
                      Traitement anti-buée
                    </a>
                  </li>
                </ul>
              </li>
              <li class="navbot__item">
                <a href="#" class="navbot__link">Nos engagements</a>
              </li>
              <li class="navbot__item">
                <a href="#" class="navbot__link">Notre processus</a>
              </li>
              <li class="navbot__item">
                <a href="#" class="navbot__link">Nos réalisations</a>
              </li>
              <li class="navbot__item">
                <a href="#" class="navbot__link navbot__link--last">Blog</a>
              </li>
              <li class="navbot__item navbot__item--call">
                <a
                  href="tel:+33767078200"
                  class="navbot__link navbot__link--last"
                >
                  <svg class="navbot__icon">
                    <use href="img/svg-icons/sprite.svg#mobile-phone"></use>
                  </svg>
                  +33 7 67 07 82 00</a
                >
              </li>
            </ul>
          </div>
        </nav> -->
      </div>

      <!-- <div class="header__content">
        <div class="header__text">
          <h1 class="header__title">
            <span>Faites briller votre voiture</span>
          </h1>
          <p class="header__desc">
            <span>
              Nous sommes spécialisés dans le nettoyage intérieur de voitures à
              Nantes
            </span>
          </p>
          <a
            href="tel:+33767078200"
            class="btn btn--white btn--animation-color btn--shadow"
            >Nous appeler</a
          >
        </div>
      </div> -->
    </header>