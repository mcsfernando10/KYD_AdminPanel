<?php
class InsertDoctorController extends CI_Controller{
    public function index(){

    }

    public function insertNewDoctor(){
        header('Content-type: application/json');
        $docDetailArray = json_decode(file_get_contents('php://input'),true);

        for($i = 0; $i < count($docDetailArray); $i++){
            $docDetail = $docDetailArray[$i];
            $docID = $docDetail['docID'];
            $this->load->model('doctor_model');
            $docDetails = array(
                'docid' => $docID,
                'docname' => $docDetail['docName'],
                'address' => $docDetail['docAddress'],
                'regdate' => $docDetail['docRegDate'],
                'qualifications' => $docDetail['docQualifications']
            );
            $this->doctor_model->insertDoctorDetail($docDetails);
        }
    }
}
?>