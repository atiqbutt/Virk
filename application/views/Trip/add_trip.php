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
  height: auto !important;
}

</style>
 

<section class="content paddinglr0">

  <div class="box">

        <div class="box-header" style=" padding-bottom: 0;margin-bottom: 0;">
              <h3 style="font-weight:bold; padding-top: 10px;" class="box-title pull-left">Start Trip
           </h3>
              
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
                
            <div class="row" style="margin-left:0;margin-right:0">   
          
              <div class="col-lg-3 paddinglr5" style="padding-top:0px;padding-bottom:0px;">

                    <div class="form-group">
                      <label>Type</label>
                      <select class="form-control sel" name="type" > 
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
                    <label>customer</label>
                      <select id="customer" class="form-control sel" name="customer_id" selected="selected" >
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
                      <select id="contractor" class="form-control sel" name="contractor_id" selected="selected" >          
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
                    <label>Company</label>
                      <select id="company" class="form-control sel" name="company_id" selected="selected" >

                      <option value="">Select Options</option>       
                       <?php  if(!empty($company)){
                        foreach ($company as $c){ ?>        
                        <option value="<?php  echo  $c["id"];?>"   >
                        <?php  echo  $c["name"];?>
                        </option>               
                        <?php }} ?>
                      </select> 
                  </div>
              </div>  

             </div> 
             <!-- row  -->

            <div class="row" style="margin-left:0;margin-right:0">

                  <div class="col-lg-3  paddinglr5">
                      <div class="form-group">    
                        <label>Vehicle</label>
                          <select id="veh" class="form-control sel" name="vehicle_id" >
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



                  <div class="col-lg-3 paddinglr2">
                    <div class="form-group"><label>Carriage Commission</label><input id="carriage_commission" class="form-control" value=""  type="text" name="carriage_commission" onkeypress='return ValidateNumberOnly()' />
                    </div>
                  </div>


                  <div class="col-lg-3 paddinglr2">
                  <div class="form-group"><label>Withholding Tax</label><input class="form-control" id="withholding_tax" type="text" name="withholding_tax"  onkeypress='return ValidateNumberOnly()' />
                  </div>
                  </div>

                  <div class="col-lg-3 paddinglr2">
                  <div class="form-group"><label>Company Comission</label><input   id="company_commission" class="form-control companycommission" type="text" name="company_comission" onkeypress='return ValidateNumberOnly()' />
                  </div>
                  </div>

   
              </div> 
             <!-- row  -->

                <div class="row" style="margin-left: -10px;">
                    <div class="col-lg-3 paddinglr2">
                        <div class="form-group"><label>Remaining (For Customer)</label><input class="form-control" id="remaining_commission"  type="number" name="remaining_commission"  readonly /><span ></span>
                        </div>  
                    </div>

                    <div class="col-lg-3 paddinglr5">           
                      <div class="form-group"> 
                        <label>Start Meter Reading</label>
                          <input class="form-control"  type="text" name="start_meter_reading" onkeypress='return ValidateNumberOnly()'  />
                      </div>
                    </div>

                    <div class="col-lg-3 paddinglr2">
                       <div id="vech_info" style="margin-top: 20px; border: 1px solid #D3D3D3; display: none;"></div>
                    </div>
          

                </div>
                <!-- row -->



          </div>
          <!-- panel-body -->
        </div>
        <!-- panel panel-default -->
    </div>
      <!-- col-lg-12 -->

    <div class="col-lg-12  paddinglr5">
