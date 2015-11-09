<?php
class RatedDoctorsController extends CI_Controller{
    public function index(){
        $this->load->model('commented_doctor_model');
        $data ['ratedDoctors'] = $this->commented_doctor_model->getAllRatedDoctors();
        $this->load->view('AfterLoginViews/ratedDoctorsView',$data);
    }
}
?>