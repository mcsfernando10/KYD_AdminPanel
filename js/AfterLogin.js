$(function() {
	$("#MainMenu ul li").click(function(evt) {
		var currentTab = $('#MainMenu ul li.active');
			currentTab.removeClass('active');	
			$(this).addClass('active');					
	});

	$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
		options.async = true;
	});

	var commonURL = window.location.origin + "/knowyourdoctor/index.php/AfterLoginControllers/";
	//$('#pageContent').empty();
	//$('#pageContent').prepend("<img class='img-responsive' src='"+window.location.origin + "/knowyourdoctor/img/loading.gif' id='loadingIcon'/>");
	//set initial page
	$('#pageContent').hide();
	$.ajax({
		url: commonURL + "RatedDoctorsController",
		type: "POST",
		success: function(res) {
			$('#loader').hide();
			$('#pageContent').show();
			$("#pageContent").html(res);
		}
	});

	//Set click events for navigation bar
	setPageForButtonClick("#docRatingView", commonURL + "RatedDoctorsController");
	setPageForButtonClick("#locateDoctorsView", commonURL + "LocateDoctorsController");
	setPageForButtonClick("#addHospitalsView", commonURL + "AddHospitalsController");
	setPageForButtonClick("#hospitalsView", commonURL + "HospitalsController");
	setPageForButtonClick("#fakeDoctorsView", commonURL + "FakeDoctorsController");
	setPageForButtonClick("#adminAccountsView", commonURL + "AdminAccountsController");
	setPageForButtonClick("#appRatingsView", commonURL + "AppRatingsController");
	setPageForButtonClick("#settingsView", commonURL + "SettingsController");
});

//AJAX Code
function setPageForButtonClick(buttonID,pageURL){
	$(buttonID).click(function(){
		$('#loader').show();
		$('#pageContent').hide();
		//$('#pageContent').prepend("<img class='img-responsive' src='"+window.location.origin + "/knowyourdoctor/img/loading.gif' id='loadingIcon'/>");
		//$('#pageContent').prepend("<div>Loading</div>");
		$.ajax({
			url: pageURL,
			type: "POST",
			success: function(res) {
				$('#loader').hide();
				$('#pageContent').show();
				$("#pageContent").html(res);
			}
		});
	});
}