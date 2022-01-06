<?php
class Orders_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_orders($num_rec, $pg_no, $flag) {
	    $offset = ($pg_no -1) * $num_rec;
	    $this->db->select('*');
	    $this->db->order_by('order_date', 'ASC');
	    $q = $this->db->get('orders')->result();
	    $orders = array();
	    $fstr = "Seq #,Item #,Part #,Supp Part #,Desc,Vendor,Ord Date,Rec Date,Doc #,Order #,Qty,Price,Total,Remark,Type\n";
	    //$fstr = '';
	    $i = 0;
	    foreach ($q as $item) {
	        if($item->date_received == 0) {
	            $date_rec = '';
	        }
	        else {
	            $date_rec = date('m/d/Y', $item->date_received);
	        }
	        $item_arr = array(
	            'id_orders' => $item->id_orders,
	            'part_no' => $item->part_no,
	            'supp_part_no' => $item->supp_part_no,
	            'desc' => $this->encr_decr($item->description, FALSE, TRUE),
	            'supplier' => $this->encr_decr($item->supplier, FALSE, TRUE),
	            'order_date' => date('m/d/Y', $item->order_date),
	            'date_received' => $date_rec,
	            'doc_no' => $item->doc_no,
	            'invoice_no' => $item->invoice_no,
	            'qty' => $item->qty,
	            'price' => $item->price,
	            'remarks' => $item->remarks,
	            'url' => $item->url,
							'type' => $item->type
	        );
	        $i++;
	        $fstr .= $i . "," .$item_arr['id_orders'] . "," .  $item_arr['part_no'] . "," . $item_arr['supp_part_no'] . "," . $item_arr['desc'] .
	        "," . $item_arr['supplier'] . "," . $item_arr['order_date'] ."," .  $item_arr['date_received'] .
	        "," . $item_arr['doc_no'] ."," .  $item_arr['invoice_no'] ."," .  $item_arr['qty'] ."," .
	        $item_arr['price'] ."," .  ($item_arr['price'] * $item_arr['qty']) ."," .  $item_arr['remarks'] ."," .  $item_arr['type'] . "\n";
	        array_push($orders, $item_arr);
	    }

	    file_put_contents('././assets/files/orders.csv', $fstr);
	    //file_put_contents('/var/www/html/supply/assets/files/orders.csv', $fstr);
	    //file_put_contents('/kunden/homepages/36/d117019790/htdocs/supp/assets/files/orders.csv', $fstr);

	    //https://www.php.net/manual/en/function.array-multisort.php
	    array_multisort (array_column($orders, 'desc'), SORT_ASC, $orders);
	    $retarr = array();

	    //pagination: https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
	    $retarr['no_pages'] = ceil(count($orders) / $num_rec);
	    $retarr['pg'] = $pg_no;
	    //echo 'offset: ' . $offset;
	    //if($pg_no != 99) {
	    $orders = array_slice($orders, $offset, $num_rec);
	    //}

