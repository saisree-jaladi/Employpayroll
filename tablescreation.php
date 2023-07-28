<?php

// Connecting to the Database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database="payrollDB";
 
// Create a connection
$conn = mysqli_connect($servername, $username, $password,$database);
 
// Die if connection was not successful
if (!$conn){
 die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
 echo "Connection was successful<br>";
}


// $sql = "CREATE TABLE Admininfo
// (
//     Adm_id VARCHAR(20) NOT NULL,
//     Password VARCHAR(100) NOT NULL
// )";
$sql="CREATE TABLE Employeeinfo
(
    Emp_id VARCHAR(20) NOT NULL,
    Password VARCHAR(100) NOT NULL   
)";
// $sql1="CREATE TABLE EMPLOYEE
// (
// Emp_NAME VARCHAR(20) NOT NULL,
// Emp_id VARCHAR(10) NOT NULL PRIMARY KEY,
// Password VARCHAR(100) NOT NULL,
// CONFIRMPASSWORD VARCHAR(100) NOT NULL,
// Mobile INT(10) NOT NULL,
// Email VARCHAR(50) NOT NULL,
// Gender VARCHAR(1) NOT NULL,
// Addr VARCHAR(50) NOT NULL,
// Attendance INT(3) NOT NULL,
// count INT(3) NOT NULL,
// Status VARCHAR(15) NOT NULL
// )";
// $sql="CREATE TABLE Admin
// (
// Adm_NAME VARCHAR(20) NOT NULL,
// Adm_id VARCHAR(10) NOT NULL PRIMARY KEY,
// Mobile INT(10) NOT NULL,
// Email VARCHAR(50) NOT NULL,
// Gender VARCHAR(1) NOT NULL,
// Addr VARCHAR(50) NOT NULL
// )";
// $sql="CREATE TABLE SALARY
// (
// Emp_id VARCHAR(10) NOT NULL,
// Dt Date NOT NULL,
// count INT(5) NOT NULL
// )";
$result = mysqli_query($conn,$sql);
 
// Check for the database creation success
if($result){
 echo "The database is successfully created!<br>";
}
else{
 echo "The db creation failed because of this error ---> ". mysqli_error($conn);
}


?>