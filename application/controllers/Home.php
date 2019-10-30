<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
			Parent::__construct();
			$this->load->model("Home_model","home");
	}

	public function index(){
		$this->load->view('index');
	}

	public function cargar_fotos(){
		$resultado = $this->home->get_fotos();
		$data = array();
		//creo array asociativo con el resultado de la BDD
		foreach($resultado->result() as $r){
			$data[] = array(
				$r->id,
				$r->titulo,
				$r->fecha,
				$r->descripcion,
				base64_encode($r->foto)
			);
		}
		$output = array(
			'data' => $data
		);
		echo json_encode($output);
	}
}
?>
