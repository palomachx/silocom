<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SongsController extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    if($this->session->userdata('status') == true) {
      $this->load->view('Songsview');
    }else{
      redirect(base_url());
    }
  }

}

/* End of file SongsController.php */
/* Location: ./app/controllers/SongsController.php */
