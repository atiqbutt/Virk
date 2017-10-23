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
        //var_dump($this->input->post());die();

        if ($this->input->post()) {
            
            $data = $this->input->post();
            $this->db->insert('vehicle_token', $data);

            redirect('Maintenance/view_token','refresh');
        }else{

            redirect('Maintenance/add_token','refresh');
        }
        
           
       }

    public function token_details($id)
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['tokens'] = $this->db->query("SELECT * FROM vehicle_token inner join vehicle on vehicle.id = vehicle_token.vehicle AND vehicle_token.id = '$id'   WHERE  vehicle_token.is_delete = 0")->row();
        $data["page"]='maintenance/token_details';
        $this->load->view('Template/main',$data);

    }

//================================== Route Permit ==========================

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
	        $data['routePermit'] = $this->db->query("SELECT * FROM route_permit WHERE `is_delete` = 0")->result_array();
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


    public function routePermit_details($id)
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['routePermit'] = $this->db->query("SELECT * FROM route_permit inner join vehicle on vehicle.id = vehicle_token.vehicle AND vehicle_token.id = '$id'   WHERE  vehicle_token.is_delete = 0")->row();
        $data["page"]='maintenance/routePermit_details';
        $this->load->view('Template/main',$data);

    }




    //================================== calibration ==========================

    public function add_calibration()
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['vehicle'] = $this->db->query("SELECT `id`, `heading` FROM `vehicle` WHERE `is_deleted` = 0")->result_array();
        $data["page"]='maintenance/add_calibration';
        $this->load->view('Template/main',$data);

    }


    public function view_calibration()
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['calibration'] = $this->db->query("SELECT * FROM calibration WHERE `is_delete` = 0")->result_array();
        $data["page"]='maintenance/view_calibration';
        $this->load->view('Template/main',$data);

    }


    public function save_calibration()
    {

        if ($this->input->post()) {

            $data = $this->input->post();
            $this->db->insert('calibration', $data);

            redirect('Maintenance/view_calibration','refresh');
        }else{

            redirect('Maintenance/add_calibration','refresh');
        }


    }


    public function calibration_details($id)
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['calibration'] = $this->db->query("SELECT * FROM calibration inner join vehicle on vehicle.id = calibration.vehicle AND calibration.id = '$id'   WHERE  calibration.is_delete = 0")->row();
        $data["page"]='maintenance/calibration_details';
        $this->load->view('Template/main',$data);

    }


//================================== fitCert ==========================

    public function add_fitCert()
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['vehicle'] = $this->db->query("SELECT `id`, `heading` FROM `vehicle` WHERE `is_deleted` = 0")->result_array();
        $data["page"]='maintenance/add_fitCert';
        $this->load->view('Template/main',$data);

    }


    public function view_fitCert()
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['fitCert'] = $this->db->query("SELECT * FROM fit_cert WHERE `is_delete` = 0")->result_array();
        $data["page"]='maintenance/view_fitCert';
        $this->load->view('Template/main',$data);

    }


    public function save_fitCert()
    {
    //var_dump($this->input->post());die();
        if ($this->input->post()) {

            $data = $this->input->post();
            $this->db->insert('fit_cert', $data);

            redirect('Maintenance/view_fitCert','refresh');
        }else{

            redirect('Maintenance/add_fitCert','refresh');
        }


    }


    public function fitCert_details($id)
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['certificate'] = $this->db->query("SELECT * FROM fit_cert inner join vehicle on vehicle.id = fit_cert.vehicle AND fit_cert.id = '$id' WHERE fit_cert.is_delete = 0")->row();
        //var_dump($data['certificate ']);die();
        $data["page"]='maintenance/fitCert_details';
        $this->load->view('Template/main',$data);

    }



//================================== Tyre ==========================

    public function add_tyre()
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['vehicle'] = $this->db->query("SELECT `id`, `heading` FROM `vehicle` WHERE `is_deleted` = 0")->result_array();
        $data["page"]='maintenance/add_tyre';
        $this->load->view('Template/main',$data);

    }


    public function view_tyre()
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['tyre'] = $this->db->query("SELECT * FROM tyres WHERE `is_delete` = 0")->result_array();
        $data["page"]='maintenance/view_tyre';
        $this->load->view('Template/main',$data);

    }


    public function save_tyre()
    {

        if ($this->input->post()) {

            $data = $this->input->post();
            $this->db->insert('tyres', $data);

            redirect('Maintenance/view_tyre','refresh');
        }else{

            redirect('Maintenance/add_tyre','refresh');
        }


    }


    public function tyre_details($id)
    {

        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $data['tyre'] = $this->db->query("SELECT * FROM tyres inner join vehicle on vehicle.id = tyres.vehicle AND tyres.id = '$id'   WHERE  tyres.is_delete = 0")->row();
        $data["page"]='maintenance/tyre_details';
        $this->load->view('Template/main',$data);

    }















}

/* End of file maintenance.php */
/* Location: ./application/controllers/maintenance.php */