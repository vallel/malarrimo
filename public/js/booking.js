var malarrimo = malarrimo || {};

(function($){

    malarrimo.booking = {

        summaryFixTop: 0,

        init: function() {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                language: 'es',
                autoclose: true
            })

            // get initial position of the element
            this.summaryFixTop = $('.booking-container').offset().top;

            // assign scroll event listener
            $(window).scroll(scrollSummary);

            $('input, select').change(bookingUpdate);
        },

        isHotelValid: function() {
            return $('#hotelAdults').val() &&
                ($('#hotelCheckIn').val() && $('#hotelCheckOut').val()) &&
                ($('#hotelSingleRooms').val() || $('#hotelDoubleRooms').val());
        },

        isWhalesValid: function() {
            return $('#whalesDate').val() && $('#whalesAdults').val();
        },

        isCavePaintingValid: function() {
            return $('#cavePaintingDate').val() && $('#cavePaintingAdults').val();
        },

        isSaltMineValid: function() {
            return $('#saltMineDate').val() && $('#saltMineAdults').val();
        }

    };

    function bookingUpdate() {
        var $input = $(this);
        updateHotel($input);
        updateWhales($input);
        updateCavePainting($input);
    }

    function updateHotel($input) {
        var classType = 'hotel';
        // if input is a hotel input
        if ($input.hasClass('hotel-input')) {
            var $checkInField = $('#hotelCheckIn'),
                $checkOutField = $('#hotelCheckOut'),
                $singleRoomsField = $('#hotelSingleRooms'),
                $doubleRoomsField = $('#hotelDoubleRooms'),
                $adultsField = $('#hotelAdults');

            // if inputs for date and adults has values
            if (malarrimo.booking.isHotelValid()) {

                var $childrenField = $('#hotelChildren'),
                    description = '';

                if ($singleRoomsField.val()) {
                    description += $singleRoomsField.val() + ' ' + $('label[for="hotelSingleRooms"]').text().replace(':', '');
                }

                if ($doubleRoomsField.val()) {
                    description += description.length > 0 ? ', ' : '';
                    description += $singleRoomsField.val() + ' ' + $('label[for="hotelDoubleRooms"]').text().replace(':', '');
                }

                description += '<br>' + $adultsField.val() + ' ' + $('label[for="hotelAdults"]').text().replace(':', '');

                if ($childrenField.val()) {
                    description += ', ' + $childrenField.val() + ' ' + $('label[for="hotelChildren"]').text().replace(':', '');
                }

                description += '<br>' + $checkInField.val() + ' - ' + $checkOutField.val();

                addSummaryElement(classType, $input, description);
            }
            else {
                removeSummaryElement(classType);
            }
        }
    }

    /**
     * Validate and update whales section in the booking summary control
     * @param {jQuery} $input
     */
    function updateWhales($input) {
        var classType = 'whales';
        // if input is a whales input
        if ($input.hasClass('whales-input')) {
            var $dateField = $('#whalesDate'),
                $adultsField = $('#whalesAdults');

            // if inputs for date and adults has values
            if (malarrimo.booking.isWhalesValid()) {

                var $childrenField = $('#whalesChildren'),
                    description = $adultsField.val() + ' ' + $('label[for="whalesAdults"]').text().replace(':', '');

                if ($childrenField.val()) {
                    description += ', ' + $childrenField.val() + ' ' + $('label[for="whalesChildren"]').text().replace(':', '');
                }

                description += '<br>' + $dateField.val() + ' ' + $('#whalesTime').val();

                addSummaryElement(classType, $input, description);
            }
            else {
                removeSummaryElement(classType);
            }
        }
    }

    /**
     * Validate and update cave painting section in the booking summary control
     * @param {jQuery} $input
     */
    function updateCavePainting($input) {
        var classType = 'cave-painting';
        // if input is a whales input
        if ($input.hasClass('cave-painting-input')) {
            // if inputs for date and adults has values
            if (malarrimo.booking.isCavePaintingValid()) {
                var adults = $('#cavePaintingAdults').val(),
                    children = $('#cavePaintingChildren').val(),
                    date = $('#cavePaintingDate').val(),
                    description = adults + ' ' + $('label[for="cavePaintingAdults"]').text().replace(':', '');

                if (children) {
                    description += ', ' + children + ' ' + $('label[for="cavePaintingChildren"]').text().replace(':', '');
                }

                description += '<br>' + date;

                addSummaryElement(classType, $input, description);
            }
            else {
                removeSummaryElement(classType);
            }
        }
    }

    /**
     * Adds data to an specific section of the booking summary control
     * @param {string} elementClass
     * @param {jQuery} $input
     * @param {string} description
     */
    function addSummaryElement(elementClass, $input, description) {
        var title = $input.parents('fieldset').find('.section-content-subtitle').text(),
            html = '';

        html += '<h1 class="booking-summary-element-title">' + title + '</h1>';
        html += '<p class="booking-summary-element-description">' + description + '</p>';

        $('.booking-summary').find('.booking-summary-' + elementClass).html(html);
    }

    /**
     * Clears a specific section of the booking summary control
     * @param {string} elementClass
     */
    function removeSummaryElement(elementClass) {
        $('.booking-summary').find('.booking-summary-' + elementClass).html('');
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