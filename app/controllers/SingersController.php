<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SingersController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('SingersModel');
    $this->load->library('form_validation');
  }

  public function index() {
    if($this->session->userdata('status') == true) {
      $this->load->view('Singersview');
    }else{
      redirect(base_url());
    }
  }

  public function getallsingers() {
    if($this->session->userdata('status') == true) {
      $result = $this->SingersModel->all();
      echo json_encode(array('data' => $result));
    }else{
      redirect(base_url());
    }
  }

  public function newsinger() {
    $config = array(
      array(
        'field' => 'singer',
        'label' => 'Artista',
        'rules' => 'trim|required|xss_clean'
      )
    );
    $this->form_validation->set_rules($config);
    $this->form_validation->set_error_delimiters('','');
    if($this->form_validation->run() == FALSE) {
			echo json_encode(array(
				'errors' => array(
					'singer' => form_error('singer')
					),
				'status' => false
				));
		}else{
      $singer = $this->input->post('singer');
      $result = $this->SingersModel->newsinger($singer);
      if($result != false) {
        echo json_encode(array(
          'message' => 'Artista agregado correctamente.',
          'status' => true
        ));
      }else {
        echo json_encode(array(
          'message' => 'Ups! Ah ocurrido un problema.',
          'errors' => '',
          'status' => false
        ));
      }
    }
  }

  public function deleteSinger($id_singer) {
    $result = $this->SingersModel->removeSinger($id_song);
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

/* End of file SingersController.php */
/* Location: ./app/controllers/SingersController.php */
