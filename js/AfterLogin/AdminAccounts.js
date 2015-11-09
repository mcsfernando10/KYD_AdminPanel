$(document).ready(function(){
	$('#adminAccountsTable').DataTable();
});
//Delete admin user
function removeUser(userName) {
	var confirmation = confirm("Are you sure to delete admin user?");
    if (confirmation == true) {
        var tableRowId = "#" + userName + "TR";
		$(tableRowId).remove();
		//Delete admin account
		var URLToCallController = window.location.origin
			+ "/knowyourdoctor/index.php/AfterLoginControllers/AdminAccountsController/deleteAdmin/" + userName;
		$.ajax({
			url: URLToCallController,
			type: "POST"
		});
    } else {
        
    }
}