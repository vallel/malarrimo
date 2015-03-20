var malarrimo = malarrimo || {};

(function($) {

    malarrimo.bookingAdmin = {

        init: function() {
            $('.change-status-btn').click(function() {
                return confirm('¿Esta seguro de cambiar el estatus de la reservación seleccionada?');
            });
        }

    };

})(jQuery);

$(function () {
    malarrimo.bookingAdmin.init();
});