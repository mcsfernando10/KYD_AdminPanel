$(document).ready(function(){
    $('#locationsTable').DataTable();
    $('#analysedLocationsTable').DataTable();
});

//Delete Location
function removeLocation(doclocationid) {
    //Button click of delete location
    showModalMessage("Delete Submitted Location","Are you sure to Delete Submitted Location?", 4, function(result){
        var tableRowId = "#" + doclocationid + "TR";
        $(tableRowId).remove();
        //Delete location
        var URLToCallController = window.location.origin
            + "/knowyourdoctor/index.php/AfterLoginControllers/LocationsViewController/removeLocation/" + doclocationid;
        $.ajax({
            url: URLToCallController,
            type: "POST"
        });
    });
}
