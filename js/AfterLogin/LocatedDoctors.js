$(document).ready(function(){
    $('#locatedDoctorTable').DataTable();
});

//To display doctors with having submitted locations
function loadLocatedDoctors(){
    $('#loader').show();
    $('#pageContent').empty();
    var commonURL = window.location.origin + "/knowyourdoctor/index.php/AfterLoginControllers/";
    $.ajax({
        url: commonURL + "LocateDoctorsController",
        type: "POST",
        success: function(res) {
            $('#loader').hide();
            $("#pageContent").html(res);
        }
    });
}

//To display submitted locations for selected doctor
function viewLocations(docid,docName) {
    $("#tableView").empty();
    $('#tableView').prepend("<img class='img-responsive' src='"+window.location.origin +
        "/knowyourdoctor/img/loading.gif' id='loadingIcon'/>");
    var URLToCallController = window.location.origin +
        "/knowyourdoctor/index.php/AfterLoginControllers/LocationsViewController/viewLocations/" + docid;
    $.ajax({
        url: URLToCallController,
        type: "POST",
        success: function(res) {
            $('#path').append("<span class=\"glyphicon glyphicon-circle-arrow-right\"/> Locations of Dr. " +
                docName + "</button>");
            $("#tableView").html(res);
        }
    });
}