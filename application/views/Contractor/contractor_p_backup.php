<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        
 <style>   
    @media print {
  a {
    display:none;
  }
  }

 @media screen and projection {
    a {
        display:inline;
    }
  }
  </style>
</head>
<body onload="window.print();">    
	
<div class="container" style="padding-top:20px" >
      <div class="row">
      
        <div class="col-md-8 col-md-offset-1" >
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Contractor Information</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                  <div class="col-md-3 col-lg-3" align="center"> <img alt="User Pic" src="<?php echo base_url().$view->image1; ?>" width="300px" class="img-responsive img-thumbnail"></div>
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     
                         <tr>
                             <td><strong>Name:</strong></td>
                             <td style="padding-right:170px"><?php if(isset($view)){echo ucfirst($view->name);}  ?></td>
                      </tr>
                        
                        <tr>
                       <td><strong>Address:</strong></td>
                       <td><?php if(isset($view)){echo ucfirst($view->address);}  ?></td>
                      </tr>
                      
                      <td><strong>Phone Number:</strong></td>
                        <td><?php if(isset($view)){echo ucfirst($view->number);}  ?>
                        </td>
                      
                       
                        <tr>
                       <td><strong>Contact Person Name:</strong></td>
                        <td><?php if(isset($view)){echo ucfirst($view->cpname);}  ?></td>
                      </tr>
                      
                      
                        <tr>
                       <td><strong>Contact Person Number:</strong></td>
                        <td><?php if(isset($view)){echo ucfirst($view->cpnumber);}  ?></td>
                      </tr>
                      
                      
                       <tr>
                       <td><strong>Cnic:</strong></td>
                        <td><?php if(isset($view)){echo ucfirst($view->cnic);}  ?></td>
                      </tr>
                     
                       <tr>
                       <td><strong>Email:</strong></td>
                       <td><a href="<?php echo $view->email?>"><?php if(isset($view)){echo ucfirst($view->email);}  ?></td>
                      </tr>
                     
                    
                     
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>


  </body>
</html>