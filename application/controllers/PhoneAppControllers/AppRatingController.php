<?php
class AppRatingController extends CI_Controller{
    public function index(){

    }

    public function insertAppNewRating(){
        header('Content-type: application/json');
        $appRatingDetail = json_decode(file_get_contents('php://input'),true);
        //Get current time
        date_default_timezone_set("Asia/Colombo");
        $currentDateTime = date("Y-m-d h:i:sa");

        $this->load->model('app_rating_model');
        $ratingDetail = array(
            'ratedDate'=> $currentDateTime,
            'numofstars' => $appRatingDetail['rating'],
            'ratelevel' => $appRatingDetail['ratingLevelText']
        );
        $this->app_rating_model->insertRating($ratingDetail);
    }
}
?>