<style>
  .vechinfo{ 
    display: none;
  }

.ms-options li{

  list-style-type: none;
  padding-left: 0px;
}

.ms-options ul{
  padding-left: 5px;
}

</style>

<section class="content">
  <div class="box">

    <div class="box-header">
      <h3 style="padding-left: 30px" class="box-title">Close Trip</h3>
    </div>

      <div class="box-body">
            <form id="myform" action="<?php echo base_url() ?>Trip/all_close_trip/<?php echo $tripid ?>" method="post" enctype="multipart/form-data">
          
        <div class="col-lg-7">
            <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><i class="fa fa-bus" aria-hidden="true"></i>
                   Trip Information
                   </div>
                  <div class="panel-body">
    
                    <div class="form-group"> 
                          <label>Trip id</label>
                            <input class="form-control" value="<?php echo $tripid ?>"  name="tripid" type="text"  readonly />
                        </div>
						
                    <div class="form-group">
                      <label>Type</label>
                      <select class="form-control" name="type" required> 
                          <option value="<?php  if(!empty($trip_info)){foreach ($trip_info as $c){ ?>        
                
                            <?php  echo  $c["type"];?>
                                        
                            <?php }} ?>"><?php  if(!empty($trip_info)){
                            foreach ($trip_info as $c){ ?>        
               
                            <?php  echo  $c["type"];?>
                                        
                            <?php }} ?></option>       
                      </select>
                    </div>
        
                     <div class="form-group"> 
                    
                        <label>Company</label>
                          <select class="form-control" name="company_id" selected="selected" required>

                            <option value=""   >company
                            </option>               
                          
                          </select> 
                      </div>

                    <div class="form-group">  
                    
                        <label>Contractor</label>
                        <select class="form-control" name="contractor_id" selected="selected" required>          
                            <option value="">jj
                            </option>               
                        </select> 
                    </div>

                    <div class="form-group"> 
                        
                      <label>Vehicle</label>
                        <select id="veh" class="form-control" name="vehicle_id" required>
                      
                            <option value=""   >
                            </option>               
                        </select> 
                      </div>

                  </div>
                  <!-- panel-body -->
                </div>
                <!-- panel panel-default -->
            </div>
              <!-- col-lg-12 -->

    <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-asterisk" aria-hidden="true"></i>
          All Fields Are Required </div>
            <div class="panel-body"> 
                  
                  <div class="col-lg-6">

                        <div class="form-group"> 
                          <label>Source </label>
                            <select class="form-control" name="source" selected="selected" required> 
                            <option value="">Select Options</option>       

                              
                                <option value=""   >
                              
                                </option>               
                            </select> 
                        </div>
                         
                       <div class="form-group"> 
                          <label>Product </label>
                            <select class="form-control" name="product_id" selected="selected" required> 
                            <option value="">Select Options</option>       
                         
                               
                                <option value=""   >
                              
                                </option>               
                            </select> 
                        </div>

                        <div class="form-group"> 
                          <label>Quantity</label>
                            <input class="form-control" value="" name="quantity" type="text" name="product_quantity" onkeypress='return ValidateNumberOnly()' required="required" />
                        </div>

                        <div class="form-group"> 
                        <label>Temperature</label>
                          <input class="form-control" value="" onkeypress='return ValidateNumberOnly()'  type="text" name="temperature"   required="required" />
                        </div>

                        <div class="form-group"> 
                          <label>Gravity</label>
                            <input class="form-control" value=""  onkeypress='return ValidateNumberOnly()'  type="text" name="gravity"  required="required" />
                        </div>

                        <div class="form-group"> 
                          <label>Destination </label>
                            <select class="form-control"   name="destination" selected="selected" required> 
                            <option value="">Select Options</option>       

                            
                              
                            </select> 
                        </div>
                         
                      
                        
                     </div>
                     <!-- col-lg-6 -->                                                       
          
                   <div class="col-lg-6">
                 
                      <div class="form-group"> 
                        <label>Meter Reading</label>        
               
                          <input class="form-control" value="<?php  if(!empty($trip_info)){foreach ($trip_info as $c){ ?><?php  echo  $c["meter_reading"];?><?php }} ?>"  type="text" name="meter_reading" onkeypress='return ValidateNumberOnly()' required="required" />
                      </div>

                      <div class="form-group"> 
                        <label>Freight Rate</label>
                          <input class="form-control" value="<?php  if(!empty($trip_info)){foreach ($trip_info as $c){ ?><?php  echo  $c["freight_rate"];?><?php }} ?>"  type="text" name="freight_rate" onkeypress='return ValidateNumberOnly()' required="required" />
                      </div>

                      <div class="form-group"> 
                      <label>Contract Carriage Commission</label>
                        <input class="form-control" type="text" value="" name="carriage_commission" onkeypress='return ValidateNumberOnly()'   required="required" />
                      </div>

                      <div class="form-group"> 
                        <label>Withholding Tax</label>
                          <input class="form-control" value="" onkeypress='return ValidateNumberOnly()' type="text" name="withholding_tax"  required="required" />
                      </div>

                        <div class="form-group"> 
                        <label>Company Comission</label>
                          <input class="form-control"  value="" onkeypress='return ValidateNumberOnly()' type="text" name="remaining_commission"  required="required" />
                      </div>  

                       <div class="form-group"> 
                        <label>Remaining (for Customer)</label>
                          <input class="form-control"  type="text" name="remaining_commission" value=""  required="required" readonly />
                      </div>

                      
                                                                        
                  </div>
                 <!-- col-lg-6 -->

                  <div class="col-lg-12">
                    
                     <div class="form-group"> 
                        <label>Shortage/ Gain</label>
                          <input class="form-control"  onkeypress='return ValidateNumberOnly()' type="text" name="remaining_commission"  required="required" />
                      </div> 
                  </div>
                  
                   <div class="col-lg-12">
                     <button class="add_field_button btn btn-success">Add More</button>
                   </div>

                   <div id="more_fields" class="col-lg-12">
                    
                   </div>
                    
    

               </div>
                <!-- panel-body -->
              </div>
              <!-- panel panel-default -->

         </div>
         <!-- col-lg-12 -->  


    </div>
  <!-- col-lg-7 -->  

        <!-- ============================================================= -->


      <div class="col-lg-5">
           
		   
		   <div class="col-lg-12 vechinfo">
                  <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-truck" aria-hidden="true"></i> Vehicle Information</div>
                        <div id="vech_info" class="panel-body">
                          
                              
                        </div>
                        <!-- panel-body -->
                      </div>
                      <!-- panel panel-default -->
                </div>
				 <div class="col-lg-12">
                  <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-truck" aria-hidden="true"></i> Add Expense</div>
