<?php
/*
Plugin Name: LFW - Custom Menu Classes Plugin
Description: Allows adding custom classes to menu items.
Version: 1.0
Author: Les Frères Web - ALGUIRIEV Adam & ALGUIRIEV Deni
Author URI: https://lesfreresweb.fr
*/

// Fonction pour ajouter des champs personnalisés aux éléments de menu
function lfw_custom_menu_classes_fields($item_id, $item, $depth, $args) {
  // Récupérer la classe personnalisée sauvegardée pour la balise anchor (a)
  $custom_a_class = get_post_meta($item_id, '_menu_item_custom_a_class', true);

  // Ajout d'un champ pour la classe de l'élément anchor (lien)
  ?>
  <p class="field-custom-a-class description description-wide">
      <label for="edit-menu-item-custom-a-class-<?php echo esc_attr($item_id); ?>">
          <?php esc_html_e('Custom A Class', 'textdomain'); ?><br />
          <input type="text" id="edit-menu-item-custom-a-class-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-custom-a-class" name="menu-item-custom-a-class[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($custom_a_class); ?>" />
      </label>
  </p>
  <?php
}
add_action('wp_nav_menu_item_custom_fields', 'lfw_custom_menu_classes_fields', 10, 4);

// Sauvegarder la classe personnalisée de l'élément de menu
function lfw_save_custom_menu_classes($menu_id, $menu_item_db_id) {
  if (isset($_REQUEST['menu-item-custom-a-class'][$menu_item_db_id])) {
      $custom_a_class = sanitize_text_field($_REQUEST['menu-item-custom-a-class'][$menu_item_db_id]);
      update_post_meta($menu_item_db_id, '_menu_item_custom_a_class', $custom_a_class);
  } else {
      delete_post_meta($menu_item_db_id, '_menu_item_custom_a_class');
  }
}
add_action('wp_update_nav_menu_item', 'lfw_save_custom_menu_classes', 10, 2);

// Fonction pour afficher la classe personnalisée dans le menu
function lfw_add_custom_menu_class_to_link($atts, $item, $args) {
  $custom_a_class = get_post_meta($item->ID, '_menu_item_custom_a_class', true);

  if (!empty($custom_a_class)) {
      $atts['class'] .= ' ' . $custom_a_class;
  }

  return $atts;
}
add_filter('nav_menu_link_attributes', 'lfw_add_custom_menu_class_to_link', 9999, 3);
