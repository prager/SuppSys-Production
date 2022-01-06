<?php

class Received extends CI_Controller {

    var $num_rec;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Los_Angeles");
        $this->num_rec = 150;
    }

    public function index() {
        if($this->check_mngr()) {
            $pg_no = $this->uri->segment(2, 0);
            if($pg_no == 0) {
                $pg_no = 1;
            }
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $data['user'] = $this->User_model->get_cur_user($this->Login_model->get_cur_user_id());
            //echo 'OK!<br>';
            //echo anchor('public_ctl', 'Go back home');
            $this->load->view('mngr/received_view', $this->Received_model->get_received($this->num_rec, $pg_no, 0));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('login/logout', 'click here');
            $this->load->view('stat_view', $data);
        }

        $this->load->view('template/footer');
    }

    public function edit_received() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $this->load->view('mngr/edit_received_view', $this->Received_model->get_rec($this->uri->segment(3, 0)));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function!';
            $this->load->view('stat_view', $data);
        }
        $this->load->view('template/footer');
    }

    public function load_received() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $id = $this->uri->segment(3, 0);
            $desc = str_replace(',', ' ', $this->input->post('desc'));
            $remark = str_replace(',', ' ', $this->input->post('remark'));
            $param['description'] = $this->Received_model->encr_decr($desc, TRUE, FALSE);
            $param['date'] = strtotime($this->input->post('date'));
            $param['price'] = $this->input->post('price');
            $param['qty'] = $this->input->post('qty');
            $param['item_id'] = $this->input->post('item_no');
            $param['vendor'] = $this->Received_model->encr_decr($this->input->post('vendor'), TRUE, FALSE);
            $param['remark'] = $remark;
            $param['shipped_from'] = $this->input->post('shipped_from');
            if($this->input->post('purch') == 'fedmall') {
              $param['type'] = 'fedmall';
            }
            else {
              $param['type'] = 'gpc';
            }

            $this->Received_model->load_received($id, $param);

            $this->load->view('mngr/received_view', $this->Received_model->get_received($this->num_rec, 1, 0));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function!';
            $this->load->view('stat_view', $data);
        }
        $this->load->view('template/footer');
    }

    public function delete_received() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $this->Received_model->delete_received($this->uri->segment(3, 0));
            $this->load->view('mngr/received_view', $this->Received_model->get_received($this->num_rec, 1, 0));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function!';
            $this->load->view('stat_view', $data);
        }
        $this->load->view('template/footer');
    }

    public function download_received() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $this->Files_model->download_pub('././assets/files/received.csv');
            $this->load->view('mngr/received_view', $this->Received_model->get_received($this->num_rec, 1, 0));
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

    public function fedmall() {
      echo "in works!<br>";
      echo anchor('public_ctl', 'Back to Home');
    }

    public function gpc() {
      echo "in gpc!<br>";
      echo anchor('public_ctl', 'Back to Home');

    }

    public function open() {
      echo "in open!<br>";
      echo anchor('public_ctl', 'Back to Home');

    }

    public function closed() {
      echo "in closed!<br>";
      echo anchor('public_ctl', 'Back to Home');

    }
}
