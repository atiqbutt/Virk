 <!-- /.row -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div style="padding-left:0px;"  class="panel-heading">
                <a class="btn btn-success" href="<?php echo base_url(); ?>Commission/contractor_company" alt="View">
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
                          <th>company</th>
                          <th>Commission_1</th>
                          <th>W.H.T</th>
                          <th>Commission_3</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; foreach ($contractor_company as $value)  { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['contractor']; ?></td>
                          <td><?php echo $value['company']; ?></td>
                          <td><?php echo $value['commission_1']; ?></td>
                          <td><?php echo $value['withholding_tax']; ?></td>
                          <td><?php echo $value['commission_3']; ?></td>
                              
                          <td>
                           <!--  <a href="<?php echo $base_url; ?>Defination/edit_expense/<?php // echo $value['id']; ?>"><i class="fa fa-edit"></i></a>  -->
                            <a href="<?php echo $base_url; ?>Commission/delete_contractor_company/<?php echo $value['id']; ?>"><i class="fa fa-trash"></i></a>
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
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 