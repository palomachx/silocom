<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SongsController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('SongsModel');
  }

  public function index() {
    if($this->session->userdata('status') == true) {
      $data['generos'] = $this->SongsModel->getgeneros();
      $data['tipos'] = $this->SongsModel->gettipos();
      $data['artistas'] = $this->SongsModel->getartistas();
      $data['disqueras'] = $this->SongsModel->getdisqueras();
      $this->load->view('Songsview', $data);
    }else{
      redirect(base_url());
    }
  }

  public function getallsongs() {
    if($this->session->userdata('status') == true) {
      $result = $this->SongsModel->all();
      echo json_encode(array('data' => $result));
    }else{
      redirect(base_url());
    }
  }

  public function newsong() {
    $validation_config = array(
      array(
        'field' => 'song_name',
        'label' => 'Nombre',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'song_anno',
        'label' => 'Año',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'song_duration',
        'label' => 'Duración',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'song_genero',
        'label' => 'Genero',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'song_tipo',
        'label' => 'Tipo',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'song_artistas',
        'label' => 'Artistas',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'file',
        'label' => 'Adjunto',
        'rules' => 'required|xss_clean'
      ),
      array(
        'field' => 'disquera',
        'label' => 'Disquera',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'song_letra',
        'label' => 'Letra',
        'rules' => 'trim|required|xss_clean'
      )
    );
    $config['upload_path'] = './public/uploads/';
		$config['allowed_types'] = 'mp3|audio/mp3';
		$config['max_size'] = '20000000';
		$this->load->library('upload', $config);
    if(!$this->upload->do_upload('file')){
			echo json_encode(array(
        'message' => 'Hubo un problema en la subida del archivo',
        'success' => false
      ));
		}else{
      $data = array(
        'nombre' => $this->input->post('song_name'),
        'anno' => $this->input->post('song_anno'),
        'duracion' => $this->input->post('song_duration'),
        'genero' => $this->input->post('song_genero'),
        'tipo' => $this->input->post('song_tipo'),
        'artistas' => $this->input->post('song_artistas'),
        'file' => $this->upload->data(),
        'disquera' => $this->input->post('song_disquera'),
        'letra' => $this->input->post('song_letra')
      );

      echo json_encode(array(
        'message' => 'La nueva canción fue agregada correctamente',
        'success' => true
      ));

    }

  }

}

/* End of file SongsController.php */
/* Location: ./app/controllers/SongsController.php */
