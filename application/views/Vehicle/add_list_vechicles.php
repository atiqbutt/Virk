
<script>

function ValidateNumberOnly()
{
if ((event.keyCode < 48 || event.keyCode > 57)) 
{
   event.returnValue = false;
}
}

</script>

<style type="text/css">
    
    .ko{
        color:black;
    }
    </style> 
<!-- /.row -->
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
              <h3 class="box-title">Add Vehicle Status</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <form id="shippingForm" class="form-horizontal" action="<?php echo base_url()?>Vehicle/Vehicle_status_save" method="post" enctype="multipart/formdata">
           
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                            <input type="name" name="name" class="form-control" id="inputEmail3"  onkeypress="return maskAlphaWithSp(this,event);" placeholder="Name">
                
                  
                        </div>
                      </div>
                    
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                       
                         <button type="submit" name="register" class="btn btn-success">Submit</button>&nbsp&nbsp<button type="reset" class="btn btn-warning">Reset</button>&nbsp&nbsp<button type="submit" name="register"  onclick="window.location.href='<?php echo base_url()?>Vehicle/Vehicle_Status_list';" class="btn btn-danger">Cancel</button>
            
                        </div>
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
 
 
 
 
 

<script type="text/javascript">
    $(document).ready(function() {
        $('#shippingForm')
            .on('init.form.bv', function(e, data) {
                //console.log(data);
            })
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The name is required'
                            }
                        }
                    },
                   
                
               
                    


                    




             
                    
             
                   
                }
            });
    });
</script>



