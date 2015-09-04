var malarrimo = malarrimo || {};

(function($){

    malarrimo.home = {

        init: function() {
            $('.award-icon').on('click', showAwardModal);
        }

    };

    function showAwardModal(e) {
        e.preventDefault();

        var $target = $(this),
            $modal = $('.awards-modal'),
            title = $('img', $target).prop('alt'),
            image = $target.data('img');

        $('.modal-title', $modal).text(title);
        $('.modal-body', $modal).html('<img src="' + image + '"/>');
        $modal.modal('show');
    }

})(jQuery);

jQuery(function () {
    malarrimo.home.init();
});
