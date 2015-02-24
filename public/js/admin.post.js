var admin = admin || {};

jQuery(function() {
    admin.post.init();
});

(function($, admin){

    admin.post = {

        init: function() {
            tinymce.init({
                selector:'.tinymce',
                theme: "modern",
                plugins: "paste, media",
                toolbar1: "undo redo | styleselect | bold italic | bullist numlist outdent indent | link media"
                //,paste_as_text: true
            });
        }

    }

})(jQuery, admin);