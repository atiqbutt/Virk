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
                  <a class="btn btn-success" href="<?php echo base_url(); ?>Defination/addhelper" alt="View">
                    Add Helper </i>  
                  </a>
              </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Helper</h3>
              
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="helper" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>Sr#</th>
                                    <th>Helper Name</th>
                                    <th>Helper Number</th>
                                    <th>Date Of Joining</th>
                                    <th>Helper CNIC</th>
                                    <th>Status</th>
                                     <th>Action</th>
                                   
                </tr>
                </thead>
                <?php
                            if(!empty($helper))
                            {
                            $i=1;foreach($helper as $val){ ?>
                                <tr class="odd gradeX">
                               <td><?php echo $i++;?></td>
                
                                <td><?php echo $val["name"];?></td>
                                <td><?php echo $val["number"];?></td>
                                <td><?php echo $val["doj"];?></td>
                                <td><?php echo $val["cnic"];?></td>
                                
                               
                                <td>
                                     <a href="<?php echo base_url()?>Defination/status_helper/<?php echo $val['id'];?>">
                    <?php echo ($val['status']==0) ? "<img src='../assets/Images/2.png' width='20px'>":"<img src='../assets/Images/3.png' width='20px'>"?>
                   </a>
                                    
                                </td>
                                <td>
                                <?php
                                $st=$val['status'];
                                if($st==1)
                                {
                                  ?>
                                    <a href="<?php echo base_url();?>Defination/eyehelper/<?php echo $val['id']; ?>"><i class="fa fa-eye"></i></a>
                                      <?php
                                    }
                                    else{
                                      ?>
                                    

                                <a href="<?php echo base_url();?>Defination/eyehelper/<?php echo $val['id']; ?>"><i class="fa fa-eye"></i></a>
                                    
                                    <a href="<?php echo base_url();?>Defination/edithelper/<?php echo $val['id']; ?>"><i class="fa fa-edit"></i>
                                    
                                    </a>
                                
                                <a href="<?php echo base_url();?>Defination/deletehelper/<?php echo $val['id']; ?>"><i class="fa fa-trash"></i>
                                
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
        $('#helper').DataTable({
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
                  columns: [ 0, 1, 2,3,4]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                 columns: [ 0, 1, 2,3,4]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                  columns: [ 0, 1, 2,3,4]
                }
            }
            
        ]
        });
          
         });


</script>



 