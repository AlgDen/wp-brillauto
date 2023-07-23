<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function lesfreresweb_register_assets() {
    
  // // Déclarer jQuery
  // wp_enqueue_script('jquery' );
  
  // // Déclarer le JS
  // wp_enqueue_script( 
  //     'capitaine', 
  //     get_template_directory_uri() . '/js/script.js', 
  //     array( 'jquery' ), 
  //     '1.0', 
  //     true
  // );
  
  // Déclarer un fichier CSS
  wp_enqueue_style( 
      'style', 
      get_template_directory_uri() . '/css/dest/main.min.css',
      array(),
      '1.0'
  );
}
add_action( 'wp_enqueue_scripts', 'lesfreresweb_register_assets' );

// menus
register_nav_menus( array(
	'main-top' => 'Menu Principal Haut',
	'main-bottom' => 'Menu Principal Bas',
) );

// ajoute des classes personnalisées aux menu items 
function add_custom_menu_item_classes($classes, $item, $args) {
  if (isset($args->lfw_menu_link_class)) {
    $classes['class'] = $args->lfw_menu_item_class;
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'add_custom_menu_item_classes', 10, 3);

// ajoute des classes personnalisées aux anchor tags
function add_custom_menu_link_classes($classes, $item, $args)
{
    if (isset($args->lfw_menu_link_class)) {
        $classes['class'] = $args->lfw_menu_link_class;
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'add_custom_menu_link_classes', 10, 3);

// cpt
function lesfreresweb_register_post_types() {
	
  // CPT Formule
  $labels = array(
      'name' => 'Formules',
      'all_items' => 'Toutes les formules',  // affiché dans le sous menu
      'singular_name' => 'Formule',
      'add_new_item' => 'Ajouter une formule',
      'edit_item' => 'Modifier la formule',
      'menu_name' => 'Formules'
  );

  $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-cart',
  );

  register_post_type( 'formules', $args );

    // CPT Engagements
  $labels = array(
    'name' => 'Engagements',
    'all_items' => 'Tous les engagements',  // affiché dans le sous menu
    'singular_name' => 'Engagement',
    'add_new_item' => 'Ajouter un engagement',
    'edit_item' => 'Modifier l\'engagement',
    'menu_name' => 'Engagements'
  );

  $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-heart',
  );

  register_post_type( 'engagements', $args );

  // CPT Réalisations
  $labels = array(
    'name' => 'Réalisations',
    'all_items' => 'Toutes les réalisations',  // affiché dans le sous menu
    'singular_name' => 'Réalisation',
    'add_new_item' => 'Ajouter une réalisation',
    'edit_item' => 'Modifier la réalisation',
    'menu_name' => 'Réalisations'
  );

  $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-format-gallery',
  );

  register_post_type( 'realisations', $args );
}
add_action( 'init', 'lesfreresweb_register_post_types' ); // Le hook init lance la fonction