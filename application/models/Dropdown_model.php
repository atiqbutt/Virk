<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown_model extends CI_Model {

public function producttype()
{

$this->db->select('id,name')->from('producttype');
$this->db->where('is_deleted',0);
$query=$this->db->get()->result_array();

}	

 function getAllRecords($table,$where) {
        $this->db->select()->from($table)->where($where);
        return $query=$this->db->get()->result_array();
        



}
}


