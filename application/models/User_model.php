<?php
class User_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function send_reg($param) {
        $retarr = $this->pass_val($param);
        
        if($retarr['check']) {            
            $this->db->select('email');
            $q = $this->db->get_where('users', array('email' => $param['email']));
            if($q->num_rows() == 0) {
                $msg = 'SuppSys new user: ' . $param['fname'] . ' ' . $param['lname'] . "\n\n".
                    'Email: ' . $param['email'] . "\n\n";
                
                mail("jkulisek.us@gmail.com", "SuppSys Registration", $msg);
                
                $pass = $param['pass1'];
                unset($param['pass1']);
                unset($param['pass2']);
                
     /* https://stackoverflow.com/questions/54628329/best-way-to-protect-your-password-in-2019-with-php */ 
                $param['pass'] = password_hash($pass, PASSWORD_BCRYPT, array('cost'=>12));
                
                $rand_str = bin2hex(openssl_random_pseudo_bytes(12));
                
                $param['verifystr'] = base_url() . 'index.php/public_ctl/confirm_reg/' . $rand_str;
                $param['email_key'] = $rand_str;
                
                $this->db->insert('users', $param);
                
                $recipient = $param['email'];
                $subject = 'SuppSys Registration';     
                
                $message = 'To finish your registration for SupplySys click on the following link or copy paste in the browser: '
                    . $param['verifystr'] . "\n\n";
                $message .= 'You must do so within 72 hours otherwise you login information may be deactivated.
                Thank you for your interest in SuppSys!';
                
                mail($recipient, $subject, $message);
            }
        }
        
        return $retarr;
    }
    
    private function pass_val($param) {
        $retarr = array();
        $retarr['check'] = TRUE;
        $retarr['msg'] = '';
        
        if($param['pass1'] === $param['pass2']) {
            
 /* https://stackoverflow.com/questions/7545847/password-strength-validator-how-would-you-improve-this */
            
            if(strlen($param['pass1']) > 7) {
                $capCount  = preg_match_all("/[A-Z]/", $param['pass1'], $matches);
                $numCount  = preg_match_all("/[0-9]/", $param['pass1'], $matches);
                $specCount = preg_match_all("/[^0-9a-zA-z]/", $param['pass1'], $matches);
                
                if($capCount < 1) {
                    $retarr['check'] = FALSE;
                    $retarr['msg'] .= " Password must contain at least one capital letter!";
                }
                
                if($numCount < 1) {
                    $retarr['check'] = FALSE;
                    $retarr['msg'] .= " Password must contain at least one number!";
                }
                
                if($specCount < 1) {
                    $retarr['check'] = FALSE;
                    $retarr['msg'] .= " Password must contain at least one special character!";
                }
            
            }
            elseif(strlen($param['pass1']) == 0) {
                $retarr['check'] = FALSE;
                $retarr['msg'] = "Password cannot be blank!";
            }
            else {
                $retarr['check'] = FALSE;
                $retarr['msg'] = "Password is too short!";
            }
            
        }
        else {
            $retarr['check'] = FALSE;
            $retarr['msg'] = "Passwords don't match!";
        }
        
        return $retarr;
    }
    public function get_user($username){
        //get username from users table
        $this->db->select('*');
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $row = $query->row();
        //$user['type'] = $row->type_code;
        $user['level'] = $row->type_code;
        $user['id'] = $row->id_user;
        $user['fname'] = $row->fname;
        $user['lname'] = $row->lname;
        $user['zip'] = $row->zip;
        $user['email'] = $row->email;
        $user['phone'] = $row->phone;
        $user['street'] = $row->street;
        $user['city'] = $row->city;
        $user['state'] = $row->state;
        $user['facebook'] = $row->facebook;
        $user['twitter'] = $row->twitter;
        $user['googleplus'] = $row->googleplus;
        $user['linkedin'] = $row->linkedin;
        $user['authorized'] = $row->authorized;
        $user['username'] = $username;
        $user['profile'] = $row->profile;
        
        //get user attributes from logins table
        $this->db->select('description');
        $this->db->where('type_code', $user['level']);
        //$user['description'] = $this->db->get('user_types')->row()->description;
        
        return $user;
    }
    
    public function get_user_by_id($id) {
        $this->db->select('*');
        $this->db->where('id_user', $id);
        return $this->db->get('users')->row();
    }
    
    public function check_authorized() {
        $retval = TRUE;
        $id = $this->Login_model->get_cur_user_id();
        $this->db->select('authorized');
        $this->db->where('id_user', $id);
        if($this->db->get('users')->row()->authorized == 0) {
            $retval = FALSE;
        }
        return $retval;
    }
    
    public function get_cur_user($id) {
        
        $this->db->select('*');
        $this->db->where('id_user', $id);
        $user = $this->db->get('users')->row();
        
        $user_arr = array(
            'id' => $user->id_user,
            'username' => $user->username,
            'fname' => $user->fname,
            'lname' => $user->lname,
            'email' => $user->email,
            'phone' => $user->phone,
            'street' => $user->street,
            'city' => $user->city,
            'state' => $user->state,
            'zip' => $user->zip,
            'facebook' => $user->facebook,
            'twitter' => $user->twitter,
            'linkedin' => $user->linkedin,
            'googleplus' => $user->googleplus
        );
        
        return $user_arr;
    }
    
    public function get_user_to_reg($verifystr) {
        
        $this->db->select('*');
        $this->db->where('email_key', $verifystr);
        $q = $this->db->get('users')->row();
        $this->db->update('users', array('active' => 1));
        
        mail("jkulisek.us@gmail.com", "SuppSys Account Activation", 'User '. $q->username . ' activated account!');
    }
}


?>