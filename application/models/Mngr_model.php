<?php
class Mngr_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_gear_types() {
        $this->db->select('*');
        $q = $this->db->get('gear_types')->result();
        $types = array();
        foreach($q as $item) {
            array_push($types, $item->description);
        }

        return $types;
    }

    public function load_gear($param) {
        //echo 'type: ' . $param['type'];
        $id = $param['id'];
        unset($param['id']);
        $param['description'] = $this->encr_decr($param['description'], TRUE, FALSE);
        if($id == 0) {
            $this->db->insert('gear', array('description' => $param['description'], 'size' => $param['size'],
                'location' => $param['location'], 'qty' => $param['qty'], 'sn' => $param['sn'],
                'type' => $param['type']
            ));
        }
        else {
            $this->db->where('id_gear', $id);
            $this->db->update('gear', $param);
        }
    }

    public function edit_gearset($param) {
        $id = $param['id'];
        unset($param['id']);
        //echo print_r($param);
        $param['description'] = $this->encr_decr($param['description'], TRUE, FALSE);
        if($id == 0) {
            $this->db->insert('gear_sets', $param);
        }
        else {
            $this->db->where('id_gear_sets', $id);
            $this->db->update('gear_sets', $param);
        }
    }

    public function delete_gear($id) {
        $this->db->where('id_gear', $id);
        $this->db->delete('gear');
    }

    private function sort_members($array) {
        $lnames = array_column($array, 'lname');

        return array_multisort($lnames, SORT_ASC, $array);
    }

    public function get_members($num_rec, $pg_no) {
        $offset = ($pg_no -1) * $num_rec;
        $this->db->select('*');
        $q = $this->db->get('members')->result();
        $members = array();
        $fstr = "Mem ID,Name,# of Gear,Gear\n";
        foreach ($q as $item) {
            $member = array(
                'id_members' => $item->id_members,
                'fname' => $this->encr_decr($item->fname, FALSE, TRUE),
                'lname' => $this->encr_decr($item->lname, FALSE, TRUE),
                'gear' => $item->gear
            );
            $this->db->select('gear_set');
            $this->db->where('id_gear_sets', $item->gear);
            if($this->db->count_all_results('gear_sets') > 0) {
                $this->db->select('gear_set');
                $this->db->where('id_gear_sets', $item->gear);
                $gear = $this->db->get('gear_sets')->row()->gear_set;
                $gear_arr = explode(':', $gear);
                $cnt = count($gear_arr);
                $fstr .= $item->id_members . "," . $member['lname'] . " " . $member['fname'] . "," . $cnt . "," . $gear . "\n";
            }
            array_push($members, $member);
        }

        file_put_contents('././assets/files/members.csv', $fstr);

  //https://www.php.net/manual/en/function.array-multisort.php
        array_multisort (array_column($members, 'lname'), SORT_ASC, $members);
        $retarr = array();

//pagination: https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
        $retarr['no_pages'] = ceil(count($members) / $num_rec);
        $retarr['pg'] = $pg_no;
        //echo '<pre>'; print_r($members); echo '</pre>';

        $retarr['members'] = array_slice($members, $offset, $num_rec);
        return $retarr;
    }

    public function get_item_cnt($id) {
      $this->db->select('gear_set');
      $gear_sets = $this->db->get('gear_sets')->result();
        $cnt = 0;
        foreach($gear_sets as $gear_set) {
        $gear_arr = explode(':', $gear_set->gear_set);
        foreach($gear_arr as $item) {
          if(intval($item) == intval($id)) {
            $cnt++;
          }
        }
      }
      return $cnt;
    }

    public function get_assigned_to($id) {
      $this->db->select('description, gear_set');
      $gear_sets = $this->db->get('gear_sets')->result();
        $members = array();
        foreach($gear_sets as $gear_set) {
          $gear_arr = explode(':', $gear_set->gear_set);
          foreach($gear_arr as $item) {
            if(intval($item) == intval($id)) {
              array_push($members, $this->encr_decr($gear_set->description, FALSE, TRUE));
            }
          }
      }
      return $members;
    }

    public function get_all_gear() {
        $this->db->select('*');
        $this->db->where('type', 1);
        $this->db->order_by('description', 'ASC');
        $q = $this->db->get('gear')->result();
        $gear = array();
        foreach ($q as $item) {
            $item_arr = array(
                'id_gear' => $item->id_gear,
                'id_gear_set' => $item->id_gear_set,
                'desc' => $this->encr_decr($item->description, FALSE, TRUE),
                'type' => $item->type,
                'qty' => $item->qty,
                'location' => $item->location
            );
            array_push($gear, $item_arr);
        }
        array_multisort (array_column($gear, 'desc'), SORT_ASC, $gear);
        $retarr['all_gear'] = $gear;
        $retarr['gear'] = $this->part_arr($gear, 3);

        return $retarr;
    }

    /**
     * Inspired by: https://www.php.net/manual/en/function.array-chunk.php
     * @param array[] $list
     * @param integer $p
     * @return array[]
     */

    private function part_arr($list, $p) {
        $listlen = count( $list );
        $partlen = floor( $listlen / $p );
        $partrem = $listlen % $p;
        $partition = array();
        $mark = 0;
        for ($px = 0; $px < $p; $px++) {
            $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
            $partition[$px] = array_slice( $list, $mark, $incr );
            $mark += $incr;
        }
        return $partition;
    }

    public function download_all_gear($num_rec, $pg_no) {
        //$pg_no = 3;
        $offset = ($pg_no -1) * $num_rec;
        $this->db->select('*');
        $this->db->order_by('description', 'ASC');
        $q = $this->db->get('gear')->result();
        $gear = array();
        $fstr = "Seq #,Item #,Description,Qty,Qty Assigned,Location\n";
        $i = 0;
        foreach ($q as $item) {
            $item_arr = array(
                'id_gear' => $item->id_gear,
                'id_gear_set' => $item->id_gear_set,
                'desc' => $this->encr_decr($item->description, FALSE, TRUE),
                'type' => $item->type,
                'qty' => $item->qty,
                'location' => $item->location
            );
 //count the number of items in all gearsets
            $this->db->select('gear');
            $this->db->where('gear >', 0);

//figure if there are any members with gearsets
            if($this->db->count_all_results('members') > 0) {

//if yes, get those members and their gearsets
                $this->db->where('gear >', 0);
                $res = $this->db->get('members')->result();
                $gear_cnt = 0;
                foreach($res as $id) {
                    $this->db->select('gear_set');
                    $this->db->where('id_gear_sets', $id->gear);
                    $set_arr = explode(':', $this->db->get('gear_sets')->row()->gear_set);
                    foreach ($set_arr as $gear_item) {
                        if($item->id_gear == $gear_item) {
                            $gear_cnt++;
                        }
                    }
                }
            }
            //$gear_arr = explode(':', $item->gear_set);
            $i++;
            $fstr .= $i . "," . $item_arr['id_gear'] . "," . $item_arr['desc'] . "," . $item->qty . "," . $gear_cnt . "," . $item->location . "\n";
            array_push($gear, $item_arr);
        }

        file_put_contents('././assets/files/gear/all-gear.csv', $fstr);
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
        $retarr['gear_type'] = 'all_gear';
        $retarr['gear'] = $gear;
        return $retarr;
    }

    public function get_gear($num_rec, $pg_no) {
        //$pg_no = 3;
        $offset = ($pg_no -1) * $num_rec;
        $this->db->select('*');
        $this->db->where('type', 1);
        $this->db->order_by('description', 'ASC');
        $q = $this->db->get('gear')->result();
        $gear = array();
        $fstr = "Seq #,Item #,Description,Qty,Qty Assigned,Location,Issued\n";
        $i = 0;
        foreach ($q as $item) {
            $item_arr = array(
                'id_gear' => $item->id_gear,
                'id_gear_set' => $item->id_gear_set,
                'desc' => $this->encr_decr($item->description, FALSE, TRUE),
                'type' => $item->type,
                'qty' => $item->qty,
                'location' => $item->location,
                'issued' => $this->get_item_cnt($item->id_gear),
                'assg' => $this->get_assigned_to($item->id_gear)
            );
 //count the number of items in all gearsets
            $this->db->select('gear');
            $this->db->where('gear >', 0);

//figure if there are any members with gearsets
            if($this->db->count_all_results('members') > 0) {

//if yes, get those members and their gearsets
                $this->db->where('gear >', 0);
                $res = $this->db->get('members')->result();
                $gear_cnt = 0;
                foreach($res as $id) {
                    $this->db->select('gear_set');
                    $this->db->where('id_gear_sets', $id->gear);
                    $set_arr = explode(':', $this->db->get('gear_sets')->row()->gear_set);
                    foreach ($set_arr as $gear_item) {
                        if($item->id_gear == $gear_item) {
                            $gear_cnt++;
                        }
                    }
                }
            }
            //$gear_arr = explode(':', $item->gear_set);
            $i++;
            $fstr .= $i . "," . $item_arr['id_gear'] . "," . $item_arr['desc'] . "," . $item->qty . "," . $gear_cnt . "," . $item->location .
            "," . $item_arr['issued'] . "\n";
            array_push($gear, $item_arr);
        }

        file_put_contents('././assets/files/gear/gear.csv', $fstr);
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
        $retarr['gear_type'] = 'gear';
        $retarr['gear'] = $gear;
        return $retarr;
    }

    public function get_gear_item($id) {

        $retarr = array();
        $this->db->select('*');
        $this->db->where('id_gear', $id);
        $row = $this->db->get('gear')->row();
        $retarr['desc'] = $this->encr_decr($row->description, FALSE, TRUE);
        $retarr['location'] = $row->location;
        $retarr['qty'] = $row->qty;
        $retarr['id'] = $id;
        $retarr['sn'] = $row->sn;
        $retarr['size'] = $row->size;
        $retarr['types'] = $this->get_gear_types();
        $retarr['assg'] = $this->get_assigned_to($id);
        $sel = $row->type;
        //$this->db->select('description');
        //$this->db->where('id_gear_types', $sel);
        //$retarr['selected'] = $this->db->get('gear_types')->row()->description;
        $retarr['selected'] = $sel - 1;
        $retarr['issued'] = $this->get_item_cnt($id);
        $fstr = $retarr['desc'] . "\n\n";
        $fstr .= "Location,Qty O/H,Qty Issued\n";
        $fstr .= $retarr['location'] ."," . $retarr['qty'] . "," . $retarr['issued'] . "\n\n";
        $fstr .= "Issued To:\n";
        foreach($retarr['assg'] as $mem) {
          $fstr .= $mem . "\n";
        }

        file_put_contents('././assets/files/gear/item.csv', $fstr);

        return $retarr;
    }

    public function edit_member($data) {
        $retval = TRUE;
        $action = $data['action'];
        unset($data['action']);
        $data['lname'] = $this->encr_decr($data['lname'], TRUE, FALSE);
        $data['fname'] = $this->encr_decr($data['fname'], TRUE, FALSE);
   //add member
        if($action == 0) {
            $this->db->insert('members', $data);
        }
  //edit member
        else {
  //check if member has already assigned a gearset
            $data['id_members'] = $action;

            $this->db->select('gear');
            $this->db->where('id_members', $action);
            $gear = $this->db->get('members')->row()->gear;

  //if yes then return items to stock
            if($gear != 0) {
                $this->db->select('gear_set');
                $this->db->where('id_gear_sets', $gear);

 //get each gear from the gearset table
                $gear_arr = explode(':', $this->db->get('gear_sets')->row()->gear_set);

 //step through each gear item and update quantity
                foreach($gear_arr as $id_item) {
 //figure quantity for the gear item and increment
                    $this->db->select('qty');
                    $this->db->where('id_gear', $id_item);
                    $qty = $this->db->get('gear')->row()->qty + 1;
 //update new incremented quantity
                    $this->db->where('id_gear', $id_item);
                    $this->db->update('gear', array('qty' => $qty));
                }
            }

            if($data['gear'] != 0) {
                $this->db->select('gear_set');
                $this->db->where('id_gear_sets', $data['gear']);

    //get each gear from the gearset table
                $gear_arr = explode(':', $this->db->get('gear_sets')->row()->gear_set);

    //step through each gear item and update quantity
                foreach($gear_arr as $id_item) {
    //figure quantity for the gear item and decrement
                    $this->db->select('qty');
                    $this->db->where('id_gear', $id_item);
                    $qty = $this->db->get('gear')->row()->qty - 1;
    //update new decremented quantity
                    $this->db->where('id_gear', $id_item);
                    $this->db->update('gear', array('qty' => $qty));
                }

                $this->db->where('id_members', $action);
                $this->db->update('members', $data);
            }
        }

        return $retval;
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

    public function get_member($id) {
        $member = array();
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where('id_members', $id);
        if($this->db->count_all_results() > 0) {
            $this->db->where('id_members', $id);
            $q = $this->db->get('members')->row();
            $member['id_members'] = $id;
            $member['fname'] = $this->encr_decr($q->fname, FALSE, TRUE);
            $member['lname'] = $this->encr_decr($q->lname, FALSE, TRUE);
        }
        else {
            $member['id_members'] = 0;
            $member['fname'] = '';
            $member['lname'] = '';
        }

        $retval['member'] = $member;

        return $retval;
    }

    public function get_gearset($data) {
        $retarr = array();
        $this->db->select('*');
        $this->db->from('gear_sets');
        $this->db->where('id_gear_sets', $data['id_gear_sets']);
        if($this->db->count_all_results() > 0) {
            $this->db->where('id_gear_sets', $data['id_gear_sets']);
            $row = $this->db->get('gear_sets')->row();

 // convert UNIX timestamp https://www.epochconverter.com/programming/php
            $dt_int = $row->date_issued;
            $dt = new DateTime("@$dt_int");
            $retarr['date'] = $dt->format('Y-m-d');
            $retarr['id_gear_sets'] = $row->id_gear_sets;
            $retarr['id_members'] = $row->id_member;
            $retarr['description'] = $this->encr_decr($row->description, FALSE, TRUE);
            $retarr['gearset']['id_parent'] = $row->id_parent;
        }
        else {
            $retarr['id_gear_sets'] = 0;
            $retarr['id_members'] = 0;
            $retarr['description'] = '';
            $retarr['date'] = 0;
            $retarr['id_parent'] = 0;
        }
        return $retarr;
    }

    public function delete_member($id) {

        $this->db->where('id_members', $id);
        $this->db->delete('members');

    }

    public function delete_gearset($id) {
        $this->db->where('gear', $id);
        $cnt = $this->db->count_all_results('members');

        if($cnt == 0) {
            $this->db->where('id_gear_sets', $id);
            $this->db->delete('gear_sets');
        }


    }

    public function get_gearsets() {
        $this->db->select('*');
        $q = $this->db->get('gear_sets')->result();
        $gearsets = array();
        foreach($q as $set) {
            $item = array();
            $item['id'] = $set->id_gear_sets;
            $item['parent'] = $set->id_parent;
            $item['member'] = $set->id_member;
            $item['desc'] = $this->encr_decr($set->description, FALSE, TRUE);
            $item['date'] = date('m/d/Y', $set->date_issued);
            $this->db->where('gear', $item['id']);
            if ($this->db->count_all_results('members') == 0) {
                $item['assigned'] = FALSE;
            }
            else {
                $item['assigned'] = TRUE;
            }
            array_push($gearsets, $item);
        }

//https://www.php.net/manual/en/function.array-multisort.php
        array_multisort (array_column($gearsets, 'desc'), SORT_ASC, $gearsets);
        $retarr['gearsets'] = $gearsets;
        return $retarr;
    }

    public function get_edit_mem_data($id) {

        $retarr = array();
        $retarr['member'] = $this->get_member($id)['member'];
        $retarr['gearsets'] = $this->get_gearsets()['gearsets'];

//get id_gearset from members
        if($id != 0) {
            $this->db->select('gear');
            $this->db->where('id_members', $id);
            $id_gearset = $this->db->get('members')->row()->gear;
        }
        else {
            $id_gearset = 0;
        }

        if($id_gearset > 0) {
            $retarr['gearset'] = $this->get_gearset(array('id_gear_sets' => $id_gearset));
            $retarr['flag'] = TRUE;
        }
        else {
            $retarr['flag'] = FALSE;
            $retarr['gearset'] = $this->get_gearset(array('id_gear_sets' => 0));
        }

        return $retarr;
    }

    private function get_free_gearsets() {
        $this->db->select('*');
        $q = $this->db->get('gear_sets')->result();
        $gearsets = array();
        foreach($q as $set) {
            $item = array();
            $item['id'] = $set->id_gear_sets;
            $item['parent'] = $set->id_parent;
            $item['member'] = $set->id_member;
            $item['desc'] = $this->encr_decr($set->description, FALSE, TRUE);
            $item['date'] = date('m/d/Y', $set->date_issued);
            $this->db->where('gear', $item['id']);
            if ($this->db->count_all_results('members') == 0) {
                $item['assigned'] = FALSE;
            }
            else {
                $item['assigned'] = TRUE;
            }
            $this->db->where('gear', $set->id_gear_sets);
            if($this->db->count_all_results('members') == 0) {
                array_push($gearsets, $item);
            }
        }

        //https://www.php.net/manual/en/function.array-multisort.php
        array_multisort (array_column($gearsets, 'desc'), SORT_ASC, $gearsets);
        $retarr['gearsets'] = $gearsets;
        return $retarr;
    }

    public function get_gearset_det($id) {
        $this->db->where('gear', $id);
        $cnt = $this->db->count_all_results('members');
        if($cnt > 0) {
            $this->db->select('*');
            $this->db->where('gear', $id);
            $res = $this->db->get('members')->result();
            $retarr['members'] = array();
            foreach($res as $mem) {
                $mem_arr = array(
                    'id' => $mem->id_members,
                    'fname' => $this->encr_decr($mem->fname, FALSE, TRUE),
                    'lname' => $this->encr_decr($mem->lname, FALSE, TRUE)
                );
                array_push($retarr['members'], $mem_arr);
            }
        }
        else {
            $retarr['members'] = NULL;
        }
        $this->db->select('*');
        $this->db->where('id_gear_sets', $id);
        $row = $this->db->get('gear_sets')->row();

//get each gear from the gearset table
        $gear_arr = explode(':', $row->gear_set);
        $retarr['description'] = $this->encr_decr($row->description, FALSE, TRUE);
        $retarr['id_gearset'] = $row->id_gear_sets;
        $retarr['gearset'] = array();
        foreach($gear_arr as $id_item) {
            $this->db->select('*');
            $this->db->where('id_gear', $id_item);
            $q = $this->db->get('gear')->row();
            $item = array(
                'id' => $q->id_gear,
                'description' => $this->encr_decr($q->description, FALSE, TRUE),
                'qty' => $q->qty
            );
            array_push($retarr['gearset'], $item);
        }

 //get the rest of the gear items from gear table
        $this->db->select('*');
        $gear_items = $this->db->get('gear')->result();
        $retarr['gear'] = array();
        foreach($gear_items as $gear_item) {
            $flag = TRUE;
            foreach($retarr['gearset'] as $cur_gear) {
                if($cur_gear['id'] == $gear_item->id_gear) {
                    $flag = FALSE;
                }
            }
            if($flag) {
                $item = array(
                    'id' => $gear_item->id_gear,
                    'description' => $this->encr_decr($gear_item->description, FALSE, TRUE)
                );
                array_push($retarr['gear'], $item);
            }
        }


        array_multisort (array_column($retarr['gear'], 'description'), SORT_ASC, $retarr['gear']);

        $retarr['all_gear'] = $retarr['gear'];

        $retarr['gear'] = $this->part_arr($retarr['gear'], 3);

        return $retarr;
    }

    public function unassign_gearset($id_gear, $id_mem) {

        $this->db->select('gear_set');
        $this->db->where('id_gear_sets', $id_gear);
        $gear_arr = explode(':', $this->db->get('gear_sets')->row()->gear_set);

        //step through each gear item and update quantity
        foreach($gear_arr as $id_item) {
            //figure quantity for the gear item and increment
            $this->db->select('qty');
            $this->db->where('id_gear', $id_item);
            $qty = $this->db->get('gear')->row()->qty + 1;
            //update new incremented quantity
            $this->db->where('id_gear', $id_item);
            $this->db->update('gear', array('qty' => $qty));
        }

        $this->db->where('id_members', $id_mem);
        $this->db->update('members', array('gear' => 0));
    }

    public function update_gearset($param) {
        $this->db->select('gear_set');
        $this->db->where('id_gear_sets', $param['id']);

        $new_gearset = $this->db->get('gear_sets')->row()->gear_set . ':' . $param['gear_set'];
        $desc = $this->encr_decr($param['description'], TRUE, FALSE);

        $this->db->where('id_gear_sets', $param['id']);
        $this->db->update('gear_sets', array('gear_set' => $new_gearset, 'description' => $desc));

        $this->db->where('gear', $param['id']);
        $cnt = $this->db->count_all_results('members');

        if($cnt > 0) {
            $this->db->select('*');
            $this->db->where('gear', $param['id']);
            $res = $this->db->get('members')->result();
            foreach($res as $item) {
                $id_arr = explode(':', $param['gear_set']);
                foreach($id_arr as $id_gear) {
                    $this->db->select('qty');
                    $this->db->where('id_gear', $id_gear);
                    $qty = $this->db->get('gear')->row()->qty - 1;

                    $this->db->where('id_gear', $id_gear);
                    $this->db->update('gear', array('qty' => $qty));
                }
            }
        }
    }

    public function remove_item($param) {
        $this->db->select('gear_set');
        $this->db->where('id_gear_sets', $param['id_gear_sets']);
        $g_arr = explode(':', $this->db->get('gear_sets')->row()->gear_set);

        $new_gearset = '';
        foreach($g_arr as $id_item) {
            if($id_item != $param['id_gear']) {
                $new_gearset .= $id_item . ':';
            }
        }

        $new_gearset = substr($new_gearset, 0, -1);

        $this->db->where('id_gear_sets', $param['id_gear_sets']);
        $this->db->update('gear_sets', array('gear_set' => $new_gearset));

        $this->db->where('gear', $param['id_gear_sets']);
        $cnt = $this->db->count_all_results('members');
        if($cnt > 0) {
            $this->db->select('gear');
            $this->db->where('gear', $param['id_gear_sets']);
            $res = $this->db->get('members')->result();
            foreach($res as $item) {
                $this->db->select('qty');
                $this->db->where('id_gear', $param['id_gear']);
                $qty = $this->db->get('gear')->row()->qty + 1;

                $this->db->where('id_gear', $param['id_gear']);
                $this->db->update('gear', array('qty' => $qty));
            }
        }
    }

    public function update_gs_desc($id, $desc) {
        $this->db->where('id_gear_sets', $id);
        $desc = $this->encr_decr($desc, TRUE, FALSE);
        $this->db->update('gear_sets', array('description' => $desc));
    }

    public function copy_gearset($id) {
        $this->db->select('*');
        $this->db->where('id_gear_sets', $id);
        $row = $this->db->get('gear_sets')->row();

        $descr = $this->encr_decr($row->description, FALSE, TRUE) . '-cp';

        $copy = array(
            'id_parent' => $row->id_parent,
            'id_member' => 0,
            'gear_set' => $row->gear_set,
            'description' => $this->encr_decr($descr, TRUE, FALSE),
            'date_issued' => $row->date_issued
        );

        $this->db->insert('gear_sets', $copy);

        $this->db->select_max('id_gear_sets');
        return $this->db->get('gear_sets')->row()->id_gear_sets;

    }

    public function download_assigned_gear($id) {

        $this->db->select('*');
        $this->db->where('id_members', $id);
        $mem = $this->db->get('members')->row();

        $this->db->select('description, gear_set');
        $this->db->where('id_gear_sets', $mem->gear);
        $row = $this->db->get('gear_sets')->row();

        $gs_desc = $this->encr_decr($row->description, FALSE, TRUE);
        $gearset = explode(':', $row->gear_set);

        $fname = $this->encr_decr($mem->fname, FALSE, TRUE);
        $lname = $this->encr_decr($mem->lname, FALSE, TRUE);

        $fstr = "Seq No,Item No,Description\n";
        $i = 1;
        foreach($gearset as $gear) {
            $this->db->select('id_gear, description');
            $this->db->where('id_gear', $gear);
            $item = $this->db->get('gear')->row();

            $fstr .= $i . "," . $item->id_gear . "," . $this->encr_decr($item->description, FALSE, TRUE) . "\n";
            $i++;
        }

        $fpath = "././assets/files/gear/$fname$lname.csv";

        file_put_contents($fpath, $fstr);

        return $fpath;
    }

    public function download_all_data() {

        $this->db->select('id_members');
        $this->db->where('gear >', 0);
        $res = $this->db->get('members')->result();
        foreach($res as $id) {
            $this->download_assigned_gear($id->id_members);
        }

        // Enter the name of directory
        //$pathdir = "././assets/files/gear/";

        // Enter the name to creating zipped directory
        /*$zipcreated = "gear.zip";
        $zip = new ZipArchive;

        if($zip->open($zipcreated, ZipArchive::CREATE ) === TRUE) {

            $dir = opendir($pathdir);

            while($file = readdir($dir)) {
                if(is_file($pathdir.$file)) {
                    $zip->addFile($pathdir.$file, $file);
                }
            }
            $zip->close();
        }*/
    }

    public function get_boat_gear($num_rec, $pg_no) {
      //$pg_no = 3;
      $offset = ($pg_no -1) * $num_rec;
      $this->db->select('*');
      $this->db->where('type', 4);
      $this->db->order_by('description', 'ASC');
      $q = $this->db->get('gear')->result();
      $gear = array();
      $fstr = "Item #,Description,Size,SN,Qty,Location\n";
      $i = 0;
      foreach ($q as $item) {
          $item_arr = array(
              'id_gear' => $item->id_gear,
              'id_gear_set' => $item->id_gear_set,
              'desc' => $this->encr_decr($item->description, FALSE, TRUE),
              'type' => $item->type,
              'qty' => $item->qty,
              'location' => $item->location,
              'size' => $item->size,
              'sn' => $item->sn
          );
//count the number of items in all gearsets
          $this->db->select('gear');
          $this->db->where('gear >', 0);

//figure if there are any members with gearsets
          if($this->db->count_all_results('members') > 0) {

//if yes, get those members and their gearsets
              $this->db->where('gear >', 0);
              $res = $this->db->get('members')->result();
              $gear_cnt = 0;
              foreach($res as $id) {
                  $this->db->select('gear_set');
                  $this->db->where('id_gear_sets', $id->gear);
                  $set_arr = explode(':', $this->db->get('gear_sets')->row()->gear_set);
                  foreach ($set_arr as $gear_item) {
                      if($item->id_gear == $gear_item) {
                          $gear_cnt++;
                      }
                  }
              }
          }
          //$gear_arr = explode(':', $item->gear_set);
          $i++;
          $fstr .= $item_arr['id_gear'] . "," . $item_arr['desc'] . "," . $item_arr['size'] . "," . $item_arr['sn'] . "," .
          $item->qty . "," .  $item->location . "\n";
          array_push($gear, $item_arr);
      }

      file_put_contents('././assets/files/gear/boat-gear.csv', $fstr);
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
      $retarr['gear_type'] = 'boat';
      $retarr['gear'] = $gear;
      return $retarr;
    }

    public function get_other_gear($num_rec, $pg_no) {
      //$pg_no = 3;
      $offset = ($pg_no -1) * $num_rec;
      $this->db->select('*');
      $this->db->where('type', 2);
      $this->db->order_by('description', 'ASC');
      $q = $this->db->get('gear')->result();
      $gear = array();
      $fstr = "Item #,Description,Size,SN,Qty,Location\n";
      $i = 0;
      foreach ($q as $item) {
          $item_arr = array(
              'id_gear' => $item->id_gear,
              'id_gear_set' => $item->id_gear_set,
              'desc' => $this->encr_decr($item->description, FALSE, TRUE),
              'type' => $item->type,
              'qty' => $item->qty,
              'location' => $item->location,
              'size' => $item->size,
              'issued' => $this->get_item_cnt($item->id_gear),
              'sn' => $item->sn
          );
//count the number of items in all gearsets
          $this->db->select('gear');
          $this->db->where('gear >', 0);

//figure if there are any members with gearsets
          if($this->db->count_all_results('members') > 0) {

//if yes, get those members and their gearsets
              $this->db->where('gear >', 0);
              $res = $this->db->get('members')->result();
              $gear_cnt = 0;
              foreach($res as $id) {
                  $this->db->select('gear_set');
                  $this->db->where('id_gear_sets', $id->gear);
                  $set_arr = explode(':', $this->db->get('gear_sets')->row()->gear_set);
                  foreach ($set_arr as $gear_item) {
                      if($item->id_gear == $gear_item) {
                          $gear_cnt++;
                      }
                  }
              }
          }
          //$gear_arr = explode(':', $item->gear_set);
          $i++;
          $fstr .= $item_arr['id_gear'] . "," . $item_arr['desc'] . "," . $item_arr['size'] . "," . $item_arr['sn'] . "," .
          $item->qty . "," .  $item->location . "\n";
          array_push($gear, $item_arr);
      }

      file_put_contents('././assets/files/gear/other-gear.csv', $fstr);
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
      $retarr['gear_type'] = 'other';
      $retarr['gear'] = $gear;
      return $retarr;
    }
}


?>
