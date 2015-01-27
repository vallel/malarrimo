var malarrimo = malarrimo || {};

(function($){

    malarrimo.locationMap = {

        init: function() {
            var mapOptions = {
                zoom: 7,
                scrollwheel: false,
                streetViewControl: false,
                panControl: true,
                mapTypeControl: false,
                center: new google.maps.LatLng(27.968076, -114.030091),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            new google.maps.Marker({
                position: new google.maps.LatLng(27.968076, -114.030091),
                map: map,
                title: 'Malarrimo',
                draggable: false
            });
        }

    };

})($);

$(function(){
    malarrimo.locationMap.init();
});