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
                toolbar1: "undo redo | styleselect | bold italic | bullist numlist outdent indent | link media",
                //paste_as_text: true
                paste_preprocess : function(plugin, args) {
                    // keep bold,italic,underline and paragraphs
                    args.content = strip_tags(args.content,'<a><strong><em><b><i><p>');
                }
            });
        }

    };

    // Function source: http://stackoverflow.com/questions/4122451/tinymce-paste-as-plain-text
    // Strips HTML and PHP tags from a string
    // returns 1: 'Kevin <b>van</b> <i>Zonneveld</i>'
    // example 2: strip_tags('<p>Kevin <img src="someimage.png" onmouseover="someFunction()">van <i>Zonneveld</i></p>', '<p>');
    // returns 2: '<p>Kevin van Zonneveld</p>'
    // example 3: strip_tags("<a href='http://kevin.vanzonneveld.net'>Kevin van Zonneveld</a>", "<a>");
    // returns 3: '<a href='http://kevin.vanzonneveld.net'>Kevin van Zonneveld</a>'
    // example 4: strip_tags('1 < 5 5 > 1');
    // returns 4: '1 < 5 5 > 1'
    function strip_tags (str, allowed_tags) {

        var key = '', allowed = false;
        var matches = [];    var allowed_array = [];
        var allowed_tag = '';
        var i = 0;
        var k = '';
        var html = '';
        var replacer = function (search, replace, str) {
            return str.split(search).join(replace);
        };
        // Build allowes tags associative array
        if (allowed_tags) {
            allowed_array = allowed_tags.match(/([a-zA-Z0-9]+)/gi);
        }
        str += '';

        // Match tags
        matches = str.match(/(<\/?[\S][^>]*>)/gi);
        // Go through all HTML tags
        for (key in matches) {
            if (isNaN(key)) {
                    // IE7 Hack
                continue;
            }

            // Save HTML tag
            html = matches[key].toString();
            // Is tag not in allowed list? Remove from str!
            allowed = false;

            // Go through all allowed tags
            for (k in allowed_array) {            // Init
                allowed_tag = allowed_array[k];
                i = -1;

                if (i != 0) { i = html.toLowerCase().indexOf('<'+allowed_tag+'>');}
                if (i != 0) { i = html.toLowerCase().indexOf('<'+allowed_tag+' ');}
                if (i != 0) { i = html.toLowerCase().indexOf('</'+allowed_tag)   ;}

                // Determine
                if (i == 0) {                allowed = true;
                    break;
                }
            }
            if (!allowed) {
                str = replacer(html, "", str); // Custom replace. No regexing
            }
        }
        return str;
    }

})(jQuery, admin);
