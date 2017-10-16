<section class="content">
      <div class="row">
      
        <div class="col-md-12" >
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Contractor Information</h3>
            </div>

            <div class="panel-body">
              <div class="row">
                  <div class="col-md-3 col-lg-3" align="center">
                   <?php if (empty($view->image1)): ?>
                    <img src="<?php echo base_url() ?>assets/Images/placeholder.jpg">   
                  <?php else : ?>
                   <img alt="User Pic" src="<?php echo base_url().$view->image1; ?>" width="300" height="400" class="img-responsive img-thumbnail">
                 <?php endif ?>
                 </div>
                
                
                
                <div class="col-md-9 col-lg-9"> 
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
                     
                       
                      
                      

                     <tr>
                       <td><strong>Status:</strong></td>
                        <td>
                          <?php

                          $status=$view->status;
                          if($status==0)
                          {
                            ?>
                             <h4 style="color:red;"><span class="abel label-success">Active</span></h4>
                          <?php
                        
                      }
                        else{
                          ?>
                            <h4 style="color:red;"><span class="label label-danger">De Active</span></h4>
                        <?php
                      }

                          ?>

                        </td>
                      </tr>

                  
                     
                      
                    
                     
                    </tbody>
                  </table>
                    <a type="submit" name="register" href='<?php echo base_url()?>Defination/contractorpage'; class="btn btn-danger"><i class="fa fa-reply"></i></a>
                 <a class="btn btn-primary" float:right href="<?php echo $base_url; ?>Defination/printcontracttor/<?php echo $view->id; ?>" target="_blank"><i class="fa fa-print"></i></a>
                 
                 
                 
                </div>
                <!-- col-md-9 col-lg-9 -->
              </div>
                   <!-- row -->        
            </div>
                <!--  panel-body -->
          </div>
          <!-- panel panel-info -->

        </div>
        <!-- col-md-12 -->
      </div>
   <!-- row -->


</section>


           