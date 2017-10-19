<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">


<script type="text/javascript">

$(document).ready(function() {
    $('#location').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            }
            
        ]
    } );
} );
</script>


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
                <a class="btn btn-success" href="<?php echo base_url(); ?>defination/addlocationtypetype" alt="View">
                    Add Location</i>  
                  </a>
              </div>
          <div class="box col-sm-12">
            <div class="box-header" >
              <h3 class="box-title">Location</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="location" class=" table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Remarks</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                          <?php 
                         $data=$this->db->where('is_delete',0)->get('locationtype')->result_array();
                        if(!empty($data))
                        {
                        $i=1;foreach ($data as $value)  { 
                            ?>
                        <tr>
                          <td><?php echo $i++; ?></td>                          
                          <td><?php echo $value['name']; ?></td>
                          <td><?php echo $value['remarks']; ?></td>
                          
                          <td>
						
                            <a href="<?php echo $base_url; ?>Defination/editlocationtype/<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a>  
                            <a href="<?php echo $base_url; ?>Defination/deletelocationtype/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
                          </td>
                           <?php  
                          }
                             }
                            
                          else{
                                 echo '';    
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
        $('#location').DataTable({
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

