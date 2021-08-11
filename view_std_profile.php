<?php
require 'connectfile.php';

$query = "SELECT * FROM `student_table`";
$mysqli_query = mysqli_query($mysqli_connect,$query);

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
    <div class="col-3 bg-success text-light text-center" style="min-height: 600px;"><hr class="bg-light">
    <h2>Dashboard</h2><br>
                <img class="rounded-circle img-fluid " src="pexels-photo-247937.jpeg" alt="" style="height: 150px;"><br><br><br>
                <tr class="text-center">
                <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#admin1"><h5>Manage Students </h5></button>
                </tr><hr class="bg-light">
                <div id="admin1" class="collapse">
                <div class="container-fluid padding">
                <div class="row text-center text-light">
                <a class="text-light" href="add_std.php">Add Student</a>              
                </div>
                <div class="row text-center text-light">
                <a class="text-light" href="view_std_profile.php">View Student's profile</a>              
                </div>
                <div class="row text-center text-light">
                <a class="text-light" href="update_std_profile.php">Update Student's profile</a>
                </div><br>
                </div>
                </div>
                <tr class="text-center">
                <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#admin2"><h5>Manage Staff </h5></button>
                </tr><hr class="bg-light">
                <div id="admin2" class="collapse">
                <div class="container-fluid padding">
                <div class="row text-center text-light">
                <a class="text-light" href="add_staff.php">Add Staff</a>              
                </div>
                <div class="row text-center text-light">
                <a class="text-light" href="view_staff_profile.php">View Staff's profile</a>              
                </div>
                <div class="row text-center text-light">
                <a class="text-light" href="update_staff_profile.php">Update Staff's profile</a>
                </div><br>
                </div>
                </div>
                <tr class="text-center">
                <a href="logout_adm.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
                </tr><hr class="bg-light">

    </div>
    <div class="col-9"><br>
    <h3 class="text-center">View Student Details</h3><br>
    <div class="jumbotron">

        <table class="text-center" align="center" width="100%" cellspacing="1" cellpadding="1">
        <tr>
        <th>ID</th>
        <th>SURNAME</th>
        <th>FIRSTNAME</th>
        <th>OTHERNAME</th>
        <th>REG NO</th>
        <th>PASSWORD</th>
        <th>DEPARTMENT</th>
        <th>LEVEL</th>
        <th>D.O.B</th>
        <th>RELIGION</th>
        <th>STATE</th>
        </tr>

    <?php
    while($row = mysqli_fetch_assoc($mysqli_query)){
        echo "
        <tr>
        <td>{$row['id']}</td>
        <td>{$row['surname']}</td>
        <td>{$row['firstname']}</td>
        <td>{$row['othername']}</td>
        <td>{$row['regno']}</td>
        <td>{$row['password']}</td>
        <td>{$row['department']}</td>
        <td>{$row['level']}</td>
        <td>{$row['d_o_b']}</td>
        <td>{$row['religion']}</td>
        <td>{$row['state']}</td>
        </tr>
        ";
    }
    
    ?>

        </table>
    
    </div>
    
    </div>
    
    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

     <?php include('footer.php');?>