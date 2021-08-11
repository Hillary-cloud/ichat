<?php
require 'connectfile.php';
function getUsersData($id){
    $mysqli_host = 'localhost';
    $mysqli_user = 'root';
    $mysqli_pass = '';
    $mysqli_db = 'sims';

    $mysqli_connect = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db);

    $array = array();
    $query = "SELECT * FROM `school_fees_payment` WHERE `id`='$id'";
    $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
    while($row = mysqli_fetch_assoc($mysqli_query)){
        $array['id']=$row['id'];
        $array['surname']=$row['surname'];
        $array['firstname']=$row['firstname'];
        $array['othername']=$row['othername'];
        $array['regno']=$row['regno'];
        $array['level']=$row['level'];
        $array['section']=$row['section'];
        $array['department']=$row['department'];
        $array['reference_code']=$row['reference_code'];

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

    
    $query = "SELECT `id` FROM `school_fees_payment` WHERE `regno`='$regno'";
    $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
    while($row = mysqli_fetch_assoc($mysqli_query)){
        return $row['id'];
    }
}

?>

<!--this is the student page header file -->
<?php include("std_header.php");?>
    
    <div class="col-9"><br>
    <h3 class="text-left">School fees history</h3><hr>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <h3><strong>View and Reprint School Fees</strong></h3><hr>
    
    <table border= class="text-center" align="center" width="100%">
    
    <?php
    $regno = $_SESSION['regno'];
    $query2 = "SELECT * FROM `school_fees_payment` WHERE `regno`='$regno'";
    $mysqli_query = mysqli_query($mysqli_connect,$query2);
   ?>
        <tr>
        <th>Session</th>
        <th>Payment Type</th>
        <th>Payment Level</th>
        <th>Payment Pin</th>
        </tr>


        <?php
        while($row = mysqli_fetch_assoc($mysqli_query)){
        echo"
        <tr>
        <td>{$row['section']}</td>
        <td>Consolidation fee</td>
        <td>{$row['level']}</td>
        <td>{$row['reference_code']}</td>
        <td><form action='school_fees_receipt.php' method='post'>
        <button class=\'btn btn-primary\' type=\'submit\' name=\'view\'>view</button>
        </form></td>
         </tr>
        ";
    }

    
     
     if ($usersData['level']==100) {
        $query = "SELECT * FROM receipt";
        $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
     }elseif($usersData['level']==200){
        $query = "SELECT * FROM receipt2";
        $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
     }elseif($usersData['level']>=300) {
        $query = "SELECT * FROM receipt3";
        $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
     }else {
        echo 'No receipt for you';
     }
     ?>
        
       
    
    
    </table>


    
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