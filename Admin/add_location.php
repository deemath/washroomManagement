<?php include('partials/menu.php'); ?>

<div class="main-content">
      <div class="wrapper">
          <h1>Add Location</h1>

          <br><br>

          <?php 
              
              if(isset($_SESSION['add']))
              {
                echo $_SESSION['add']; //display msg
                unset($_SESSION['add']); // remove msg
              }

              if(isset($_SESSION['upload']))
              {
                echo $_SESSION['upload']; //display msg
                unset($_SESSION['upload']); // remove msg
              }

          ?>
          
          <br><br>
          <!--add category start-->
          <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">
                  <tr>
                    <td>Location Name : </td>
                    <td>
                      <input type="text" name="mainlocation" placeholder="Main Location">
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
                      <input type="submit" name="submit" value="Add Main Location" class="btn-secodary">
                    </td>
                  </tr>

                </table>

           </form>
          <!--add category end-->

          <?php 
          
                //Cheak submit button click or not
                if(isset($_POST['submit']))
                {
                  //echo "click";

                  $mainlocation = $_POST['mainlocation'];
                   
                  //radio input

                  if(isset($_POST['active']))
                  {
                      $active = $_POST['active'];
                  }
                  else
                  {
                      $active = "No";
                  }

                  //check image select
                  //print_r($_FILES['image']);
                  //die(); //break code


                  //Create sql query
                  $sql = "INSERT INTO table_mainlocation SET
                    mainlocation='$mainlocation',
                    active='$active'
                  ";

                  $res = mysqli_query($conn, $sql);

                  if($res==true)
                  {
                     $_SESSION['add'] = "<div class ='success'>Location Added Successfully.</div>";
                     //redirect
                     header("location:".SITEURL.'admin/manage_location.php');
                  }
                  else
                  {
                     $_SESSION['add'] = "<div class ='error'>Failed to Add location.</div>";
                     //redirect
                     header("location:".SITEURL.'admin/manage_location.php');
                  }

                }
          ?>
      </div>
</div>


<?php include('partials/footer.php') ?>