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

    $reference_code='reference_code';
    $query = "SELECT `id` FROM `school_fees_payment` WHERE `reference_code`='$reference_code' or `regno`='$regno'";
    $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
    while($row = mysqli_fetch_assoc($mysqli_query)){
        return $row['id'];
    }
}
if(isset($_SESSION['regno'])){
    $usersData = getUsersData(getId($_SESSION['regno']));
}


$reference_code='reference_code';
$query = "SELECT * FROM `school_fees_payment` WHERE `reference_code`='$reference_code'";
$mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));

        
        
?>
<!--this is the student page header file -->
<?php include("std_header.php");?>

    <div class="col-9"><br>
    <h3 class="text-left">FEE RECEIPT</h3><hr>
    <div class=" jumbotron">
    <div id="div1" class="card">
        <div class="card-body">
       

    <div class=" text-center">
     <img class=" img-fluid " src="logo-cdel-new.png" alt="" style="height: 100px; width: 100px;">
     </div><br>
<h6 class="text-center"><strong>CENTRE FOR DISTANCE AND E-LEARNING </strong></h6>
<strong><h5 class="text-center">OFFICIAL FEE RECEIPT</h5></strong><br>
<div class=" text-center">
     <img class=" img-fluid " src="images\IMG_20180624_183409.jpg" alt="" style="height: 100px; width: 100px;">
     </div><br>
<div class="row text-left">
<div class="col-4">
        <h6><strong>MATRIC NO:</strong></h6><br>
        <h6><strong>NAME:</strong></h6><br>
        <h6><strong>DEPARTMENT:</strong></h6><br>
        <h6><strong>LEVEL:</strong></h6>

     </div>

     <div class="col-8">
 
<h6><strong><?php echo $usersData['regno']; ?></strong></h6><hr>
<h6><strong><?php echo ucfirst($usersData['surname'])," ", $usersData['firstname']," ", $usersData['othername']; ?></strong></h6><hr>
<h6><strong><?php echo $usersData['department']; ?></strong></h6><hr>
<h6><strong><?php echo $usersData['level']; ?> Level</strong></h6>

     </div>
     </div>
     <br><br>
     <?php
     
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


    <div class="row">
        <div class="col-12">
        <table class="text-left" border align="center" width="100%" cellspacing="1" cellpadding="1">
            <tr class="text-center">
                <th>S/N</th>
                <th>FEE TYPE</th>
                <th>CODE</th>
                <th>AMOUNT</th>
                </tr>
    <?php 
    $sum = 0;
while(($row = mysqli_fetch_assoc($mysqli_query))){
    //this sums the total amount
    $sum += $row['amount'];
    echo
     "<tr>
    <td>{$row['id']}</td>
    <td>{$row['fee_type']}</td>
    <td></td>
    <td>{$row['amount']}</td>
</tr>";
}
?>   
           <tr>
                <td></td>
                <td></td>
                <td><strong>Total: </strong></td>
                <td><strong><?php echo $sum; ?></strong></td>
            </tr>
        </table>
        </div>
    </div>
    <br>

    <div class="row text-left">
<div class="col-4">
        
        <h6><strong>The total sum of:</strong></h6><br>
        <h6><strong>Being payment for:</strong></h6><br>
        <h6><strong>Receipt printed on:</strong></h6>

     </div>

     <div class="col-8">
     <h6><strong><?php echo $sum; ?></strong></h6><hr>
     <h6><strong><?php echo $usersData['section']; ?></strong></h6><hr>
     <h6><strong><?php echo date("d/m/Y"); ?></strong></h6>

     </div>
    </div>
    
    </div>
    
    </div><br>
    <button onclick="printContent('div1')"class="btn btn-primary">Print</button>
    </div></div></div></div></div></div>
    
    <script>
        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;

        }
    </script>

    <!--Side bar ends-->

    <!--Footer starts here-->

 <?php include('footer.php');?>