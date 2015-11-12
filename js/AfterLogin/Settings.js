$(document).ready(function() {
	//Disable Done Button
	$('#doneButton').attr("disabled","disabled");

	//Update password button click event
	$("#doneButton").click(function () {
		updatePassword();
	});

	//Validate password after each key press
	$('#newPassword').bind('input', function() {
		var typedPassword = $(this).val();
		var confirmNewPassword = $('#confirmNewPassword').val();
		checkValidation(typedPassword,confirmNewPassword);
	});

	//Validate password after each key press
	$('#confirmNewPassword').bind('input', function() {
		var newPassword = $('#newPassword').val();
		var confirmNewPassword = $(this).val();
		checkValidation(newPassword,confirmNewPassword);
	});
});

//To update password
function updatePassword(){
	//Check all fields are filled
	var currentPassword = $('#currentPassword').val();
	var newPassword = $('#newPassword').val();
	var confirmNewPassword = $('#confirmNewPassword').val();
	if(currentPassword.length == 0 && newPassword.length == 0 && confirmNewPassword.length == 0){
		showModalMessage("","Please fill all the fields!", 2);
	} else {
		showModalMessage("Update Password","Are you sure to update your password?", 4, function(result){
			if (result) {
				$.ajax({
					url: window.location.origin
					+ "/knowyourdoctor/index.php/AfterLoginControllers/SettingsController/updatePassword",
					type: "POST",
					data: {'currentPassword': currentPassword, 'newPassword': newPassword},
					success: function (res) {
						if (res) {
							showModalMessage("","Password Changed Successfully!", 1);
						} else {
							showModalMessage("Error","Could not Update Password!", 3);
						}
					}
				});

				//Clear textfields
				$('#currentPassword').val("");
				$('#newPassword').val("");
				$('#confirmNewPassword').val("");

				$('#passwordInputVal').removeClass('has-success');
				$('#passwordValidation').removeClass('glyphicon-ok');
				$('#confirmPWInputVal').removeClass('has-success');
				$('#confrimPasswordValidation').removeClass('glyphicon-ok');
				//Disable the button
				$('#doneButton').attr("disabled","disabled");
			}
		});
	}
}

//To compare passwords (new and confirm passwords)
function checkValidation(value1,value2) {
	//Do the validation
	var passwordInputField = $('#passwordInputVal');
	var passwordValidation = $('#passwordValidation');

	var confirmPWInputField = $('#confirmPWInputVal');
	var confirmPWValidation = $('#confrimPasswordValidation');

	//Check passwords are equals or entered one is a empty string
	if ((value1.length) == 0 || (value1!=value2))
	{
		//Display cross, highlight field with red and disable the button
		passwordInputField.removeClass('has-success');
		passwordInputField.addClass('has-error');

		passwordValidation.removeClass('glyphicon-ok');
		passwordValidation.addClass('glyphicon-remove');

		confirmPWInputField.removeClass('has-success');
		confirmPWInputField.addClass('has-error');

		confirmPWValidation.removeClass('glyphicon-ok');
		confirmPWValidation.addClass('glyphicon-remove');

		//$('#changePWBtn').prop('disabled', true);
		$('#doneButton').attr("disabled","disabled");
	}
	else
	{
		//Display tick, highlight field with green and enable the button
		passwordInputField.removeClass('has-error');
		passwordInputField.addClass('has-success');

		passwordValidation.removeClass('glyphicon-remove');
		passwordValidation.addClass('glyphicon-ok');

		confirmPWInputField.removeClass('has-error');
		confirmPWInputField.addClass('has-success');

		confirmPWValidation.removeClass('glyphicon-remove');
		confirmPWValidation.addClass('glyphicon-ok');

		//$('#changePWBtn').prop('disabled', false);
		$('#doneButton').removeAttr("disabled");
	}
}