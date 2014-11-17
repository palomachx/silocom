<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_welcome');
	}

	public function index() {
		$this->load->view('welcome_message');
	}

	public function appLogin() {
		$username = $this->input->post('user');
		$pass = sha1($this->input->post('pass'));
		$result = $this->m_welcome->comprobarUsuario($username, $pass);
		if($result != null){
			$data = array(
				'status' => '1',
				'message' => 'Inicio de Sesión Correcto!'
				);

			$retornodeDatos = json_encode($data);
		}else{
			$data = array(
				'status' => '0',
				'message' => 'Compruebe sus datos de acceso!',
				'password' => sha1($pass)
				);
			$retornodeDatos = json_encode($data);
		}
		echo $retornodeDatos;
	}

}
