// <script>
// $(document).ready(function() {
//     var max_fields      = 10; //maximum input boxes allowed
//     var wrapper         = $(".input_fields_wrap"); //Fields wrapper
//     var add_button      = $(".add_field_button"); //Add button ID
   
//     var x = 1; //initlal text box count
//     $(add_button).click(function(e){ //on add input button click
//         e.preventDefault();
//         if(x < max_fields){ //max input box allowed
//              x++; //text box increment8
//              $(wrapper).append('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class=""></span></label><div class="col-md-6"><div class="row"><div class="col-md-10"><input class="form-control" type="text" placeholder="Phone" onkeypress="return ValidateNumberOnly()" name="phone[]" ></div><div class="col-md-2"><button class="btn btn-default remove_field"><span class=" fa fa-minus ko"></span></button></div></div></div></div>'); //add input box
//             var field=$( "input[name='phone[]']" ).last();
//             $('#shippingForm').bootstrapValidator('addField', field);
//         }
//     });
    
//      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
//         e.preventDefault(); $(this).parent().parent().parent().parent().remove(); x--;
//     })
// });
// </script>

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
              <h3 class="box-title">Manage Expense</h3>
            </div>
            <!-- /.box-header -->
              <form class="form-horizontal" id="shippingForm" action="<?php echo base_url()?>Trip/expenseadd" method="post"> 
            <div class="box-body">
              <div class="col-md-8">
                   
                      
                    <div class=" form-group">    
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Expense Type <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control sel" name="expense[]" id="expense">
                               <option value="">Select Options</option>
                                <?php if(!empty($expensetype)){
                                              foreach ($expensetype as $e){?>      
                                              <option value="<?php echo $e["id"];?>"><?php echo $e["name"];?></option> 
                                              <?php }} ?>       
                                 
                                </option>               
                            </select> 
                          </div>
                           <div class="col-lg-2">
                               <button type="button" class="btn btn-default add_field_button"><i class="fa fa-plus"></i></button>
                    
                    </div>
                      </div>


              <input type="hidden" name="idt" value="<?php echo $tripmanagement->id?>">
                       <div class=" form-group">    
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Paye <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control sel" name="driver[]" id="driver">
                               <option value="">Select Options</option>
                                <?php if(!empty($tri)){
                                              foreach ($tri as $e){  
                                               ?>
                                              <option value="<?php echo $e["id"];?>"><?php echo $e["name"];?></option>               
                                              <?php }} ?>    
                                              </select> 
                          </div>
                           
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Amount <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="amount[]" class="form-control" id="amount" onkeypress='return ValidateNumberOnly()' placeholder="Amount">
                        </div>
                      </div>


              

                <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input class="btn btn-success" id="sub" type="submit" name="register" value="Submit" />
                         
                          <a type="submit" name="register" href='<?php echo base_url()?>Trip/index' class="btn btn-danger">Cancel</a>
            
                        </div>
                      </div>
                

                </div>
                  <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Expense</th>
                    <th>Paye</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                
                <tbody class="bilal">
              </table>
   
            </div>
           
                  </div>
 </form>

                       
                   
        <!-- panel-body -->
        

     

               
   <table class="table table-striped table-hover">
  <thead>
    <tr>
      
      <th>id</th>
      <th>Paye</th>
      <th>Amount</th>
       <th>Expense</th>
     
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trip as $value) {
?>
      <tr>
     
      <td><?php echo $value['idd']?></td>
      <td><?php echo $value['name']?></td>
       <td><?php echo $value['am']?></td>
        <td><?php echo $value['exn']?></td>
     
    </tr>
    <?php
  }
  ?>
  </tbody>
</table> 

         
                     
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>
 
 
 
 
 

<script type="text/javascript">
     
$("#zzz").click(function(){
   $('#shippingForm').bootstrapValidator("resetForm",true);    
});

</script>

<script type="text/javascript">

$(document).ready(function(){
 $('.add_field_button').click(function(e){
 
    var a=$('#expense').val();
    var t=$('#expense option:selected').text();
    var id=$('#expense option:selected').val();
    var amo=$('#amount').val();


     var b=$('#driver').val();
    var c=$('#driver option:selected').text();
    var idd=$('#driver option:selected').val();
    if(a=='' || b=='' || amo=='')
    {
      alert('fill the field');
      return false;
    }

     var wrapper = $(".bilal");
      var row ='<tr class="row_table">'
                   
                     +'<td><input type="text" class="form-control" value="'+t+'" readonly><input type="hidden" name="expense[]" value="'+id+'" type="text" class="form-control"></td>'+
           '<td>'
                      +'<input type="text"  class="form-control" value="'+c+'" readonly><input type="hidden" name="driver[]" value="'+idd+'" type="text" class="form-control">'
                    +'</td>'
                    +'<td>'
                        +'<input type="text" name="amount[]" readonly class="form-control" value="'+amo+'" onkeypress="return ValidateNumberOnly()" placeholder="Amount">'
                    +'</td>';
                     wrapper.append(row);
                    
                     $('#expense').val("").change();
                     $('#driver').val("").change();
                      $('#amount').val("");


 });
});

$('#sub').click(function(){
  var a=$('#expense').val();
    var t=$('#expense option:selected').text();
    var id=$('#expense option:selected').val();
    var amo=$('#amount').val();


    var b=$('#driver').val();
    var c=$('#driver option:selected').text();
    var idd=$('#driver option:selected').val();
    if(a=='' || b=='' || amo=='')
    {
      alert('fill the field');
      return false;
    }
                   
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





<script>
$('.sel').select2({
   placeholder: "Select an option",
   

});
</script>