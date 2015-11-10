<?php
//Model - Admin Model
class admin_user_model extends CI_Model{
    //Insert new admin details to db
    public function insertAdminUser($newAdminData){
        $queryExecution = $this->db->insert('adminusers',$newAdminData);
        return $queryExecution;
    }

    //Check username and password matches
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

    //Get name from username
    public function getName($username){
        $this->db->select("name");
        $this->db->from("adminusers");
        $this->db->where("username", $username);
        $adminName = $this->db->get();
        $name = $adminName->result_array()[0]['name'];
        return $name;
    }

    //Check username availability
    public function isUserNameAvailable($userName){
        $this->db->select("username");
        $this->db->from("adminusers");
        $this->db->where("username",$userName);

        $userNameRow = $this->db->get();
        //if no rows are in the table, username is available
        if($userNameRow->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }

    //Get all admin details
    public function getAllAdmins(){
        $toGetAllAdminsData = $this->db->select('*')->from('adminusers')->get();
        return $toGetAllAdminsData->result();
    }

    //update password and return updated state
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

    //Delete admin account details
    public function deleteAdmin($username){
        $this->db->where('username',$username)->delete('adminusers');
    }
}
?>