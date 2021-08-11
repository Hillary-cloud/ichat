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
    <p class="text-center"><strong>STUDENTS CLEARANCE</strong></p>
    <div class="row">
        <table class="text-left"  width="50%">
            <tr>
                <td style="padding-left:50px;">FULL NAME:</td>
                <td style="padding-left:50px;"><?php echo ucfirst($usersData['surname']), ' ', ucfirst($usersData['firstname']), ' ', ucfirst($usersData['othername']); ?></td>
            </tr>
            <tr>
                <td style="padding-left:50px;">MATRIC NUMBER:</td>
                <td style="padding-left:50px;"><?php echo ucfirst($usersData['regno']);?></td>
            </tr>
        </table>
    
    </div><br>

    <table class="text-left" border width="100%">
        <tr>
            <th>S/N</th>
            <th>CLEARANCE TYPE</th>
            <th>CLEARANCE STATUS</th>
            <th>PENALTY(N)</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Faculty Dues Clearance</td>
            <td>Pending</td>
            <td></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Departmental Dues Clearance</td>
            <td>Pending</td>
            <td></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Hostel Clearance</td>
            <td>Pending</td>
            <td></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Library Clearance</td>
            <td>Pending</td>
            <td></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Security Clearance</td>
            <td>Pending</td>
            <td></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Alumni Clearance</td>
            <td>Pending</td>
            <td></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Student Affarirs Clearance</td>
            <td>Pending</td>
            <td></td>
        </tr>
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