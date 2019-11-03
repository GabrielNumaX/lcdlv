<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct() {
			Parent::__construct();
			$this->load->model("Admin_model","admin");
      $this->load->library('session');
	}

  public function index(){
    $this->load->view('admin/admin');
  }

  public function login(){
    $usuario = $this->input->post('usuario');
    //cifrar la clave
    //$pass = sha1($this->input->post('pass'));
    //clave sin cifrar para pruebas
    $pass = $this->input->post('password');

    $resultado = $this->admin->log($usuario, $pass);

    if($resultado > 0){
      $respuesta = array(
        'estado' => true,
        'mensaje' => 'bienvenido'
      );

      $user = array(
        'nombre' => $usuario,
        'log' => true,
      );

      $this->session;
      $this->session->set_userdata($user);
      echo json_encode($respuesta);
    }else{
      $respuesta = array(
        'estado' => false,
        'mensaje' => 'No existe el usuario'
      );
      echo json_encode($respuesta);
    }


  }
  //Funcion para cerrar sesion
  public function logout(){
    $this->session->sess_destroy();
  }
  //Verifica que este logueado y carga una vista o la otra
  public function inicio(){
    if($this->session->has_userdata('log')){
      $this->load->view('admin/inicio');
    }else{
      $this->load->view('admin/admin');
    }
  }

}
