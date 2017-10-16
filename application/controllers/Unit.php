<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class unit extends CI_Controller {

        public function __construct() 
        {
        parent::__construct();
        //$this->load->model('generic_model');
        //&& $this->uri->segment(1)!="userlogout"
        //  if ($this->session->userdata('dekho_userId') == ''){
        // redirect ('');}
        // else{
        //$this->load->model('backend/model_permissions');
        // }
		
         $this->load->model('generic_model');
  $this->load->model('Generic_model');
         $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('load_model');
        $this->load->model('Product_model');
        $this->user_model->check_login("admin");
        $this->userInfo = $this->user_model->userInfo("first_name,last_name");

        }
		
        public function index()
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;      
        $data["unit"]=$this->generic_model->getAllRecords("unit",array("is_deleted"=>0)
        ,"id","DESC");

        $data['page']='units/list';
        $this->load->view('Template/main',$data);

        }



        public function add()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["page"]='units/add';
        $this->load->view('Template/main',$data);

        }

        public function save()
        {

        if ($_POST )
        {
        $this->form_validation->set_rules('name', 'Name no', 'trim|required');
      //  $this->form_validation->set_rules('dec', 'Description', 'trim|required');
    if($this->form_validation->run()==False)
  {
      $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["page"]='unit/add';
        $this->load->view('Template/main',$data);
  }  
  else{  
        $data["name"]=$this->input->post('name');
    //    $data["description"]=$this->input->post('dec');
        $data["createdAt"]=date("Y-m-d h:i:sa");
        // $data["createdBy"]=$this->session->userdata('dekho_userId');

        $this->db->insert('unit', $data);
    


        $this->session->set_flashdata('msg', "Record has been Added Successfully
");
        redirect('unit/index');
    
     }
        }

        else{
        $this->session->set_flashdata('msg', "Record has been not Added Successfully
");
        redirect('unit/index');
        }

        }
       
		
		
        public function delete()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('unit',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
        redirect('unit/index');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Record has been not Deleted Successfully
');
        redirect('unit/index');
        }

        }   
        public function states()
        {
        
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('unit',array('status'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'unit status is Deactive!');
        redirect('unit/index');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: unit status is not Deactive');
        redirect('unit/index');
        }

        }  
        public function active()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('unit',array('status'=>0));
        if($done)
        {
        $this->session->set_flashdata('msg', 'unit is status is active!');
        redirect('unit/index');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: unit  Status Is Not Active');
        redirect('unit/index');
        }

        }    
        public function edit($id)
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $id=$this->uri->segment(3);

       $data['units'] = $this->db->select()->from('unit')->where('id',$id)
       ->get()->row();
       if($data['units']==""){
                   redirect('Error/dataNotFound');
       }
       //var_dump( $data['units']);
       //die();
        $data['page']='units/edit';
        $this->load->view('Template/main',$data);
        }

        public function update()
        {
        //$this->load->model('generic_model');
        // $id=decode_uri($this->uri->segment(2));
        $id=$this->input->post('id');
        $data["name"]=$this->input->post('name');
        $data["description"]=$this->input->post('dec');
        $data["modifiedAt"]=date("Y-m-d h:i:sa");
        $this->db->where('id',$id);
        $this->db->update('unit',$data);
        $this->session->set_flashdata('msg', "Record has been Updated Successfully
");
        redirect('unit/index');  
        }

//===================== unit add update delete all work start====================// 
        public function list_prodcut()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        
        
        //$data["unit"]=$this->generic_model->getunit();
            $this->db->select('unit.id,unit.price,unit.heading,unit.description,unit.status,unit.name as unitname,unittype.name as pname');
            $this->db->from('unit');
           
             $this->db->join('unittype','unittype.id=unit.unit_type');
              $this->db->join('unit','unit.id=unit.unit_id');
             // $this->db->order_by("course_name","desc")
             // $this->db->order_by('unit_histroy.price','desc');
            $this->db->where('unit.is_deleted',0);
            $query=$this->db->get();
            $data['unit']=$query->result_array();
            
        $data['page']='unit/listunit';
        $this->load->view('Template/main',$data);
        }

        public function add_unit()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["unitid"]=$this->generic_model->getSpecificRecord("unit", array()); 
        $data["unitid"]=$this->generic_model->getSpecificRecord("unit", array()); 
        $data["unittype"]=$this->generic_model->getAllRecords("unittype",array("is_deleted"=>0,"status"=>0),"id","DESC"); 
        $data["unit"]=$this->generic_model->getAllRecords("unit",array("is_deleted"=>0,"status"=>0),"id","DESC"); 
        $data["page"]='unit/add_unit';
        $this->load->view('Template/main',$data);
        }
        public function save_unit()
        {

        if ($_POST )
        {
        $this->form_validation->set_rules('heading', 'Name no', 'trim|required');
        $this->form_validation->set_rules('unit_id', 'Unit select', 'trim|required');
         $this->form_validation->set_rules('unit_type', 'unit type Select', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
         $this->form_validation->set_rules('price', 'price', 'trim|required');
      
    if($this->form_validation->run()==False)
  {
      $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
     $data["unitid"]=$this->generic_model->getSpecificRecord("unit", array()); 
        $data["unitid"]=$this->generic_model->getSpecificRecord("unit", array()); 
        $data["unittype"]=$this->generic_model->getAllRecords("unittype",array("is_deleted"=>0,"status"=>0),"id","DESC"); 
        $data["unit"]=$this->generic_model->getAllRecords("unit",array("is_deleted"=>0,"status"=>0),"id","DESC"); 

        $data["page"]='unit/add_unit';
        $this->load->view('Template/main',$data);
  }  
  else{

        date_default_timezone_set("Asia/Karachi");
        $this->load->model('generic_model');
        $data["heading"]=$this->input->post('heading');
        $data["unit_id"]=$this->input->post('unit_id');
        $data["unit_type"]=$this->input->post('unit_type');
        $data["description"]=$this->input->post('description');
        $data["price"]=$this->input->post('price');
        $histroy["price"]=$this->input->post('price');
        $data["createdAt"]=date("m/d/Y");
        // $data["createdBy"]=$this->session->userdata('dekho_userId');
        
         $this->db->insert("unit",$data);
         $history['p_id'] = $this->db->insert_id();
         $history["price"]=$this->input->post('price');
         $history["date"]=date("m/d/Y");


        
       $this->db->insert("unit_histroy",$history);
     
        
        
        $this->session->set_flashdata('msg', "Add unit, Information has been added successfully");
        redirect('unit/list_prodcut');
        }
    }
        else{
        $this->session->set_flashdata('msg', "Add unit,  reference is missing or incorrect");
        redirect('unit/list_prodcut');
        }

        }

        public function List_delete()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('unit',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'unit is Deleted!');
        redirect('unit/list_prodcut');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: unit is not Deleted');
        redirect('unit/list_prodcut');
        }

        }

        public function List_edit()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
         $id=$this->uri->segment(3);
      
        $data['unit'] = $this->db->select()->from('unit')->where('id',$id)
        ->get()->row();
