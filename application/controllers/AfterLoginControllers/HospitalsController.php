<?php
class HospitalsController extends CI_Controller{
    public function index(){
        $this->load->model('hospital_model');
        $data ['hospitals'] = $this->hospital_model->getAllHospitals();
        $this->load->view('AfterLoginViews/hospitalsView',$data);
    }
    public function deleteHospital($hospitalID){
        $this->load->model('hospital_model');
        $this->hospital_model->deleteHospital($hospitalID);
    }
}
?>