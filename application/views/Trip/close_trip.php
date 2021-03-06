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
  height: 150vh !important;

}

</style>
 
<section class="content paddinglr0">
  <div class="box">

      <div class="box-header" style=" padding-bottom: 0;margin-bottom: 0;">
          <h3 style="font-weight:bold; padding-top: 10px;" class="box-title pull-left">Close Trip
       </h3>
          <div class="col-lg-3 vechinfo pull-right">
                    
            <div  style="padding:5px; margin-top: 5px; border: 1px solid  #D3D3D3" id="vech_info" class="panel-body">
                          
                <!-- panel-body -->
              </div>
              <!-- panel panel-default -->
        </div>
     </div>

      <div class="box-body paddinglr0">
            <form name="myform" id="myform" action="<?php echo base_url() ?>trip/save_trip_close" method="post" enctype="multipart/form-data">
            <?php if (!empty($trip_info['0']['id'])): ?>
           <input type="hidden" name="tripid" value="<?php echo $trip_info['0']['id']  ?>">
            <?php endif ?>
          
        <div class="col-lg-9 paddinglr0">
            <div class="col-lg-12 paddinglr5">
                <div class="panel panel-default" style="padding-top:0px;padding-bottom:0px;margin-bottom:3px !important;">
                  <div class="panel-heading"><i class="fa fa-bus" aria-hidden="true"></i>
                   Trip Information</div>
           
                   
            <div class="panel-body paddinglr0" style="padding-top:0px;padding-bottom:0px;">
               <div class="col-lg-3 paddinglr5" style="padding-top:0px;padding-bottom:0px;">
                    <div class="form-group">
                      <label>Trip ID</label>
                      <?php if (!empty($trip_info['0']['id'])): ?>
                      <input class="form-control" type="text" value="<?php echo  $trip_info['0']['id']  ?>" readonly/>
                      <?php endif ?>
                    </div>
              </div>  


              <div class="col-lg-3  paddinglr5">
                   <div class="form-group"> 
                      <label>Company</label>
                      <?php if (!empty($trip_info['0']['comname'])): ?>
                        <input class="form-control" type="text"  value="<?php echo  $trip_info['0']['comname'] ?>" readonly/>
                         <?php endif ?>
                    </div>
                </div>  


                <div class="col-lg-3 paddinglr5">
                    <div class="form-group">    
                        <label>Contractor</label>
                        <?php if (!empty($trip_info['0']['conname'])): ?>
                          <input class="form-control" type="text"  value="<?php echo  $trip_info['0']['conname'] ?>" readonly/>
                        <?php endif ?>
                    </div>
                </div>    

                  <div class="col-lg-3  paddinglr5">
                      <div class="form-group">    
                        <label>Vehicle</label>          
                          <input class="form-control" type="text" value="<?php echo  !empty($trip_info['0']['vehiclename']) ? $trip_info['0']['vehiclename'] : ""  ?>" readonly/>
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
          Meter Reading </div>
            <div class="panel-body paddinglr0" style="padding-top:0px;padding-bottom:0px;"> 
              <div class="row" style="padding: 0 5px">
                  <div class="col-lg-3">           
                      <div class="form-group"> 
                        <label>Start Meter Reading</label>
                         <input id="emr" class="form-control" type="text" value="<?php echo $trip_info['0']['start_meter_reading']  ?>" readonly/>
                      </div>
                  </div>

                 <div class="col-lg-3 ">           
                      <div class="form-group"> 
                        <label>End Meter Reading</label>
                          <input id="smr"  class="form-control"  type="text" name="end_meter_reading" onkeypress='return ValidateNumberOnly()'  />
                      </div>
                  </div>


                  <div class="col-lg-3 ">           
                      <div class="form-group"> 
                        <label>Fuel</label>
                          <input id="fuel" class="form-control" placeholder="Fuel Consumption"  type="text" name="fuel" onkeypress='return ValidateNumberOnly()' />
                      </div>
                  </div>


                  <div class="col-lg-3 ">           
                    <div class="form-group"> 
                      <label>STN Number</label>
                        <input class="form-control"  type="text" name="stn_no" onkeypress='return ValidateNumberOnly()'  />
                    </div>
                 </div>

             </div>  
             <!-- row -->

          <div class="row" style="padding:0 5px ">
            <div class="col-lg-3 ">           
                <div class="form-group"> 
                  <label>Closing Gravity</label>
                    <input class="form-control"  type="text" name="closing_gravity" onkeypress='return ValidateNumberOnly()'  />
                </div>
             </div>

             <div class="col-lg-3 ">           
                <div class="form-group"> 
                  <label>Closing Temperature</label>
                    <input class="form-control"  type="text" name="closing_temp" onkeypress='return ValidateNumberOnly()'  />
                </div>
             </div>

          <!--     <div class="col-lg-3 ">           
                <div class="form-group"> 
                  <label>Shortage</label>
                    <input class="form-control"  type="text" name="shortage" onkeypress='return ValidateNumberOnly()'  />
                </div>
             </div> -->

             <div class="col-lg-3 ">           
                <div class="form-group"> 
                  <label>Tracking Report</label>
                    <input class="form-control"  type="file" name="userfile" onkeypress='return ValidateNumberOnly()'  />
                </div>
             </div>


          </div>  
          <!-- row -->

            
              <script>
              
                // $("#smr").on('blur', function(event) {
                //   var smr = $(this).val();
                // }); 

                $("#smr").on('blur', function(event) {
                  var emr = $(this).val();
                  var smr = $("#emr").val();
                  var res = emr - smr; 
                  $("#travelledDis").html(res);

                }); 

                $("#fuel").on('blur', function(event) {
                  var emr = $("#smr").val();
                  var smr = $("#emr").val();
                  var res = emr - smr; 
                  var fuel = $(this).val();

                    var res = res / fuel; 
                    $("#fc").html(Number((res).toFixed(2)));

                }); 



              </script>

        <div class="row" style="padding: 0 5px">

            <div class="col-lg-3 ">           
                <div class="form-group"> 
                  <div class="well well-sm"><Strong>Travelled Distance</Strong>:&nbsp<span id="travelledDis">0</span></div>
                </div>
             </div>

            <div class="col-lg-3 " style="padding-left: 10px">           
                <div class="form-group"> 
                  <div class="well well-sm"><Strong>Avarage</Strong>:&nbsp<span id="fc">0</span></div>
                </div>
             </div>

             <div class="col-lg-3 " style="padding-left: 10px">           
                <div class="form-group"> 
                  <div class="well well-sm"><Strong>No of Chambers</Strong>:&nbsp<span><?php echo !empty($vech_info[0]['numberofchamber1']) ?  $vech_info[0]['numberofchamber1'] : 0 ?></span></div>
                </div>
             </div>

             <div class="col-lg-3 " style="padding-left: 10px">           
                <div class="form-group"> 
                  <div class="well well-sm"><Strong>Fuel Capacity</Strong>:&nbsp<span><?php echo !empty($vech_info[0]['numberofchamber1']) ?  $vech_info[0]['capacityofchamber'] : 0 ?></span></div>
                </div>
             </div>


          </div>
      <!-- row -->



      </div>            
    </div>

      <!--Add Product -->
                
    <div class="panel panel-default" style="margin-bottom:0px;margin-top:0px;padding-top:0px;padding-bottom:0px;">
          <div class="panel-heading"><i class="fa fa-bus" aria-hidden="true"></i>
          Product Information </div>

          <div class="panel-body paddinglr0" style="padding-top:0px;padding-bottom:0px;">

            <div class="col-lg-12" style="margin-top: 20px">

                <table id="middlecol" class="table table-bordered" >
                    <thead>
                      <tr>
                        <th>Source</th>
                        <th>Dest</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Temp</th>
                        <th>Gravity</th>
                        <th>Freight Rate</th>
                        <th>Milli At Start</th>
                        <th>Milli At Dest </th>
                        <th>Short</th>
                        <th>Price</th>
                        <th>Milli After Decan</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $value): ?> 
                      <tr>
                          <td><?php echo $source['name']; ?></td>
                          <td><?php echo $destination['name']; ?></td>
                          <td><?php echo $value['heading']; ?></td>
                          <td id="price"><?php echo $value['price']; ?></td>
                          <td ><?php echo $value['product_quantity']; ?>
                          <input id="tqty" type="hidden" value="<?php echo $value['product_quantity']; ?>">
                          </td>
                          <td><?php echo $value['product_temperature']; ?></td> 
                          <td><?php echo $value['product_gravity']; ?></td>
                          <td><?php echo $value['freight_rate']; ?></td>
                          <td ><?php echo $value['milli_at_start']; ?> 
                          <input id="milli_start" name="milli_at_start[]" type="hidden" value="<?php echo $value['milli_at_start']; ?>">
                          </td> 
                          <td><input  id="milli_dest"  name="milli_at_dest[]" class="form-control"  type="text" name="milli_at_dest[]" onkeypress='return ValidateNumberOnly()'  required />
                          </td>

                          <td><input  id="shrt" class="form-control"  type="text" name="shortage[]" onkeypress='return ValidateNumberOnly()'  readonly />
                          </td>

                           <td><input id="shrtPrice" class="form-control"  type="text" name="short_price[]" onkeypress='return ValidateNumberOnly()'  readonly />
                          </td>

                          <td><input class="form-control"  type="text" name="milli_after_decan[]" onkeypress='return ValidateNumberOnly()'  required/>
                          </td>

                      </tr>   
                    <?php endforeach ?>                 
                    </tbody>
                  </table>                      
            </div>  

          </div>
        </div>
        <!-- panel-body -->
           
     </div>

     <div class="col-lg-12 col-md-12 col-sm-12" style="margin: 10px 0; padding-left: 5px">
          <?php if (!($trip_info['0']['status'])): ?>
            <input id="trip_close" class="btn btn-primary" type="submit" name="register" value="Close Trip" />
          <?php endif ?>
          
      </div>  



    </div>
  <!-- col-lg-7 -->  

        <!-- ============================================================= -->


      <div class="col-lg-3 paddinglr5">
      
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-car" aria-hidden="true"></i> Drivers & Helpers  Info </div>
               <div class="panel-body paddinglr0">
                   
                      <div class="form-group paddinglr5">                      
                        <div class="col-md-10 paddinglr5">
                            <p><Strong>Driver</Strong>: <?php echo !empty($trip_info['0']['drivername']) ?  $trip_info['0']['drivername'] : ""; ?></p>
                           
                        </div>  
                      </div>



                     <div class="form-group paddinglr5">                      
                        <div class="col-md-10 paddinglr5">
                            <p><Strong>Helper</Strong>: <?php echo !empty($helper[0]['name']) ? $helper[0]['name'] : ""; ?></p>
                        </div>  


                      </div>
                         


                </div>
                <!-- panel-body -->
              </div>
              <!-- panel panel-default -->
            

 
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-clock-o" aria-hidden="true"></i> Date</div>
                  <div class="panel-body" >
                    <div class="form-group">
                      <p><Strong>Entry Date</Strong>:&nbsp&nbsp <?php echo $trip_info['0']['entry_date']; ?></p>                      
                    </div>  

                    <div class="form-group">
                      <p><Strong>Email Date</Strong>:&nbsp&nbsp <?php echo $trip_info['0']['email_date']; ?></p>                        
                    </div> 

                     <div class="form-group">
                      <p><Strong>Filling date</Strong>:&nbsp&nbsp <?php echo  $trip_info['0']['filling_date']; ?></p>
                    </div> 

                   <div class="form-group">  
                      <p><Strong>Filled By</Strong>:&nbsp&nbsp <?php echo $filledby['name']; ?></p>
                    </div>

      
                  </div>
                  <!-- panel-body -->
                </div>
                <!-- panel panel-default -->



         <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-clock-o" aria-hidden="true"></i> Closing Date</div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label>Entry Date</label>
                      <?php  $date = date('Y-m-d'); ?>
                      <input class="form-control" type="date" name="closing_entry_date" value="<?php echo $date; ?>" palceholder="" >
                    </div>  

                    <div class="form-group">
                      <label>Email Date</label>
                      <input class="form-control" type="date" name="closing_email_date" value="<?php echo $date; ?>" >
                    </div> 

                     <div class="form-group">
                      <label>Uncanned date</label>
                      <input class="form-control" type="date" name="uncanned_date" value="<?php echo $date; ?>" >
                    </div> 


                    <div class="form-group">    
                        <label>Uncanned By</label>
                          <select  class="form-control" name="uncanned_by" required>
                             <option value="">Select Options</option>       
                              <?php if(!empty($driver1)){
                              foreach ($driver1 as $v){  ?>      
                              <option value="<?php  echo  $v["did"];?>"   >
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


        </form>
     </div>
  <!-- box-body -->
   </div>
  <!-- box -->
</section>

  <!-- =================================================    -->



<script>

function ValidateNumberOnly()
{

if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 46  ) 
{
   event.returnValue = false;
}

}

</script>


<script>

  $("#shrt").val(0);
  $("#shrtPrice").val(0); 

  $("#milli_dest").on('blur', function(event) {
    
      var milli_dest =  $(this).val();
      var total_qty =  $("#tqty").val();
      var milli_start =  $("#milli_start").val();  
      var divid = total_qty/ milli_start;
      var res  =  divid * milli_dest;
      $("#shrt").val(res);
      var short =  $("#shrt").val();    
      var price =  $("#price").text();  

      var shrtPrice = price * short ;
      $("#shrtPrice").val(shrtPrice); 
      

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
                
                 entry_date: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

                 email_date: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                 uncanned_date: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                 uncanned_by: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              fuel: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

              end_meter_reading: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

             'stn_no': {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

            'closing_gravity': {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },



            'closing_temp': {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },


            'userfile': {
                   trigger:'change  blur',
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

