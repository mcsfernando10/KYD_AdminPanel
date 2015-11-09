<?php
class HospitalListController extends CI_Controller{
    public function index(){

    }
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