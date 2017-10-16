<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment8
             $(wrapper).append('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class=""></span></label><div class="col-md-6"><div class="row"><div class="col-md-10"><input class="form-control" type="text" placeholder="Phone" onkeypress="return ValidateNumberOnly()" name="phone[]" ></div><div class="col-md-2"><button class="btn btn-default remove_field"><span class=" fa fa-minus ko"></span></button></div></div></div></div>'); //add input box
            var field=$( "input[name='phone[]']" ).last();
            $('#shippingForm').bootstrapValidator('addField', field);
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent().remove(); x--;
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
              <h3 class="box-title">Add Agent Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <div class="col-md-9">
                <form class="form-horizontal" id="shippingForm" action="<?php echo base_url()?>Defination/saveagent" method="post" enctype="multipart/form-data">
       		 
       		
       		
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" type="text" id="nam" name="name" placeholder="Name" onkeypress="return maskAlphaWithSp(this,event);"/>
        </div>
                      </div>
                    
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control" type="text" name="address" placeholder="Address" />
                   </div>
                      </div>
                    
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Phone Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" type="text" id="phone" name="phone[]" placeholder="Phone" onkeypress='return ValidateNumberOnly()' />
                        
                        </div>
                           <div class="col-lg-2">
                               <button type="button" class="btn btn-default add_field_button"><i class="fa fa-plus"></i></button>
                      
   
                    </div>
                      </div>
                    
                    <span class="input_fields_wrap"></span>
                    
          
           
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Contact Person Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <input class="form-control" type="text" name="contactname" placeholder="Contact Person Name" onkeypress="return maskAlphaWithSp(this,event);"/>
                       </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contact Person Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control" type="text" id="contactnumber" name="contactnumber" placeholder="Contact Person Number" onkeypress='return ValidateNumberOnly()' />
                         </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cnic <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" type="text" name="cnic" id="cnic" placeholder="Enter Cnic Without dashes" onkeypress='return ValidateNumberOnly()' />
                           
                        </div>
                      </div>
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input class="form-control" type="text" name="email" id="email" placeholder="Email Address" />
                           
                        </div>
                      </div>
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Scan Document<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input class="form-control" type="file" name="doc"/>
                        </div>
                      </div>
                    
                     
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input class="btn btn-success" type="submit" name="register" value="Submit" />
                          <input id="zzz" class="btn btn-warning" type="reset" name="reset" value="Reset" />
                          <a type="submit" name="register" href='<?php echo base_url()?>Defination/agentpage' class="btn btn-danger">Cancel</a>
            
                        </div>
                      </div>
                </div>
                  <div class="col-md-3">
          <img src="<?php echo base_url()?>assets/profile.jpg" width="150px" class="img-thumbnail" id="show-picture"><br><br>
          <input type="file" name="image" id="picture">
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
                    phone: {
                        message: 'The phone number is not valid',
                         trigger:'blur',
                        validators: 

                        {
                            notEmpty: {
                                message: 'The phone number is required'
                            },
                         //      regexp: {
                         //    regexp: /^[0-9]{10}$/,
                         //     message: 'Plz Enter 10 Digit Number'
                         // },
                         phone: {
                        country: 'PK'
                    },
                            
                        }
                    },
                    
                    
                     'phone[]': {
                      
                    trigger:'blur',
                validators: {
                     /*notEmpty: {
                             message: 'The phone number is required'
                         },*/
                         stringLength: {
                            min: 10,
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

                            if (duplicateRemoved.length === 0) {
                                return {
                                    valid: false,
                                    message: 'Phone Number is required'
                                };
                            } else if (duplicateRemoved.length !== notEmptyCount) {
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
                        url: 'existphoneagent',
                        // Send { email: 'its value', username: 'its value' } to the back-end
                        data: function(validator, $field, value) {
                            var phone=validator.getFieldElements('phone[]').val();
                            console.log(phone);
                            return {
                                phone: phone
                            };
                        },
                        message: 'This phone number is already exist',
                        type: 'POST'
                    }
                }
            },
                    
                                            
                contactnumber: {
                      
                    trigger:'blur',
                validators: {
                     notEmpty: {
                             message: 'The contact number is required'
                         },
                         stringLength: {
                            min: 10,
                            max: 11,
                            message: 'The contact number must be local or mobile'
                        },
                   
                }
            },


                    

                     cnic: {
                    trigger:'blur',
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
                        url: 'existagentcnic',
                        // Send { email: 'its value', username: 'its value' } to the back-end
                        data: function(validator, $field, value) {
                            var cnic=window.btoa(validator.getFieldElements('cnic').val());
                            console.log(cnic);
                            return {
                                cnic: cnic
                            };
                        },
                        message: 'This cnic is already exist',
                        type: 'POST'
                    }
                }
            },

                //     email: {
                //          trigger:'blur',
                //     validators: {
                //         notEmpty: {
                //             message: 'The email is required'
                //         },
                //          regexp: {
                //             regexp: /\S+@\S+\.\S+/,
                //              message: 'The input is not a valid email address'
                //          },
                        
                //     }
                // },


                email: {
                    trigger:'blur',
                validators: {
                     notEmpty: {
                             message: 'The email is required'
                         },
                         regexp: {
                           regexp: /\S+@\S+\.\S+/,
                              message: 'The input is not a valid email address'
                          },
                    remote: {
                        url: 'existemail',
                        // Send { email: 'its value', username: 'its value' } to the back-end
                        data: function(validator, $field, value) {
                            var email=window.btoa(validator.getFieldElements('email').val());
                            console.log(email);
                            return {
                                email: email
                            };
                        },
                        message: 'This email is already exist',
                        type: 'POST'
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

                    contactname: {
                         trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Contact Name is required'
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
$( "#imag" ).change(function(e) {
    var imagee=$('#imag').val();

alert(imagee);
  
    //e.preventDefault();
   $.ajax({
        url:'<?php echo base_url()?>Defination/image_upload_by',
        secureuri:false,
        type: "POST",
       
       
        data:{ imagee: imagee},
        cache: true,
        success: function (data){
            //alert(data);
            //console.log(data);
            $('#me').html(data);
        },
    });
   
   
   
   
});

});
</script>