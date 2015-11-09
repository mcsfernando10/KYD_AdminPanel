<?php
//Controller of the Add Hospitals View
class AdminAccountsController extends CI_Controller{
    public function index(){
        $this->load->model('admin_user_model');
        $data ['admins'] = $this->admin_user_model->getAllAdmins();
        $this->load->view('AfterLoginViews/adminAccountsView',$data);
    }

    //Call relevant method of admin model to delete an admin
    public function deleteAdmin($username){
        $this->load->model('admin_user_model');
        $this->admin_user_model->deleteAdmin($username);
    }
}
?>