<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios_model extends CI_Model{
    var $table = "comentarios";

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function foto_coment($comentario, $id){
      $data = array(
        'fecha' =>date('Y-m-d H:i:s'),
        'comentario' => $comentario,
        'id_foto'=> $id
      );
      $this->db->insert($this->table, $data);
    }
    public function video_coment($comentario, $id){
      $data = array(
        'fecha' =>date('Y-m-d H:i:s'),
        'comentario' => $comentario,
        'id_video'=> $id
      );
      $this->db->insert($this->table, $data);
    }
    public function nota_coment($comentario, $id){
      $data = array(
        'fecha' =>date('Y-m-d H:i:s'),
        'comentario' => $comentario,
        'id_nota'=> $id
      );
      $this->db->insert($this->table, $data);
    }
  }
?>
