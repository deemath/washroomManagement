<?php 
///this is for read main loacations from tables


                
        $sql = "SELECT * FROM table_mainlocation";

       
        $res = mysqli_query($conn, $sql);

      
        if ($res) {
            // Fetch all rows as an associative array
            $locations = mysqli_fetch_all($res, MYSQLI_ASSOC);

        }

        ///errors should handle here 
       