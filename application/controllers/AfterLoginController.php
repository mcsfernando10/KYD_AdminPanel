<?php
//Controller of the AFter Login View
class AfterLoginController extends CI_Controller{
    public function index(){
        $this->isLoggedIn();
    }

    //Check whether the admin logged in or not
    public function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        //check if session variable was not created or not
        if(!isset($isLoggedIn) || $isLoggedIn!=true){
            //Redirect to login if session is not created
            redirect(base_url().'index.php/LoginController');
        }else{
            //Display after login page if session was created
            $userName = $this->session->userdata('username');
            $this->load->model('admin_user_model');
            $loggedInName = $this->admin_user_model->getName($userName);
            $data['loggedName'] = $loggedInName;
            $this->load->view('afterLoginView',$data);
        }
    }

    //Destroy session variable for logout
    public function logout(){
        //Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect(base_url().'index.php/LoginController');
    }
}
?>