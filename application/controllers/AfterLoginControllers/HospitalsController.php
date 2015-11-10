<?php
//Controller of the Hospitals View
class HospitalsController extends CI_Controller{
    public function index(){
        $this->load->model('hospital_model');
        $data ['hospitals'] = $this->hospital_model->getAllHospitals();
        $this->load->view('AfterLoginViews/hospitalsView',$data);
    }

    //Delete seleted hostpital
    public function deleteHospital($hospitalID){
        $this->load->model('hospital_model');
        $this->hospital_model->deleteHospital($hospitalID);
    }
}
?>