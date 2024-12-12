<?php 

    include('../configer/constants.php');


    //echo "Delete";
    if(isset($_GET['id']))
    {
        //process delete
        //echo "Process to Delete";
        $id = $_GET['id'];


        $sql = "DELETE FROM table_washroom WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>washroom Delete Successfully.</div>";
            header('location:'.SITEURL.'admin/manage_washroom.php');
        }

        else
        {
          $_SESSION['delete'] = "<div class='error'>washroom Delete Failed.</div>";
          header('location:'.SITEURL.'admin/manage_washroom.php');
        }
    }
    else 
    {
        //redirect
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage_washroom.php');
    }
?>