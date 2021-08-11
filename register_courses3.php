<?php 
require 'connectfile.php';

function getUsersData($id){
    $mysqli_host = 'localhost';
    $mysqli_user = 'root';
    $mysqli_pass = '';
    $mysqli_db = 'sims';

    $mysqli_connect = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db);

    $array = array();
    $query = "SELECT * FROM `student_table` WHERE `id`='$id'";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
    while($row = mysqli_fetch_assoc($mysqli_query)){
        $array['id']=$row['id'];
        $array['surname']=$row['surname'];
        $array['firstname']=$row['firstname'];
        $array['othername']=$row['othername'];
        $array['regno']=$row['regno'];
        $array['gsm']=$row['gsm'];
        $array['religion']=$row['religion'];
        $array['level']=$row['level'];
        $array['email']=$row['email'];
        $array['d_o_b']=$row['d_o_b'];
        $array['faculty']=$row['faculty'];
        $array['home_town']=$row['home_town'];
        $array['programme']=$row['programme'];
        $array['sex']=$row['sex'];
        $array['entry_year']=$row['entry_year'];
        $array['lga']=$row['lga'];
        $array['state']=$row['state'];
        $array['sponsor_name']=$row['sponsor_name'];
        $array['sponsor_gsm']=$row['sponsor_gsm'];
        $array['sponsor_address']=$row['sponsor_address'];
        $array['department']=$row['department'];


    }
    return $array;
}
if(isset($_SESSION['regno'])){
    $usersData = getUsersData(getId($_SESSION['regno']));
}

function getId($regno){
    $mysqli_host = 'localhost';
    $mysqli_user = 'root';
    $mysqli_pass = '';
    $mysqli_db = 'sims';

    $mysqli_connect = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db);

    $query = "SELECT `id` FROM `student_table` WHERE `regno`='$regno'";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
    while($row = mysqli_fetch_assoc($mysqli_query)){
        return $row['id'];
    }
}

?>


<?php include("std_header.php");?>
<div class="col-9"><br>
    
    <h3 class="text-left">COURSE REGISTRATION FORM</h3><hr>
    <div class="jumbotron">
    <div id="div1" class="card">
        <div class="card-body">
        <h5 class="text-center"><strong>CENTER FOR DISTANCE AND E-LEARNING</strong></h5>
        <h6 class="text-center"><strong>COURSE REGISTRATION FORM</strong></h6>

        <div class="row">

            <div class="col-2">
            <p>Surname:</p>
            <p>Matric No:</p>
            <p>Level:</p>
            <p>Faculty:</p><br>
            <p>Email:</p><br>
            <p>Programme:</p>
            <p>Sponsor Name:</p>
            </div>
            <div class="col-2">
            <p><?php echo ucfirst($usersData['surname']); ?></p>
            <p><?php echo ucfirst($usersData['regno']); ?></p>
            <p><?php echo ucfirst($usersData['level']); ?> Level</p>
            <p><?php echo ucfirst($usersData['faculty']); ?></p>
            <p><?php echo ucfirst($usersData['email']); ?></p>
            <p><?php echo ucfirst($usersData['programme']); ?></p>
            <p><?php echo ucfirst($usersData['sponsor_name']); ?></p>
            
            </div>

            <div class="col-2">
            <p>Firstname:</p>
            <p>Sex:</p>
            <p>GSM:</p>
            <p>Department:</p><br>
            <p>State:</p>
            <p>LGA:</p>
            <p>Sponsor Address:</p>
            </div>
            <div class="col-2">
            <p><?php echo ucfirst($usersData['firstname']); ?></p>
            <p><?php echo ucfirst($usersData['sex']); ?></p>
            <p><?php echo ucfirst($usersData['gsm']); ?></p>
            <p><?php echo ucfirst($usersData['department']); ?></p>
            <p><?php echo ucfirst($usersData['state']); ?></p>
            <p><?php echo ucfirst($usersData['lga']); ?></p>
            <p><?php echo ucfirst($usersData['sponsor_address']); ?></p>
            </div>

            <div class="col-2">
            <p>Othername:</p>
            <p>Birth Date:</p>
            <p>Home Town:</p>
            <p>Religion:</p>
            <p>Entry Year</p>
            <p>Sponsor GSM:</p>
            </div>
            <div class="col-2">
            <p><?php echo ucfirst($usersData['othername']); ?></p>
            <p><?php echo ucfirst($usersData['d_o_b']); ?></p>
            <p><?php echo ucfirst($usersData['home_town']); ?></p>
            <p><?php echo ucfirst($usersData['religion']); ?></p>
            <p><?php echo ucfirst($usersData['entry_year']); ?></p>
            <p><?php echo ucfirst($usersData['sponsor_gsm']); ?></p>
            </div>
        </div><br>
        <p class="text-center"><strong>REGISTERED COURSES</strong></p>

    <form action="register_courses3.php" method='post'>
    <table class="text-center" border align="center" width="100%" cellspacing="1" cellpadding="1">
        <tr>
        <th>S/N</th>
        <th class="text-left">COURSE</th>
        <th class="text-left">SEMESTER</th>
        <th class="text-left">COURSE TITLE</th>
        <th class="text-left">UNIT</th>
        <th class="text-left">SUBMITTED</th>
        <th class="text-left">APPROVED</th>
        </tr>   
       
    <?php
if(isset($_POST['register'])){

  $semester = 'semester';
  $course='course';
  $unit_load='unit_load';
  $course_title='course_title';
  $i = 1;
  
  foreach($_POST['id'] as $id):

    $query =  "SELECT * FROM `computer_sci`WHERE `id`= '$id' ";
    $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));

    //$query2 = "INSERT INTO `registered_courses` (semester,course,unit_load,course_title) VALUES ('$semester','$course','$unit_load','$course_title') ";
    //$mysqli_query2 = mysqli_query($mysqli_connect,$query2) or die(mysqli_error($mysqli_connect));

    while($row=mysqli_fetch_array($mysqli_query)){?>

    <tr>
        <td><?php echo $i; ?></td>
        <td class="text-left"><?php echo $row['course'];?> </td>
        <td class="text-left"><?php echo $row['semester'];?></td>
        <td class="text-left"><?php echo $row['course_title'];?></td>
        <td class="text-left"><?php echo $row['unit_load'];?></td>
        <td class="text-center"><img src="images/6irooGn5T.jpg" style="height:20px; width:20px; " alt=""></td>
        <td class="text-center"><img src="images/uncheck-icon-24.jpg" style="height:20px; width:20px; " alt=""></dh>
        </tr>
        

 
 <?php $i++;

}  
endforeach; } ?>
   

 </table><br>
 </form>
 <div class="row">
    <div class="col-6">
        <p>Academic Advisor's Name & Signature: ______________</p>
        <p>Head of Department's Name & Signature: ____________</p>
        <p>Faculty Officer's Name & Signature: ________________</p>
    </div>
    <div class="col-6 text-right">
    <p>Date:_________________</p>
    <p>Date:_________________</p>
    <p>Date:_________________</p>
    </div>
 </div>

    </div>
    </div>
    <button onclick="printContent('div1')"class="btn btn-primary">Print</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;

        }
    </script>
   
    

<?php include('footer.php');?>