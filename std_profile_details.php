<?php
require 'connectfile.php';
function getUsersData($id){
    $mysqli_host = 'localhost';
    $mysqli_user = 'root';
    $mysqli_pass = '';
    $mysqli_db = 'sims';

    $mysqli_connect = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db);
    
    $array = array();
    $query = "SELECT * FROM `student_table` WHERE `id`='".$id."'";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
    while($row = mysqli_fetch_assoc($mysqli_query)){
        $array['id']=$row['id'];
        $array['surname']=$row['surname'];
        $array['firstname']=$row['firstname'];
        $array['othername']=$row['othername'];
        $array['regno']=$row['regno'];
        $array['faculty']=$row['faculty'];
        $array['department']=$row['department'];
        $array['level']=$row['level'];
        $array['d_o_b']=$row['d_o_b'];
        $array['religion']=$row['religion'];
        $array['state']=$row['state'];
        $array['gsm']=$row['gsm'];
        $array['lga']=$row['lga'];
        $array['email']=$row['email'];
        $array['sex']=$row['sex'];
        $array['blood_group']=$row['blood_group'];
        $array['genotype']=$row['genotype'];
        $array['home_town']=$row['home_town'];
        $array['sponsor_name']=$row['sponsor_name'];
        $array['sponsor_address']=$row['sponsor_address'];
        $array['sponsor_gsm']=$row['sponsor_gsm'];
        $array['sponsor_email']=$row['sponsor_email'];
        $array['sponsor_relationship']=$row['sponsor_relationship'];
        $array['guardian']=$row['guardian'];
        $array['guardian_address']=$row['guardian_address'];
        $array['guardian_gsm']=$row['guardian_gsm'];
        $array['guardian_email']=$row['guardian_email'];
        $array['sponsor_relationship']=$row['sponsor_relationship'];
        $array['programme']=$row['programme'];
        $array['student_type']=$row['student_type'];
        $array['jamb_no']=$row['jamb_no'];
        $array['entry_mode']=$row['entry_mode'];
        $array['entry_year']=$row['entry_year'];
        $array['grad_year']=$row['grad_year'];

    }
    return $array;
}

function getId($regno){
    $mysqli_host = 'localhost';
    $mysqli_user = 'root';
    $mysqli_pass = '';
    $mysqli_db = 'sims';

    $mysqli_connect = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db);

    $query = "SELECT `id` FROM `student_table` WHERE `regno`='".$regno."'";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
    while($row = mysqli_fetch_assoc($mysqli_query)){
        return $row['id'];
    }
}

?>
<!--this is the student page header file -->
<?php include("std_header.php");?>

    <div class="col-9"><br>
    <?php
    if(isset($_SESSION['regno'])){
        $usersData = getUsersData(getId($_SESSION['regno']));
    }
 /*   if(isset($_POST['update'])){
        $id = $_POST['id'];
        $home_town = $_POST['home_town'];
        $gsm = $_POST['gsm'];
        $email = $_POST['email'];
        $sponsor_name = $_POST['sponsor_name'];
        $sponsor_address = $_POST['sponsor_address'];
        $sponsor_gsm = $_POST['sponsor_gsm'];
        $d_o_b = $_POST['d_o_b'];
        $sponsor_email = $_POST['sponsor_email'];
        $guardian = $_POST['guardian'];
        $guardian_gsm = $_POST['guardian_gsm'];
        $guardian_email = $_POST['guardian_email'];
        $guardian_address = $_POST['guardian_address'];
        
        $query_update = "UPDATE `student_table` SET `d_o_b`='".$d_o_b."',`home_town`='".$home_town."',`gsm`='".$gsm."',`email`='".$email."',
        `sponsor_name`='".$sponsor_name."',`sponsor_address`='".$sponsor_address."',`sponsor_gsm`='".$sponsor_gsm."',`sponsor_email`='".$sponsor_email."',
        `guardian`='".$guardian."',`guardian_gsm`='".$guardian_gsm."',`guardian_email`='".$guardian_email."',`guardian_address`='".$guardian_address."' WHERE `id`='".$id."'";
        $mysqli_query = mysqli_query($mysqli_connect,$query_update);
        
    
    }*/?>
    <h3 class="text-center">Student Profile Details</h3><br>
    <div class=" jumbotron">
    <div class="card">
        <div class="card-body">
