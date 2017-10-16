<script type="text/javascript">

function ValidateNumberOnly()
{
if ((event.keyCode < 48 || event.keyCode > 57)) 
{
   event.returnValue = false;
}
}

</script>

<!-- /.row -->
 <section class="content">
      <div class="row">
           <div class="col-md-12">
           <?php if ($this->session->flashdata('msg' )): ?>
          <div class="alert alert-success">
          <?php echo $this->session->flashdata('msg'); ?>  
          </div>
           <?php endif; ?> 
        <div class="col-lg-12">
          <div class="box col-sm-12">
      <!--       <div class="box-header" >
              <h3 class="box-title">Add Route Information</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">


                <div class="col-lg-7">

                <div class="panel panel-default">
                  <div class="panel-heading">Add Route Information</div>
                  <div class="panel-body">

                 <form class="form-horizontal" id="shippingForm" action="<?php echo base_url()?>Defination/saveroute" method="post">
          
                   <div class="form-group">    
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Source <span class="required">*</span>
                        </label> 
                      <div class="col-md-9 col-sm-6 col-xs-12">                 
                        <select id="loc" class="form-control client" name="source" selected="selected" required>
                             
                       <option value="">Select Source</option>       
                         <?php  if(!empty($location)){
                            foreach ($location as $prod){   ?>       
                            <option value="<?php  echo  $prod["id"];?>"   >
                            <?php  echo  $prod["name"];?>
                            </option>               
                         <?php }} ?>
                        </select> 
                      </div>
                    </div>
                    

                  <div class="form-group">    
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Destination <span class="required">*</span>
                        </label> 
                      <div class="col-md-9 col-sm-6 col-xs-12">                 
                        <select class="form-control client" name="destination" id="dest" selected="selected" required>
                             
                       <option value="">Select Destination</option>       
                          <?php  if(!empty($location)){
                            foreach ($location as $prod){   ?>       
                            <option value="<?php  echo  $prod["id"];?>"   >
                            <?php  echo  $prod["name"];?>
                            </option>               
                         <?php }} ?>
                        </select> 
                      </div>
                    </div>



                  <div class="form-group">    
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product <span class="required">*</span>
                        </label> 
                      <div class="col-md-9 col-sm-6 col-xs-12">                 
                        <select id="product" class="form-control client" name="product" selected="selected" required>
                             
                       <option value="">Select Product</option>       
                         <?php  if(!empty($product)){
                            foreach ($product as $prod){   ?>       
                            <option value="<?php  echo  $prod["id"];?>"   >
                            <?php  echo  $prod["heading"];?>
                            </option>               
                         <?php }} ?>
                        </select> 
                      </div>
                    </div>
                    
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Freight <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                              <input type="address" name="freight" class="form-control"  placeholder="Freight" value="<?php echo set_value('dest');?>">
               
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">From <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                              <input type="date" name="from" class="form-control" onkeypress="return maskAlphaWithSp(this,event);" placeholder="Destination" value="<?php echo set_value('dest');?>">
               
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">To <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                              <input type="date" name="to" class="form-control" onkeypress="return maskAlphaWithSp(this,event);" placeholder="Destination" value="<?php echo set_value('dest');?>">
               
                        </div>
                      </div>



                    <div class="form-group">    
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type <span class="required">*</span>
                        </label> 
                      <div class="col-md-9 col-sm-6 col-xs-12">                 
                        <select class="form-control client" name="type" selected="selected" required>
                             
                       <option value="">Select Options</option>             
                            <option value="primary">Primary</option>
                            <option value="secondary">Secondary</option>  
                            <option value="secondarylocal">Secondary Local</option>   
                                         
                        </select> 
                      </div>
                    </div>
                    
                      <div class="ln_solid"></div>
                      
                  <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                      <input class="btn btn-success" type="submit" name="register" value="Add" />
                      <input id="zzz" class="btn btn-warning" type="reset" name="reset" value="Reset" />
                      <a type="submit" name="register" href='<?php echo base_url()?>Defination/routepage'; class="btn btn-danger">Cancel</a>
        
                    </div>
                  </div>
               
              </form>
                </div>
              </div>
             </div>
             <!-- col-lg-6 -->

      <div class="col-lg-5">
             <div class="col-lg-12">


                <div class="panel panel-default">
                  <div class="panel-heading">Add Source/ Destination</div>
                  <div class="panel-body">
                    <div class="item form-group">

                      <div class="col-md-12 col-sm-6 col-xs-12" style="padding-bottom: 10px">
                         <input type="address" id="location" name="name" class="form-control" value="" placeholder="Enter Location">
             
                      </div>
                      </div>


                      <div class="form-group">
                          <div class="col-md-12">
                            <button id="add_source" class="btn btn-success">Add</button>
              
                          </div>
                      </div>

                  </div>
                </div>


      </div>


      <div class="col-lg-12">
     
                <div class="panel panel-default">
                  <div class="panel-heading">Add Product</div>
                  <div class="panel-body">
                    <div class="col-md-12 col-sm-6 col-xs-12" style="padding-bottom: 10px">
                        <input id="product_name" type="address" name="name" class="form-control" placeholder="Enter Product">
           
                    </div>
      
  
                      <div class="col-md-12 col-sm-6 col-xs-12" style="padding-bottom: 10px">                 
                        <select id="product_type" class="form-control client" name="product" selected="selected" required>
                             
                       <option value="">Product Type</option>       
                         <?php  if(!empty($producttype)){
                            foreach ($producttype as $prod){   ?>       
                            <option value="<?php  echo  $prod["id"];?>"   >
                            <?php  echo  $prod["name"];?>
                            </option>               
                         <?php }} ?>
                        </select> 
                      </div>
     

                      <div class="col-md-12">
                        <button id="add_product" class="btn btn-success">Add</button>
                         

                       
                      </div>
             
                  </div>
                </div>


        </div>
        <!-- col-lg-12 -->


      </div>
      <!-- col-lg-5 -->


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
                   
                   

                    source: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The source is required'
                            }
                        }
                    },
                    
                    dest: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The destination is required'
                            }
                        }
                    },
                    
                    
                    km: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Kilometer is required'
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


<script>
$(document).ready(function(){
    $('#add_product').click(function(event) {      
       event.preventDefault();
      var productName =  $("#product_name").val();
      var productType =  $("#product_type").val();
       
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Defination/save_product',
        data : { productName: productName, productType:productType},
        success:  function (response) {  
        }
      }).done(function(){

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url() ?>Defination/get_all_products',
          success:  function (response) { 
           var pre = '<option value="">Select Product</opiton>'; 

            $("#product").html("");
            $("#product").html(pre+response);
                 
          }

        });
      });
   
    });
});

    $('#add_source').click(function(event) {      
      
      var location =  $("#location").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>Defination/savesour',
        data : { location: location},
        success:  function (response) {  
               //alert(response);
        }
      }).done(function(){

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url() ?>Defination/get_all_location',
          success:  function (response) {  
             var pre = '<option value="">Select Source</opiton>';
             var pr = '<option value="">Select Destination</opiton>';
              $("#dest").html("");
             $("#dest").html(pr+response);
             $("#loc").html("");
            $("#loc").html(pre+response);
                 
          }

        });

      });
   
    });

  

</script>









<script>
$(document).ready(function(){
  $('.route').multiselect({
      columns: 1,
      placeholder: 'Select Options',
      selectAll: true,
      search: true
  });

});


</script>



