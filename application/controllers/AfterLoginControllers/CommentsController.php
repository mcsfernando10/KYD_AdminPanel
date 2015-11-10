<?php
//Controller of the Comments View
class CommentsController extends CI_Controller{
    //Get all comments for selected doctor
    public function viewComments($docid){
        $this->load->model('commented_doctor_model');
        $data ['comments'] = $this->commented_doctor_model->getAllComments($docid);
        $this->load->view('AfterLoginViews/commentsView',$data);
    }

    //Remove comment for selected comment id
    public function removeComment($commentID){
        $this->load->model('commented_doctor_model');
        $this->commented_doctor_model->deleteComment($commentID);
    }
}
?>