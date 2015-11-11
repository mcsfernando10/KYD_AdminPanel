$(document).ready(function(){
    $('#commentsTable').DataTable();
});

//Delete comment
function removeComment(commentID) {
    //Button click of delete comment
    showModalMessage("Delete Comment","Are you sure to Delete Comment?", 4, function(result){
        var tableRowId = "#" + commentID + "TR";
        $(tableRowId).remove();
        //Delete admin account
        var URLToCallController = window.location.origin
            + "/knowyourdoctor/index.php/AfterLoginControllers/CommentsController/removeComment/" + commentID;
        $.ajax({
            url: URLToCallController,
            type: "POST"
        });
    });
}
