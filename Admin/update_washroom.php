<?php include('partials/menu.php');?>

  <div class="main-content">
       <div class="wrapper">
         <h1>Update Washroom</h1>
         <br><br>

         <?php 
             //check set or not
             if(isset($_GET['id']))
             {
                //echo"Getting the data";
                $id = $_GET['id'];
                //get all details
                $sql2 = "SELECT * FROM table_washroom WHERE id=$id";

                //execute query
                $res2 = mysqli_query($conn, $sql2);

                //check id valid or not
                $row2 = mysqli_fetch_assoc($res2);
          
                    //get all data
                    $title = $row2['title'];
                    $current_category = $row2['category_id'];
                    $active = $row2['active'];
                    
             }
             else
             {  
                //redirect
                header('location:'.SITEURL.'admin/manage_washroom.php');
             }
        ?>

         <form action="" method="POST" enctype="multipart/form-data">
         <table class="tbl-30">
            <tr>
               <td> Title: </td>
               <td>
                  <input type="text" name="title" value="<?php echo $title; ?>">
               </td>
            </tr>

            <tr>
                 <td>Category:</td>
                 <td>
                     <select name="category">
                        <?php 
                             //get active category
                             $sql = "SELECT * FROM table_sublocation WHERE active='Yes'";
                             //execute query
                             $res = mysqli_query($conn, $sql);
                             $count = mysqli_num_rows($res);

                             //cheak category available or not
                             if($count>0)
                             {
                                 //category available
                                 while($row=mysqli_fetch_assoc($res))
                                 {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                                    //echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                 }
                             }
                             else
                             {
                                 //sublocation not available
                                 echo "<option value='0'>sublocation Not Available.</option>";
                             }
                        ?>
                          
                     </select>
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
                   <input type="submit" name="submit" value="Update Food" class="btn-secodary">
               </td>
            </tr>

          </table>
          </form> 

          <?php
              if(isset($_POST['submit']))
              {
                  // echo "Button work";
                  //get all details
                  $id =$_POST['id'];
                  $title = $_POST['title'];
                  $category = $_POST['category'];

                  $active = $_POST['active'];

                  
                  //update database
                  $sql3 = "UPDATE table_washroom SET
                       title ='$title',
                       category_id = '$category',
                       active = '$active'
                       WHERE id=$id
                       ";
                  
                  //execute query
                  $res3 = mysqli_query($conn, $sql3);

                  //exexuted or not
                  if($res3==true)
                  {
                     //update success
                     $_SESSION['update'] = "<div class ='success'> Updated Successfully.</div>";
                     //redirect
                     header('location:'.SITEURL.'admin/manage_washroom.php');

                  }
                  else
                  {
                     //update failed
                     $_SESSION['update'] = "<div class ='error'> Updated Failed.</div>";
                     //redirect
                     header('location:'.SITEURL.'admin/manage_washroom.php');
                  }

              
              }
          ?>

       </div>
  </div>

<?php include('partials/footer.php');?>
