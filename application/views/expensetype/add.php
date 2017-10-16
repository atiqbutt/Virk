
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
              <h3 class="box-title">Add Expense Type</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <form class="form-horizontal" id="expense" action="<?php echo base_url()?>Defination/savexpensetype" method="post">
          
                  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="time_out" name="name" type="text" placeholder="name" class="form-control" >                        
                          </div>
                      </div>
   
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="address" name="remarks" class="form-control"  placeholder="remarks" >
                        </div>
                      </div>
                     <input type="submit" name="myform" value="Submit" class="col-md-offset-3 btn btn-success"> 
                      <input id="zzz" class="btn btn-warning" type="reset" name="reset" value="Reset" />  
                       <a type="submit" name="register" href='<?php echo base_url()?>Defination/view_expensetype' class="btn btn-danger">Cancel</a>
               
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

function ValidateNumberOnly()
{
if ((event.keyCode < 48 || event.keyCode > 57)) 
{
   event.returnValue = false;
}
}

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#expense')
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
                                message: 'The name field is required'
                            }
                        }
                    },
                   
                   
                  
                }

            });

    });
    

$("#zzz").click(function(){
   $('#shippingForm').bootstrapValidator("resetForm",true);    
});

</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBbDBcMA-rjt7I6ZryDcry9M72L7UlDERc&libraries=places"></script>

