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
                 <form id="myform" class="form-horizontal" action="<?php echo base_url()?>product/save_product" method="post" enctype="multipart/formdata">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-6">
                      <input type="name" name="heading" value="<?=set_value('heading')?>" onkeypress="return maskAlphaWithSp(this,event);" class="form-control" id="inputEmail3" placeholder="Enter Name" required>
                 <div class="error"><?php echo form_error('heading'); ?></div>
                  </div>
                </div>
                  
                  
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Product Type:</label>

                  <div class="col-sm-6">
                   <select class="form-control sel" name="product_type" selected="selected" required>
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
                                <div class="error"><?php echo form_error('product_type'); ?></div>
                  </div>
                   
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Units:</label>

                  <div class="col-sm-6">
             <select class="form-control sel" name="unit_id" selected="selected" required>
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
                                 <div class="error"><?php echo form_error('unit_id'); ?></div>
                  </div>
                 
                </div>
                

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Price:</label>

                  <div class="col-sm-6">
                      <input type="name" value="<?=set_value('price')?>" onkeypress="return ValidateNumberOnly()"  name="price" class="form-control" id="inputEmail3" placeholder=" Enter Price" required>
                  <div class="error"><?php echo form_error('price'); ?></div>
                  </div>
                   
                </div>
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Description:</label>

                  <div class="col-sm-6">
                  <textarea name="description" class="form-control" rows="4" cols="50"  required><?=set_value('description')?></textarea>
                  <div class="error"><?php echo form_error('description'); ?></div>
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
    $('#myform')
        .bootstrapValidator({
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
                            message: 'The name is required and cannot be empty'
                        }
                    }
                },
            
               
                price : {
                   trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Price is required and cannot be empty'
                        }
                    }
                },
               product_type : {
                   trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The select product is required and cannot be empty'
                        }
                    }
                },
              unit_id : {
                   trigger:'blur',
                    validators: {
                        notEmpty: {
                            message: 'The select units is required and cannot be empty'
                        }
                    }
                },
            }
        });
});


</script>


<script>
$('.sel').select2({
      // tags: "true",
    // minimumResultsForSearch: 20 ,
    selectOnClose: true,
   placeholder: "Select an option",
    allowClear: true

});

</script>