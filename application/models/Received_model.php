<?php
class Received_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_pack_slip($id) {
	//needs to be modified - this is leftover from Orders_model
	    if($id == 0) {
	        $order = array(
	        'id' => 0,
	        'supp' => '',
	        'desc' => '',
	        'part_no' => '',
	        'supp_part_no' => '',
	        'qty' => 1,
	        'received_date' => 0,
	        'order_date' => date("Y-m-d", time()),
	        'doc_no' => '',
	        'inv_no' => '',
	        'price' => '$0.00',
	        'remarks' => '',
	        'total' => 0,
	        'url' => '',
					'type' => '0'
	       );
	    }
	    else {
	        setlocale(LC_MONETARY, 'en_US.UTF-8');
	        $this->db->select('*');
	        $this->db->where('id_orders', $id);
	        $item = $this->db->get('orders')->row();
            $order = array(
                'id' => $item->id_orders,
                'part_no' => $item->part_no,
                'supp_part_no' => $item->supp_part_no,
                'desc' => $this->encr_decr($item->description, FALSE, TRUE),
                'supp' => $this->encr_decr($item->supplier, FALSE, TRUE),
                'order_date' => date("Y-m-d", $item->order_date),
                'doc_no' => $item->doc_no,
                'inv_no' => $item->invoice_no,
                'qty' => $item->qty,
                //'price' => '$' . round($item->price, 2),
                'price' => money_format('%.2n', $item->price),
                'remarks' => $item->remarks,
                'url' => $item->url,
								'type' => $item->type
            );
            if($item->date_received == 0){
                $order['received_date'] = 0;
            }
            else {
                $order['received_date'] = date("Y-m-d", $item->date_received);
            }
	    }
	    return $order;
	}

	public function load_received($id, $param) {
	//this is leftover from Orders_model
	    $chr = substr($param['price'], 0, 1);
	    if (!(is_numeric($chr))){
	        $param['price'] = substr($param['price'], 1, (strlen($param['price']) - 1));
	        $param['price'] = str_replace(',', '', $param['price']);
	    }
	    if($id == 0) {
	        $this->db->insert('received', $param);
	    }
	    else {
	        $this->db->where('id_received', $id);
	        $this->db->update('received', $param);
	    }
	}

	public function delete_received($id) {
	    $this->db->where('id_received', $id);
	    $this->db->delete('received');
	}

	/**
	 * Reference: https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-a-php-string/
	 * @param string $str_cr
	 * @param bool $encr
	 * @param bool $decr
	 * @return NULL|string
	 */
	public function encr_decr($str_cr, $encr, $decr) {
	    $retval = NULL;

	    $ciphering = "AES-256-CBC";
	    $iv_length = openssl_cipher_iv_length($ciphering);
	    $options = 0;
	    $iv = '1234567891011121';

	    if (session_status() !== PHP_SESSION_ACTIVE) {
	        session_start();
	    }

	    $key = $_SESSION['key'];

	    if($encr == TRUE){
	        $retval = openssl_encrypt($str_cr, $ciphering,
	            $key, $options, $iv);
	    }
	    elseif($decr == TRUE) {
	        $retval = openssl_decrypt ($str_cr, $ciphering,
	            $key, $options, $iv);
	    }

	    return $retval;
	}

	public function get_received($num_rec, $pg_no, $flag) {
		$offset = ($pg_no -1) * $num_rec;
		$this->db->select('*');
		$this->db->order_by('date', 'DESC');
		$q = $this->db->get('received')->result();
		$received = array();
		$fstr = "Seq #,ID Received,Item ID,Description,Vendor,Location,Date,Qty,Price,Total,Remark,Type\n";
		//$fstr = '';
		$i = 0;
		foreach ($q as $item) {
				$item_arr = array(
						'id_received' => $item->id_received,
						'item_id' => $item->item_id,
						'desc' => $this->encr_decr($item->description, FALSE, TRUE),
						'vendor' => $this->encr_decr($item->vendor, FALSE, TRUE),
						'date' => date('m/d/Y', $item->date),
						'shipped_from' => str_replace(':', ' ', $item->shipped_from),
						'qty' => $item->qty,
						'price' => $item->price,
						'remark' => $item->remark,
						'type' => $item->type
				);
				$i++;
				$fstr .= $i . "," .$item_arr['id_received'] . "," .  $item_arr['item_id'] . ","  . $item_arr['desc'] .
				"," . $item_arr['vendor'] . "," . $item_arr['shipped_from'] . "," . $item_arr['date'] ."," .  $item_arr['qty'] ."," .
				$item_arr['price'] ."," .  ($item_arr['price'] * $item_arr['qty']) ."," .  $item_arr['remark'] ."," .  $item_arr['type'] . "\n";
				array_push($received, $item_arr);
		}

		file_put_contents('././assets/files/received.csv', $fstr);
		//file_put_contents('/var/www/html/supply/assets/files/orders.csv', $fstr);
		//file_put_contents('/kunden/homepages/36/d117019790/htdocs/supp/assets/files/orders.csv', $fstr);

		//https://www.php.net/manual/en/function.array-multisort.php
		array_multisort (array_column($received, 'date'), SORT_DESC, $received);
		$retarr = array();

		//pagination: https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
		$retarr['no_pages'] = ceil(count($received) / $num_rec);
		$retarr['pg'] = $pg_no;
		//echo 'offset: ' . $offset;
		//if($pg_no != 99) {
		$received = array_slice($received, $offset, $num_rec);
		//}

		$retarr['received'] = $received;
		return $retarr;
	}

	public function get_rec($id) {
	/* FIX THIS !!! */
	    if($id == 0) {
	        $received = array(
	        'id_received' => 0,
	        'item_id' => '',
	        'desc' => '',
	        'item_id' => '',
	        'qty' => 1,
	        'date' => date("Y-m-d", time()),
	        'vendor' => '',
	        'type' => '',
	        'price' => '$0.00',
	        'remark' => '',
					'shipped_from' => ''
	       );
	    }
	    else {
	        setlocale(LC_MONETARY, 'en_US.UTF-8');
	        $this->db->select('*');
	        $this->db->where('id_received', $id);
	        $item = $this->db->get('received')->row();
            $received = array(
                'id_received' => $item->id_received,
                'item_id' => $item->item_id,
                'desc' => $this->encr_decr($item->description, FALSE, TRUE),
                'vendor' => $this->encr_decr($item->vendor, FALSE, TRUE),
                'date' => date("Y-m-d", $item->date),
                'shipped_from' => $item->shipped_from,
                'type' => $item->type,
                'qty' => $item->qty,
                //'price' => '$' . round($item->price, 2),
                'price' => money_format('%.2n', $item->price),
                'remark' => $item->remark
            );
            if($item->date == 0){
                $received['date'] = 0;
            }
            else {
                $received['date'] = date("Y-m-d", $item->date);
            }
	    }
	    return $received;
	}

}
