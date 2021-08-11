<?php

$connect = mysqli_connect("localhost", "sims", "");
if (!$connect){
    die('could not cionnect to server' . mysqli_error());
}

if (mysqli_connect_error()){
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
}
?>