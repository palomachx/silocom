<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SongsController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('SongsModel');
    $this->load->library('form_validation');
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
        'rules' => 'required|xss_clean'
      ),
      array(
        'field' => 'song_disquera',
        'label' => 'Disquera',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'song_letra',
        'label' => 'Letra',
        'rules' => 'trim|xss_clean'
      )
    );
    $this->form_validation->set_rules($validation_config);
    if(empty($_FILES['file']['name'])){
      $this->form_validation->set_rules('file', 'Adjunto', 'required');
    }
    $this->form_validation->set_error_delimiters('','');
    if($this->form_validation->run() == false) {
      echo json_encode(array(
        'name' => form_error('song_name'),
        'anno' => form_error('song_anno'),
        'duration' => form_error('song_duration'),
        'genero' => form_error('song_genero'),
        'tipo' => form_error('song_tipo'),
        'artista' => form_error('song_artistas'),
        'file' => form_error('file'),
        'disquera' => form_error('song_disquera'),
        'success_validation' => false
      ));
    }else{
      $config['upload_path'] = './public/uploads/';
      $config['allowed_types'] = 'mp3|audio/mp3';
      $config['max_size'] = '20000000';
      $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('file')){
        echo json_encode(array(
          'name' => '',
          'anno' => '',
          'duration' => '',
          'genero' => '',
          'tipo' => '',
          'artista' => '',
          'file' => '',
          'disquera' => '',
          'message' => 'Hubo un problema al subir un archivo, o la extensión no es válida.',
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

        $songid = $this->SongsModel->songnew($data['nombre'], $data['anno'], $data['duracion'], $data['genero'], $data['tipo'], $data['disquera'], $data['file']['file_name'], $data['letra']);

        if($songid != 0){
          $artistas = [];
          foreach($data['artistas'] as &$artista){
            array_push($artistas, array(
              'art_id' => $artista,
              'can_id' => $songid
            ));
          }

          $result = $this->SongsModel->setArtistatoSong($artistas);
          if($result) {
            echo json_encode(array(
              'name' => '',
              'anno' => '',
              'duration' => '',
              'genero' => '',
              'tipo' => '',
              'artista' => '',
              'file' => '',
              'disquera' => '',
              'message' => 'La canción se ha registrado.',
              'success' => true
            ));
          }else{
            echo json_encode(array(
              'name' => '',
              'anno' => '',
              'duration' => '',
              'genero' => '',
              'tipo' => '',
              'artista' => '',
              'file' => '',
              'disquera' => '',
              'message' => 'Ocurrio un problema.',
              'success' => false
            ));
          }
        }else{
          echo json_encode(array(
            'name' => '',
            'anno' => '',
            'duration' => '',
            'genero' => '',
            'tipo' => '',
            'artista' => '',
            'file' => '',
            'disquera' => '',
            'message' => 'Hubo un al registrar la canción.',
            'success' => false
          ));
        }
      }
    }
  }

  public function delete_song($id_song) {
    $result = $this->SongsModel->removeSong($id_song);
    if($result){
      echo json_encode(array(
        'success' => true,
        'message' => 'Canción eliminada correctamente.'
      ));
    }else{
      echo json_encode(array(
        'success' => false,
        'message' => 'Ocurrio un problema al realizar la petición.'
      ));
    }
  }

}

/* End of file SongsController.php */
/* Location: ./app/controllers/SongsController.php */
