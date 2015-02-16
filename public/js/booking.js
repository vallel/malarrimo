var malarrimo = malarrimo || {};

(function($){

    malarrimo.booking = {

        init: function() {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                language: 'es'
            })
        }

    };

})($);

$(function(){
    malarrimo.booking.init();
});