<div  class="" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">
              <input value="Add Expense" type="button" class="form-control btn btn-primary">
</div>
                        <!-- panel-body -->
                      </div>
                      <!-- panel panel-default -->
                </div>
              <!-- col-lg-12 -->

  <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-car" aria-hidden="true"></i> Vehicle Information </div>
               <div class="panel-body">
                   
                      <div class="form-group">                      
						 <div class="col-md-10">
                            <label>Vehicle Name:</label>
								
<?php  if(!empty($trip_info)){foreach ($trip_info as $c){ ?><?php  echo  $c["vehiclename"];?><?php }} ?>                        
                       
                      </div>
					   <div class="col-md-10">
                            <label>Registeration No:</label>
								
<?php  if(!empty($trip_info)){foreach ($trip_info as $c){ ?><?php  echo  $c["vehicleregisterationno"];?><?php }} ?>                        
                       
                      </div>
					  <div class="col-md-10">
                            <label>Chassis No:</label>
								
<?php  if(!empty($trip_info)){foreach ($trip_info as $c){ ?><?php  echo  $c["chassisno"];?><?php }} ?>                        
                       
                      </div>
					  					  <div class="col-md-10">
                            <label>Engine No:</label>
								
<?php  if(!empty($trip_info)){foreach ($trip_info as $c){ ?><?php  echo  $c["vehicleengineno"];?><?php }} ?>                        
                       
                      </div>
                  

                </div>
                <!-- panel-body -->
						</div>
              </div>
			<div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-car" aria-hidden="true"></i> Drivers & Helpers  Information </div>
               <div class="panel-body">
                   
                      <div class="form-group">                      
                        <div class="col-md-10">
                            <label>Driver</label>

                          <select class="form-control driver" name="driver1" required>
                             <option value="">Select Options</option>       
                           

                                      
                          </select>
                        </div>  
                        
                        <div class="col-md-2">  
                         <button href="javascript:" style="margin-top: 30px" id="driver1" ><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                      </div>
                    <div id="driver_1"></div>


                     <div class="form-group">                      
                        <div class="col-md-10">
                            <label>Helper</label>

                          <select  class="form-control" name="helper" required>
                             <option value="">Select Options</option>       
                              <?php if(!empty($helperinformation)){
                              foreach ($helperinformation as $v){  ?>      
                              <option value="<?php  echo  $v["id"];?>"   >
                              <?php  echo  $v["name"];?>
                              </option>               
                              <?php }} ?>
                          </select>
                        </div>  

                        <div class="col-md-2">  
                         <button style="margin-top: 30px" id="addhelper" ><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                      </div>
                         
                        

                    <div id="add_helper"></div>

                </div>
                <!-- panel-body -->
              </div>
              <!-- panel panel-default -->
            </div>
            <!-- col-lg-12 -->
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-clock-o" aria-hidden="true"></i> Date</div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label>Entry Date</label>
                      <?php  $date = date('Y-m-d'); ?>
                      <input class="form-control" type="date" name="entry_date" value="<?php echo $date; ?>" palceholder="" required>
                    </div>  

                    <div class="form-group">
                      <label>Email Date</label>
                      <input class="form-control" type="date" name="email_date" value="<?php echo $date; ?>" required>
                    </div> 

                     <div class="form-group">
                      <label>Filling date</label>
                      <input class="form-control" type="date" name="filling_date" value="<?php echo $date; ?>" required>
                    </div> 


                    <div class="form-group">    
                        <label>Un Filled By</label>
                          <select  class="form-control" name="unfilled_by" required>
                             <option value="">Select Options</option>       
                              <?php if(!empty($driver2)){
                              foreach ($driverinformation as $v){  ?>      
                              <option value="<?php  echo  $v["id"];?>"   >
                              <?php  echo  $v["name"];?>
                              </option>               
                              <?php }} ?>
                          </select> 
                      </div>

                    <div class="form-group">
                      <label>STN Number</label>
                      <input class="form-control" type="text" name="stn"  required>
                    </div>
                       
                  </div>
                  <!-- panel-body -->
                </div>
                <!-- panel panel-default -->
          </div>
              <!-- col-lg-12 -->



            <div style="padding-left: 30px" class="row">
                <input class="btn btn-primary" type="submit" name="register" value="Close Trip" />
            </div>    

        </div>
        <!-- col-lg-5 -->


        </form>
     </div>
  <!-- box-body -->
   </div>
  <!-- box -->
