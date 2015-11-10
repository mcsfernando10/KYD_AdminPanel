<?php
//Controller For Mobile side - To Submit doctor's location
class DoctorLocationController extends CI_Controller
{
    //Insert raw location details
    public function insertLocation(){
        header('Content-type: application/json');
        $docLocationData = json_decode(file_get_contents('php://input'),true);

        $docID = $docLocationData['docID'];

        $docDetails = array(
            'docid' => $docID,
            'docname' => $docLocationData['docName'],
            'address' => $docLocationData['docAddress'],
            'regdate' => $docLocationData['docRegDate'],
            'qualifications' => $docLocationData['docQualifications']
        );

        date_default_timezone_set("Asia/Colombo");
        $date = date("Y-m-d H:i:sa");
        //Get the day from the date
        $day = date("l");
        $locationDetails = array(
            'locationid' => $docLocationData['locationID'],
            'docid' => $docID,
            'ratedDate' => $date,
            'availableday' => $day
    
        );
        $this->load->model('located_doctor_model');
        $this->located_doctor_model->insertSubmitedLocation($docDetails,$locationDetails);
    }
}
?>