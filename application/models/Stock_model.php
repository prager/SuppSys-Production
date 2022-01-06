<?php
class Stock_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function get_turn_ins($num_rec, $pg_no) {
	    //$pg_no = 3;
	    $offset = ($pg_no -1) * $num_rec;
	    $this->db->select('*');
	    $this->db->where('type', 3);
	    $this->db->order_by('description', 'ASC');
	    $q = $this->db->get('gear')->result();
	    $gear = array();
	    $fstr = "Seq #,Item #,Description,Qty,Location\n";
	    $i = 0;
	    foreach ($q as $item) {
	        $item_arr = array(
	            'id_gear' => $item->id_gear,
	            'id_gear_set' => $item->id_gear_set,
	            'desc' => $this->Mngr_model->encr_decr($item->description, FALSE, TRUE),
	            'type' => $item->type,
	            'qty' => $item->qty,
	            'location' => $item->location
	        );	        
	        $i++;
	        $fstr .= $i . "," . $item_arr['id_gear'] . "," . $item_arr['desc'] . "," . $item->qty . "," . $item->location . "\n";
	        array_push($gear, $item_arr);
	    }
	    
	    file_put_contents('././assets/files/gear/turnin.csv', $fstr);
	    //file_put_contents('/kunden/homepages/36/d117019790/htdocs/supp/assets/files/gear.txt', $fstr);
	    
	    //https://www.php.net/manual/en/function.array-multisort.php
	    array_multisort (array_column($gear, 'desc'), SORT_ASC, $gear);
	    $retarr = array();
	    
	    //pagination: https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
	    $retarr['no_pages'] = ceil(count($gear) / $num_rec);
	    $retarr['pg'] = $pg_no;
	    //echo 'offset: ' . $offset;
	    //if($pg_no != 99) {
	    $gear = array_slice($gear, $offset, $num_rec);
	    //}
	    
	    $retarr['gear'] = $gear;
	    return $retarr;
	    }
}