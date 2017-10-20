
<form id="defaultForm" action="<?php echo base_url('Vehicle/save_vehicle')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
<section class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="box">

                <div class="box-header">
                  <h3 class="box-title">Add Vehicle</h3>
                </div>
                
                <div class="box-body">
                   
                  <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                      <label class="control-label col-sm-4">Vehicle Type <span class="required">*</span></label>
                      <div class="col-sm-7">
                        <select class="form-control sel" name="vehicle_type">                  
                            <?php if(!empty($vehicletype)){ ?>
                            <option value="" >Select Options</option> 
                            <?php   foreach ($vehicletype as $v){ ?>        
                            <option value="<?php  echo  $v["id"]; ?>" ><?php  echo  $v["heading"];?></option>         
                            <?php } } ?>             
                        </select>
                       </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-sm-4">Registration No <span class="required">*</span></label>
                      <div class="col-sm-7">
                        <input class="form-control"  type="text" name="registerationno"  placeholder="Registration no...." class="form-control num"  required="required"/></div> 
                      </div>


                      <div class="form-group">
                       <label class="control-label col-sm-4">No Of Chamber <span class="required">*</span></label>
                        <div class="col-sm-7">
                        <input name="numberofchambe" value="1" class="form-control txt_name"  onkeypress='return ValidateNumberOnly()' type="text" required="required"  /> </div></div> 
                              
                     <div class="form-group">            
                   <label class="control-label col-sm-4">Total Fuel Capacity</label>
                        <div class="col-sm-7">
                        <input class="form-control" id="tfc"  type="text" name="totalfuelcapacity" placeholder=""  onkeypress='return ValidateNumberOnly()' required="required" readonly /> </div> </div>  
                            
                         <div class="form-group">     
                         <label class="control-label col-sm-4">Color <span class="required">*</span></label>
                        <div class="col-sm-7">               
                        <input class="form-control" type="text" name="color" onkeypress="return maskAlphaWithSp(this,event);" placeholder="Color...."  required="required" /> </div></div>
                       
                         <div class="form-group"> 
                        <label class="control-label col-sm-4">Company <span class="required">*</span></label>
                        <div class="col-sm-7"> 
                        <input class="form-control"  type="text" onkeypress="return maskAlphaWithSp(this,event);" name="company" placeholder="Company...."  required="required" /></div></div>
                                
                         

                      

                                  

                      </div>

                      <div class="col-md-6">
                       <div class="form-group">

                       <label class="control-label col-sm-4">chassis no <span class="required">*</span></label>
                        <div class="col-sm-7">
                        <input class="form-control"  type="text" name="chassisno" placeholder="Chassis no...." required="required"  />
                        </div> </div>
 
                      <div class="form-group">
                       <label class="control-label col-sm-4">Engine No <span class="required">*</span></label>
                        <div class="col-sm-7">
                        <input class="form-control"  type="text" name="engineno" placeholder="Engine no...."  />
                        </div> </div> 

                        <div class="form-group">    
                        <label class="control-label col-sm-4">Model <span class="required">*</span></label>
                        <div class="col-sm-7"> 
                        <input class="form-control"  type="text" name="model"  placeholder="Model...."  /> </div> </div>
                      

                         
                       <div class="form-group"> 
                        <label class="control-label col-sm-4">Vehicle Image<span class="required">*</span></label>
                        <div class="col-sm-7"> 
                        <input type="file" name="vehicleimage" class="form-control">
                        </div></div>
 
                         <div class="form-group">
                        <label class="control-label col-sm-4">Scan Document <span class="required">*</span></label>
                        <div class="col-sm-7"> 
                          
                        <input class="form-control"  name="doc[]" multiple="accept" type="file" /> </div> </div> 
                    </div>

                   
                   
                       
                     

                      
                       
                     
                           <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3"> 
                               <input class="btn btn-success" type="submit" name="register" value="Submit" />
                               <input id="resetbtn" class="btn btn-warning" type="reset" name="reset" value="Reset" />
                               <a class="btn btn-danger" href="<?php echo base_url() ?>Vehicle/show_vehicle">Cancel</a>
                           </div>
                        </div>
                         
                    
               
            </div>
        </div>

      </div></div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Chambers</h3>
                    </div>
                    <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group"> 
                        <div class="col-md-4 text-right"><label class="control-label">Chamber 1 <span class="required">*</span></label>
                        </div>
                         <div class="col-md-8"><input value="Chamber" text-align:center; readonly class="form-control" type="text" name="numberofchamber[]" required="required"/>
                         </div>
                     </div>

                     <div class="form-group"> 
                        <div class="col-md-4 text-right"><label class="control-label">capacity 1 <span class="required">*</span></label>
                        </div>
                         <div class="col-md-8"><input class="form-control fc"  id="fc"  type="text" name="capacityofchamber[]" onkeypress="return ValidateNumberOnly()"
                               required="required"/>
                         </div>
                     </div>
                  </div>
                      </div>
                    
                  

                        <div class="input_fields_wrap">

 



                        </div>
                    </div>
                </div>
            </div> <!-- col-lg-6 -->
    </div>
        </div>


 </section>
 </form>
            
        

 
 
