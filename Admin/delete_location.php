<?php 

    include('../configer/constants.php');


    //echo "Delete";
    if(isset($_GET['id']))
    {
        //get value and delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];


        $sql = "DELETE FROM table_location WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Location Delete Successfully.</div>";
            header('location:'.SITEURL.'admin/manage_location.php');
        }

        else
        {
          $_SESSION['delete'] = "<div class='error'>Location Delete Failed.</div>";
          header('location:'.SITEURL.'admin/manage_location.php');
        }
        
    }
    else
    {
        //redirect
        header('location:'.SITEURL.'admin/manage_location.php');
    }
?>