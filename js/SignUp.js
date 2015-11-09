$(document).ready(function() {
	//Validate name
	$('#inputName').bind('input', function() {
		var inputName = $(this).val();
		var errorTag = $('#inputError');
		//Clear text
		errorTag.empty();
		//Expression for validate characters,spaces and '.'
		var regExForName = /^[A-Za-z .]+$/;

		var nameInput = $('#nameInputVal');
		var nameTag = $('#nameValidation');

		if(regExForName.test(inputName)) {
			nameInput.removeClass('has-error');
			nameInput.addClass('has-success');

			nameTag.removeClass('glyphicon-remove');
			nameTag.addClass('glyphicon-ok');
			$("#signUpBtn").prop("disabled", false);
		} else {
			nameInput.removeClass('has-success');
			nameInput.addClass('has-error');

			nameTag.removeClass('glyphicon-ok');
			nameTag.addClass('glyphicon-remove');
			$("#signUpBtn").prop("disabled", true);
			errorTag.text("Invalid Name");
		}
	});

	//Vallidate username
	$('#inputUserName').bind('input', function() {
		var inputUserName = $(this).val();

		var errorTag = $('#inputError');
		//Clear text
		errorTag.empty();

		var userNameInput = $('#userNameInputVal');
		var userNameTag = $('#userNameValidation');

		//alert($(this).val());// get the current value of the input field.
		if(inputUserName.length == 0) {
			userNameInput.removeClass('has-success');
			userNameInput.addClass('has-error');

			userNameTag.removeClass('glyphicon-ok');
			userNameTag.addClass('glyphicon-remove');
			$("#signUpBtn").prop("disabled", true);
			errorTag.text("Invalid Username");
			return;
		}else{
			$.ajax({
				url: window.location.origin + "/knowyourdoctor/index.php/SignUpController/checkUsernameAvailability/" + inputUserName ,
				type: "POST",
				success: function(res) {
					if(res){
						userNameInput.removeClass('has-error');
						userNameInput.addClass('has-success');

						userNameTag.removeClass('glyphicon-remove');
						userNameTag.addClass('glyphicon-ok');
						$("#signUpBtn").prop("disabled", false);
					}else{
						userNameInput.removeClass('has-success');
						userNameInput.addClass('has-error');

						userNameTag.removeClass('glyphicon-ok');
						userNameTag.addClass('glyphicon-remove');
						$("#signUpBtn").prop("disabled", true);
						errorTag.text("Username is not available");
					}
				}
			});
		}
	});

	//Validate password
	$('#typedPassword').bind('input', function() {
		var typedPassword = $(this).val();
		var confirmPassword = $("#confirmPassword").val();
		checkValidation(typedPassword,confirmPassword);
	});

	$('#confirmPassword').bind('input', function() {
		var typedPassword = $("#typedPassword").val();
		var confirmPassword = $(this).val();
		checkValidation(typedPassword,confirmPassword);
	});

	//Email Validation
	$('#inputEmail').bind('input', function() {
		var typedEmail = $(this).val();
		var errorTag = $('#inputError');
		//Clear text
		errorTag.empty();
		//Expression for validate email
		var regExForEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

		var emailInput = $('#emailInputVal');
		var emailTag = $('#emailValidation');

		if(regExForEmail.test(typedEmail)) {
			emailInput.removeClass('has-error');
			emailInput.addClass('has-success');

			emailTag.removeClass('glyphicon-remove');
			emailTag.addClass('glyphicon-ok');
			$("#signUpBtn").prop("disabled", false);
		} else {
			emailInput.removeClass('has-success');
			emailInput.addClass('has-error');

			emailTag.removeClass('glyphicon-ok');
			emailTag.addClass('glyphicon-remove');
			$("#signUpBtn").prop("disabled", true);
			errorTag.text("Invalid Email Address");
		}
	});

});


function checkValidation(value1,value2) {
	var errorTag = $('#inputError');
	//Clear text
	errorTag.empty();
	var passwordInputField = $('#passwordInputVal');
	var passwordValidation = $('#passwordValidation');
	
	var confirmPWInputField = $('#confirmPWInputVal');
	var confirmPWValidation = $('#confrimPasswordValidation');
	
	if ((value1.length) == 0 || (value1!=value2)) { 
		passwordInputField.removeClass('has-success');
		passwordInputField.addClass('has-error');
		
        passwordValidation.removeClass('glyphicon-ok');
		passwordValidation.addClass('glyphicon-remove');
		
		confirmPWInputField.removeClass('has-success');
		confirmPWInputField.addClass('has-error');
		
        confirmPWValidation.removeClass('glyphicon-ok');
		confirmPWValidation.addClass('glyphicon-remove');
		
		$("#signUpBtn").prop("disabled", true);
		errorTag.text("Passwords don't match");
    } else {		
		passwordInputField.removeClass('has-error');
		passwordInputField.addClass('has-success');
		
		passwordValidation.removeClass('glyphicon-remove');
		passwordValidation.addClass('glyphicon-ok');
		
		confirmPWInputField.removeClass('has-error');
		confirmPWInputField.addClass('has-success');
		
        confirmPWValidation.removeClass('glyphicon-remove');
		confirmPWValidation.addClass('glyphicon-ok');
		$("#signUpBtn").prop("disabled", false);
	}
}