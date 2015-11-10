$(document).ready(function(){
    $('#commentsTable').DataTable();
});

//Delete comment
function removeComment(commentID) {
    var confirmation = confirm("Are you sure to delete comment?");
    if (confirmation == true) {
        var tableRowId = "#" + commentID + "TR";
        $(tableRowId).remove();
        //Delete admin account
        var URLToCallController = window.location.origin
            + "/knowyourdoctor/index.php/AfterLoginControllers/CommentsController/removeComment/" + commentID;
        $.ajax({
            url: URLToCallController,
            type: "POST"
        });
    } else {

    }
}
