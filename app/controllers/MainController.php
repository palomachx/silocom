<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('status') == true) {
      $this->load->view('Mainview');
    }else{
      redirect(base_url());
    }
	}

}

/* End of file MainController.php */
/* Location: ./app/controllers/MainController.php */