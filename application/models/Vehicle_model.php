<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_model extends CI_Model {

	

	public function get_vehicles()
	 {
		$res=$this->db->select()->from('get_vehicle_info')->get()->result_array();
		return $res;
	 } 


//vehicles details bilal
	 public function vehicleDetails($id)
	 {
        
   //      $this->db->select('vehicle.*,vehicle.status as st,chambers.*');
	 	// $this->db->from('vehicle');
	 	// $this->db->join('chambers','vehicle.id=chambers.vehicle_id');
	 	// $this->db->where('vehicle.id',$id);
	 	// $this->db->where('vehicle.is_deleted',0);
	 	$this->db->select()->from('get_vehicle_info');
	 	$this->db->where('id',$id);
	    return $query=$this->db->get()->row();
	   

	 }


	 public function get_vehicleType()
	 {
	 	$this->db->select('*');
	 	$this->db->from('vehicletype');
	 	$this->db->where('is_deleted = ', 0);
		$result = $this->db->get()->result();
		return $result;
	 }

	  public function get_vehicleTyp()
	 {
	 	$this->db->select('*');
	 	$this->db->from('vehicletype');
	 	$this->db->where('is_deleted = ', 0);
	 	$this->db->where('status',0);
		$result = $this->db->get()->result_array();
		return $result;
	 }


	  public function vehiclejoinvehicd($id)
	 {
        
       $this->db->select('vehicle_document.path as pat');
	 	 $this->db->from('vehicle');
	 	$this->db->join('vehicle_document','vehicle_document.vechile_id=vehicle.id');
	 	$this->db->where('vehicle.is_deleted',0);
	 	$this->db->where('vehicle.id',$id);
	    return $query=$this->db->get()->result();
	   

	 }


	

	 // public function get_vehicle_by_id($id)
	 // { 	

	 // 	$this->db->select('*');
	 // 	$this->db->from('vehicle');
	 // 	$this->db->where('id', $id);
	 // 	$this->db->where('is_deleted = ', 0);
		// $result = $this->db->get()->result_array();
		// return $result;
	 	
	 // }

public function getchamber()
{
	  return $data=$this->db->where('is_deleted',0)->get('chambers')->result();
}


    public function save($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->insert_id() > 0)
            return $this->db->insert_id();
        else
            return FALSE;
    }

   

    public function delete($id)
    {
    	$this->db->where('id',$id)->update('vehicle',array('is_deleted'=>1));
    	redirect('Vehicle/show_vehicle');
    }





}

/* End of file vehicle_model.php */
/* Location: ./application/models/vehicle_model.php */