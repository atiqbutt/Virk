<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission extends CI_Controller {

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



	public function contractor_customer_view()
	{

		$data['menu'] = $this->load_model->menu();
	    $data['base_url'] = base_url();
	    $data['userInfo'] = $this->userInfo;
		$data['contractor_customer'] = $this->db->query('select ccf.id,contractorinformation.name as contractor,ci.name as customer,ccf.freight_commission FROM `contractor_customer` ccf join customerinformation ci on ci.id=ccf.customer_id join contractorinformation on contractorinformation.id=ccf.contractor_id')->result_array();

	    $data["page"]='contractor_customer/view';
        $this->load->view('Template/main',$data); 
	}


	public function contractor_company_view()
	{

		$data['menu'] = $this->load_model->menu();
	    $data['base_url'] = base_url();
	    $data['userInfo'] = $this->userInfo;
		$data['contractor_company'] = $this->db->query('select ccf.id, ccf.commission_1, ccf.withholding_tax, ccf.commission_3,ci.name as company,contractorinformation.name as contractor FROM `contractor_company` ccf join companyinformation ci on ci.id=ccf.company_id join contractorinformation on contractorinformation.id=ccf.contractor_id')->result_array();
		// var_dump ($data['contractor_company']);
		// die();

	    $data["page"]='contractor_company/view';
        $this->load->view('Template/main',$data); 
	}

	
	public function contractor_customer( )
	{
	    $data['menu'] = $this->load_model->menu();
	    $data['base_url'] = base_url();
	    $data['userInfo'] = $this->userInfo; 
	    $data['contractors'] = $this->db->select('id, name')->from('contractorinformation')->where('is_deleted', '0')->get()->result_array();
	    $data['customers'] = $this->db->select('id, name')->from('customerinformation')->where('is_deleted', '0')->get()->result_array();
	    $data["page"]='contractor_customer/contractor_customer';
        $this->load->view('Template/main',$data);

	}

	
	public function save_contractor_customer()
	{
		if ($this->input->post()) {
			
			$data = $this->input->post();

			$this->db->insert('contractor_customer', $data);
			redirect('Commission/contractor_customer','refresh');
		}

	}


	public function contractor_company( )
	{
	    $data['menu'] = $this->load_model->menu();
	    $data['base_url'] = base_url();
	    $data['userInfo'] = $this->userInfo;

	    $data['contractors'] = $this->db->select('id, name')->from('contractorinformation')->where('is_deleted', '0')->get()->result_array();  

	    $data['companies'] = $this->db->select('id, name')->from('companyinformation')->where('is_deleted', '0')->get()->result_array();

	    $data["page"]='contractor_company/contractor_company';
        $this->load->view('Template/main',$data);

	}

	
	public function save_contractor_company()
	{
		if ($this->input->post()) {
			
			$data = $this->input->post();

			$this->db->insert('contractor_company', $data);
			redirect('Commission/contractor_company','refresh');
		}

	}



public function delete_contractor_company($id)
	{
		if ($id) {
			
			$this->db->where('id', $id);
			$this->db->delete('contractor_company');
			redirect('Commission/contractor_company_view','refresh');
		}

	}



public function delete_contractor_customer($id)
	{
		if ($id) {
			
			$this->db->where('id', $id);
			$this->db->delete('contractor_customer');
			redirect('Commission/contractor_customer_view','refresh');
		}

	}


	public function get_customer_comm()
	{		

		$customer_id = $this->input->post('customerid', TRUE);
		$contractor_id = $this->input->post('contractorid', TRUE);

		$array = array('contractor_id' => $contractor_id, 'customer_id' => $customer_id);

		$query = $this->db->select('*')->from('contractor_customer')->where($array)->get()->result_array();

		echo json_encode($query) ;

	}


	public function get_company_comm()
	{		

		$contractor_id = $this->input->post('contractorid', TRUE);
		$company_id = $this->input->post('companyid', TRUE);

		$array = array('contractor_id' => $contractor_id, 'company_id' => $company_id);
		$query = $this->db->select('*')->from('contractor_company')->where($array)->get()->result_array();
		echo json_encode($query) ;

	}





}

/* End of file Commission.php */
/* Location: ./application/controllers/Commission.php */
