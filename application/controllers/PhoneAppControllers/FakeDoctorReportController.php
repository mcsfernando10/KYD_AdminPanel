<?php
//Controller For Mobile side - To control of submission of fake doctor details
class FakeDoctorReportController extends CI_Controller{
    //Insert fake doctor details to the table
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