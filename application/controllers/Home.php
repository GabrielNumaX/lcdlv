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
		$resultado_coment = $this->home->get_coment();
		//creo array asociativo con el resultado de la BDD
		$output = array();
		$comentario_foto = array();
		$comentario_video = array();
		$comentario_nota = array();

		foreach($resultado_foto->result() as $r){
			foreach($resultado_coment->result() as $rc){
				$data_coment = array();
				if(($rc->id_foto !== null) && ($r->id === $rc->id_foto)){
					$data_coment = [
						'tipo' => 'comentario_foto',
						'id' => $rc->id,
						'fecha_coment' => $rc->fecha,
						'comentario' => $rc->comentario,
						'id_foto' => $rc->id_foto
						];

				}
				if(!empty($data_coment)){
					array_push($comentario_foto, $data_coment);
				}
			}
				$data_foto = [
					'id' => $r->id,
					'titulo' => str_replace("%20", " ", $r->titulo),
					'fecha' => $r->fecha,
					'descripcion' => str_replace("%20", " ", $r->descripcion),
					'foto' => $r->foto,
					'tipo' => 'foto',
					'comentarios'=> $comentario_foto
				];
			//Creo array de arrays.
			array_push($output, $data_foto);
			$comentario_foto = array();
		}

		//carga los datos de la bdd (video);
		foreach($resultado_video->result() as $r){
			foreach($resultado_coment->result() as $rc){
				$data_coment = array();
				if(($rc->id_video !== null) && ($r->id === $rc->id_video)){
					$data_coment = [
						'tipo' => 'comentario_video',
						'id' => $rc->id,
						'fecha_coment' => $rc->fecha,
						'comentario' => $rc->comentario,
						'id_video' => $rc->id_video
						];
				}
				if(!empty($data_coment)){
					array_push($comentario_video, $data_coment);
				}
			}
				$data_video = [
					'id' => $r->id,
					'titulo' => str_replace("%20", " ", $r->titulo),
					'fecha' => $r->fecha,
					'descripcion' => str_replace("%20", " ", $r->descripcion),
					'video' => $r->video,
					'tipo' => 'video',
					'comentarios' =>$comentario_video
				];
		array_push($output, $data_video);
		$comentario_video = array();
		}
		//carga los datos de la BDd (notas)
		foreach($resultado_nota->result() as $r){
			foreach ($resultado_coment->result() as $rc) {
				$data_coment = array();
				if(($rc->id_nota !== null) && ($r->id === $rc->id_nota)){
					$data_coment = [
						'tipo' => 'comentario_nota',
						'id' => $rc->id,
						'fecha_coment' => $rc->fecha,
						'comentario' => $rc->comentario,
						'id_nota' => $rc->id_nota
					];
				}
				if(!empty($data_coment)){
					array_push($comentario_nota, $data_coment);
				}
			}
			$data_nota = [
				'id' => $r->id,
				'fecha' => $r->fecha,
				'titulo' => str_replace("%20"," ", $r->titulo),
				'nota' => str_replace("%20"," ", $r->nota),
				'tipo' => 'nota',
				'comentarios' => $comentario_nota
			];
			array_push($output, $data_nota);
			$comentario_nota = array();
		}

		//Funcion para ordenar un array
		function array_sort_by(&$arrIni, $col, $order = SORT_ASC){
	    $arrAux = array();
	    foreach ($arrIni as $key=> $row)
	    {
	        $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
	        $arrAux[$key] = strtolower($arrAux[$key]);
	    }
	    array_multisort($arrAux, $order, $arrIni);
		}
		array_sort_by($output, 'fecha', $order = SORT_DESC);
		//Devuevle el array como JSON
		echo json_encode($output);
	}
}

?>
