$(document).ready(function(){
	$('#commentedDoctorTable').DataTable();
});
//Delete admin user
function removeUser(userName) {
	showModalMessage("Delete Admin","Are You Sure You Want to Delete?", 4, function(result){
		if (result) {
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
	});
}