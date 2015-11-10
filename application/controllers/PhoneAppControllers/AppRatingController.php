<?php
//Controller For Mobile side - To Rate Mobile app
class AppRatingController extends CI_Controller{
    public function index(){

    }

    //Insert new rating to db
    public function insertAppNewRating(){
        header('Content-type: application/json');
        //Get JSON Object details
        $appRatingDetail = json_decode(file_get_contents('php://input'),true);
        //Get current time
        date_default_timezone_set("Asia/Colombo");
        $currentDateTime = date("Y-m-d H:i:sa");

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