$(function() {
    initialize_hos();
});

var map_hos;
var infowindow;
function initialize_hos() {
    var hospital = new google.maps.LatLng(6.9344, 79.8428);
    map_hos = new google.maps.Map(document.getElementById('hospital'), {
        center: hospital,
        zoom: 15
    });
    var image_hospital = new google.maps.MarkerImage("http://www.myvirtualadmin.co.uk/wp-content/uploads/2011/04/location-place.png", null, null, null, new google.maps.Size(40,52)); // Create a variable for our marker image.
    var marker = new google.maps.Marker({ // Set the marker
        position: hospital, // Position marker to coordinates
        icon:image_hospital, //use our image as the marker
        map: map_hos, // assign the market to our map variable
        title: 'Click to visit our company on Google Places', // Marker ALT Text
        animation:google.maps.Animation.BOUNCE
    });
    var request_hos = {
        location: hospital,
        radius: 1000,
        types: ['hospital']
    };
    infowindow = new google.maps.InfoWindow();
    var service_hos = new google.maps.places.PlacesService(map_hos);
    service_hos.nearbySearch(request_hos, callback_hos);

}
function callback_hos(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker_hos(results[i]);
        }
    }
}
function createMarker_hos(place) {
    var placeLoc = place.geometry.location;

    var image = new google.maps.MarkerImage("Hospital-128.png", null, null, null, new google.maps.Size(40,52)); // Create a variable for our marker image.
    var marker = new google.maps.Marker({ // Set the marker
        position: placeLoc, // Position marker to coordinates
        icon:image, //use our image as the marker
        map: map_hos, // assign the market to our map variable
        title: 'Click to visit our company on Google Places', // Marker ALT Text

        //animation:google.maps.Animation.BOUNCE
    });
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map_hos, this);
    });
}

google.maps.event.addDomListener(window, 'load', initialize_hos);