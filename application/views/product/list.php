    
 <section class="content">
      <div class="row">
         <div class="col-xs-12">
          <?php if ($this->session->flashdata('msg' )): ?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('msg'); ?>  
          </div>
          <?php endif; ?>
          
               <div style="padding-left:0px;" class="panel-heading">
                <a  class="btn btn-success"  href="<?php echo base_url();?>Product/add/">Add Product Type </a>
          </div>
          <div class="box col-sm-12">
            
            <div class="box-header" style="padding-top:25px" >
              <h2 class="box-title"><b> List Product Type </b></h2>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">



              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                                    <th> Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                      <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($producttype))
                            {
                            foreach($producttype as $amb){ ?>
                                <tr class="odd gradeX">
                                <td><?php echo $amb["name"];?></td>


                                  
                                  <td><?php echo $amb["description"];?></td>
                            
                          
                                   
                                      <td>
                                              <?php if ($amb["status"]=="0"){?>
                                                                      
<a class="text-custom1" href="<?php echo base_url();?>Product/states/<?php echo $amb['id'];?>">
  <img src="<?php echo base_url();?>assets/Images/2.png" width="20px" height="20px"></a>
                                              
                                        

                                    <?php } elseif($amb["status"]=="1") {?>
                                                   
                                                    <a class="text-custom1" href="<?php echo base_url();?>Product/active/<?php echo $amb['id'];?>"><img src="<?php echo base_url();?>assets/Images/3.png" width="20px" height="20px"></a>
                                                 
                                                 
                                       
                                    <?php } ?>
                                    
                                </td>

 <td>
      <?php
                                $st=$amb['status'];
                                if($st==1)
                                {
                                  ?>                              
                                       


<?php
}
else{

  ?>
                                          <a class="text-custom1" href="<?php echo base_url();?>Product/editt/<?php echo $amb['id'];?>"><i class="fa fa-edit fa-1x"></i></a> 
               <a class="text-custom1" href="<?php echo base_url();?>Product/delete/<?php echo $amb['id'];?>"><i class="fa fa-trash fa-1x"></i></a>
                 <!--  <?php if ($amb["status"]=="0"){?>
                  <a class="text-custom1" href="<?php echo base_url();?>Product/states/<?php echo $amb['id'];?>"><i class="fa fa-times fa-1x"></i></a>
 <?php } elseif($amb["status"]=="1") {?>
<a class="text-custom1" href="<?php echo base_url();?>Product/active/<?php echo $amb['id'];?>"><i class="fa fa-check fa-1x"></i></a>
 
  <?php } ?> -->
  <?php
}
?>
                               
                                </td>

                                  <?php } }?>
                            </tr>
                          

                           
                            </tbody>
                        </table>
               </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </section>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 