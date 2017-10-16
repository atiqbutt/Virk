<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	

	

//product details bilal
 public function productDetails($id)
	 { 	

	
	 	$this->db->select('`producttype`.`name` as `na`,unit.name as n,`product`.*,product.status as st');
	 	$this->db->from('product');
	 	$this->db->join('producttype','product.id=producttype.id');
	 	$this->db->join('unit','product.unit_id=unit.id');
	 	$this->db->where('product.id', $id);
	 	$this->db->where('product.is_deleted',0);
		$result = $this->db->get()->row();
		return $result;
	 	
	 }









}
