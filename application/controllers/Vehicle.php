<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

	
	public function __construct()
	{
	parent::__construct();
	$this->load->model('vehicle_model');
	$this->load->model('generic_model');
	$this->load->library('form_validation');
	$this->load->library('image_lib');
    $this->load->model('user_model');
    $this->load->model('Vehicle_model');
    $this->load->model('load_model');
    $this->user_model->check_login("admin");
    $this->userInfo = $this->user_model->userInfo("first_name,last_name");
	}


	public function show_vehicle()
	{
	$data['menu'] = $this->load_model->menu();
    $data['base_url'] = base_url();
    $data['userInfo'] = $this->userInfo; 
	$data['vehicles']=$this->vehicle_model->get_vehicles();	
	$data['page'] = "Vehicle/show";
	$this->load->view('Template/main', $data);
	}

   public function Vehicle_eye($id)
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $id=$this->uri->segment(3);
        $data['view']=$this->Vehicle_model->vehicleDetails($id);
        $data['view2']=$this->Vehicle_model->vehiclejoinvehicd($id);
        $data['page']='Vehicle/vehicle_details';
        $this->load->view('Template/main',$data);          
        }


	public function add_vehicle()
	{       
	$data['base_url'] = base_url();
    $data['userInfo'] = $this->userInfo; 
    $data['menu'] = $this->load_model->menu();	
	$data['vehicletype'] = $this->Vehicle_model->get_vehicleTyp();
	$data['page'] = "Vehicle/add_vehicle";
	$this->load->view('Template/main', $data);	
	}


    public function save_vehicle()
     {

	if ($this->input->post()) {
        $data=$this->input->post();

    $reg= $this->input->post('registerationno');
    $vec= $this->input->post('vehicle_type');
    $chas= $this->input->post('chassisno');
    $eng= $this->input->post('engineno');
    $cham= $this->input->post('numberofchambe');

   
  
    $totfuel= $this->input->post('totalfuelcapacity');
    $color= $this->input->post('color');
    $comp= $this->input->post('company');
    $mod= $this->input->post('model');
    $url=$this->do_upload();
    $url2=$this->do_upload2();
   
     $admin=json_decode(base64_decode($this->session->admin),true);
     $id=$admin['id'];
                    $field=array(
                    'vehicle_type'=>$vec,
                    'registerationno'=>$reg,
                    'chassisno'=>$chas,
                    'engineno'=>$eng,
                    'company'=>$comp,
                    'numberofchamber1'=>$cham,
                    'totalfuelcapacity'=>$totfuel,
                    'vehicleimage'=>$url,
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id,
                    'color'=>$color,
                    'model'=>$mod
                      );
                             
		   $vehicle_id = $this->vehicle_model->save('vehicle',$field);
           $op=array();
            foreach ($url2 as $key => $value) {
           $op=array(
            'vechile_id'=>$vehicle_id,
            'path'=>$value
            );
$this->vehicle_model->save('vehicle_document', $op);
    }

   //$this->vehicle_model->save_batch('vechile_document', $op); 

            $cap= $this->input->post('capacityofchamber');
            $chamb= $this->input->post('numberofchamber');

		   for ($i = 0; $i<count($chamb); $i++) {
				$data1 = array(
                    'vehicle_id'=>$vehicle_id,
					'numberofchamber'=>$chamb[$i],
					'capacityofchamber'=>$cap[$i],
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id,
				); 
	            $this->vehicle_model->save("chambers", $data1); 

	          } 
	            $this->session->set_flashdata('msg', "Record has been Added Successfully
");
		    redirect('Vehicle/show_vehicle');

	        }else{

	            $this->session->set_flashdata('error', "Record has been not Added Successfully
");
	            redirect('Vehicle/show_vehicle');

	        }

	
        }



         public function update_vehicle()
     {

    if ($this->input->post()) {
        $data=$this->input->post();

    $reg= $this->input->post('registerationno');
    $vec= $this->input->post('vehicle_type');
    $chas= $this->input->post('chassisno');
    $eng= $this->input->post('engineno');
    $cham= $this->input->post('numberofchambe');

   
  
    $totfuel= $this->input->post('totalfuelcapacity');
    $color= $this->input->post('color');
    $comp= $this->input->post('company');
    $mod= $this->input->post('model');
    $url=$this->do_upload();
    $url2=$this->do_upload2();
   
     $admin=json_decode(base64_decode($this->session->admin),true);
     $id=$admin['id'];
                    $field=array(
                    'vehicle_type'=>$vec,
                    'registerationno'=>$reg,
                    'chassisno'=>$chas,
                    'engineno'=>$eng,
                    'company'=>$comp,
                    'numberofchamber1'=>$cham,
                    'totalfuelcapacity'=>$totfuel,
                    'vehicleimage'=>$url,
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id,
                    'color'=>$color,
                    'model'=>$mod
                      );
        $vehicle_id=$this->db->where('id',$data['vehicleid'])->update('vehicle',$field);     
         
           $op=array();
            foreach ($url2 as $key => $value) {
           $op=array(
            'vechile_id'=>$vehicle_id,
            'path'=>$value
            );
    $this->db->where('id',$data['id'])->update('vehicle_document',$op);     
    }

   //$this->vehicle_model->save_batch('vechile_document', $op); 

            $cap= $this->input->post('capacityofchamber');
            $chamb= $this->input->post('numberofchamber');

           for ($i = 0; $i<count($chamb); $i++) {
                $data1 = array(
                    'vehicle_id'=>$vehicle_id,
                    'numberofchamber'=>$chamb[$i],
                    'capacityofchamber'=>$cap[$i],
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id,
                ); 
                $this->vehicle_model->save("chambers", $data1); 

              } 
                $this->session->set_flashdata('msg', "Record has been Added Successfully
");
            redirect('Vehicle/show_vehicle');

            }else{

                $this->session->set_flashdata('error', "Record has been not Added Successfully
");
                redirect('Vehicle/show_vehicle');

            }

    
        }












 public function do_upload2()
     { 
         $images1=array();
        for($i=0; $i<count($_FILES["doc"]["name"]); $i++)
        {
          $type = explode('.', $_FILES["doc"]["name"][$i]);
         $type = $type[count($type)-1];
          $url2 = "Uploads/".$_FILES["doc"]["name"][$i];
         
            $images=array();
            $images=explode(',', $type);
             if (in_array($type, array("png","jpg","jpeg","gif","doc","docx","Doc","Docx","pdf","xlsx","xls","ppt","pptx","rar","zip","csv","txt","avi","mp4","3gp","mpeg","mp3","iso")))
             if(move_uploaded_file($_FILES["doc"]["tmp_name"][$i], $url2)){
              $this->load->library('image_lib');
              $config= array('image_library' =>"gd2" ,
                                'source_image'=>$url2,
                                'maintain_ratio'=>true,
                                 );
              $this->image_lib->initialize($config);
              if($this->image_lib->resize()){

                    $images1[$i]= $url2;
                }
            }
        }
             return $images1;

    }
    

      
        public function edit_vehicle_show($id)
    	{
            
    		$data['base_url'] = base_url();
            $data['userInfo'] = $this->userInfo; 
            $data['menu'] = $this->load_model->menu();
    		$data['edit']=$this->vehicle_model->vehicleDetails($id);

            $data['data']=$this->vehicle_model->get_vehicleType();
            $data['chamber']=$this->vehicle_model->getchamber();
           $data['document']=$this->vehicle_model->get_document();

             if($data['edit']==null){
            redirect('Error/dataNotFound');
            }
            
    	    //    $data['vehicletype'] = $this->vehicle_model->get_vehicleType();
    	
    		$data['page'] = "Vehicle/edit_vehicle";
    		$this->load->view('Template/main', $data);

    		
    	}


        public function edit_vehicle_save()
         {
                if ($this->input->post()) {
        $data=$this->input->post();

    $reg= $this->input->post('registerationno');
    $vec= $this->input->post('vehicle_type');
    $chas= $this->input->post('chassisno');
    $eng= $this->input->post('engineno');
    $cham= $this->input->post('numberofchambe');
    $totfuel= $this->input->post('totalfuelcapacity');
   
    $color= $this->input->post('color');
    $comp= $this->input->post('company');
    $mod= $this->input->post('model');
    $url=$this->do_upload();
    $url2=$this->do_upload2();
     if($url=='')
                    {
                
                  $q=$this->db->select('vehicleimage')->where('id',$data['id'])->get('vehicle')->row();
                   $url=$q->vehicleimage;
                    }
                     if($url2=='')
                    {
                
                  $q=$this->db->select('scanimage')->where('id',$data['id'])->get('vehicle')->row();
                   $url2=$q->scanimage;
                    }


     $admin=json_decode(base64_decode($this->session->admin),true);
        $id=$admin['id'];
                    $field=array(
                    'vehicle_type'=>$vec,
                    'registerationno'=>$reg,
                    'chassisno'=>$chas,
                    'engineno'=>$eng,
                    'company'=>$comp,
                    'numberofchamber1'=>$cham,
                    'totalfuelcapacity'=>$totfuel,
                    'vehicleimage'=>$url,
                    'scanimage'=>$url2,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id,
                    'color'=>$color,
                    'model'=>$mod
                    );
                      
        $vehicle_id=$this->db->where('id',$data['id'])->update('vehicle',$field);

            $cap= $this->input->post('capacityofchamber');
            $chamb= $this->input->post('numberofchamber');

           for ($i = 0; $i<count($chamb); $i++) {
                $data1 = array(
                    'vehicle_id'=>$vehicle_id,
                    'numberofchamber'=>$chamb[$i],
                    'capacityofchamber'=>$cap[$i],
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id,
                ); 
                $this->db->where('id',$data['idd'])->update('chambers',$data1);
	            }
            $this->session->set_flashdata('msg', "Record has been Updated Successfully
");
            redirect('Vehicle/show_vehicle');
}
            else{

	            $this->session->set_flashdata('error', "Record has been not Updated Successfully
");
	            redirect('Vehicle/show_vehicle');

	        }

	
        }
	



    	public function do_upload() {
    	        $type = explode('.', $_FILES["vehicleimage"]["name"]);
    	        $type = $type[count($type) - 1];
    	        $url = "./Uploads/" . uniqid(rand()) . '.' . $type;

    	        if (in_array($type, array("png", "jpg", "jpeg", "gif", "PNG")))
    	            if (move_uploaded_file($_FILES["vehicleimage"]["tmp_name"], $url)) {
    	                $config = array('image_library' => "gd2",
    	                    'source_image' => $url,
    	                    'maintain_ratio' => true,
    	                );
    	                $this->image_lib->initialize($config);
    	                if ($this->image_lib->resize()) {
    	                    return $url;
    	                }
    	            }
    	        return null;
    	    }

        // public function do_upload2() {
        //     $type = explode('.', $_FILES["scanimage"]["name"]);
        //     $type = $type[count($type) - 1];
        //     $url = "./Uploads/" . uniqid(rand()) . '.' . $type;

        //     if (in_array($type, array("png", "jpg", "jpeg", "gif", "PNG")))
        //         if (move_uploaded_file($_FILES["scanimage"]["tmp_name"], $url)) {
        //             $config = array('image_library' => "gd2",
        //                 'source_image' => $url,
        //                 'maintain_ratio' => true,
        //             );
        //             $this->image_lib->initialize($config);
        //             if ($this->image_lib->resize()) {
        //                 return $url;
        //             }
        //         }
        //     return null;
        // }


	
    	public function Vehicle_delete()
    	{

            $id=$this->uri->segment(3);
            $done=$this->db->where('id',$id)->update('vehicle',array('is_deleted'=>1));
            if($done)
            {
            $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
            redirect('Vehicle/show_vehicle');
            }
            else 
            {
            $this->session->set_flashdata('msg',' Record has been not Deleted Successfully
');
            redirect('Vehicle/show_vehicle');
            }


	   }


       public function get_vehicle_by_id($id)
       {
        $vehicle = $this->db->query("SELECT * FROM `vehicle` WHERE `id` = $id")->row_array();
        header("Content-Type: application/json");
        echo json_encode($vehicle);
       }


       public function get_productprice_by_id($id)
       {
        $productprice = $this->db->query("SELECT * FROM `product` WHERE `id` = $id")->row_array();
        header("Content-Type: application/json");
        echo json_encode($productprice);
       }






//==============================Vehicle_Status work starts from here===============
    

public function Vehicle_Status_list()
     {
     $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["vehiclestatus"]=$this->generic_model->getAllRecords("vehiclestatus",array("is_deleted"=>0),"id","DESC");
        $data["page"]='Vehicle/list_vechicles';
        $this->load->view('Template/main',$data);
     }

     


     public function List_delete()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('vehiclestatus',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
        redirect('Vehicle/Vehicle_Status_list');
        }
        else 
        {
        $this->session->set_flashdata('msg','Record has been Deleted Successfully
');
        redirect('Vehicle/Vehicle_Status_list');
        }

        }   
        public function List_states()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('vehiclestatus',array('status'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'vechicles is DeActive!');
        redirect('Vehicle/Vehicle_Status_list');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: vechicles is not DeActive');
        redirect('Vehicle/Vehicle_Status_list');
        }

        }  
        public function List_active()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('vehiclestatus',array('status'=>0));
        if($done)
        {
        $this->session->set_flashdata('msg', 'vechicles is Active!');
        redirect('Vehicle/Vehicle_Status_list');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: vechicles is not Active');
        redirect('Vehicle/Vehicle_Status_list');
        }

        } 


         public function veheyeprint($p="")
        {
           $data['view']=$this->Vehicle_model->vehicleDetails($p);
           $data['view2']=$this->Vehicle_model->vehiclejoinvehicd($p);
           $this->load->view('Vehicle/Vehicleprint',$data);
        }



         public function List_showstates()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('vehicle',array('status'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'vechicles is DeActive!');
        redirect('Vehicle/show_vehicle');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: vechicles is not DeActive');
        redirect('Vehicle/show_vehicle');
        }

        }  
        public function List_showactive()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('vehicle',array('status'=>0));
        if($done)
        {
        $this->session->set_flashdata('msg', 'vechicles is Active!');
        redirect('Vehicle/show_vehicle');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: vechicles is not Active');
        redirect('Vehicle/show_vehicle');
        }

        } 



        public function add_Vehicle_states()
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["page"]='Vehicle/add_list_vechicles';
        $this->load->view('Template/main',$data);

        }  

         public function Vehicle_status_save()
        {
        if ($_POST )
        {
        $admin=json_decode(base64_decode($this->session->admin),true);
        $id=$admin['id'];
        $this->load->model('generic_model');
        $data["heading"]=$this->input->post('name');
        $data["createdAt"]=date("Y-m-d h:i:sa");
        $data["createdBy"]=$id;
         $data["modifiedAt"]=date("Y-m-d h:i:sa");
        $data["modifiedBy"]=$id;
        $this->db->insert('vehiclestatus', $data);
        $this->session->set_flashdata('msg', "Record has been Added Successfully
");
        redirect('Vehicle/Vehicle_Status_list');
        }

        else{
        $this->session->set_flashdata('msg', "Record has been Added Successfully
");
        redirect('Vehicle/Vehicle_Status_list');
        }

        } 

        public function List_edit()
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $id=$this->uri->segment(3);
        $data['vehiclestatus'] = $this->db->select()->from('vehiclestatus')->where('id',$id)
        ->get()->row();
        if($data['vehiclestatus']==""){
                    redirect('Error/dataNotFound');
        }
        	$data["page"]='Vehicle/edit_list_vechicles';
        $this->load->view('Template/main',$data);

        }

          public function Vehicle_status_update()
        {
        if ($_POST )
        {
        $id=$this->input->post('id');
        $data["heading"]=$this->input->post('name');
        $data["modifiedAt"]=date("Y-m-d h:i:sa");
        // $data["createdBy"]=$this->session->userdata('dekho_userId');

          $this->db->where('id',$id);
        $this->db->update('vehiclestatus',$data);

        


        $this->session->set_flashdata('msg', "Record has been Updated Successfully
");
        redirect('Vehicle/Vehicle_Status_list');

        }

        else{
        $this->session->set_flashdata('msg', "Record has been not Updated Successfully
");
        redirect('Vehicle/Vehicle_Status_list');
        }

        } 

       
        //==============================Vehicle_Type work starts from here===============
     public function Vehicle_type_list()
     {
     $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["vehicletype"]=$this->generic_model->getAllRecords("vehicletype",array("is_deleted"=>0),"id","DESC");
        
        $data["page"]='Vehicle/type_vechicles';
        $this->load->view('Template/main',$data);
     }




     public function type_delete()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('vehicletype',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
        redirect('Vehicle/Vehicle_type_list');
        }
        else 
        {
        $this->session->set_flashdata('msg','Record has been not Deleted Successfully
');
        redirect('Vehicle/Vehicle_type_list');
        }

        }   
        public function type_states()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('vehicletype',array('status'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'vechicles is DeActive!');
        redirect('Vehicle/Vehicle_type_list');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: vechicles is not DeActive');
        redirect('Vehicle/Vehicle_type_list');
        }

        }  
        public function type_active()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('vehicletype',array('status'=>0));
        if($done)
        {
        $this->session->set_flashdata('msg', 'vechicles Type is Active!');
        redirect('Vehicle/Vehicle_type_list');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: vechicles Type is not Active');
        redirect('Vehicle/Vehicle_type_list');
        }

        } 

        public function add_Vehicle_type()
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["page"]='Vehicle/add_vehicletype';
        $this->load->view('Template/main',$data);
        }  

         public function Vehicle_type_save()
        {
        if ($_POST )
        {
             $admin=json_decode(base64_decode($this->session->admin),true);
        $id=$admin['id'];
        $this->load->model('generic_model');
        $data["heading"]=$this->input->post('name');
        $data["createdAt"]=date("Y-m-d h:i:sa");
        $data["createdBy"]=$id;
            $data["modifiedAt"]=date("Y-m-d h:i:sa");
            $data["modifiedBy"]=$id;
        $this->db->insert('vehicletype', $data);
        // $this->generic_model->insert("producttype",$data,array("id"=>$id));


        $this->session->set_flashdata('msg', "Record has been Added Successfully
");
        redirect('Vehicle/show_vehicle');

        }

        else{
        $this->session->set_flashdata('msg', "Record has been Not Added Successfully
");
        redirect('Vehicle/show_vehicle');
        }

        } 

        public function type_edit()
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $id=$this->uri->segment(3);
        $data['vehicletype']=$this->db->select()->from('vehicletype')->where('id',$id)
        ->get()->row();
        if($data['vehicletype']==""){
            redirect('Error/dataNotFound');
        }
       // var_dump($data['vehicletype']);
        //die();
        	$data["page"]='Vehicle/edit_type_vechicles';
        $this->load->view('Template/main',$data);

        }

          public function Vehicle_type_update()
        {
        if ($_POST )
        {
        $id=$this->input->post('id');
        $data["heading"]=$this->input->post('name');
        $data["modifiedAt"]=date("Y-m-d h:i:sa");
        // $data["createdBy"]=$this->session->userdata('dekho_userId');

          $this->db->where('id',$id);
        $this->db->update('vehicletype',$data);

        


        $this->session->set_flashdata('msg', "Record has been Updated Successfully");
        redirect('Vehicle/Vehicle_type_list');

        }

        else{
        $this->session->set_flashdata('msg', "Record has been not Updated Successfully
");
        redirect('Vehicle/Vehicle_type_list');
        }

        } 





}

/* End of file Vehicle.php */
/* Location: ./application/controllers/Vehicle.php */