<!-- 
        <div class="panel panel-default" style="margin-bottom:3px !important;" >
          <div class="panel-heading"><i class="fa fa-asterisk" aria-hidden="true"></i>
          Meter Reading </div>
            <div class="panel-body paddinglr0" style="padding-top:0px;padding-bottom:0px;"> 
                                                                    
            </div>            
          </div> -->

      <!--Add Product -->
              
         <div class="panel panel-default pview" style="margin-bottom:0px;margin-top:0px;padding-top:0px;padding-bottom:0px;">
          <div class="panel-heading"><i class="fa fa-bus" aria-hidden="true"></i>
           Add Product 
   
           </div>
            <div class="panel-body paddinglr0" style="padding-top:0px;padding-bottom:0px;">

            <div class="col-lg-12">
              <div class="row">

                    <div class="col-lg-3 paddinglr2">
                        <div class="form-group"> 
                          <label>Source </label>
                            <select id="source" class="form-control sel" name="source" selected="selected" > 
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
                   
                  <div class="col-lg-3 paddinglr2">
                    <div class="form-group"> 
                            <label>Destination </label>
                              <select id="destination" class="form-control sel" name="destination" selected="selected" > 
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
                             

                    <div class="col-lg-3 paddinglr2" style="float:left;">
                      <div class="form-group">
                      <label>Product </label>
                      <select id="product_id"  class="form-control product sel" name="product_id"  >
                      <option value="">Select Options</option>
                      <?php  if(!empty($product)){foreach ($product as $p){   ?><option value="<?php  echo  $p["id"];?>" ><?php  echo  $p["heading"];?></option>
                      <?php }} ?>
                      </select>
                      </div>
                    </div>

                  <div class="col-lg-3 paddinglr2">
                    <div class="form-group"><label>Temperature</label><input class="form-control" id="product_temperature"   type="text" name="product_temperature"   onkeypress='return ValidateNumberOnly()' />
                    </div>
                  </div>

          </div>
          <!-- row -->



         <div class="row">
      
              <div class="col-lg-3 paddinglr2">
                <div class="form-group"><label>Gravity</label>
                <input id="product_gravity" class="form-control" type="text" name="product_gravity"  onkeypress='return ValidateNumberOnly()' />
                </div>
              </div> 

              <div class="col-lg-3 paddinglr2">
                  <div class="form-group"><label>Quantity</label><input  id="product_quantity"  class="quantity form-control"  type="text" name="product_quantity" onkeypress='return ValidateNumberOnly()'/>
                  </div>
              </div>

              <div class="col-lg-3 paddinglr2">
                <div class="form-group"><label>Freight Rate</label>
                <input id="freight_rate" class="form-control"  type="text" id="freight_rate" name="freight_rate"  onkeypress='return ValidateNumberOnly()' />
                </div> 
              </div>


            <div class="col-lg-3 paddinglr2">
              <div class="form-group"><label>Milli At Start</label>
              <input  class="form-control"  type="text" id="milli_start" name="milli_start"  onkeypress='return ValidateNumberOnly()' />
              </div> 
            </div>

          </div>
          <!-- row -->



          <div class="row">
            
            <div class="col-lg-2 paddinglr2">
              <strong>Total-Frt:&nbsp&nbsp </strong><span id="Total_Frt">0.00</span>
            </div>

            <div class="col-lg-2 paddinglr2">
              <strong>Cont-Comsn:&nbsp&nbsp </strong><span id="Cont_Comsn">0.00</span>
            </div>

            <div class="col-lg-2 paddinglr2">
            <strong>Comp-Comsn:&nbsp&nbsp</strong><span id="Comp_Comsn">0.00</span>
            </div>

            <div class="col-lg-2 paddinglr2">
              <strong>W.H.T:&nbsp&nbsp</strong><span id="wht">0.00</span>
            </div>

            <div class="col-lg-2 paddinglr2">
              <strong>Cstm-Frt:&nbsp&nbsp</strong><span id="Cstm_Frt">0.00</span>
            </div>

          </div>
          <!-- row -->


          <div class="row">
            <div  class="col-lg-3 paddinglr2">
              <a id="add_pro" style="margin: 20px 0" class="remove_field btn btn-success">Add Product</a>
            </div>
        </div>
       <!-- row -->

        </div>
        <!-- col-lg-12 -->
     
      </div>
    </div>
    <!-- panel-body -->
           
     </div>
     <!-- col-lg-12 -->  
        <div id="addpro" class="col-md-12" style="display: none">
          <div class="row" style="padding-left: 5px; padding-right: 5px; margin-top: 10px">
              <div class="panel panel-default ">
              <div class="panel-heading">Products View</div>
                <div class="panel-body" style="padding-left: 10px">
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Source</th>
                      <th>Destination</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Rate</th>
          					  <th>Gravity</th>
          					  <th>Freight Rate</th>
                      <th>Milli at Start</th>
                    </tr>
                   </thead>
                    <tbody id="prod_info" >
                  
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
      </div>
  </div>
