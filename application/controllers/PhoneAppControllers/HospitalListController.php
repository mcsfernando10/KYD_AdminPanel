<?php
//Controller For Mobile side - To control the hospitals list
class HospitalListController extends CI_Controller{
    //Get all hospitals around current location
    public function getAllHospitals(){
        header('Content-type: application/json');
        $currentCoordinates = json_decode(file_get_contents('php://input'),true);

        $latitude = $currentCoordinates['latitude'];
        $longtitude = $currentCoordinates['longtitude'];

        $this->load->model('hospital_model');
        echo $this->hospital_model->getAllHospitalsOf($latitude, $longtitude);
    }
}
?>