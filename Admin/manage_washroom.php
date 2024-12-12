<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
     <h1>Manage Washroom</h1>
     <br /><br />

     <?php 
              
        if(isset($_SESSION['add']))
        {
           echo $_SESSION['add'];
           unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete']))
        {
           echo $_SESSION['delete'];
           unset($_SESSION['delete']);
        }

        if(isset($_SESSION['upload']))
        {
           echo $_SESSION['upload'];
           unset($_SESSION['upload']);
        }

        if(isset($_SESSION['unauthorize']))
        {
           echo $_SESSION['unauthorize'];
           unset($_SESSION['unauthorize']);
        }

        if(isset($_SESSION['update']))
        {
           echo $_SESSION['update'];
           unset($_SESSION['update']);
        }

     ?>

     <br><br>
          <!--Add admin button-->
          <a href="<?php echo SITEURL; ?>admin/add_washroom.php" class="btn-primary">Add Washroom</a>

          <br /><br /><br />

          <table class="tbl-full">
            <tr>
              <th>Washroom ID</th>
              <th>Main Location</th>
              <th>Sub Location</th>
              <th>Active</th>
              <th>Action</th>
            </tr>

            <?php 
                 //create sql query get all food
                 $sql = "SELECT * FROM table_washroom";

                 //execute query
                 $res = mysqli_query($conn, $sql);

                 //check have food or not
                 $count = mysqli_num_rows($res);

                 //create id num variable
                 $sn=1;

                 if($count>0)
                 {             
                    //have data
                    while($row=mysqli_fetch_array($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $active = $row['active'];
                        $category_id = $row['category_id'];

                        ?>

                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $category_id; ?></td>
                            <td><?php echo $active; ?></td>

                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update_washroom.php?id="class="btn-secodary">Update Washroom</a>
                                <a href="<?php echo SITEURL; ?>admin/delete_washroom.php?id=<"class="btn-third">Delete Washroom</a>
                             </td>
                        </tr>

                        <?php
              
                    }
                 }
                 else
                 {
                    //washroom not have
                    echo "<tr><td colspan='7' class='error'> Washroom not Added Yet.</td></tr>"; 
                 }
            ?>

            

          </table>
    </div>
</div>

<?php include('partials/footer.php') ?>