<script type="text/javascript">
    $(document).ready(function(){
    
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
       
        
        $(".txt_name").keyup(function(){ 
        var  $num = $(this).val();
     if ($num== "") {

         $('#tfc').val($('#fc').val());
         } 
        var chamber= "";
        for($i=2; $i<=$num; $i++){

            chamber+=
            '<div class="form-group">'+
            '<div class="col-md-4 text-right"><label class="control-label">Chamber '+$i+'</label>'+
            '</div>'+
            '<div class="col-md-8">'+
          '<input value="Chamber '+$i+'" text-align:center; readonly class="form-control" type="text" name="numberofchamber[]" required="required"/>'+
            '</div>'+
            '</div>'+
            '<div class="form-group">'+ 
            '<div class="col-md-4 text-right"><label class="control-label">capacity '+$i+'</label>'
            +'</div>'+
            '<div class="col-md-8"><input class="form-control fc"  id="fc'+$i+'"  type="text" name="capacityofchamber[]" onkeypress="return ValidateNumberOnly()" required="required"/>'
            +'</div>'+
            '</div>';
            //add input box    
            }

            $appended = $(wrapper).html(chamber);
            $newfields = $appended.find('[name="capacityofchamber[]"]');
            $('#defaultForm').bootstrapValidator('addField',$newfields);
           
        });

    });

   
</script>



<script>
  $(document).on("keyup", ".fc", function () {
 
    var sum = 0;

    $('.fc').each(function() {
        sum += Number($(this).val());
    });
     
    $('#tfc').val(sum);

     
});
</script>



<script src="<?php echo base_url()?>assets/commonFormValidator.js" type="text/javascript"></script>
<script>
function maskAlphaWithSp(obj, e) {
  var code = e.charCode ? e.charCode : e.keyCode;
  if (!isAlphaCharCodeWithSpaces(code) ||  code == 38 || code == 35 || code == 36 || code == 37 || code == 39 || code == 40 || code == 46) {
    return false;
    }
    return true;
  
}
</script>
<script>

function ValidateNumberOnly()
{
if ((event.keyCode < 45 || event.keyCode > 57)) 
{
   event.returnValue = false;
}
}
</script>



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
                vehicle_type: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The vehicle type Field  is required'
                        }
                    }
                },
                registerationno: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The Registration No Field is required'
                        }
                    }
                },
                                      
                chassisno: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The Chassis no Field  is required'
                        }
                    }
                },
                
              engineno: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The Engine no Field  is required'
                        }
                    }
                },
               numberofchamber: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The Number of chamber Field  is required'
                        }
                    }
                },
                
              color: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The Color Field is required'
                        }
                    }
                },
              company: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The Company Field  is required'
                        }
                    }
                },

                 vehicleimage: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The vehicleimage Field  is required'
                        }
                    }
                },

                 model: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The model Field  is required'
                        }
                    }
                },


            'doc[]': {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The scan document Field is required'
                        }
                    }
                },

              

             
                'capacityofchamber[]': {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The capacity of chamber is required'
                        }
                    }
                }
            }
        });
});


$("#resetbtn").click(function(){
   $('#defaultForm').bootstrapValidator("resetForm",true);    
});


</script>



<script>
$(document).ready(function(){
  $('.sel').select2({
     // columns: 1,
      placeholder: 'Select Options',
      //selectAll: tsearch: true
      allowClear: true,  
  });

});

</script>



