<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GenrestypesController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('GenrestypesModel');
		$this->load->library('form_validation');
	}

	public function index() {
		if($this->session->userdata('status') == true) {
      $this->load->view('Genrestypesview');
    }else{
      redirect(base_url());
    }
	}

	public function getallgenres() {
		if($this->session->userdata('status') == true){
			$result = $this->GenrestypesModel->get_genres();
      echo json_encode(array(
        'data' => $result
      ));
		} else {
			redirect(base_url());
		}
	}

	public function getalltypes() {
		if($this->session->userdata('status') == true){
			$result = $this->GenrestypesModel->get_types();
      echo json_encode(array(
        'data' => $result
      ));
		} else {
			redirect(base_url());
		}
	}

	public function newgenre() {
		$validation_config = array(
			array(
				'field' => 'genre_name',
				'label' => 'Genero',
				'rules' => 'trim|required|xss_clean'
				)
			);
		$this->form_validation->set_rules($validation_config);
		$this->form_validation->set_error_delimiters('','');
		if($this->form_validation->run() == false) {
			echo json_encode(array(
				'genre' => form_error('genre_name'),
				'success_validation' => false
				));
		} else {
			$genre = $this->input->post('genre_name');
			$result = $this->GenrestypesModel->new_genre($genre);
			if($result) {
				echo json_encode(array(
					'genre' => '',
					'success' => true
					));
			} else {
				echo json_encode(array(
				'genre' => '',
				'success' => false
				));
			}
		}
	}

	public function newtype() {
		$validation_config = array(
			array(
				'field' => 'type_name',
				'label' => 'Genero',
				'rules' => 'trim|required|xss_clean'
				),
			array(
				'field' => 'type_des',
				'label' => 'Descripcion',
				'rules' => 'xss_clean'
				)
			);
		$this->form_validation->set_rules($validation_config);
		$this->form_validation->set_error_delimiters('','');
		if($this->form_validation->run() == false) {
			echo json_encode(array(
				'type_name' => form_error('type_name'),
				'type_des' => form_error('type_des'),
				'success_validation' => false
				));
		} else {
			$type = $this->input->post('type_name');
			$des = $this->input->post('type_des');
			$result = $this->GenrestypesModel->new_type($type, $des);
			if($result) {
				echo json_encode(array(
					'type_name' => '',
					'type_des' => '',
					'success' => true
					));
			} else {
				echo json_encode(array(
					'type_name' => '',
					'type_des' => '',
					'success' => false
					));
			}
		}
	}

}


/* End of file GenrestypesController.php */
/* Location: ./app/controllers/GenrestypesController.php */
