<?php
class FakeDoctorReportController extends CI_Controller{
    public function index(){

    }

    public function insertFakeDoctorReport(){
        header('Content-type: application/json');
        $fakeDocReport = json_decode(file_get_contents('php://input'),true);

        $this->load->model('fake_doctor_model');
        $fakeDoctorDetails = array(
            'docregNo' => $fakeDocReport['fakeDocID'],
            'doctorname' => $fakeDocReport['fakeDocName'],
            'reportedperson' => $fakeDocReport['reportedPerson'],
            'contactno' => $fakeDocReport['contactNo'],
            'comment' => $fakeDocReport['comment']
        );
        $this->fake_doctor_model->insertFakeDoctorDetails($fakeDoctorDetails);
    }
}
?>