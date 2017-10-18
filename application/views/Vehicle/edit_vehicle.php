<style> 
.content{
  height: 150vh !important;
 } 

</style>

 <form id="defaultForm" action="<?php echo base_url('Vehicle/edit_vehicle_save')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
           

<section class="content">
    <div class="row">
        <div class="col-lg-7">
            <div class="box">

                <div class="box-header">
                  <h3 class="box-title">Manage Vehicle</h3>
                </div>
                
                <div class="box-body">
                      <div class="form-group">
                      <label class="control-label col-sm-3">Vehicle Type:</label>
                      <div class="col-sm-9">
                        <select class="form-control sel" name="vehicle_type" selected="selected" required >                  
                            <?php
                           
                            foreach ($data as $value) {
                              ?>
                              <option <?php if($edit->vehtypeid==$value->id) echo "selected='selected'"; ?>value="<?php echo $value->id?>"><?php echo $value->heading;?></option>
                              <?php
                            }
                            ?>

                        </select>
                       </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-sm-3">Registration No:</label>
                      <div class="col-sm-9">

                        <input class="form-control"  value="<?php echo $edit->registerationno?>" type="text" name="registerationno"  placeholder="Registration no...." class="form-control num"  required="required"/></div> </div>
                      <input type="hidden" name="id" value="<?php echo $edit->id?>">
                   <input type="hidden" name="idd" value="<?php echo $edit->chamid?>">
                      <div class="form-group">

                       <label class="control-label col-sm-3">chassis no:</label>
                        <div class="col-sm-9">
                        <input class="form-control"  type="text"  value="<?php echo $edit->chassisno?>" name="chassisno" placeholder="Chassis no...." required="required"  />
                        </div> </div>
 
                      <div class="form-group">
                       <label class="control-label col-sm-3">Engine No:</label>
                        <div class="col-sm-9">
                        <input class="form-control"  type="text"  value="<?php echo $edit->engineno?>" name="engineno" placeholder="Engine no...."  required="required" />
                        </div> </div> 

                      <div class="form-group">
                       <label class="control-label col-sm-3">No Of Chamber:</label>
                        <div class="col-sm-9">
                        <input name="numberofchambe" placeholder="1"   value="<?php echo $edit->numveh?>" class="form-control txt_name"  onkeypress='return ValidateNumberOnly()' type="text" required="required"  /> </div></div> 
                              
                     <div class="form-group">            
                   <label class="control-label col-sm-3">Total Fuel Capacity:</label>
                        <div class="col-sm-9">
                        <input class="form-control" id="tfc"  type="text"  value="<?php echo $edit->tot?>" name="totalfuelcapacity" placeholder=""  onkeypress='return ValidateNumberOnly()' required="required" readonly /> </div> </div>  
                            
                         <div class="form-group">     
                         <label class="control-label col-sm-3">Color:</label>
                        <div class="col-sm-9">               
                        <input class="form-control" type="text" name="color"  value="<?php echo $edit->color?>" onkeypress="return maskAlphaWithSp(this,event);" placeholder="Color...."  required="required" /> </div></div>
                       
                         <div class="form-group"> 
                        <label class="control-label col-sm-3">Company:</label>
                        <div class="col-sm-9"> 
                        <input class="form-control"  type="text"  value="<?php echo $edit->company?>" onkeypress="return maskAlphaWithSp(this,event);" name="company" placeholder="Company...."  required="required" /></div></div>
                                

                         <div class="form-group">    
                        <label class="control-label col-sm-3">Model:</label>
                        <div class="col-sm-9"> 
                        <input class="form-control"  type="text"  value="<?php echo $edit->model?>" name="model"  placeholder="Model...."  /> </div> </div>
                         
                       <div class="form-group"> 
                        <label class="control-label col-sm-3">Vehicle Image:</label>
                        <div class="col-sm-9">
                         <?php if (!empty($edit->image)) { ?> 
                            <img style="border:1px solid #D3D3D3;" alt="User Pic" src="<?php echo base_url().$edit->image; ?>" id="show-picture" width="150px" class="img-responsive img-thumbnail"><br><br>
                       <?php }?>
                       <input type="file" name="vehicleimage" id="picture" class="form-control img-responsive img-thumbnail" width="150px">
                      </div></div>
 
                         <div class="form-group">
                        <label class="control-label col-sm-3">Scan Document:</label>
                        <div class="col-sm-9"> 
                        <input class="form-control"  name="doc" id="file" type="file" /> </div> </div> 
                     
                   <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3"> 
                               <input class="btn btn-success" type="submit" name="register" value="Update" />
                               <input id="resetbtn" class="btn btn-warning" type="reset" name="reset" value="Reset" />
                               <a class="btn btn-danger" href="<?php echo base_url() ?>Vehicle/show_vehicle">Cancel</a>
                           </div>
                        </div>
                         
                    
                </div>
            </div>
        </div>

            <div class="col-lg-5">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Chambers</h3>
                    </div>
                    <div class="box-body">
                    <div class="row">
                      <?php 
                      $i=1;
                        foreach ($chamber as $val) {
                          ?>
                          <?php
                        if($val->vehicle_id==$edit->id)
                        {
                          ?>
                      <div class="form-group"> 
                        <div class="col-sm-3 text-right"><label class="control-label">Chamber <?php echo $i;?></label>
                        </div>
                        
                         <div class="col-sm-8"><input value="<?php echo $edit->numcham?>" text-align:center; readonly class="form-control" type="text" name="numberofchamber[]" required="required"/>
                         </div>
                     </div>

                     <div class="form-group"> 
                        <div class="col-sm-3 text-right"><label class="control-label">capacity <?php echo $i;?></label>
                        </div>
                         <div class="col-sm-8"><input  value="<?php echo $edit->cham?>" class="form-control fc"  id="fc"  type="text" name="capacityofchamber[]" onkeypress="return ValidateNumberOnly()"
                               required="required"/>
                         </div>
                     </div>
<?php
}
$i++;
}
?>
                      </div>
                    
                  

                        <div class="input_fields_wrap">

 



                        </div>
                    </div>
                </div>
            </div> <!-- col-lg-6 -->
    </div>
        


 </section>
 </form>
            
        

 <script type="text/javascript">

