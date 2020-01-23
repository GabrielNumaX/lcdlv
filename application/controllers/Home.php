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
	//Funcion para recuperar de la BDD
	public function cargar_todo(){
		$resultado_foto = $this->home->get_fotos();
		$resultado_nota = $this->home->get_notas();
		$resultado_video = $this->home->get_videos();
		//creo array asociativo con el resultado de la BDD
		$output = array();
		foreach($resultado_foto->result() as $r){
			$data_foto = [
				'id' => $r->id,
				'titulo' => str_replace("%20", " ", $r->titulo),
				'fecha' => $r->fecha,
				'descripcion' => str_replace("%20", " ", $r->descripcion),
				'foto' => $r->foto,
				'tipo' => 'foto'
			];
			//Creo array de arrays.
			array_push($output, $data_foto);
		}
		//carga los datos de la bdd (video);
		foreach($resultado_video->result() as $r){
			$data_video = [
				'id' => $r->id,
				'titulo' => str_replace("%20", " ", $r->titulo),
				'fecha' => $r->fecha,
				'descripcion' => str_replace("%20", " ", $r->descripcion),
				'video' => $r->video,
				'tipo' => 'video'
			];
			array_push($output, $data_video);
		}
		//carga los datos de la BDd (notas)
		foreach($resultado_nota->result() as $r){
			$data_nota = [
				'id' => $r->id,
				'fecha' => $r->fecha,
				'titulo' => str_replace("%20"," ", $r->titulo),
				'nota' => str_replace("%20"," ", $r->nota),
				'tipo' => 'nota'
			];
			array_push($output, $data_nota);
		}
		//devuelve JSON
		echo json_encode($output);
	}
}
?>
