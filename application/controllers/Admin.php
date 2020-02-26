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
    $pass = $this->input->post('pass');

    $resultado = $this->admin->log($user);
    if($resultado->result()[0] !== null){
      $pass_result = $resultado->result()[0]->pass;
      if(password_verify($pass, $pass_result)){
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
          'mensaje' => 'Contraseña incorrecta'
        );
      }
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
      $this->load->view('admin/admin');
    }
  }
  public function video(){
    if($this->session->userdata('log') == true){
      $this->load->view('admin/videos');
    }else{
      $this->load->view('admin/admin');
    }
  }
  public function nota(){
    if($this->session->userdata('log') == true){
      $this->load->view('admin/notas');
    }else{
      $this->load->view('admin/admin');
    }
  }
  public function comentarios(){
    if($this->session->userdata('log') == true){
      $this->load->view('admin/comentarios');
    }else{
      $this->load->view('admin/admin');
    }
  }
  public function usuarios(){
    if($this->session->userdata('log') == true){
      $this->load->view('admin/usuarios');
    }else{
      $this->load->view('admin/admin');
    }
  }
  public function ajax_listado(){
      $resultados = $this->admin->get_datatables();
      //$url = base_url();
      $data = array();
      foreach($resultados->result() as $r) { //se crea un array asociativo con cada resultados de la consulta a la BDD
          // $accion = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar" onclick="borrar_coment('."'".$r->id."'".')"><i class="fas fa-trash"></i></a>';
          $accion = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar"><i class="fas fa-trash"></i></a>';

          $data[] = array(
             $r->id,
             $r->nombre,
             $r->apellido,
             $r->email,
             $r->ultimo_log,
             $accion
          );
      }

      $output = array(
          "recordsTotal" => $resultados->num_rows(),
          "recordsFiltered" => $resultados->num_rows(),
          "data" => $data // se establecen la cantidad de resultados y los filtros
      );
      echo json_encode($output); // se envian los filtros y los resultados por JSON junto con el array que contiene los datos
      exit();
    }
    function crear_usuario(){
      $nombre = $this->input->post('nombre');
      $apellido = $this->input->post('apellido');
      $email = $this->input->post('email');
      //cifrado de pass
      $pass_cypher = password_hash($this->input->post('pass1'), PASSWORD_BCRYPT, ['cost' => 4]);
      $query = $this->admin->crear($nombre, $apellido, $email, $pass_cypher);

      if($query !== null){
        if($query->num_rows() == 1){
          $mensaje = "El email ingresado ya existe";
          $data = array(
            'mensaje' => $mensaje
          );
          echo json_encode($data);
        }
      }else{
        $mensaje = "Usuario creado con exito";
        $data = array(
          'mensaje' => $mensaje
        );
        echo json_encode($data);
      }

    }

    function borrar_usuario($id){
      $this->admin->borrar($id);
    }

}
