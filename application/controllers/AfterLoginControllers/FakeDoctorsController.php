<?php
//Controller of the Fake Doctors View
class FakeDoctorsController extends CI_Controller{
    public function index(){
        $this->load->model('fake_doctor_model');
        $data ['fakedoctors'] = $this->fake_doctor_model->getAllFakeDoctors();
        $this->load->view('AfterLoginViews/fakeDoctorsView',$data);
    }

    //Remove selected fake doctor detail report id
    public function removeReport($reportID){
        $this->load->model('fake_doctor_model');
        $this->fake_doctor_model->removeReportOf($reportID);
    }
}
?>