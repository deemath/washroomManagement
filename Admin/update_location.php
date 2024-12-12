<?php include('partials/menu.php');?>

  <div class="main-content">
       <div class="wrapper">
        <h1>Update Location</h1>
        <br><br>
        
        <?php 
             //check set or not
             if(isset($_GET['id']))
             {
                //echo"Getting the data";
                $id = $_GET['id'];
                //get all details
                $sql = "SELECT * FROM table_location WHERE id=$id";

                //execute query
                $res = mysqli_query($conn, $sql);

                //check id valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //get all data
                    $row = mysqli_fetch_assoc($res);
                    $mainlocation = $row['mainlocation'];
                    $active = $row['active'];

                }
                else
                {
                    //redirect
                    $_SESSION['no-category'] = "<div class ='error'>Location not Found.</div>";
                    header("location:".SITEURL.'admin/manage_location.php');
                }

             }
             else
             {  
                //redirect
                header('location:'.SITEURL.'admin/manage_location.php');
             }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
               <td> Title: </td>
               <td>
                  <input type="text" name="title" value="<?php echo $mainlocation; ?>">
               </td>
            </tr>

            <tr>
               <td>Active: </td>
               <td>
                   <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                   <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
               </td>
            </tr>

            <tr>
               <td>
                   <input type="hidden" name="id" value="<?php echo $id; ?>">
                   <input type="submit" name="submit" value="Update Location" class="btn-secodary">
               </td>
            </tr>

          </table>
          </form> 

          <?php
              if(isset($_POST['submit']))
              {
                  //echo "click";
                  //get all data our form
                  $id =$_POST['id'];
                  $mainlocation = $_POST['mainlocation'];
                  $active = $_POST['active'];



                  //update database
                  $sql2 = "UPDATE table_location SET
                       mainlocation ='$mainlocation',
                       active = '$active'
                       WHERE id=$id
                       ";
                  
                  //execute query
                  $res2 = mysqli_query($conn, $sql2);

                  //exexuted or not
                  if($res2==true)
                  {
                      //update success
                      $_SESSION['update'] = "<div class ='success'>Location Updated Successfully.</div>";
                      //redirect
                      header('location:'.SITEURL.'admin/manage_location.php');

                  }
                  else
                  {
                      //update failed
                      $_SESSION['update'] = "<div class ='error'>Location Updated Failed.</div>";
                      //redirect
                      header('location:'.SITEURL.'admin/manage_location.php');
                  }

              } 
              
          ?>

       </div>
  </div>

  <?php include('partials/footer.php'); ?>