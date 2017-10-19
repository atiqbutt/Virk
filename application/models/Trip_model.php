<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip_model extends CI_Model {

	
function GetAllTrips($type="") {
    $w;
    if($type==""){
      $this->db->select('*')->from('get_all_trips');
      $w=$this->db->get();
      }
      else{
        $this->db->select()
        ->from('get_all_trips')
        ->where('type',$type);
        $w=$this->db->get();
/*      var_dump($w->result_array());die();*/
      }
       // var_dump ($w->result_array());die;
        if ($w->num_rows() > 0){
         // die();
        return $w->result_array();}
        else {return FALSE; }
    }

 // public function update($id,$data)
 //    {
 //         $this->db->where('id',$id);
 //         $this->db->update('expense',$data);
 //    }


public function multipleproduct($id)

{

foreach ($id as $val) {

  $r[]=$this->db->query("SELECT * FROM `tripproduct` INNER join product on product.id = tripproduct.product_id WHERE tripproduct.is_deleted = 0 AND tripproduct.trip_id = '$val'")->result_array();
}

return $r;

}

public function GetTripProductss($trips='')
{
    if($trips!=''){
        foreach ($trips as $key => $value) {
          // var_dump('<pre>',$value);die;
            $trips[$key]['trip_products'] = $this->db->where('trip_id',$value['id'])->join('product','product.id=tripproduct.product_id')->get('tripproduct')->result_array();
        }
        return $trips;
    }
}



    public function insert($t="",$values=array())
        
    {
        return $this->db->insert($t,$values);
        
    }
    


    public function trip($id)
    {
   //   
   //  
//$er=$this->db->query("SELECT tripmanagement.id, driverinformation.name as name,ex.amount,et.name as expensetype FROM trip_members tm JOIN tripmanagement ON tm.trip_id=tripmanagement.id JOIN driverinformation ON driverinformation.id=tm.member_id join expense ex on ex.trip_id=tripmanagement.id and ex.payee=driverinformation.id join expensetype et on et.id=ex.expensetype_id where tripmanagement.is_deleted=0 AND tm.trip_id='$id' union SELECT tripmanagement.id,helperinformation.name as name,ex.amount,et.name as expensetype FROM tripmanagement JOIN trip_members tme on tme.trip_id=tripmanagement.id join helperinformation ON helperinformation.id=tme.member_id join expense ex on ex.trip_id=tripmanagement.id and ex.payee=helperinformation.id join expensetype et on et.id=ex.expensetype_id where tripmanagement.is_deleted=0 AND tme.trip_id='$id' GROUP BY tme.type")->result_array();
      $er=$this->db->query("SELECT tripmanagement.id as idd,expense.amount as am,expensetype.name as exn,expense.payee,agentinformation.id,agentinformation.name FROM tripmanagement INNER JOIN expense ON tripmanagement.id=expense.trip_id INNER JOIN expensetype ON expensetype.id=expense.expensetype_id INNER JOIN agentinformation ON expense.payee=agentinformation.id and tripmanagement.is_deleted=0 AND tripmanagement.id='$id'")->result_array();
return $er;
    }

//bilal
function gettrips($id='')
{
$er=$this->db->query("SELECT tripmanagement.id,tm.type,driverinformation.id as did,driverinformation.name as name FROM trip_members tm JOIN tripmanagement ON tm.trip_id=tripmanagement.id JOIN driverinformation ON driverinformation.id=tm.member_id where tripmanagement.is_deleted=0 AND tm.trip_id='$id' union SELECT tripmanagement.id,tme.type,helperinformation.id as did,helperinformation.name as name FROM tripmanagement JOIN trip_members tme on tme.trip_id=tripmanagement.id join helperinformation ON helperinformation.id=tme.member_id where tripmanagement.is_deleted=0 AND tme.trip_id='$id' GROUP BY tme.type")->row();
return $er;

}

function gettri($id='')
{
$er=$this->db->query("SELECT tripmanagement.id,tm.type,driverinformation.id as did,driverinformation.name as name FROM trip_members tm JOIN tripmanagement ON tm.trip_id=tripmanagement.id JOIN driverinformation ON driverinformation.id=tm.member_id where tripmanagement.is_deleted=0 AND tm.trip_id='$id' union SELECT tripmanagement.id,tme.type,helperinformation.id as did,helperinformation.name as name FROM tripmanagement JOIN trip_members tme on tme.trip_id=tripmanagement.id join helperinformation ON helperinformation.id=tme.member_id where tripmanagement.is_deleted=0 AND tme.trip_id='$id' GROUP BY tme.type")->result_array();
return $er;

}

function getagent()
{
  return $this->db->where('is_deleted',0)->get('agentinformation')->result_array();
}



function GetSpecificTrip($id) {
      $this->db->select()
        ->from('get_all_trips')
        ->where('id',$id);
     //  ->order_by("id","DESC");
       $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    }


public function getAllRecords($table,$where,$by,$order) {
        $this->db->select()->from($table)->where($where)->order_by($by,$order);
        $query=$this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }


    public function save($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->insert_id() > 0)
            return $this->db->insert_id();
        else
            return FALSE;
    }


    public function GetTripHelper($id)
    {
        $this->db->select('member_id')->from('trip_members')->where('trip_id', $id);
        $query=$this->db->get()->result_array();
      
        $member_id = array_column($query, 'member_id');


        $name = $this->db->select('name')->from('helperinformation')->where_in('id', $member_id);

        $q=$this->db->get()->result_array();
        return $q;
    
    }

    public function GetVechInfo($vechid)
    {

       $this->db->select('numberofchamber1, capacityofchamber')->from('vehicle')->where('id', $vechid);
       $query=$this->db->get()->result_array();
       return $query;
      
    }


    public function GetTripProducts($id)
    {
       $this->db->select('*')->from('tripproduct')->join('product', 'tripproduct.product_id = product.id ', 'right')->where('trip_id', $id);
       $query=$this->db->get()->result_array();
       return $query;
    }



    public function FilledBy($filledBy)
    {

       $this->db->select('name')->from('driverinformation')->where('id', $filledBy);
       $query=$this->db->get()->row_array();
       return $query;
    }



    public function uncannedBy($uncannedBy, $id)
    {

       $this->db->select('*')->from('trip_members')->where('member_id', $uncannedBy)->where('trip_id', $id);
       $res=$this->db->get()->row_array();

         $tripType = $res['type'];
   
       if ($tripType == 'driver') {
          $this->db->select('id, name')->from('driverinformation')->where('id', $uncannedBy);
          $query=$this->db->get()->row_array();

          return $query;
       }else{
          $this->db->select('id, name')->from('helperinformation')->where('id', $uncannedBy);
          $query=$this->db->get()->row_array();
          return $query;

       }

    }

    public function get_closedTrip_data($id)
    {
       $this->db->select('*')->from('tripmanagement')->where('id', $id)->where('status', '1');
       $query=$this->db->get()->row_array();
       return $query;
    }


  public function GetSourceOrDest($id)
  {
       $this->db->select('*')->from('locationtype')->where('id', $id)->where('is_delete', '0');
       $query=$this->db->get()->row_array();
       return $query;
  }



}

/* End of file Trip_model.php */
/* Location: ./application/models/Trip_model.php */

