<?php
class SettingsController extends CI_Controller{

    public function index(){
        $this->load->view('AfterLoginViews/settingsView');
    }

    public function updatePassword(){
        $userName = $this->session->userdata('username');
        $currentPassword = md5($this->input->post('currentPassword'));
        $newPassword = md5($this->input->post('newPassword'));

        echo "alert('ABC')";

        $this->load->model('admin_user_model');
        $isSuccess = $this->admin_user_model->isPasswordUpdated($userName,$currentPassword,$newPassword);

        return $isSuccess;
    }
}
?>