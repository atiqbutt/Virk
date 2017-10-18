<script src="<?php echo base_url()?>assets/commonFormValidator.js" type="text/javascript"></script>
<script>

function ValidateNumberOnly()
{
if ((event.keyCode < 45 || event.keyCode > 57)) 
{
   event.returnValue = false;
}
}

</script>










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
              <h3 class="box-title">Add Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <form id="shippingForm" class="form-horizontal" action="<?php echo base_url()?>product/save_product" method="post" enctype="multipart/formdata">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name <span class="required">*</span></label>

                  <div class="col-sm-6">
                      <input type="name" name="heading"  onkeypress="return maskAlphaWithSp(this,event);" class="form-control" id="inputEmail3" placeholder="Enter Name" required>
                
                  </div>
                </div>
                  
                  
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Product Type <span class="required">*</span></label>

                  <div class="col-sm-6">
                   <select class="form-control sel" name="product_type" required>
                    <option  value="">Select Product Type</option> 
                            <?php        
                     if(!empty($producttype)){
                      foreach ($producttype as $v){         
                                       ?>
                                    <option value="<?php  echo  $v["id"];?>">
                                   
                                <?php  echo  $v["name"]; 'selected'?>
                                    </option>               
                                    <?php }} ?>
                                </select>
                               
                  </div>
                   
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Units <span class="required">*</span></label>

                  <div class="col-sm-6">
             <select class="form-control sel" name="unit_id">
              <option value="">Select Units</option>    
                    <?php        
                     if(!empty($unit)){
                             foreach ($unit as $u){         
                                       ?>
                                    <option value="<?php  echo  $u["id"];?>" >
                                <?php  echo  $u["name"]; 'selected'?>
                                    </option>                                                              
                                    <?php }} ?>
                                </select>
                                 
                  </div>
                 
                </div>
                

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Price <span class="required">*</span></label>

                  <div class="col-sm-6">
                      <input type="text"  onkeypress="return ValidateNumberOnly()"  name="price" class="form-control" id="inputEmail3" placeholder=" Enter Price" required>
                
                  </div>
                   
                </div>
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Description </label>

                  <div class="col-sm-6">
                  <textarea name="description" class="form-control" rows="4" cols="50"></textarea>
                 
                   </div>

                </div>

              </div>
                         <div class="form-group" style="padding-bottom: 10px ">
                            <div class="col-sm-10 col-sm-offset-2"> 
                               <input class="btn btn-success" type="submit" value="Submit" name="register" value="submit" />
                               <input class="btn btn-warning" type="reset" name="reset" value="Reset" />
                               <a class="btn btn-danger"href="<?php echo base_url() ?>product/list_prodcut">Cancel</a>
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
                    heading: {
                        trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The name is required'
                            }
                        }
                    },
                   
                   
                  product_type: {
                   trigger:'blur change',
                    validators: {
                        notEmpty: {
                            message: 'The Product type is required'
                        }
                    }
                },

                   
                    
                    unit_id: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Unit is required'
                            }
                        }
                    },
                    
                    
                    price: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Price is required'
                            }
                        }
                    },
                    
                   
                }
            });
    });
    

$("#zzz").click(function(){
   $('#shippingForm').bootstrapValidator("resetForm",true);    
});


$('.sel').select2({
      // tags: "true",
     //minimumResultsForSearch: 20 ,
   //  selectOnClose: true,
   // placeholder: "Select an option",
   // = allowClear: true

     selectOnClose: true,
   placeholder: "Select an option",

});
</script>