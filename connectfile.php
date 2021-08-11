<?php
 session_start();
//$connect = mysqli_connect("localhost", "root", "");
 $mysqli_host = 'localhost';
 $mysqli_user = 'root';
 $mysqli_pass = '';

// if (!$connect){
//     die;
// }

// $_create = mysqlii_query($connect, "create database if not exists sims");
// if ($_create) {echo "database created sucessfully";}
// else {echo "error creating database:" .mysqlii_error($connect);}

 $mysqli_db = 'sims';

 $mysqli_connect = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_db); 
 //mysqli_select_db($mysqli_db);


?>