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
.paddinglr0{
  padding-left:0px; padding-right:0px;
  margin-left:0px; margin-right:0px;
}
.paddinglr5{
  padding-left:5px; padding-right:5px;

}
.paddinglr2{
  padding-left:px; padding-right:2px;

}
.content{
  padding-top:40px !important;
}
</style>
 

<section class="content paddinglr0">
  <div class="box">

    <div class="box-header">
        <h3 style="font-weight:bold; padding-top: 10px" class="box-title pull-left">Start Trip
     </h3>
        <div class="col-lg-5 vechinfo pull-right">
                  
          <div  style="padding:10px; margin-top: 5px; border: 1px solid  #D3D3D3" id="vech_info" class="panel-body">
                        
              <!-- panel-body -->
            </div>
            <!-- panel panel-default -->
      </div>
</div>

      <div class="box-body paddinglr0">
            <form name="myform" id="myform" action="<?php echo base_url() ?>trip/save_trip" method="post" enctype="multipart/form-data">
          
        <div class="col-lg-9 paddinglr0">
            <div class="col-lg-12 paddinglr5">
                <div class="panel panel-default" style="padding-top:0px;padding-bottom:0px;margin-bottom:3px !important;">
                  <div class="panel-heading"><i class="fa fa-bus" aria-hidden="true"></i>
                   Trip Information
           
                   </div>
                  <div class="panel-body paddinglr0" style="padding-top:0px;padding-bottom:0px;">
<div class="col-lg-3 paddinglr5" style="padding-top:0px;padding-bottom:0px;">
                    <div class="form-group">
                      <label>Type</label>
                      <select class="form-control" name="type" required> 
                          <option value="">Select Options</option>       
                          <option value="Self-Long">Self-Long</option>                                     
                          <option value="Self-Short">Self-Short</option>
                          <option value="General-Long">General-Long</option>                                     
                          <option value="General-Short">General-Short</option>
                      </select>
                    </div>
</div>        
<div class="col-lg-3  paddinglr5">
                     <div class="form-group"> 
                        <label>Company</label>
                          <select class="form-control" name="company_id" selected="selected" required>
                          <option value="">Select Options</option>       
                           <?php  if(!empty($customer)){
                            foreach ($customer as $c){ ?>        
                            <option value="<?php  echo  $c["id"];?>"   >
                            <?php  echo  $c["name"];?>
                            </option>               
                            <?php }} ?>
                          </select> 
                      </div>
</div>        
<div class="col-lg-3 paddinglr5">
                    <div class="form-group">    
                        <label>Contractor</label>
                        <select class="form-control" name="contractor_id" selected="selected" required>          
                       <option value="">Select Options</option>       
                         <?php  if(!empty($contractor)){
                            foreach ($contractor as $con){   ?>       
                            <option value="<?php  echo  $con["id"];?>"   >
                            <?php  echo  $con["name"];?>
                            </option>               
                            <?php }} ?>
                        </select> 
                    </div>
</div>        
<div class="col-lg-3  paddinglr5">
                    <div class="form-group">    
                      <label>Vehicle</label>
                        <select id="veh" class="form-control" name="vehicle_id" required>
                           <option value="">Select Options</option>       
                            <?php if(!empty($vehicle)){
                            foreach ($vehicle as $v){  ?>      
                            <option value="<?php  echo  $v["id"];?>"   >
                            <?php  echo  $v["registerationno"];?>
                            </option>               
                            <?php }} ?>
                        </select> 
                      </div>
