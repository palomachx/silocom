<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PlaylistModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database('development');
	}

	public function add_lists($username) {
		$this->db->where('us_username', $username);
		$query = $this->db->get('CI_Playlist');
		if($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function add_new_playlist($nombre) {
		$data = array(
			'play_name' => $nombre,
			'us_username' => $this->session->userdata('username')
			);
		return $this->db->insert('CI_Playlist', $data);
	}

}