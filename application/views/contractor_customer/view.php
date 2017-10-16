 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <div style="padding-left:0px;"  class="panel-heading">
                <a class="btn btn-success" href="<?php echo base_url(); ?>Commission/contractor_customer" alt="View">
                    Make Deal</i>  
                  </a>
              </div> 
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="users table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Contractor</th>
                          <th>Customer</th>
                          <th>Freight Commission</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; foreach ($contractor_customer as $value)  { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['contractor']; ?></td>
                          <td><?php echo $value['customer']; ?></td>
                          <td><?php echo $value['freight_commission']; ?></td>
                        
                          
                          <td>
                            <!-- <a href="<?php echo $base_url; ?>Defination/edit_expense/<?php //echo $value['id']; ?>"><i class="fa fa-edit"></i></a>  -->
                            <a href="<?php echo $base_url; ?>Commission/delete_contractor_customer/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
                          </td>
                           <?php } ?>
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
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 