</div>
                  </div>
                  <!-- panel-body -->
                </div>
                <!-- panel panel-default -->
            </div>
              <!-- col-lg-12 -->

    <div class="col-lg-12  paddinglr5">

        <div class="panel panel-default" style="margin-bottom:3px !important;" >
          <div class="panel-heading"><i class="fa fa-asterisk" aria-hidden="true"></i>
          All Fields Are Required </div>
            <div class="panel-body paddinglr0" style="padding-top:0px;padding-bottom:0px;"> 
                   

                   <div class="col-lg-3 paddinglr5">
                        <div class="form-group"> 
                          <label>Source </label>
                            <select class="form-control" name="source" selected="selected" required> 
                            <option value="">Select Options</option>       

                             <?php  if(!empty($source)){
                             foreach ($source as $p){   ?>      
                                <option value="<?php  echo  $p["id"];?>"   >
                              <?php  echo  $p["name"];?>
                                </option>               
                                <?php }} ?>
                            </select> 
                        </div>
            </div>
 <!--                        
                       <div class="form-group"> 
                          <label>Product </label>
                            <select id="pro" class="form-control" name="product_id" selected="selected" required> 
                            <option value="">Select Options</option>       

                             <?php  if(!empty($product)){
                             foreach ($product as $p){   ?>      
                                <option value="<?php  echo  $p["id"];?>"   >
                              <?php  echo  $p["heading"];?>
                                </option>               
                                <?php }} ?>
                            </select> 
                        </div>

                        <div class="form-group"> 
                          <label>Quantity</label>
                            <input class="form-control" name="quantity" type="text" name="product_quantity" onkeypress='return ValidateNumberOnly()' required="required" />
                        </div>

                        <div class="form-group"> 
                        <label>Temperature</label>
                          <input class="form-control" onkeypress='return ValidateNumberOnly()'  type="text" name="temperature"   required="required" />
                        </div>

                        <div class="form-group"> 
                          <label>Gravity</label>
                            <input class="form-control" onkeypress='return ValidateNumberOnly()'  type="text" name="gravity"  required="required" />
                        </div>

                        <div class="form-group"> 
                          <label>Destination </label>
                            <select class="form-control" name="destination" selected="selected" required> 
                            <option value="">Select Options</option>       

                             <?php  if(!empty($source)){
                             foreach ($source as $p){   ?>      
                                <option value="<?php  echo  $p["id"];?>"   >
                              <?php  echo  $p["name"];?>
                                </option>               
                                <?php }} ?>
                            </select> 
                        </div>
                         
                      
                        
                     </div>
                    -->                                                  
          
                   <div class="col-lg-3 paddinglr5">
                 
                      <div class="form-group"> 
                        <label>Start Meter Reading</label>
                          <input class="form-control"  type="text" name="meter_reading" onkeypress='return ValidateNumberOnly()' required="required" />
                      </div>
          </div>
          
                   <div class="col-lg-3 paddinglr5">
                 
                      <div class="form-group"> 
                        <label>Freight Rate</label>
                          <input class="form-control"  type="text" name="freight_rate" onkeypress='return ValidateNumberOnly()' required="required" />
                      </div>
  </div>
          
                  
                   <div class="col-lg-3 paddinglr5">
                 
                      <div class="form-group"> 
                      <label>Carriage Commission</label>
                        <input class="form-control" type="text" name="carriage_commission" onkeypress='return ValidateNumberOnly()'   required="required" />
                      </div>
  </div>
          
                   <div class="col-lg-3 paddinglr5">
                 
                      <div class="form-group"> 
                        <label>Withholding Tax</label>
                          <input class="form-control" onkeypress='return ValidateNumberOnly()' type="text" name="withholding_tax"  required="required" />
                      </div>
  </div>
          
                   <div class="col-lg-3 paddinglr5">
                 
                        <div class="form-group"> 
                        <label>Company Comission</label>
                          <input id="aa" class="form-control"  onkeypress='return ValidateNumberOnly()' type="text" name="company_commission"  required="required" />
                      </div>  
  </div>
          
                   <div class="col-lg-3 paddinglr5">
                 
                       <div class="form-group"> 
                        <label>for Customer</label>
                          <input class="form-control"  type="text" name="remaining_commission" value="0"  required="required" readonly />
                      </div>
                  </div>

                <div class="col-lg-3 paddinglr5">
                 
                   <div class="form-group"> 
                      <label>Add Product</label>
                      <button class="add_field_button btn btn-success form-control">Click</button>
                    </div>

                </div>
                                                                        
            </div>
                   
          </div>
                
         <div class="panel panel-default" style="margin-bottom:0px;margin-top:0px;padding-top:0px;padding-bottom:0px;">
          <div class="panel-heading"><i class="fa fa-bus" aria-hidden="true"></i>
           Product Information
   
           </div>
            <div class="panel-body paddinglr0" style="padding-top:0px;padding-bottom:0px;">
           <div id="more_fields" class="col-lg-12 paddinglr0">
            
           </div>
          </div>
        </div>
        <!-- panel-body -->
           
              <!-- panel panel-default -->

         </div>
         <!-- col-lg-12 -->  


    </div>
  <!-- col-lg-7 -->  

        <!-- ============================================================= -->


      <div class="col-lg-3 paddinglr5">
          



            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-car" aria-hidden="true"></i> Drivers & Helpers  Info </div>
               <div class="panel-body paddinglr0">
                   
                      <div class="form-group paddinglr5">                      
                        <div class="col-md-10 paddinglr5">
                            <label>Driver</label>

                          <select class="form-control driver" name="driver[]" required>
                             <option value="">Select Options</option>       
                              <?php if(!empty($driver1)){
                              foreach ($driver1 as $v){  ?>      
                              <option value="<?php  echo  $v["id"];?>"   >
                              <?php  echo  $v["name"];?>
                              </option>               
                              <?php }} ?>
                          </select>
                        </div>  
                        
                        <div class="col-md-2 paddinglr5">  
                         <button href="javascript:" style="margin-top: 30px" id="driver1" ><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                      </div>
                    <div class="paddinglr0" id="driver_1"></div>


                     <div class="form-group paddinglr5">                      
                        <div class="col-md-10 paddinglr5">
                            <label>Helper</label>

                          <select  class="form-control" name="helper[]" required>
                             <option value="">Select Options</option>       
                              <?php if(!empty($helperinformation)){
                              foreach ($helperinformation as $v){  ?>      
                              <option value="<?php  echo  $v["id"];?>"   >
                              <?php  echo  $v["name"];?>
                              </option>               
                              <?php }} ?>
                          </select>
                        </div>  

                        <div class="col-md-2 paddinglr5">  
                         <button style="margin-top: 30px" id="addhelper" ><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                      </div>
                         
                        

                    <div class="paddinglr0" id="add_helper"></div>

                </div>
                <!-- panel-body -->
              </div>
              <!-- panel panel-default -->
            

 
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
                        <label>Filled By</label>
                          <select  class="form-control" name="filled_by" required>
                             <option value="">Select Options</option>       
                              <?php if(!empty($driver1)){
                              foreach ($driver1 as $v){  ?>      
                              <option value="<?php  echo  $v["id"];?>"   >
                              <?php  echo  $v["name"];?>
                              </option>               
                              <?php }} ?>
                          </select> 
                      </div>


                       
                  </div>
                  <!-- panel-body -->
                </div>
                <!-- panel panel-default -->
         

        </div>
        <!-- col-lg-4 -->

            <div class="col-lg-12 col-md-12 col-sm-12">
                <input class="btn btn-primary" type="submit" name="register" value="Save Trip" />
            </div>  

        </form>
     </div>
  <!-- box-body -->
   </div>
  <!-- box -->
