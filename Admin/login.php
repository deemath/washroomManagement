<?php include('../configer/constants.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SFMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-purple-300 to-blue-300 min-h-screen flex items-center justify-center font-roboto">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <div class="flex justify-center mb-4">
            <div class="bg-blue-500 w-10 h-10 rounded-full flex items-center justify-center">
                <div class="bg-white w-5 h-5 rounded-full"></div>
            </div>
        </div>
        <h2 class="text-2xl font-semibold text-center mb-4">Login Form</h2>
        <div class="border-b-2 border-blue-500 mb-4"></div>

        <?php
        if(isset($_SESSION['login'])) {
            echo '<div class="bg-red-100 text-red-700 p-4 rounded mb-4">'.$_SESSION['login'].'</div>';
            unset($_SESSION['login']);
        } 

        if(isset($_SESSION['no-login-message'])) {
            echo '<div class="bg-red-100 text-red-700 p-4 rounded mb-4">'.$_SESSION['no-login-message'].'</div>';
            unset($_SESSION['no-login-message']);
        }
        ?>

        <form action="" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="username">Username</label>
                <div class="flex items-center border rounded-lg px-3 py-2">
                    <i class="fas fa-user text-gray-400 mr-2"></i>
                    <input class="w-full outline-none" type="text" name="username" id="username" placeholder="Enter your username" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="password">Password</label>
                <div class="flex items-center border rounded-lg px-3 py-2">
                    <i class="fas fa-fingerprint text-gray-400 mr-2"></i>
                    <input class="w-full outline-none" type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
            </div>
            <div class="flex justify-center mb-4">
                <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Login</button>
            </div>
        </form>

        <p class="text-center mt-6">Created By - <a href="Lahiru Induwara" class="text-blue-500 hover:underline">Lahiru Induwara</a></p>
    </div>

</body>
</html>

<?php 
//submit btn click or not
if(isset($_POST['submit'])) {
    //get data login
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //check username password
    $sql = "SELECT * FROM table_admin WHERE username='$username' AND `password`='$password'";
    $res = mysqli_query($conn, $sql);

    //count rows check user
    $count = mysqli_num_rows($res);

    if($count == 1) {
        //login success
        $_SESSION['login'] = "<div class ='success text-center'>Login Successful.</div>";
        $_SESSION['user'] = $username; //check logged or not
        //redirect
        header("location:".SITEURL.'admin/index.php');
    } else {
        // login failed user not available
        $_SESSION['login'] = "<div class ='error text-center'>Login Failed. Please check username or password did not match.</div>";
        //redirect
        header("location:".SITEURL.'admin/login.php');
    }
}
?>