</section>


  <!-- ==============================================================================    -->

<script>
  
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#more_fields"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<hr><div class="form-group"><label>Product </label><select class="form-control" name="product" selected="selected" required><option value="">Select Options</option><?php  if(!empty($product)){foreach ($product as $p){   ?><option value="<?php  echo  $p["id"];?>" ><?php  echo  $p["heading"];?></option><?php }} ?></select></div><div class="form-group"><label>Quantity</label><input class="form-control" name="quantity" type="text" name="product_quantity" required="required" /></div><div class="form-group"><label>Temperature</label><input class="form-control"  type="text" name="temperature"   required="required" /></div><div class="form-group"><label>Gravity</label><input class="form-control"  type="text" name="gravity"  required="required" /><div class="form-group"><div class="form-group"><label>Destination </label><select class="form-control" name="destination" selected="selected" required><option value="">Select Options</option><?php  if(!empty($source)){foreach ($product as $p){ ?><option value="<?php  echo  $p["id"];?>">  <?php  echo  $p["heading"];?></option><?php }} ?></select></div></div><button class="remove_field btn btn-success">Remove</button>'); 
            //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});





</script>

<script>
  
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#add_helper"); //Fields wrapper
    var add_button      = $("#addhelper"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><div class="col-md-10"><label>Helper</label><select class="form-control" name="helper[]" required><option value="">Select Options</option><?php if(!empty($helperinformation)){  foreach ($helperinformation as $v){  ?><option value="<?php  echo  $v["id"];?>"   ><?php  echo  $v["name"];?></option><?php }} ?></select></div><div class="col-md-2"><button  style="margin-top: 30px" id="helper"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
            //add input box
        }
    });
    
    $(wrapper).on("click","#helper", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});





