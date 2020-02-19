<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios_model extends CI_Model{
    var $table = "comentarios";

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
  }
?>
