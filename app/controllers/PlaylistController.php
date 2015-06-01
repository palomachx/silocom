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

  public function agregarPlaylist() {
    $nombre = $this->input->post('model_playlist');
    $result = $this->PlaylistModel->add_new_playlist($nombre);
    if($result) 
    {
      echo json_encode(array(
        'success' => true,
        'message' => 'Playlist agregada correctamente'
        ));
    }
    else
    {
      echo json_encode(array(
        'success' => false,
        'message' => 'Hubo un problema al agregar la playlist'
        ));
    }
  }

}


/* End of file PlaylistController.php */
/* Location: ./app/controllers/PlaylistController.php */
