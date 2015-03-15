<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaseModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database('development');
	}

	public function oauth($username, $password) {
		$this->db->where('us_username', $username);
		$this->db->where('us_password', $password);
		$result = $this->db->get('CI_Usuarios');
		if($result->num_rows > 0 && $result->num_rows == 1) {
			return $result->row();
		}else {
			return false;
		}
	}

}