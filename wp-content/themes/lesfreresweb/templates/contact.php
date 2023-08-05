<?php
/*
Template Name: Contact us
*/

get_header();
?>

<!-- MAIN -->
<main class="main">
  <section class="section-contact-detail u-padding-vertical-big">
    <div class="container">
      <h1 class="u-title u-center-text u-margin-bottom-bigger">
        Nous contacter
      </h1>

      <div class="contact-us-detail-wrapper">
        <div class="contact-us contact-us--detail-page">
          <p class="contact-us__info-title contact-us__info-title--detail-page">Nous écrire</p>
          <?php echo do_shortcode('[contact-form-7 id="191" title="Contact form" html_class="form"]'); ?>
        </div>
        <div class="u-text">
          <?php the_field('contact_info'); ?>
        </div>
      </div>
    </div>
  </section>
</main>


<?php get_footer(); ?>