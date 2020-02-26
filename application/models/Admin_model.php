<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    var $table ="admin";
    var $column_order = array('id',null);
    var $column_search = array('admin.id');
    var $order = array('ultimo_log' => 'desc');


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function log($user){
      $this->db->from($this->table);
      $this->db->where('nombre', $user);
      $this->db->or_where('email',$user);

      $query = $this->db->get();
      return $query;
    }
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
    function crear($nombre, $apellido, $email, $tipo, $pass_cypher){
      $this->db->select('email');
      $this->db->where('email', $email);
      $query = $this->db->get($this->table, 1);
      if($query->num_rows() == 1){
        return $query;
      }else{
        $data = array(
          'nombre' => $nombre,
          'apellido' => $apellido,
          'email' => $email,
          'tipo' => $tipo,
          'pass' => $pass_cypher,
          'ultimo_log' => null
        );
        $this->db->insert($this->table, $data);
      }
    }
    function update_fecha($id){
      $this->db->set('ultimo_log', date('Y-m-d H:i:s'));
      $this->db->where('id',$id);
      $this->db->update($this->table);
    }

    function buscar($id){
      $this->db->from($this->table);
      $this->db->where('id',$id);
      $query = $this->db->get();
      return $query->result();
    }
    function update_some($id, $nombre, $apellido, $email, $rol){
      $this->db->set('nombre',$nombre);
      $this->db->set('apellido',$apellido);
      $this->db->set('email',$email);
      $this->db->set('tipo',$rol);
      $this->db->where('id', $id);
      $this->db->update($this->table);
    }
    function update_all($id, $nombre, $apellido, $email, $rol, $password){
      $this->db->set('nombre',$nombre);
      $this->db->set('apellido',$apellido);
      $this->db->set('email',$email);
      $this->db->set('tipo',$tipo);
      $this->db->set('pass',password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]));
      $this->db->where('id',$id);
      $this->db->update($this->table);
    }
}

?>
