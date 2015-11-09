<?php
class doctor_model extends CI_Model{
    public function insertDoctorDetail($docDetails){
        $doctorID = $docDetails['docid'];
        $this->db->select("*");
        $this->db->from("docdetails");
        $this->db->where("docid", $doctorID);
        $ratedDocs = $this->db->get();

        //check doc id exists or not
        if ($ratedDocs->num_rows() == 0) {
            $this->db->insert('docdetails', $docDetails);
        }
    }
}
?>