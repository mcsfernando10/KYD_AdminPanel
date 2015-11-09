function loadCommentedDoctors(){
    $('#loader').show();
    $('#pageContent').empty();
    var commonURL = window.location.origin + "/knowyourdoctor/index.php/AfterLoginControllers/";
    $.ajax({
        url: commonURL + "RatedDoctorsController",
        type: "POST",
        success: function(res) {
            $('#loader').hide();
            $("#pageContent").html(res);
        }
    });
}

function viewComments(docid,docName) {
    $("#tableView").empty();
    $('#tableView').prepend("<img class='img-responsive' src='"+window.location.origin + "/knowyourdoctor/img/loading.gif' id='loadingIcon'/>");
    var URLToCallController = window.location.origin + "/knowyourdoctor/index.php/AfterLoginControllers/CommentsController/viewComments/" + docid;
    $.ajax({
        url: URLToCallController,
        type: "POST",
        success: function(res) {
            $('#path').append("<span class=\"glyphicon glyphicon-circle-arrow-right\"/> Comments of Dr. " + docName + "</button>");
            $("#tableView").html(res);
        }
    });
}