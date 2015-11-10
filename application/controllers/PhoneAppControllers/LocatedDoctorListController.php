<?php
//Controller For Mobile side - To control the located doctors list
class LocatedDoctorListController extends CI_Controller{
    //Get all located doctors around current location
    public function getAllLocatedDoctors(){
        header('Content-type: application/json');
        $currentCoordinates = json_decode(file_get_contents('php://input'),true);

        $latitude = $currentCoordinates['latitude'];
        $longtitude = $currentCoordinates['longtitude'];
        date_default_timezone_set("Asia/Colombo");
        $date = date("Y-m-d");

        $this->load->model('located_doctor_model');
        echo $this->located_doctor_model->getAllDocAndLocations($latitude, $longtitude, $date);
    }
}
?>