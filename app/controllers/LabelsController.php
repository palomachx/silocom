<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LabelsController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('LabelsModel');
		$this->load->library('form_validation');
	}

	public function index() {
		if($this->session->userdata('status') == true) {
      $this->load->view('Labelsview');
    }else{
      redirect(base_url());
    }
	}

	public function get() {
		$result = $this->LabelsModel->all();
		echo json_encode(array('data' => $result));
	}

	public function newlabel() {
		$config = array(
      array(
        'field' => 'label',
        'label' => 'Disquera',
        'rules' => 'trim|required|xss_clean'
      )
    );
    $this->form_validation->set_rules($config);
    $this->form_validation->set_error_delimiters('','');
    if($this->form_validation->run() == FALSE) {
			echo json_encode(array(
				'errors' => array(
					'label' => form_error('label')
					),
				'status' => false
				));
		}else{
      $label = $this->input->post('label');
      $result = $this->LabelsModel->newlabel($label);
      if($result != false) {
        echo json_encode(array(
          'message' => 'Disquera agregada correctamente.',
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

}