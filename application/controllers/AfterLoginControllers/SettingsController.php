<?php
//Controller of the Settings View
class SettingsController extends CI_Controller{

    public function index(){
        $this->load->view('AfterLoginViews/settingsView');
    }

    //Update password
    public function updatePassword(){
        //Get username from session variable
        $userName = $this->session->userdata('username');
        //Get current and new password
        $currentPassword = md5($this->input->post('currentPassword'));
        $newPassword = md5($this->input->post('newPassword'));

        $this->load->model('admin_user_model');
        //Check whether the password updated successful or not
        $isSuccess = $this->admin_user_model->isPasswordUpdated($userName,$currentPassword,$newPassword);

        return $isSuccess;
    }
}
?>