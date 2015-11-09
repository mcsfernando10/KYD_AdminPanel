<?php
//Controller of the Add Hospitals View
class AddHospitalsController extends CI_Controller{
    public function index(){
        $this->load->view('AfterLoginViews/addHospitalsView');
    }

    //To call relevant method of model class to add hospital details to the database
    public function addNewHospital(){
        $hospitalDetail = $this->input->post('hospitalDetails');
        $this->load->model('hospital_model');
        $this->hospital_model->addNewHospitalToDB($hospitalDetail);
    }
}
?>