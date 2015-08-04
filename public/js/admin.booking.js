var malarrimo = malarrimo || {};

(function($) {

    malarrimo.bookingAdmin = {

        init: function() {
            // init datatable
            $('.booking-table').dataTable({
                'pageLength': 20,
                'info': false,
                'lengthChange': false,
                'columnDefs': [
                    { 'targets': 6, 'orderable': false, 'searchable': false },
                ],
                'language': {
                    'search': 'Buscar:',
                    'paginate': {
                        'first': '&laquo;',
                        'last': '&raquo;',
                        'next': '&rsaquo;',
                        'previous': '&lsaquo;'
                    },
                    'zeroRecords': '',
                    'emptyTable': 'No hay reservaciones registradas'
                }
            });

            $('.change-status-btn').click(function() {
                return confirm('¿Esta seguro de cambiar el estatus de la reservación seleccionada?');
            });

            $('.booking-details-btn').click(showDetails);
        }

    };

    function showDetails() {
        var url = $(this).data('url'),
            $bookingDetails = $('.booking-details');

        $bookingDetails.find('.booking-details-content').html('');
        $bookingDetails.find('.progress').show();
        $bookingDetails.modal('show');

        $.ajax({
            method: 'get',
            url: url,
            success: function(response) {
                if (response) {
                    $bookingDetails.find('.booking-details-content').html(response);
                }
                else {
                    var error = '<p class="alert alert-danger">Ocurrió un error al intentar cargar la reservación seleccionada.</p>';
                    $bookingDetails.find('.booking-details-content').html(error);
                }
            },
            error: function() {
                var error = '<p class="alert alert-danger">Ocurrió un error en la comunicación con el servidor</p>';
                $bookingDetails.find('.booking-details-content').html(error);
            },
            complete: function () {
                $bookingDetails.find('.progress').hide();
            }
        });
    }

})(jQuery);

$(function () {
    malarrimo.bookingAdmin.init();
});