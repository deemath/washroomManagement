<?php include('partials/menu.php'); ?>

<div class="main-content">
      <div class="wrapper">
          <h1>Add Washroom</h1>

          <br><br>

          <?php 

              if(isset($_SESSION['upload']))
              {
                echo $_SESSION['upload']; //display msg
                unset($_SESSION['upload']); // remove msg
              }

              if(isset($_SESSION['add']))
              {
                echo $_SESSION['add']; //display msg
                unset($_SESSION['add']); // remove msg
              }

        

          ?>

          <!--add food start-->
          <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">
                
                <tr>
                    <td>Washroom ID: </td>
                    <td>
                      <input type="text" name="title" placeholder="Washroom ID">
                    </td>
                  </tr>
                
                <tr>
                    <td>Main Location: </td>
                    <td>
                      <input type="text" name="title" placeholder="Main location">
                    </td>
                  </tr>

                  <tr>
                    <td>Sub Location:</td>
                    <td>
                        <select name="category">

                            <?php 
                                //display sub locations from database
                                //sql get all active sublocation
                                $sql = "SELECT * FROM  table_sublocation WHERE active='Yes'";
                                
                                //execute query
                                $res = mysqli_query($conn, $sql);

                                //check have sublocation or not
                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                     //available sublocation
                                     while($row=mysqli_fetch_assoc($res))
                                     {
                                        //get details
                                        $id = $row['id'];
                                        $sublocation = $row['sublocation'];

                                        ?>
                                        <option value="<?php echo $id; ?>"><?php echo $sublocation; ?></option>
                                        <?php
                                     }
                                }
                                else
                                {
                                     //not have sublocation
                                     ?>
                                     <option value="0">No Washroom Found</option>
                                     <?php
                                }


                                //Display no dropdown
                            

                            ?>

                        </select>
                    </td>
                  </tr>

                  <tr>
                    <td>Active: </td>
                    <td>
                      <input type="radio" name="active" value="Yes">Yes
                      <input type="radio" name="active" value="No">No
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2">
                      <input type="submit" name="submit" value="Add Washroom" class="btn-secodary">
                    </td>
                  </tr>


                </table>
            </form>

            <?php
                //check button click or not
                if(isset($_POST['submit']))
                {
                    //add food database
                    //echo "click";

                    //get data from form
                    $title = $_POST['title'];
                    $category = $_POST['category'];

                    if(isset($_POST['active']))
                    {
                        $active = $_POST['active'];
                    }
                    else
                    {
                        $active = "No";   //setting default value
                    }

                    

                    //insert database
                    //create sql query
                    $sql2 = "INSERT INTO table_washroom SET
                    title='$title',
                    category_id ='$category',
                    active ='$active'
                  ";
 
                  //execute query 
                  $res2 = mysqli_query($conn, $sql2);

                  //check data inserted or not
                  if($res2 == true)
                  {
                     $_SESSION['add'] = "<div class ='success'>Food Added Successfully.</div>";
                     //redirect
                     header('location:'.SITEURL.'admin/manage_washroom.php');
                  }
                  else
                  {
                     $_SESSION['add'] = "<div class ='error'>Failed to Add Food.</div>";
                     //redirect
                     header('location:'.SITEURL.'admin/manage_washroom.php');
                  }
                
                }
            ?>
      </div>
</div>


<?php include('partials/footer.php'); ?>