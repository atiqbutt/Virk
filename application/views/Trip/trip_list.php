 <style>
  aria-label{
  }
  .dataTable > thead > tr > th[class*="sort"]::after{display: none}
  .dataTable > thead > tr > th{ padding:0px; margin:0px;}
  .paddinglr{
  padding-left:3px !important; padding-right:15px !important; margin-left:0px !important;margin-right:0px !important;
  }
  td.special { border: 2px double red; }
</style> 


<section class="content">
     <div class="row">
      <div class="col-xs-12">

        <?php if ($this->session->flashdata('msg' )): ?>
        <div class="alert alert-success">
        <?php echo $this->session->flashdata('msg'); ?>  
        </div>
        <?php endif; ?>

          <div style="padding-left:0px;" class="panel-heading">
              <a  class="btn btn-success"  href="<?php echo base_url();?>Trip/add_trip/">Add Trip </a>
          </div>


          <div class=" box col-sm-12" style="padding-top:20px">
              <ul class="nav nav-tabs">
              <li class="active"><a  href="<?php echo base_url();?>Trip/index/">All Trips</a></li>
                <li><a href="#" onclick="getdata('Self-Long')" >Self Long</a></li>
                <li><a href="#" onclick="getdata('Self-Short')" >Self Short</a></li>
                <li><a href="#" onclick="getdata('General-Long')">General Long</a></li>
                <li><a href="#" onclick="getdata('General-Short')">General Short</a></li>
              </ul>           
      		    <div class="box-header" >
                    <h3 class="box-title">List Trip</h3>
                  </div>

            <!-- /.box-header -->
            <div class="table-responsive box-body data">
              <table aria-label="Type:  to sort column ascending" id="example2" class="table table-bordered table-hover">
                <thead  style="font-size:12px; padding:0px ; margin:0px;">
                <tr class="paddinglr">
                    <th class="paddinglr">Id</th>  
                    <th class="paddinglr">Type</th>
          					<th class="paddinglr">Company</th>
          					<th class="paddinglr">Contractor</th>
          					<th class="paddinglr">Source</th>
                    <th class="paddinglr">Filling Date</th> 
                     <th class="paddinglr">Meter Reading</th>
                    <th class="paddinglr">Vehicle</th>
                    <th class="paddinglr">Product</th>                    
                    <th class="paddinglr">Temperature</th>
          					<th class="paddinglr">Quantity</th>					
                    <th class="paddinglr">Freight Rate</th>
                    <th class="paddinglr">Carriage Commission</th> 
                    <th class="paddinglr">W.H.T</th> 
                  <th class="paddinglr">Gravity</th>
                     <th class="paddinglr">Remaining Commission</th>
                    <th class="paddinglr">Service Charges</th>
       			
				            <th class="paddinglr">Expense</th>
               </tr>
            </thead>
            <tbody id="all_trips" style="font-size:12px;">
            <?php
            if(!empty($tripmanagement)){
            foreach($tripmanagement as $amb){ 

               if($amb['stn_no'] == "" || $amb['tracking_report'] == "" || $amb['IsExpenseAdded'] == 0){ ?>
                <tr class="odd gradeX" style="background: #ff7f7f" >
                <?php }else {?>
                <tr class="odd gradeX" style="background: #98FB98">
                <?php } ?>
                <?php if ($amb['status'] == 1){ ?>
                   <td><a href="<?php echo base_url();?>Trip/closed_trip/<?php echo $amb["id"];?>"><?php echo $amb["id"];?></a></td>
                <?php }else{ ?>
                  <td><a href="<?php echo base_url();?>Trip/close_trip/<?php echo $amb["id"];?>"><?php echo $amb["id"];?></a></td>
                   <?php } ?>
              <td> <?php echo $amb["type"];?>  </td>
              <td> <?php echo $amb["comname"];?>  </td>
              <td> <?php echo $amb["conname"];?>  </td>
              <td> <?php echo $amb["source"];?>  </td>

              <td> <?php $newDate = date("d/m/Y", strtotime($amb["filling_date"]));
              echo $newDate;?> 
              </td>
              <td> <?php echo $amb["start_meter_reading"];?> </td>
              <td> <?php echo $amb["vehicleregisterationno"];?> </td>
              <td> 
                <table>
                  <?php foreach ($amb['trip_products'] as $value){ ?>
                    
                   
                  <tr>
                     <td class="special"><?php echo $value['heading'] ?> </td>
                  </tr> 

                  <?php } ?>

                </table>
              </td>

              <td>
                  <table>
                  <?php foreach ($amb['trip_products'] as $value){ ?>
                    
                   
                  <tr>
                     <td class="special"><?php echo $value['product_temperature'] ?> </td>
                  </tr> 

                  <?php } ?>

                </table>

              </td>
              <!-- <td> <?php echo $amb["temperature"];?> </td> -->
               <td>
                  <table>
                  <?php foreach ($amb['trip_products'] as $value){ ?>
                    
                   
                  <tr>
                     <td class="special"><?php echo $value['product_quantity'] ?> </td>
                  </tr> 

                  <?php } ?>

                </table>

              </td>

              <td>
                  <table>
                  <?php foreach ($amb['trip_products'] as $value){ ?>
                    
                   
                  <tr>
                     <td class="special"><?php echo $value['freight_rate'] ?> </td>
                  </tr> 

                  <?php } ?>

                </table>

              </td>

                <td>
                  <table>
                  <?php foreach ($amb['trip_products'] as $value){ ?>
                    
                   
                  <tr>
                     <td class="special"><?php echo $value['carriage_commission'] ?> </td>
                  </tr> 

                  <?php } ?>

                </table>

              </td>
                 <td>
                  <table>
                  <?php foreach ($amb['trip_products'] as $value){ ?>
                    
                   
                  <tr>
                     <td class="special"><?php echo $value['withholding_tax'] ?> </td>
                  </tr> 

                  <?php } ?>

                </table>

              </td>


             
             
            <!--   <td> <?php echo $amb["carriage"];?> </td> -->

           <!--    <td> <?php echo $amb["withholdingtax"];?> </td> -->
            <td>
                  <table>
                  <?php foreach ($amb['trip_products'] as $value){ ?>
                    
                   
                  <tr>
                     <td class="special"><?php echo $value['product_gravity'] ?> </td>
                  </tr> 

                  <?php } ?>

                </table>

              </td>


             <!--  <td> <?php echo $amb["gravity"];?> </td> -->
              <td>
                  <table>
                  <?php foreach ($amb['trip_products'] as $value){ ?>
                    
                   
                  <tr>
                     <td class="special"><?php echo $value['remaining_commission'] ?> </td>
                  </tr> 

                  <?php } ?>

                </table>

              </td>


        			<!-- 	<td> <?php echo $amb["remaining_commission"];?> </td> -->
        				<td> <?php echo $amb["servicecharges"];?></td>
                <td style="width:100px"><a href="<?php echo base_url()?>Trip/edit_trip/<?php echo $amb['id'];?>"><i class="fa fa-eye"></i></a></td>
                </tr>
	         <?php  } }?>
                           
                  </tbody>
              </table>
         </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>
 

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 
 
 
 