//$a=1;
       
	   
 $data['histroy'] = $this->db->select()->from('unit_histroy')->where('p_id',$id)
		// $data['histroy'] = $this->db->select()->from('unit_histroy')->where('is_deleted',$a);
        ->get()->row();
      //  var_dump($data['histroy']);
      //  die();
  

// $data['histroy'] = $this->generic_model->get_unit();    
        $data['page']='unit/edit_unit';
        $this->load->view('Template/main',$data);
        }

        public function update_list_unit()
        {
        if($_POST)
        {
        $this->form_validation->set_rules('heading', 'Name no', 'trim|required|alpha');
        $this->form_validation->set_rules('unit_id', 'Unit select', 'trim|required');
         $this->form_validation->set_rules('unit_type', 'unit type Select', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
         $this->form_validation->set_rules('price', 'price', 'trim|required');
      
    if($this->form_validation->run()==False)
  {
  
       $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;    
    $id=$this->input->post('id');
     $data['unit'] = $this->db->select()->from('unit')->where('id',$id)
        ->get()->row();
       // var_dump($data['unit']);
        //die();
        $data['page']='unit/edit_unit';
        $this->load->view('Template/main',$data);

}
else{


        date_default_timezone_set("Asia/Karachi");
        //    $data["id"]=$id;
        $id=$this->input->post('id');
        $this->load->model('generic_model');
        $data["heading"]=$this->input->post('heading');
        $data["unit_id"]=$this->input->post('unit_id');
        $data["price"]=$this->input->post('price');
        $data["unit_type"]=$this->input->post('unit_type');
        $data["description"]=$this->input->post('description');
		
        $histroy["price"]=$this->input->post('price');
        $histroy["p_id"]=$this->input->post('id');
         $histroy["date"]=date("m/d/Y");
        $histroy["startdate"]=$this->input->post('startdate');
        
        $data["modifiedAt"]=date("Y-m-d h:i:sa");
         $da=$this->db->select()->from('unit_histroy')->where('p_id',$id)->get()->row();
                   
                    if( $histroy["price"]==$da->price)
                    {
                    $this->db->where('id',$id);
                    $this->db->update('unit',$data);
                    }
                    else
                    {
                      $this->db->insert("unit_histroy",$histroy);
                       $this->db->where('id',$id);
                       $this->db->update('unit',$data);
                    }
        //var_dump($data);
        //die();
//		$data["startdate"]=$this->input->post('startdate');
        // $data["createdBy"]=$this->session->userdata('dekho_userId');
                $this->db->where('id',$id);
        $this->db->update('unit',$data);

        $this->session->set_flashdata('msg', "Update unit, Information has been added successfully");
        redirect('unit/list_prodcut');
        }
    }
        else{
        $this->session->set_flashdata('msg', "Update unit,  reference is missing or incorrect");
        redirect('unit/list_prodcut');
        }
        }
        
        
        

        //===================== End of  unit add update delete all work start====================// 
             public function states_p()
        {
        
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('unit',array('status'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'unit is deactive!');
        redirect('unit/list_prodcut');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: unit is not deactive');
        redirect('unit/list_prodcut');
        }

        }  
        public function active_p()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('unit',array('status'=>0));
        if($done)
        {
        $this->session->set_flashdata('msg', 'unit is active!');
        redirect('unit/list_prodcut');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: unit is not active');
        redirect('unit/list_prodcut');
        }

        } 


}