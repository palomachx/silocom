<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Musica extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('activo') == 1){
			$this->load->view('musica');
		}else{
			redirect(base_url());
		}
	}

}