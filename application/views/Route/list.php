<!-- /.row -->
  <!-- DataTables -->
 
 <section class="content">  
    <div class="row">
     <?php if ($this->session->flashdata('msg' )): ?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('msg'); ?>  
          </div>
          <?php endif; ?>
        <div class="col-lg-12">
           
              <div style="padding-left:0px;" class="panel-heading">
                  <a class="btn btn-success" href="<?php echo base_url(); ?>Defination/addroute" alt="View">
                    Add Route </i>  
                  </a>
              </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Route</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="route" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Product</th>
                    <th>Freight</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Type</th>
                    <th>Action</th>
                            
                </tr>
                </thead>
                <?php
                            if(!empty($route))
                            {
                            $i=1;foreach($route as $val){ ?>
                                <tr class="odd gradeX">
                               <td><?php echo $i++;?></td>
                
                                <td><?php echo $val["loc"];?></td>
                                <td><?php echo $val["destination"];?></td>
                                <td><?php echo $val["name"];?></td>
                                 <td><?php echo $val["freight"];?></td>
                                  <td><?php echo $val["fromdate"];?></td>
                                   
                                   <td><?php echo $val["todate"];?></td>
                                   <td><?php echo $val["type"];?></td>
                                <td> 
                                    <a href="<?php echo base_url();?>Defination/editroute/<?php echo $val['id']; ?>"><i class="fa fa-edit"></i>
                                    
                                    </a>
                                
                                <a href="<?php echo base_url();?>Defination/deleteroute/<?php echo $val['id']; ?>"><i class="fa fa-trash"></i>
                                
                                
                                
                                
                                </td>
                                
                               
                               
                            </tr>
                            <?php }
                            
                            
                            
                                    }?>
                           
                            </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col-lg-12 -->
    </div>
            
 </section>



 <script>
         $(document).ready(function() {
        $('#route').DataTable({
          dom: 'Bfrtip',
       buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5,6,7 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                   columns: [ 0, 1, 2 ,3,4,5,6,7]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                  columns: [ 0, 1, 2 ,3,4,5,6,7]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                   columns: [ 0, 1, 2 ,3,4,5,6,7]
                }
            }
            
        ]
        });
          
         });


</script>



 
 

  