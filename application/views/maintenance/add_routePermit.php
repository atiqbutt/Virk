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
                 <form id="add_permit" class="form-horizontal"  action="<?php echo base_url()?>Maintenance/save_routePermit" method="post">         
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
                          <input  name="calibration" type="text" class="form-control" onkeypress='return ValidateNumberOnly()'>                        
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

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Fee<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="fee" type="text" class="form-control" >                        
                          </div>
                      </div>
                  

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Scan Document<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="file" name="userfile" class="form-control" >                     
                          </div>
                      </div>
                  


                      <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
                        <input type="submit" value="Add" class="btn btn-primary" > 
                        <button type="reset" class="btn btn-success" >Reset</button>
                        <a href="<?php echo base_url() ?>Maintenance/view_routePermit" class="btn btn-danger">Cancel</a>   
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
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#picture").change(function() {
    readURL(this);
  $('#img').removeAttr('style')
});

</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#add_permit')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                certificate_number: {
                   trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The calibration Field is required and cannot be empty'
                        },
                        integer: {
                            message: 'The value is not an integer',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                       
                    }
                },

                fee: {
                   trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Fee Field is required and cannot be empty'
                        },
                        integer: {
                            message: 'The value is not an integer',
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                       
                    }
                },
            
            }
        });

});


</script>