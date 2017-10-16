 <!-- /.row -->


 <style>
       aria-label{
         
         
       }
       .dataTable > thead > tr > th[class*="sort"]::after{display: none}
       .dataTable > thead > tr > th{ padding:0px; margin:0px;}
       .paddinglr{
         padding-left:3px !important; padding-right:3px !important; margin-left:0px !important;margin-right:0px !important;
       }
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
  <li ><a  href="<?php echo base_url();?>Trip/index/">All Trips</a></li>
  <li><a href="<?php echo base_url();?>Trip/self_long/">Self Long</a></li>
  <li><a href="<?php echo base_url();?>Trip/self_long/">Self Short</a></li>
  <li class="active"><a href="<?php echo base_url();?>Trip/general_long/">General Long</a></li>
  <li><a href="<?php echo base_url();?>Trip/general_short/">General Short</a></li>
 
</ul>           
		   <div class="box-header" >
              <h3 class="box-title">List Trip</h3>
            </div>
           
            <!-- /.box-header -->
            <div class="table-responsive box-body">
              <table aria-label="Type:  to sort column ascending" id="example2" class="table table-bordered table-hover">
                <thead  style="font-size:10px; padding:0px; margin:0px;">
                <tr class="paddinglr0">
                    <th class="paddinglr">Id</th>  
                    <th class="paddinglr">Type</th>
					<th class="paddinglr">Product Nmae</th>
					 <th class="paddinglr">Company Name</th>
					  <th class="paddinglr">Contractor Name</th>
					<th class="paddinglr">Source</th>
                    <th class="paddinglr">Date Filling</th>                     
                    <th class="paddinglr">Temperature</th>
                    <th class="paddinglr">Meter Reading</th>
					<th class="paddinglr">Gravity</th>
					<th class="paddinglr">Vehicle</th>
					<th class="paddinglr">Quantity</th>					
                    <th class="paddinglr">Freight Rate</th>
                    <th class="paddinglr">Carriage Commission</th> 
                    <th class="paddinglr">W.H.T</th> 
					<th class="paddinglr">Remaining Commission</th>
					<th class="paddinglr">Service Charges</th>
                    <th class="paddinglr">Status</th>
                     <th class="paddinglr">Action</th> 
                  
               </tr>
            </thead>
            <tbody style="font-size:8px;">
            <?php
            if(!empty($tripmanagement)){
            foreach($tripmanagement as $amb){ 
               ?>
                <tr class="odd gradeX">
                <td>  <?php echo $amb["id"];?>  </td>
                <td>  <?php echo $amb["type"];?>  </td>
				 <td>  <?php echo $amb["productname"];?>  </td>
				<td>  <?php echo $amb["comname"];?>  </td>
				<td>  <?php echo $amb["conname"];?>  </td>
				<td>  <?php echo $amb["source"];?>  </td>
                <td>  <?php echo $amb["filling_date"];?> </td>
                <td> <?php echo $amb["temperature"];?> </td>
                <td> <?php echo $amb["meter_reading"];?> </td>
				<td> <?php echo $amb["gravity"];?> </td>
                <td> <?php echo $amb["vehicleregisterationno"];?> </td>
				<td> <?php echo $amb["quantity"];?> </td>
                <td> <?php echo $amb["freight_rate"];?> </td>
                <td> <?php echo $amb["carriage"];?> </td>
                <td> <?php echo $amb["withholdingtax"];?> </td>
				<td> <?php echo $amb["remaining_commission"];?> </td>
				<td> <?php echo $amb["servicecharges"];?> </td>
				
                     <td>
                    <?php if ($amb["status"]=="0"){?>                  
                    <a style="font-size:18px;" class="text-custom1" href="<?php echo base_url();?>trip/states/<?php echo $amb['id'];?>">
                    <i class="fa fa-check"></i></a>
                    <?php } elseif($amb["status"]=="1") {?>

                    <a class="text-custom1" href="<?php echo base_url();?>trip/active/<?php echo $amb['id'];?>">
          <i class="fa fa-window-close-o" aria-hidden="true"></i>
          </a>
                    <?php } ?>
                                 
                 </td>

                     
                  <td>

                    <a style="font-size:18px;" href="<?php echo base_url();?>trip/close_trip/<?php echo $amb['id'];?>"><i class="fa fa-window-close" aria-hidden="true"></i></a> 
                  </td>

               
<!--<td>

<div  class="" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">
               <a>   <i  style="font-size:18px; color:#3C8DBC;" class="fa fa-flask" aria-hidden="true"></i></a>
</div>
					</td>
-->

            </tr>


 			 
 
			
			
			
            <?php } }?>

                           
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
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
 
 
 
 
 
 

 
 
 
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
                     $(wrapper).append('<div class="form-group"><div class="col-md-10"><label>Expense Type</label><select class="form-control" name="expensetype_id[]" required><option value="">Select Options</option><?php if(!empty($expensetype)){  foreach ($expensetype as $e){  ?><option value="<?php  echo  $e["id"];?>"   ><?php  echo  $e["name"];?></option><?php }} ?></select><div class="col-md-12"><label>Expense Amount</label><input name="amount[]" type="text" class="form-control"></div></div><div class="col-md-2"><button  style="margin-top: 30px" id="helper"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); 
            //add input box
        }
    });
    
    $(wrapper).on("click","#helper", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
	
	
});





</script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 