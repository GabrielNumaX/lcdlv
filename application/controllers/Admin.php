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
    $user = $this->input->post('user');
    //cifrar la clave
    //$pass = sha1($this->input->post('pass'));
    //clave sin cifrar para pruebas
    $pass = $this->input->post('pass');
    $resultado = $this->admin->log($user, $pass);

    if($resultado == 1){
      $respuesta = array(
        'estado' => true,
        'mensaje' => 'bienvenido'
      );

      $user = array(
        'nombre' => $user,
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
      $this->load->view('admin/inicio');
  }
  public function foto(){
    if($this->session->userdata('log') == true){
      $this->load->view('admin/inicio');
    }else{
      $this->load->view('admin');
    }
  }
  public function video(){
    if($this->session->userdata('log') == true){
      $this->load->view('admin/videos');
    }else{
      $this->load->view('admin');
    }
  }
  public function nota(){
    if($this->session->userdata('log') == true){
      $this->load->view('admin/notas');
    }else{
      $this->load->view('admin');
    }
  }
}
