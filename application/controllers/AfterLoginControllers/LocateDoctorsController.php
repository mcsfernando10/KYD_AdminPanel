<?php
//Controller of the Located Doctors View
class LocateDoctorsController extends CI_Controller{
    public function index(){
        $this->load->model('located_doctor_model');
        $data ['locatedDoctors'] = $this->located_doctor_model->getAllLocatedDoctors();
        $this->load->view('AfterLoginViews/locateDoctorsView',$data);
    }
}
?>