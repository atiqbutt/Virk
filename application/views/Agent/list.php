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
                  <a class="btn btn-success" href="<?php echo base_url(); ?>Defination/addagent" alt="View">
                    Add Agent </i>  
                  </a>
              </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Agent</h3>
               
               
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="agent" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>Sr#</th>
                                     <th>Agent Name</th>
                                    <th>Agent Number</th>
                                    <th>Agent Email</th>
                                     <th>Agent Cnic</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  
                                   
                </tr>
                </thead>
                <?php
                            if(!empty($agent))
                            {
                            $i=1;foreach($agent as $val){ ?>
                                <tr class="odd gradeX">
                               <td><?php echo $i++;?></td>
                
                                <td><?php echo $val["name"];?></td>
                                <td><?php echo $val["number"];?></td>
                                <td><?php echo $val["email"];?></td>
                                <td><?php echo $val["cnic"];?></td>
                                 <td>
                                     <a href="<?php echo base_url()?>Defination/status_agent/<?php echo $val['id'];?>">
                    <?php echo ($val['status']==0) ? "<img src='../assets/Images/2.png' width='20px'>":"<img src='../assets/Images/3.png' width='20px'>"?>
                   </a>
                                    
                                </td>
                                <td> 
                                    <?php
                                $st=$val['status'];
                                if($st==1)
                                {
                                  ?>
                             <a href="<?php echo base_url();?>Defination/eyeagent/<?php echo $val['id']; ?>"><i class="fa fa-eye"></i></a>
                                <?php
                              }
                              else{
                                ?>

                                  <a href="<?php echo base_url();?>Defination/eyeagent/<?php echo $val['id']; ?>"><i class="fa fa-eye"></i></a>
                                    
                                    <a href="<?php echo base_url();?>Defination/editagent/<?php echo $val['id']; ?>"><i class="fa fa-edit"></i>
                                    
                                    </a>
                                
                                <a href="<?php echo base_url();?>Defination/deleteagent/<?php echo $val['id']; ?>"><i class="fa fa-trash"></i>
                                <?php
                                     }
                                     ?>

                                
                                
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
        $('#agent').DataTable({
          dom: 'Bfrtip',
       buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                   columns: [ 0, 1, 2 ,3,4]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                  columns: [ 0, 1, 2 ,3,4]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                   columns: [ 0, 1, 2 ,3,4]
                }
            }
            
        ]
        });
          
         });


</script>

