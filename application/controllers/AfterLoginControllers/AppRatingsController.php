<?php
//Controller of the AppRatings View
class AppRatingsController extends CI_Controller{
    public function index(){
        $this->load->model('app_rating_model');
        $data ['appRatings'] = $this->app_rating_model->getAllRatings();
        $this->load->view('AfterLoginViews/appRatingsView',$data);
    }
}
?>