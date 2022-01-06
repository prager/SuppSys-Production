<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mngr extends CI_Controller {

    var $desc;
    var $num_rec;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Los_Angeles");
        $this->num_rec = 500;
    }

	public function index() {
	    if($this->check_mngr()) {
	        $pg_no = $this->uri->segment(2, 0);
	        if($pg_no == 0) {
	            $pg_no = 1;
	        }
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $data['user'] = $this->User_model->get_cur_user($this->Login_model->get_cur_user_id());
	        $this->load->view('mngr/mngr_view', $this->Mngr_model->get_gear($this->num_rec, $pg_no));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('login/logout', 'click here');
	        $this->load->view('stat_view', $data);
	    }

	    $this->load->view('template/footer');
	}

	public function edit_gear() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $id = $this->uri->segment(3, 0);
	        if($id == 0) {
        	    $data['types'] = $this->Mngr_model->get_gear_types();
        	    $data['desc'] = '';
        	    $data['location'] ='';
        	    $data['id'] = 0;
        	    $data['qty'] = 1;
              $data['selected'] = 0;
              $data['sn'] = NULL;
              $data['size'] = NULL;
              $data['issued'] = NULL;
              $data['assg'] = NULL;
	        }
	        else {
	            $data = $this->Mngr_model->get_gear_item($id);
	        }

    	    $this->load->view('mngr/edit_gear_view', $data);
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function edit_member() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
    	    $this->load->view('mngr/edit_member_view', $this->Mngr_model->get_edit_mem_data($this->uri->segment(3, 0)));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function load_gear() {

	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
    	    $id = $this->uri->segment(3, 0);
    	    $param['description'] = str_replace(',', ' ', $this->input->post('desc'));
    	    $param['type'] = (int)$this->input->post('type') + 1;
    	    $param['location'] = $this->input->post('loc');
    	    $param['sn'] = $this->input->post('sn');
    	    $param['size'] = $this->input->post('size');
    	    $param['qty'] = $this->input->post('qty');
    	    $param['id'] = $id;
    	    $this->Mngr_model->load_gear($param);
    	    $this->load->view('mngr/mngr_view', $this->Mngr_model->get_gear($this->num_rec, $pg_no = 1));

	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function add_member() {

	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
    	    $this->form_validation->set_rules('member', 'LName', 'required|trim|callback_validate_member');

    	    if($this->form_validation->run()) {
    	        $data['title'] = 'Success!';
    	        $data['msg'] = 'Member was added!';
    	    }
    	    else {
        	    $data['title'] = 'Adding Member Failed';
        	    $data['msg'] = 'There was an error...';
    	    }
    	    $this->load->view('stat_view', $data);
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function show_members() {
	    if($this->check_mngr()) {
	        $pg_no = $this->uri->segment(3, 0);
	        if($pg_no == 0) {
	            $pg_no = 1;
	        }
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->load->view('mngr/show_members_view', $this->Mngr_model->get_members($this->num_rec, $pg_no));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function show_gear() {
	    if($this->check_mngr()) {
	        $pg_no = $this->uri->segment(3, 0);
	        if($pg_no == 0) {
	            $pg_no = 1;
	        }
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->load->view('mngr/mngr_view', $this->Mngr_model->get_gear($this->num_rec, $pg_no));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function validate_member() {
	    $retval = FALSE;

	    $data['lname'] = $this->input->post('lname');
	    $data['fname'] = $this->input->post('fname');
	    $data['action'] = $this->uri->segment(3, 0);
	    $id_gearset = $this->input->post('gearset');

	    if ($id_gearset == NULL) {
	        $data['gear'] = 0;
	    }
	    else {
	        $data['gear'] = $id_gearset;
	    }

	    if($this->Mngr_model->edit_member($data)) {
	        $retval = TRUE;
	    }

	    return $retval;
	}

	public function validate_gearset() {
	    $retval = FALSE;

	    $data['description'] = $this->input->post('description');
	    $data['action'] = $this->uri->segment(3, 0);

	    if($this->Mngr_model->edit_gearset($data)) {
	        $retval = TRUE;
	    }

	    return $retval;
	}

	public function load_member() {

	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
    	    $this->form_validation->set_rules('lname', 'Lname', 'required|trim|callback_validate_member');
    	    $this->form_validation->set_rules('fname', 'Fname', 'trim');

    	    if($this->form_validation->run()) {
    	        $pg_no = 1;
              //$id = $this->uri->segment(3, 0);
              //$param['fname'] = $this->input->post('fname');
        	    //$param['lname'] = $this->input->post('lname');
              //$param['action'] = $id;
            // $this->Mngr_model->edit_member($param);
    	        $this->load->view('mngr/show_members_view', $this->Mngr_model->get_members($this->num_rec, $pg_no));
    	    }
    	    else {
    	        $this->load->view('template/header_mngr', array('logged' => FALSE));
    	        $data['title'] = 'Error!';
    	        $data['msg'] = 'There was an error while loading member data.
                    Click here to go to home page ' . anchor('public_ctl', 'here'). '<br><br>';
    	        $this->load->view('stat_view', $data);
    	    }
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function show_gear_sets() {

	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
    	    $this->load->view('mngr/show_gearsets_view', $this->Mngr_model->get_gearsets());
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }

	    $this->load->view('template/footer');
	}

	public function edit_gearset() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $id = $this->uri->segment(3, 0);
	        $data['gear'] = $this->Mngr_model->get_all_gear()['gear'];
	        $data['gearset'] = $this->Mngr_model->get_gearset($id);
	        $this->load->view('mngr/edit_gearset_view', $data);
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');

	}

	public function add_gearset() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->form_validation->set_rules('gearset', 'Gearset', 'required|trim|callback_validate_gearset');

	        if($this->form_validation->run()) {
	            $data['title'] = 'Success!';
	            $data['msg'] = 'Gearset was added!';
	        }
	        else {
	            $data['title'] = 'Adding Gearset Failed';
	            $data['msg'] = 'There was an error...';
	        }
	        $this->load->view('stat_view', $data);
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');

	}

	public function load_gearset() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
    	    $param['id'] = $this->uri->segment(3, 0);
    	    $gear = $this->Mngr_model->get_all_gear()['all_gear'];
    	    $i = 0;
    	    $param['gear_set'] = '';
    	    foreach($gear as $item) {
    	        if($this->input->post('incl-'.$i) != '') {
    	            $param['gear_set'] .= $item['id_gear'].':';
    	        }
    	        $i++;
    	    }
    	    $param['gear_set'] = substr($param['gear_set'], 0, -1);
    	    $param['description'] = $this->input->post('desc');
    	    $this->Mngr_model->edit_gearset($param);
    	    $this->load->view('mngr/show_gearsets_view', $this->Mngr_model->get_gearsets());
	    }
	    else {

	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	}

	public function delete_gearset() {
	    if($this->check_mngr()) {
	        $id = $this->uri->segment(3, 0);
	        $this->Mngr_model->delete_gearset($id);
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->load->view('mngr/show_gearsets_view', $this->Mngr_model->get_gearsets());
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function delete_gear() {
	    if($this->check_mngr()) {
	        $id = $this->uri->segment(3, 0);
	        $this->Mngr_model->delete_gear($id);
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->load->view('mngr/show_gear_view', $this->Mngr_model->get_gear($this->num_rec, $pg_no = 1));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function delete_member() {
	    if($this->check_mngr()) {
    	    $id = $this->uri->segment(3, 0);
    	    $this->Mngr_model->delete_member($id);
    	    $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
    	    $pg_no = 1;
    	    $this->load->view('mngr/show_members_view', $this->Mngr_model->get_members($this->num_rec, $pg_no));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function show_gearset_det() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->load->view('mngr/gearset_det_view', $this->Mngr_model->get_gearset_det($this->uri->segment(3, 0)));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function unassign_gearset() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->Mngr_model->unassign_gearset($this->uri->segment(3, 0), $this->uri->segment(4, 0));
	        $this->load->view('mngr/edit_member_view', $this->Mngr_model->get_edit_mem_data($this->uri->segment(4, 0)));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function update_gearset() {

	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));

	        $param['id'] = $this->uri->segment(3, 0);

	        $gear = $this->Mngr_model->get_gearset_det( $param['id'])['all_gear'];
	        $i = 0;
	        $param['gear_set'] = '';
	        $flag = FALSE;
	        foreach($gear as $item) {
	            if($this->input->post('incl-'.$i) != '') {
	                $param['gear_set'] .= $item['id'] . ':';
	                $flag = TRUE;
	            }
	            $i++;
	        }
	        if($flag) {
	            $param['description'] = $this->input->post('desc');
	            $param['gear_set'] = substr($param['gear_set'], 0, -1);
	            $this->Mngr_model->update_gearset($param);
	        }
	        else {
	            $id = $param['id'];
	            $desc = $this->input->post('desc');
	            $this->Mngr_model->update_gs_desc($id, $desc);
	        }
	        $param['flag'] = $flag;
	        $this->load->view('mngr/gearset_det_view', $this->Mngr_model->get_gearset_det($param['id']));

	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function remove_item() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $param['id_gear_sets'] = $this->uri->segment(3, 0);
    	    $param['id_gear'] = $this->uri->segment(4, 0);
    	    $this->Mngr_model->remove_item($param);
    	    $this->load->view('mngr/gearset_det_view', $this->Mngr_model->get_gearset_det($param['id_gear_sets']));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	}

	public function copy_gearset() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        //$id = $this->uri->segment(3, 0);
	        $this->load->view('mngr/gearset_det_view',
	            $this->Mngr_model->get_gearset_det($this->Mngr_model->copy_gearset($this->uri->segment(3, 0))));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	}

	public function download_item() {
	    if($this->check_mngr()) {
          $id = $this->uri->segment(3, 0);
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
          $data = $this->Mngr_model->get_gear_item($id);
	        $this->Files_model->download_pub('././assets/files/gear/item.csv');
	        $this->load->view('mngr/edit_gear_view', $data);
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function download_gear() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->Files_model->download_pub('././assets/files/gear/gear.csv');
	        $this->load->view('mngr/show_gear_view', $this->Mngr_model->get_gear($this->num_rec, $pg_no = 1));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function download_boat_gear() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
          $boat_gear = $this->Mngr_model->get_boat_gear($this->num_rec, $pg_no = 1);
	        $this->Files_model->download_pub('././assets/files/gear/boat-gear.csv');
	        $this->load->view('mngr/show_gear_view', $boat_gear);
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function download_other_gear() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
          $boat_gear = $this->Mngr_model->get_other_gear($this->num_rec, $pg_no = 1);
	        $this->Files_model->download_pub('././assets/files/gear/other-gear.csv');
	        $this->load->view('mngr/show_gear_view', $boat_gear);
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function download_all_gear() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
          $all_gear = $this->Mngr_model->download_all_gear($this->num_rec, $pg_no = 1);
	        $this->Files_model->download_pub('././assets/files/gear/all-gear.csv');
	        $this->load->view('mngr/show_gear_view', $all_gear);
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function download_assigned_gear() {
	    if($this->check_mngr()) {
	       $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	       $id = $this->uri->segment(3, 0);
	       $fpath = $this->Mngr_model->download_assigned_gear($id);
	       $this->Files_model->download_pub($fpath);
	       $this->load->view('mngr/edit_member_view', $this->Mngr_model->get_edit_mem_data($id));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function download_all_data() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->Mngr_model->download_all_data();
	        //$this->Files_model->download_pub('././assets/files/gear/gear.zip');
	        $this->load->view('mngr/show_gear_view', $this->Mngr_model->get_gear($this->num_rec, $pg_no = 1));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function download_zip() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        shell_exec('././assets/files/gear/gear.sh');
	        $this->Files_model->download_pub('././assets/files/gear/gear.zip');
	        $this->load->view('mngr/show_gear_view', $this->Mngr_model->get_gear($this->num_rec, $pg_no = 1));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

	public function download_members() {
	    if($this->check_mngr()) {
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->Files_model->download_pub('././assets/files/members.csv');
	        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
	        $this->load->view('mngr/show_members_view', $this->Mngr_model->get_members($this->num_rec, 1));
	    }
	    else {
	        $this->load->view('template/header');
	        $data['title'] = 'Error!';
	        $data['msg'] = 'You have to be logged in to perform this function!';
	        $this->load->view('stat_view', $data);
	    }
	    $this->load->view('template/footer');
	}

  public function get_boat_gear() {
    if($this->check_mngr()) {
        $pg_no = $this->uri->segment(2, 0);
        if($pg_no == 0) {
            $pg_no = 1;
        }
        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
        $data['user'] = $this->User_model->get_cur_user($this->Login_model->get_cur_user_id());
        $this->load->view('mngr/mngr_view', $this->Mngr_model->get_boat_gear($this->num_rec, $pg_no));
    }
    else {
        $this->load->view('template/header');
        $data['title'] = 'Error!';
        $data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('login/logout', 'click here');
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

  public function get_other_gear() {
    if($this->check_mngr()) {
        $pg_no = $this->uri->segment(2, 0);
        if($pg_no == 0) {
            $pg_no = 1;
        }
        $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
        $data['user'] = $this->User_model->get_cur_user($this->Login_model->get_cur_user_id());
        $this->load->view('mngr/mngr_view', $this->Mngr_model->get_other_gear($this->num_rec, $pg_no));
    }
    else {
        $this->load->view('template/header');
        $data['title'] = 'Error!';
        $data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('login/logout', 'click here');
        $this->load->view('stat_view', $data);
    }

    $this->load->view('template/footer');
  }

}
