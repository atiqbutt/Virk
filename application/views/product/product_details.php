<section class="content">
      <div class="row">
      
        <div class="col-md-12" >
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Product Type Information</h3>
            </div>

            <div class="panel-body">
              <div class="row">
                  <div class="col-md-3 col-lg-3" align="center">
                  
                   
                   <img alt="User Pic" src="<?php echo base_url()?>assets/Images/raw/product.jpg" width="300" height="400" class="img-responsive img-thumbnail">
                
                 </div>
                
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     
                         <tr>
                             <td><strong>Name:</strong></td>
                             <td style="padding-right:170px"><?php if(isset($view)){echo ucfirst($view->heading);}  ?></td>
                      </tr>

                         <tr>
                             <td><strong>Product Type:</strong></td>
                             <td style="padding-right:170px"><?php if(isset($view)){echo ucfirst($view->na);}  ?></td>
                      </tr>

                         <tr>
                             <td><strong>unit :</strong></td>
                             <td style="padding-right:170px"><?php if(isset($view)){echo ucfirst($view->n);}  ?></td>
                      </tr>


                         <tr>
                             <td><strong>Price</strong></td>
                             <td style="padding-right:170px"><?php if(isset($view)){echo ucfirst($view->price);}  ?></td>
                      </tr>




                      <tr>
                             <td><strong>Description  :</strong></td>
                             <td style="padding-right:170px"><?php if(isset($view)){echo ucfirst($view->description  );}  ?></td>
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
                    <a type="submit" name="register" href='<?php echo base_url()?>product/list_prodcut'; class="btn btn-danger"><i class="fa fa-reply"></i></a>
                 <a class="btn btn-primary" float:right href="<?php echo $base_url; ?>product/eyelist_product/<?php echo $view->id; ?>" target="_blank"><i class="fa fa-print"></i></a>
                 
                 
                 
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


           