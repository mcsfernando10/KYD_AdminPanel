<?php
class app_rating_model extends CI_Model{
    public function getAllRatings(){
        $toGetAllRatings = $this->db->select('*')->from('apprating')->get();
        return $toGetAllRatings->result();
    }

    public function insertRating($appRatingDetail)
    {
        $this->db->insert('apprating',$appRatingDetail);
    }
}
?>