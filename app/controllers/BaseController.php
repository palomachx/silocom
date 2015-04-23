<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaseController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('BaseModel');
	}

	public function index(){
		if($this->session->userdata('status') != true){
			$this->load->view('Authview');
		} else {
			redirect(base_url('main'));
		}
	}

	public function login() {
		$config = array(
			array(
				'field' => 'username',
				'label' => 'Nombre de Usuario',
				'rules' => 'trim|required|xss_clean'
				),
			array(
				'field' => 'password',
				'label' => 'Contraseña',
				'rules' => 'trim|required|xss_clean'
				)
			);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('','');
		if($this->form_validation->run() == FALSE) {
			echo json_encode(array(
				'errors' => array(
					'username' => form_error('username'),
					'password' => form_error('password')
					),
				'status' => false
				));
		}else{
			$username = $this->input->post('username');
			$password = sha1($this->input->post('password'));
			$oauth = $this->BaseModel->oauth($username, $password);
			if($oauth != false){
				$data_session = array(
					'username' => $username,
					'status' => true,
				);
				$this->session->set_userdata($data_session);
				echo json_encode(array(
					'username' => $username,
					'status' => true
					));
			}else{
				echo json_encode(array(
					'status' => false,
					'errors' => ''
					));
			}
		}
	}

}

/* End of file BaseController.php */
/* Location: ./app/controllers/BaseController.php */
