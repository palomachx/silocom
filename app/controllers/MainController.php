<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('PlaylistModel');
	}

	public function index(){
		if($this->session->userdata('status') == true) {
			$username = $this->session->userdata('username');
			$data['lista'] = new stdClass;
			$data['lista']->data = $this->PlaylistModel->add_lists($username);
			$data['lista']->username = $username;
      $this->load->view('Mainview', $data);
    }else{
      redirect(base_url());
    }
	}

}

/* End of file MainController.php */
/* Location: ./app/controllers/MainController.php */