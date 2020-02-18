<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios_model extends CI_Model{
    var $table = "comentarios";
    var $column_order = array('id',null);
    var $column_search = array('comentarios.comentario','comentarios.fecha','comentarios.id');
    var $order = array('fecha' => 'desc');


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function update($comentario){
        $this->db->set('comentario', $comentario);
        $this->db->set('fecha',date('Y-m-d H:i:s'));
        $this->db->update($this->table);
      }
  }
?>