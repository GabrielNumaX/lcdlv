<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Controller {

	public function archivos()
	{
		$this->load->view('archivo');
	}
}