<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database('development');
	}

  public function all() {
    $query = $this->db->query('SELECT us_username, us_name, us_apep, us_apem, changevalueRol(rol_id) AS rol_id, us_date FROM "CI_Usuarios";');
    if($query->num_rows() > 0){
      return $query->result_array();
    }else{
      return false;
    }
  }

	public function setnewuser($username, $rol, $name, $apep, $apem, $password) {
		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('America/Mexico_City'));
		$date_now = $date->format("Y-m-d H:i:s");
		$data = array(
			'us_username' => $username,
			'us_password' => sha1($password),
			'us_date' => $date_now,
			'us_name' => $name,
			'us_apep' => $apep,
			'us_apem' => $apem,
			'us_status' => 1,
			'rol_id' => $rol
 		);
		return $this->db->insert('CI_Usuarios', $data);
	}

	public function getroles() {
		$query = $this->db->get('CI_Roles');
		if($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}

}
