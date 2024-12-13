<?php 
///this is for read sub loacations from tables


                
        $sql = "SELECT * FROM table_sublocation";

       
        $res = mysqli_query($conn, $sql);

      
        if ($res) {
            // Fetch all rows as an associative array
            $sublocations = mysqli_fetch_all($res, MYSQLI_ASSOC);

        }

        ///errors should handle here 