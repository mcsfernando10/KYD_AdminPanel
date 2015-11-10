<?php
//Model - Model for app rating
class app_rating_model extends CI_Model{
    //Get all ratings
    public function getAllRatings(){
        $toGetAllRatings = $this->db->select('*')->from('apprating')->get();
        return $toGetAllRatings->result();
    }

    //Insert new app rating
    public function insertRating($appRatingDetail)
    {
        $this->db->insert('apprating',$appRatingDetail);
    }
}
?>