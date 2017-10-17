<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
             $(wrapper).append('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class=""></span></label><div class="col-md-6"><div class="row"><div class="col-md-10"><input class="form-control" type="text" placeholder="Phone" onkeypress="return ValidateNumberOnly()" name="phone[]" ></div><div class="col-md-2"><button class="btn btn-default remove_field"><span class=" fa fa-minus ko"></span></button></div></div></div></div>'); //add input box
            var field=$( "input[name='phone[]']" ).last();
            $('#defaultForm').bootstrapValidator('addField', field);
        }
    });
    
     $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent().parent().remove(); x--;
    })
});
</script>

<script>

function ValidateNumberOnly()
{
if ((event.keyCode < 48 || event.keyCode > 57)) 
{
   event.returnValue = false;
}
}

</script>

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
              <h3 class="box-title">Manage Helper Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="col-md-9">
                       <form class="form-horizontal" id="defaultForm" action="<?php echo base_url()?>Defination/updatehelper" method="post" enctype="multipart/form-data"> 
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                           <input type="name" name="name" class="form-control" id="inputEmail3" onkeypress="return maskAlphaWithSp(this,event);" placeholder="Name" value="<?php echo $edit->name?>">
                
                        </div>
                      </div>
                    
                    
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Phone Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php
                        $num2=explode(',', $edit->number);
                       
                        ?>
                            <input class="form-control" type="text" id="phone" name="phone[]" value="<?php echo $num2[0]?>" placeholder="Phone" onkeypress='return ValidateNumberOnly()' />
                         <br>
                         <?php
                         if(!empty($num2[1]))
                            {
                            ?>
                          <input class="form-control" type="text" id="phone" name="phone[]"  value="<?php echo $num2[1]?>" placeholder="Phone" onkeypress='return ValidateNumberOnly()' />
                        <?php
                    }
                        ?>
                        </div>
                           <div class="col-lg-2">
                               <button type="button" class="btn btn-default add_field_button"><i class="fa fa-plus"></i></button>
                      
   
                    </div>
                      </div>
                    
                    <span class="input_fields_wrap"></span>
                    
                    
                     <input type="hidden" name="id" value="<?php echo $edit->id?>">
                    
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cnic <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input required type="cnic" name="cnic" class="form-control" onkeypress='return ValidateNumberOnly()' id="inputEmail3" value="<?php echo $edit->cnic?>">
                 
                        </div>
                      </div>
                    
                    
                     
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Religion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="cnic" name="religion" class="form-control" id="inputEmail3" onkeypress="return maskAlphaWithSp(this,event);" value="<?php echo $edit->religion?>">
                       </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="address" name="address" class="form-control" id="inputEmail3" value="<?php echo $edit->address?>">
                 
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="cnic" name="dob" class="form-control" id="datepicker1" placeholder="Date of Birth" value="<?php echo $edit->dob?>">
            
                        </div>
                      </div>
                    
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date Of Joining <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="cnic" name="doj" class="form-control" id="datepicker" placeholder="Date of Joining" value="<?php echo $edit->doj?>">
                 </div>
                      </div>
                    
                    
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Driver License <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="cnic" name="driver" class="form-control" id="inputEmail3" placeholder="Driver License" value="<?php echo $edit->dl?>">
               
                        </div>
                      </div>
                    
                    
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Scan Document <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                    <input type="file" name="doc" />
                    <?php  
$do=explode('/', $edit->doc);

if(count($do)>1)
{
echo $do[1];
}

