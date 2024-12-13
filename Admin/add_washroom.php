<?php
ob_start(); // Start output buffering
session_start();
include('partials/menu.php');
include('dbh/ReadMainLoacations.php');
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../JS/locationfilter.js"></script>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Washroom</h1>
        <br><br>

        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload']; // Display message
            unset($_SESSION['upload']); // Remove message
        }

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // Display message
            unset($_SESSION['add']); // Remove message
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Washroom ID: </td>
                    <td>
                        <input type="text" name="title" placeholder="Washroom ID">
                    </td>
                </tr>

                <tr>
                    <td>Main Location: </td>
                    <td>
                        <?php if (isset($locations)) : ?>
                            <?php foreach ($locations as $location) : ?>
                                <input type="radio" name="location" value="<?php echo $location['id'] ?>"> 
                                <?php echo $location['mainlocation'] ?><br>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td>Sub Location:</td>
                    <td>
                        <select name="category">
                            <?php
                            $sql = "SELECT * FROM table_sublocation WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);

                            if ($res && mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $sublocation = $row['sublocation'];
                                    ?>
                                    <option value="<?php echo $id; ?>" id="mainloc<?php echo $row['mainlocID']; ?>">
                                        <?php echo $sublocation; ?>
                                    </option>
                                    <?php
                                }
                            } else {
                                ?>
                                <option value="0">No Washroom Found</option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="status" value="Yes">Yes
                        <input type="radio" name="status" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Washroom" class="btn-secodary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $mainlocation = $_POST['location'];
            $sublocation = $_POST['category'];
            $active = isset($_POST['status']) ? $_POST['status'] : "No";

            $sql2 = "INSERT INTO table_washroom SET
                     washroomid='$title',
                     mainlocID='$mainlocation',
                     sublocID='$sublocation',
                     `status`='$active'";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true) {
                $_SESSION['add'] = "<div class='success'>Washroom Added Successfully.</div>";
                header("location:" . SITEURL . 'admin/manage_washroom.php');
                exit();
            } else {
                $_SESSION['add'] = "<div class='error'>Failed to Add Washroom.</div>";
                header("location:" . SITEURL . 'admin/manage_washroom.php');
                exit();
            }
        }
        ?>
    </div>
</div>

<?php
include('partials/footer.php');
ob_end_flush(); // End output buffering
?>