<form action="" method="post">
<h4 class="text-center"><strong>STUDENT PERSONAL INFORMATION</strong></h4><hr>
<div class="row ">
<div class="col-8">
        <label> <strong>Surname:  </strong></label><input name="surname" style="width: 400px;" class="float-right" type="text" value=<?php echo ucfirst($usersData['surname']); ?> disabled><br>
        <label> <strong>Firstname: </strong></label><input name="firstname" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['firstname']); ?> disabled><br>
        <label> <strong>Othernames: </strong></label><input name="othername" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['othername']); ?> disabled><br>
        <label> <strong>Sex:        </strong></label><input name="sex" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['sex']); ?> disabled><br>
        <label> <strong>Date of Birth: </strong></label><input name="d_o_b" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['d_o_b']); ?>><br>       
        <label> <strong>State of Origin: </strong></label><input name="state" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['state']); ?> disabled><br>
        <label> <strong>LGA of Origin: </strong></label><input name="lga" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['lga']); ?> disabled><br>
        <label> <strong>Home Town: </strong></label><input name="home_town" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['home_town']); ?>><br>
        <label> <strong>Mobile Phone: </strong></label><input name="gsm" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['gsm']); ?>><br>
        <label> <strong>Blood Group: </strong></label><input name="blood_group" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['blood_group']); ?> disabled><br>       
        <label> <strong>Genotype: </strong></label><input name="genotype" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['genotype']); ?> disabled><br>
        <label> <strong>Religion: </strong></label><input name="religion" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['religion']); ?> disabled><br>
        <label> <strong>Email: </strong></label><input name="email" type="text" style="width: 400px;" class="float-right" value=<?php echo ucfirst($usersData['email']); ?>><br>
     </div>

     <div class="col-4 text-center">
     <p class="text-center">Student Passport</p>    
     <img class="img-fluid " src="images\IMG_20180624_183409.jpg" alt="" style="height: 150px; width: 150px;">
     </div>
    </div><br>
    <h5 class="text-center"><strong>SPONSOR AND NEXT OF KIN DETAILS</strong></h5>
    <hr>

    <div class="row">
        <div class="col-6">
        <label> <strong>Sponsor's Name:  </strong></label><input name="sponsor_name" style="width: 200px;" class="float-right" type="text" value=<?php echo ucfirst($usersData['sponsor_name']); ?>><br>
        <label> <strong>Sponsor's Address: </strong></label><input name="sponsor_address" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['sponsor_address']); ?>><br>
        <label> <strong>Sponsor's Mobile No: </strong></label><input name="sponsor_gsm" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['sponsor_gsm']); ?>><br>
        <label> <strong>Sponsor's Email:        </strong></label><input name="sponsor_email" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['sponsor_email']); ?>><br>
        <label> <strong>Relationship: </strong></label><input name="sponsor_relationship" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['sponsor_relationship']); ?> disabled><br>       
        </div>
        <div class="col-6">
        <label> <strong>Next of Kin Name:  </strong></label><input name="guardian" style="width: 200px;" class="float-right" type="text" value=<?php echo ucfirst($usersData['guardian']); ?>><br>
        <label> <strong>Next of Kin Address: </strong></label><input name="guardian_address" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['guardian_address']); ?>><br>
        <label> <strong>Next of Kin Mobile No: </strong></label><input name="guardian_gsm" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['guardian_gsm']); ?>><br>
        <label> <strong>Next of Kin Email:        </strong></label><input name="guardian_email" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['guardian_email']); ?>><br>
        <label> <strong>Relationship: </strong></label><input name="sponsor_relationship" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['sponsor_relationship']); ?> disabled><br>       
        </div>
    </div>
    <br>

    <h5 class="text-center"><strong>PROGRAMME DETAILES<strong></h5>
    <hr>

    <div class="row">
        <div class="col-6">
        <label> <strong>Department:  </strong></label><input name="department" style="width: 200px;" class="float-right" type="text" value=<?php echo ucfirst($usersData['department']); ?> disabled><br>
        <label> <strong>Faculty: </strong></label><input name="faculty" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['faculty']); ?> disabled><br>
        <label> <strong>Programme: </strong></label><input name="programme" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['programme']); ?> disabled><br>
        <label> <strong>Matric No:        </strong></label><input name="regno" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['regno']); ?> disabled><br>
        <label> <strong>Jamb No: </strong></label><input name="jamb_no" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['jamb_no']); ?> disabled><br>       
        </div>
        <div class="col-6">
        <label> <strong>Mode of Entry:  </strong></label><input name="entry_mode" style="width: 200px;" class="float-right" type="text" value=<?php echo ucfirst($usersData['entry_mode']); ?> disabled><br>
        <label> <strong>Entry Year: </strong></label><input name="entry_year" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['entry_year']); ?> disabled><br>
        <label> <strong>Year of Graduation: </strong></label><input name="grad_year" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['grad_year']); ?> disabled><br>
        <label> <strong>Year of Study:        </strong></label><input name="level" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['level']); ?> disabled><br>
        <label> <strong>Student Type: </strong></label><input name="student_type" type="text" style="width: 200px;" class="float-right" value=<?php echo ucfirst($usersData['student_type']); ?> disabled><br>       
        </div>
        
    </div><br>
    <h class="text-left"><em>Declaration</em></h6>
    <hr>
    <p class="text-center"><em>I certify that the information given in this form is to the best of my knowledge and belief, correct and complete</em></p>
    <button class="btn btn-primary text-center d-none" name="update">Submit</button>
    </div>
    </form>

    
    </div>
    </div></div>
    </div>
    </div>    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

 <?php include('footer.php');?>