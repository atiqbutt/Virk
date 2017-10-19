 <!-- /.row -->
 <section class="content">
      <div class="row">
	   <?php if ($this->session->flashdata('msg' )): ?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('msg'); ?>  
          </div>
          <?php endif; ?>
        <div class="col-xs-12">
             <div style="padding-left:0px;" class="panel-heading">
                  <a  class="btn btn-success"  href="<?php echo base_url();?>unit/add/">Add Units </a>
 
              </div>
          <div class="box col-sm-12">
            
            <div class="box-header" style="padding-top:25px" >
              <h2 class="box-title"><b>List Units</b></h2>
            </div>
             <p style="color:green;font-weight: bold;padding:10px;text-align: center"></p>
 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="unit" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th> Sr #</th>
                                    <th> Name</th>
                                    <th>Description</th>
                                    
                                    <th>Status</th>
                                     <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($unit))
                            {
                              $i=1;
                            foreach($unit as $amb){ ?>
                                <tr class="odd gradeX">
                                  <td><?php echo $i++;?></td>
                                <td><?php echo $amb["name"];?></td>


                                  
                                  <td><?php echo $amb["description"];?></td>
                            <td>
                                       
                                                <?php if ($amb["status"]=="0"){?>
                                                                      
<a class="text-custom1" href="<?php echo base_url();?>unit/states/<?php echo $amb['id'];?>">
  <img src="<?php echo base_url();?>assets/Images/2.png" width="20px" height="20px"></a>
                                              
                                        

                                    <?php } elseif($amb["status"]=="1") {?>
                                                   
                                                    <a class="text-custom1" href="<?php echo base_url();?>unit/active/<?php echo $amb['id'];?>"><img src="<?php echo base_url();?>assets/Images/3.png" width="20px" height="20px"></a>
                                                 
                                                 
                                       
                                    <?php } ?>
                                    
                                </td>
                      
                                    <td>
                                    
                                     <?php
                                $st=$amb['status'];
                                if($st==1)
                                {
                                  ?>                              
                                          
<?php
}
else{
  ?>

                                          <a class="text-custom1" href="<?php echo base_url();?>unit/edit/<?php echo $amb['id'];?>"><i class="fa fa-edit fa-1x"></i></a> 
               <a class="text-custom1" href="<?php echo base_url();?>unit/delete/<?php echo $amb['id'];?>"><i class="fa fa-trash fa-1x"></i></a>
                 <!--   <?php if ($amb["status"]=="0"){?>
                 <a class="text-custom1" href="<?php echo base_url();?>unit/states/<?php echo $amb['id'];?>"><i class="fa fa-times fa-1x"></i></a>
                   <?php } elseif($amb["status"]=="1") {?>
<a class="text-custom1" href="<?php echo base_url();?>unit/active/<?php echo $amb['id'];?>"><i class="fa fa-check fa-1x"></i></a>
        <?php } ?> -->
 <?php
}
?>
                               
                                </td>
                                          
                                 <?php } }?>
                            </tr>
                           

                           
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
 
 
 
 
 <script>
         $(document).ready(function() {
        $('#unit').DataTable({
          dom: 'Bfrtip',
       buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1,2]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                   columns: [ 0, 1,2]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                columns: [ 0, 1,2]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                 columns: [ 0, 1,2]
                }
            }
            
        ]
        });
          
         });


</script>


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 