<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PlaylistController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('PlaylistModel');
  }

  public function index() {
  	if($this->session->userdata('status') == true) {

  	}else{
  		redirect(base_url());
  	}
  }

}


/* End of file PlaylistController.php */
/* Location: ./app/controllers/PlaylistController.php */
