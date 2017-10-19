<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {


		public function __construct()
		{
			parent::__construct();
            //$this->load->model('maintenance_model');
            $this->load->model('generic_model');
            $this->load->library('form_validation');
            $this->load->model('generic_model');
            $this->load->library('form_validation');
            $this->load->model('user_model');
            $this->load->model('load_model');
            $this->user_model->check_login("Maintenance");
            $this->userInfo = $this->user_model->userInfo("first_name,last_name");
		}

       public function add_token()
       {

	        $data['menu'] = $this->load_model->menu();
	        $data['base_url'] = base_url();
	        $data['userInfo'] = $this->userInfo;
	        $data['vehicle'] = $this->db->query("SELECT `id`, `heading` FROM `vehicle` WHERE `is_deleted` = 0")->result_array();
	        $data["page"]='maintenance/add_token';
	        $this->load->view('Template/main',$data);
         
       }


       public function view_token()
       {

	        $data['menu'] = $this->load_model->menu();
	        $data['base_url'] = base_url();
	        $data['userInfo'] = $this->userInfo;
	        $data['tokens'] = $this->db->query("SELECT * FROM vehicle_token WHERE `is_delete` = 0")->result_array();
	        $data["page"]='maintenance/view_token';
	        $this->load->view('Template/main',$data);
           
       }


    public function save_token()
       {

        if ($this->input->post()) {
            
            $data = $this->input->post();
            $this->db->insert('vehicle_token', $data); 

            redirect('Maintenance/view_token','refresh');
        }else{

            redirect('Maintenance/add_token','refresh');
        }
        
           
       }



       public function add_routePermit()
       {

	        $data['menu'] = $this->load_model->menu();
	        $data['base_url'] = base_url();
	        $data['userInfo'] = $this->userInfo;
	        $data['vehicle'] = $this->db->query("SELECT `id`, `heading` FROM `vehicle` WHERE `is_deleted` = 0")->result_array();
	        $data["page"]='maintenance/add_routePermit';
	        $this->load->view('Template/main',$data);
         
       }


       public function view_routePermit()
       {

	        $data['menu'] = $this->load_model->menu();
	        $data['base_url'] = base_url();
	        $data['userInfo'] = $this->userInfo;
	        $data['tokens'] = $this->db->query("SELECT * FROM route_permit WHERE `is_delete` = 0")->result_array();
	        $data["page"]='maintenance/view_routePermit';
	        $this->load->view('Template/main',$data);
           
       }


    public function save_routePermit()
       {

        if ($this->input->post()) {
            
            $data = $this->input->post();
            $this->db->insert('route_permit', $data); 

            redirect('Maintenance/view_routePermit','refresh');
        }else{

            redirect('Maintenance/add_routePermit','refresh');
        }
        
           
       }




















}

/* End of file maintenance.php */
/* Location: ./application/controllers/maintenance.php */