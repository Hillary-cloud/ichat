<?php
require 'connectfile.php';
/*function getUsersData($id){
    $array = array();
    $query = mysql_query("SELECT * FROM `student_table` WHERE `id`='".$id."'");
    while($row = mysql_fetch_assoc($query)){
        $array['level']=$row['level'];
        
    }
    return $array;
}

function getId($regno){
    $query = mysql_query("SELECT `id` FROM `student_table` WHERE `regno`='".$regno."'");
    while($row = mysql_fetch_assoc($query)){
        return $row['id'];
    }
}*/
?>

<!--this is the student page header file -->
<?php include("std_header.php");?>

    <div class="col-9"><br>
    <?php
    $regno = $_SESSION['regno'];
    $query = "SELECT * FROM `student_table` WHERE `regno`='".$regno."'";
    $mysqli_query = mysqli_query($mysqli_connect,$query) or die(mysqli_error($mysqli_connect));
    
    ?>
    <h3 class="text-center">Register courses</h3><br>
    <div class="jumbotron">
    <div class="card">
        <div class="card-body">

    <form action="register_courses2.php" method="post">
        <div class="form-group">
                <div class="form-group">
                <label> <strong>Select Section: </strong></label>
                <select name="section" class="form-control" required />
                <option value="2013/2014">2013/2014</option>
                <option value="2014/2015">2014/2015</option>
                <option value="2015/2016">2015/2016</option>
                <option value="2016/2017">2016/2017</option>
                <option value="2017/2018">2017/2018</option>
                <option value="2018/2019">2018/2019</option>
                <option value="2019/2020">2019/2020</option>
                <option value="2019/2020">2020/2021</option>
                </select><br><br></div>
                <div class="form-group">
                <label> <strong>Select Semester: </strong></label>
                <select name="semester" class="form-control" required />
                <option value="First Semester">First Semester</option>
                <option value="Second Semester">Second Semester</option>
                </select><br><br></div>
                <?php 
                while($row=mysqli_fetch_assoc($mysqli_query)){
                ?>
                <div class="form-group">
                <label> <strong>Student Level: </strong></label>
                <input name="level" type="text" class="form-control" value=<?php  echo "{$row['level']}"; ?> ><br/><br></div>
                
                </div>
                <div class="form-group  d-none">
                <label> <strong>Student department: </strong></label>
                <input name="department" type="text" class="form-control" value=<?php echo "{$row['department']}"; ?>><br/><br></div>
                <button class="btn btn-primary" type="submit" name="register_courses2">Submit</button></form>
                </div>
                <?php } ?>
                
    

    </div>
    
    </div>
    </div></div>
    </div>
    </div>
    </div>

    <!--Side bar ends-->

    <!--Footer starts here-->

    <?php include('footer.php');?>