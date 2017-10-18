    
 <section class="content">
      <div class="row">
         <div class="col-xs-12">
          <?php if ($this->session->flashdata('msg' )): ?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('msg'); ?>  
          </div>
          <?php endif; ?>
          
              
          <div class="box col-sm-12">
            
            <div class="box-header" style="padding-top:25px" >
              <h2 class="box-title"><b> List Of Price History </b></h2>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">



              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                   <th> Sr #</th>
                                    <th> Name</th>
                                    <th>Price</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                 
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($product))
                            {
                              $i=1;
                            foreach($product as $amb){ ?>
                                <tr class="odd gradeX">
                                     <td><?php echo $i++;?></td>  
                                <td><?php echo $amb["heading"];?></td>    
                              <td><?php echo $amb["price"];?></td>
								              <td><?php echo $amb["startdate"];?></td>
                             <td><?php echo $amb["date"];?></td>
                            
                           
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
 
 
 
 
 
 
 
 <section class="content">
      <div class="row">
         <div class="col-xs-12">
            
          <div class="box col-sm-12">
            
            <div class="box-header" style="padding-top:25px" >
         <div class="col-lg-12">
			 <form  action="<?php echo base_url()?>Product/pricehistorysearch" method="get" enctype="multipart/form-data"> 
                    
			<div class="col-lg-5">
		 
			 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">From Date: <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="cnic" name="fromdate" class="form-control" id="datepicker1" placeholder="From Date"   >
                        </div>
                      </div>
			</div>
			<div class="col-lg-5">
				
				<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">To Date: <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="cnic" name="todate" class="form-control" id="datepicker" placeholder="To Date"   >
                        </div>
                      </div>
				
				
			</div>
			<div class="col-lg-2">
			
                          <input class="btn btn-success" type="submit" name="register" value="Search" />
			</div>
			</form>
		 </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">



              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                                    <th> Name</th>
                                    <th>Price</th>
                                      <th>From Date</th>
                                    <th>To Date</th>
                                   
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($producths))
                            {
                            foreach($producths as $amb){ ?>
                                <tr class="odd gradeX">
                                <td><?php echo $amb["heading"];?></td>


                                  
                                  <td><?php echo $amb["price"];?></td>
								   <td><?php echo $amb["startdate"];?></td>
                             <td><?php echo $amb["enddate"];?></td>
                          
                                    
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
 
 
 
 
 
 <script>
    $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
     $( "#datepicker1" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>

 
 
 
 
 
 
 
 
 
 
 
 
 