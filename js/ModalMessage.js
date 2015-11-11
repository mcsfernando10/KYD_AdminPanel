//type = 1 : Success
//type = 2 : Warning
//type = 3 : Error
//type = 4 : Confirm
function showModalMessage(Title, Message, type, callback) {
	if(type == 1) {
		bootbox.dialog({
			message: '<img src="/knowyourdoctor/img/success_icon.png" width="48px" height="48px" style="margin-right: 10px"/>' +
			Message,
			buttons: {
				ok: {
					label: "OK",
					className: "btn-info",
					callback: function (result) {
						result = true;
						callback&&callback(result);
					}
				}
			}
		});
	}
	else if(type == 2) {
		bootbox.dialog({
			message: '<img src="/knowyourdoctor/img/warning_icon.png" width="48px" height="48px" style="margin-right: 7px"/>' +
			Message,
			buttons: {
				ok: {
					label: "OK",
					className: "btn-info",
					callback: function (result) {
						result = true;
						callback&&callback(result);
					}
				}
			}
		});
	}
	else if(type == 3) {
		bootbox.dialog({
			message: '<img src="/knowyourdoctor/img/error_icon.png" width="48px" height="48px" style="margin-right: 7px"/>' +
			Message,
			buttons: {
				ok: {
					label: "OK",
					className: "btn-info",
					callback: function (result) {
						result = true;
						callback&&callback(result);
					}
				}
			}
		});
	}
	else if(type == 4) {
		bootbox.dialog({
			message: Message,
			title: '<img src="/knowyourdoctor/img/question_mark_icon.png" width="30px" height="30px" />' + Title,
			buttons: {
				yes: {
					label: "Yes",
					className: "btn-info",
					callback: function (result) {
						result = true;
						callback&&callback(result);
					}
				},
				no: {
					label: "No",
					className: "btn-default",
					callback: function (result) {
						result = false;
						callback&&callback(result);
					}
				}

			}
		});
	}
}

function showSendEmailForm(callback){
	bootbox.dialog({
			title: '<img src="/knowyourdoctor/img/email_icon.png" width="30px" height="30px" style="margin-right: 7px"/> ' +
			'<span id="title-red">Forgot Password?</span>',
			message:'<div class="row">  ' +
			'<div class="col-md-12"> ' +
			'<form class="form-horizontal"> ' +
			'<div class="form-group has-feedback" id="emailInputVal"> ' +
			'<label class="col-md-4 control-label" for="name">Email</label> ' +
			'<div class="col-md-4"> ' +
			'<input id="email" name="email" type="text" placeholder="Your Email" ' +
			'class="form-control input-md"> ' +
			'<span class="glyphicon form-control-feedback" aria-hidden="true" id="emailValidation"></span>' +
			'<span id="help-text">We will send you an Email. ' +
			'Follow the guidelines on it.</span>' +
			' </div> ' +
			'</div>' +
			'</form>',
			buttons: {
				success: {
					label: "Send",
					className: "btn-info",
					id: "sendEmailBtn",
					callback: function (result) {
						result = $('#email').val();
						callback&&callback(result);
					}
				},
				cancel: {
					label: "Cancel",
					className: "btn-default",
					callback: function () {

					}
				}
			}
		}
	);
	//Email Validation
	$('#email').bind('input', function() {
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
			$("#sendEmailBtn").prop("disabled", false);
		} else {
			emailInput.removeClass('has-success');
			emailInput.addClass('has-error');

			emailTag.removeClass('glyphicon-ok');
			emailTag.addClass('glyphicon-remove');
			$("#sendEmailBtn").prop("disabled", true);
			errorTag.text("Invalid Email Address");
		}
	});
}