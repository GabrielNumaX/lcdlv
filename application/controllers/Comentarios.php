<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios extends CI_Controller {

  public function __construct() {
			Parent::__construct();
			$this->load->model("Comentarios_model","comentarios");
	}

  function subir_comentario(){
    // $comentario = $_POST['comentario'];
    // $this->comentarios->update($comentario);

    var_dump($_POST);
    }

//   function editar_nota($id){
//     $query = $this->notas->buscar($id);
//     $data = array(
//       'id' => $query[0]->id,
//       'titulo' => $query[0]->titulo,
//       'nota' => $query[0]->nota,
//       'fecha' => $query[0]->fecha
//     );
//     echo json_encode($data);
//   }
//   function update_nota($id){
//     $titulo = $this->input->post('titulo');
//     $nota = $this->input->post('nota');
//     $this->notas->update($id, $titulo, $nota);
//   }

}
?>