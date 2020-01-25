<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    var $table ="admin";

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function log($usuario, $pass){
      $this->db->from($this->table);
      $this->db->where('nombre', $usuario);
      $this->db->where('pass',$pass);

      $query = $this->db->get()->num_rows();
      return $query;
    }

    public function upload_foto($file, $titulo, $desc){
      $data = array(
        'titulo' => $titulo,
        'descripcion' => $desc,
        'foto' => $file
      );
      $this->db->insert('fotos', $data);
    }

    public function upload_video($file, $titulo, $desc){
      $data = array(
        'titulo' => $titulo,
        'descripcion' => $desc,
        'video' => $file
      );
      $this->db->insert('videos', $data);
    }
}
?>
