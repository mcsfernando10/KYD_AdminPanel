<?php
//Controller of the Forgot admin detail
class ForgotAdminDetailController extends CI_Controller{
    //Send email to reset the password
    public function sendEmail(){
        $emailAddressJSON = $this->input->post('emailAddJSON');
        $emailAddress = $emailAddressJSON['emailAdd'];
        //$emailAddress = "mcsfernando10@gmail.com";
        //Check email address exists
        $this->load->model('admin_user_model');
        $userDetail = $this->admin_user_model->getUsernameFrom($emailAddress);

        //If username found
        if($userDetail!=-1){
            $userName = $userDetail['username'];
            $nameOfAdmin = $userDetail['name'];
            //Generate a password
            $randomPassword = $this->generateRandomString();
            //Encrypt the password
            $encrytedPassword = md5($randomPassword);
            //Update the password
            $this->admin_user_model->UpdatePassword($userName,$encrytedPassword);

            $emailBody = "Hello, " . $nameOfAdmin . "\n";
            $emailBody .= "\tHere's your new account details\n" ;
            $emailBody .= "\t\tYour Username : " . $userName . "\n";
            $emailBody .= "\t\tYour New Password : " . $randomPassword . "\n";
            $emailBody .= "Login from here : \t http://sltravelbook.com/knowyourdoctor/index.php/LoginController \n";
            $emailBody .= "Thanks";

            echo $emailBody;

            //Create email to send
            $this->load->library('email');
            $this->email->from('slmcadmin@sltravelbook.com', 'SLMC Admin');
            $this->email->to($emailAddress);
            $this->email->cc('');
            $this->email->bcc('');
            $this->email->subject('Password Reset');
            $this->email->message($emailBody);
            //If mail send successfully
            if($this->email->send()){
                echo true;
            }
            else{
                echo false;
            }
        } else {
            echo false;
        }
    }

    //Generate random String
    public function generateRandomString() {
        //Chars to generate random string
        $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '?', '!', '@', '#',
            '$', '%', '+'
        );

        //Shuffule the characters
        shuffle($chars);
        //Password Length
        $num_chars = 7;
        $randomString = '';
        //Generate random string
        for ($i = 0; $i < $num_chars; $i++){
            $randomString .= $chars[mt_rand(0, $num_chars)];
        }
        return $randomString;
    }
}
?>