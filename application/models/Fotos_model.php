<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos_model extends CI_Model{
    var $table = "fotos";
    var $column_order = array('id',null);
    var $column_search = array('fotos.foto','fotos.fecha','fotos.id');
    var $order = array('fecha' => 'desc');


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function upload_foto($file, $titulo, $desc){
      $data = array(
        'titulo' => $titulo,
        'descripcion' => $desc,
        'foto' => $file
      );
      $this->db->insert('fotos', $data);
    }
    /*DATATABLES*/
    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item)
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

                if(count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
                $i++;
            }

            if(isset($_POST['order']))
            {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order))
            {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }
    }

    function get_datatables(){
        $this->_get_datatables_query();
        if(isset($_POST['length']) && $_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query;
    }
    function borrar($id){
      $this->db->where('id',$id);
      $this->db->delete($this->table);
    }
    function buscar($id){
      $this->db->from($this->table);
      $this->db->where('id',$id);
      $query = $this->db->get();

      return $query->result();
    }
}
?>
