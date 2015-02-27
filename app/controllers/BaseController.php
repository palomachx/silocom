<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaseController extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('Authview');
	}

}

/* End of file BaseController.php */
/* Location: ./app/controllers/BaseController.php */