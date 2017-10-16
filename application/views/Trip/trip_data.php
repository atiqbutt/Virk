
           
            <?php
            if(!empty($tripmanagement)){
            foreach($tripmanagement as $amb){ 
               if ($amb['status'] == 0 ){ ?>
                 
                <tr class="odd gradeX" style="background: #98FB98">
                  <?php }else {?>
                                  <tr class="odd gradeX" >
                                    <?php } ?>
                
                <td> <?php echo $amb["id"];?>  </td>
                <td> <?php echo $amb["type"];?>  </td>
                <td> <?php echo $amb["productname"];?>  </td>
                <td> <?php echo $amb["comname"];?>  </td>
                <td> <?php echo $amb["conname"];?>  </td>
                <td> <?php echo $amb["source"];?>  </td>
                <td> <?php
                $newDate = date("d/m/Y", strtotime($amb["filling_date"]));
                 echo $newDate;?> </td>
                <td> <?php echo $amb["temperature"];?> </td>
                <td> <?php echo $amb["start_meter_reading"];?> </td>
                <td> <?php echo $amb["gravity"];?> </td>
                <td> <?php echo $amb["vehicleregisterationno"];?> </td>
                <td> <?php echo $amb["quantity"];?> </td>
                <td> <?php echo $amb["freight_rate"];?> </td>
                <td> <?php echo $amb["carriage"];?> </td>
                <td> <?php echo $amb["withholdingtax"];?> </td>
                <td> <?php echo $amb["remaining_commission"];?> </td>
                <td> <?php echo $amb["servicecharges"];?></td>
            
              <td style="width:100px"><a href="<?php echo base_url()?>Trip/edit_trip/<?php echo $amb['id'];?>"><i class="fa fa-eye"></i></a></td>


                </tr>
           <?php  } }?>


      

                    