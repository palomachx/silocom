<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_dashboard');
	}

	public function index() {
		if($this->session->userdata('activo') == 1){
			$this->load->view('dashboard');
		}else{
			redirect(base_url());
		}
	}

	public function getSongs(){
		$result = $this->m_dashboard->todasCanciones();
		echo json_encode($result);
	}

}