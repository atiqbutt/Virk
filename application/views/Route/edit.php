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
              <h3 class="box-title">Manage Route Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="col-md-9">
                 <form class="form-horizontal" id="shippingForm" action="<?php echo base_url()?>Defination/updateroute" method="post">
          
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Source <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           
                          <select id="loc" class="form-control client" name="source">
                          
                                  <?php 
                                  
                                  foreach($loc as $row)
                                  { ?>
                                  <option <?php if ($edit->locid==$row->id) echo "selected='selected'"; ?> value="<?php echo $row->id?>"><?php echo $row->name;?></option>
                                  <?php
                                                                             
                                  }
                                  ?> 

                        </select> 
                                </div>
                      </div>


                   
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Destination <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="loc" class="form-control client" name="destination">
                             
                           <?php 
               
            foreach($loc as $row)
            { ?>
                <option <?php if ($edit->desid==$row->id) echo "selected='selected'"; ?> value="<?php echo $row->id?>"><?php echo $row->name;?></option>
         <?php
                                                                                       
           }
            ?> 
                        </select> 
                   </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="loc" class="form-control client" name="product" required>
                             
                       <option value="">Select Options</option>       
                        
                          <?php 
               
            foreach($product as $row)
            { ?>
                <option <?php if ($edit->proid==$row->id) echo "selected='selected'"; ?> value="<?php echo $row->id?>"><?php echo $row->heading;?></option>
         <?php
                                                                                       
           }
            ?> 
          
                        </select> 
                   </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Freight <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="address" name="freight" class="form-control"  placeholder="Freight" value="<?php echo $edit->freight;?>">
               
                   </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">From <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" name="from" class="form-control"  placeholder="Freight" value="<?php echo $edit->fromdate;?>">
                      </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">To <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" name="to" class="form-control"  placeholder="Freight" value="<?php echo $edit->todate;?>">
                      </div>
                      </div>

                    
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="loc" class="form-control client" name="type" selected="selected" required>
                             
                       <option value="">Select Options</option>       
                          <option value="primary"<?php if ($edit->type == 'Primary') echo 'selected="selected"'; ?>>Primary</option>
                          <option value="secondary"<?php if ($edit->type == 'secondary') echo 'selected="selected"'; ?>>Secondary</option>
                          <option value="secondarylocal"<?php if ($edit->type == 'secondarylocal') echo 'selected="selected"'; ?>>Secondary Local</option>
                        </select> 
                   </div>
                      </div>
                   
                <input type="hidden" name="id" value="<?php echo $edit->id?>">
                    
                    
                      <!-- <input type="submit" class="form-control pull-right btn btn-success" name="Datesubmit"> !-->
                    
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input class="btn btn-success" type="submit" name="register" value="update" />
                          <input id="zzz" class="btn btn-warning" type="reset" name="reset" value="Reset" />
                          <a type="submit" name="register" href='<?php echo base_url()?>Defination/routepage' class="btn btn-danger">Cancel</a>
            
                        </div>
                      </div>
                </div>
            
              
                 </form>
                 </div>
                
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

