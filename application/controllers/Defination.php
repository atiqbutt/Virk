              <?php
              defined('BASEPATH') OR exit('No direct script access allowed');

              class Defination extends CI_Controller {


              public function __construct() {
              parent::__construct();
              $this->load->model('Defination_Model');
              $this->load->model('user_model');
              $this->load->library('form_validation');
              $this->load->model('load_model');
              $this->load->model('Generic_model');
              $this->user_model->check_login("admin");
              date_default_timezone_set("Asia/Karachi");
              $this->userInfo = $this->user_model->userInfo("first_name,last_name");

              }


              /*********************************** Helper    ***********************************/


              public function image_upload_by()
              {

              if(isset($_FILES['imagee']['name']))
              {

              $config['upload_path']='./Upload/';
              $config['allowed_types']='jpg|jpeg|png|gif';
              $this->load->library('upload',$config);
              if(!$this->upload->do_upload('imagee'))
              {

              echo $this->upload->display_errors();
              }

              else
              {
              $data=$this->upload->data();
              echo '<img src="'.base_url().'upload/'.$data["file_name"].'"/>';
              }
              }

              }



              public function editexistcnichelper()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('cnic');



              $query = $this->Defination_Model->editgetcnichelper($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function editexistdriverhelper()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('driver');



              $query = $this->Defination_Model->editgetdriverhelper($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function editexistphonehelper()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('phone');


              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->editgetphonehelper($value,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }

              }

              $data['valid']=true;
              echo json_encode($data);
              }





              public function index()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['helper']=$this->Defination_Model->viewhelper();
              $data['page']='helper/list';
              $this->load->view('Template/main',$data);

              }
              public function priint($p="")
              {
              $data['view']=$this->db->where('id',$p)->get('agentinformation')->row();
              $this->load->view('Agent/agent_p',$data);
              }


              public function printcontracttor($p="")
              {

              $data['view']=$this->db->where('id',$p)->get('contractorinformation
              ')->row();
              $this->load->view('Contractor/contractor_p',$data);
              }


              public function printcompany($p="")
              {

              $data['view']=$this->db->where('id',$p)->get('companyinformation

              ')->row();
              $this->load->view('Company/company_p',$data);
              }


               public function printcustomer($p="")
              {

              $data['view']=$this->db->where('id',$p)->get('customerinformation

              ')->row();
              $this->load->view('Customer/customer_p',$data);
              }

              public function printdriver($p="")
              {

              $data['view']=$this->db->where('id',$p)->get('driverinformation

              ')->row();
              $this->load->view('Driver/driver_p',$data);
              }


              public function printhelper($p="")
              {

              $data['view']=$this->db->where('id',$p)->get('helperinformation


              ')->row();
              $this->load->view('helper/helper_p',$data);
              }        




              public function existhelpercnic()
              {
              $search=  $this->input->post('cnic');
              $query = $this->Defination_Model->gethelpercnic($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }          

              public function existhelperdriver()
              {
              $search=  $this->input->post('driver');
              $query = $this->Defination_Model->gethelperdriver($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }          




              public function existphonehelper()
              {
              $search=  $this->input->post('phone');
              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->getphonehelper($value);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }
              }

              $data['valid']=true;
              echo json_encode($data);
              }







              public function savehelper()
              {

              if($this->input->post())
              {
                $url=$this->do_upload();
                 $url2=$this->do_upload2();
                $field=$this->input->post();
                 $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
                $data=array(
                    'name'=>$field['name'],
                     'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                     'religion'=>$field['religion'],
                    'cnic'=>$field['cnic'],
                     'doj'=>$field['doj'],
                     'doc'=>$url2,
                    'dob'=>$field['dob'],
                    'dl'=>$field['driver'],
                    'status'=>0,
                    'image1'=>$url,
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                 
                );

                $done=$this->Defination_Model->insert('helperinformation',$data);
                if($done)
                {
                    $this->session->set_flashdata('msg','Record has been Added Successfully');
                    redirect('Defination/index');
                
              }
                }
              }


              public function addhelper()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['page']='helper/add';
              $this->load->view('Template/main',$data);

              }

              public function eyehelper()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['view']=$this->Defination_Model->helperDetails($id);
              $data['page']='helper/view';
              $this->load->view('Template/main',$data);


              }


              public function edithelper()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->db->where('id',$id)->get('helperinformation')->row();
              if($data['edit']==""){
                 redirect('Error/dataNotFound');
              }
              $data['page']='helper/edit';
              $this->load->view('Template/main',$data);

              }

              public function updatehelper()
              {
              if($this->input->post())
              {
                    $field=$this->input->post();
                    
               $url=$this->do_upload();
               $url2=$this->do_upload2(); 
              $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];  
              $data=array(
                    'name'=>$field['name'],
                     'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                     'religion'=>$field['religion'],
                    'cnic'=>$field['cnic'],
                     'doj'=>$field['doj'],
                    'dob'=>$field['dob'],
                    'dl'=>$field['driver'],
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                );


              if($url!='')
                    {
                   	$data['image1']=$url;
                    }
                    
                    if($url2!='')
                    {
                   $data['doc']=$url2;
                    }

                $done=$this->db->where('id',$field['id'])->update('helperinformation',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Updated Successfully
');
                       redirect('Defination/index');
                       }
                 }  

              }

              public function status_helper($id)
              {
              $query=$this->db->where('id',$id)->get('helperinformation')->row();

              $new=($query->status==0) ? 1:0;
              $data=array(
              'status'=>$new
              );
              $query=  $this->db->where('id',$id)->update('helperinformation',$data);

              if($query)
              {
              redirect('Defination/index');
              }
                                }

              public function deletehelper()
              {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('helperinformation',array('is_deleted'=>1));
              if($done)
              {

              $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
              redirect('Defination/index');
                       }
                       
              }  



              /****************************************** End of Helper    **********************************************************************/  



              public function do_upload2()
              { 
              $type = explode('.', $_FILES["doc"]["name"]);
              $type = $type[count($type)-1];
              $url2 = "Uploads/".$_FILES["doc"]["name"];



              if (in_array($type, array("png","jpg","jpeg","gif","doc","docx","Doc","Docx","pdf","xlsx","xls","ppt","pptx","rar","zip","csv","txt","avi","mp4","3gp","mpeg","mp3","iso")))
              if(move_uploaded_file($_FILES["doc"]["tmp_name"], $url2)){
              $this->load->library('image_lib');
              $config= array('image_library' =>"gd2" ,
                                'source_image'=>$url2,
                                'maintain_ratio'=>true,
                                 );
              $this->image_lib->initialize($config);
              if($this->image_lib->resize()){
                    return $url2;
                }
              }
              return null;

              }

              public function do_upload()
              { 
              $type = explode('.', $_FILES["image"]["name"]);
              $type = $type[count($type)-1];
              $url = "Uploads/".uniqid(rand()).'.'.$type;

              if (in_array($type, array("png","jpg","jpeg","gif")))
              if(move_uploaded_file($_FILES["image"]["tmp_name"], $url)){
              $this->load->library('image_lib');
              $config= array('image_library' =>"gd2" ,
                                'source_image'=>$url,
                                'maintain_ratio'=>true,
                                 );
              $this->image_lib->initialize($config);
              if($this->image_lib->resize()){
                    return $url;
                }
              }
              return null;

              }







              /****************************************** Company ************************************************************/
                                

              public function editexistemailcompany()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('email');



              $query = $this->Defination_Model->editgetemailcompany($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }


              public function editexistcniccompany()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('cnic');



              $query = $this->Defination_Model->editgetcniccompany($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function editexistphonecompany()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('phone');


              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->editgetphonecompany($value,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }

              }

              $data['valid']=true;
              echo json_encode($data);
              }















              public function existemailcompany()
              {
              $search=  $this->input->post('email');
              $query = $this->Defination_Model->getemailcompany($search);

              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }

              public function existcontactcompany()
              {
              $search=  $this->input->post('contactnumber');
              $query = $this->Defination_Model->getcompanycontact($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }

              public function existcompanycnic()
              {
              $search=  $this->input->post('cnic');
              $query = $this->Defination_Model->getcompanycnic($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }          
                                
              public function existphonecompany()
              {
              $search=  $this->input->post('phone');
              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->getphonecomapny($value);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }
              }

              $data['valid']=true;
              echo json_encode($data);
              }


              public function savecompany()
              {

              if($this->input->post())
              {
                $field=$this->input->post();
              //                if(!($field['image']=="" || $field['image']==null))
                 $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
                $url=$this->do_upload();
                $url2=$this->do_upload2();
                $data=array(
                    'name'=>$field['name'],
                    
                    'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'], 
                    'cnic'=>$field['cnic'],
                    'doc'=>$url2,
                    'cpname'=>$field['contactname'],
                    'cpnumber'=>$field['contactnumber'],
                    'email'=>$field['email'],
                    'image1'=>$url,
                    'status'=>0,
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id                 
                );
               
                $done=$this->Defination_Model->insert('companyinformation',$data);
                if($done)
                {
                    $this->session->set_flashdata('msg','Record has been Added Successfully
');
                    redirect('Defination/companypage');
                
              }
                }

              }





              public function companypage()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['customer']=$this->Defination_Model->viewcompany();
              $data['page']='Company/list';
              $this->load->view('Template/main',$data);


              }


              public function addcompany()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['page']='Company/add';
              $this->load->view('Template/main',$data);

              }




              public function eyecompany()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['view']=$this->Defination_Model->companyDetails($id);
              $data['page']='Company/view';
              $this->load->view('Template/main',$data);


              }


              public function editcompany()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->db->where('id',$id)->get('companyinformation')->row();
              if($data['edit']==""){
              redirect('Error/dataNotFound');
              }
              $data['page']='Company/edit';
              $this->load->view('Template/main',$data);

              }


              public function updatecompany()
              {
              if($this->input->post())
              {
                 $field=$this->input->post();
                    
               $url=$this->do_upload();
               $url2=$this->do_upload2(); 
              $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
              $data=array(
                    'name'=>$field['name'],
                   'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                    'cnic'=>$field['cnic'],
                     'cpname'=>$field['contactname'],
                    'cpnumber'=>$field['contactnumber'],
                    'email'=>$field['email'],
                    'image1'=>$url,
                     'doc'=>$url2,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                    );
                if($url!='')
                    {
                   	$data['image1']=$url;
                    }
                    
                    if($url2!='')
                    {
                   $data['doc']=$url2;
                    }
                
                    $done=$this->db->where('id',$field['id'])->update('companyinformation',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Updated Successfully
');
                       redirect('Defination/companypage');
                       }
                
                
                }  

              }

              public function status_company($id)
              {
              $query=$this->db->where('id',$id)->get('companyinformation')->row();

              $new=($query->status==0) ? 1:0;
              $data=array(
              'status'=>$new
              );
               $query=  $this->db->where('id',$id)->update('companyinformation',$data);

              if($query)
              {
              redirect('Defination/companypage');
              }
                                }


              public function deletecompany()
              {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('companyinformation',array('is_deleted'=>1));
              if($done)
                {
              $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
              redirect('Defination/companypage');
               }
                       
              }  
              /****************************************** End of company   *****************************************/




              /****************************************** Start Customer    ************************************************/


              public function editexistemailcustomer()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('email');



              $query = $this->Defination_Model->editgetemailcustomer($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }


              public function editexistcniccustomer()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('cnic');



              $query = $this->Defination_Model->editgetcniccustomer($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function editexistphonecustomer()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('phone');


              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->editgetphonecustomer($value,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }

              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function existemailcustomer()
              {
              $search=  $this->input->post('email');
              $query = $this->Defination_Model->getemailcustomer($search);

              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }

              public function existcontactcustomer()
              {
              $search=  $this->input->post('contactnumber');
              $query = $this->Defination_Model->getcustomercontact($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }

              public function existcustomercnic()
              {
              $search=  $this->input->post('cnic');
              $query = $this->Defination_Model->getcustomercnic($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }          
                                
              public function existphonecustomer()
              {
              $search=  $this->input->post('phone');
              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->editgetphonecustomer($value);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }
              }

              $data['valid']=true;
              echo json_encode($data);
              }


              public function savecustomer()
              {

              if($this->input->post())
              {
                $field=$this->input->post();
              //                if(!($field['image']=="" || $field['image']==null))
                 $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
                $url=$this->do_upload();
                $url2=$this->do_upload2();
                $data=array(
                    'name'=>$field['name'],
                    
                    'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'], 
                    'cnic'=>$field['cnic'],
                    'doc'=>$url2,
                    'cpname'=>$field['contactname'],
                    'cpnumber'=>$field['contactnumber'],
                    'email'=>$field['email'],
                    'image1'=>$url,
                    'status'=>0,
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id                 
                );
             
                $done=$this->Defination_Model->insert('customerinformation',$data);
                if($done)
                {
                    $this->session->set_flashdata('msg','Record has been Added Successfully
');
                    redirect('Defination/customerpage');
                
              }
                }

              }





              public function customerpage()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['customer']=$this->Defination_Model->viewcustomer();
              $data['page']='Customer/list';
              $this->load->view('Template/main',$data);


              }


              public function addcustomer()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['page']='Customer/add';
              $this->load->view('Template/main',$data);

              }




              public function eyecustomer()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['view']=$this->Defination_Model->customerDetails($id);
              $data['page']='Customer/view';
              $this->load->view('Template/main',$data);


              }


              public function editcustomer()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->db->where('id',$id)->get('customerinformation')->row();
              if($data['edit']==""){
              redirect('Error/dataNotFound');
              }
              $data['page']='Customer/edit';
              $this->load->view('Template/main',$data);

              }


              public function updatecustomer()
              {
              if($this->input->post())
              {
                 $field=$this->input->post();
                    
               $url=$this->do_upload();
               $url2=$this->do_upload2(); 
              $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
              $data=array(
                    'name'=>$field['name'],
                   'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                    'cnic'=>$field['cnic'],
                     'cpname'=>$field['contactname'],
                    'cpnumber'=>$field['contactnumber'],
                    'email'=>$field['email'],
                    'image1'=>$url,
                     'doc'=>$url2,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                    );

                if($url!='')
                    {
                    $data['image1']=$url;
                    }
                    
                    if($url2!='')
                    {
                   $data['doc']=$url2;
                    }
                
                    $done=$this->db->where('id',$field['id'])->update('customerinformation',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Updated Successfully
');
                       redirect('Defination/customerpage');
                       }
                
                
                }  

              }

              public function status_customer($id)
              {
              $query=$this->db->where('id',$id)->get('customerinformation')->row();

              $new=($query->status==0) ? 1:0;
              $data=array(
              'status'=>$new
              );
              $query=  $this->db->where('id',$id)->update('customerinformation',$data);

              if($query)
              {
              redirect('Defination/customerpage');
              }
                                }


              public function deletecustomer()
              {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('customerinformation',array('is_deleted'=>1));
              if($done)
                {
              $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
              redirect('Defination/customerpage');
               }
                       
              }  








             /****************************************** End of customer   *****************************************/



              /****************************************** Start Agent    ************************************************/




              public function editexistemailagent()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('email');



              $query = $this->Defination_Model->editgetemailagent($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }


              public function editexistcnicagent()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('cnic');



              $query = $this->Defination_Model->editgetcnicagent($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function editexistphoneagent()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('phone');


              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->editgetphoneagent($value,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }

              }

              $data['valid']=true;
              echo json_encode($data);
              }














              public function agentpage()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['agent']=$this->Defination_Model->viewagent();
              $data['page']='Agent/list';
              $this->load->view('Template/main',$data);

              }


              public function existagentcnic()
              {
              $search=  $this->input->post('cnic');
              $query = $this->Defination_Model->getagentcnic($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }

              public function existcontactagent()
              {
              $search=  $this->input->post('contactnumber');
              $query = $this->Defination_Model->getagentcontact($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }

              public function existphoneagent()
              {
              $search=  $this->input->post('phone');
              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->getphoneagent($value);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }
              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function existemail()
              {
              $search=  $this->input->post('email');
              $query = $this->Defination_Model->getemail($search);

              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }



              public function saveagent()
              {


              if($this->input->post())
              {
                $url=$this->do_upload();
                 $url2=$this->do_upload2();
                $field=$this->input->post();
                 $admin=json_decode(base64_decode($this->session->admin),true);
                 $id=$admin['id'];
                $data=array(
                    'name'=>$field['name'],
                     'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                     'doc'=>$url2,
                    'cnic'=>$field['cnic'],
                    'cpname'=>$field['contactname'],
                    'cpnumber'=>$field['contactnumber'],
                    'email'=>$field['email'],
                    'image1'=>$url,
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'status'=>0,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                );
               
                $done=$this->Defination_Model->insert('agentinformation',$data);
                if($done)
                {
                    $this->session->set_flashdata('msg','Record has been Added Successfully');
                    redirect('Defination/agentpage');
                }
              }
                }


              public function eyeagent()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['view']=$this->Defination_Model->agentDetails($id);
              $data['page']='Agent/view';
              $this->load->view('Template/main',$data);


              }


             

              public function addagent()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['page']='Agent/add';
              $this->load->view('Template/main',$data);

              }


              public function editagent()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->db->where('id',$id)->get('agentinformation')->row();
              if($data['edit']==""){
                 redirect('Error/dataNotFound');
              }
              $data['page']='Agent/edit';
              $this->load->view('Template/main',$data);

              }

              public function updateagent()
              {
              if($this->input->post())
              {
                 $field=$this->input->post();
                $url=$this->do_upload();
                 $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
               if($url=='')
                    {
                   $q=$this->db->select('image1')->where('id',$field['id'])->get('agentinformation')->row();
                   $url=$q->image1;
                    }
              $data=array(
                    'name'=>$field['name'],
                  'number'=>implode(',',$field['phone']),
                    
                    'address'=>$field['address'],
                     'cnic'=>$field['cnic'],
                     'cpname'=>$field['contactname'],
                    'cpnumber'=>$field['contactnumber'],
                    'email'=>$field['email'],
                    'image1'=>$url,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                  
                );
               
                    $done=$this->db->where('id',$field['id'])->update('agentinformation',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Updated Successfully
');
                       redirect('Defination/agentpage');
                       }
                
                }  

              }

              public function status_agent($id)
              {
              $query=$this->db->where('id',$id)->get('agentinformation')->row();

              $new=($query->status==0) ? 1:0;
              $data=array(
              'status'=>$new
              );
                                        $query=  $this->db->where('id',$id)->update('agentinformation',$data);

              if($query)
              {
              redirect('Defination/agentpage');
              }
                                }




              public function deleteagent()
              {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('agentinformation',array('is_deleted'=>1));
              if($done)
                {
              $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
              redirect('Defination/agentpage');
               }
                       
              }  


              /****************************************** End Agent    ************************************************/




              /****************************************** Start Contractor    ******************************/

              public function contractorpage()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['contractor']=$this->Defination_Model->viewcontractor();
              $data['page']='Contractor/list';
              $this->load->view('Template/main',$data);


              }

              public function existemailcontractor()
              {
              $search=  $this->input->post('email');
              $query = $this->Defination_Model->getemailcontractor($search);

              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }
              public function existcontactcontractor()
              {
              $search=  $this->input->post('contactnumber');
              $query = $this->Defination_Model->getcontactorcontact($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }

              public function existcontractorcnic()
              {
              $search=  $this->input->post('cnic');
              $query = $this->Defination_Model->getcontractorcnic($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }





              function file_selected_test(){

              $this->form_validation->set_message('file_selected_test', 'Please select file.');
              if (empty($_FILES['image']['name'])) {
              return false;
              }else{
              return true;
              }
              }


              public function existphonecontractor()
              {
              $search=  $this->input->post('phone');
              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->getphonecontractor($value);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }
              }

              $data['valid']=true;
              echo json_encode($data);
              }












              public function editexistemailcontractor()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('email');



              $query = $this->Defination_Model->editgetemailcontractor($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }


              public function editexistcniccontractor()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('cnic');



              $query = $this->Defination_Model->editgetcniccontractor($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function editexistphonecontractor()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('phone');


              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->editgetphonecontractor($value,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }

              }

              $data['valid']=true;
              echo json_encode($data);
              }


              public function savecontractor()
              {
               if($this->input->post())
              {
                $field=$this->input->post();
              //                if(!($field['image']=="" || $field['image']==null))
                $url=$this->do_upload();
                 $url2=$this->do_upload2();
                  $admin=json_decode(base64_decode($this->session->admin),true);
                $id=$admin['id'];
                $data=array(
                    'name'=>$field['name'],
                    'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                    'doc'=>$url2, 
                    'cnic'=>$field['cnic'],
                    'cpname'=>$field['contactname'],
                    'cpnumber'=>$field['contactnumber'],
                    'email'=>$field['email'],
                    'image1'=>$url,
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                 
                );
               
               
                $done=$this->Defination_Model->insert('contractorinformation',$data);
                if($done)
                {
                    $this->session->set_flashdata('msg','Record has been Added Successfully');
                    redirect('Defination/contractorpage');
                }

                }

              }

              public function editcontractor()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->db->where('id',$id)->get('contractorinformation')->row();
              if($data['edit']==""){
              redirect('Error/dataNotFound');
              }
              $data['page']='Contractor/edit';
              $this->load->view('Template/main',$data);

              }


              public function updatecontractor()
              {
              if($this->input->post())
              {
                 $field=$this->input->post();
                    
               $url=$this->do_upload();
                $url2=$this->do_upload2();
                $data=array(
                    'name'=>$field['name'],
                    
                   'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                    'cnic'=>$field['cnic'],
                     'cpname'=>$field['contactname'],
                    'cpnumber'=>$field['contactnumber'],
                    'email'=>$field['email'],                                    
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                  
                );
               if($url!='')
                    {
                   	$data['image1']=$url;
                    }
                    
                    if($url2!='')
                    {
                   $data['doc']=$url2;
                    }
                    $done=$this->db->where('id',$field['id'])->update('contractorinformation',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Updated Successfully
');
                       redirect('Defination/contractorpage');
                       }
                
                
                }  

              }

              public function eyecontractor()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['view']=$this->Defination_Model->contractorDetails($id);
              $data['page']='Contractor/view';
              $this->load->view('Template/main',$data);


              }


              public function deletecontractor()
              {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('contractorinformation',array('is_deleted'=>1));
              if($done)
                {
              $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
              redirect('Defination/contractorpage');
               }
                       
              }  
              public function status_contractor($id)
              {
              $query=$this->db->where('id',$id)->get('contractorinformation')->row();

              $new=($query->status==0) ? 1:0;
              $data=array(
              'status'=>$new
              );
              $query=  $this->db->where('id',$id)->update('contractorinformation',$data);

              if($query)
              {
              redirect('Defination/contractorpage');
              }
                                }


              public function status_expensetype1($id)
              {
              $query=$this->db->where('id',$id)->get('expensetype')->row();

              $new=($query->status==0) ? 1:0;
              $data=array(
              'status'=>$new
              );
              $query=  $this->db->where('id',$id)->update('expensetype',$data);

              if($query)
              {
              redirect('Defination/view_expensetype');
              }
                                }


              public function addcontractor()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;   
              $data['page']='Contractor/add';
              $this->load->view('Template/main',$data);

              }



              /****************************************** End Contractor    ************************************************/



              /****************************************** Start Driver    ************************************************/



              public function editexistcnicdriver()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('cnic');



              $query = $this->Defination_Model->editgetcnicdriver($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function editexistdriverdriver()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('driver');



              $query = $this->Defination_Model->editgetdriverdriver($search,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;


              }

              $data['valid']=true;
              echo json_encode($data);
              }



              public function editexistphonedriver()
              {

              $id=$this->input->post('id');

              $search=  $this->input->post('phone');


              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->editgetphonedriver($value,$id);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }

              }

              $data['valid']=true;
              echo json_encode($data);
              }


















              public function existphonedriver()
              {
              $search=  $this->input->post('phone');
              foreach ($search as $key => $value) {
              $query = $this->Defination_Model->getphonedriver($value);
              if($query) {
              $data['valid']=false;
              echo json_encode($data);die;
              }
              }

              $data['valid']=true;
              echo json_encode($data);
              }


              public function existdriverdriver()
              {
              $search=  $this->input->post('driver');
              $query = $this->Defination_Model->getdriverdriver($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }          





              public function driverpage()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['driver']=$this->Defination_Model->viewdriver();
              $data['page']='Driver/list';
              $this->load->view('Template/main',$data);


              }

              public function existdrivercnic()
              {
              $search=  $this->input->post('cnic');
              $query = $this->Defination_Model->getdrivercnic($search);


              if($query) {
              $data['valid']=false;
              echo json_encode($data);
              }else{
              $data['valid']=true;
              echo json_encode($data);
              }
              }

              public function savedriver()
              {

              if($this->input->post())
              {
               $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
                $url=$this->do_upload();
                $url2=$this->do_upload2();
                $field=$this->input->post();
                $data=array(
                     'name'=>$field['name'],
                     'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                     'religion'=>$field['religion'],
                    'cnic'=>$field['cnic'],
                     'doj'=>$field['doj'],
                    'dob'=>$field['dob'],
                    'dl'=>$field['driver'],
                     'status'=>0,
                    'image1'=>$url,
                    'doc'=>$url2,
                     'type'=>$field['type'],
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                );
               
                $done=$this->Defination_Model->insert('driverinformation',$data);
                if($done)
                {
                    $this->session->set_flashdata('msg','Record has been Added Successfully');
                    redirect('Defination/driverpage');
                }


              }
              }


              //driver bilal
              public function eyedriver()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['view']=$this->Defination_Model->driverDetails($id);
              $data['page']='Driver/view';
              $this->load->view('Template/main',$data);


              }

              public function editdriver()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->db->where('id',$id)->get('driverinformation')->row();
              if($data['edit']==""){
              redirect('Error/dataNotFound');
              }
              $data['page']='Driver/edit';
              $this->load->view('Template/main',$data);

              }


              public function adddriver()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo; 
              $data['page']='Driver/add';
              $this->load->view('Template/main',$data);

              }

              public function updatedriver()
              {
              if($this->input->post())
              {
                 $field=$this->input->post();
                   
                $url=$this->do_upload();
                $url2=$this->do_upload2();
                $admin=json_decode(base64_decode($this->session->admin),true);
                $id=$admin['id'];
                $data=array(
                   'name'=>$field['name'],
                    'number'=>implode(',',$field['phone']),
                    'address'=>$field['address'],
                     'religion'=>$field['religion'],
                    'cnic'=>$field['cnic'],
                     'doj'=>$field['doj'],
                    'dob'=>$field['dob'],
                    'dl'=>$field['driver'],
                    'type'=>$field['type'],
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id                  
                );
              
                if($url!='')
                    {
                   	$data['image1']=$url;
                    }
                    
                    if($url2!='')
                    {
                   $data['doc']=$url2;
                    }
                    $done=$this->db->where('id',$field['id'])->update('driverinformation',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Updated Successfully
');
                       redirect('Defination/driverpage');
                       }
                
                }  

              }

              public function deletedriver()
              {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('driverinformation',array('is_deleted'=>1));
              if($done)
                {
              $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
              redirect('Defination/driverpage');
               }
               
               
               
                       
              } 



              public function status_driver($id)
              {
              $query=$this->db->where('id',$id)->get('driverinformation')->row();

              $new=($query->status==0) ? 1:0;
              $data=array(
              'status'=>$new
              );
              $query=  $this->db->where('id',$id)->update('driverinformation',$data);

              if($query)
              {
              redirect('Defination/driverpage');
              }
                                }





              /****************************************** End Driver    ************************************************/



              /****************************************** Start Route    ************************************************/

              public function routepage()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['route']=$this->Defination_Model->getroute();
              $data['page']='Route/list';
              $this->load->view('Template/main',$data);

              }

              public function saveroute()
              {

              if($this->input->post())
              {

              $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];

                $field=$this->input->post();
                $data=array(
                     'source'=>$field['source'],
                     'destination'=>$field['destination'],
                     'product'=>$field['product'],
                     'freight'=>$field['freight'],
                     'fromdate'=>$field['from'],
                     'todate'=>$field['to'],
                     'type'=>$field['type'],
                    'createdAt'=>date("Y-m-d h:i:sa"),
                    'createdBy'=>$id,
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id
                );
                $done=$this->Defination_Model->insert('routedefination',$data);
                if($done)
                {
                    $this->session->set_flashdata('msg','Record has been Added Successfully');
                    redirect('Defination/addroute');
                }
              }

              }



              public function addroute()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data["producttype"]=$this->Generic_model->getAllRecords("producttype",array("is_deleted"=>0)
              ,"id","DESC");
              $data["product"]=$this->Generic_model->getAllRecords("product",array("is_deleted"=>0)
              ,"id","DESC");
              $data['location']=$this->db->where('is_delete',0)->get('locationtype')->result_array();
              $data['page']='Route/add';
              $this->load->view('Template/main',$data);

              }

              public function editroute()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->Defination_Model->editroute($id);
              $data['loc']=$this->Defination_Model->loctype();     
              $data['product']=$this->Defination_Model->product();
              $data['page']='Route/edit';
              $this->load->view('Template/main',$data);

              }

              public function updateroute()
              {
              if($this->input->post())
              {
              $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
              $field=$this->input->post();
                    $data=array(
                     'source'=>$field['source'],
                     'destination'=>$field['destination'],
                     'product'=>$field['product'],
                     'freight'=>$field['freight'],
                     'fromdate'=>$field['from'],
                     'todate'=>$field['to'],
                     'type'=>$field['type'],
                    'modifiedAt'=>date("Y-m-d h:i:sa"),
                    'modifiedBy'=>$id                    
                );
               
                    $done=$this->db->where('id',$field['id'])->update('routedefination',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record is  Updated');
                       redirect('Defination/routepage');
                       }
                
                }  

              }

              public function deleteroute()
              {
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('routedefination',array('is_deleted'=>1));
              if($done)
                {
              $this->session->set_flashdata('msg', 'Record is Deleted!');
              redirect('Defination/routepage');
               }

              }  

              //ajax response

              public function save_product()
              {

              $field=array(
              'heading'=> $this->input->post('productName'),
              'product_type'=> $this->input->post('productType')
              );

              $done=$this->Defination_Model->insert('product',$field); 
              if($done)
              {
              return true;
              }
              else{
              return false;
              }
              }


              //ajax response

              public function get_all_products()
              {
              $data=$this->db->select()->from('product')->get()->result_array();
              $return="";
              foreach ($data as $key => $value) {

              $return.="<option value='".$value['id']."'>".$value['heading']."</option>";

              }
              echo $return;

              }


              //ajax response
              public function savesour()
              {
              $data=array(
              'name'=>$this->input->post('location')
              );
              $done=$this->Defination_Model->insert('locationtype',$data); 
              if($done)
              {
              return true;
              }
              else{
              return false;
              }    

              }

              public function get_all_location()
              {
              $data=$this->db->select()->from('locationtype')->get()->result_array();
              $return="";
              foreach ($data as $key => $value) {

              $return.="<option value='".$value['id']."'>".$value['name']."</option>";

              }
              echo $return;

              }



              /****************************************** End Route    ************************************************/








              public function view_expense()
              {
              $data['userInfo'] = $this->userInfo;
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['expense']= $this->db->query("SELECT * FROM expense WHERE is_delete='0'")->result_array();
              //var_dump($data['office']);die;
              $data['page']='expense/view';
              $this->load->view('Template/main',$data);        
              }



              public function add_expense()
              {


              $data['userInfo'] = $this->userInfo;
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['page']='expense/add';
              $this->load->view('Template/main',$data);        
              }


              public function edit_expense()
              {
              $data['userInfo'] = $this->userInfo;

              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['page']='expense/edit';
              $this->load->view('Template/main',$data);        
              }


              public function save_expense()
              {
              if ($this->input->post()) {
              $data =array(
              'date'=>$this->input->post("date",true),
              'title'=>$this->input->post("title",true),
              'amount'=>$this->input->post("amount",true),
              'payee'=>$this->input->post("payee",true),
              'remarks'=>$this->input->post("remarks",true),
              );

              $this->db->insert('expense', $data);
              redirect('Defination/view_expense','refresh');

              }

              }


              public function update_expense($id)
              {

              if ($this->input->post()) {
              $data =array(
              'date'=>$this->input->post("date",true),
              'title'=>$this->input->post("title",true),
              'amount'=>$this->input->post("amount",true),
              'payee'=>$this->input->post("payee",true),
              'remarks'=>$this->input->post("remarks",true),
              );
                  $this->db->where('id', $id);
              $this->db->update('expense', $data);
              redirect('Definition/view_expense','refresh');

              }

              }


              public function delete_expense($id)
              {

              $this->db->where('id', $id);
              $this->db->delte('expense', $data);
              redirect('Definition/view_expense','refresh');

              }





              /****************************************** Start Expense Type   ************************************************/
                                
                                
              public function addexpensetype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['page']='expensetype/add';
              $this->load->view('Template/main',$data);

              }




              public function savexpensetype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;

              $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
              $date = date("Y-m-d H:i:s");
              if($this->input->post()){
              $data=$this->input->post();
              $field=array(
                 'name'=>$data['name'],
                 'remarks'=>$data['remarks'],
                  'createdAt '=>$date,
                 'createdBy'=>$id,
                 'modifiedAt'=>$date,
                 'modifiedBy'=>$id
                );

                $done=$this->Defination_Model->insert('expensetype',$field);
                     if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Added Successfully
');
                       redirect('Defination/addexpensetype');
                       }
               
              }
              $data['page']='expensetype/add';
              $this->load->view('Template/main',$data);

              }



              //expensetype details page bilal
              public function expensetype_eye($id)
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['view']=$this->Defination_Model->expensetypeDetails($id);
              $data['page']='expensetype/expensetype_details';
              $this->load->view('Template/main',$data);

              }

                public function printexpensedet($p='')
              {

              $data['view']=$this->db->where('id',$p)->get('expensetype')->row();
              $this->load->view('expensetype/expense_p',$data);
              }



              public function view_expensetype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['page']='expensetype/view';
              $this->load->view('Template/main',$data);

              }




              public function editexpensetype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->db->where('id',$id)->get('expensetype')->row();
              if($data['edit']==""){
              redirect('Error/dataNotFound');
              }
              $data['page']='expensetype/edit';
              $this->load->view('Template/main',$data);

              }

              public function updateexpensetype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $admin=json_decode(base64_decode($this->session->admin),true);
              $id=$admin['id'];
              $date = date("Y-m-d H:i:s");
              if($this->input->post())
              {
                 $field=$this->input->post();
               
              $data=array(
                    
                    'name'=>$field['name'],
                 'remarks'=>$field['remarks'],
                  'createdAt '=>$date,
                 'createdBy'=>$id,
                 'modifiedAt'=>$date,
                 'modifiedBy'=>$id
                );
                

                    $done=$this->db->where('id',$field['id'])->update('expensetype',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Updated Successfully
');
                       redirect('Defination/view_expensetype');
                       }
                
                }  

              }

              public function deleteexpensetype()
              {
                  
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('expensetype',array('is_delete'=>1));
              if($done)
                {
              $this->session->set_flashdata('msg', 'Record has been Deleted Successfully
');
              redirect('Defination/view_expensetype');
               }
                       
              }  
                                
                                
                                
              /****************************************** End Expense Type    ************************************************/
                                
                                
                                
              /****************************************** Start Location Type   ************************************************/
                                
                                                       
              public function addlocationtypetype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['page']='locationtype/add';
              $this->load->view('Template/main',$data);

              }


              public function savelocationtype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;

              if($this->input->post()){
              $data=$this->input->post();
              $field=array(
              'name'=>$data['name'],
              'remarks'=>$data['remarks']

                );
                $done=$this->Defination_Model->insert('locationtype',$field);
                     if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Added Successfully
');
                       redirect('Defination/view_locationtype');
                       }
               
              }
              $data['page']='locationtype/add';
              $this->load->view('Template/main',$data);

              }




              public function view_locationtype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $data['page']='locationtype/view';
              $this->load->view('Template/main',$data);

              }



              public function editlocationtype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $data['edit']=$this->db->where('id',$id)->get('locationtype')->row();
              $data['page']='locationtype/edit';
              $this->load->view('Template/main',$data);

              }

              public function updatelocationtype()
              {
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;

              if($this->input->post())
              {
                 $field=$this->input->post();
               
              $data=array(
                    'name'=>$field['name'],
                    'remarks'=>$field['remarks']
                );
                
               
                    $done=$this->db->where('id',$field['id'])->update('locationtype',$data);
                    if($done)
                       {
                       $this->session->set_flashdata('msg', 'Record has been Updated Successfully
');
                       redirect('Defination/view_locationtype');
                       }
                
                }  

              }

              public function deletelocationtype()
              {
                  
              $data['menu'] = $this->load_model->menu();
              $data['base_url'] = base_url();
              $data['userInfo'] = $this->userInfo;
              $id=$this->uri->segment(3);
              $done=$this->db->where('id',$id)->update('locationtype',array('is_delete'=>1));
              if($done)
                {
              $this->session->set_flashdata('msg', 'Record has been Deleted Successfully');
              redirect('Defination/view_locationtype');
               }
                       
              }          
                            
                                
                                
                                
              /****************************************** End Location Type     ************************************************/
                                

















              }

              ?>