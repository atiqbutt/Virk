<footer class="main-footer" >
    <strong>Copyright &copy; 2017 <a href="http://softvilla.com.pk/">Softvilla Solutions</a>.</strong> All rights
    reserved.
  </footer>

</div>


<!-- MetisMenu CSS -->
<link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.1/css/buttons.dataTables.min.css">

<!-- datatable old version
<link href=".<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
-->



<!-- Morris Charts CSS 
<link href="<?php echo base_url(); ?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">-->

<!-- Custom Fonts -->
<link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


 
<!-- Form Validation libraries -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/formValidation.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/formstyles.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/calendar.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/uploadfilemulti.css'); ?>"/>
    
    <!-- data tables new js -->
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.1/js/dataTables.buttons.min.js"></script>
<!--<script src="//cdn.datatables.net/buttons/1.1.1/js/buttons.flash.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.1.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.1.1/js/buttons.print.min.js"></script>


<!--    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/highchart.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
    
<!-- FormValidation plugin and the class supports validating Bootstrap form -->
<script src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-form.min.js"></script>
  	<link rel="stylesheet" href="<?php echo base_url('assets/light/style.css'); ?>"> 
	<link rel="stylesheet" href="<?php echo base_url('assets/light/swipebox.css'); ?>">  
    
<!-- Form Validation libraries -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<script>
$(document).ready(function() {
    $('#example2').DataTable( {
       dom: 'Bfrtip',
       buttons: [
            'csv', 'excel', 'pdf', 'print'
       ], 
	   
       responsive: true,
            "pageLength": 25
    } );

 $('#example').DataTable( {
        dom: 'Bfrtip',
       buttons: [
            'csv', 'excel', 'pdf', 'print'
       ],
       responsive: true,
            "pageLength": 25
    } );
	
	} );

</script>
<script>
$(document).ready(function() {
    $('#mother').DataTable( {
        dom: 'Bfrtip',
       buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
       ],
       responsive: true,
         "order": [[ 3, "asc" ]],
            "pageLength": 25
    } );
} );

</script>



































































<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
 <script src="<?php echo base_url()?>assets/commonFormValidator.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url()?>assets/plugins/chartjs/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- 

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
rel="Stylesheet"type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
type="text/javascript"></script>
 -->



<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>


<!-- FLOT CHARTS -->
<script src="<?php echo base_url()?>assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url()?>assets/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url()?>assets/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url()?>assets/plugins/flot/jquery.flot.categories.min.js"></script>

<!-- Form Validator -->
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/bootstrapValidator.js"></script>

<!-- multiselect -->
<script src="<?php echo base_url()?>assets/plugins/multiselect/jquery.multiselect.js"></script>
 <!--
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
 
 <script src="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 -->


 <!-- DataTables CSS -->
<!-- recently comment<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
-->
<script>
         $(document).ready(function() {
        $('#example22').DataTable({
          dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
        });
          
         });


</script>
<script>
window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
  });
  }, 2000);
</script>


<script>
  $(function(){
    var url      = window.location.href;
    var active = $(".treeview-menu>li>a[href='"+url+"']");
    active.parent().addClass('active');
    active.parent().parent().parent().addClass('menu-open');
    active.parent().parent().css('display','block');
  });
</script>


<script>
$(document).ready(function(){
$('.langOpt').multiselect({
                columns: 1,
                placeholder: 'Select Option',
                selectAll: true,
                search: true
});

});


</script>

</body>
</html>














