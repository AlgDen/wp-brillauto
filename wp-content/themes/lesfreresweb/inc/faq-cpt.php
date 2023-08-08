<?php
/**
 * Ce fichier gère tout ce qui est en lien avec le CPT FAQ
*/


/**
 * Permet de rediriger la single page sur la homepage
 */
add_action( 'template_redirect', 'faq_redirect_post' );
function faq_redirect_post() {
  if ( is_singular( 'faq' ) ) {
      wp_redirect(home_url(), 301);
      exit;
  }
}