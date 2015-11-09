<?php
class admin_user_model extends CI_Model{
    public function insertAdminUser($newAdminData){
        $queryExecution = $this->db->insert('adminusers',$newAdminData);
        return $queryExecution;
    }

    public function isUserNameAndPasswordMatched($loginData){
        $this->db->select("username","password");
        $this->db->from("adminusers");
        $this->db->where("username", $loginData['username']);
        $this->db->where("password", $loginData['password']);

        $adminUsers = $this->db->get();

        if($adminUsers->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getName($username){
        $this->db->select("name");
        $this->db->from("adminusers");
        $this->db->where("username", $username);
        $adminName = $this->db->get();
        $name = $adminName->result_array()[0]['name'];
        return $name;
    }

    public function isUserNameAvailable($userName){
        $this->db->select("username");
        $this->db->from("adminusers");
        $this->db->where("username",$userName);

        $userNameRow = $this->db->get();

        if($userNameRow->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllAdmins(){
        $toGetAllAdminsData = $this->db->select('*')->from('adminusers')->get();
        return $toGetAllAdminsData->result();
    }

    public function isPasswordUpdated($username, $currentPassword, $newPassword){
        $this->db->select("*");
        $this->db->from("adminusers");
        $this->db->where("username",$username);
        $this->db->where("password",$currentPassword);
        $userDetailRow = $this->db->get();
        if($userDetailRow->num_rows() == 1) {
            $newPassword = array('password' => $newPassword );
            $this->db->where('username', $username);
            $this->db->update('adminusers', $newPassword);
            return true;
        } else {
            return false;
        }
    }

    public function deleteAdmin($username){
        $this->db->where('username',$username)->delete('adminusers');
    }
}
?>