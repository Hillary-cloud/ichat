<?php
require 'connectfile.php';

if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM `admin_table` WHERE `username`='$username' AND `password`='$password'";
$mysqli_query = mysqli_query($mysqli_connect,$query);
$mysqli_num_rows = mysqli_num_rows($mysqli_query);

if($mysqli_num_rows == 1){
    header('location: adm_dashboard.php');
    $_SESSION['username']=$username;
}else{
    mysqli_error();
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/bootstrapjquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proper.js"></script>
    <title>Document</title>
</head>
<body>
<!--Navigation bar starts-->
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
<img class="img-thumbnail img-fluid " src="logo-cdel-new.png" alt="" style="width:50px; height:50px;">
<a class="navbar-brand" href=""><h3>Student Information Management System</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!--Navigation bar ends-->

    <!--Side bar starts-->

<div class="container-fluid">
    <div class="row">
    <div class="col-3 bg-success text-light text-center" style="min-height: 600px;"><hr class="bg-light"><br><br>
                <tr class="text-center">
                <a href="adm_login.php"><button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#admin1"><h5>Admin </h5></button></a>
                </tr><hr class="bg-light">
                <tr class="text-center">
                <a href="staff_login.php"><button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#admin2"><h5>Staff </h5></button></a>
                </tr><hr class="bg-light">
                <tr class="text-center">
                <a href="stu_login.php"><button class="fun btn btn-light w-100"  data-toggle="collapse" data-target="#admin3"><h5>Student </h5></button></a>
                </tr><hr class="bg-light">

    </div>
    <div class="col-9"><br>
    <h3 class="text-center">Login as an admin here</h3><br>
    <div class="jumbotron">

    <h2><strong><em>Login<em></strong></h2>
    <form action="" method="post"><hr class="bg-dark">
    <div class="form-group">
    <label for="">Username</label><br>
    <input class="form-control" type="text" name="username" placeholder="Enter your username here">
    </div>
    <div class="form-group">
    <label for="">Password</label><br>
    <input class="form-control" type="password" name="password" placeholder="Enter your password here">
    </div><br>
    <button class="btn btn-warning " name="submit">Login</button>
    </form>
    
    </div>
    
    </div>
    
    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

     <?php include('footer.php');?>