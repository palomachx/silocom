<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('Dashview');
	}

}

/* End of file DashboardController.php */
/* Location: ./app/controllers/DashboardController.php */