<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    var $table_fotos ="fotos";
    var $table_notas = "notas";
    var $table_videos = "videos";
    var $table_coment ="comentarios";

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_fotos(){
      $query = $this->db->get($this->table_fotos);
      return $query;
    }
    public function get_notas(){
      $query = $this->db->get($this->table_notas);
      return $query;
    }
    public function get_videos(){
      $query = $this->db->get($this->table_videos);
      return $query;
    }
    public function get_coment(){
      $query = $this->db->get($this->table_coment);
      return $query;
    }
}
?>
