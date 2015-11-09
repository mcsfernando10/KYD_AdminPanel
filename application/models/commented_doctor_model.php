<?php
class commented_doctor_model extends CI_Model{
    public function getAllRatedDoctors(){
        $toGetAllRatedDocData = $this->db->select('dd.docid, dd.docname, dd.address, dd.regdate, dd.qualifications, d.*')->
                                from('analysedocrating a')->
                                join('docrating d','a.topcommentid = d.commentid')->
                                join('docdetails dd','dd.docid = a.docid','INNER')->get();
        return $toGetAllRatedDocData->result();
    }

    public function getAllNonRatedDoctors(){
        $toGetAllNonRatedDocData = $this->db->select('a.docid, a.docname, a.address, a.regdate, a.qualifications')->
        from('analysedocrating a')->
        where('a.topcommentid is null')->get();
        return $toGetAllNonRatedDocData->result();
    }

    public function insertRating($docDetails,$commentDetails){
        //Check doctor id exists or not in docdetails table
        $doctorID = $docDetails['docid'];
        $this->db->select("*");
        $this->db->from("docdetails");
        $this->db->where("docid", $doctorID);
        $ratedDocs = $this->db->get();

        //check doc id exists or not
        if($ratedDocs->num_rows() == 0) {
            $this->db->insert('docdetails',$docDetails);
        }
        //Insert rating to raw data table
        $this->db->insert('docrating',$commentDetails);

        //Get top commentID
        $this->db->select('MAX(commentlikes) likes, commentid');
        $this->db->where("docid", $doctorID);
        $topCommentData = $this->db->get('docrating');
        $topCommentID = $topCommentData->result_array()[0]['commentid'];

        //Check analysed table has current doctorid row
        //Check doctor id exists or not in docdetails table
        $this->db->select("*");
        $this->db->from("analysedocrating");
        $this->db->where("docid", $doctorID);
        $analysedRatedDocs = $this->db->get();

        //check doc id exists or not
        if($analysedRatedDocs->num_rows() == 0) {
            $analysedDetails = array(
                'docid' => $doctorID,
                'topcommentid' => $topCommentID
            );
            $this->db->insert('analysedocrating',$analysedDetails);
        } else {
            //Already inserted analysed detail update it
            $updateDetails = array(
                'topcommentid' => $topCommentID
            );
            $this->db->where('docid', $doctorID);
            $this->db->update('analysedocrating',$updateDetails);
        }
        //Update analysed data of table
        //To get top comment
        /*$this->db->select('MAX(commentlikes) likes');
        $this->db->where("docid", $doctorID);
        $topCommentData = $this->db->get('docrating');
        $topCommentLikes = $topCommentData->result_array()[0]['likes'];

        $this->db->select('comment');
        $this->db->where("docid", $doctorID);
        $this->db->where("commentlikes", $topCommentLikes);
        $topComment = $this->db->get('docrating');

        $tComment = $topComment->result_array()[0]['comment'];

        //Update data table
        $newData = array(
            'topcomment' => $tComment
        );
        $this->db->where('docid', $doctorID);
        $this->db->update('analysedocrating',$newData);*/
    }

    public function getAllCommentsOf($doctorID){
        $this->db->select("*");
        $this->db->where("docid", $doctorID);
        $allDoctorData = $this->db->get('analysedocrating');
        $newData = array("docRatings"=>$allDoctorData->result_array());

        $this->db->select('*');
        $this->db->where("docid", $doctorID);
        $allCommentData = $this->db->get('docrating');
        $newData["comments"] = $allCommentData->result_array();
        return json_encode($newData);
    }

    public function updateLikesOf($commentID,$incrementOrDecrement){
        if($incrementOrDecrement) {
            $this->db->where('commentid', $commentID);
            $this->db->set('commentlikes', 'commentlikes+1', FALSE);
            $this->db->update('docrating');
        } else {
            $this->db->where('commentid', $commentID);
            $this->db->set('commentlikes', 'commentlikes-1', FALSE);
            $this->db->update('docrating');
        }

        //Update analysed data of table
        //Get doctorid for comment id
        $this->db->select('docid');
        $this->db->where("commentid", $commentID);
        $docIDData = $this->db->get('docrating');
        $doctorID = $docIDData->result_array()[0]['docid'];

        //Get top commentID
        $this->db->select('MAX(commentlikes) likes');
        $this->db->where("docid", $doctorID);
        $topCommentData = $this->db->get('docrating');
        $topCommentLikes = $topCommentData->result_array()[0]['likes'];

        $this->db->select('commentid');
        $this->db->where("docid", $doctorID);
        $this->db->where("commentlikes", $topCommentLikes);
        $topComment = $this->db->get('docrating');

        $topCommentID = $topComment->result_array()[0]['commentid'];

        //Update analysed table
        $updateDetails = array(
            'topcommentid' => $topCommentID
        );
        $this->db->where('docid', $doctorID);
        $this->db->update('analysedocrating',$updateDetails);
    }

    public function getAllComments($docid){
        $toGetAllComments = $this->db->select('*')->
        from('docrating')->
        where('docid',$docid)->get();
        return $toGetAllComments->result();
    }

    public function deleteComment($commentID){
        $this->db->where('commentid',$commentID)->delete('docrating');
    }
}
?>