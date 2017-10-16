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
              <h2 class="box-title">Update Product</h2>
               
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="defaultForm" class="form-horizontal" action="<?php echo base_url()?>product/update_list_product" method="post" enctype="multipart/formdata">

			<input type="hidden" name="startdate"  value="<?php echo $product->createdAt?>">             
			 <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
  <input type="hidden" name="id" value="<?php echo $product->id?>">
                  <div class="col-sm-6">
                      <input type="name" name="heading" value="<?php echo $product->heading?>" onkeypress="return maskAlphaWithSp(this,event);" class="form-control" id="inputEmail3" placeholder="Name"  required>
                  <div class="error"><?php echo form_error('heading'); ?></div>
                  </div>
                </div>
                  
                  
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Product Type:</label>

                  <div class="col-sm-6">
                   <select class="form-control sel" name="product_type" selected="selected"  required>
                    <option>Select Product Type</option> 
                  <?php 
       $producttype= $this->db->select('*')->from('producttype')->where('is_deleted',0)->get()->result();
                     
     foreach ($producttype as $p){ ?>
      <option  <?php if ($product->unit_id==$p->id) echo "selected='selected'"; ?> value="<?php echo $p->id?>"> <?php echo $p->name;?></option>  
                                                              
                                    <?php } ?>
                                </select>
<div class="error"><?php echo form_error('product_type'); ?></div>
                  </div>
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Units:</label>

                  <div class="col-sm-6">
             <select class="form-control sel" name="unit_id" selected="selected"  required>
              <option>Select Units   </option>    
                    <?php 
       $units= $this->db->select('*')->from('unit')->where('is_deleted',0)->get()->result();
                     
     foreach ($units as $u){ ?>
      <option  <?php if ($product->unit_id==$u->id) echo "selected='selected'"; ?> value="<?php echo $u->id?>"> <?php echo $u->name;?></option>  
                                                              
                                    <?php } ?>
                                </select>
                  </div>
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Price:</label>

                  <div class="col-sm-6">
                      <input type="name" value="<?php echo $histroy->price ?>" name="price" class="form-control" id="inputEmail3" placeholder="Name"  required>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Description:</label>

                  <div class="col-sm-6">
                            
                            <textarea name="description" class="form-control" rows="4" cols="50"  required><?php echo $product->description?></textarea>
                  
   
                                       </div>
                </div>

              </div>
              <!-- /.box-body -->
                        <div class="form-group" style="padding-bottom: 10px ">
                            <div class="col-sm-10 col-sm-offset-2"> 
                               <input class="btn btn-success" type="submit" name="register" value="Update" />
                               <input class="btn btn-warning" type="reset" name="reset" value="Reset" />
                               <a class="btn btn-danger"href="<?php echo base_url() ?>product/list_prodcut">Cancel</a>
                           </div>
                        </div>
            </form>
          </div>

</div>
</section>
<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm')
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