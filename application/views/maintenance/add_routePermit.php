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
              <h3 class="box-title">Add Route Permit</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <form class="form-horizontal"  action="<?php echo base_url()?>Maintenance/save_routePermit" method="post">         
                     <div class="form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Vechile</label>                       
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="vehicle" selected="selected" >
                          <option value="">Select Options</option>       
                           <?php  if(!empty($vehicle)){
                            foreach ($vehicle as $c){ ?>        
                            <option value="<?php  echo  $c["id"];?>"   >
                            <?php  echo  $c["heading"];?>
                            </option>               
                            <?php }} ?>
                          </select> 
                        </div>
                     </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Route Permit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="route_permit" type="text" class="form-control" onkeypress='return ValidateNumberOnly()'>                        
                          </div>
                      </div>
                  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Start Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="start_date" type="date" class="form-control" >                        
                          </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">End Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="end_date" type="date" class="form-control" >                        
                          </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Notification Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="notification_date" type="date" class="form-control" >                        
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


<script>

function ValidateNumberOnly()
{

if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 46  ) 
{
   event.returnValue = false;
}

}

</script>