<?php 

include_once __DIR__ . '/inc/faq-cpt.php';
include_once __DIR__ . '/inc/formules-cpt.php';
include_once __DIR__ . '/inc/engagements-cpt.php';
include_once __DIR__ . '/inc/avis-google-cpt.php';

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function lesfreresweb_register_assets() {
    
  // // Déclarer jQuery
  wp_enqueue_script('jquery' );
  
  // Déclarer un fichier CSS
  wp_enqueue_style( 
    'leaflet-css',
    'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
    array(),
    '1.0'
  );
  
  // Déclarer un fichier JS
  wp_enqueue_script( 
    'leaflet-js', 
    'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', 
    array('jquery'), 
    '1.1', 
    true
  );

  // Déclarer un fichier JS
  wp_enqueue_script( 
      'script', 
      get_template_directory_uri() . '/js/dest/script.min.js', 
      array( 'jquery', 'leaflet-js' ), 
      '1.2', 
      true
  );
  
  // Déclarer un fichier CSS
  wp_enqueue_style( 
      'style', 
      get_template_directory_uri() . '/css/dest/main.min.css',
      array(),
      '1.0'
  );

  wp_enqueue_style(
    'roboto-font',
    'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap',
    array(),
    '1.0',
    'all'
);

}
add_action( 'wp_enqueue_scripts', 'lesfreresweb_register_assets' );

// menus
register_nav_menus( array(
	'main-top' => 'Menu Principal Haut',
	'main-bottom' => 'Menu Principal Bas',
  'nav-bottom-left-1' => 'Footer menu gauche 1',
  'nav-bottom-left-2' => 'Footer menu gauche 2',
  'nav-bottom-left-3' => 'Footer menu gauche 3',
) );

// ajoute des classes personnalisées aux menu items 
function lfw_add_custom_menu_item_classes($classes, $item, $args) {
  if (isset($args->lfw_menu_item_class) && $item->menu_item_parent == 0) {
    $classes['class'] = $args->lfw_menu_item_class;
  }
  
  if (isset($args->lfw_submenu_item_class) && $item->menu_item_parent > 0) {
    $classes['class'] = $args->lfw_submenu_item_class;
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'lfw_add_custom_menu_item_classes', 10, 3);

// ajoute des classes personnalisées aux anchor tags
function lfw_add_custom_menu_link_classes($atts, $item, $args) {
  // menu niveau 0
  if (isset($args->lfw_menu_link_class) && $item->menu_item_parent == 0) {
      $atts['class'] = $args->lfw_menu_link_class;
  }

  // menu niveau 1
  if (isset($args->lfw_submenu_link_class) && $item->menu_item_parent > 0) {
    $atts['class'] = $args->lfw_submenu_link_class;
  }

  return $atts;
}
add_filter('nav_menu_link_attributes', 'lfw_add_custom_menu_link_classes', 10, 3);

// Fonction pour ajouter des classes personnalisées au sous-menu en utilisant un filtre
function lfw_add_submenu_class($classes, $args) {
  if (isset($args->lfw_submenu_class) && !empty($args->lfw_submenu_class)) {
      $classes[] = $args->lfw_submenu_class;
  }
  
  return $classes;
}
add_filter('nav_menu_submenu_css_class', 'lfw_add_submenu_class', 10, 3);

// Fonction pour ajouter un span autour de la balise anchor des éléments de menu avec la classe navbot__item--formules
function add_span_to_menu_link($item_output, $item, $depth, $args) {
    // Vérifiez si l'élément de menu a la classe navbot__item--formules
    if (in_array('navbot__item--formules', $item->classes)) {
      $item_output = '<a class="navbot__link">' . '<span class="navbot__link--formules">' . $item->title . '</span>' . '</a>';
    }

  return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_span_to_menu_link', 10, 4);

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
        'supports' => array( 'title','thumbnail' ),
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
        'supports' => array( 'title','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-heart',
  );

  register_post_type( 'engagements', $args );

//  // CPT Réalisations
//  $labels = array(
//    'name' => 'Réalisations',
//    'all_items' => 'Toutes les réalisations',  // affiché dans le sous menu
//    'singular_name' => 'Réalisation',
//    'add_new_item' => 'Ajouter une réalisation',
//    'edit_item' => 'Modifier la réalisation',
//    'menu_name' => 'Réalisations'
//  );
//
//  $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'has_archive' => true,
//        'show_in_rest' => true,
//        'supports' => array( 'title', 'editor','thumbnail' ),
//        'menu_position' => 5,
//        'menu_icon' => 'dashicons-format-gallery',
//  );
//
//  register_post_type( 'realisations', $args );

  // CPT Avis google
  $labels = array(
    'name' => 'Avis Google',
    'all_items' => 'Tous les avis google', // affiché dans le sous menu
    'singular_name' => 'Avis Google',
    'add_new_item' => 'Ajouter un avis',
    'edit_item' => 'Modifier l\'avis',
    'menu_name' => 'Avis Google'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'supports' => array( 'title','thumbnail' ),
    'menu_position' => 5, 
    'menu_icon' => 'dashicons-star-filled',
  );

  register_post_type( 'avis_google', $args );

  // CPT FAQ
  $labels = array(
    'name' => 'FAQ',
    'all_items' => 'Toutes les questions/réponses', // affiché dans le sous menu
    'singular_name' => 'FAQ',
    'add_new_item' => 'Ajouter une question/réponse',
    'edit_item' => 'Modifier la question/réponse',
    'menu_name' => 'FAQ'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'supports' => array( 'title','thumbnail' ),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-editor-help',
  );

  register_post_type( 'faq', $args );
}
add_action( 'init', 'lesfreresweb_register_post_types' ); // Le hook init lance la fonction

// /**
//  * Remove the href from empty links `<a href="#">` in the nav menus
//  * @param string $menu the current menu HTML
//  * @return string the modified menu HTML
//  */
// add_filter( 'wp_nav_menu_items', function ( $menu ) {
//   return str_replace( '<a href="' . get_site_url() . '/formules/"', '<a', $menu );
// } );

// Pages d'options
if( function_exists( 'acf_add_options_page' ) ) {
	
	acf_add_options_page( array(
		'page_title' 	=> 'Options du thème',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position'    => 2
	) );
	
}

// // Autoriser les fichiers SVG à être téléchargés
// function custom_mime_types($mimes) {
//   $mimes['svg'] = 'image/svg+xml';
//   return $mimes;
// }
// add_filter('upload_mimes', 'custom_mime_types');
