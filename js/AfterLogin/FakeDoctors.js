$(document).ready(function(){
    $('#fakeDoctorTable').DataTable();
});

//Delete comment
function removeFakeReport(reportID) {
    showModalMessage("Delete", "Are you sure to delete report?", 4, function(result){
        if(result){
            var tableRowId = "#" + reportID + "TR";
            $(tableRowId).remove();
            //Delete admin account
            var URLToCallController = window.location.origin
                + "/knowyourdoctor/index.php/AfterLoginControllers/FakeDoctorsController/removeReport/" + reportID;
            $.ajax({
                url: URLToCallController,
                type: "POST"
            });
        } else {

        }
    });
}

//Generate Report
function generateReport() {
    var confirmation = confirm("Are you sure to generate a report?");
    if (confirmation == true) {
        /*var tableRowId = "#" + reportID + "TR";
         $(tableRowId).remove();
         //Delete admin account
         var URLToCallController = window.location.origin
            + "/knowyourdoctor/index.php/AfterLoginControllers/FakeDoctorsController/removeReport/" + reportID;
         $.ajax({
         url: URLToCallController,
         type: "POST"
         });*/
    } else {

    }
}