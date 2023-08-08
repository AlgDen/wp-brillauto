<?php
/**
 * Ce fichier gère tout ce qui est en lien avec le CPT Formules
 */

/**
 * Permet de rediriger la page archive sur la homepage
 */
add_action( 'template_redirect', 'formules_redirect_post' );
function formules_redirect_post() {
    if ( is_post_type_archive( 'formules' ) ) {
        wp_redirect(home_url(), 301);
        exit;
    }
}