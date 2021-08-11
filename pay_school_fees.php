<?php
require 'connectfile.php';

if(isset($_POST['pay'])){
    $reference_code = $_POST['reference_code'];
    
$query = "SELECT * FROM `school_fees_payment` WHERE `reference_code`='$reference_code'";
$mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
$mysqli_num_rows = mysqli_num_rows($mysqli_query);
   
    if($mysqli_num_rows == 1){
       header('location: school_fees_receipt.php');
        $_SESSION['regno']=$regno;
        
    }else{
    
       echo "incorrect reference code";
   }

}


?>

<!--this is the student page header file -->
<?php include("std_header.php");?>

    <div class="col-9"><br>
    <h3 class="text-center">Pay school fees</h3><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">

    <form action="school_fees_receipt.php" method='post'>
    <div class='form-group'>
    <label for="">Input your Reference code Here:</label>
    <input class='form-control' type="text" name='reference_code' required>
    </div>
    <button class='btn btn-primary' type="submit" name='pay'>Pay</button>

    </form>

    
    </div>
    </div></div>
    </div>
    
    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

     <?php include('footer.php');?>