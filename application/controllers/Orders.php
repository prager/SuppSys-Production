<?php

class Orders extends CI_Controller {

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
            $this->load->view('mngr/orders_view', $this->Orders_model->get_orders($this->num_rec, $pg_no, 0));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('login/logout', 'click here');
            $this->load->view('stat_view', $data);
        }

        $this->load->view('template/footer');
    }

    public function edit_order() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $this->load->view('mngr/edit_order_view', $this->Orders_model->get_order($this->uri->segment(3, 0)));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function!';
            $this->load->view('stat_view', $data);
        }
        $this->load->view('template/footer');
    }

    public function load_order() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $id = $this->uri->segment(3, 0);
            $desc = str_replace(',', ' ', $this->input->post('desc'));
            $remarks = str_replace(',', ' ', $this->input->post('remarks'));
            $param['description'] = $this->Orders_model->encr_decr($desc, TRUE, FALSE);
            $param['order_date'] = strtotime($this->input->post('order_date'));
            $param['date_received'] = strtotime($this->input->post('received_date'));
            $param['price'] = $this->input->post('price');
            $param['qty'] = $this->input->post('qty');
            $param['part_no'] = $this->input->post('part_no');
            $param['supp_part_no'] = $this->input->post('supp_part_no');
            $param['supplier'] = $this->Orders_model->encr_decr($this->input->post('supplier'), TRUE, FALSE);
            $param['doc_no'] = $this->input->post('doc_no');
            $param['invoice_no'] = $this->input->post('inv_no');
            $param['remarks'] = $remarks;
            $param['url'] = $this->input->post('url');
            if($this->input->post('purch') == 'fedmall') {
              $param['type'] = 0;
            }
            else {
              $param['type'] = 1;
            }

            $this->Orders_model->load_order($id, $param);

            $this->load->view('mngr/orders_view', $this->Orders_model->get_orders($this->num_rec, 1, 0));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function!';
            $this->load->view('stat_view', $data);
        }
        $this->load->view('template/footer');
    }

    public function delete_order() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $this->Orders_model->delete_order($this->uri->segment(3, 0));
            $this->load->view('mngr/orders_view', $this->Orders_model->get_orders($this->num_rec, 1, 0));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function!';
            $this->load->view('stat_view', $data);
        }
        $this->load->view('template/footer');
    }

    public function download_orders() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $this->Files_model->download_pub('././assets/files/orders.csv');
            $this->load->view('mngr/orders_view', $this->Orders_model->get_orders($this->num_rec, 1, 0));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function!';
            $this->load->view('stat_view', $data);
        }
        $this->load->view('template/footer');
    }

    public function download_fed() {
        if($this->check_mngr()) {
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $this->Orders_model->get_fedmall($this->num_rec, 1, 0);
            $this->Files_model->download_pub('././assets/files/fedmall.csv');
            $this->load->view('mngr/orders_view', $this->Orders_model->get_orders($this->num_rec, 1, 0));
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
      if($this->check_mngr()) {
          $pg_no = $this->uri->segment(2, 0);
          if($pg_no == 0) {
              $pg_no = 1;
          }
          $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
          $data['user'] = $this->User_model->get_cur_user($this->Login_model->get_cur_user_id());
          $this->load->view('mngr/orders_view', $this->Orders_model->get_fedmall($this->num_rec, $pg_no, 0));
      }
      else {
          $this->load->view('template/header');
          $data['title'] = 'Error!';
          $data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('login/logout', 'click here');
          $this->load->view('stat_view', $data);
      }

      $this->load->view('template/footer');
    }

    public function gpc() {
      echo "in gpc!<br>";
      echo anchor('public_ctl', 'Back to Home');

    }

    public function open() {

        if($this->check_mngr()) {
            $pg_no = $this->uri->segment(2, 0);
            if($pg_no == 0) {
                $pg_no = 1;
            }
            $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
            $data['user'] = $this->User_model->get_cur_user($this->Login_model->get_cur_user_id());
            $this->load->view('mngr/orders_view', $this->Orders_model->get_open($this->num_rec, $pg_no, 0));
        }
        else {
            $this->load->view('template/header');
            $data['title'] = 'Error!';
            $data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('login/logout', 'click here');
            $this->load->view('stat_view', $data);
        }

        $this->load->view('template/footer');

    }

    public function received() {
      if($this->check_mngr()) {
          $pg_no = $this->uri->segment(2, 0);
          if($pg_no == 0) {
              $pg_no = 1;
          }
          $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
          $data['user'] = $this->User_model->get_cur_user($this->Login_model->get_cur_user_id());
          $this->load->view('mngr/orders_view', $this->Orders_model->get_received($this->num_rec, $pg_no, 0));
      }
      else {
          $this->load->view('template/header');
          $data['title'] = 'Error!';
          $data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('login/logout', 'click here');
          $this->load->view('stat_view', $data);
      }

      $this->load->view('template/footer');

    }

    public function load_received() {
      if($this->check_mngr()) {
          $this->load->view('template/header_mngr', array('logged' => $this->Login_model->is_logged()['logged']));
          $received = $this->Orders_model->get_received($this->num_rec, 1, 0);
          $this->Files_model->download_pub('././assets/files/received.csv');
          $this->load->view('mngr/orders_view', $received);
      }
      else {
          $this->load->view('template/header');
          $data['title'] = 'Error!';
          $data['msg'] = 'You have to be logged in to perform this function!';
          $this->load->view('stat_view', $data);
      }
      $this->load->view('template/footer');
    }
}
