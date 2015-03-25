var malarrimo = malarrimo || {};

(function($){

    malarrimo.booking = {

        summaryFixTop: 0,

        init: function() {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                language: 'es'
            })

            // get initial position of the element
            this.summaryFixTop = $('.booking-container').offset().top;

            // assign scroll event listener
            $(window).scroll(scrollSummary);

            $('input').change(bookingUpdate);
        }

    };

    function bookingUpdate() {

    }

    function scrollSummary() {
        // get current scroll position
        var currentScroll = $(window).scrollTop(),
            $bookingSummary = $('.booking-summary'),
            limitBottom = $('.main-footer').offset().top - $bookingSummary.height();

        if (currentScroll >= malarrimo.booking.summaryFixTop && currentScroll <= limitBottom) {
            $bookingSummary.addClass('fixed-booking-summary');
        } else {
            $bookingSummary.removeClass('fixed-booking-summary');
        }
    }

})($);

$(function(){
    malarrimo.booking.init();
});