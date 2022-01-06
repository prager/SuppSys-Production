<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    var $num_rec;
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Los_Angeles");
        $this->num_rec = 50;
    }
    
	public function index() {
	    $this->turn_in();
	}
	
	public function turn_in() {
	    if($this->check_mngr()) {
	        $pg_no = $this->uri->segment(3, 0);
	        if($pg_no == 0) {
	            $pg_no = 1;
	        }
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->load->view('stock/turnin_view', $this->Stock_model->get_turn_ins($this->num_rec, $pg_no));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}
	
	public function download_turnins() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->Files_model->download_pub('././assets/files/gear/turnin.csv');
	        $this->load->view('stock/turnin_view', $this->Stock_model->get_turn_ins($this->num_rec, $pg_no = 1));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}
	
	private function check_mngr() {
	    if($this->Login_model->get_cur_user()['level'] == 99) {
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }
	}
}
