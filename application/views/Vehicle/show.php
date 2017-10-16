 <!-- /.row -->
  <!-- DataTables -->
 
 <section class="content">  
    <div class="row">
        <div class="col-lg-12">
             <?php if ($this->session->flashdata('msg' )): ?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('msg'); ?>  
          </div>
          <?php endif; ?>

   <?php if ($this->session->flashdata('error' )): ?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('error'); ?>  
          </div>
          <?php endif; ?>
          


          
              <div style="padding-left:0px;"  class="panel-heading">
                  <a class="btn btn-success" href="<?php echo base_url(); ?>Vehicle/add_vehicle" alt="View">
                    Add Vehicle </i>  
                  </a>
              </div>
 
          <div class="box">
            <div class="box-header" style="padding-top:25px">
              <h3 class="box-title"><b>List Vehicles</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                                  
                  <th> Registeration No#</th>
                  <th> Total Fuel Capacity</th>
                  <th> Color</th>
                  <th> Model</th>
                  <th> Company</th>
                  <th> Status</th>
                  <th>Action</th>
                                   
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehicles as $value) { ?>
                      
                    <tr>
                      <td><?php echo $value["registerationno"];?></td>
                      <td><?php echo $value["tot"];?></td>
                      <td><?php echo $value["color"];?></td>
                      <td><?php echo $value["model"];?></td>
                      <td><?php echo $value["company"];?></td>
                       <td>

  <?php if ($value["vehstat"]=="0"){?>
                                                                      
<a class="text-custom1" href="<?php echo base_url();?>Vehicle/List_showstates/<?php echo $value['id'];?>">
  <img src="<?php echo base_url();?>assets/Images/2.png" width="20px" height="20px"></a>
                                              
                                        

                                    <?php } elseif($value["vehstat"]=="1") {?>
                                                   
                                                    <a class="text-custom1" href="<?php echo base_url();?>Vehicle/List_showactive/<?php echo $value['id'];?>"><img src="<?php echo base_url();?>assets/Images/3.png" width="20px" height="20px"></a>
                                                 
                                                 
                                       
                                    <?php } ?>

                                 </td>
                      <td>
                        <?php

                        if($value['vehstat']==1)
                        {

                          ?>
                          <a class="text-custom1" href="<?php echo base_url();?>Vehicle/Vehicle_eye/<?php echo $value['id'];?>"><i class="fa fa-eye"></i></a>
                          <?php
                        }
                        else
                        {
                          ?>
                          <a class="text-custom1" href="<?php echo base_url();?>Vehicle/Vehicle_eye/<?php echo $value['id'];?>"><i class="fa fa-eye"></i></a>
                        
                      <a class="text-custom1" href="<?php echo base_url();?>Vehicle/edit_vehicle_show/<?php echo $value['id'];?>"><i class="fa fa-pencil-square-o fa-1x"></i></a>

                       <a class="text-custom1" href="<?php echo base_url();?>Vehicle/Vehicle_delete/<?php echo $value['id'];?>"><i class="fa fa-trash-o"></i></a>
                     <?php
                   }
                   ?>
                
                      </td>
                    </tr>
            
              <?php  } ?>

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

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 