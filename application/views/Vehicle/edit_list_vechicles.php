<script src="<?php echo base_url()?>assets/commonFormValidator.js" type="text/javascript"></script>
<section class="content">

    <div class="row">
        <div class="col-md-12">
           <?php if ($this->session->flashdata('msg' )): ?>
          <div class="alert alert-success">
          <?php echo $this->session->flashdata('msg'); ?>  
          </div>
           <?php endif; ?>
  <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Manage Vehicle Status</h2>
               <p style="color:green;font-weight: bold;padding:10px;text-align: center"><?php echo $this->session->flashdata('msg');?></p>
 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url()?>Vehicle/Vehicle_status_update" method="post" enctype="multipart/formdata">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name <span class="required">*</span></label>
            <input type="hidden" name="id" value=<?php echo $vehiclestatus->id?>>
                  <div class="col-sm-6">
                      <input type="name" name="name" value=<?php echo $vehiclestatus->heading ?>  onkeypress="return maskAlphaWithSp(this,event);"  class="form-control" id="inputEmail3" placeholder="Name" required>
                  </div>
                </div>
               
              </div>
           
                         <div class="form-group" style="padding-bottom: 10px ">
                            <div class="col-sm-10 col-sm-offset-2"> 
                               <input class="btn btn-success" type="submit" name="register" value="Update" />
                               <input class="btn btn-warning" type="reset" name="reset" value="Reset" />
                               <a class="btn btn-danger"href="<?php echo base_url() ?>Vehicle/Vehicle_Status_list">Cancel</a>
                           </div>
                        </div>
            </form>
          </div>
    </div>
    </div>
</div>
</section>