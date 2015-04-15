<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GenrestypesModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database('development');
	}

	public function get_genres() {
		$query = $this->db->get('CI_Genero');
		if($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function new_genre($genre) {
		$data = array(
			'gen_name' => $genre
			);
		return $this->db->insert('CI_Genero', $data);
	}

	public function get_types() {
		$query = $this->db->get('CI_Tipo_Cancion');
		if($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function new_type($type, $typedes) {
		$data = array(
			'tip_name' => $type,
			'tip_description' => $typedes
			);
		return $this->db->insert('CI_Tipo_Cancion', $data);
	}


}