</script>


<script>
// add more driver 
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#driver_1"); //Fields wrapper
    var add_button      = $("#driver1"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><div class="col-md-10"><label>Driver</label><select id="helper" class="form-control" name="driver1" required><option value="">Select Options</option><?php if(!empty($driver1)){  foreach ($driver1 as $v){  ?><option value="<?php  echo  $v["id"];?>"   ><?php  echo  $v["name"];?></option><?php }} ?></select></div><div class="col-md-2"><button style="margin-top: 30px" id="p_driver"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
            //add input box
        }
    });
    
    $(wrapper).on("click","#p_driver", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});





</script>





<script>

$(document).ready(function() {
  $('#veh').change(function(event) {
     var id =  $(this).val();

    $.ajax({
      url: '<?php echo base_url(); ?>Vehicle/get_vehicle_by_id/'+id,
      type: 'POST',
      success:  function (response) {
      var result = eval(response);
        
        $('.vechinfo').removeClass('vechinfo');

        vech_info = "<div><p>Chassis Number&nbsp" +"#&nbsp&nbsp;"+ result['chassisno'] +"</p><p>Engine Number&nbsp" +"#&nbsp&nbsp;"+ result['engineno'] +"</p></div>"
        
        $('#vech_info').html(vech_info);

           
        }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    

  });
});

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



 
 
 <form name="myform" id="myform" action="<?php echo base_url() ?>trip/saveexpense_trip/<?php echo $tripid ?>" method="post" enctype="multipart/form-data">

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
          
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add New Expense</h4>
      </div>
      <div class="modal-body">
        
         

       <div class="col-lg-12">
                        <div class="col-md-10">
                            <label>Expense Type</label>

                          <select  class="form-control" name="expensetype_id[]" required>
                             <option value="">Select Options</option>       
                              <?php if(!empty($expensetype)){
                              foreach ($expensetype as $e){  ?>      
                              <option value="<?php  echo  $e["id"];?>"   >
                              <?php  echo  $e["name"];?>
                              </option>               
                              <?php }} ?>
                          </select>
                        </div>  
						<div class="col-md-10"><label>Expense Amount</label><input name="amount[]" type="text" class="form-control">
 
                       
                      </div>
<div class="col-md-2">  
                         <button style="margin-top: 30px" id="addhelper1" ><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
</div>		
   <div class="col-lg-12" style="padding-top:20px;margin-top:20px;">				
 <div id="add_helper1"></div>
 </div>
      <br />
      <div class="modal-footer" style="padding-top:20px;margin-top:20px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="add">
      </div>
     
    </div>
  </div>
</div>
 </form>
 
 

 
 
 
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
       
 
 <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 
 
<script>
  
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#add_helper1"); //Fields wrapper
    var add_button      = $("#addhelper1"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><div class="col-md-10"><label>Expense Type</label><select class="form-control" name="expensetype_id[]" required><option value="">Select Options</option><?php if(!empty($expensetype)){  foreach ($expensetype as $e){  ?><option value="<?php  echo  $e["id"];?>"   ><?php  echo  $e["name"];?></option><?php }} ?></select><div class="col-md-12"><label>Expense Amount</label><input name="amount[]" type="text" class="form-control"></div></div><div class="col-md-2"><button  style="margin-top: 30px" id="helper"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
            //add input box
        }
    });
    
    $(wrapper).on("click","#helper", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
	
	
});





</script>
 
 
 
 
 







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
                type: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                company: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                    contractor_id: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

               vehicle_id: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                  source: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                product: {
                   trigger:'change keyup change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              temperature: {
                   trigger:'change keyup change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
               gravity: {
                   trigger:'change keyup change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

            product_id: {
                   trigger:'change keyup change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

               destination: {
                   trigger:'change keyup change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                 entry_date: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                 email_date: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                 filling_date: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                 filled_by: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              meter_reading: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              gravity : {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              freight_rate: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
             carriage_commission: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

             'driver[]': {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

            'helper[]': {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

                 'helper[]': {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

          'withholding_tax': {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

           'company_comission': {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
        


            }
        });
});


</script>

