<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('status') == true){
			$this->load->view('Dashview');
		}else{
			redirect(base_url());
		}
	}

}

/* End of file DashboardController.php */
/* Location: ./app/controllers/DashboardController.php */
