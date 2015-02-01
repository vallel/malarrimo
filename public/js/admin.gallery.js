var malarrimo = malarrimo || {};

(function($) {

    malarrimo.galleryAdmin = {

        init: function() {
            // date picker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                language: 'es'
            });

            // Initialize the jQuery File Upload widget:
            $('#fileupload').fileupload({
                url: $(this).attr('href'),
                disableImageResize: false,
                imageMaxWidth: 800,
                imageMaxHeight: 600
            });

            loadExistingPictures();
        }

    };

    function loadExistingPictures() {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').data('picturesUrl'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
        });
    }

})(jQuery);

$(function () {
    malarrimo.galleryAdmin.init();
});