 <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <?php if ($this->session->flashdata('msg' )): ?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('msg'); ?>  
          </div>
          <?php endif; ?>
          
               <div style="padding-left:0px;" class="panel-heading">
                  <a  class="btn btn-success"  href="<?php echo base_url();?>Product/add_product/">Add Product</a>
 
              </div>
          <div class="box col-sm-12" >
            
            <div class="box-header" style="padding-top:25px" >
              <h2 class="box-title"><b>List Product</b></h2>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                   
                                    <th> Name1</th>
                                    <th> Unit</th>
                                    <th> Product type</th>
                                    <th> Price</th>
                                    <th> status </th>
                                    <th>Action</th>
                                   
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($product))
                            {
                            foreach($product as $amb){ ?>
                                <tr class="odd gradeX">
                                <td><?php echo $amb["heading"];?></td>
                                 <td><?php echo $amb["unitname"];?></td>
                                  <td><?php echo $amb["pname"];?></td>
                                  <td><?php echo $amb["price"];?></td>
                               
                                 <td>
                                              <?php if ($amb["status"]=="0"){?>
                                                                      
<a class="text-custom1" href="<?php echo base_url();?>Product/states_p/<?php echo $amb['id'];?>">
  <img src="<?php echo base_url();?>assets/Images/2.png" width="20px" height="20px"></a>
                                              
                                        

                                    <?php } elseif($amb["status"]=="1") {?>
                                                   
                                                    <a class="text-custom1" href="<?php echo base_url();?>Product/active_p/<?php echo $amb['id'];?>"><img src="<?php echo base_url();?>assets/Images/3.png" width="20px" height="20px"></a>
                                                 
                                                 
                                       
                                    <?php } ?>
                                    
                                </td>

                                 <td>
                                   <?php
                                $st=$amb['status'];
                                if($st==1)
                                {
                                  ?>                              
                                     
                <a class="text-custom1" href="<?php echo base_url();?>product/Product_eye/<?php echo $amb['id'];?>"><i class="fa fa-eye"></i></a>
                <?php
              }
              else{
                ?>
                <a class="text-custom1" href="<?php echo base_url();?>product/Product_eye/<?php echo $amb['id'];?>"><i class="fa fa-eye"></i></a>
              
               <a class="text-custom1" href="<?php echo base_url();?>product/List_edit/<?php echo $amb['id'];?>"><i class="fa fa-edit fa-1x"></i></a> 
               <a class="text-custom1" href="<?php echo base_url();?>product/List_delete/<?php echo $amb['id'];?>"><i class="fa fa-trash fa-1x"></i></a>
<?php
}
?>

                                </td>
                                
                            </tr>
                            <?php } }?>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
            

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 