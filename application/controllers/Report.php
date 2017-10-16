<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

        public function __construct() 
        {
        parent::__construct();
         $this->load->model('generic_model');
        $this->load->model('Generic_model');
        $this->load->model('user_model');
        $this->load->model('load_model');
        $this->load->model('Report_model');
         $this->load->model('Dropdown_model');
        $this->user_model->check_login("admin");
        $this->userInfo = $this->user_model->userInfo("first_name,last_name");

        }
		
		
		
		
		
        public function index()
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;      
       

        $data['page']='product/list';
        $this->load->view('Template/main',$data);

        }

        public function trip_reports()
        {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] =$this->user_model->userInfo("first_name,last_name");
        $data['protype']=$this->Dropdown_model->getAllRecords('producttype',array('is_deleted'=>0));
        $data['product']=$this->Dropdown_model->getAllRecords('product',array('is_deleted'=>0));
        $data['agent']=$this->Dropdown_model->getAllRecords('agentinformation',array('is_deleted'=>0));
        $data['helper']=$this->Dropdown_model->getAllRecords('helperinformation',array('is_deleted'=>0));
        $data['comp']=$this->Dropdown_model->getAllRecords('customerinformation',array('is_deleted'=>0));
        $data['driver']=$this->Dropdown_model->getAllRecords('driverinformation',array('is_deleted'=>0));
        $data['vehicletype']=$this->Dropdown_model->getAllRecords('vehicletype',array('is_deleted'=>0));
        $data['vehicle']=$this->Dropdown_model->getAllRecords('vehicle',array('is_deleted'=>0));
        $data['contratctor']=$this->Dropdown_model->getAllRecords('contractorinformation',array('is_deleted'=>0));
        $data['source']=$this->Dropdown_model->getAllRecords('locationtype',array('is_delete'=>0));
        $data['title']="Virk Logistics Trip Report";
                      // var_dump($data['source']); 
                    if($this->input->post()){

                        $formdata=$this->input->post();
                        $params=array();
                        $startdate="";
                        $enddate="";
                        $vehicle;
                        
                        foreach ($formdata as $key => $value) {
                            
                            if($value!="" && $value!="submit" && $key!="datefrom" && $key!="dateto" && $key!="vehicleid"){
                                $params[$key] =$value;
                                $data[$key]=$value;
                               
                            }
                            if($key=="vehicleid" && $value!=""){
                                $vehicle=$value;
                            }
                                   
                            if($key=="datefrom" && $value!=""){
                                $startdate=$value;
                                $data[$key]=$value;
                            }
                            if($key=="dateto" && $value!=""){
                                $enddate=$value;
                                $data[$key]=$value;
                            }
                        }
                      $data['data']= $this->Report_model->getReportData('get_all_trips',$params,$startdate,$enddate,$vehicle);
        
                    }
                else{
        $data['data']=$this->Report_model->get_all_trip();
        }
        $data['page']='report/list';                        
        $this->load->view('Template/main',$data);

        }

        public function expense_reports()
        {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] =$this->user_model->userInfo("first_name,last_name");
        $data['protype']=$this->Dropdown_model->getAllRecords('producttype',array('is_deleted'=>0));
        $data['product']=$this->Dropdown_model->getAllRecords('product',array('is_deleted'=>0));
        $data['agent']=$this->Dropdown_model->getAllRecords('agentinformation',array('is_deleted'=>0));
        $data['helper']=$this->Dropdown_model->getAllRecords('helperinformation',array('is_deleted'=>0));
        $data['comp']=$this->Dropdown_model->getAllRecords('customerinformation',array('is_deleted'=>0));
        $data['driver']=$this->Dropdown_model->getAllRecords('driverinformation',array('is_deleted'=>0));
        $data['vehicletype']=$this->Dropdown_model->getAllRecords('vehicletype',array('is_deleted'=>0));
        $data['vehicle']=$this->Dropdown_model->getAllRecords('vehicle',array('is_deleted'=>0));
        $data['contratctor']=$this->Dropdown_model->getAllRecords('contractorinformation',array('is_deleted'=>0));
        $data['source']=$this->Dropdown_model->getAllRecords('locationtype',array('is_delete'=>0));
        $data['title']="Virk Logistics Trip Report";
         $data['count']=$this->db->query("select count(t.id) as cont,t.id FROM `expense` e join tripmanagement t on t.id=e.`trip_id` join expensetype et on et.id=e.`expensetype_id` GROUP BY t.id")->result_array();
                      // var_dump($data['source']); 
                    if($this->input->post()){

                        $formdata=$this->input->post();
                        $params=array();
                        $startdate="";
                        $enddate="";
                         $vehicle;
                        
                        foreach ($formdata as $key => $value) {
                            if($value!="" && $value!="submit" && $key!="datefrom" && $key!="dateto" && $key!="vechileid"){
                                $params[$key] =$value;
                                $data[$key]=$value;
                               
                            }
                            if($key=="vechileid" && $value!=""){
                                $vehicle=$value;
                            }

                            if($key=="datefrom" && $value!=""){
                                $startdate=$value;
                                $data[$key]=$value;
                            }
                            
                            if($key=="dateto" && $value!=""){
                                $enddate=$value;
                                $data[$key]=$value;
                            }
                        }

                      $data['data']= $this->Report_model->getReportData('get_expense_by_trips',$params,$startdate,$enddate,$vehicle);
                               
                    }
                else{
        $data['data']=$this->Report_model->get_all_expenses();
        }
        $data['page']='report/listExpense';
                        
        $this->load->view('Template/main',$data);

        }

        public function vehicle_expense_report()
        {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] =$this->user_model->userInfo("first_name,last_name");
        $data['protype']=$this->Dropdown_model->getAllRecords('producttype',array('is_deleted'=>0));
        $data['product']=$this->Dropdown_model->getAllRecords('product',array('is_deleted'=>0));
        $data['agent']=$this->Dropdown_model->getAllRecords('agentinformation',array('is_deleted'=>0));
        $data['helper']=$this->Dropdown_model->getAllRecords('helperinformation',array('is_deleted'=>0));
        $data['comp']=$this->Dropdown_model->getAllRecords('customerinformation',array('is_deleted'=>0));
        $data['driver']=$this->Dropdown_model->getAllRecords('driverinformation',array('is_deleted'=>0));
        $data['vehicletype']=$this->Dropdown_model->getAllRecords('vehicletype',array('is_deleted'=>0));
        $data['vehicle']=$this->Dropdown_model->getAllRecords('vehicle',array('is_deleted'=>0));
        $data['contratctor']=$this->Dropdown_model->getAllRecords('contractorinformation',array('is_deleted'=>0));
        $data['source']=$this->Dropdown_model->getAllRecords('locationtype',array('is_delete'=>0));
        $data['title']="Virk Logistics Trip Report";
         $data['count']=$this->db->query("select count(vid) as cont,vid as id,id as trip from get_expense_by_vehicle GROUP by id")->result_array();

                    if($this->input->post()){

                        $formdata=$this->input->post();
                        $params=array();
                        $startdate="";
                        $enddate="";
                         $vehicle;
                        
                        foreach ($formdata as $key => $value) {
                            if($value!="" && $value!="submit" && $key!="datefrom" && $key!="dateto" && $key!="vechileid"){
                                $params[$key] =$value;
                                $data[$key]=$value;
                               
                            }
                            
                             if($key=="vechileid" && $value!=""){
                                $vehicle=$value;
                            }

                            if($key=="datefrom" && $value!=""){
                                $startdate=$value;
                                $data[$key]=$value;
                            }
                                
                                if($key=="dateto" && $value!=""){
                                $enddate=$value;
                                $data[$key]=$value;
                            }
                        }
                        
        
                          $data['data']= $this->Report_model->getReportData('get_expense_by_vehicle',$params,$startdate,$enddate,$vehicle);
                        
                    }
                else{
        $data['data']=$this->Report_model->get_all_expense_by_vehicle();
        //var_dump($data['data']);
        }
        $data['page']='report/listVehicleExpense';               
        $this->load->view('Template/main',$data);

        }






        public function changeproduct($prod="")
        {


            $this->db->select()->from('product');
            $this->db->where('product_type',$prod);
            $this->db->where('is_deleted',0);
            $data=$this->db->get()->result_array();
            $return="";
            foreach($data as $value) {
                
               $return.="<option value='".$value["id"]."'>".$value["heading"]."</option>";  
            
              }
              echo $return;

    }

    public function getCommonInfo()
    {

    
    }

}

       