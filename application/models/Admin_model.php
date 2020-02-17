<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    var $table ="admin";


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function log($user, $pass){
      $this->db->from($this->table);
      $this->db->where('nombre', $user);
      $this->db->where('pass',$pass);

      $query = $this->db->get()->num_rows();
      return $query;
    }

}

?>
