<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios extends CI_Controller {

  public function __construct() {
			Parent::__construct();
			$this->load->model("Comentarios_model","comentarios");
	}

  function subir_comentario(){
    $comentario = $_POST['comentario'];
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    
    switch($tipo){
      case 'foto': $this->comentarios->foto_coment($comentario, $id);
        break;
      case 'video': $this->comentarios->video_coment($comentario, $id);
        break;
      case 'nota': $this->comentarios->nota_coment($comentario, $id);
        break;
    }
  }
}
?>
