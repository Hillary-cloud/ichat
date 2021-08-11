<?php
require 'connectfile.php';

//$password = $_POST['password'];
//$password1 = $_POST['pass1'];
//$password2 = $_POST['pass2'];
if(isset($_POST['change_password'])){
    $password = $_POST['password'];
$password1 = $_POST['pass1'];
$password2 = $_POST['pass2'];

    $query = "SELECT * FROM `student_table` WHERE `regno`='".$_SESSION['regno']."'";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
    $mysqli_num_rows = mysqli_num_rows($mysqli_query);

    while ($row = mysqli_fetch_assoc($mysqli_query)){
        $get_pass = $row['password'];
    }
    if($password==$get_pass){
        if($password2==$password1){
            //update;
            $query_update = "UPDATE `student_table` SET `password`='".$password1."' WHERE `regno`='".$_SESSION['regno']."'";
            $mysqli_query_update = mysqli_query($mysqli_connect,$query_update);
            if($mysqli_query_update==1){
                echo "password changed successfully";
            }
        }else{
            echo "new pass don't match";
        }

    }else{
        echo "current pass dont match with new pass";
    }
}
?>

<!--this is the student page header file -->
<?php include("std_header.php");?>

    <div class="col-9"><br>
    <h3 class="text-center">Change Password</h3><br>
    <div class="jumbotron">
    <div class="card">
        <div class="card-body">

    <form action="" method="post">
        <div class="form-group">
                <div class="form-group">
                <label> <strong>Current password: </strong></label>
                <input name="password" type="text" class="form-control" required/><br/><br></div>
                <div class="form-group">
                <label> <strong>New password: </strong></label>
                <input name="pass1" type="password1" class="form-control" required /> <br/><br></div>
                <div class="form-group">
                <label> <strong>Confirm new password: </strong></label>
                <input name="pass2" type="password2" class="form-control" required/><br/><br></div>
                
                </div>
                <button class="btn btn-primary" name="change_password">Change password</button></form>
    

    
    </div>
    </div></div>
    </div>
    
    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

     <?php include('footer.php');?>