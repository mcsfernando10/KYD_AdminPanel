<?php
//Model - Fake Doctor Model(Doctors who are having fake doctor id)
class fake_doctor_model extends CI_Model
{
    //Insert fake doctor detail
    public function insertFakeDoctorDetails($fakeDoctorDetails)
    {
        $this->db->insert('fakedoctors',$fakeDoctorDetails);
    }

    //Get all fake doctor details
    public function getAllFakeDoctors(){
        $toGetFakeDoctorData = $this->db->select('*')->from('fakedoctors')->get();
        return $toGetFakeDoctorData->result();
    }

    //Remove fake doctor report
    public function removeReportOf($reportID){
        $this->db->where('reportid',$reportID)->delete('fakedoctors');
    }
}
?>