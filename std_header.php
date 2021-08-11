
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<!--Navigation bar starts-->
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
<img class="img-thumbnail img-fluid " src="logo-cdel-new.png" alt="" style="width:50px; height:50px;">
<a class="navbar-brand" href=""> <h3>Student Information Management System</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only"></span>
                    </a>
                </li>
                
            </ul>
        </div>
    </nav>
    <!--Navigation bar ends-->

    <!--Side bar starts-->

<div class="container-fluid">
    <div class="row">
    <div class="col-3 bg-success text-light text-center" style="min-height: 600px;"><hr class="bg-light">
    <h2>Studentinfo</h2><br>
        
                <img class="rounded-circle img-fluid " src="images\IMG_20180624_183409.jpg" alt="" style="height: 100px; width: 100px;"><br><br><br>
                <tr class="text-center"> 
                <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#student1">  <h5> <i class="fa fa-user"></i>PROFILE</h5></button>
                </tr><hr class="bg-light">
                <div id="student1" class="collapse">
                <div class="container-fluid padding">
                <div class="row text-center text-light">
                <a class="text-light" href="change_pass.php">Change Password</a>              
                </div>
                <div class="row text-center text-light">
                <a class="text-light" href="std_profile_details.php">Student Profile Details</a>              
                </div><br>
                </div>
                </div>
                <tr class="text-center">
                <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#student2"><h5>SCHOOL FEES</h5></button>
                </tr><hr class="bg-light">
                <div id="student2" class="collapse">
                <div class="container-fluid padding">
                <div class="row text-center text-light">
                <a class="text-light" href="pay_school_fees.php">Pay School Fees</a>              
                </div>
                <div class="row text-center text-light">
                <a class="text-light" href="get_invoice.php">Get School Fees Invoice</a>              
                </div>
                <div class="row text-center text-light">
                <a class="text-light" href="school_fees_history.php">School Fees History</a>
                </div><br>
                </div>
                </div>
                <tr class="text-center">
                <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#student3"><h5>COURSE REGISTRATION</h5></button>
                </tr><hr class="bg-light">
                <div id="student3" class="collapse">
                <div class="container-fluid padding">
                <div class="row text-center text-light">
                <a class="text-light" href="register_courses.php">Register Courses</a>              
                </div>
                <div class="row text-center text-light">
                <a class="text-light" href="reprint_registered_courses.php">Reprint Registered Courses</a>              
                </div><br>
                </div>
                </div>
                <tr class="text-center">
                <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#student4"><h5>HOSTEL ALLOCATION</h5></button>
                </tr><hr class="bg-light">
                <div id="student4" class="collapse">
                <div class="container-fluid padding">
                <div class="row text-center text-light">
                <a class="text-light" href="hostel_fee.php">Pay For Hostel</a>              
                </div>
                <br>
                </div>
                </div>
                <tr class="text-center">
                <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#student5"><h5>RESULTS</h5></button>
                </tr><hr class="bg-light">
                <div id="student5" class="collapse">
                <div class="container-fluid padding">
                <div class="row text-center text-light">
                <a class="text-light" href="view_result.php">View Results</a>              
                </div><br>
                </div>
                </div>
                <tr class="text-center">
                <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#student6"><h5>CLEARANCE</h5></button>
                </tr><hr class="bg-light">
                <div id="student6" class="collapse">
                <div class="container-fluid padding">
                <div class="row text-center text-light">
                <a class="text-light" href="view_clearance.php">View Clearance</a>              
                </div><br>
                </div>
                </div>
                <tr class="text-center">
                <a href="logout_std.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
                </tr><hr class="bg-light">

    </div>