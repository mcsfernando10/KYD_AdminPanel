$(document).ready(function() {
    //Add hospitals button
    $("#addHospitalBtn").click(function () {
        addHospitalToDb();
    });
});

//Variables to store hospital details
var hospitalName;
var address;
var district;
var phoneNo;
var latitude;
var longtitude;

//Initialize the map
var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 6.922273, lng: 79.865967},
    zoom: 15
});

// Create the marker with a title.
var myLatlng = new google.maps.LatLng(6.922273,79.865988);
var marker = new google.maps.Marker({
    position: myLatlng,
    title:"Sri Lanka Medical Council"
});

// Add the marker to the map with a call to setMap();
marker.setMap(map);

//Place Hospitals
var request = {
    location: myLatlng ,
    radius: 1000000,
    types: ['hospital']
};

//Service to get all hospitals
service = new google.maps.places.PlacesService(map);
service.nearbySearch(request, callback);

//Add all hospitals to google map
function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            var place = results[i];
            createMarker(results[i]);
        }
    }
}
//Create markers of hospitals
var image_hospital = new google.maps.MarkerImage(window.location.origin
    + "/knowyourdoctor/img/AfterLogin/HospitalIcon.png",
    null, null, null, new google.maps.Size(40,40));

function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        title: place.name,
        icon:image_hospital
    });

    var infoWindow = new google.maps.InfoWindow();
    //Add mouse click event to hospital markers
    google.maps.event.addListener(marker, 'click', function() {
        service.getDetails(place, function(result, status) {
            if (status !== google.maps.places.PlacesServiceStatus.OK) {
                console.error(status);
                return;
            }
            infoWindow.setContent(result.name);
            infoWindow.open(map, marker);
            //Set variables
            hospitalName = place.name;
            address = result.formatted_address;
            district = "";
            phoneNo = result.formatted_phone_number;
            latitude = result.geometry.location.lat;
            longtitude = result.geometry.location.lng;
            //Set Input boxes
            $('#hospitalName').val(hospitalName);
            $('#hospitalAddress').val(address);
            $('#hospitalPhoneNo').val(phoneNo);
        });
    });
}

//AJAX call to add hospital to database
function addHospitalToDb()
{
    //Check whether a hospital is selected or not
    if(undefined  == hospitalName){
        showModalMessage("","Please select a Hospital from Markers!", 2);
    } else {
        //Button click of add hospital
        showModalMessage("Add Hospital","Are you sure to add this hospital?", 4, function(result){
            if (result) {
                //Create json array
                hospitalDetail = {"name":hospitalName, "address":address,
                    "district":district, "phoneNo":phoneNo, "latitude":latitude, "longtitude" : longtitude };
                //Call relevant method to add hospital to db
                var submitLocationPageURL = window.location.origin
                    + "/knowyourdoctor/index.php/AfterLoginControllers/AddHospitalsController/addNewHospital";
                $.ajax({
                    url: submitLocationPageURL,
                    dataType:'JSON',
                    data: {"hospitalDetails" : hospitalDetail},
                    type: "POST",
                    success: function(res) {
                        showModalMessage("","Hospital details added successful!!", 1);
                    }
                });
            }
            //Clear textboxes
            $('#hospitalName').val("Hospital Name");
            $('#hospitalAddress').val("Hospital Address");
            $('#hospitalPhoneNo').val("Hospital Phone No");

            //For validations - clear hospitalName
            hospitalName = undefined;
        });
    }
}