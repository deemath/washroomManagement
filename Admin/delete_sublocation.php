<?php 

    include('../configer/constants.php');


    //echo "Delete";
    if(isset($_GET['id']))
    {
        //get value and delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];


        $sql = "DELETE FROM table_sublocation WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Sublocation Delete Successfully.</div>";
            header('location:'.SITEURL.'admin/manage_sublocation.php');
        }

        else
        {
          $_SESSION['delete'] = "<div class='error'>Sublocation Delete Failed.</div>";
          header('location:'.SITEURL.'admin/manage_sublocation.php');
        }
        
    }
    else
    {
        //redirect
        header('location:'.SITEURL.'admin/manage_sublocation.php');
    }
?>