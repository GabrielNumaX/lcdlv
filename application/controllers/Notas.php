<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notas extends CI_Controller {

  public function __construct() {
			Parent::__construct();
			$this->load->model("Notas_model","notas");
	}

  /*public function index(){
    $this->load->view('admin/notas');
  }*/

  function cargar_notas(){
    $titulo = $_POST['titulo'];
    $nota = $_POST['nota'];
    $this->notas->upload_nota($titulo, $nota);
    }

  public function ajax_listado(){
    $resultados = $this->notas->get_datatables();

    $data = array();
    foreach($resultados->result() as $r) { //se crea un array asociativo con cada resultados de la consulta a la BDD
        $accion = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Editar" onclick="editar_foto('."'".$r->id."'".')"><i class="fas fa-user-edit"></i></a>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Borrar" onclick="borrar_foto('."'".$r->id."'".')"><i class="fas fa-trash"></i></a>';

        $data[] = array(
            $r->id,
            $r->titulo,
            $r->fecha,
            $r->nota,
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
?>
