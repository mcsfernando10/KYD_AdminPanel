<?php
class LocationsViewController extends CI_Controller{
    public function index(){

    }

    public function viewLocations($docid){
        $this->load->model('located_doctor_model');
        $data ['locations'] = $this->located_doctor_model->getAllLocationsOf($docid);
        $data ['analysedLocations'] = $this->located_doctor_model->getAllAnalysedLocationsOf($docid);
        $this->load->view('AfterLoginViews/locationsView',$data);
    }

    public function removeLocation($docLocationID){
        $this->load->model('located_doctor_model');
        $this->located_doctor_model->deleteLocationOf($docLocationID);
    }
}
?>