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
  public function ajax_listado(){
      $resultados = $this->comentarios->get_datatables();
      //$url = base_url();
      $data = array();
      foreach($resultados->result() as $r) { //se crea un array asociativo con cada resultados de la consulta a la BDD
          // $accion = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar" onclick="borrar_coment('."'".$r->id."'".')"><i class="fas fa-trash"></i></a>';
          $accion = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar"><i class="fas fa-trash"></i></a>';
          if($r->id_foto !== null){
            $tipo = 'Foto';
          }elseif($r->id_video !== null){
            $tipo = 'Video';
          }elseif($r->id_nota !== null){
            $tipo = 'Nota';
          }

          $data[] = array(
             $r->id,
             $r->fecha,
             $r->comentario,
             $tipo,
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
    function borrar_coment($id){
      $this->comentarios->borrar($id);
    }
}
?>
