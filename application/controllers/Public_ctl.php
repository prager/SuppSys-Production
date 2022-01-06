<?php

class Public_ctl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Los_Angeles");        
    }
    
    public function index() {
        $this->load->view('template/header');
        if($this->Login_model->is_logged()['logged']) {
            redirect('mngr');
        }
        else {
            $this->load->view('public/home_view');
        }
        $this->load->view('template/footer');
    }
    
    public function contact() {
        $this->load->view('template/header');
        $this->load->view('public/contact_view');
        $this->load->view('template/footer');
    }
    
    public function register() {
        $data['fname'] = '';
        $data['lname'] = '';
        $data['email'] = '';
        $data['msg'] = '';
        $data['user'] ='';
        $this->load->view('template/header');
        $this->load->view('public/reg_view', $data);
        $this->load->view('template/footer');
    }
    
    public function send_reg() {
        $param = array();
        $param['fname'] = $this->input->post('fname');
        $param['lname'] = $this->input->post('lname');
        $param['email'] = $this->input->post('email');
        $param['username'] = $this->input->post('user');
        $param['pass1'] = $this->input->post('pass1');
        $param['pass2'] = $this->input->post('pass2');
        
        $this->load->view('template/header');
        
        if($param['lname'] == '' || $param['fname'] == '' || valid_email($param['email']) != TRUE) {
                
                $data = $param;
                $data['title'] = 'Error!';
                $data['msg'] = '<span style="color: red">Please, fill all the required information. Thank you!</span>';
                
                $this->load->view('public/reg_view', $data);
                
            }
            else {
                $check_arr = $this->User_model->send_reg($param);
                if($check_arr['check']) {
                    $data['title'] = 'Thank you!';
                    $data['msg'] = 'Your registration has been sent. Please, check your email for more info.
                                    Thank you!<br><br>';
                }
                else {
                    $data['title'] = 'Error!';
                    $data['msg'] = '<span style="color: red">'. $check_arr['msg']. '</span>';
                }
                
                $this->load->view('stat_view', $data);
            }
            
        $this->load->view('template/footer');
    }
    
    public function send_msg() {
        $this->load->view('template/header');
        $this->load->view('stat_view', array('title' => 'Not Done', 'msg' => 'Not done with this yet...'));
        $this->load->view('template/footer');
    }
    
    public function login() {
        $this->load->view('template/header');
        $this->load->view('stat_view', array('title' => 'Not Done', 'msg' => 'Not done with this yet...'));
        $this->load->view('template/footer');
    }
    
    public function confirm_reg() {
        $verifystr = $this->uri->segment(3, 0);
        $this->User_model->get_user_to_reg($verifystr);
        $data['msg'] = '';
        $this->load->view('template/header', array('logged' => FALSE));
        $data['title'] = 'Thank you!';
        $data['msg'] = 'Your registration was entered, but is not approved yet. The web admin will contact you.
                                    Thank you!<br><br>';
        $this->load->view('stat_view', $data);
        $this->load->view('template/footer');
    }
}