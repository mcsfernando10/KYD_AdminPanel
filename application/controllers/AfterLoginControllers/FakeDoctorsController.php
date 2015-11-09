<?php
//Controller of the add Hospitals View
class FakeDoctorsController extends CI_Controller{
    public function index(){
        $this->load->model('fake_doctor_model');
        $data ['fakedoctors'] = $this->fake_doctor_model->getAllFakeDoctors();
        $this->load->view('AfterLoginViews/fakeDoctorsView',$data);
    }

    public function removeReport($reportID){
        $this->load->model('fake_doctor_model');
        $this->fake_doctor_model->removeReportOf($reportID);
    }
}
?>