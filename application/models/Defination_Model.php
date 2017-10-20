<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defination_Model extends CI_Model {

	

	public function insert($t="",$value=array())
	{
	return $this->db->insert($t,$value);
	}


  public function getcontractorcnic($search)
{
   
    $query = $this->db->query("SELECT * FROM contractorinformation where cnic like '$search' ");
    return $query->row();
}

public function loctype()
{
return $this->db->where('is_delete',0)->get('locationtype')->result();     

}

public function product()
{
     return $this->db->where('is_deleted',0)->get('product')->result(); 
}


public function getroute()
{
    return $this->db->select()->from('get_route_def')->get()->result_array();
}


public function editroute($id)
{
    return $this->db->select()->from('get_route_def')->where('id',$id)->get()->row();
}


 public function getcontactorcontact($search)
{
   
    $query = $this->db->query("SELECT * FROM contractorinformation where cpnumber like '$search' ");
    return $query->row();
}
 
//expensetype bilal
public function expensetypeDetails($id)
{

        $this->db->select('expensetype.*,expensetype.status as st,admin.first_name as first,admin.last_name as last');
        $this->db->from('expensetype');
        $this->db->join('admin','expensetype.createdBy=admin.id');
        $this->db->where('expensetype.id', $id);
        $this->db->where('expensetype.is_delete',0);
        $result = $this->db->get()->row();
        return $result;

}
//contractor bilal
public function contractorDetails($id)
{

        $this->db->select('*');
        $this->db->from('contractorinformation');
        $this->db->where('contractorinformation.id',$id);
        $this->db->where('contractorinformation.is_deleted',0);
        $result = $this->db->get()->row();
        return $result;

}

//drive bilal

public function driverDetails($id)
{

        $this->db->select('*');
        $this->db->from('driverinformation');
        $this->db->where('driverinformation.id',$id);
        $this->db->where('driverinformation.is_deleted',0);
        $result = $this->db->get()->row();
        return $result;

}

//agent bilal

public function agentDetails($id)
{

        $this->db->select('*');
        $this->db->from('agentinformation');
        $this->db->where('agentinformation.id',$id);
        $this->db->where('agentinformation.is_deleted',0);
        $result = $this->db->get()->row();
        return $result;

}

//company information bilal
public function companyDetails($id)
{

        $this->db->select('*');
        $this->db->from('companyinformation');
      
        $this->db->where('companyinformation.id',$id);
        $this->db->where('companyinformation.is_deleted',0);
        $result = $this->db->get()->row();
        return $result;

}

//customer information bilal
public function customerDetails($id)
{

        $this->db->select('*');
        $this->db->from('customerinformation');
      
        $this->db->where('customerinformation.id',$id);
        $this->db->where('customerinformation.is_deleted',0);
        $result = $this->db->get()->row();
        return $result;

}



//helperinformation bilal
public function helperDetails($id)
{

        $this->db->select('*');
        $this->db->from('helperinformation');
       
        $this->db->where('helperinformation.id',$id);
        $this->db->where('helperinformation.is_deleted',0);
        $result = $this->db->get()->row();
        return $result;

}






public function editgetemailagent($search,$id)
{
    $query = $this->db->query("SELECT * FROM agentinformation 
    where email like '$search' && id!='$id'");
    return $query->row();
}


public function editgetcnicagent($search,$id)
{
    $query = $this->db->query("SELECT * FROM agentinformation
where cnic like '$search' && id!='$id'");
    return $query->row();
}


public function editgetphoneagent($search,$id)
{
    $query = $this->db->query("SELECT * FROM agentinformation where number like '$search' && id!='$id'");
    return $query->row();
}




    public function getagentcnic($search)
{
   
    $query = $this->db->query("SELECT * FROM agentinformation where cnic like '$search' ");
    return $query->row();
}
 

  public function getphoneagent($search)
{
    $query = $this->db->query("SELECT * FROM agentinformation where number like '%$search%' ");
    return $query->row();
}


  public function getphonecomapny($search)
{
    $query = $this->db->query("SELECT * FROM customerinformation where number like '$search' ");
    return $query->row();
}



  public function getphonecontractor($search)
{
    $query = $this->db->query("SELECT * FROM contractorinformation where number like '$search'");
    return $query->row();
}




public function editgetphonecontractor($search,$id)
{
    $query = $this->db->query("SELECT * FROM contractorinformation where number like '$search' && id!='$id'");
    return $query->row();
}




public function editgetemailcontractor($search,$id)
{
    $query = $this->db->query("SELECT * FROM contractorinformation where email like '$search' && id!='$id'");
    return $query->row();
}


public function editgetcniccontractor($search,$id)
{
    $query = $this->db->query("SELECT * FROM contractorinformation where cnic like '$search' && id!='$id'");
    return $query->row();
}




public function editgetcnichelper($search,$id)
{
    $query = $this->db->query("SELECT * FROM helperinformation 
where cnic like '$search' && id!='$id'");
    return $query->row();
}


public function editgetdriverhelper($search,$id)
{
    $query = $this->db->query("SELECT * FROM helperinformation 
where dl like '$search' && id!='$id'");
    return $query->row();
}


public function editgetphonehelper($search,$id)
{
    $query = $this->db->query("SELECT * FROM helperinformation where number like '$search' && id!='$id'");
    return $query->row();
}




 public function getphonehelper($search)
{
    $query = $this->db->query("SELECT * FROM helperinformation where number like '$search' ");
    return $query->row();
}


 public function gethelpercnic($search)
{
   
    $query = $this->db->query("SELECT * FROM helperinformation
 where cnic like '$search' ");
    return $query->row();
}







public function editgetcnicdriver($search,$id)
{
    $query = $this->db->query("SELECT * FROM driverinformation

where cnic like '$search' && id!='$id'");
    return $query->row();
}


public function editgetdriverdriver($search,$id)
{
    $query = $this->db->query("SELECT * FROM driverinformation

where dl like '$search' && id!='$id'");
    return $query->row();
}


public function editgetphonedriver($search,$id)
{
    $query = $this->db->query("SELECT * FROM driverinformation
where number like '$search' && id!='$id'");
    return $query->row();
}







public function getphonedriver($search)
{
    $query = $this->db->query("SELECT * FROM driverinformation
 where number like '$search' ");
    return $query->row();
}


 public function gethelperdriver($search)
{
   
    $query = $this->db->query("SELECT * FROM helperinformation
 where dl like '$search' ");
    return $query->row();
}



 public function getdriverdriver($search)
{
   
    $query = $this->db->query("SELECT * FROM driverinformation
 where dl like '$search' ");
    return $query->row();
}


 public function getagentcontact($search)
{
   
    $query = $this->db->query("SELECT * FROM agentinformation where cpnumber like '$search'");
    return $query->row();
}
 




	 public function getemail($search)
{
   
    $query = $this->db->query("SELECT * FROM agentinformation where email like '$search' ");
    return $query->result_array();
}

     public function getemailcontractor($search)
{
   
    $query = $this->db->query("SELECT * FROM contractorinformation where email like '$search' ");
    return $query->result_array();
}
    
    
    
    
    
    
public function editgetemailcompany($search,$id)
{
    $query = $this->db->query("SELECT * FROM companyinformation
where email like '$search' && id!='$id'");
    return $query->row();
}

  
public function editgetemailcustomer($search,$id)
{
    $query = $this->db->query("SELECT * FROM customerinformation
where email like '$search' && id!='$id'");
    return $query->row();
}


public function editgetcniccompany($search,$id)
{
    $query = $this->db->query("SELECT * FROM companyinformation
where cnic like '$search' && id!='$id'");
    return $query->row();
}


public function editgetcniccustomer($search,$id)
{
    $query = $this->db->query("SELECT * FROM customerinformation
where cnic like '$search' && id!='$id'");
    return $query->row();
}


public function editgetphonecompany($search,$id)
{
    $query = $this->db->query("SELECT * FROM companyinformation where number like '$search' && id!='$id'");
    return $query->row();
}


public function editgetphonecustomer($search,$id)
{
    $query = $this->db->query("SELECT * FROM customerinformation where number like '$search' && id!='$id'");
    return $query->row();
}



    
    
    
    
    
    
    
    
    
    
     public function getemailcompany($search)
{
   
    $query = $this->db->query("SELECT * FROM companyinformation where email like '$search' ");
    return $query->result_array();
}   


 public function getcompanycnic($search)
{
   
    $query = $this->db->query("SELECT * FROM companyinformation where cnic like '$search' ");
    return $query->row();
}



 public function getcustomercnic($search)
{
   
    $query = $this->db->query("SELECT * FROM customerinformation where cnic like '$search' ");
    return $query->row();
}



 
 public function getcompanycontact($search)
{
   
    $query = $this->db->query("SELECT * FROM companyinformation where cpnumber like '$search' ");
    return $query->row();
}

public function getcustomercontact($search)
{
   
    $query = $this->db->query("SELECT * FROM customerinformation where cpnumber like '$search' ");
    return $query->row();
}
 


 public function getdrivercnic($search)
{
   
    $query = $this->db->query("SELECT * FROM driverinformation
where cnic like '$search' ");
    return $query->row();
}
 
   


	public function viewhelper()
	{
        return $this->db->select()->from('helperinformation')->where('is_deleted',0)->order_by("id", "desc")->get()->result_array();
	}	
        
        public function viewcompany()
	{
        return $this->db->select()->from('companyinformation')->where('is_deleted',0)->order_by("id", "desc")->get()->result_array();
	}	

     public function viewcustomer()
    {
        return $this->db->select()->from('customerinformation')->where('is_deleted',0)->order_by("id", "desc")->get()->result_array();
    }   
        
        
         public function viewagent()
	{
        return $this->db->select()->from('agentinformation')->where('is_deleted',0)->order_by("id", "desc")->get()->result_array();
	}	
    
        public function viewdriver()
	{
        return $this->db->select()->from('driverinformation')->where('is_deleted',0)->order_by("id", "desc")->get()->result_array();
	}	
	
      
        
         public function viewcontractor()
	{
        return $this->db->select()->from('contractorinformation')->where('is_deleted',0)->order_by("id", "desc")->get()->result_array();
	}	
        
        


}