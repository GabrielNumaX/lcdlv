<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	//Todos los controladores llevan una funcion index y hay
	//que implementarla
	public function index()
	{
		//esta funcion te lleva a la vista Nota
		//a partir de esta vista podes entrar a vistas que esten aca adentro
		$this->load->view('notas');
	}

	//Por ejemplo algo asi te llevaria a otra pagina dondeeste el detalle de una nota
	//se le podria pasar el $id o algo asi.

	public function detalle($id){
		//$this->load->view('detalle/'.id);
	}
}
