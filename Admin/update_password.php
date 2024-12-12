<?php include('partials/menu.php'); ?>

<div class="main-contact">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
              if(isset($_GET['id'])) 
              {
                $id=$_GET['id'];
              }
          ?>

        <form action="" method="POST">

                <table class="tbl-30">
                  <tr>
                    <td>
                      Old Password: </td>
                    <td>
                      <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                  </tr>

                  <tr>
                    <td>
                      New Password: </td>
                    <td>
                      <input type="password" name="new_password" placeholder="New Password">
                    </td>
                  </tr>

                  <tr>
                    <td>
                      Confirm Password: </td>
                    <td>
                      <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2">
                      <input type="hidden" name="id"value="<?php echo $id; ?>">
                      <input type="submit" name="submit" value="Change Password" class="btn-secodary">
                    </td>
                  </tr>

                </table>

          </form>

    </div>
</div>

<?php

  //Cheak whether the submit button is clicked or not
  if (isset($_POST['submit'])) 
  {
    //button clicked
    //echo "Button Clicked";

    //Get the data from from
    $id =$_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']); //password encrytion

    //SQL Query to save the data into database
    $sql = "SELECT * FROM table_admin WHERE id=$id AND password='$current_password'
           ";

    //Executeing Query
    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
      $count=mysqli_num_rows($res);

      if($count==1)
      {
        //echo"User Found";
        if($new_password==$confirm_password)
        {
           
           $sql2 = "UPDATE table_admin SET
             password='$new_password'
             WHERE id=$id";
           
           //execute query
           $res2 = mysqli_query($conn, $sql2);

           //query executed or not
           if($res2==true)
           {
              //success msg
              $_SESSION['change-pwd'] = "<div class ='success'>Password Changed Successfully.</div>";
              //redirect
              header("location:".SITEURL.'admin/manage_admin.php');
           }
           else
           {
              //error
              $_SESSION['change-pwd'] = "<div class ='error'>Password Changed Failed.</div>";
              //redirect
              header("location:".SITEURL.'admin/manage_admin.php');
           }
        }
        else
        {
          $_SESSION['pwd-not-match'] = "<div class ='error'>Password Not Matched.</div>";
        //redirect
        header("location:".SITEURL.'admin/manage_admin.php');
        }
      }
      else
      {
        $_SESSION['user-not-found'] = "<div class ='error'>User Not Found.</div>";
        //redirect
        header("location:".SITEURL.'admin/manage_admin.php');
      }

    }
    
  }

?>
  

<?php include('partials/footer.php'); ?>