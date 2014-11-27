<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database('default');
	}

	/* Obtener todas las canciones de la base de datos */
	public function todasCanciones() {
		$this->db->select('can_id,can_name,can_ano,can_duracion,can_ruta,DISQUERA.dis_name,TIPO_CANCION.tip_name,ARTISTAS.art_name,GENERO.gen_name,art_adicional');
		$this->db->from('CANCION, DISQUERA, GENERO, ARTISTAS, TIPO_CANCION');
		$this->db->where('CANCION.dis_id = "DISQUERA".dis_id');
		$this->db->where('CANCION.tip_id = "TIPO_CANCION".tip_id');
		$this->db->where('CANCION.art_id = "ARTISTAS".art_id');
		$this->db->where('CANCION.gen_id = "GENERO".gen_id');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return null;
		}
	}

}