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
                 <form class="form-horizontal" id="expense" action="<?php echo base_url()?>Commission/save_contractor_company" method="post">
          
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Company</label>

                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="company_id" selected="selected" >
                          <option value="">Select Options</option>       
                           <?php  if(!empty($companies)){
                            foreach ($companies as $c){ ?>        
                            <option value="<?php  echo  $c["id"];?>"   >
                            <?php  echo  $c["name"];?>
                            </option>               
                            <?php }} ?>
                          </select> 
                       </div>
                     </div>
                  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Commission_1<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="commission_1" type="text" class="form-control" >                        
                          </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Withholding Tax<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input  name="withholding_tax" type="text" class="form-control" >                        
                          </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Commission_3<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="commission_3" type="text" class="form-control" >                        
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