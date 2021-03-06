<?php
//Model - Located Doctor Model (Doctors with submitted locations)
class located_doctor_model extends CI_Model
{
    //Insert submitted hospital location
    public function insertSubmitedLocation($docDetails, $locationDetails)
    {
        $doctorID = $docDetails['docid'];
        $this->db->select("*");
        $this->db->from("docdetails");
        $this->db->where("docid", $doctorID);
        $ratedDocs = $this->db->get();

        //check doc id exists or not
        if ($ratedDocs->num_rows() == 0) {
            $this->db->insert('docdetails', $docDetails);
        }
        //Insert rating to raw data table
        $this->db->insert('doclocation', $locationDetails);
    }

    //Get doctor details and available hospitals from submitted locations
    public function getAllDocAndLocations($latitude, $longtitude, $date)
    {
        $query  = "SELECT distinct ad.docid, dd.docname, dd.address, dd.regdate, dd.qualifications,";
        $query .= "SQRT( POW( 69.1 * ( latitude - $latitude) , 2 ) + POW( 69.1 * ($longtitude - longtitude)";
        $query .= "* COS( latitude / 57.3 ) , 2 ) ) AS distance ";
        $query .= "FROM hospitals h, docdetails dd, analysedoclocation ad ";
        $query .= "WHERE h.id = ad.locationid AND ad.docid = dd.docid AND DATE(ad.lastRatedDate) = '$date' ";
        $query .= "HAVING distance <100 ";
        $query .= "ORDER BY distance";
        $nearestDoctors = $this->db->query($query);
        $docsAndHosJSONData = array("locatedDoctors"=>$nearestDoctors->result_array());
        return json_encode($docsAndHosJSONData );
    }

    //Get all locations of a particular doctor
    public function getAllLocationsOfDoctor($doctorID, $latitude, $longtitude, $date){
        $query  = "SELECT ad.lastRatedDate, h.id, h.name, h.address, h.latitude, h.longtitude, dd.docid, dd.docname,  ";
        $query .= "SQRT( POW( 69.1 * ( latitude - $latitude) , 2 ) + POW( 69.1 * ($longtitude - longtitude) ";
        $query .= "* COS( latitude / 57.3 ) , 2 ) ) AS distance ";
        $query .= "FROM hospitals h, docdetails dd, analysedoclocation ad ";
        $query .= "WHERE h.id = ad.locationid AND ad.docid = $doctorID  AND ad.docid = dd.docid AND DATE(ad.lastRatedDate) = '$date' ";
        $query .= "HAVING distance <100 ";
        $query .= "ORDER BY distance";
        $nearestDocHospitals = $this->db->query($query);
        $HospitalJSONData = array("locationsOfDoctor"=>$nearestDocHospitals->result_array());
        return json_encode($HospitalJSONData );
    }

    //Get all doctor details who are having submitted locations
    public function getAllLocatedDoctors()
    {
        $toGetAllLocatedDocData = $this->db->select('dd.docid, dd.docname, dd.address, dd.regdate, dd.qualifications')->
        from('doclocation a')->
        join('docdetails dd','dd.docid = a.docid')->
        group_by('dd.docid')->get();
        return $toGetAllLocatedDocData->result();
    }

    //Get all raw details of submitted locations
    public function getAllLocationsOf($docid){
        $toGetAllLocations = $this->db->select('*')->
        from('doclocation l')->
        join('hospitals h','h.id = l.locationid')->
        where('docid',$docid)->get();
        return $toGetAllLocations->result();
    }

    //Get all analysed details of submitted locations
    public function getAllAnalysedLocationsOf($docid){
        $toGetAllAnalysedLocations = $this->db->select('*')->
        from('analysedoclocation a')->
        join('hospitals h','h.id = a.locationid')->
        where('docid',$docid)->get();
        return $toGetAllAnalysedLocations->result();
    }

    //Delete submitted location of doctor - Admin
    public function deleteLocationOf($docLocationID){
        $this->db->where('doc_locid',$docLocationID)->delete('doclocation');
    }
}
?>