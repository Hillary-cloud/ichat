<?php
require 'connectfile.php';

$query = "SELECT * FROM `staff_table2`";
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
    <h3 class="text-center">Update Staff Profile</h3><br>
    <div class="jumbotron">
    
    <table>
    <tr>
    <th>SURNAME</th>
    <th>FIRSTNAME</th>
    <th>OTHERNAME</th>
    <th>STAFF NO</th>
    <th>PASSWORD</th>
    <th>EMAIL</th>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($mysqli_query)){
        echo "<tr><form method=post>";
        echo "<td><input type=text name=surname value='".$row['surname']."'></td>";
        echo "<td><input type=text name=firstname value='".$row['firstname']."'></td>";
        echo "<td><input type=text name=othername value='".$row['othername']."'></td>";
        echo "<td><input type=text name=staffno value='".$row['staffno']."'></td>";
        echo "<td><input type=text name=password value='".$row['password']."'></td>";
        echo "<td><input type=text name=email value='".$row['email']."'></td>";
        echo "<td><input type=hidden name=id value='".$row['id']."'></td>";
        echo "<td><input type=submit value=Update></td>";
       echo "</tr></form>";
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
     
<?php
$query_update = "UPDATE `staff_table2` SET surname='$_POST[surname]',firstname='$_POST[firstname]',othername='$_POST[othername]',
staffno='$_POST[staffno]',password='$_POST[password]',email='$_POST[email]' WHERE id='$_POST[id]'";
$mysqli_query_update = mysqli_query($mysqli_connect,$query_update);
?>