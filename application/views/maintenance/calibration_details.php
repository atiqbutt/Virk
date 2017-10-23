<section class="content">
      <div class="row">
      
        <div class="col-md-12" >
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Calibration Information</h3>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-lg-9"> 
                  <table class="table table-user-information">
                    <tbody>
                     
                      <tr>
                       <td><strong>Vehicle:</strong></td>
                       <td style="padding-right:170px"><?php if(isset($calibration)){echo ucfirst($calibration->vehicle);}  ?>
                       </td>
                      </tr>
                        
                      <tr>
                       <td><strong>calibration:</strong></td>
                       <td><?php if(isset($calibration)){echo ucfirst($calibration->calibration);}  ?></td>
                      </tr>
                      
                      <td><strong>Issue Date</strong></td>
                        <td><?php if(isset($calibration)){echo ucfirst($calibration->start_date);}  ?>
                      </td>
                        
                      <tr>
                       <td><strong>Expiry Date:</strong></td>
                        <td><?php if(isset($calibration)){echo ucfirst($calibration->end_date);}  ?></td>
                      </tr>
                      
                      <tr>
                       <td><strong>Notification Date:</strong></td>
                        <td><?php if(isset($calibration)){echo ucfirst($calibration->notification_date);}  ?></td>
                      </tr>

                       <tr>
                       <td><strong>Fee:</strong></td>
                        <td><?php if(isset($calibration)){echo ucfirst($calibration->fee);}  ?></td>
                      </tr>

                     
                    </tbody>
                  </table>
                    <a type="submit" name="register" href='<?php echo base_url()?>Defination/contractorpage'; class="btn btn-danger"><i class="fa fa-reply"></i></a>
                 <a class="btn btn-primary" float:right href="<?php echo $base_url; ?>Defination/printcontracttor/<?php echo $calibration->id; ?>" target="_blank"><i class="fa fa-print"></i></a>
 
                </div>
                <!-- col-md-9 col-lg-9 -->

                 <div class="col-md-3 col-lg-3" align="center">
                   <?php if (empty($calibration->image)): ?>
                    <img src="<?php echo base_url() ?>assets/Images/placeholder.jpg">   
                  <?php else : ?>
                   <img alt="User Pic" src="<?php echo base_url().$calibration->image; ?>" width="300" height="300" class="img-responsive img-thumbnail">
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

