<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

  public function __construct() {
			Parent::__construct();
			$this->load->model("Videos_model","videos");
	}

  /*public function index(){
    $this->load->view('admin/videos');
  }*/

  public function cargar_videos(){
    $titulo = $_POST['titulo'];
    $desc = $_POST['descripcion'];
    var_dump($titulo);
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
        $contador = 0;
        $gestor = opendir($carpeta);
        if($gestor){
          $archivo = [];
          while(($video_file = readdir($gestor)) !== false){
            if($video_file != '.' && $video_file != '..'){
              array_push($archivo, $video_file);
            }
          }
          foreach($archivo as $a){
            if(strpos($a, basename($_FILES['file_upload_video']['name']))){
              $contador ++;
            }
          }
        }
        $target_file = $carpeta .$contador. basename($_FILES['file_upload_video']['name']);
      }
      // Check file size
      if ($_FILES["file_upload_video"]["size"] > 1115343368) {
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
    $this->videos->upload_video($target_file, $titulo, $desc);
    //var_dump($data);
  }
  echo $target_file;
  }

  public function ajax_listado(){
      $resultados = $this->videos->get_datatables();

      $data = array();
      foreach($resultados->result() as $r) { //se crea un array asociativo con cada resultados de la consulta a la BDD
          // $accion = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Editar" onclick="editar_video('."'".$r->id."'".')"><i class="fas fa-user-edit"></i></a>
          //             <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar" onclick="borrar_video('."'".$r->id."'".')"><i class="fas fa-trash"></i></a>';
          $accion = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Editar"><i class="fas fa-user-edit"></i></a>
          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar"><i class="fas fa-trash"></i></a>';
          $video = '<video src="'.base_url().$r->video.'" width=100px controls></video>';
          $data[] = array(
             $r->id,
             $r->titulo,
             $r->fecha,
             $r->descripcion,
             $video,
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
    function borrar_video($id){
      $this->videos->borrar($id);
    }
    function editar_video($id){
      $query = $this->videos->buscar($id);
      $data = array(
        'id' => $query[0]->id,
        'titulo' => $query[0]->titulo,
        'fecha' => $query[0]->fecha,
        'descripcion' => $query[0]->descripcion,
        'video' => $query[0]->video
      );
      echo json_encode($data);
    }
    function update_video($id){
      $titulo = $this->input->post('titulo');
      $desc = $this->input->post('descripcion');
      $this->videos->update($id, $titulo, $desc);
    }

}