<script>
  
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#add_helper"); //Fields wrapper
    var add_button      = $("#addhelper"); //Add button ID
    
    var x = 1; //initlal text box count
    /*$("#addhelper").click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
                     $(wrapper).append('<div class="form-group"><div class="col-md-10"><label>Expense Type</label><select class="form-control" name="expensetype_id[]" required><option value="">Select Options</option><?php if(!empty($expensetype)){  foreach ($expensetype as $e){  ?><option value="<?php  echo  $e["id"];?>"   ><?php  echo  $e["name"];?></option><?php }} ?></select><div class="col-md-12"><label>Expense Amount</label><input name="amount[]" type="text" class="form-control"></div></div><div class="col-md-2"><button  style="margin-top: 30px" id="helper"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
            //add input box
        }
    });
    
    $(wrapper).on("click","#helper", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })*/
	
	
});
 function getdata(type){
  $.ajax({
  method: "POST",
  url: "<?php echo base_url();?>Trip/get_data/"+type,
/*  data: { type1: type },*/
  success: function(data) {

 $("#example2").dataTable().fnDestroy();
                  setTimeout(function(){ 
                  $("tbody#all_trips").html(data); 
                       $("#example2").DataTable({
                      dom: 'Blftipr',
                      "bPaginate":true,
                      "paging":   false,
                      "ordering": false,
                      "info":     true,
                      responsive: true,
                        buttons: [
                            'csv',
                            'excel',
                            'pdf',
                             {text:'Print',exportOptions:{columns:[0,1,2,3,4,5,6,7,8]},action:function() {var win = window.open('<?php echo base_url() ?>Report/FieldStaff_individual_report_print/'+date+'/'+office+'/'+salesman, '_blank');
                win.focus();}}
                        ]
              });
            }, 25);


   /* $('#example2').DataTable({
          dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
        });*/
              // $(".data").html(data);
            }
});
 }


$(document).ready(function(){
 $('#addhelper').click(function(e){
  e.preventDefault();
    var a=$('#expense').val();
    var t=$('#expense option:selected').text();
        var id=$('#expense option:selected').val();


  var ht='<div class="col-md-10">'+
  '<label>Expense Type</label><input name="expensetype[]" value="'+t+'" type="text" class="form-control"><input type="hidden" name="expensetype_id[]" value="'+id+'" type="text" class="form-control">'+'</div>'
  +'<div class="col-md-10">'+
  '<label>Expense Amount</label><input name="amount[]" type="text" class="form-control">'+'</div>'+
   '<div class="col-md-6">'+'<td><a href="javascript:void(0);" id="remove" class="rem">X</a></td>';
$('#add_helpr').append(ht);
 });
});

$('.rem').on('click',function(){

  $(this).parent().parent().parent().parent().parent().remove();
});
 </script>
 
 
 
 
 
 