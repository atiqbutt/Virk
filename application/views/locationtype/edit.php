   
                            
   

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
              <h3 class="box-title">Manage Location</h3>
            </div>
          
          
          
          
          
          
          
 
      
<div class="col-md-6">
 <form  enctype="multipart/form-data" method="post" id="shippingForm" action="<?php echo base_url()?>Defination/updatelocationtype" >
      <div class="item form-group col-lg-12" style="margin-bottom:10px;">
        <div class="col-lg-3">Title</div>
           <div class="col-lg-9">
                  <input type="address" name="name" class="form-control"  placeholder="Title" value="<?php echo $edit->name?>">
           </div>       
      </div>
        <input type="hidden" name="id" value="<?php echo $edit->id?>">
      <div class="item form-group  col-lg-12">
        <div class="col-lg-3">Remarks</div>
               <div class="col-lg-9">
                <input type="address" name="remarks" class="form-control"  placeholder="remarks" value="<?php echo $edit->remarks?>">
               </div>
        </div>
 
          <div class="form-group">
            <div class="col-md-offset-3" style="padding-left: 20px">
              <input class="btn btn-success" type="submit" name="register" value="Update" />
              <input id="zzz" class="btn btn-warning" type="reset" name="reset" value="Reset" />
              <a type="submit" name="register" href='<?php echo base_url()?>Defination/view_locationtype'; class="btn btn-danger">Cancel</a>

          </div>

        </form>
</div>
    
          
          
         
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

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBVTKLztwVOGDuo1qGsjHzdY7wXRcKbAVI"> </script>
<script>
