<?php
require 'connectfile.php';

if(isset($_POST['register_courses2'])){
    $semester = $_POST['semester'];
    $level = $_POST['level'];
    $department = $_POST['department'];
    $department1 = 'computer_science';
    $department2 = 'Mathematics';

   // for computer science
    if( $department == "$department1" )
    {
      $query =  "SELECT `course`,`unit_load`,`course_title`,`semester` FROM `computer_sci`WHERE `level`= '$level' and `semester`= '$semester' ";
      $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
    }//for mathematics
    else if ( $department =="$department2")
    {
      $query =  "SELECT `course`,`unit_load`,`course_title`,`semester` FROM `mathematics`WHERE `level`= '$level' and `semester`= '$semester' ";
      $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));

    }//for statistics
    else if ($department == "$department1")
    {
      $query =  "SELECT `course`,`unit_load`,`course_title`,`semester` FROM `statistics`WHERE `level`= '$level' and `semester`= '$semester' ";
      $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
      
    }else{
      echo 'No course for you to register';
    }
    }
  

?>


<!--this is the student page header file -->
<?php include("std_header.php");?>

    <div class="col-9"><br>
    
    <h3 class="text-center">Register courses</h3><br>
    <div class="jumbotron">
    <div class="card">
        <div class="card-body">


<form action="register_courses3.php" method='post'>
    <table class="text-center" border align="center" width="100%" cellspacing="1" cellpadding="1">
        <tr>
        <th></th>
        <th class="text-left">COURSE</th>
        <th class="text-left">SEMESTER</th>
        <th class="text-left">COURSE TITLE</th>
        <th class="text-left">UNIT</th>

        </tr>

    <?php
    

    $query =  "SELECT * FROM `computer_sci`WHERE `level`= '$level' and `semester`= '$semester' ";
    $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
    $id='id';
    $level='level';
    $semester='semester';
    
    while($row = mysqli_fetch_assoc($mysqli_query)){?>

        <tr>
        <td><input type="checkbox" name="id[]" value=<?php echo $row['id']; ?>></td>
        <td class="text-left"><?php echo $row['course'];?> </td>
        <td class="text-left"><?php echo $row['semester'];?></td>
        <td class="text-left"><?php echo $row['course_title'];?></td>
        <td class="text-left"><?php echo $row['unit_load'];?> </td>
        </tr>
        

        
<?php }

?>
        </table> <br>
        
        <button type="submit"class="btn btn-primary" name='register'>Register</button>
        </form>
    </div>
    
    </div>
    </div></div>
    </div>
    </div>
    </div>
    

    <!--Side bar ends-->

    <!--Footer starts here-->

     <?php include('footer.php');?>