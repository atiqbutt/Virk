<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

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
        $data["producttype"]=$this->generic_model->getAllRecords("producttype",array("is_deleted"=>0)
        ,"id","DESC");

        $data['page']='product/list';
        $this->load->view('Template/main',$data);

        }

        public function add()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["page"]='product/add';
        $this->load->view('Template/main',$data);

        }





        public function save()
        {

        if ($_POST )
        {
        $this->form_validation->set_rules('name', 'Name no', 'trim|required');
      
    if($this->form_validation->run()==False)
  {
      $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["page"]='product/add';
        $this->load->view('Template/main',$data);
  }  
  else{  
        $data["name"]=$this->input->post('name');
        $data["description"]=$this->input->post('dec');
        $data["createdAt"]=date("Y-m-d h:i:sa");
        // $data["createdBy"]=$this->session->userdata('dekho_userId');

        $this->db->insert('producttype', $data);
        ;


        $this->session->set_flashdata('msg', "Record has been Added Successfully
");
        redirect('product/index');
    
     }
        }

        else{
        $this->session->set_flashdata('msg', "Record has been not Added Successfully
");
        redirect('product/index');
        }

        }
        public function pricehistory()
        {
            $data['menu'] = $this->load_model->menu();
            $data['base_url'] = base_url();
            $data['userInfo'] = $this->userInfo; 
            $this->db->select('product.heading, product_histroy.price,product_histroy.date,product_histroy.startdate');
            $this->db->from('product');
            $this->db->join('product_histroy','product_histroy.p_id = product.id');
            $this->db->where('product.is_deleted',0);
            $query=$this->db->get();
            $data['product']=$query->result_array();
            $data['page']='product/history';
            $this->load->view('Template/main',$data);
        }
 public function pricehistorysearch()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        //$data["product"]=$this->generic_model->getProductPriceHistory();
       
        $fd= $this->input->get('fromdate');
// print_r($fd); die();	
		$td= $this->input->get('todate');		
$data["producths"]=$this->Generic_model->GetPriceHistory($fd);
//print_r($data["producths"]); die();			
			
//var_dump($data["producths);
//print_r($data["producths"]);die();

/*$this->db->select('product.heading, product_histroy.price,product_histroy.date,product_histroy.startdate');
$this->db->from('product');
$this->db->join('product_histroy','product_histroy.p_id = product.id');
            $this->db->where('product.is_deleted',0);
            $query=$this->db->get();
            $data['product']=$query->result_array();
*/
        $data['page']='product/history';
        $this->load->view('Template/main',$data);
        //}
        }
		
		
		
		
        public function delete()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('producttype',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
        redirect('product/index');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Record has been not Deleted Successfully
');
        redirect('product/index');
        }

        }   
        public function states()
        {
        
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('producttype',array('status'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Product is DeActive!');
        redirect('product/index');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: Product is Active');
        redirect('product/index');
        }

        }  
        public function active()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('producttype',array('status'=>0));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Product is Active!');
        redirect('product/index');
        }
        else 
        {
        
        $this->session->set_flashdata('msg',' Error: Product is Deactive');
        redirect('product/index');
        }

        }    
        public function editt($id)
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $id=$this->uri->segment(3);

        $data['product'] = $this->db->select()->from('producttype')->where('id',$id)
        ->get()->row();
               if($data['product']==""){
                   redirect('Error/dataNotFound');
       }
        // var_dump( $data['product']);
        // die();
        $data['page']='product/edit';
        $this->load->view('Template/main',$data);
        }

        public function update()
        {
       
        $id=$this->input->post('id');
        $data["name"]=$this->input->post('name');
        $data["description"]=$this->input->post('dec');
        $data["modifiedAt"]=date("Y-m-d h:i:sa");
        $this->db->where('id',$id);
        $this->db->update('producttype',$data);
        $this->session->set_flashdata('msg', "Record has been Updated Successfully
");
        redirect('product/index');  
        }

//===================== product add update delete all work start====================// 
        public function list_prodcut()
        {
            $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        
        
        //$data["product"]=$this->generic_model->getProduct();
            $this->db->select('product.id,product.price,product.heading,product.description,product.status,unit.name as unitname,producttype.name as pname');
            $this->db->from('product');
           
             $this->db->join('producttype','producttype.id=product.product_type');
              $this->db->join('unit','unit.id=product.unit_id');
             // $this->db->order_by("course_name","desc")
             // $this->db->order_by('product_histroy.price','desc');
            $this->db->where('product.is_deleted',0);
            $query=$this->db->get();
            $data['product']=$query->result_array();
            
        $data['page']='product/listproduct';
        $this->load->view('Template/main',$data);
        }


public function eyelist_product($p='')
{
            $this->db->select('product.id,product.price,product.heading,product.description,product.status,unit.name as unitname,producttype.name as pname');
            $this->db->from('product');

            $this->db->join('producttype','producttype.id=product.product_type');
            $this->db->join('unit','unit.id=product.unit_id');
           
            $this->db->where('product.is_deleted',0);
            $this->db->where('product.id',$p);
            $query=$this->db->get();
            $data['view']=$query->row();
            
            // $data['view']=$this->db->where('id',$p)->get('contractorinformation
            // ')->row();
         $this->load->view('product/producttype_p',$data);

}
  


  //product details page bilal
     public function Product_eye($id)
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;
        $id=$this->uri->segment(3);
        $data['view']=$this->Product_model->productDetails($id);
        $data['page']='product/product_details';
        $this->load->view('Template/main',$data);
          
        }





        public function add_product()
        {
        $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
        $data["productid"]=$this->generic_model->getSpecificRecord("product", array()); 
        $data["unitid"]=$this->generic_model->getSpecificRecord("unit", array()); 
        $data["producttype"]=$this->generic_model->getAllRecords("producttype",array("is_deleted"=>0,"status"=>0),"id","DESC"); 
        $data["unit"]=$this->generic_model->getAllRecords("unit",array("is_deleted"=>0,"status"=>0),"id","DESC"); 
        $data["page"]='product/add_product';
        $this->load->view('Template/main',$data);
        }
        public function save_product()
        {

        if ($_POST )
        {
        $this->form_validation->set_rules('heading', 'Name no', 'trim|required');
        $this->form_validation->set_rules('unit_id', 'Unit select', 'trim|required');
         $this->form_validation->set_rules('product_type', 'product type Select', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
         $this->form_validation->set_rules('price', 'price', 'trim|required');
      
    if($this->form_validation->run()==False)
  {
      $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo; 
     $data["productid"]=$this->generic_model->getSpecificRecord("product", array()); 
        $data["unitid"]=$this->generic_model->getSpecificRecord("unit", array()); 
        $data["producttype"]=$this->generic_model->getAllRecords("producttype",array("is_deleted"=>0,"status"=>0),"id","DESC"); 
        $data["unit"]=$this->generic_model->getAllRecords("unit",array("is_deleted"=>0,"status"=>0),"id","DESC"); 

        $data["page"]='product/add_product';
        $this->load->view('Template/main',$data);
  }  
  else{

        date_default_timezone_set("Asia/Karachi");
        $this->load->model('generic_model');
        $data["heading"]=$this->input->post('heading');
        $data["unit_id"]=$this->input->post('unit_id');
        $data["product_type"]=$this->input->post('product_type');
        $data["description"]=$this->input->post('description');
        $data["price"]=$this->input->post('price');
        $histroy["price"]=$this->input->post('price');
        $data["createdAt"]=date("m/d/Y");
        // $data["createdBy"]=$this->session->userdata('dekho_userId');
        
         $this->db->insert("product",$data);
         $history['p_id'] = $this->db->insert_id();
         $history["price"]=$this->input->post('price');
         $history["date"]=date("m/d/Y");


        
       $this->db->insert("product_histroy",$history);
     
        
        
        $this->session->set_flashdata('msg', "Record has been Added Successfully
");
        redirect('product/list_prodcut');
        }
    }
        else{
        $this->session->set_flashdata('msg', "Record has been not Added Successfully
");
        redirect('product/list_prodcut');
        }

        }

        public function List_delete()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('product',array('is_deleted'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
        redirect('product/list_prodcut');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Record has been not Deleted Successfully
');
        redirect('product/list_prodcut');
        }

        }

        public function List_edit()
        {
            $data['menu'] = $this->load_model->menu();
            $data['base_url'] = base_url();
            $data['userInfo'] = $this->userInfo; 
            $id=$this->uri->segment(3);

            $data['product'] = $this->db->select()->from('product')->where('id',$id)
            ->get()->row();
            if($data['product']=="")
        {
            redirect('Error/dataNotFound');
            }
//$a=1;
       
	   
 $data['histroy'] = $this->db->select()->from('product_histroy')->where('p_id',$id)
		// $data['histroy'] = $this->db->select()->from('product_histroy')->where('is_deleted',$a);
        ->get()->row();
      //  var_dump($data['histroy']);
      //  die();
  

// $data['histroy'] = $this->generic_model->get_product();    
        $data['page']='product/edit_product';
        $this->load->view('Template/main',$data);
        }

        public function update_list_product()
        {
        if($_POST)
        {
        $this->form_validation->set_rules('heading', 'Name no', 'trim|required|alpha');
        $this->form_validation->set_rules('unit_id', 'Unit select', 'trim|required');
         $this->form_validation->set_rules('product_type', 'product type Select', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
         $this->form_validation->set_rules('price', 'price', 'trim|required');
      
    if($this->form_validation->run()==False)
  {
  
       $data['menu'] = $this->load_model->menu();
        $data['base_url'] = base_url();
        $data['userInfo'] = $this->userInfo;    
    $id=$this->input->post('id');
     $data['product'] = $this->db->select()->from('product')->where('id',$id)
        ->get()->row();
       // var_dump($data['product']);
        //die();
        $data['page']='Product/edit_product';
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
        $data["product_type"]=$this->input->post('product_type');
        $data["description"]=$this->input->post('description');
		
        $histroy["price"]=$this->input->post('price');
        $histroy["p_id"]=$this->input->post('id');
         $histroy["date"]=date("m/d/Y");
        $histroy["startdate"]=$this->input->post('startdate');
        
        $data["modifiedAt"]=date("Y-m-d h:i:sa");
         $da=$this->db->select()->from('product_histroy')->where('p_id',$id)->get()->row();
                   
                    if( $histroy["price"]==$da->price)
                    {
                    $this->db->where('id',$id);
                    $this->db->update('product',$data);
                    }
                    else
                    {
                      $this->db->insert("product_histroy",$histroy);
                       $this->db->where('id',$id);
                       $this->db->update('product',$data);
                    }
        //var_dump($data);
        //die();
//		$data["startdate"]=$this->input->post('startdate');
        // $data["createdBy"]=$this->session->userdata('dekho_userId');
                $this->db->where('id',$id);
        $this->db->update('product',$data);

        $this->session->set_flashdata('msg', "Record has been Updated Successfully
");
        redirect('product/list_prodcut');
        }
    }
        else{
        $this->session->set_flashdata('msg', "Record has been not Updated Successfully
");
        redirect('product/list_prodcut');
        }
        }
        
        
        

        //===================== End of  product add update delete all work start====================// 
             public function states_p()
        {
        
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('product',array('status'=>1));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Product is deactive!');
        redirect('product/list_prodcut');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: Product is not deactive');
        redirect('product/list_prodcut');
        }

        }  
        public function active_p()
        {
        $id=$this->uri->segment(3);
        $done=$this->db->where('id',$id)->update('product',array('status'=>0));
        if($done)
        {
        $this->session->set_flashdata('msg', 'Product is active!');
        redirect('product/list_prodcut');
        }
        else 
        {
        $this->session->set_flashdata('msg',' Error: Product is not active');
        redirect('product/list_prodcut');
        }

        } 



}