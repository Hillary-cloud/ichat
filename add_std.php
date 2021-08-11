<?php
require 'connectfile.php';

if(isset($_POST['add_std'])){
    $surname = mysqli_real_escape_string($mysqli_connect,$_POST['surname']);
    $firstname = mysqli_real_escape_string($mysqli_connect,$_POST['firstname']);
    $othername = mysqli_real_escape_string($mysqli_connect,$_POST['othername']);
    $religion = mysqli_real_escape_string($mysqli_connect,$_POST['religion']);
    $d_o_b = mysqli_real_escape_string($mysqli_connect,$_POST['d_o_b']);
    $regno = mysqli_real_escape_string($mysqli_connect,$_POST['regno']);
    $password = mysqli_real_escape_string($mysqli_connect,$_POST['password']);
    $department = mysqli_real_escape_string($mysqli_connect,$_POST['department']);
    $level = mysqli_real_escape_string($mysqli_connect,$_POST['level']);
    $state = mysqli_real_escape_string($mysqli_connect,$_POST['state']);
    $faculty = mysqli_real_escape_string($mysqli_connect,$_POST['faculty']);
    $email = mysqli_real_escape_string($mysqli_connect,$_POST['email']);
    $gsm = mysqli_real_escape_string($mysqli_connect,$_POST['gsm']);
    $programme = mysqli_real_escape_string($mysqli_connect,$_POST['programme']);
    $sex = mysqli_real_escape_string($mysqli_connect,$_POST['sex']);
    $marital_status = mysqli_real_escape_string($mysqli_connect,$_POST['marital_status']);
    $entry_year = mysqli_real_escape_string($mysqli_connect,$_POST['entry_year']);
    $lga = mysqli_real_escape_string($mysqli_connect,$_POST['lga']);
    $student_type = mysqli_real_escape_string($mysqli_connect,$_POST['student_type']);
    $jamb_no = mysqli_real_escape_string($mysqli_connect,$_POST['jamb_no']);
    $entry_mode = mysqli_real_escape_string($mysqli_connect,$_POST['entry_mode']);
    $home_town = mysqli_real_escape_string($mysqli_connect,$_POST['home_town']);
    $sponsor_name = mysqli_real_escape_string($mysqli_connect,$_POST['sponsor_name']);
    $sponsor_email = mysqli_real_escape_string($mysqli_connect,$_POST['sponsor_email']);
    $sponsor_address = mysqli_real_escape_string($mysqli_connect,$_POST['sponsor_address']);
    $sponsor_gsm = mysqli_real_escape_string($mysqli_connect,$_POST['sponsor_gsm']);
    $guardian = mysqli_real_escape_string($mysqli_connect,$_POST['guardian']);
    $guardian_email = mysqli_real_escape_string($mysqli_connect,$_POST['guardian_email']);
    $guardian_address = mysqli_real_escape_string($mysqli_connect,$_POST['guardian_address']);
    $guardian_gsm = mysqli_real_escape_string($mysqli_connect,$_POST['guardian_gsm']);
    $grad_year = mysqli_real_escape_string($mysqli_connect,$_POST['grad_year']);


    $query = "INSERT INTO `student_table` (surname,firstname,othername,religion,d_o_b,regno,password,department,level,state,faculty,
    email,gsm,programme,sex,marital_status,entry_year,lga,student_type,jamb_no,entry_mode,home_town,sponsor_name,sponsor_email,sponsor_address,
    sponsor_gsm,guardian,guardian_email,guardian_address,guardian_gsm,grad_year)
    VALUES ('$surname','$firstname','$othername','$religion','$d_o_b','$regno','$password','$department','$level','$state','$faculty',
    '$email','$gsm','$programme','$sex','$marital_status','$entry_year','$lga','$student_type','$jamb_no','$entry_mode','$home_town',
    '$sponsor_name','$sponsor_email','$sponsor_address','$sponsor_gsm','$guardian','$guardian_email','$guardian_address','$guardian_gsm','$grad_year')";

    $mysqli_query = mysqli_query($mysqli_connect,$query);
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
                
                <label> <strong>Surname: </strong></label>
                <input name="surname" class="float-right" type="text" required/><br/>
                <label> <strong>Firstname: </strong></label>
                <input name="firstname" class="float-right" type="text" required /> <br/>
                <label> <strong>Othername: </strong></label>
                <input name="othername" type="text" class="float-right "required/><br/>
                <label> <strong>Religion: </strong></label>
                <input name="religion" class="float-right" type="text" required /> <br/>
                <label> <strong>Date of Birth: </strong></label>
                <input name="d_o_b" type="text" class="float-right" placeholder="dd/mm/yy" required /> <br/>
                <label> <strong>Faculty: </strong></label>
                <input name="faculty" class="float-right" type="text" required/><br/>
                <label> <strong>Email: </strong></label>
                <input name="email" class="float-right" type="text" required /> <br/>
                <label> <strong>Mobile No: </strong></label>
                <input name="gsm" type="text" class="float-right "required/><br/>
                <label> <strong>Home Town: </strong></label>
                <input name="home_town" type="text" class="float-right" required /> <br/>
                <label> <strong>Programme: </strong></label>
                <select name="programme" class="float-right" id="">
                <option value="B.SC">B.SC</option>
                <option value="M.SC">M.SC</option>
                </select><br>
                <label> <strong>Sex: </strong></label>
                <select name="sex" class="float-right" id="">
                <option value="male">male</option>
                <option value="female">female</option>
                </select><br>
                <label> <strong>Marital Status: </strong></label>
                <select name="marital_status" class="float-right" id="">
                <option value="single">single</option>
                <option value="married">married</option>
                </select><br>
                <label> <strong>Entry Year: </strong></label>
                <input name="entry_year" class="float-right" type="text" required /> <br/>
                <label> <strong>LGA: </strong></label>
                <input name="lga" type="text" class="float-right" required /> <br/>
                <label> <strong>Student Type: </strong></label>
                <select name="student_type" class="float-right" id="">
                <option value="undergraduate">Undergraduate</option>
                <option value="post graduate">Post Graduate</option>
                </select><br>
                <label> <strong>Jamb No: </strong></label>
                <input name="jamb_no" type="text" class="float-right" required /> <br/>
                <label> <strong>Mode of Entry: </strong></label>
                <select name="entry_mode" class="float-right" id="">
                <option value="UTME">UTME</option>
                <option value="DIRECT ENTRY">DIRECT ENTRY</option>
                </select><br>
                
                </div>

                <div class="col-6 ">
                <label> <strong>Regno: </strong></label>
                <input name="regno" class="float-right" type="text" required /> <br/>
                <label> <strong>Password: </strong></label>
                <input name="password" class="float-right" type="password" class="form-control" required /> <br/>
                <label> <strong>Department:</strong></label>
                <select name="department" class="float-right" id="">
                <option value="computer science">Computer Science</option>
                <option value="mathematics">Mathematics</option>
                <option value="statistics">Statistics</option>
                </select><br>
                <label> <strong>Level:</strong></label>
                <select name="level" class="float-right" id="">
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
                </select><br>
                <label> <strong>State:</strong></label>
                <select name="state" class="float-right" id="">
                <option value="enugu">Enugu</option>
                <option value="anambra">Anambra</option>
                <option value="ebonyi">Ebonyi</option>
                <option value="delta">Delta</option>
                </select><br>
                <label> <strong>Sponsor Name: </strong></label>
                <input name="sponsor_name" class="float-right" type="text" required/><br/>
                <label> <strong>Sponsor Email: </strong></label>
                <input name="sponsor_email" class="float-right" type="text" required /> <br/>
                <label> <strong>Sponsor Mobile No: </strong></label>
                <input name="sponsor_gsm" type="text" class="float-right "required/><br/>
                <label> <strong>Sponsor Address: </strong></label>
                <input name="sponsor_address" class="float-right" type="text" required /> <br/>
                <label> <strong>Guardian: </strong></label>
                <input name="guardian" type="text" class="float-right" required /> <br/>
                <label> <strong>Guardian Address: </strong></label>
                <input name="guardian_address" class="float-right" type="text" required /> <br/>
                <label> <strong>Guardian Email: </strong></label>
                <input name="guardian_email" type="text" class="float-right" required /> <br/>
                <label> <strong>Guardian Mobile No: </strong></label>
                <input name="guardian_gsm" type="text" class="float-right" required /> <br/>
                <label> <strong>Graduation Year: </strong></label>
                <select name="grad_year" class="float-right" id="">
                <option value="2019-2020">2019-2020</option>
                <option value="2020-2021">2020-2021</option>
                <option value="2021-2022">2021-2022</option>
                <option value="2022-2023">2022-2023</option>
                </select><br>
                
                
                
                </div> </div><br>
                <button class="btn btn-primary" name="add_std">Add student</button>
                </form>


    </div>
    
    </div>
    
    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

    <?php include('footer.php');?>