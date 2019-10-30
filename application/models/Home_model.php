<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    var $table_fotos ="fotos";
    var $table_coment ="comentarios";

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_fotos(){
      $query = $this->db->get($this->table_fotos);
      return $query;
    }
}
?>
