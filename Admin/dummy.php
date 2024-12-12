<?php include('partials/menu.php'); ?>

<h5>Testing Dropdown</h5>
<label for="options">Choose an option:</label>
<select id="options" name="options">
    <?php 
    // Database query to fetch location data
    $sql = "SELECT * FROM `location`";
    $res = mysqli_query($conn, $sql);

    // Check if the query returned results
    if($res == TRUE)
    { 
        $count = mysqli_num_rows($res);

        if ($count > 0)
        {
            // Loop through each row and create an option for each location
            while($rows = mysqli_fetch_assoc($res))
            {
                $id = $rows['id'];
                $location = $rows['location'];
                ?>
                <option value="<?php echo $id; ?>"><?php echo $location; ?></option>
                <?php 
            }
        }
        else
        {
            // If no data is available, add a placeholder
            echo '<option value="">No locations found</option>';
        }
    }
    else
    {
        // Query failed, handle error
        echo '<option value="">Error fetching data</option>';
    }
    ?>
</select>

<?php include('partials/footer.php'); ?>
