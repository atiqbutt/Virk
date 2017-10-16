
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
              <h3 class="box-title">Add Location</h3>
            </div>
          
          
          
          
          
          
          
          
          
<!-- <div class="custom"  >
    <LINK REL=StyleSheet HREF="http://mondeca.com/mdc_css/weather.css" TYPE="text/css">
 -->

 <script>
      function test11(){
 /*       var f2 = document.getElementById("input");
        var f1 = document.getElementById("input2");
        var f3 = document.getElementById("input3");
         var f4 = document.getElementById("input4");
          var f5 = document.getElementById("input5");
          var f6 = document.getElementById("input6");
   */     //f2.value = f1.value + f3.value+ f4.value+ f5.value;
     //   f1.value = f6.value +" "+ f5.value +" "+ f4.value+" "+ f3.value+" "+ f2.value;
//	 document.getElementById('ad')= document.getElementById("a").value;;
      }
    </script>
                

<div class="col-md-6">
 <form  enctype="multipart/form-data" id="shippingForm" method="post" action="<?php echo base_url()?>Defination/savelocationtype" >
      <div class="item form-group col-lg-12" style="margin-bottom:10px;">
        <div class="col-lg-3">Title</div>
           <div class="col-lg-9">
                  <input type="name" name="name" class="form-control"  placeholder="Title" >
           </div>       
      </div>
      	
      <div class="item form-group  col-lg-12">
        <div class="col-lg-3">Remarks</div>
               <div class="col-lg-9">
                <input type="address" name="remarks" class="form-control"  placeholder="remarks" >
               </div>
        </div>
 
          <div class="form-group">
            <div class="col-md-offset-3" style="padding-left: 20px">
              <input class="btn btn-success" type="submit" name="register" value="Submit" />
              <input id="zzz" class="btn btn-warning" type="reset" name="reset" value="Reset" />
              <a type="submit" name="register" href='<?php echo base_url()?>Defination/view_locationtype'; class="btn btn-danger">Cancel</a>

          </div>

        </form>
</div>

          
         
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

 
<script type="text/javascript">

function ValidateNumberOnly()
{
if ((event.keyCode < 48 || event.keyCode > 57)) 
{
   event.returnValue = false;
}
}

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
                                message: 'The Title field is required'
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
      
    function test(){
      var f1 = document.getElementById("input2");
      var f2 = document.getElementById("username_input2");
      f2.value = f1.value;
    }
  </script>
 
<span  id="ad"></span>          




			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
     
<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.1.1/js/buttons.flash.min.js"></script>

    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/aetrade_favicon.png'); ?>">

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.1/css/buttons.dataTables.min.css">   
    <!-- Bootstrap -->
    
  
    
    <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<!-- DataTables CSS -->
<link href=".<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<!-- Custom CSS -->


<!-- Timeline CSS -->
<link href="<?php echo base_url(); ?>assets/css/timeline.css" rel="stylesheet">


<!-- Morris Charts CSS 
<link href="<?php echo base_url(); ?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">-->

<!-- Custom Fonts -->
<link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
    
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!--    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-form.min.js"></script>
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--;hou;ouhil-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    
     
    
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- data tables new js -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>



<!--    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/highchart.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-form.min.js"></script>
   
<!-- Form Validation libraries -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
   