<!-- col-lg-9 -->  

        <!-- ============================================================= -->

      <div class="col-lg-3 paddinglr5">
        
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-car" aria-hidden="true"></i> Drivers & Helpers  Info </div>
               <div class="panel-body paddinglr0">
                   
                      <div class="form-group paddinglr5">                      
                        <div class="col-md-10 paddinglr5">
                            <label>Driver</label>

                        <select class="form-control sel" name="driver[]" required>
                        <option value="">Select Options</option>       
                              <?php if(!empty($driver1)){
                              foreach ($driver1 as $v){  ?>      
                              <option value="<?php  echo  $v["id"];?>"   >
                              <?php echo $v["name"];?>
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

                            <select class="form-control sel" name="helper[]" required>
                             <option value="">Select Options</option>       
                              <?php if(!empty($helperinformation)){
                              foreach ($helperinformation as $v){  ?>      
                              <option value="<?php  echo  $v["id"];?>"   >
                              <?php echo $v["name"];?>
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
                      <input class="form-control" type="date" name="entry_date" value="<?php echo $date; ?>" palceholder="" >
                    </div>  

                    <div class="form-group">
                      <label>Email Date</label>
                      <input class="form-control" type="date" name="email_date" value="<?php echo $date; ?>" >
                    </div> 

                     <div class="form-group">
                      <label>Filling date</label>
                      <input class="form-control" type="date" name="filling_date" value="<?php echo $date; ?>" >
                    </div> 

                   <div class="form-group">    
                    <label>Filled By</label>

                      <select  class="form-control sel" name="filled_by" required>
                         <option value="">Select Options</option>       
                          <?php if(!empty($driver1)){
                          foreach ($driver1 as $v){  ?>      
                          <option value="<?php  echo  $v["id"];?>">
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
            
            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 25px">
                <input id="trip_save" class="btn btn-primary" type="submit" name="register" value="Save Trip" />
            </div>  


        </form>
     </div>
  <!-- box-body -->
   </div>
  <!-- box -->
</section>


  <!-- =================================================    -->



<script>
  
$(document).ready(function() {
    var max_fields      = 2; //maximum input boxes allowed
    var wrapper         = $("#add_helper"); //Fields wrapper
    var add_button      = $("#addhelper"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group paddinglr5"><div class="col-md-10 paddinglr5"><label>Helper</label><select class="form-control sel" name="helper[]" required><option value="">Select Options</option><?php if(!empty($helperinformation)){  foreach ($helperinformation as $v){  ?><option value="<?php  echo  $v["id"];?>"   ><?php  echo  $v["name"];?></option><?php }} ?></select></div><div class="col-md-2 paddinglr5"><button  style="margin-top: 30px" id="helper"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
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
    var max_fields      = 2; //maximum input boxes allowed
    var wrapper         = $("#driver_1"); //Fields wrapper
    var add_button      = $("#driver1"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group paddinglr5"><div class="col-md-10 paddinglr5"><label>Driver</label><select id="helper" class="form-control sel" name="driver[]" required><option value="">Select Options</option><?php if(!empty($driver1)){  foreach ($driver1 as $v){  ?><option value="<?php  echo  $v["id"];?>"><?php echo $v["name"];?></option><?php }} ?></select></div><div class="col-md-2 paddinglr5"><button style="margin-top: 30px" id="p_driver"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
            //add input box
        }
    });

    //user click on remove text
    $(wrapper).on("click","#p_driver", function(e){ 
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

        var vech_info = "<div><strong>Chassis Number:</strong>" +"&nbsp&nbsp;"+ result['chassisno'] +"<br><strong> Engine Number: </strong>" +"&nbsp&nbsp"+ result['engineno'] +"</div>"
        
        var input = '<input type="hidden" name="noofchamb" value="'+ result['numberofchamber1'] + '"><input type="hidden" name="capofchamb"  value="'+ result['capacityofchamber'] + '">';


          $('#vech_info').html(vech_info + input).show();

           
        }
    })
 
    

  });



  $("#contractor").change(function() {

    var contractor_id =  $('#contractor').val();
    
    var customer_id =  $("#customer").val();

    $.ajax({
      url: '<?php echo base_url(); ?>Commission/get_customer_comm',
      type: 'POST',
      data: {customerid:customer_id,contractorid: contractor_id},
      
      success:  function (response) {
         var result =JSON.parse(response);
         if (result == "") {
          var carriageCommission = "";
         }else{
          var carriageCommission = result[0].freight_commission;
         }
         $('#carriage_commission').val(carriageCommission);
         
            }
        })
     
     
    });



  $('#company').change(function(event) {

    var contractor_id =  $(this).val();
    var company_id =  $("#contractor").val();

    var carriage_commission =  $("#carriage_commission").val();

    $.ajax({
      url: '<?php echo base_url(); ?>Commission/get_company_comm',
      type: 'POST',
      data: {contractorid: contractor_id, companyid:company_id},
      
         success:  function (response) {
         var result =JSON.parse(response);

         if (result == "") {
         var company_commission = "";
         var withholding_tax = "";
         }else{
           var company_commission = result[0].commission_1;
         var withholding_tax = result[0].withholding_tax;
         }
         $('#company_commission').val(company_commission);
         $('#withholding_tax').val(withholding_tax);
          var total_commission = 100; 

          var fcc = parseInt(total_commission) - parseInt(carriage_commission);
          $('#remaining_commission').val(fcc);
         
        }

      })
   
      
  });



  $('#carriage_commission').keyup(function(event) {

    var carriage_commission =  $(this).val();
    var total_commission = 100; 

    var fcc = parseInt(total_commission) - parseInt(carriage_commission);
    $('#remaining_commission').val(fcc);
         

      
  });



    $('#freight_rate').keyup(function(event) {

      var freight_rate =  $(this).val();

      var quantity = $("#product_quantity").val();
      var carriage_commission = $("#carriage_commission").val();
      var company_commission = $("#company_commission").val();
      var withholding_tax = $("#withholding_tax").val();
      var remaining_commission = $("#remaining_commission").val();


      var total_freight = parseInt(quantity) * parseInt(freight_rate);
      var Cont_Comsn = parseInt(carriage_commission)/100 * parseInt(total_freight);
      var Comp_Comsn = parseInt(company_commission)/100 * parseInt(total_freight);
      var wht = parseInt(withholding_tax)/100 * parseInt(total_freight);
      var Cstm_Frt = parseInt(remaining_commission)/100 * parseInt(total_freight);

      $('#Total_Frt').html(isNaN(total_freight) ? 0 : total_freight.toFixed(2));
      $('#Cont_Comsn').html(isNaN(Cont_Comsn) ? 0 : Cont_Comsn.toFixed(2));
      $('#Comp_Comsn').html(isNaN(Comp_Comsn) ? 0 : Comp_Comsn.toFixed(2));
      $('#wht').html(isNaN(wht) ? 0 : wht.toFixed(2));
      $('#Cstm_Frt').html(isNaN(Cstm_Frt) ? 0 : Cstm_Frt.toFixed(2));

      
  });


 $('#product_quantity').keyup(function(event) {

      var quantity =  $(this).val();

      var freight_rate = $("#freight_rate").val();
      var carriage_commission = $("#carriage_commission").val();
      var company_commission = $("#company_commission").val();
      var withholding_tax = $("#withholding_tax").val();
      var remaining_commission = $("#remaining_commission").val();


      var total_freight = parseInt(quantity) * parseInt(freight_rate);
      var Cont_Comsn = parseInt(carriage_commission)/100 * parseInt(total_freight);
      var Comp_Comsn = parseInt(company_commission)/100 * parseInt(total_freight);
      var wht = parseInt(withholding_tax)/100 * parseInt(total_freight);
      var Cstm_Frt = parseInt(remaining_commission)/100 * parseInt(total_freight);

      $('#Total_Frt').html(isNaN(total_freight) ? 0 : total_freight.toFixed(2));
      $('#Cont_Comsn').html(isNaN(Cont_Comsn) ? 0 : Cont_Comsn.toFixed(2));
      $('#Comp_Comsn').html(isNaN(Comp_Comsn) ? 0 : Comp_Comsn.toFixed(2));
      $('#wht').html(isNaN(wht) ? 0 : wht.toFixed(2));
      $('#Cstm_Frt').html(isNaN(Cstm_Frt) ? 0 : Cstm_Frt.toFixed(2));

      
  });





});




</script>


<!-- add product ajax -->
<script>

    $(document).ready(function() { 
      $("#add_pro").on('click', function(e){
      var product_id = $("#product_id option:selected").val();
      var product_name = $("#product_id option:selected").text();
      var source_id = $("#source option:selected").val();
      var source_name = $("#source option:selected").text();
      var destination_id = $("#destination option:selected").val();
      var destination_name = $("#destination option:selected").text();
      var product_quantity = $("#product_quantity").val();
      var product_temperature = $("#product_temperature").val();
      var product_gravity = $("#product_gravity").val();
      var freight_rate = $("#freight_rate").val();
      var milli_start = $("#milli_start").val();



      var proInfo = "<tr><td><input type='hidden' class='proSource' name='source[]'  value='' >"+ source_name +"</td><td><input type='hidden' class='proDest' name='destination[]'  value='' >"+ destination_name +"</td><td><input type='hidden' id='proID' class='proID' name='product_id[]'  value=''>"+ product_name +"</td><td><input type='hidden' class='proQty' name='product_quantity[]'  value=''>"+ product_quantity +"</td><td><input type='hidden' class='proTemp' name='product_temperature[]'  value=''>"+ product_temperature +"</td><td><input type='hidden' class='proGrav' name='product_gravity[]'  value=''>"+ product_gravity +"</td><td><input type='hidden' class='proFret' name='freight_rate[]'  value=''>"+ freight_rate +"</td><td><input type='hidden' class='MilStr' name='milli_start[]'  value=''>"+ milli_start +"</td></tr>";


        $("#addpro").removeAttr('style');



          if (product_id == "" ) {
            alert("Please fill all fields");
          }else{

           $('#prod_info').append(proInfo);

          }
         
         if($('.proQty').length==$('#test').val()){
          $('.pview').hide();
         }


        $(".proID").val(product_id);
        $(".proSource").val(source_id);
        $(".proDest").val(destination_id);
        $(".proQty").val(product_quantity);
        $(".proTemp").val(product_temperature);
        $(".proGrav").val(product_gravity);
        $(".proFret").val(freight_rate);
        $(".MilStr").val(milli_start);

      
        $("#product_id").html("");
        $("#source").html("");
        $("#destination").html("");
        $("#product_quantity").val("");
        $("#product_temperature").val("");
        $("#product_gravity").val("");
        $("#freight_rate").val("");
        $("#milli_start").val("");



        $('#Total_Frt').html("");
        $('#Cont_Comsn').html("");
        $('#Comp_Comsn').html("");
        $('#wht').html("");
        $('#Cstm_Frt').html("");


        $("#trip_save").removeAttr('disabled');

    });

  });


  $(document).ready(function() {
    $('#myform').on('submit', function (e) {   
          console.log($("#proID").length);
        if($("#proID").length == 0){  
          alert("Please add atleat one product !");
          e.preventDefault();
        }
        // else{
        //   $(this).unbind('submit').submit();
        //   $(this).submit();
        // }


      });

  });


</script>



<script>

function ValidateNumberOnly()
{

if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 46  ) 
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
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              customer_id: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                company_id: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

            contractor_id: {
               trigger:'change  blur',
                validators: {
                    notEmpty: {
                        message: 'field  is required and cannot be empty'
                    }
                }
              },

               vehicle_id: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

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
                 filling_date: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                 filled_by: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              start_meter_reading: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },


             'driver[]': {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

            'helper[]': {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },



              // Add product

              source: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                destination: {
                   trigger:'change    blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              product_id: {
                   trigger:'change    blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
                product_quantity: {
                   trigger:'change blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
              product_temperature: {
                   trigger:'change keyup blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
               product_gravity: {
                   trigger:'change blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

              freight_rate: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },
             carriage_commission: {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

            'withholding_tax': {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                },

           'company_comission': {
                   trigger:'change  blur',
                    validators: {
                        notEmpty: {
                            message: 'field  is required and cannot be empty'
                        }
                    }
                }


            }
        });
});





</script>

<script>
//   $(document).on('keyup','#freight_rate',function(){
//     var freight=$(this).val();
//     var quantity=$(this).parent().parent().parent().find('.quantity').val();
// //    var price=$(this).parent().parent().parent().find('.price').val();
//     var remaining=$(this).parent().parent().parent().find('.remaining');
//     //console.log(remaining);
//     //console.log(freight,quantity,price);
//     remaining.val((parseFloat(quantity)*parseFloat(freight)*(100))/(100));
    
//   });
//   $(document).on('keyup','.quantity',function(){
//     var quantity=$(this).val();
//     var freight=$(this).parent().parent().parent().find('#freight_rate').val();
//     var price=$(this).parent().parent().parent().find('.price').val();
//     var remaining=$(this).parent().parent().parent().find('.remaining');
    
//     remaining.val((parseFloat(quantity)*parseFloat(freight)*(100))/(100));
    
//   });
// });



// $(document).ready(function() {
//   $(document).on('change','#pro',function(event) {
//      var id =  $(this).val();
//    var pro=$(this);

     
//     $.ajax({
//       url: '<?php echo base_url(); ?>Vehicle/get_productprice_by_id/'+id,
//       type: 'POST',
//       success:  function (response) {
//       var result = eval(response);
    
//     var price=pro.parent().parent().parent().find('.pro_info');
//     console.log(price);
//     pro_info = "<input type='hidden' class='price' value='"+result['price']+"' />";
//   //  pro_info = "<div><p>Product Price&nbsp <input type="text" /></p></div>"

//    price.html(pro_info);}
//     })
//   });
// });



   // $(document).ready(function(){
    //     $("#p").keyup(function(){
    //         alert($(this).val());
    //     });
    // })

</script>



<script>
$('.sel').select2({
      
     //selectOnClose: true,
     placeholder: "Select an option",
     allowClear:true

});


</script>






   