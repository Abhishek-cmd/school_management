<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}

	private function getConn($conn) {
		if(!is_bool($conn)) {
			return $conn;
		} else {
			return $this->db;
		}
	}

	public function insert($table, $data, $conn = false) {
		$conn = $this->getConn($conn);
		$conn->insert($table, $data);
		return $conn->insert_id();
	}

	public function access_users_login($email,$password){
        $data = array('email' => $email,'password' => md5($password));
		$query=$this->db->where($data);
		$login=$this->db->get('tbl_users');
		if($login!=NULL){
		   return $login->row();
		}
	}

	public function update_schools($data,$school_id){
		$this->db->where('id', $school_id);
        $this->db->update('tbl_school', $data);
	}
	

	// Select total records
	public function getrecordCount($search = ''){
	    $this->db->select('count(*) as allcount');
	    $this->db->from('tbl_school ts');
	    $this->db->where('ts.status', '1');
	 
	    if($search != ''){
	      $this->db->like('ts.school_name', $search);
	      $this->db->or_like('ts.school_location', $search);
	    }

	    $query = $this->db->get();
	    $result = $query->result_array();
	 
	    return $result[0]['allcount'];
	}

	// Fetch records
	public function getData($rowno,$rowperpage,$search="") {
	 
	    $this->db->select('*');
	    $this->db->from('tbl_school ts');
	    $this->db->where('ts.status', '1');

	    if($search != ''){
	      $this->db->like('ts.school_name', $search);
	      $this->db->or_like('ts.school_location', $search);
	    }

	    $this->db->limit($rowperpage, $rowno); 
	    $query = $this->db->get();
	    // echo $this->db->last_query();exit;
	 
	    return $query->result_array();
	}
}
?>