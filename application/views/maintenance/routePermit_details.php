<section class="content">
      <div class="row">
      
        <div class="col-md-12" >
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Route Permit Information</h3>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-lg-9"> 
                  <table class="table table-user-information">
                    <tbody>
                     
                      <tr>
                       <td><strong>Vehicle:</strong></td>
                       <td style="padding-right:170px"><?php if(isset($permit)){echo ucfirst($permit->vehicle);}  ?>
                       </td>
                      </tr>
                        
                      <tr>
                       <td><strong>permit:</strong></td>
                       <td><?php if(isset($permit)){echo ucfirst($permit->route_permit);}  ?></td>
                      </tr>
                      
                      <td><strong>Issue Date</strong></td>
                        <td><?php if(isset($permit)){echo ucfirst($permit->start_date);}  ?>
                      </td>
                        
                      <tr>
                       <td><strong>Expiry Date:</strong></td>
                        <td><?php if(isset($permit)){echo ucfirst($permit->end_date);}  ?></td>
                      </tr>
                      
                      <tr>
                       <td><strong>Notification Date:</strong></td>
                        <td><?php if(isset($permit)){echo ucfirst($permit->notification_date);}  ?></td>
                      </tr>

                       <tr>
                       <td><strong>Fee:</strong></td>
                        <td><?php if(isset($permit)){echo ucfirst($permit->fee);}  ?></td>
                      </tr>

                     
                    </tbody>
                  </table>
                    <a type="submit" name="register" href='<?php echo base_url()?>Defination/contractorpage'; class="btn btn-danger"><i class="fa fa-reply"></i></a>
                 <a class="btn btn-primary" float:right href="<?php echo $base_url; ?>Defination/printcontracttor/<?php //echo $permit->id; ?>" target="_blank"><i class="fa fa-print"></i></a>
 
                </div>
                <!-- col-md-9 col-lg-9 -->

                 <div class="col-md-3 col-lg-3" align="center">
                   <?php if (empty($permit->image)): ?>
                    <img src="<?php echo base_url() ?>assets/Images/placeholder.jpg">   
                  <?php else : ?>
                   <img alt="User Pic" src="<?php echo base_url().$permit->image; ?>" width="300" height="300" class="img-responsive img-thumbnail">
                 <?php endif ?>
                 </div>
                 <!-- col-md-3 col-lg-3 -->


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

