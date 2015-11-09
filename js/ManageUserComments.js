function showDoctorComments(typedUserName) {
    if (typedUserName.length == 0) { 
		//var xmlhttp = new XMLHttpRequest();
        //document.getElementById("doctorRatings").innerHTML=httpxml.responseText;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            document.getElementById("doctorRatings").innerHTML = xmlhttp.responseText;
        }
		url = "LoadCommentedDoctors.php?enteredDoctorID=";
		url += typedUserName;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
}

//Detect Delete button click for each button
function deleteComment(clickedCommentID) {
	if (confirm("Are you sure delete comment?")) {
		//confirm deletion
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			document.getElementById("commentPanel").innerHTML = xmlhttp.responseText;
		}
		url = "ajaxscripts/DeleteUserComment.php?commentID=";
		url += clickedCommentID;
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	} else {
				
	}
}