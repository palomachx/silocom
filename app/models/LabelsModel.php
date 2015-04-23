<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LabelsModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database('development');
	}

	public function all() {
		$query = $this->db->get('CI_Disquera');
		if($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function newlabel($label) {
		$data = array(
			'dis_name' => $label
			);
		return $this->db->insert('CI_Disquera', $data);
	}

}