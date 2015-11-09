$(document).ready(function(){
    $('#hospitalsTable').DataTable();
});
//Delete hospital
function removeHospital(hospitalID) {
    var confirmation = confirm("Are you sure to delete hospital?");
    if (confirmation == true) {
        var tableRowId = "#" + hospitalID + "TR";
        $(tableRowId).remove();
        //Delete admin account
        var URLToCallController = window.location.origin
            + "/knowyourdoctor/index.php/AfterLoginControllers/HospitalsController/deleteHospital/" + hospitalID;
        $.ajax({
            url: URLToCallController,
            type: "POST"
        });
    } else {

    }
}