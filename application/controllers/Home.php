<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	//carga el modelo
	public function __construct() {
			Parent::__construct();
			$this->load->model("Home_model","home");
	}

	public function index(){
		$this->load->view('index');
	}
	//Funcion para recuperar todas las fotos de la BDD
	public function cargar_fotos(){
		$resultado = $this->home->get_fotos();
		//creo array asociativo con el resultado de la BDD
		$output = array();
		foreach($resultado->result() as $r){
			$data = [
				'id' => $r->id,
				'titulo' => $r->titulo,
				'fecha' => $r->fecha,
				'descripcion' => $r->descripcion,
				'foto' => $r->foto
			];
			//Creo array de arrays.
			array_push($output, $data);
		}
		//devuelve JSON
		echo json_encode($output);
	}
}
?>
