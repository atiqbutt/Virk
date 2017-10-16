 public function upload()
     {

        // var_dump($_FILES);die();

	
      if(!empty($_FILES["files"]["name"]))
      {
       $output = '';
       $config["upload_path"] = './Uploads/';
       $config["allowed_types"] = 'gif|jpg|png';
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
       {
        $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
        $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
        $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
        $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
        $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
        
 //var_dump($this->upload->do_upload('files'));die();

      if($this->upload->do_upload('files'))
        {
         $data = $this->upload->data();
         if ($data) {
           
             $output .= '
          <img src="'.base_url().'uploads/'.$data["file_name"].'" class="img-responsive img-thumbnail img" height="150px" />
         ';
         }

        }
       }
      
       echo $output;   
      }
     }