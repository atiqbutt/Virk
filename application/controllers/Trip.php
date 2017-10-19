<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trip extends CI_Controller {

        public function __construct() 
        {
            parent::__construct();
            $this->load->model('trip_model');
            $this->load->model('generic_model');
            $this->load->library('form_validation');
            $this->load->model('generic_model');
            $this->load->library('form_validation');
            $this->load->model('user_model');
            $this->load->model('load_model');
            $this->user_model->check_login("admin");
            $this->userInfo = $this->user_model->userInfo("first_name,last_name");
        }

        public function index()
        {
            $data['menu'] = $this->load_model->menu();
            $data['base_url'] = base_url();
            $data['userInfo'] = $this->userInfo;  
			$data["expensetype"]=$this->trip_model->getAllRecords("expensetype",array("is_delete"=>0),"id","DESC");	
			$data["tripmanagement"]=$this->trip_model->GetAllTrips();

			$data["page"]='Trip/trip_list';
            $this->load->view('Template/main',$data);

        }

        public function edit_trip($id)
        {

            $data['menu'] = $this->load_model->menu();
            $data['base_url'] = base_url();
            $data['userInfo'] = $this->userInfo;
            $data["expensetype"]=$this->trip_model->getAllRecords("expensetype",array("is_delete"=>0),"id","DESC"); 
            $data["tripmanagement"]=$this->trip_model->gettrips($id);
            $data["trip"]=$this->trip_model->trip($id);
            // $data["tri"]=$this->trip_model->gettri($id);
            $data['tri']=$this->trip_model->getagent();

            $data["page"]='Trip/tripexpense';
            $this->load->view('Template/main',$data);

        }


       public function expenseadd()
        {


            $data['menu'] = $this->load_model->menu();
            $data['base_url'] = base_url();
            $data['userInfo'] = $this->userInfo;
          
            $id=$this->input->post('idt');
          //  $ex=$this->input->post('expense');

            // $dr=$this->input->post('driver');
            
             $e1=$this->input->post('expense');
             $pay=$this->input->post('driver');
             $am=$this->input->post('amount');
             

                $data2=array();
               for($i=0; $i<count($e1); $i++)
               {
                     $data2[]=array(
                    'trip_id'=>$id,
                    'expensetype_id'=>$e1[$i],
                    'date'=>date("Y-m-d h:i:sa"),
                    'amount'=>$am[$i],
                    'payee'=>$pay[$i]
                    );

//           $this->trip_model->insert('expense',$data2);

                
   
               }
               $this->db->insert_batch('expense',$data2);
                $update = ['IsExpenseAdded' => 1];

                 $this->db->where('id', $id);
                 $this->db->update('tripmanagement', $update);
                redirect('Trip/index');
              
               // $this->db->insert_batch('expense',$data2);
                
               //  redirect('Trip/index');                 
}

    public function get_data($type1)
        {
        $data["expensetype"]=$this->trip_model->getAllRecords("expensetype",array("is_delete"=>0),"id","DESC"); 
        $data["tripmanagement"]=$this->trip_model->GetAllTrips($type1);
        return $this->load->view('Trip/trip_data',$data);

        }


	public function close_trip($id)
       {

            $data["driver1"]=$this->trip_model->getAllRecords("driverinformation",array("is_deleted"=>0, "status"=>0),"id","DESC");
            $data['menu'] = $this->load_model->menu();
            $data['base_url'] = base_url();
            $data['userInfo'] = $this->userInfo; 
			$data['tripid'] = $id;
			$data["trip_info"]=$this->trip_model->GetSpecificTrip($id);

            $vechileid = $data["trip_info"][0]['vechileid'];

            $data["vech_info"]=$this->trip_model->GetVechInfo($vechileid);

            $data["driver1"]=$this->db->query('select driverinformation.id as did,driverinformation.name as name FROM trip_members tm JOIN tripmanagement ON tm.trip_id=tripmanagement.id JOIN driverinformation ON driverinformation.id=tm.member_id where tripmanagement.is_deleted=0 AND tm.trip_id='.$id.' union SELECT helperinformation.id as did,helperinformation.name as name FROM tripmanagement JOIN trip_members tme on tme.trip_id=tripmanagement.id join helperinformation ON helperinformation.id=tme.member_id where tripmanagement.is_deleted=0 AND tme.trip_id='.$id.' GROUP BY tme.type')->result_array();



            $filledBy = $data["trip_info"][0]['filled_by'];
            $data["filledby"]=$this->trip_model->FilledBy($filledBy);
            $data["helper"]=$this->trip_model->GetTripHelper($id);
            $data["products"]=$this->trip_model->GetTripProducts($id);
            


            $data["source"]=$this->trip_model->GetSourceOrDest($data["products"][0]['source']);

            $data["destination"]=$this->trip_model->GetSourceOrDest($data["products"][0]['destination']);

			$data["expensetype"]=$this->trip_model->getAllRecords("expensetype",array("is_delete"=>0),"id","DESC");	

			$data['page'] = 'Trip/close_trip';
            $this->load->view('Template/main', $data);
       } 


       
    public function save_trip_close()
        {


            if ($this->input->post()) {
            $tripid = $this->input->post('tripid');
            $data["fuel"]=$this->input->post('fuel'); 
            $data["stn_no"]=$this->input->post('stn_no'); 
            $data["end_meter_reading"]=$this->input->post('end_meter_reading'); 
            $data["closing_entry_date"]=$this->input->post('closing_entry_date'); 
            $data["closing_email_date"]=$this->input->post('closing_email_date'); 
            $data["uncanned_date"]=$this->input->post('uncanned_date'); 
            $data["uncanned_by"]=$this->input->post('uncanned_by'); 
            $data["closing_gravity"]=$this->input->post('closing_gravity');
            $data["closing_temp"]=$this->input->post('closing_temp');

            $file =$this->do_upload();  

            $data["tracking_report"]=$file["upload_data"]["file_name"];
            $data["status"]= 1; 

            $shortage=$this->input->post('shortage');
            $short_price=$this->input->post('short_price');
            $milli_at_start  = $this->input->post('milli_at_start[]'); 
            $milli_at_dest  = $this->input->post('milli_at_dest[]'); 
            $milli_after_decan = $this->input->post('milli_after_decan[]'); 



            $insrt_shortage = array();
                foreach ($shortage as $value) {
                $insrt_shortage[]=array(
                    'shortage'=>$value,
                    'trip_id' => $tripid
                    );
                }

            $this->db->update_batch('tripproduct', $insrt_shortage, 'trip_id');


            $insrt_short_price= array();
                foreach ($short_price as $value) {
                $insrt_short_price[]=array(
                    'short_price'=>$value,
                    'trip_id' => $tripid
                    );
                }

            $this->db->update_batch('tripproduct', $insrt_short_price, 'trip_id');
            

            $insrt_milli_at_start = array();
                foreach ($milli_at_start as $value) {
                $insrt_milli_at_start[]=array(
                    'milli_at_start'=>$value,
                    'trip_id' => $tripid
                    );
                }

            $this->db->update_batch('tripproduct', $insrt_milli_at_start, 'trip_id');


              $insrt_milli_at_dest = array();
                foreach ($milli_at_dest as $value) {
                $insrt_milli_at_dest[]=array(
                    'milli_at_dest'=>$value,
                    'trip_id' => $tripid
                    );
                }

            $this->db->update_batch('tripproduct', $insrt_milli_at_dest, 'trip_id');



              $insrt_milli_after_decan = array();
                foreach ($milli_after_decan as $value) {
                $insrt_milli_after_decan[]=array(
                    'milli_after_decan'=>$value,
                    'trip_id' => $tripid
                    );
                }

            $this->db->update_batch('tripproduct', $insrt_milli_after_decan, 'trip_id');
                    
            $this->db->where('id', $tripid);
            $this->db->update("tripmanagement",$data);




            $this->session->set_flashdata('success', "Record has been added successfully");
            redirect('trip/index');

            }else{

            $this->session->set_flashdata('Errors', "Record has been not added successfully");
            redirect('trip/add_trip');
            }
            
        }



    public function closed_trip($id)
           {

            $data["driver1"]=$this->trip_model->getAllRecords("driverinformation",array("is_deleted"=>0, "status"=>0),"id","DESC");
            $data['menu'] = $this->load_model->menu();
            $data['base_url'] = base_url();
            $data['userInfo'] = $this->userInfo; 
            $data['tripid'] = $id;
            $data["trip_info"]=$this->trip_model->GetSpecificTrip($id);

            $filledBy = $data["trip_info"][0]['filled_by'];
            $data["filledby"]=$this->trip_model->FilledBy($filledBy);

            $uncannedBy = $data["trip_info"][0]['uncanned_by'];           

            $data["uncannedBy"]=$this->trip_model->uncannedBy($uncannedBy, $id);

            $data["helper"]=$this->trip_model->GetTripHelper($id);
            $data["products"]=$this->trip_model->GetTripProducts($id);


            $data["source"]=$this->trip_model->GetSourceOrDest($data["products"][0]['source']);

            $data["destination"]=$this->trip_model->GetSourceOrDest($data["products"][0]['destination']);

            $data["expensetype"]=$this->trip_model->getAllRecords("expensetype",array("is_delete"=>0),"id","DESC"); 

            $data['page'] = 'Trip/closed_trip';
            $this->load->view('Template/main', $data);
           } 






       public function add_trip()
	   {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;  
        $data["driver1"]=$this->trip_model->getAllRecords("driverinformation",array("is_deleted"=>0, "status"=>0),"id","DESC");
        $data["source"]=$this->trip_model->getAllRecords("locationtype",array("is_delete"=>0),"id","DESC");	 
        $data["helperinformation"]=$this->trip_model->getAllRecords("helperinformation",array("is_deleted"=>0,"status"=>0),"id","DESC");	
        $data["vehicle"]=$this->trip_model->getAllRecords("vehicle",array("is_deleted"=>0,"status"=>0),"id","DESC");	
        $data["product"]=$this->trip_model->getAllRecords("product",array("is_deleted"=>0,"status"=>0),"id","DESC");	
        $data["contractor"]=$this->trip_model->getAllRecords("contractorinformation",array("is_deleted"=>0,"status"=>0),"id","DESC");	
        $data["customer"]=$this->trip_model->getAllRecords("customerinformation",array("is_deleted"=>0,"status"=>0),"id","DESC");
         $data["company"]=$this->trip_model->getAllRecords("companyinformation",array("is_deleted"=>0,"status"=>0),"id","DESC");
        $data["routedefination"]=$this->trip_model->getAllRecords("routedefination",array("is_deleted"=>0),"id","DESC");	
		$data["expensetype"]=$this->trip_model->getAllRecords("expensetype",array("is_delete"=>0),"id","DESC");	

        $data['page'] = "Trip/add_trip";
        $this->load->view('Template/main', $data);
	   }


	public function save_trip()
	   {

        // var_dump ($this->input->post());
        // die();

          if ($this->input->post()) {

            $data["type"]=$this->input->post('type');
            $data["customer_id"]=$this->input->post('customer_id'); 
            $data["company_id"]=$this->input->post('company_id'); 
            $data["contractor_id"]=$this->input->post('contractor_id'); 
            $data["vehicle_id"]=$this->input->post('vehicle_id'); 
            $data["start_meter_reading"]=$this->input->post('start_meter_reading');
            $data["entry_date"]=$this->input->post('entry_date'); 
            $data["email_date"]=$this->input->post('email_date'); 
            $data["filling_date"]=$this->input->post('filling_date'); 
            $data["filled_by"]=$this->input->post('filled_by'); 
            $data["noofchamb"]=$this->input->post('noofchamb'); 
            $data["capofchamb"]=$this->input->post('capofchamb'); 


            $this->db->insert("tripmanagement",$data);
           
            $tripid = $this->db->insert_id();

            $product_id = $this->input->post('product_id');
            $source = $this->input->post('source');
            $destination = $this->input->post('destination');
            $product_quantity = $this->input->post('product_quantity');
            $product_temperature = $this->input->post('product_temperature');
            $product_gravity = $this->input->post('product_gravity');
            $freight_rate = $this->input->post('freight_rate');
            $milli_start = $this->input->post('milli_start');


            if (!empty($product_quantity)) {

                $insert_product=array();
                for ($i=0;$i<count($product_id);$i++) {

                    $insert_product[]=array(
                   'trip_id'=>$tripid,
                   'source'=>$source[$i],
                   'destination'=>$destination[$i],       
                   'freight_rate'=>$freight_rate[$i],
                   'product_gravity'=>$product_gravity[$i],
                   'product_temperature'=>$product_temperature[$i],
                   'product_quantity'=>$product_quantity[$i],
                   'milli_at_start'=>$milli_start[$i],
                   'product_id'=>$product_id[$i]
                    );
                }
                                             
                $this->db->insert_batch('tripproduct', $insert_product);


                }

   	
                $driver_id=$this->input->post('driver'); 
                $helper_id=$this->input->post('helper'); 
                $insert_driver=array();
                foreach ($driver_id as $value) {
                $insert_driver[]=array(
                		'trip_id'=>$tripid,
                		'type'=>'driver',
                		'member_id'=>$value

                		);
                }
                  
	      		$this->db->insert_batch('trip_members', $insert_driver);

	           	$insert_helper=array();
				foreach ($helper_id as $value) {
				$insert_helper[]=array(
								'trip_id'=>$tripid,
								'type'=>'helper',
								'member_id'=>$value

							);
	           	}

	           	$this->db->insert_batch('trip_members', $insert_helper);
	            $this->session->set_flashdata('success', "Record has been Added Successfully
");
	            redirect('trip/index');
	   	 
	   		}else{
	   			$this->session->set_flashdata('Errors', "Record has been not Added Successfully
");
	            redirect('trip/add_trip');
	   		}

	          
	   }


	public function saveexpense_trip()

	   {
	    $tripid=$this->uri->segment(3);
	     var_dump ($tripid);
         die();
         if ($this->input->post()) {
		    
            $cc=$this->input->post();

            for ($ii = 0; $ii < count($cc['amount']); $ii++) {

            $dataaa = array(

            'expensetype_id'=>$cc['expensetype_id'][$ii],
            'amount'=>$cc['amount'][$ii]

              );  

            $dataaa["trip_id"]=$tripid;
            $dataaa["date"]=date("Y-m-d h:i:sa");
            $this->generic_model->insert("expense",$dataaa);




            }

            $this->session->set_flashdata('success', "Record has been added successfully");
            redirect('trip/index');
	   	 
	   		}else{

	   			$this->session->set_flashdata('Errors', "Record has been not added successfully");
	            redirect('trip/add_trip');
	   		}

	          
	   }





public function all_close_trip()
       {
                if ($this->input->post()) {
                $data["type"]=$this->input->post('type');
                $data["company_id"]=$this->input->post('company_id'); 
                $data["contractor_id"]=$this->input->post('contractor_id'); 
                $data["vehicle_id"]=$this->input->post('vehicle_id'); 
                $data["meter_reading"]=$this->input->post('meter_reading'); 
                $data["entry_date"]=$this->input->post('entry_date'); 
                $data["email_date"]=$this->input->post('email_date'); 
                $data["filling_date"]=$this->input->post('filling_date'); 
                $data["source"]=$this->input->post('source'); 
                $data["product_id"]=$this->input->post('product_id'); 
                $data["quantity"]=$this->input->post('quantity'); 
                $data["temperature"]=$this->input->post('temperature'); 
                $data["gravity"]=$this->input->post('gravity');
                $data["destination"]=$this->input->post('destination'); 
                $data["freight_rate"]=$this->input->post('freight_rate'); 
                $data["carriage_commission"]=$this->input->post('carriage_commission'); 
                $data["withholding_tax"]=$this->input->post('withholding_tax');
                $data["company_comission"]=$this->input->post('company_commission'); 
                $data["remaining_commission"]=$this->input->post('remaining_commission'); 

                $this->db->where("id",$id);
                $this->db->update("tripmanagement",$data);

}}

        public function delete()
        {
            $id=$this->uri->segment(3);
            $done=$this->db->where('id',$id)->update('tripmanagement',array('is_deleted'=>1));
            if($done)
            {
            $this->session->set_flashdata('msg', 'Record has been Deleted successfully');
            redirect('trip/index');
            }
            else 
            {
            $this->session->set_flashdata('msg','Record has been Deleted successfully');
            redirect('trip/index');
            }

        }   
        public function states()
        {
            $id=$this->uri->segment(3);
            $done=$this->db->where('id',$id)->update('tripmanagement',array('status'=>1));
            if($done)
            {
            $this->session->set_flashdata('msg', 'trip is Deactive!');
            redirect('trip/index');
            }
            else 
            {
            $this->session->set_flashdata('msg',' Error: trip is not  Deactive');
            redirect('trip/index');
            }

        }  
        public function active()
        {
            $id=$this->uri->segment(3);
            $done=$this->db->where('id',$id)->update('tripmanagement',array('status'=>0));
            if($done)
            {
            $this->session->set_flashdata('msg', 'trip is active!');
            redirect('trip/index');
            }
            else 
            {
            $this->session->set_flashdata('msg',' Error: trip is not active');
            redirect('trip/index');
            }
        }



        public function do_upload()
        {
            $config['upload_path']          = './Uploads/';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    return $data;
                    //$this->load->view('upload_success', $data);
            }
        }
    

     public function download($file_name) {

        $this->load->helper('download');
        $path =  "./Uploads/". $file_name;
        $file = force_download($path, NULL);
        return $file;
    }






}
