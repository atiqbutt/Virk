 <!-- /.row -->
 <section class="content">
      <div class="row">
            <?php if ($this->session->flashdata('msg' )): ?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('msg'); ?>  
          </div>
          <?php endif; ?>
        <div class="col-xs-12">
          <div style="padding-left:0px;"  class="panel-heading">
                <a class="btn btn-success" href="<?php echo base_url(); ?>defination/addexpensetype" alt="View">
                    Add Expense Type</i>  
                  </a>
              </div>
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Expense</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="expense" class="users table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th> 
                          <th>Remarks</th>
                          <th>Status</th>
                         <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                          <?php 
                         $data=$this->db->where('is_delete',0)->get('expensetype')->result_array();
                        if(!empty($data))
                        {
                        $i=1;foreach ($data as $value)  { 
                            ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          
                          <td><?php echo $value['name']; ?></td>
                          <td><?php echo $value['remarks']; ?></td>
                          <td>
                     <a href="<?php echo base_url()?>Defination/status_expensetype1/<?php echo $value['id'];?>">
                    <?php echo ($value['status']==0) ? "<img src='../assets/Images/2.png' width='20px'>":"<img src='../assets/Images/3.png' width='20px'>"?>
                   </a>
                                    
                                </td>
                          
                          <td>
                            <?php 
                            if($value['status']==1)
                            {
                              ?>
                            
                            <a class="text-custom1" href="<?php echo base_url();?>Defination/expensetype_eye/<?php echo $value['id'];?>"><i class="fa fa-eye"></i></a>
                            <?php
                          }
                          else{
                            ?>
                            <a class="text-custom1" href="<?php echo base_url();?>Defination/expensetype_eye/<?php echo $value['id'];?>"><i class="fa fa-eye"></i></a>
                            <a href="<?php echo $base_url; ?>Defination/editexpensetype/<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a> 
                            <a href="<?php echo $base_url; ?>Defination/deleteexpensetype/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
                           <?php  
                          }
                          ?>
                          </td>
                        <?php
                      }
                    }
                           ?>


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
        $('#expense').DataTable({
          dom: 'Bfrtip',
      buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                   columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                   columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            }
            
        ]
        });
          
         });


</script>

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 