$(document).ready(function(){
    $('#picture').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
           // $('#show-picture').html(''); //clear html of output element
            var data = $(this)[0].files; //this file data
            
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        $('#show-picture').attr('src', e.target.result); //create image element 
                       // $('#show-picture').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
            
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});

</script>



<script type="text/javascript">
    $(document).ready(function(){
    
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
       
        
        $(".txt_name").keyup(function(){ 
        var  $num = $(this).val();
     if ($num== "") {

         $('#tfc').val("");
         } 
        var chamber= "";
        for($i=2; $i<=$num; $i++){

            chamber+='<div class="row">'+
            '<div class="form-group">'+
            '<div class="col-sm-3 text-right"><label class="control-label">Chamber '+$i+'</label>'+
            '</div>'+
            '<div class="col-sm-8">'+
          '<input value="Chamber '+$i+'" text-align:center; readonly class="form-control" type="text" name="numberofchamber[]" required="required"/>'+
            '</div>'+
            '</div>'+
            '<div class="form-group">'+ 
            '<div class="col-sm-3 text-right"><label class="control-label">capacity '+$i+'</label>'
            +'</div>'+
            '<div class="col-sm-8"><input class="form-control fc"  id="fc'+$i+'"  type="text" name="capacityofchamber[]" onkeypress="return ValidateNumberOnly()" required="required"/>'
            +'</div>'+
            '</div>'+
            '</div>'; //add input box    
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
              model: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'The Model Field is required'
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

