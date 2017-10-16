 <section class="content">
      <div class="row">
           <div class="col-md-12">
           <?php if ($this->session->flashdata('msg' )): ?>
          <div class="alert alert-success">
          <?php echo $this->session->flashdata('msg'); ?>  
          </div>
           <?php endif; ?> 
        <div class="col-xs-12">
          <div class="box col-sm-12">
            <div class="box-header" >
              <h3 class="box-title">Make Deal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <form class="form-horizontal" id="expense" action="<?php echo base_url()?>Commission/save_contractor_customer" method="post">
          
                      <div class="form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contractor</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="contractor_id" selected="selected" >
                          <option value="">Select Options</option>       
                           <?php  if(!empty($contractors)){
                            foreach ($contractors as $c){ ?>        
                            <option value="<?php  echo  $c["id"];?>"   >
                            <?php  echo  $c["name"];?>
                            </option>               
                            <?php }} ?>
                          </select> 
                        </div>
                      </div>

                        <div class="form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="customer_id" selected="selected" >
                          <option value="">Select Options</option>       
                           <?php  if(!empty($customers)){
                            foreach ($customers as $c){ ?>        
                            <option value="<?php  echo  $c["id"];?>"   >
                            <?php  echo  $c["name"];?>
                            </option>               
                            <?php }} ?>
                          </select> 
                        </div>
                      </div>
                    
                  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Freight Commission
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fc" name="freight_commission" type="text" class="form-control" >                        
                          </div>
                      </div>
                      
                      <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
                        <input type="submit" value="Add" class="btn btn-primary" >  
                      </div> 
               
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>