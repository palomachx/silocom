<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/* Constructor de la Clase o Inicializador */
	public function __construct(){
		parent::__construct();
		$this->load->model('m_welcome');
	}

	/* Llamado al Index */
	public function index() {
		if($this->session->userdata('activo') == 1){
			redirect(base_url('index.php/dashboard'));
		}else{
			$this->load->view('welcome_message');
		}		
	}

	/* Iniciar la Sesion */
	public function appLogin() {
		$username = $this->input->post('user');
		$pass = sha1($this->input->post('pass'));
		$result = $this->m_welcome->comprobarUsuario($username, $pass);
		if($result != null){
			$data = array(
				'status' => 1,
				'message' => 'Inicio de Sesión Correcto!'
				);

			$completo = $result->us_name.' '.$result->us_apep.' '.$result->us_apem;

			/* Arreglo de Datos de Session */
			$datoSession = array(
      	'activo' => 1,
      	'username' => $result->us_username,
      	'nombrecompleto' => $completo,
      	'fecharegistro' => $result->us_date,
      	'rol_id' => $result->rol_id
			);

			$this->session->set_userdata($datoSession); // set_userdata(); Función que almacena
																								 // datos de session;

			$retornodeDatos = json_encode($data);
		}else{
			$data = array(
				'status' => 0,
				'message' => 'Compruebe sus datos de acceso!'
				);
			$retornodeDatos = json_encode($data);
		}
		echo $retornodeDatos;
	}

	/* Cerrar una Session */
	public function killsession(){
		$this->session->unset_userdata();
			$this->session->sess_destroy();
				redirect(base_url());
	}

}
