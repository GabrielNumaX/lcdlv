<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos extends CI_Controller {

  public function __construct() {
			Parent::__construct();
			$this->load->model("Fotos_model","fotos");
	}

  /*public function index(){
    $this->load->view('admin/inicio');
  }*/

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
    // Verifica si existe el archivo y lo renombra
    if (file_exists($target_file)) {
      $contador = 0;
      $gestor = opendir($carpeta);
      if($gestor){
        $archivo = [];
        while(($foto_file = readdir($gestor)) !== false){
          if($foto_file != '.' && $foto_file != '..'){
            array_push($archivo, $foto_file);
          }
        }
        foreach($archivo as $a){
          if(strpos($a, basename($_FILES['file_upload_foto']['name']))){
            $contador ++;
          }
        }
      }
      $target_file = $carpeta . $contador . basename($_FILES['file_upload_foto']['name']);
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

  $this->fotos->upload_foto($target_file, $titulo, $desc);

  }
  echo $target_file;
}

public function ajax_listado(){
    $resultados = $this->fotos->get_datatables();
    //$url = base_url();
    $data = array();
    foreach($resultados->result() as $r) { //se crea un array asociativo con cada resultados de la consulta a la BDD
        $accion = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Editar" onclick="editar_foto('."'".$r->id."'".')"><i class="fas fa-user-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar" onclick="borrar_foto('."'".$r->id."'".')"><i class="fas fa-trash"></i></a>';
        $foto = '<img src="'.base_url().$r->foto.'" width=50px>';
        $data[] = array(
           $r->id,
           $r->titulo,
           $r->fecha,
           $r->descripcion,
           $foto,
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
  function borrar_foto($id){
    $this->fotos->borrar($id);
  }
  function editar_foto($id){
    $query = $this->fotos->buscar($id);
    $data = array(
      'id' => $query[0]->id,
      'titulo' => $query[0]->titulo,
      'fecha' => $query[0]->fecha,
      'descripcion' => $query[0]->descripcion,
      'foto' => $query[0]->foto
    );
    echo json_encode($data);
  }
  function update_foto($id){
    $titulo = $this->input->post('titulo');
    $desc = $this->input->post('descripcion');
    $this->fotos->update($id, $titulo, $desc);
  }
}

?>
