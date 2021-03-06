<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SongsModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database('development');
	}

  public function all() {
		$query = $this->db->query('SELECT can_id, can_name, can_letra, can_anno, can_duracion, can_ruta, cd.dis_name, ctc.tip_name, cg.gen_name, (SELECT getArtistas(can_id)) AS authors
		FROM "CI_Cancion" AS cc, "CI_Disquera" AS cd, "CI_Tipo_Cancion" AS ctc, "CI_Genero" AS cg
		WHERE cc.dis_id = cd.dis_id
		AND cc.tip_id = ctc.tip_id
		AND cc.gen_id = cg.gen_id');
    if($query->num_rows() > 0) {
      return $query->result_array();
    }else{
      return false;
    }
  }

	public function songnew($nombre, $anno, $duracion, $genero, $tipo, $disquera, $file, $letra){
		if($letra == ''){
			$letra = 'Sin letra';
		}
		$data = array(
			'can_name' => $nombre,
			'can_letra' => $letra,
			'can_anno' => $anno,
			'can_duracion' => $duracion,
			'can_ruta' => $file,
			'dis_id' => $disquera,
			'tip_id' => $tipo,
			'gen_id' => $genero
		);
		$this->db->insert('CI_Cancion', $data);
		return $this->db->insert_id();
	}

	public function setArtistatoSong($artistas) {
		return $this->db->insert_batch('CI_Detalle_Cancion', $artistas);
	}

	public function getgeneros() {
		$query = $this->db->get('CI_Genero');
		if($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function gettipos() {
		$query = $this->db->get('CI_Tipo_Cancion');
		if($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return false;
		}
	}

	public function getartistas() {
		$query = $this->db->get('CI_Artistas');
		if($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return false;
		}
	}

	public function getdisqueras() {
		$query = $this->db->get('CI_Disquera');
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function removeSong($id) {
		$tables = array('CI_Detalle_Cancion', 'CI_Cancion');
		$this->db->where('can_id', $id);
		return $this->db->delete($tables);
	}

}
