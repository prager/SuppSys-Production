<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Los_Angeles");
    }
    
	public function index() {
	    $this->form_validation->set_rules('user', 'Username', 'required|trim|callback_validate_credentials');
	    $this->form_validation->set_rules('pass', 'Password', 'required|trim');
	    if($this->form_validation->run()) {
	        $this->load_user();
	    }
	    else {
	        $this->load->view('template/header', array('logged' => FALSE));
	        $data['title'] = 'Login Error';
	       // $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Public_ctl/reset_password', 'here') .
	       // ' to reset your password or go to home page ' . anchor('public_ctl', 'here'). '<br><br>';
	        $data['msg'] = 'There was an error while checking your credentials. 
                Click here to go to home page ' . anchor('public_ctl', 'here'). '<br><br>';
	        $this->load->view('stat_view', $data);
	        $this->load->view('template/footer');
	    }
	}
	
	public function validate_credentials() {
	    $username = strtolower($this->input->post('user'));
	    $password = $this->input->post('pass');
	    $data['user'] = $username;
	    $data['pass'] = $password;
	    if ($this->Login_model->check_credentials($data)) {
	        return TRUE;
	    } else {
	        $this->form_validation->set_message('validate_credentials', 'Incorrect username or password');
	        return FALSE;
	    }
	}
	
	public function load_user() {
	    /*$this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	    
	    $data['user'] = $this->User_model->get_cur_user($this->Login_model->get_cur_user_id());	    
	    
	    $this->load->view('mngr/mngr_view', $data);
	    
	    $this->load->view('template/footer');*/
	    redirect(base_url());
	}
	
	public function logout() {
	    $this->Login_model->logout();
	    redirect(base_url());
	}
}