else{
$do=$do;
}

  ?>
                     </div>
                      </div>
                    
                    
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input class="btn btn-success" type="submit" name="register" value="Update" />
                          <input id="zzz" class="btn btn-warning" type="reset" name="reset" value="Reset" />
                          <a type="submit" name="register" href='<?php echo base_url()?>Defination/index' class="btn btn-danger">Cancel</a>
            
                        </div>
                      </div>
                </div>
            
            
              <div class="col-md-3">
                 <?php if(!empty($edit->image1)){
                 ?>
                 <img src="<?php echo base_url().$edit->image1; ?>" width="150px" height="150px" id="show-picture"><br><br>
                 <input type="file" name="image" id="picture">
                 <?php
                 }
                 else{
                 ?>
       		<img src="<?php echo base_url()?>assets/profile.jpg" width="150px" id="show-picture"><br><br>
       		
       		<input type="file" name="image" id="picture">
       		<?php
       		}
       		?>
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
 
 

 <script>
    $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
     $( "#datepicker1" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>



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
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
       
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
            address: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The address is required'
                            }
                        }
                    },
                      doj: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Date of Joining is required'
                            }
                        }
                    },
                    
                    dob: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Date of Birth is required'
                            }
                        }
                    },
                     religion: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The address is required'
                            }
                        }
                    },

           contactname: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Contact Name is required'
                            }
                        }
                    },
                    
                    
                    
                    
                    
                     driver: {
                    trigger:'keyup blur',
                validators: {
                     notEmpty: {
                             message: 'The driver license is required'
                         },
                         
                        
                    remote: {
                        url: "<?php echo base_url()?>Defination/editexistdriverhelper",
                        // Send { email: 'its value', username: 'its value' } to the back-end
                        data: function(validator, $field, value) {
                            var driver=window.btoa(validator.getFieldElements('driver').val());
                             var id=validator.getFieldElements('id').val();
                            console.log(id);
                            return {
                                driver: driver,
                                id:id,
                            };
                        },
                        message: 'This driver licenseis already exist',
                        type: 'POST'
                    }
                }
            },
                    
                    
                    
                    
                    
                    
                    
                    'phone[]': {
                      
                    trigger:'blur',
                validators: {
                     
                     notEmpty: {
                                message: 'The Contact Number is required'
                                },
                         stringLength: {
                            min: 11,
                            max: 11,
                            message: 'The phone number must be local or mobile'
                        },
                    callback: {
                        callback: function(value, validator, $field) {
                            var $phone          = validator.getFieldElements('phone[]'),
                                numphone        = $phone.length,
                                notEmptyCount    = 0,
                                obj              = {},
                                duplicateRemoved = [];

                            for (var i = 0; i < numphone; i++) {
                                var v = $phone.eq(i).val();
                                if (v !== '') {
                                    obj[v] = 0;
                                    notEmptyCount++;
                                }
                            }

                            for (i in obj) {
                                duplicateRemoved.push(obj[i]);
                            }

                            if (duplicateRemoved.length !== notEmptyCount) {
                                return {
                                    valid: false,
                                    message: 'The phone no must be unique, cannot duplicate'
                                };
                            }

                            validator.updateStatus('phone[]', validator.STATUS_VALID, 'callback');
                            return true;
                        }
                    },
                    remote: {
                        url: '<?php echo base_url()?>Defination/editexistphonehelper',
                        // Send { email: 'its value', username: 'its value' } to the back-end
                        data: function(validator, $field, value) {
                            var phone=validator.getFieldElements('phone[]').val();
                            var id=validator.getFieldElements('id').val();
                            console.log(id);
                            return {
                                phone: phone,
                                id:id,
                               
                            };
                        },
                        message: 'This phone number is already exist',
                        type: 'POST'
                    }
                }
            },
                    
                    
             
                     
            
             cnic: {
                    trigger:'keyup blur',
                validators: {
                     notEmpty: {
                             message: 'The cnic is required'
                         },
                         stringLength: {
                            min: 13,
                            max: 13,
                            message: 'The cnic must be 13 digit'
                        },
                        
                    remote: {
                        url: "<?php echo base_url()?>Defination/editexistcnichelper",
                        // Send { email: 'its value', username: 'its value' } to the back-end
                        data: function(validator, $field, value) {
                            var cnic=window.btoa(validator.getFieldElements('cnic').val());
                             var id=validator.getFieldElements('id').val();
                            console.log(id);
                            return {
                                cnic: cnic,
                                id:id,
                            };
                        },
                        message: 'This cnic is already exist',
                        type: 'POST'
                    }
                }
            },
           
           
          
            
            
            
            
        }
    });
});


$("#zzz").click(function(){
   $('#defaultForm').bootstrapValidator("resetForm",true);    
});

</script>
