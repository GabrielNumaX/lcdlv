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

  // public function cargar_fotos($titulo, $desc){

    public function cargar_fotos(){
    $titulo = $_POST['titulo'];
    $desc = $_POST['descripcion'];

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["file_upload_foto"]["type"])){
      $target_dir = "upload/fotos/";
      $carpeta=$target_dir;
      if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
      }
      $target_file = $carpeta . basename($_FILES["file_upload_foto"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file_upload_foto"]["tmp_name"]);
        if($check !== false) {
          $errors[]= "El archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          $errors[]= "El archivo no es una imagen.";
          $uploadOk = 0;
        }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
        $errors[]="Lo sentimos, archivo ya existe.";
        $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["file_upload_foto"]["size"] > 11534336) {
        $errors[]= "Lo sentimos, el archivo es demasiado grande.  Tamaño máximo admitido: 11 MB";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $errors[]= "Lo sentimos, sólo archivos JPG, JPEG, PNG & GIF  son permitidos.";
        $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $errors[]= "Lo sentimos, tu archivo no fue subido.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["file_upload_foto"]["tmp_name"], $target_file)) {
          $messages[]= "El Archivo ha sido subido correctamente.";


        } else {
         $errors[]= "Lo sentimos, hubo un error subiendo el archivo.";
       }
      }
  }
  if (isset($errors)){
    $data = array();
    foreach ($errors as $error) {
      $data[] .= $error;
    }
    //var_dump($data);
  }
  if(isset($messages)){
    $data = array();
    foreach ($messages as $message) {
      $data[] .= $message;
    }

    $this->admin->upload_foto($target_file, $titulo, $desc);

  }
  echo $target_file;
}

public function cargar_videos(){
  $titulo = $_POST['titulo'];
  $desc = $_POST['descripcion'];
  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["file_upload_video"]["type"])){
    $target_dir = "upload/videos/";
    $carpeta=$target_dir;
    if (!file_exists($carpeta)) {
      mkdir($carpeta, 0777, true);
    }
    $target_file = $carpeta . basename($_FILES["file_upload_video"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["file_upload_video"]["tmp_name"]);
      if($check !== false) {
        $errors[]= "El archivo es un video - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $errors[]= "El archivo no es un video.";
        $uploadOk = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      $errors[]="Lo sentimos, archivo ya existe.";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["file_upload_video"]["size"] > 111534336) {
      $errors[]= "Lo sentimos, el archivo es demasiado grande.  Tamaño máximo admitido: 111 MB";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "mp4" && $imageFileType != "mkv" && $imageFileType != "avi"
    && $imageFileType != "wmv" ) {
      $errors[]= "Lo sentimos, sólo archivos MP4, MKV, AVI & WMV  son permitidos.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $errors[]= "Lo sentimos, tu archivo no fue subido.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["file_upload_video"]["tmp_name"], $target_file)) {
        $messages[]= "El Archivo ha sido subido correctamente.";


      } else {
       $errors[]= "Lo sentimos, hubo un error subiendo el archivo.";
     }
    }
}
if (isset($errors)){
  $data = array();
  foreach ($errors as $error) {
    $data[] .= $error;
  }
  //var_dump($data);
}
if(isset($messages)){
  $data = array();
  foreach ($messages as $message) {
    $data[] .= $message;
  }
  $this->admin->upload_video($target_file, $titulo, $desc);
  //var_dump($data);
}
echo $target_file;
}

function cargar_notas(){
  $titulo = $_POST['titulo'];
  $nota = $_POST['nota'];
  $this->admin->upload_nota($titulo, $nota);
}
//datatables
public function ajax_listado_fotos(){
    $resultados = $this->admin->get_datatables_photos();

    $data = array();
    foreach($resultados->result() as $r) { //se crea un array asociativo con cada resultados de la consulta a la BDD
        $accion = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Editar" onclick="editar_foto('."'".$r->id."'".')"><i class="fas fa-user-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar" onclick="borrar_foto('."'".$r->id."'".')"><i class="fas fa-trash"></i></a>';

        $data[] = array(
           $r->id,
           $r->titulo,
           $r->fecha,
           $r->descripcion,
           $r->foto,
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

}
