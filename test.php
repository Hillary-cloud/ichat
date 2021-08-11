<?php
require 'connectfile.php';

/*if(isset($_POST['add_random'])){
    $surname = mysqli_real_escape_string($mysqli_connect,$_POST['surname']);
    
    $query = "INSERT INTO `school_fees_payment` (reference_code,surname) VALUES " . "(FLOOR(1000000000 + RAND() * 9000000000),'$surname')";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
}*/
if(isset($_POST['add_random'])){
    
    $surname = mysqli_real_escape_string($mysqli_connect,$_POST['surname']);
    $firstname = mysqli_real_escape_string($mysqli_connect,$_POST['firstname']);
    $othername = mysqli_real_escape_string($mysqli_connect,$_POST['othername']);
    $regno = mysqli_real_escape_string($mysqli_connect,$_POST['regno']);
    $gsm = mysqli_real_escape_string($mysqli_connect,$_POST['gsm']);
    $student_type = mysqli_real_escape_string($mysqli_connect,$_POST['student_type']);
    $level = mysqli_real_escape_string($mysqli_connect,$_POST['level']);
    $email = mysqli_real_escape_string($mysqli_connect,$_POST['email']);
    $department = mysqli_real_escape_string($mysqli_connect,$_POST['department']);
    
    $query2 = "INSERT INTO `school_fees_payment` (reference_code,surname,firstname,othername,regno,gsm,student_type,level,email,department)
     VALUES " . "(FLOOR(1000000000 + RAND() * 9000000000),'$surname','$firstname','$othername','$regno','$gsm','$student_type','$level','$email','$department')";
    $mysqli_query = mysqli_query($mysqli_connect,$query2);
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
    <h3 class="text-center">Add Student</h3><br>
    <div class="jumbotron">

    <form action="" method="post">
<div class="row">
<div class=" col-6 ">
<label> <strong>id: </strong></label><input name="id" type="text" style="width: 400px;" class="d-none form-control float-right" > <br><br>
        <label> <strong>Firstname: </strong></label><input name="firstname" type="text" style="width: 400px;" class=" form-control float-right"  > <br><br>
        <label> <strong>Department: </strong></label><input name="department" type="text" style="width: 400px;" class=" form-control float-right"  > ><br><br>
        <label> <strong>Othername:  </strong></label><input name="othername" style="width: 400px;" class="form-control float-right" type="text" value=<?php// echo ucfirst($usersData['othername']); ?> ><br><br>
        <label> <strong>Mobile No: </strong></label><input name="gsm" type="text" style="width: 400px;" class="form-control float-right" value=<?php //echo ucfirst($usersData['gsm']); ?>  ><br><br>
        <label> <strong>Email Address: </strong></label><input name="email" type="text" style="width: 400px;" class="form-control float-right" value=<?php //echo ucfirst($usersData['email']); ?> ><br><br>
        <label> <strong>Student Type:        </strong></label><input name="student_type" type="text" style="width: 400px;" class="form-control float-right" value=<?php echo ucfirst($usersData['student_type']); ?> ><br><br>
        <label> <strong>Current Level: </strong></label><input name="level" type="text" style="width: 400px;" class="form-control float-right" value=<?php echo $level['level']; ?> ><br><br>
        <label> <strong>Matric No: </strong></label><input name="regno" type="text" style="width: 400px;" class="form-control float-right" value=<?php //echo ucfirst($usersData['regno']); ?> ><br><br>
                <label> <strong>Surname: </strong></label>
                <input name="surname" class="float-right" type="text" required/><br/>          
                </div> </div><br>
                <button class="btn btn-primary" name="add_random">Add random</button>
                </form>


    </div>
    
    </div>
    
    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

    <?php include('footer.php');?>