<?php
require 'connectfile.php';

function getUsersData($id){
    $mysqli_host = 'localhost';
    $mysqli_user = 'root';
    $mysqli_pass = '';
    $mysqli_db = 'sims';

    $mysqli_connect = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db);

    $array = array();
    $query = "SELECT `id`,`surname`,`firstname`,`othername`,`regno`,`gsm`,`student_type`,`reference_code`,`section`,`level`,
    `email`,`department` FROM `school_fees_payment` WHERE `id`='".$id."'";
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
        $array['reference_code']=$row['reference_code'];
        $array['section']=$row['section'];
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


    $query = "SELECT `id` FROM `school_fees_payment` WHERE `regno`='$regno'";
    $mysqli_query = mysqli_query($mysqli_connect,$query);
    while($row = mysqli_fetch_assoc($mysqli_query)){
        return $row['id'];
    }
}

?>
<!--this is the student page header file -->
<?php include("std_header.php");?>

    <div class="col-9"><br>
    <h3 class="text-left">GENERATED INVOICE</h3><hr>
    <div class=" jumbotron">
    <div id="div1" class="card">
        <div class="card-body">
       

    <div class=" text-left">
     <img class="rounded-circle img-fluid " src="logo-cdel-new.png" alt="" style="height: 100px; width: 100px;">
     </div><br>
<h4 class="text-left">REFERENCE CODE # <strong><?php echo $usersData['reference_code']; ?></strong></h4><br>
<div class="row ">
<div class="col-4">
        <h5>Transaction Reference #</h5><br>
        <h5>Invoice #</h5>
        <h6><strong>CDEL/1/SCHOOLFEES</strong></h6>
        <h6> Invoice Date: <?php echo date("d/m/Y");?></h6>

     </div>

     <div class="col-4">
<h5>Invoiced To</h5><br>
<h6><?php echo $usersData['surname']," ", $usersData['firstname']," ", $usersData['othername']; ?></h6>
<h6><?php echo $usersData['level']; ?> Level</h6>
<h6><?php echo ucfirst($usersData['department']); ?></h6>
<h6><?php echo ucfirst($usersData['surname']); ?></h6>
<h6><?php echo ucfirst($usersData['gsm']); ?></h6>
<h6><?php echo ucfirst($usersData['student_type']); ?></h6>
<h6>Centre for Distance and E-learning</h6>

     </div>

     <div class="col-4 text-left">
     <h5>Pay To</h5><br>
     <h6>Centre for Distance and E-learning.</h6>
     
     </div>
    </div><br>

    <div class="row">
        <div class="col-12">
        <table class="text-left" border align="center" width="100%" cellspacing="1" cellpadding="1">
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Payment Type</th>
            </tr>

            <tr>
                <td><?php echo $usersData['section']; ?> SCHOOL FEE</td>
                <td>N
                <?php
                    if ($usersData['level']>=300) {
                        echo 37550;
                    }elseif ($usersData['level']==200) {
                        echo 46600;
                    }elseif ($usersData['level']==100) {
                        echo 63000;
                    }else {
                        echo 'Your level cannot be found';
                    }
                ?>
                </td>
                <td>CONSOLIDATION FEES</td>
            </tr>
            <tr>
                <td>.</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>.</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td><strong>N
                <?php
                    if ($usersData['level']>=300) {
                        echo 37550;
                    }elseif ($usersData['level']==200) {
                        echo 46600;
                    }elseif ($usersData['level']==100) {
                        echo 63000;
                    }else {
                        echo 'Your level cannot be found';
                    }
                ?>
                
                </strong></td>
                <td></td>
            </tr>
        </table><hr><hr>
        <p>Kindly ensure your payment is made with a Reference code generated from the portal.</p>
        </div>
    </div>
    <br>
    </div>
    
    </div><br>
    
    

    <button onclick="printContent('div1')"class="btn btn-primary">Print</button>
    
    </div>
    </div></div></div></div>
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