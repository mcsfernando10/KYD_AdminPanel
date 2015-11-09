$(document).ready(function() {
	$('#newPassword').bind('input', function() {
		var typedPassword = $(this).val();
		var confirmNewPassword = $('#confirmNewPassword').val();
		checkValidation(typedPassword,confirmNewPassword);
	});

	$('#confirmNewPassword').bind('input', function() {
		var newPassword = $('#newPassword').val();
		var confirmNewPassword = $(this).val();
		checkValidation(newPassword,confirmNewPassword);
	});
});

function updatePassword(){
	var confirmation = confirm("Are you sure to update your password?");
	if (confirmation == true) {
		$.ajax({
			url: window.location.origin + "/knowyourdoctor/index.php/AfterLoginControllers/SettingsController/updatePassword",
			type: "POST",
			data: {'currentPassword': $('#currentPassword').val(), 'newPassword': $('#newPassword').val()},
			success: function (res) {
				if (res) {
					alert("Password changed successful!");
				} else {
					alert("Current password you entered is incorrect!");
				}
			}
		});

		//Clear textfields
		$('#currentPassword').val("");
		$('#newPassword').val("");
		$('#confirmNewPassword').val("");
	} else {

	}
}

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
		$('#changePWBtn').attr("disabled","disabled");
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
		$('#changePWBtn').removeAttr("disabled");
	}
}

//Detect password reset button click
function changePassword() {
	var currentPassword = document.getElementById("currentPassword").value;
	var newPassword = document.getElementById("newPassword").value;	
	var confirmPassword = document.getElementById("confirmNewPassword").value;
	
	var errorTag = $('#inputError');
	//Clear error tags
	errorTag.text("");
	
	//Check passwords are empty, null, or empty string
	if ( (currentPassword) && (newPassword) && (confirmPassword)) {
		if (confirm("Are you sure Update Password?")) {
			//Hard Coded
			var userName = "aa";
			//confirm update		
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.responseText.trim() == 'Reset') {					
					alert("Password Updated!!");				
				} else {
					alert("Invalid Password");
				}
			}
			url = "ajaxscripts/UpdatePassword.php?userName=";
			url += userName;
			url += "&currentPassword=";
			url += currentPassword;
			url += "&newPassword=";
			url += newPassword;
			
			xmlhttp.open("GET", url, true);
			xmlhttp.send();
		} 
	} else {		
		errorTag.text("Please fill all the fields");
	}
	
	document.getElementById("currentPassword").value = "";
	document.getElementById("newPassword").value = "";
	document.getElementById("confirmNewPassword").value = "";	
	
	//Remove ticks and green highlights
	var passwordInputField = $('#passwordInputVal');
	var passwordValidation = $('#passwordValidation');
	
	var confirmPWInputField = $('#confirmPWInputVal');
	var confirmPWValidation = $('#confrimPasswordValidation');

	passwordInputField.removeClass('has-success');	
	passwordValidation.removeClass('glyphicon-ok');
	
	confirmPWInputField.removeClass('has-success');
	confirmPWValidation.removeClass('glyphicon-ok');
}