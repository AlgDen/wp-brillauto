<?php
/**
 * Ce fichier gère tout ce qui est en lien avec le CPT Engagements
 */


/**
 * Permet de rediriger la single page sur la homepage
 */
add_action( 'template_redirect', 'avis_google_redirect_post' );
function avis_google_redirect_post() {
    if ( is_singular( 'avis_google' ) ) {
        wp_redirect(home_url(), 301);
        exit;
    }
}