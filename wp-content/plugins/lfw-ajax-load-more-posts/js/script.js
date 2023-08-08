(function ($) {
  $(document).ready(function () {
    // bouton load more
    const loadMoreBtn = $('#load-more-posts');

    // clic event

    loadMoreBtn.on('click', function (e) {
      if (!loadMoreBtn.hasClass("btn--disabled")) {
        var nbPosts = $('.article__item').length;

        // requête ajax post
        $.post(my_ajax_obj.ajax_url, {
          action: "load_more_posts__json",
          _ajax_nonce: my_ajax_obj.nonce,
          offset: nbPosts
        }, function (data) {
          if (data.success) {
            // ajouter le html au DOM
            var list = $('ul.article');
            list.append(data.data);
          } else {
            // ajouter la classe disabled et changer le texte
            loadMoreBtn.addClass('btn--disabled');
            loadMoreBtn.val('Aucun résultat à afficher');
          }
        });

      }
    });

  });
})(jQuery);