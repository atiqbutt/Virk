 <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
             <?php if ($this->session->flashdata('msg' )): ?>
          <div class="alert alert-success">
          <?php echo $this->session->flashdata('msg'); ?>  
          </div>
         <?php endif; ?>
        
               <div style="padding-left:0px;" class="panel-heading">
                  <a  class="btn btn-success"  href="<?php echo base_url();?>Vehicle/add_Vehicle_states">Add Vehicle Status</a>
 
              </div>
          <div class="box col-sm-3" >
            
            <div class="box-header" style="padding-top:25px" >
              <h3 class="box-title"><b>List Vehicle Status</b></h3>
            </div>
             
 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="vehiclestatus" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Sr #</th>
                                    <th> Name</th>
                                    <th> status</th>
                                    <th>Action</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($vehiclestatus))
                            {
                              $i=1;
                            foreach($vehiclestatus as $amb){ ?>
                                <tr class="odd gradeX">
                                <td><?php echo $i++;?></td>   
                                <td><?php echo $amb["heading"];?></td>
                           
                                 <td>

  <?php if ($amb["status"]=="0"){?>
                                                                      
<a class="text-custom1" href="<?php echo base_url();?>Vehicle/List_states/<?php echo $amb['id'];?>">
  <img src="<?php echo base_url();?>assets/Images/2.png" width="20px" height="20px"></a>
                                              
                                        

                                    <?php } elseif($amb["status"]=="1") {?>
                                                   
                                                    <a class="text-custom1" href="<?php echo base_url();?>Vehicle/List_active/<?php echo $amb['id'];?>"><img src="<?php echo base_url();?>assets/Images/3.png" width="20px" height="20px"></a>
                                                 
                                                 
                                       
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

                                           <a class="text-custom1" href="<?php echo base_url();?>Vehicle/List_edit/<?php echo $amb['id'];?>"><i class="fa fa-edit fa-1x"></i></a> 
               <a class="text-custom1" href="<?php echo base_url();?>Vehicle/List_delete/<?php echo $amb['id'];?>"><i class="fa fa-trash fa-1x"></i></a>
              <?php
            }
            ?>
                                </td>


                                
                            </tr>
                            <?php } }?>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
            
 </section>

 
 
 
 
 <script>
         $(document).ready(function() {
        $('#vehiclestatus').DataTable({
          dom: 'Bfrtip',
       buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                   columns: [ 0, 1]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                 columns: [ 0, 1]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                   columns: [ 0, 1]
                }
            }
            
        ]
        });
          
         });


</script>


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 