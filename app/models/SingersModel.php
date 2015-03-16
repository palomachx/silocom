<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SingersModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database('development');
	}

  public function all() {
    $query = $this->db->get('CI_Artistas');
    if($query->num_rows() > 0) {
      return $query->result_array();
    }else{
      return false;
    }
  }

  public function newsinger($artista) {
    $data = array(
      'art_name' => $artista
    );
    return $this->db->insert('CI_Artistas', $data);
  }

}
