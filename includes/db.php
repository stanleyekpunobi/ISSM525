<?php //DECLARE DATABASE VARIABLES 
$hostname = "localhost"; $dbuser = "root"; $dbpassword = ""; 
//DATABASE NAME 
$dbname = "YOUR DATABASE NAME GOES HERE"; 
//CONNECT TO HOST SERVER 
$con = mysqli_connect($hostname, $dbuser, $dbpassword); 
//CREATE DATABASE IF NONE EXISTS 
$dbCreate = "CREATE DATABASE IF NOT EXISTS ".$dbname; 
//DATABASE CREATION IS SUCCESSFUL 
mysqli_query($con, $dbCreate) 
//CONNECT TO THE CREATED DATABASE 
$conn = mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);
//RETURN ERROR IF NO CONNECTION FOUND 
if(!$conn) { echo "Not Connected!!" . mysqli_connect_error(); }
?>