<?php get_header(); ?>

<!-- MAIN -->
<main class="main">
  <section class="section-blog-page u-padding-vertical-big">
    <div class="container">
      <h1 class="u-title u-center-text u-margin-bottom-big">Blog</h1>
      <div class="blog-archive">
        <ul class="article article--detail-page u-margin-bottom-normal">
          <?php 
            $i=0;
            $args = array(
              'numberposts' => 7,
              'orderby' => 'date'
            );
            $posts = get_posts($args);
            foreach($posts as $key => $post) {
              setup_postdata($post);
              switch( $key ) {
                case 0:
                  get_template_part( 'parts/article-featured' );
                  break;
                case 1:
                case 2:
                  get_template_part('parts/article-highlighted');
                  break;
                case 3:
                  get_template_part('parts/article-highlighted', null, array('data' => array('last' => true)));
                  break;
                default:
                  get_template_part('parts/article-default');
              }
            }
            wp_reset_postdata();
          ?>
        </ul>
        <input type="button" id="load-more-posts" class="btn btn--blue btn--shadow btn--animation-scale" value="Afficher plus articles" />
      </div>
    </div>
  </section>
</main>


<?php get_footer(); ?>