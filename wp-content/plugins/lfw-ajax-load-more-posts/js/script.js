(function ($) {
  $(document).ready(function () {

    $.post(my_ajax_obj.ajax_url, {	//the server_url
      action: "load_more_posts__json",	//the submit_data array
      _ajax_nonce: my_ajax_obj.nonce,
    }, function (data) {		//the callback_handler
      if (data.success) {
        // La requête a réussi (statut "success")
        console.log("Success: ", data); // data.data contient les données renvoyées par le serveur
      } else {
        // La requête a échoué (statut "error")
        console.log("Error: ", data); // data.data contient les informations sur l'erreur renvoyée par le serveur
      }
    });

  })
})(jQuery);