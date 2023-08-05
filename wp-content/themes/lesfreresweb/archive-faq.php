<?php 
  get_header(); 

  // Récupérer un tableau de posts de l'archive personnalisée
  $args = array(
    'post_type' => 'faq', // Remplacez "mon_cpt" par le nom de votre Custom Post Type
    'posts_per_page' => -1,   // Récupérer tous les posts de l'archive
  );
  $posts = get_posts($args);
  foreach($posts as $key => $post) {
    if($key % 2 == 0) {
      $left[] = $post;
    } else {
      $right[] = $post;
    }
  }
?>

<!-- MAIN -->
<main class="main">
  <!-- SECTION FAQ -->
  <section class="section-faq u-padding-vertical-bigger">
    <h1 class="u-title u-center-text u-margin-bottom-bigger">FAQ</h1>
    <div class="faq container u-margin-bottom-big">
      <ul class="faq__list">
        <?php
          foreach( $left as $post ):
            setup_postdata($post); // Prépare les données du post actuel
        ?>
          <li class="faq__item">
            <h3 class="faq__question">
              <?php the_title(); ?>
            </h3>
            <p class="faq__answer"><?php the_field('faq_answer'); ?></p>
          </li>
        <?php 
          endforeach;
          wp_reset_postdata(); // Réinitialise les données des posts
        ?>
      </ul>
      <ul class="faq__list">
        <?php
          foreach( $right as $post ):
            setup_postdata($post); // Prépare les données du post actuel
        ?>
          <li class="faq__item">
            <h3 class="faq__question">
              <?php the_title(); ?>
            </h3>
            <p class="faq__answer"><?php the_field('faq_answer'); ?></p>
          </li>
        <?php 
          endforeach;
          wp_reset_postdata(); // Réinitialise les données des posts
        ?>
      </ul>
    </div>
  </section>
</main>


<?php get_footer(); ?>