<?php
//Controller For Mobile side - To control comments of doctors
class DoctorRatingController extends CI_Controller{
    //Insert new rating about a doctor
    public function insertNewRating(){
        header('Content-type: application/json');
        $docComment = json_decode(file_get_contents('php://input'),true);

        $docID = $docComment['docID'];

        $this->load->model('commented_doctor_model');

        $docDetails = array(
            'docid' => $docID,
            'docname' => $docComment['docName'],
            'address' => $docComment['docAddress'],
            'regdate' => $docComment['docRegDate'],
            'qualifications' => $docComment['docQualifications']
        );

        $commentDetails = array(
            'docid' => $docID,
            'comment' => $docComment['comment'],
            'commentlikes' => 0,
        );

        $this->commented_doctor_model->insertRating($docDetails,$commentDetails);
    }

    //Get all comments for given doctor id
    public function getAllCommentsOfDoc($doctorID){
        $this->load->model('commented_doctor_model');
        echo $this->commented_doctor_model->getAllCommentsOf($doctorID);
    }

    //Handle likes of comments
    public function updateLikes(){
        header('Content-type: application/json');
        $docCommentData = json_decode(file_get_contents('php://input'),true);
        $commentID = $docCommentData['commentID'];
        $isIncrement = $docCommentData['isIncrement'];

        $this->load->model('commented_doctor_model');
        echo $this->commented_doctor_model->updateLikesOf($commentID,$isIncrement);
    }
}
?>