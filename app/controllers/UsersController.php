<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('UsersModel');
    $this->load->library('form_validation');
  }

  public function index() {
    $data['roles'] = $this->UsersModel->getroles();
    $this->load->view('Usersview', $data);
  }

  public function getallusers() {
    if($this->session->userdata('status') == true){
      $result = $this->UsersModel->all();
      echo json_encode(array(
        'data' => $result
      ));
    }else{
      redirect(base_url());
    }
  }

  public function newuser() {
    $validation_config = array(
      array(
        'field' => 'user_name',
        'label' => 'Nombre de Usuario',
        'rules' => 'trim|required|xss_clean|is_unique[CI_Usuarios.us_username]'
      ),
      array(
        'field' => 'user_rol',
        'label' => 'Rol de Usuario',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'user_nombre',
        'label' => 'Nombre',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'user_apep',
        'label' => 'Apellido Paterno',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'user_apem',
        'label' => 'Apellido Materno',
        'rules' => 'trim|required|xss_clean'
      ),
      array(
        'field' => 'user_pass',
        'label' => 'Contraseña',
        'rules' => 'trim|required|xss_clean|matches[user_repeat_password]'
      ),
      array(
        'field' => 'user_repeat_password',
        'label' => 'Repetir Contraseña',
        'rules' => 'trim|required|xss_clean'
      )
    );
    $this->form_validation->set_rules($validation_config);
    $this->form_validation->set_error_delimiters('','');
    if($this->form_validation->run() == false) {
      echo json_encode(array(
        'username' => form_error('user_name'),
        'rol' => form_error('user_rol'),
        'name' => form_error('user_nombre'),
        'apep' => form_error('user_apep'),
        'apem' => form_error('user_apem'),
        'pass' => form_error('user_pass'),
        'repeat_pass' => form_error('user_repeat_password'),
        'success_validation' => false
      ));
    } else {

      $username = $this->input->post('user_name');
      $rol = $this->input->post('user_rol');
      $nombre = $this->input->post('user_nombre');
      $apep = $this->input->post('user_apep');
      $apem = $this->input->post('user_apem');
      $pass = $this->input->post('user_pass');

      $result = $this->UsersModel->setnewuser($username, $rol, $nombre, $apep, $apem, $pass);

      if($result) {
        echo json_encode(array(
          'username' => '',
          'rol' => '',
          'name' => '',
          'apep' => '',
          'apem' => '',
          'pass' => '',
          'repeat_pass' => '',
          'success' => true
        ));
      } else {
        echo json_encode(array(
          'username' => '',
          'rol' => '',
          'name' => '',
          'apep' => '',
          'apem' => '',
          'pass' => '',
          'repeat_pass' => '',
          'success' => false
        ));
      }

      /*  */
    }
  }

}

/* End of file UsersController.php */
/* Location: ./app/controllers/UsersController.php */
