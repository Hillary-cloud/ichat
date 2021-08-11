<?php
require 'connectfile.php';

function getUsersData($id){
    $mysqli_host = 'localhost';
    $mysqli_user = 'root';
    $mysqli_pass = '';
    $mysqli_db = 'sims';

    $mysqli_connect = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db);

    $array = array();
    $query = "SELECT `id`,`surname`,`firstname`,`othername`,`regno`,`gsm`,`student_type`,`level`,
    `email`,`department` FROM `student_table` WHERE `id`='$id'";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
    while($row = mysqli_fetch_assoc($mysqli_query)){
        $array['id']=$row['id'];
        $array['surname']=$row['surname'];
        $array['firstname']=$row['firstname'];
        $array['othername']=$row['othername'];
        $array['regno']=$row['regno'];
        $array['gsm']=$row['gsm'];
        $array['student_type']=$row['student_type'];
        $array['level']=$row['level'];
        $array['email']=$row['email'];
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

    $query = "SELECT `id` FROM `student_table` WHERE `regno`='".$regno."'";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
    while($row = mysqli_fetch_assoc($mysqli_query)){
        return $row['id'];
    }
}

    

?>

<?php
     if(isset($_POST['generate_invoice'])){
    
        $surname = mysqli_real_escape_string($mysqli_connect,$_POST['surname']);
        $firstname = mysqli_real_escape_string($mysqli_connect,$_POST['firstname']);
        $othername = mysqli_real_escape_string($mysqli_connect,$_POST['othername']);
        $regno = mysqli_real_escape_string($mysqli_connect,$_POST['regno']);
        $gsm = mysqli_real_escape_string($mysqli_connect,$_POST['gsm']);
        $student_type = mysqli_real_escape_string($mysqli_connect,$_POST['student_type']);
        $level = mysqli_real_escape_string($mysqli_connect,$_POST['level']);
        $email = mysqli_real_escape_string($mysqli_connect,$_POST['email']);
        $department = mysqli_real_escape_string($mysqli_connect,$_POST['department']);
        $section = mysqli_real_escape_string($mysqli_connect,$_POST['section']);
        
        $query = "INSERT INTO `school_fees_payment` (reference_code,surname,firstname,othername,regno,gsm,student_type,level,email,department,section)
         VALUES " . "(FLOOR(1000000000 + RAND() * 9000000000),'$surname','$firstname','$othername','$regno','$gsm','$student_type','$level','$email','$department','$section')";
        $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));

        if ($mysqli_query==true) {
            header("location: get_invoice2.php");
        }else {
            mysqli_error();
        }
     }
     ?>
<!--this is the student page header file -->
<?php include("std_header.php");?>
    
    <div class="col-9"><br>
    <h3 class=""><strong>GENERATE INVOICE</strong></h5><hr><br>
    <div class="jumbotron">
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
            <table class="text-left" border width="100%" >
            <tr>
        <td><label> <strong>Surname: </strong></label><input name="surname" type="text" style="width: 400px;" class=" form-control float-right" value=<?php echo ucfirst($usersData['surname']); ?> required ></td>
        </tr>
        <tr>
        <td><label> <strong>Firstname: </strong></label><input name="firstname" type="text" style="width: 400px;" class=" form-control float-right" value=<?php echo ucfirst($usersData['firstname']); ?> required ></td>
        </tr>
        <tr>
        <td><label> <strong>Othername:  </strong></label><input name="othername" style="width: 400px;" class="form-control float-right" type="text" value=<?php echo ucfirst($usersData['othername']); ?> required ></td>
        </tr>
        <tr>
        <td><label> <strong>Department: </strong></label><input name="department" type="text" style="width: 400px;" class=" form-control float-right" value=<?php echo ucfirst($usersData['department']); ?> required ></td>
        </tr>
        <tr>
        <td><label> <strong>Mobile No: </strong></label><input name="gsm" type="text" style="width: 400px;" class="form-control float-right" value=<?php echo ucfirst($usersData['gsm']); ?> required  ></td>
        </tr>
        <tr>
        <td><label> <strong>Email Address: </strong></label><input name="email" type="text" style="width: 400px;" class="form-control float-right" value=<?php echo ucfirst($usersData['email']); ?> required ></td>
        </tr>
        <tr>
        <td><label> <strong>Student Type:        </strong></label><input name="student_type" type="text" style="width: 400px;" class="form-control float-right" value=<?php echo ucfirst($usersData['student_type']); ?> required ></td>
        </tr>
        <tr>
        <td><label> <strong>Current Level: </strong></label><input name="level" type="text" style="width: 400px;" class="form-control float-right" value=<?php echo ucfirst($usersData['level']); ?> required ></td>
        </tr>
        <tr>
        <td><label> <strong>Matric No: </strong></label><input name="regno" type="text" style="width: 400px;" class="form-control float-right" value=<?php echo ucfirst($usersData['regno']); ?> required ></td><br>
        </tr>
        <tr>
        <td><label> <strong>Select Session: </strong></label>
                <select name="section" style="width: 400px;" class="form-control float-right" required >
                <option value="2013/2014">2013/2014</option>
                <option value="2014/2015">2014/2015</option>
                <option value="2015/2016">2015/2016</option>
                <option value="2016/2017">2016/2017</option>
                <option value="2017/2018">2017/2018</option>
                <option value="2018/2019">2018/2019</option>
                <option value="2019/2020">2019/2020</option>
                <option value="2019/2020">2020/2021</option>
                </select>
            </table> 
            <br><br>
            <button class="btn btn-primary" type="submit" name="generate_invoice">Generate</button>
        </form>
        </div>
    </div>
    </div></div></div></div>
    
    </div>
    

    <!--Side bar ends-->

    <!--Footer starts here-->

     <?php include('footer.php');?>
     