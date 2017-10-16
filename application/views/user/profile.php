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
                   <?php if (empty($admin->image1)): ?>
                    <img src="<?php echo base_url() ?>assets/Images/placeholder.jpg">   
                  <?php else : ?>
                   <img alt="User Pic" src="<?php echo base_url().$admin->image1; ?>" width="300" height="400" class="img-responsive img-thumbnail">
                 <?php endif ?>
                 </div>
                
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     
                         <tr>
                             <td><strong>Name:</strong></td>
                             <td style="padding-right:170px"><?php if(isset($admin)){echo ucfirst($admin->first_name) . ucfirst($admin->last_name) ;}  ?></td>
                          </tr>
                        
                        <tr>
                       <td><strong>Username:</strong></td>
                       <td><?php if(isset($admin)){echo ucfirst($admin->username);}  ?></td>
                      </tr>
                      
                      <td><strong>Phone Number:</strong></td>
                        <td><?php if(isset($admin)){echo ucfirst($admin->contact_no);}  ?>
                        </td>
                      
                       
                        <tr>
                       <td><strong>Email:</strong></td>
                        <td><?php if(isset($admin)){echo ucfirst($admin->email);}  ?></td>
                      </tr>
                      
              
                    
                     
                    </tbody>
                  </table>
                  <!--   <a type="submit" name="register" href='<?php echo base_url()?>Defination/contractorpage'; class="btn btn-danger"><i class="fa fa-reply"></i></a>
                 <a class="btn btn-primary" float:right href="<?php echo $base_url; ?>Defination/printcontracttor/<?php //echo $admin->id; ?>" target="_blank"><i class="fa fa-print"></i></a> -->
                 
                 
                 
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


           