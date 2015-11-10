<?php
//Controller of the Location View
class LocationsViewController extends CI_Controller{
    //View submitted locations for selected doctor
    public function viewLocations($docid){
        $this->load->model('located_doctor_model');
        //Get all row data of submitted locations
        $data ['locations'] = $this->located_doctor_model->getAllLocationsOf($docid);
        //Get analysed details from submitted locations
        $data ['analysedLocations'] = $this->located_doctor_model->getAllAnalysedLocationsOf($docid);
        $this->load->view('AfterLoginViews/locationsView',$data);
    }

    //remove seleted location from submitted locations
    public function removeLocation($docLocationID){
        $this->load->model('located_doctor_model');
        $this->located_doctor_model->deleteLocationOf($docLocationID);
    }
}
?>