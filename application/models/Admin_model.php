<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    var $table ="admin";
    var $table_photos = "fotos";
    var $table_videos = "videos";
    var $table_notes = "notas";
    var $column_order_photos = array('id',null);
    var $column_search_photos = array('fotos.foto','fotos.fecha','fotos.id');
    var $order_photos = array('fecha' => 'desc');


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
    public function upload_nota($titulo, $nota){
      $data = array(
        'titulo' => $titulo,
        'nota' => $nota
      );
      $this->db->insert('notas', $data);
    }

    /*DATATABLES*/
    private function _get_datatables_query_photos()
    {

        $this->db->from($this->table_photos);

        $i = 0;

        foreach ($this->column_search_photos as $item)
        {
            if(isset($_POST['search']['value']))
            {
                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search_photos) - 1 == $i) {
                    $this->db->group_end();
                }
                $i++;
            }

            if(isset($_POST['order']))
            {
                $this->db->order_by($this->column_order_photos[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_photos))
            {
                $order_photos = $this->order_photos;
                $this->db->order_by(key($order_photos), $order_photos[key($order_photos)]);
            }
        }
    }

    function get_datatables_photos(){
        $this->_get_datatables_query_photos();
        if(isset($_POST['length']) && $_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query;
    }
}

?>
