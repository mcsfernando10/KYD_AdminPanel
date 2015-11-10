<?php
//Controller of the Sign View
class SignUpController extends CI_Controller{
    public function index(){
        $this->load->view('signUpView');
    }

    //Insert new admin details to the db
    public function insertNewAdmin(){
        $userName = $this->input->post('inputUserName');
        //Encrypt password
        $encrytedPassword = md5($this->input->post('inputPassword'));
        //Set values to array
        $adminData = array(
            'name' => $this->input->post('inputName'),
            'username' => $userName,
            'password' => $encrytedPassword,
            'email' => $this->input->post('inputEmail')
        );
        $this->load->model('admin_user_model');
        $execution = $this->admin_user_model->insertAdminUser($adminData);

        //Execution successful
        if($execution){
            $sessionData = array(
                'username' => $userName,
                'isLoggedIn' => true
            );
            $this->session->set_userdata($sessionData);
            redirect(base_url().'index.php/AfterLoginController');
        }else{
            $this->index();
        }
    }

    //Check typed username exists or not
    public function checkUsernameAvailability($userName){
        $this->load->model('admin_user_model');
        echo $this->admin_user_model->isUserNameAvailable($userName);
    }
}
?>