<?php 
// Include database connection
if (!file_exists('../configer/constants.php')) {
    die("Configuration file is missing. Please check the path to constants.php.");
}
include('../configer/constants.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }
        #serch{
          width: 89%;
          height:5vh;
        }
        #serch-btn{
          width: 10%;
          height:6vh;
          border: 0;
          font-size: 18px;
          color: #f4f4f4;
          background-color:rgb(4, 17, 110);
          
        }
        form{
          padding: 10px 0px;
          font-weight: 600;
        
        }
    </style>
</head>
<body>
    <form action="<?php echo SITEURL?>admin/report_table.php?search=" method="get">
      
      <input type="text" name="search" id="serch" placeholder="Search by Main location / Sublocation / Washroom ID...">
      <input type="submit" name="submit-search" value="Search" id="serch-btn">
    </form>

    <table>
      <tr>
        <th>Main Location ID</th>
        <th>Main Location</th>
        <th>Sub Location ID</th>
        <th>Sub Location</th>
        <th>Washroom ID</th>
        <th>Timestamp</th>
        <th>Date</th>
        <th>Time</th>
      </tr>

      <?php 
        // Check if the connection is established
        if (!$conn) {
            echo "<tr><td colspan='8' class='error'>Database connection failed</td></tr>";
            exit;
        }

        if(isset($_GET['submit-search'])){
            $search = $_GET['search'];
            $sql = "SELECT * FROM table_report ORDER BY record_id DESC 
                  WHERE main_location = '$search'
                  OR sublocation = '$search'
                  OR washroom_id = '$search'";

        }else{
          $sql = "SELECT * FROM table_report ORDER BY record_id DESC";
        }

        // Fetch all records from the database
       
        $res = mysqli_query($conn, $sql);

        if ($res) {
          $count = mysqli_num_rows($res);

          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
              $main_location_id = htmlspecialchars($row['main_location_id']);
              $main_location = htmlspecialchars($row['main_location']);
              $sub_location_id = htmlspecialchars($row['sub_location_id']);
              $sublocation = htmlspecialchars($row['sublocation']);
              $washroom_id = htmlspecialchars($row['washroom_id']);
              $timestamp = htmlspecialchars($row['timestamp']);
              $date = date('Y-m-d', strtotime($timestamp));
              $time = date('H:i:s', strtotime($timestamp));
            ?>
              <tr>
                <td><?php echo $main_location_id; ?></td>
                <td><?php echo $main_location; ?></td>
                <td><?php echo $sub_location_id; ?></td>
                <td><?php echo $sublocation; ?></td>
                <td><?php echo $washroom_id; ?></td>
                <td><?php echo $timestamp; ?></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $time; ?></td>
              </tr>
            <?php
            }
          } else {
            echo "<tr><td colspan='8' class='error'>No Records Found</td></tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='error'>Failed to retrieve records</td></tr>";
        }
      ?>
    </table>
</body>
</html>
