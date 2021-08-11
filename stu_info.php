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
        $array['departmemt']=$row['department'];
        $array['level']=$row['level'];
        $array['d_o_b']=$row['d_o_b'];
        $array['religion']=$row['religion'];
        $array['state']=$row['state'];

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
    
    ?>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <h3 class="text-center">Hello  <?php echo ucfirst($usersData['firstname'])." ".ucfirst($usersData['othername'])."";?>, Welcome to your studentinfo page.</h3><br>
    
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

    <?php include('footer.php');?>