<?php include_once('/../common/header.php'); ?>
        <script type="text/javascript" src="<?php echo base_url().'js/locationpicker.jquery.min.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-sm-offset-2">
                            <h3>
                                Add Hospitals
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="commentPanel">
                        <div class="row">
                            <div class="col-sm-7 col-lg-7">
                                <div id="map" style="height:500px; width:100%; border:3px solid #acacac;"></div>
                            </div>
                            <div class="col-sm-5 col-lg-5">
                                <form>
                                    <div class="form-group">
                                        <label for="hospitalName">Selected Hospital Name</label>
                                        <input class="form-control" id="hospitalName" placeholder="Hospital Name" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="hospitalAddress">Selected Hospital Address</label>
                                        <input class="form-control" id="hospitalAddress" placeholder="Hospital Address" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="hospitalPhoneNo">Selected Hospital Phone No</label>
                                        <input class="form-control" id="hospitalPhoneNo" placeholder="Hospital Phone No" disabled>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-default"
                                            onClick="addHospitalToDb()">
                                            Add Hospital
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
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

            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request, callback);

            function callback(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        var place = results[i];
                        createMarker(results[i]);
                    }
                }
            }
            //Create markers of hospitals
            var image_hospital = new google.maps.MarkerImage("<?php echo base_url().'img/AfterLogin/HospitalIcon.png'?>",
                                    null, null, null, new google.maps.Size(40,40));
            function createMarker(place) {
                var placeLoc = place.geometry.location;
                var marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location,
                    title: place.name,
                    icon:image_hospital,
                    animation:google.maps.Animation.BOUNCE
                });

                var infoWindow = new google.maps.InfoWindow();
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

            function addHospitalToDb()
            {
                if(undefined  == hospitalName){
                    alert("Please select a Hospital from Markers");
                } else {
                    //Button click of add hospital
                    var confirmation = confirm("Are you sure to add this hospital?");
                    if (confirmation == true) {
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
                                alert("Hospital details added successful!!");
                            }
                        });
                    }
                    alert("Hospital details added successful!!");
                    //Clear textboxes
                    $('#hospitalName').val("Hospital Name");
                    $('#hospitalAddress').val("Hospital Address");
                    $('#hospitalPhoneNo').val("Hospital Phone No");

                    //For validations - clear hospitalName
                    hospitalName = undefined;
                }
            }
        </script>
<?php  include_once('/../common/footer.php'); ?>