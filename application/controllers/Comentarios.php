<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios extends CI_Controller {

  public function __construct() {
			Parent::__construct();
			$this->load->model("Comentarios_model","comentarios");
	}

  function subir_comentario(){

  }
}
?>
