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
    if($resultado->num_rows() == 1){
      $pass_result = $resultado->result()[0]->pass;
      if(password_verify($pass, $pass_result)){
        $respuesta = array(
          'estado' => true,
          'mensaje' => 'bienvenido'
        );

        $user = array(
          'id' => (int) $resultado->result()[0]->id,
          'nombre' => $resultado->result()[0]->nombre,
          'email' => $resultado->result()[0]->email,
          'log' => true,
          'rol' => $resultado->result()[0]->tipo
        );

        $this->session;
        $this->session->set_userdata($user);
        $this->admin->update_fecha($resultado->result()[0]->id);
        echo json_encode($respuesta);
      }else{
        $respuesta = array(
          'estado' => false,
          'mensaje' => 'Contraseña incorrecta'
        );
        echo json_encode($respuesta);
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
        if($r->tipo == 1){
          $accion = '<button disabled class="btn btn-sm btn-danger" title="Admin"><i class="fas fa-trash"></i></button>';
          $tipo = '<strong style="color:red">Administrador</strong>';
        }else{
          $accion = '<button class="btn btn-sm btn-danger" title="Borrar"><i class="fas fa-trash"></i></button>';
          $tipo = '<p style="color:blue">Usuario</p>';
        }


          $data[] = array(
             $r->id,
             $r->nombre,
             $r->apellido,
             $r->email,
             $tipo,
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
      $tipo = $this->input->post('tipo');
      //cifrado de pass
      $pass_cypher = password_hash($this->input->post('pass1'), PASSWORD_BCRYPT, ['cost' => 4]);
      $query = $this->admin->crear($nombre, $apellido, $email, $tipo, $pass_cypher);

      if($query !== null){
        if($query->num_rows() == 1){
          $mensaje = "El email ingresado ya existe";
          $data = array(
            'mensaje' => $mensaje,
            'creado' => false
          );
          echo json_encode($data);
        }
      }else{
        $mensaje = "Usuario creado con exito";
        $data = array(
          'mensaje' => $mensaje,
          'creado' => true
        );
        echo json_encode($data);
      }

    }

    function borrar_usuario($id){
      $this->admin->borrar($id);
    }

    function update_user($id){
      $query = $this->admin->buscar($id);
      $data = array(
        'id' => $query[0]->id,
        'nombre' => $query[0]->nombre,
        'apellido' => $query[0]->apellido,
        'email' => $query[0]->email,
        'pass' => $query[0]->pass,
        'tipo' => $query[0]->tipo
      );
      echo json_encode($data);
    }
    function save_user(){
      $id = $this->input->post('id');
      $nombre = $this->input->post('name');
      $apellido = $this->input->post('surname');
      $email = $this->input->post('email');
      $rol = $this->input->post('rol');

      if($this->input->post('pass1') === $this->input->post('pass2')){
        if($this->input->post('pass1') !== "" && $this->input->post('pass2')){
          $resultado = $this->admin->update_all($id, $nombre, $apellido, $email, $rol, $this->input->post('pass1'));
          if($resultado){
            $data = array(
              'estado' => true,
              'mensaje' => 'Usuario actulizado con exito'
            );
            echo json_encode($data);
          }else{
            $data = array(
              'estado' => false,
              'mensaje' => 'Ocurrio un error'
            );
            echo json_encode($data);
          }
        }else{
          $resultado = $this->admin->update_some($id, $nombre, $apellido, $email, $rol);
          if($resultado){
            $data = array(
              'estado' => true,
              'mensaje' => 'Usuario actualizado con exito'
            );
            echo json_encode($data);
          }else{
            $data = array(
              'estado' => false,
              'mensaje' => 'Ocurrio un error'
            );
            echo json_encode($data);
          }
        }
      }
    }

}
