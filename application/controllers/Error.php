<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MyError extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('load_model');
		$this->user_model->check_login("Home");
		$this->userInfo = $this->user_model->userInfo("first_name,last_name");
	}




	public function _404()
	{


log_message('error', 'Some variable did not contain a value.');
		// error_log('sadasdsaadsad');

		$data['menu']=$this->load_model->menu();
		$data['base_url'] = base_url();
                $data['userInfo'] = $this->userInfo;
		$data['total_trips']=$this->home_model->total_trips();
		$data['active_trips']=$this->home_model->active_trips();
		$data['total_contractors']=$this->home_model->total_contractors();
		$data['total_vehicles']=$this->home_model->total_vehicles();
		$data['page'] = "Error/404";
		$this->load->view('Template/main', $data);
		
	}
	public function dataNotFound()
	{


log_message('error', 'Some variable did not contain a value11111.');
		// error_log('sadasdsaadsad');

		$data['menu']=$this->load_model->menu();
		$data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
		$data['total_trips']=$this->home_model->total_trips();
		$data['active_trips']=$this->home_model->active_trips();
		$data['total_contractors']=$this->home_model->total_contractors();
		$data['total_vehicles']=$this->home_model->total_vehicles();
		$data['page'] = "Error/dataNotFound";
		$this->load->view('Template/main', $data);
		
	}


}
?>