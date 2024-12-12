<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
     <h1>Manage Sub Location</h1>

     <br /><br />

     <?php 
              
        if(isset($_SESSION['add']))
        {
           echo $_SESSION['add'];
           unset($_SESSION['add']);
        }

        if(isset($_SESSION['remove']))
        {
           echo $_SESSION['remove'];
           unset($_SESSION['remove']);
        }

        if(isset($_SESSION['delete']))
        {
           echo $_SESSION['delete'];
           unset($_SESSION['delete']);
        }

        if(isset($_SESSION['no-category']))
        {
           echo $_SESSION['no-category'];
           unset($_SESSION['no-category']);
        }

        if(isset($_SESSION['update']))
        {
           echo $_SESSION['update'];
           unset($_SESSION['update']);
        }

        if(isset($_SESSION['upload']))
        {
           echo $_SESSION['upload'];
           unset($_SESSION['upload']);
        }

        
              
      ?>

      <br><br>

          <!--Add admin button-->
          <a href="<?php echo SITEURL . 'admin/add_sublocation.php'; ?>" class="btn-primary">Add Sub Location</a>

          <br /><br /><br />

          <table class="tbl-full">
            <tr>
              <th>Sub Location ID</th>
              <th>Main Location</th>
              <th>Sub Location</th>
              <th>Active</th>
              <th>Actions</th>
            </tr>

            <?php 
                //get all category
                $sql = "SELECT * FROM table_sublocation";

                //execute query
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                //number variable
                $sn=1;

                //check data
                if($count>0)
                {
                    //have data
                    while($row=mysqli_fetch_array($res))
                    {
                        $id = $row['id'];
                        $sublocation = $row['sublocation'];
                        $active = $row['active'];

                        ?>
                          <tr>
                             <td><?php echo $sn++; ?></td>
                             <td>Arrival</td>
                             <td><?php echo $sublocation; ?></td>
                             <td><?php echo $active; ?></td>
                             <td>
                                 <a href="<?php echo SITEURL; ?>admin/update_sublocation.php?id=<?php echo $id; ?>" class="btn-secodary">Update Location</a>
                                 <a href="<?php echo SITEURL; ?>admin/delete_sublocation.php?id=<?php echo $id; ?>" class="btn-third">Delete Location</a>
                             </td>
                          </tr>

                        <?php
                    }
                }
                else
                {
                    //no have data
                    ?>

                    <tr>
                        <td colspan="6"><div class="error">Sub Location Not Added.</div></td>
                    </tr>

                    <?php
                }
            ?>

          
          </table>
    </div>
</div>

<?php include('partials/footer.php') ?>