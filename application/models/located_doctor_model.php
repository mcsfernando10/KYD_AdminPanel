<?php
class located_doctor_model extends CI_Model
{
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

        //Get location id and day
        /*$locationID = $locationDetails['locationid'];
        $day = $locationDetails['availableday'];

        //Check raw table (doclocation) has same data more than 10 times (Analyse part)
        $this->db->select("*");
        $this->db->from("docdetails");
        $this->db->where("docid", $doctorID);
        $this->db->where("locationid",$locationID);
        $this->db->where("availableday",$day);
        $docLocationSubmissionTest = $this->db->get();

        //check doc id exists or not
        if ($docLocationSubmissionTest->num_rows() >= 2) {
            //Check docid and locationid available
            $this->db->select("*");
            $this->db->from("analysedoclocation");
            $this->db->where("docid", $doctorID);
            $this->db->where("locationid",$locationID);
            $checkDocAndLocationIDs = $this->db->get();

            $isMondayAvailable = False;
            $isTuesdayAvailable = False;
            $isWednesdayAvailable = False;
            $isThursdayAvailable = False;
            $isFridayAvailable = False;
            $isSaturdayAvailable = False;
            $isSundayAvailable = False;
            //check doc id exists or not
            if ($checkDocAndLocationIDs->num_rows() == 0) {
                //Insert data to analysed table
                switch($day){
                    case "Monday" :
                        $isMondayAvailable = True;
                        break;
                    case "Tuesday" :
                        $isTuesdayAvailable = True;
                        break;
                    case "Wednesday" :
                        $isWednesdayAvailable = True;
                        break;
                    case "Thursday" :
                        $isThursdayAvailable = True;
                        break;
                    case "Friday" :
                        $isFridayAvailable = True;
                        break;
                    case "Saturday" :
                        $isSaturdayAvailable = True;
                        break;
                    default :
                        $isSundayAvailable = True;
                }
                $analysedDetails = array(
                    'docid' => $doctorID,
                    'locationid' => $locationID,
                    'mondayavailability' => $isMondayAvailable,
                    'tuesdayavailability' => $isTuesdayAvailable,
                    'wednesdayavailability' => $isWednesdayAvailable,
                    'thurdayavailability' => $isThursdayAvailable,
                    'fridayavailability' => $isFridayAvailable,
                    'saturdayavailability' => $isSaturdayAvailable,
                    'sundayavailability' => $isSundayAvailable
                );
                //Insert analysed data to analysedoclocation table
                $this->db->insert('analysedoclocation', $analysedDetails);
            } else {
                //Update data in the analysed table
            }
        }*/
    }

    public function getAllDocAndLocations($latitude, $longtitude, $date)
    {
        $query  = "SELECT h.id, h.name, h.address, h.district, h.latitude, h.longtitude, dd.docid, dd.docname,  ";
        $query .= "SQRT( POW( 69.1 * ( latitude - $latitude ) , 2 ) + POW( 69.1 * ($longtitude - longtitude ) ";
        $query .= "* COS( latitude / 57.3 ) , 2 ) ) AS distance ";
        $query .= "FROM hospitals h, doclocation dl, docdetails dd ";
        $query .= "WHERE h.id = dl.locationid AND dl.docid = dd.docid AND DATE(dl.ratedDate) > $date ";
        $query .= "HAVING distance <3 ";
        $query .= "ORDER BY distance";
        $nearestDocsAndHos = $this->db->query($query);
        $docsAndHosJSONData = array("locatedDoctors"=>$nearestDocsAndHos->result_array());
        return json_encode($docsAndHosJSONData );
    }

    public function getAllLocatedDoctors()
    {
        $toGetAllLocatedDocData = $this->db->select('dd.docid, dd.docname, dd.address, dd.regdate, dd.qualifications')->
        from('doclocation a')->
        join('docdetails dd','dd.docid = a.docid')->
        group_by('dd.docid')->get();
        return $toGetAllLocatedDocData->result();
    }

    public function getAllLocationsOf($docid){
        $toGetAllLocations = $this->db->select('*')->
        from('doclocation l')->
        join('hospitals h','h.id = l.locationid')->
        where('docid',$docid)->get();
        return $toGetAllLocations->result();
    }

    public function getAllAnalysedLocationsOf($docid){
        $toGetAllAnalysedLocations = $this->db->select('*')->
        from('analysedoclocation a')->
        join('hospitals h','h.id = a.locationid')->
        where('docid',$docid)->get();
        return $toGetAllAnalysedLocations->result();
    }


    public function deleteLocationOf($docLocationID){
        $this->db->where('doc_locid',$docLocationID)->delete('doclocation');
    }
}
?>