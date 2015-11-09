<?php
class fake_doctor_model extends CI_Model
{
    public function insertFakeDoctorDetails($fakeDoctorDetails)
    {
        $this->db->insert('fakedoctors',$fakeDoctorDetails);
    }

    public function getAllFakeDoctors(){
        $toGetFakeDoctorData = $this->db->select('*')->from('fakedoctors')->get();
        return $toGetFakeDoctorData->result();
    }

    public function removeReportOf($reportID){
        $this->db->where('reportid',$reportID)->delete('fakedoctors');
    }
}
?>