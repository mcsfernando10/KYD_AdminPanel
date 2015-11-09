$(document).ready(function(){
    $('#locationsTable').DataTable();
});

$(document).ready(function(){
    $('#analysedLocationsTable').DataTable();
});

//Delete Location
function removeLocation(doclocationid) {
    var confirmation = confirm("Are you sure to delete location?");
    if (confirmation == true) {
        var tableRowId = "#" + doclocationid + "TR";
        $(tableRowId).remove();
        //Delete admin account
        var URLToCallController = window.location.origin
            + "/knowyourdoctor/index.php/AfterLoginControllers/LocationsViewController/removeLocation/" + doclocationid;
        $.ajax({
            url: URLToCallController,
            type: "POST"
        });
    } else {

    }
}
