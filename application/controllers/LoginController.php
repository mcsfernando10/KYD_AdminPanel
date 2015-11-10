<?php
//Controller of the Login View
class LoginController extends CI_Controller{
    public function index(){
        $this->load->view('loginView');
        //$this->isLoggedIn();
    }

    //Check whether the session variable is created or not
    public function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        //check if session variable was not created or not
        if(isset($isLoggedIn) && $isLoggedIn==true) {
            //Display after login page if session was created
            $userName = $this->session->userdata('username');
            $this->load->model('admin_user_model');
            $loggedInName = $this->admin_user_model->getName($userName);
            $data['loggedName'] = $loggedInName;
            $this->load->view('afterLoginView', $data);
        }else{
            $this->load->view('loginView');
        }
    }

    //Check username or password exists or not
    public function checkLogin(){
        $userName = $this->input->post('inputUserName');
        //Encrypt password
        $encrytedPassword = md5($this->input->post('inputPassword'));
        //Set values to array
        $loginData = array(
            'username' => $userName,
            'password' => $encrytedPassword
        );
        $this->load->model('admin_user_model');
        $execution = $this->admin_user_model->isUserNameAndPasswordMatched($loginData);
        //check whtether the user details exists in the db or not
        if($execution){
            $sessionData = array(
                'username' => $userName,
                'isLoggedIn' => true
            );
            $this->session->set_userdata($sessionData);
            redirect(base_url().'index.php/AfterLoginController');
        } else {
            $data['loginError'] = "<b>Login Failed!</b> Invalid Username or password";
            $this->load->view('loginView',$data);
        }
    }
}
?>