<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Welcome extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database('default');
	}

	public function comprobarUsuario($username, $password){
		$this->db->where('us_username', $username);
		$this->db->where('us_password', $password);
		$query = $this->db->get('USUARIOS');
		if($query->num_rows() == 1){
			return $query->first_row();
		}else{
			return null;
		}
	}

}