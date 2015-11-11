$(document).ready(function(){
    $('#hospitalsTable').DataTable();
});
//Delete hospital
function removeHospital(hospitalID) {
    showModalMessage("Delete Hospital","Are you sure to delete hospital?", 4, function(result){
        if(result){
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
    });
}