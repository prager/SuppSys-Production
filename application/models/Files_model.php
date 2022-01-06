<?php
class Files_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function create_file($path) {

	}

	public function make_dir_priv($path, $dir_name) {
	    mkdir($path . '/' . $dir_name, 0777, TRUE);
	    return $path . '/' . $dir_name;
	}

	public function del_dir($path) {

	}

	public function get_dir() {
	    return '././assets/uploads/uploads_private/uploads_' . $this->Login_model->get_cur_user_id();
	}

	public function get_files() {
	    $retarr = array();
	    if($this->Login_model->is_logged()['logged']) {
	        if(!is_dir('././assets/uploads/uploads_private/uploads_' . $this->Login_model->get_cur_user_id())) {
	            mkdir('././assets/uploads/uploads_private/uploads_' . $this->Login_model->get_cur_user_id());
	        }
	        $retarr['private_dir'] = '././assets/uploads/uploads_private/uploads_' . $this->Login_model->get_cur_user_id();
	        $retarr['private'] = scandir('././assets/uploads/uploads_private/uploads_' . $this->Login_model->get_cur_user_id());
	    }
	    else {
	        $retarr['private_dir'] = NULL;
	        $retarr['private'] = NULL;
	    }
	    $retarr['public_dir'] = '././assets/uploads/uploads_public/';
	    $retarr['public'] = scandir('././assets/uploads/uploads_public/');
	    return $retarr;
	}

	public function download_file($index, $private) {
	    $files = $this->get_files();
	    if($private == 1) {
    	    for($i=2; $i < count($files['private']); $i++) {
    	        if($i == $index) {
    	            force_download('././assets/uploads/uploads_private/uploads_' . $this->Login_model->get_cur_user_id()
    	                . '/' . $files['private'][$i], NULL);
    	        }
    	    }
	    }
	    else {
	        for($i=2; $i < count($files['public']); $i++) {
	            if($i == $index) {
	                force_download('././assets/uploads/uploads_public/' . $files['public'][$i], NULL);
	            }
	        }
	    }
	}

	public function delete_file($index, $private) {
	    $files = $this->get_files();

	    if($private == 1) {
	        for($i=2; $i < count($files['private']); $i++) {
	            if($i == $index) {
	                $filename = $files['private'][$i];
	            }
	        }
	        unlink('././assets/uploads/uploads_private/uploads_' . $this->Login_model->get_cur_user_id() .'/' . $filename);
	    }
	    else {
	        for($i=2; $i < count($files['public']); $i++) {
	            if($i == $index) {
	                $filename = $files['public'][$i];
	            }
	        }
	        unlink('././assets/uploads/uploads_public/' . $filename);
	    }
	    $this->db->where('name', $filename);
	    $this->db->delete('repository');
	}

	public function add_file($param) {

	    for($i=2; $i < count($param['files']['private']); $i++) {
    	    $this->db->select('*');
    	    $this->db->where('name', $param['files']['private'][$i]);
    	    if($this->db->count_all_results('repository') == 0) {
    	        $data = array(
    	            'name' => $param['files']['private'][$i],
    	            'path' => $param['path'],
    	            'id_user' => $this->Login_model->get_cur_user_id(),
    	            'private_file' => TRUE
    	        );
    	        $this->db->insert('repository', $data);
    	    }
	    }

	    for($i=2; $i < count($param['files']['public']); $i++) {
	        $this->db->select('*');
	        $this->db->where('name', $param['files']['public'][$i]);
	        if($this->db->count_all_results('repository') == 0) {
	            $data = array(
	                'name' => $param['files']['public'][$i],
	                'path' => $param['path'],
	                'id_user' => $this->Login_model->get_cur_user_id(),
	                'private_file' => FALSE
	            );
	            $this->db->insert('repository', $data);
	        }
	    }
	}

	public function get_dir_public($dir) {
	    $cdir = scandir($dir);
	    $retstr = '';
	    foreach ($cdir as $key => $value)
	    {
	        if (!in_array($value,array(".","..")))
	        {
	            $retstr .= '<br>';
	            if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
	            {
	                $retstr .= $value . $this->get_dir_public($dir . DIRECTORY_SEPARATOR . $value);

	            }
	            else
	            {
	                $retstr .= $value;
	            }
	        }
	    }

	    return $retstr;
	}

	public function list_files($dir) {
	    $cdir = scandir($dir);
	    $retarr = array();
	    $retarr['home'] = anchor('files', 'Home') . '/';
	    $retarr['dir'] = $dir;
	    if(strlen($dir) > 34) {
	        $retarr['cur_dir'] = substr($dir, 34, strlen($dir)-1-34);
	        $retarr['link'] = str_replace('/', '~', $retarr['cur_dir']) . '~';
	        //$retarr['link'] = $retarr['cur_dir'];
	    }
	    else {
	        $retarr['cur_dir'] = '';
	        $retarr['link'] = '';
	    }

	    $l_dirs = array();
	    $l_dirs = explode('/', $retarr['cur_dir']);

	    //echo '<br>ldirs: ';
	    $cnt = 0;
	    foreach($l_dirs as $el) {
	        //echo $el . '<br>';
	        $cnt++;
	    }
	    $popping = $l_dirs;

	    $retarr['cur_dir_txt'] = array_pop($popping);

	    $retarr['prev_link'] = '';

	    $revarr = array_reverse($popping);
	    while(count($revarr)>0) {
	        $retarr['prev_link'] .= array_pop($revarr) .'~';
	    }

	    if(strlen($retarr['prev_link']) > 0) {
	       $retarr['prev_link'] = substr($retarr['prev_link'], 0, strlen($retarr['prev_link'])-1);
	    }
	    else {
	        $retarr['prev_link'] = NULL;
	    }

	    $dirs = array();
	    foreach ($cdir as $key => $value) {
	        if (!in_array($value,array(".",".."))) {

    	        if(is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
    	            array_push($dirs, $value);
    	        }
	        }
	    }

	    $filearr = array();
	    foreach ($cdir as $key => $value) {
	        if (!in_array($value,array(".",".."))) {
    	        if(!is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
    	            array_push($filearr, $value);
    	        }
	        }
	    }

	    $retarr['files'] = $filearr;
	    $retarr['dirs'] = $dirs;
	    return $retarr;
	}

	public function download_pub($file) {
	    force_download($file, NULL);	    
	}
}
