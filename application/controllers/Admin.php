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

  public function cargar_fotos($titulo, $desc){
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["file_upload"]["type"])){
      $target_dir = "upload/fotos/";
      $carpeta=$target_dir;
      if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
      }
      $target_file = $carpeta . basename($_FILES["file_upload"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file_upload"]["tmp_name"]);
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
      if ($_FILES["file_upload"]["size"] > 11534336) {
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
        if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
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
    //var_dump($data);
  }
  echo $target_file;
}

public function cargar_videos($titulo, $desc){
  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["file_upload"]["type"])){
    $target_dir = "upload/videos/";
    $carpeta=$target_dir;
    if (!file_exists($carpeta)) {
      mkdir($carpeta, 0777, true);
    }
    $target_file = $carpeta . basename($_FILES["file_upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["file_upload"]["tmp_name"]);
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
    if ($_FILES["file_upload"]["size"] > 111534336) {
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
      if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
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

}
