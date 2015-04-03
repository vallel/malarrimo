var malarrimo = malarrimo || {};

(function($){

    malarrimo.booking = {

        summaryFixTop: 0,

        init: function() {
            var currentDate = new Date();

            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose: true
            });

            $('.start-date').datepicker('setStartDate', currentDate)
                .on('changeDate', function(selected) {
                    var endDate = $(this).data('end');
                    $('#' + endDate).datepicker('setStartDate', addDays(selected.date, 1));
                });

            $('.end-date').datepicker('setStartDate', addDays(currentDate, 1))
                .on('changeDate', function(selected) {
                    var startDate = $(this).data('start');
                    $('#' + startDate).datepicker('setEndDate', addDays(selected.date, -1));
                });

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
        },

        isRvValid: function() {
            return $('#rvCheckIn').val() && $('#rvAdults').val();
        },

        isBanquetValid: function() {
            return $('#banquetDate').val() && $('#banquetPersons').val();
        }

    };

    function bookingUpdate() {
        var $input = $(this);
        updateHotel($input);
        updateWhales($input);
        updateCavePainting($input);
        updateSaltMine($input);
        updateRv($input);
        updateBanquet($input);
    }

    /**
     * Validate and update hotel section in the booking summary control
     * @param {jQuery} $input
     */
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
     * Validate and update salt mine section in the booking summary control
     * @param {jQuery} $input
     */
    function updateSaltMine($input) {
        var classType = 'salt-mine';
        // if input is a whales input
        if ($input.hasClass('salt-mine-input')) {
            // if inputs for date and adults has values
            if (malarrimo.booking.isSaltMineValid()) {
                var adults = $('#saltMineAdults').val(),
                    children = $('#saltMineChildren').val(),
                    date = $('#saltMineDate').val(),
                    description = adults + ' ' + $('label[for="saltMineAdults"]').text().replace(':', '');

                if (children) {
                    description += ', ' + children + ' ' + $('label[for="saltMineChildren"]').text().replace(':', '');
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
     * Validate and update RV section in the booking summary control
     * @param {jQuery} $input
     */
    function updateRv($input) {
        var classType = 'rv';
        // if input is a rv input
        if ($input.hasClass('rv-input')) {
            // if inputs for date and adults has values
            if (malarrimo.booking.isRvValid()) {
                var adults = $('#rvAdults').val(),
                    children = $('#rvChildren').val(),
                    checkIn = $('#rvCheckIn').val(),
                    checkOut = $('#rvCheckOut').val(),
                    vehicleFiels = ['rvCamping', 'rvVan', 'rvCamper', 'rvFifthWheel'],
                    description = adults + ' ' + $('label[for="rvAdults"]').text().replace(':', '');

                if (children) {
                    description += ', ' + children + ' ' + $('label[for="rvChildren"]').text().replace(':', '');
                }

                description += '<br>' + checkIn + ' - ' + checkOut;

                var vehicles = '';
                $.each(vehicleFiels, function(i, id) {
                    var $vehicleField = $('#' + id);
                    if ($vehicleField.is(':checked')) {
                        var label = $vehicleField.parent().text().trim();
                        vehicles += label + ', ';
                    }
                });
                vehicles = vehicles.trim().replace(/,+$/,'');
                vehicles = vehicles ? '<br>' + vehicles : '';

                description += vehicles;

                addSummaryElement(classType, $input, description);
            }
            else {
                removeSummaryElement(classType);
            }
        }
    }

    /**
     * Validate and update banquet section in the booking summary control
     * @param {jQuery} $input
     */
    function updateBanquet($input) {
        var classType = 'restaurant';
        // if input is a banquet input
        if ($input.hasClass('banquet-input')) {
            // if inputs for date and adults has values
            if (malarrimo.booking.isBanquetValid()) {
                var date = $('#banquetDate').val(),
                    time = $('#banquetSchedule').val(),
                    persons = $('#banquetPersons').val(),
                    description = persons + ' ' + $('label[for="banquetPersons"]').text().replace(':', '');

                description += '<br>' + date + ' ' + time;

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

    /**
     * Adds a number of days to the given Date object. Negative integer should be passed as second parameter
     * to substract a number of days to the given Date.
     * @param {Date} theDate
     * @param {int} days
     * @returns {Date}
     */
    function addDays(theDate, days) {
        return new Date(theDate.getTime() + days*24*60*60*1000);
    }

})($);

$(function(){
    malarrimo.booking.init();
});