</section>

  <!-- ==============================================================================    -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#p").keyup(function(){
            alert($(this).val());
        });
    })
</script>

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
            $(wrapper).append('<div class="col-lg-12"><div class=""><div class="col-lg-2 paddinglr2" style="float:left;"><div class="form-group"><label>Product </label><select id="pro"  class="form-control product" name="product_id[]" selected="selected" required><option value="">Select Options</option><?php  if(!empty($product)){foreach ($product as $p){   ?><option value="<?php  echo  $p["id"];?>" ><?php  echo  $p["heading"];?></option><?php }} ?></select></div></div><div class="col-lg-2 paddinglr2"><div class="form-group"><label>Quantity</label><input onkeyup="sum1()" id="quantity"  class="quantity form-control"  type="text" name="product_quantity[]" required="required" /></div></div><div class="col-lg-2 paddinglr2"><div class="form-group"><label>Temperature</label><input class="form-control"  type="text" name="product_temperature[]"   required="required" /></div></div><div class="col-lg-2 paddinglr2"><div class="form-group"><label>Gravity</label><input class="form-control"  type="text" name="product_gravity[]"  required="required" /></div></div><div class="col-lg-2 paddinglr2"><div class="form-group"><label>Destination </label><select id="destination"  class="form-control source" name="destination[]" selected="selected" required><option value="">Select Options</option><?php  if(!empty($source)){foreach ($source as $d){   ?><option value="<?php  echo  $d["id"];?>" ><?php  echo  $d["name"];?></option><?php }} ?></select></div></div>    <div class="col-lg-2 paddinglr2"><div class="form-group"><label>Freight Rate</label><input class="form-control"   type="text" id="freight_rate" name="freight_rate[]"  required="required"  /></div> </div><div class="col-lg-2 paddinglr2"><div class="form-group"><label>Contract Carriage Commission</label><input class="form-control"  type="text" name="carriage_commission[]"    required="required" /></div></div><div class="col-lg-2 paddinglr2"><div class="form-group"><label>Withholding Tax</label><input class="form-control"   type="text" name="withholding_tax[]"  required="required" /></div></div><div class="col-lg-2 paddinglr2"><div class="form-group"><label>Company Comission</label><input onkeydown="sum1()"  id="companycommission" class="form-control companycommission"     type="text" name="company_comission[]"  required="required" /></div></div><div class="col-lg-2 paddinglr2"><div class="form-group"><label>Remaining (For Customer)</label><input class="form-control remaining"  type="text" name="remaining_commission[]"  required="required" readonly /><span  class="pro_info"  ></span></div>  </div><div class="col-lg-2 paddinglr2"><button style="margin-top:24px; " class="remove_field btn btn-success">Remove</button></div></div>'); 
            //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});


