<?php
/*
 * Plugin Name:       LFW - Ajax Load More Posts
 * Description:       Load more posts with ajax request
 * Version:           1.0
 * Author: Les Frères Web - ALGUIRIEV Adam & ALGUIRIEV Deni
 * Author URI:        https://lesfreresweb.fr
 */

 add_action( 'wp_enqueue_scripts', 'my_enqueue' );

 /**
  * Enqueue my scripts and assets.
  *
  * @param $hook
  */
 function my_enqueue( $hook ) {

  // uniquement pour la page blog
  if( !is_home() ) {
    return;
  }

  // var_dump("test");
  // exit;
  
   wp_enqueue_script(
     'ajax-script',
     plugins_url( '/js/script.js', __FILE__ ),
     array( 'jquery' ),
     '1.0.0',
     true
   );
 
   wp_localize_script(
     'ajax-script',
     'my_ajax_obj',
     array(
       'ajax_url' => admin_url( 'admin-ajax.php' ),
       'nonce'    => wp_create_nonce( 'load-more-posts' ),
     )
   );
 }

 add_action( 'wp_ajax_load_more_posts__json', 'load_more_posts__json' );
 add_action( 'wp_ajax_nopriv_load_more_posts__json', 'load_more_posts__json' );

/**
 * Handles my AJAX request using JSON
 */
function load_more_posts__json() {
  // Verify the nonce
  check_ajax_referer( 'load-more-posts' );
  
  
  // // posts_not_in = array d'ids de posts à ne pas récupérer
  // $posts_not_in = $_POST['posts_not_in'];
  // offset = reçu de la requête ajax, nombre de posts déjà chargés
  $offset = (int)$_POST['offset'];

  // récupérer 3 posts avec le offset
  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'offset'         => $offset,
    'orderby' => 'date'
  );

  $query = new WP_Query( $args );
  
  $html = '';

  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
      ob_start();
      get_template_part('parts/article-default');
      $html .= ob_get_contents();
      ob_end_clean();
    }
    wp_reset_postdata();

    // return response
    wp_send_json_success($html);
  } else {
    wp_send_json_error("no post found");
  }
  
}
