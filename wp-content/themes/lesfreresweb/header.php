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
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Logo de Brillauto" />
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
                'lfw_menu_item_class' => 'navtop__item',
                'lfw_menu_link_class' => 'navtop__link'
              )
            );
          ?>
        </nav>

        <nav class="navbot">
          <?php wp_nav_menu(
              array (
                'theme_location' => 'main-bottom',
                'container_class' => 'container container--navigation',
                'menu_class' => 'navbot__list',
                'lfw_menu_item_class' => 'navbot__item',
                'lfw_menu_link_class' => 'navbot__link',
                'lfw_submenu_item_class' => 'navbot__child-item',
                'lfw_submenu_link_class' => 'navbot__child-link',
                'lfw_submenu_class' => 'navbot__child-list',
              )
            );
          ?>
        </nav>

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