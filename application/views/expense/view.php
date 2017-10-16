 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div style="padding-left:0px;"  class="panel-heading">
                <a class="btn btn-success" href="<?php echo base_url(); ?>defination/add_expense" alt="View">
                    Add Expense</i>  
                  </a>
              </div>
          <div class="box col-sm-3">
            <div class="box-header" >
              <h3 class="box-title">Expense</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="users table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                          <th>Title</th>
                          <th>Amount</th>
                          <th>Payee</th>
                          <th>Remarks</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php //var_dump($office); die;?>
                        <?php $i=1; foreach ($expense as $value)  { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['date']; ?></td>
                          <td><?php echo $value['title']; ?></td>
                          <td><?php echo $value['amount']; ?></td>
                          <td><?php echo $value['payee']; ?></td>
                          <td><?php echo $value['remarks']; ?></td>
                          
                          <td>
                            <a href="<?php echo $base_url; ?>Defination/edit_expense/<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></a> 
                            <a href="<?php echo $base_url; ?>Defination/delete_expense/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
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
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 