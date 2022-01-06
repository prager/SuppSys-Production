<?php
class Login_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function is_logged() {
        $retval = array();
        $retval['logged'] = FALSE;
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if(isset($_SESSION['logged'])) {
            if($_SESSION['logged']) {
                $retval['level'] = $_SESSION['level'];
                $retval['logged'] = TRUE;
            }
        }
        return $retval;
    }
    
    /**
     * Checks user ID and password credentials
     * @param $data array with user ID and password
     */
    public function check_credentials($data) {
        //echo '<br><br><br>' . password_hash($data['pass'], PASSWORD_BCRYPT, array('cost' => 12));
        $retval = FALSE;
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
            session_regenerate_id(FALSE);
        }
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $data['user']);
        $this->db->where('authorized', 1);
        $cnt = $this->db->count_all_results();
        if($cnt > 0) {
            //$query = $this->db->get('users')->row();
            $this->db->select('pass');
            $this->db->where('username', $data['user']);
            $query = $this->db->get('users');
            if(count($query->result()) == 1) {
                $row = $query->row();
                if(password_verify($data['pass'], $row->pass)) {
                    $retval = TRUE;
                    $this->load->model('user_model');
                    $user = $this->user_model->get_user($data['user']);
                    $user['session_id'] = session_id();
                    $this->set_logged($user); 
                    
                    
                    $key = read_file(base_url() . 'assets/files/key.txt');
                    
                    $init_arr = array(
                        'cipher' => 'aes-256',
                        'mode' => 'ctr',
                        'key' => $key
                    );
                    $this->encryption->initialize($init_arr);
                    $_SESSION['key'] = $key;
                    
                    
                    $_SESSION['user'] = $user;
                    $_SESSION['id_user'] = $user['id'];
                    $_SESSION['logged'] = TRUE;
                    $_SESSION['level'] = $user['level'];
                }
            }
        }
        return $retval;
    }
    
    private function set_logged($user){
        //check for logged=1 in previous sessions for current user and set logged to 0
        $this->db->flush_cache();
        $this->db->reset_query();
        $this->db->select('logged');
        $this->db->where('logged', 1);
        $this->db->where('id_user', $user['id']);
        //$res = $this->db->get('ci_sessions')->result();
        $cnt = $this->db->count_all_results('ci_sessions', TRUE);
        //$res = $this->db->get('ci_sessions')->result();
        //$cnt=0;
        if($cnt > 0) {
            $this->db->where('logged', 1);
            $this->db->where('id_user', $user['id']);
            $this->db->update('ci_sessions', array('logged' => 0));
        }
        
        $session_data = array(
            'id_user' => $user['id'],
            'session_id' => $user['session_id'],
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'date_logged_in' => time(),
            'logged' => 1);
        $this->db->insert('ci_sessions', $session_data);
    }
    
    public function get_cur_user_id() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        return $_SESSION['id_user'];
    }
    
    public function logout() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if(isset($_SESSION['logged'])) {
            $this->db->where('logged', 1);
            $this->db->where('id_user',  $_SESSION['id_user']);
            $this->db->update('ci_sessions', array('logged' => 0, 'date_logged_out' => time()));
            
            unset($_SESSION['logged']);
            unset($_SESSION['id_user']);
            unset($_SESSION['user']);
            //unset($_SESSION['user_type']);
        }
        
        session_regenerate_id(FALSE);
        session_destroy();
    }
    
    
    public function get_cur_user() {
        
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if(isset($_SESSION['logged'])) {
            return $_SESSION['user'];
        }
        else {
            return NULL;
        }
    }
}
?>