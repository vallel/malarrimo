var admin = admin || {};

jQuery(function() {
    admin.news.init();
});

(function($, admin){

    admin.news = {

        init: function() {
            $('.delete-post-btn').click(onDeletePost);
        }

    }

    function onDeletePost() {
        return confirm('¿Desea borrar la noticia seleccionada?');
    }

})(jQuery, admin);