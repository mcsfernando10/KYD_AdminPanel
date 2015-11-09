<?php
class hospital_model extends CI_Model{
    public function getAllHospitalsOf($latitude, $longtitude){
        $query = "SELECT * ";
        $query .= "FROM (SELECT u.id, u.name, u.address, u.district, u.latitude, u.longtitude, ";
        $query .= "SQRT( POW( 69.1 * ( latitude - $latitude ) , 2 ) + POW( 69.1 * ($longtitude - longtitude ) ";
        $query .= "* COS( latitude / 57.3 ) , 2 ) ) AS distance ";
        $query .= "FROM hospitals u ";
        $query .= "HAVING distance <3 ";
        $query .= "ORDER BY distance)nearest_hospital";
        $nearestHospitals = $this->db->query($query);
        $hospitalJSONData = array("hospitals"=>$nearestHospitals->result_array());
        return json_encode($hospitalJSONData);
    }

    public function addNewHospitalToDB($hospitalDetail){
        $queryExecution = $this->db->insert('hospitals',$hospitalDetail);
        return $queryExecution;
    }

    public function getAllHospitals(){
        $toGetAllHospitals = $this->db->select('*')->
        from('hospitals')->get();
        return $toGetAllHospitals->result();
    }

    public function deleteHospital($hospitalID){
        $this->db->where('id',$hospitalID)->delete('hospitals');
    }
}
?>