</script>
<script>
    function sum1()
          {
   //    document.getElementById('2d').innerHTML =document.getElementById("quantity").value;
//alert("#2d");
//        document.getElementById('2d').innerHTML =document.getElementById("result").value;
 //alert(2d);      
//    document.getElementById('4d').innerHTML =document.getElementById("numb").value;
       // document.getElementById('customertype').innerHTML =document.getElementById("customertype").value;
 // alert("hi");
// var name= $('.product').val();
// var name1= $('.companycommission').val();
//alert(name1);
      var quantity = document.getElementsByName("quantity")[0].value;
      var discountPrct = document.getElementsByName("percent")[0].value;
//             var total = document.myform.quantity.value;
   alert(quantity);
  //           var n = document.myform.number1.value;
          //   alert(n);
    //   var sum11 = parseInt(name)*parseInt(name1);
document.getElementsByClassName('sum1')[0].value=sum11;            
    // document.myform.b.value = sum1;
//alert(sum1[0].value);   
   }


</script>
<input type="hidden" onkeydown="sum1()">                   
<label Class="c"></label>
<label Class="c1"></label>
<label Class="sum1"></label>

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
            $(wrapper).append('<div class="form-group paddinglr5"><div class="col-md-10 paddinglr5"><label>Helper</label><select class="form-control" name="helper[]" required><option value="">Select Options</option><?php if(!empty($helperinformation)){  foreach ($helperinformation as $v){  ?><option value="<?php  echo  $v["id"];?>"   ><?php  echo  $v["name"];?></option><?php }} ?></select></div><div class="col-md-2 paddinglr5"><button  style="margin-top: 30px" id="helper"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
            //add input box
        }
    });
    
    $(wrapper).on("click","#helper", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
  
  $(document).on('keyup','#freight_rate',function(){
    var freight=$(this).val();
    var quantity=$(this).parent().parent().parent().find('.quantity').val();
//    var price=$(this).parent().parent().parent().find('.price').val();
    var remaining=$(this).parent().parent().parent().find('.remaining');
    //console.log(remaining);
    //console.log(freight,quantity,price);
    remaining.val((parseFloat(quantity)*parseFloat(freight)*(100))/(100));
    
  });
  $(document).on('keyup','.quantity',function(){
    var quantity=$(this).val();
    var freight=$(this).parent().parent().parent().find('#freight_rate').val();
    var price=$(this).parent().parent().parent().find('.price').val();
    var remaining=$(this).parent().parent().parent().find('.remaining');
    
    remaining.val((parseFloat(quantity)*parseFloat(freight)*(100))/(100));
    
  });
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
            $(wrapper).append('<div class="form-group paddinglr5"><div class="col-md-10 paddinglr5"><label>Driver</label><select id="helper" class="form-control" name="driver[]" required><option value="">Select Options</option><?php if(!empty($driver1)){  foreach ($driver1 as $v){  ?><option value="<?php  echo  $v["id"];?>"   ><?php  echo  $v["name"];?></option><?php }} ?></select></div><div class="col-md-2 paddinglr5"><button style="margin-top: 30px" id="p_driver"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
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
  $(document).on('change','#pro',function(event) {
     var id =  $(this).val();
   var pro=$(this);

     
    $.ajax({
      url: '<?php echo base_url(); ?>Vehicle/get_productprice_by_id/'+id,
      type: 'POST',
      success:  function (response) {
      var result = eval(response);
    
    var price=pro.parent().parent().parent().find('.pro_info');
    console.log(price);
    pro_info = "<input type='hidden' class='price' value='"+result['price']+"' />";
  //  pro_info = "<div><p>Product Price&nbsp <input type="text" /></p></div>"

   price.html(pro_info);}
    })
  });
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

        vech_info = "<div><strong>Chassis Number:</strong>" +"&nbsp;"+ result['chassisno'] +"&nbsp&nbsp&nbsp<strong> Engine Number: </strong>" +"&nbsp"+ result['engineno'] +"</div>"
        
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
                company_id: {
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
                //  filled_by: {
                //    trigger:'change keyup blur',
                //     validators: {
                //         notEmpty: {
                //             message: 'field  is required and cannot be empty'
                //         }
                //     }
                // },
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

