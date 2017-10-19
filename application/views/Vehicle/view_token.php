 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div style="padding-left:0px;"  class="panel-heading">
                <a class="btn btn-success" href="<?php echo base_url(); ?>Vehicle/add_token" alt="View">
                    Add Token</i>  
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
                          <th>Vechile</th>
                          <th>Token</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Notification Date</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; foreach ($tokens as $value)  { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['vehicle']; ?></td>
                          <td><?php echo $value['token']; ?></td>
                          <td><?php echo $value['start_date']; ?></td>
                          <td><?php echo $value['end_date']; ?></td>
                          <td><?php echo $value['notification_date']; ?></td>
                              
                         <!--  <td> -->
                           <!--  <a href="<?php //echo $base_url; ?>Defination/edit_expense/<?php // echo $value['id']; ?>"><i class="fa fa-edit"></i></a>  -->
                            <!-- a href="<?php //echo $base_url; ?>Commission/delete_contractor_company/<?php //echo $value['id']; ?>"><i class="fa fa-trash"></i></a> -->
                          <!-- </td> -->
                           <!-- <?php } ?> -->
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
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 