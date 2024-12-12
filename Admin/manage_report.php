<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
     <h1>Manage Report</h1>

          <br /><br /><br />
        
      <?php

          if(isset($_SESSION['update']))
        {
           echo $_SESSION['update'];
           unset($_SESSION['update']);
        }
      ?>
      <br><br>

          <table class="tbl-full">
            <tr>
              <th>Main Location ID</th>
              <th>Main Location</th>
              <th>Sub Location ID</th>
              <th>Sub Location</th>
              <th>Washroom ID</th>
              <th>Timestamp</th>
              <th>Date</th>
              <th>Time</th>
              <th>Actions</th>

            </tr>

            <?php 
                  //get all recod from database
                  $sql = "SELECT * FROM table_report ORDER BY id DESC"; //display the latest rec at first
                  //execute query
                  $res = mysqli_query($conn,$sql);
                  //count row
                  $count = mysqli_num_rows($res);

                  $sn = 1;

                  if($count>0)
                  {
                      //rec avbl
                      while($row=mysqli_fetch_assoc($res))
                      {
                          //get all rec details
                          $id = $row['id'];
                          $food = $row['food'];
                          $price = $row['price'];
                          $qty = $row['qty'];
                          $total = $row['total'];
                          $order_date = $row['order_date'];
                          $status = $row['status'];
                          $customer_name = $row['customer_name'];
                          $customer_contact = $row['customer_contact'];
                          $customer_email = $row['customer_email'];
                          $customer_address = $row['customer_address'];

                          ?>

                          <tr>
                               <td><?php echo $sn++; ?>. </td>
                               <td><?php echo $food; ?></td>
                               <td><?php echo $price; ?></td>
                               <td><?php echo $qty; ?></td>
                               <td><?php echo $total; ?></td>
                               <td><?php echo $order_date; ?></td>
                               <td>
                                  <?php

                                  if($status=="Ordered")
                                  {
                                      echo "<lable>$status</lable>";
                                  }
                                  elseif($status=="On Delivery")
                                  {
                                      echo "<lable style='color: orange;'>$status</lable>";
                                  }
                                  elseif($status=="Delivered")
                                  {
                                      echo "<lable style='color: green;'>$status</lable>";
                                  }
                                  elseif($status=="Cancelled")
                                  {
                                      echo "<lable style='color: red;'>$status</lable>";
                                  }

                                  ?>
                                </td>
                                
                               <td><?php echo $customer_name; ?></td>
                               <td><?php echo $customer_contact; ?></td>
                               <td><?php echo $customer_email; ?></td>
                               <td><?php echo $customer_address; ?></td>
                               <td>
                                   <a href="<?php echo SITEURL; ?>admin/update_order.php?id=<?php echo $id; ?>"class="btn-secodary">Update</a>
                               </td>          
                          </tr>

                          <?php

                      }
                  }
                  else
                  {
                      //order not avbl
                      echo "<tr><td colspan= '12' class='error'>Record not Available</td></tr>";
                  }

            ?>

            
          
          </table>
    </div>
</div>

<?php include('partials/footer.php') ?>