	    $retarr['orders'] = $orders;
	    return $retarr;
	}

	public function get_order($id) {
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

	public function load_order($id, $param) {
	    $chr = substr($param['price'], 0, 1);
	    if (!(is_numeric($chr))){
	        $param['price'] = substr($param['price'], 1, (strlen($param['price']) - 1));
	        $param['price'] = str_replace(',', '', $param['price']);
	    }
	    if($id == 0) {
	        $this->db->insert('orders', $param);
	    }
	    else {
	        $this->db->where('id_orders', $id);
	        $this->db->update('orders', $param);
	    }
	}

	public function delete_order($id) {
	    $this->db->where('id_orders', $id);
	    $this->db->delete('orders');
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

	/*public function get_received($num_rec, $pg_no, $flag) {
		$offset = ($pg_no -1) * $num_rec;
		$this->db->select('*');
		$this->db->order_by('date', 'DESC');
		$q = $this->db->get('received')->result();
		$received = array();
		$fstr = "Seq #,Item ID #,Description,Vendor,Date,Qty,Price,Total,Remark,Type\n";
		//$fstr = '';
		$i = 0;
		foreach ($q as $item) {
				$item_arr = array(
						'id_received' => $item->id_received,
						'item_id' => $item->item_id,
						'desc' => $this->encr_decr($item->description, FALSE, TRUE),
						'vendor' => $this->encr_decr($item->vendor, FALSE, TRUE),
						'date' => date('m/d/Y', $item->date),
						'qty' => $item->qty,
						'price' => $item->price,
						'remark' => $item->remark,
						'type' => $item->type
				);
				$i++;
				$fstr .= $i . "," .$item_arr['id_received'] . "," .  $item_arr['item_id'] . ","  . $item_arr['desc'] .
				"," . $item_arr['vendor'] . "," . $item_arr['date'] ."," .  $item_arr['qty'] ."," .
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
	}*/

	public function get_fedmall($num_rec, $pg_no, $flag) {
		$offset = ($pg_no -1) * $num_rec;
		$this->db->select('*');
		$this->db->where('type', 0);
		$this->db->order_by('order_date', 'ASC');
		$q = $this->db->get('orders')->result();
		$orders = array();
		$fstr = "Item #,Part #,Desc,Vendor,Ord Date,Rec Date,Doc #,Order #,Qty,Price,Total,Remark,Type\n";
		//$fstr = '';
		$i = 0;
		foreach ($q as $item) {
				if($item->date_received == 0) {
						$date_rec = '';
				}
				else {
						$date_rec = date('m/d/Y', $item->date_received);
				}
				$item_arr = array(
						'id_orders' => $item->id_orders,
						'part_no' => $item->part_no,
						'supp_part_no' => $item->supp_part_no,
						'desc' => $this->encr_decr($item->description, FALSE, TRUE),
						'supplier' => $this->encr_decr($item->supplier, FALSE, TRUE),
						'order_date' => date('m/d/Y', $item->order_date),
						'date_received' => $date_rec,
						'doc_no' => $item->doc_no,
						'invoice_no' => $item->invoice_no,
						'qty' => $item->qty,
						'price' => $item->price,
						'remarks' => $item->remarks,
						'url' => $item->url,
						'type' => $item->type
				);
				$i++;
				$fstr .= $item_arr['id_orders'] . "," .  $item_arr['part_no'] . "," .  $item_arr['desc'] .
				"," . $item_arr['supplier'] . "," . $item_arr['order_date'] ."," .  $item_arr['date_received'] .
				"," . $item_arr['doc_no'] ."," .  $item_arr['invoice_no'] ."," .  $item_arr['qty'] ."," .
				$item_arr['price'] ."," .  ($item_arr['price'] * $item_arr['qty']) ."," .  $item_arr['remarks'] ."," .  $item_arr['type'] . "\n";
				array_push($orders, $item_arr);
		}

		file_put_contents('././assets/files/fedmall.csv', $fstr);
		//file_put_contents('/var/www/html/supply/assets/files/orders.csv', $fstr);
		//file_put_contents('/kunden/homepages/36/d117019790/htdocs/supp/assets/files/orders.csv', $fstr);

		//https://www.php.net/manual/en/function.array-multisort.php
		array_multisort (array_column($orders, 'desc'), SORT_ASC, $orders);
		$retarr = array();

		//pagination: https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
		$retarr['no_pages'] = ceil(count($orders) / $num_rec);
		$retarr['pg'] = $pg_no;
		//echo 'offset: ' . $offset;
		//if($pg_no != 99) {
		$orders = array_slice($orders, $offset, $num_rec);
		//}

		$retarr['orders'] = $orders;
		return $retarr;
	}

	public function get_received($num_rec, $pg_no, $flag) {
		$offset = ($pg_no -1) * $num_rec;
		$this->db->select('*');
		$this->db->where('type', 0);
		$this->db->where('date_received >', 0);
		$this->db->order_by('order_date', 'ASC');
		$q = $this->db->get('orders')->result();
		$orders = array();
		$fstr = "Item #,Part #,Desc,Vendor,Ord Date,Rec Date,Doc #,Order #,Qty,Price,Total,Remark,Type\n";
		//$fstr = '';
		$i = 0;
		foreach ($q as $item) {
				if($item->date_received == 0) {
						$date_rec = '';
				}
				else {
						$date_rec = date('m/d/Y', $item->date_received);
				}
				$item_arr = array(
						'id_orders' => $item->id_orders,
						'part_no' => $item->part_no,
						'supp_part_no' => $item->supp_part_no,
						'desc' => $this->encr_decr($item->description, FALSE, TRUE),
						'supplier' => $this->encr_decr($item->supplier, FALSE, TRUE),
						'order_date' => date('m/d/Y', $item->order_date),
						'date_received' => $date_rec,
						'doc_no' => $item->doc_no,
						'invoice_no' => $item->invoice_no,
						'qty' => $item->qty,
						'price' => $item->price,
						'remarks' => $item->remarks,
						'url' => $item->url,
						'type' => $item->type
				);
				$i++;
				$fstr .= $item_arr['id_orders'] . "," .  $item_arr['part_no'] . "," .  $item_arr['desc'] .
				"," . $item_arr['supplier'] . "," . $item_arr['order_date'] ."," .  $item_arr['date_received'] .
				"," . $item_arr['doc_no'] ."," .  $item_arr['invoice_no'] ."," .  $item_arr['qty'] ."," .
				$item_arr['price'] ."," .  ($item_arr['price'] * $item_arr['qty']) ."," .  $item_arr['remarks'] ."," .  $item_arr['type'] . "\n";
				array_push($orders, $item_arr);
		}

		file_put_contents('././assets/files/fedmall.csv', $fstr);
		//file_put_contents('/var/www/html/supply/assets/files/orders.csv', $fstr);
		//file_put_contents('/kunden/homepages/36/d117019790/htdocs/supp/assets/files/orders.csv', $fstr);

		//https://www.php.net/manual/en/function.array-multisort.php
		array_multisort (array_column($orders, 'desc'), SORT_ASC, $orders);
		$retarr = array();

		//pagination: https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
		$retarr['no_pages'] = ceil(count($orders) / $num_rec);
		$retarr['pg'] = $pg_no;
		//echo 'offset: ' . $offset;
		//if($pg_no != 99) {
		$orders = array_slice($orders, $offset, $num_rec);
		//}

		$retarr['orders'] = $orders;
		return $retarr;
	}

	public function get_open($num_rec, $pg_no, $flag) {
		$offset = ($pg_no -1) * $num_rec;
		$this->db->select('*');
		$this->db->where('type', 0);
		$this->db->where('date_received', 0);
		$this->db->order_by('order_date', 'ASC');
		$q = $this->db->get('orders')->result();
		$orders = array();
		$fstr = "Item #,Part #,Desc,Vendor,Ord Date,Rec Date,Doc #,Order #,Qty,Price,Total,Remark,Type\n";
		//$fstr = '';
		$i = 0;
		foreach ($q as $item) {
				if($item->date_received == 0) {
						$date_rec = '';
				}
				else {
						$date_rec = date('m/d/Y', $item->date_received);
				}
				$item_arr = array(
						'id_orders' => $item->id_orders,
						'part_no' => $item->part_no,
						'supp_part_no' => $item->supp_part_no,
						'desc' => $this->encr_decr($item->description, FALSE, TRUE),
						'supplier' => $this->encr_decr($item->supplier, FALSE, TRUE),
						'order_date' => date('m/d/Y', $item->order_date),
						'date_received' => $date_rec,
						'doc_no' => $item->doc_no,
						'invoice_no' => $item->invoice_no,
						'qty' => $item->qty,
						'price' => $item->price,
						'remarks' => $item->remarks,
						'url' => $item->url,
						'type' => $item->type
				);
				$i++;
				$fstr .= $item_arr['id_orders'] . "," .  $item_arr['part_no'] . "," .  $item_arr['desc'] .
				"," . $item_arr['supplier'] . "," . $item_arr['order_date'] ."," .  $item_arr['date_received'] .
				"," . $item_arr['doc_no'] ."," .  $item_arr['invoice_no'] ."," .  $item_arr['qty'] ."," .
				$item_arr['price'] ."," .  ($item_arr['price'] * $item_arr['qty']) ."," .  $item_arr['remarks'] ."," .  $item_arr['type'] . "\n";
				array_push($orders, $item_arr);
		}

		file_put_contents('././assets/files/fedmall.csv', $fstr);
		//file_put_contents('/var/www/html/supply/assets/files/orders.csv', $fstr);
		//file_put_contents('/kunden/homepages/36/d117019790/htdocs/supp/assets/files/orders.csv', $fstr);

		//https://www.php.net/manual/en/function.array-multisort.php
		array_multisort (array_column($orders, 'desc'), SORT_ASC, $orders);
		$retarr = array();

		//pagination: https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
		$retarr['no_pages'] = ceil(count($orders) / $num_rec);
		$retarr['pg'] = $pg_no;
		//echo 'offset: ' . $offset;
		//if($pg_no != 99) {
		$orders = array_slice($orders, $offset, $num_rec);
		//}

		$retarr['orders'] = $orders;
		return $retarr;
	}

}
