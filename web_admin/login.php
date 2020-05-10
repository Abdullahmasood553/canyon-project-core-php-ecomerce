<?php
session_start();
//session_regenerate_id(true);
include("connection.php");
$check=0;

if(isset($_POST['submit']))
{
$username = $_POST['user_name'];
$password = $_POST['password'];

$query=mysqli_query($connection,"select user_id from admin_login where user_name='$username' and user_password='$password'")or die ("query 1 incorrect.......");

list($user_id)=mysqli_fetch_array($query);

$_SESSION['user_id']=$user_id;
header("location: index.php");

$check=1;

if($check==0)
{
$check=2;
}

mysqli_close($connection);
}
?>





<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="index.php"><img class="logo-img" width="250px;" src="assets/images/canyon.png" alt="logo"></a></div>
            <div class="card-body">
                <form action="login.php" method="POST" enctype="multpart/form-data">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="user_name"  id="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password"  name="password" type="password" placeholder="Password">
                    </div>
                    <button type="submit" name="submit"  class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>