<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database="payrolldb";

$conn=mysqli_connect($servername, $username, $password,$database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Payroll Management System</title>
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
    <div class="main-container">
        <form class="form" method="POST">
            <p class="heading">LOGIN</p>
            <div class="switch-cont">
                <label class="switch">
                    <input name="checked" type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>
            <input class="input" name="Empid" placeholder="Employee ID" type="text">
            <input class="input" name="Password" placeholder="Password" type="password"> 
            <button class="btn" name="login" >Submit</button>
        </form>
    </div>
 
            
            <?php

            $id = " ";

            $Password =" ";
            if(isset($_POST['checked'])){
                if(isset($_POST['login'])){
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id = $_POST["Empid"];
                        $Password = $_POST["Password"];
                        }
                        $sql = "SELECT * FROM employeeinfo WHERE Emp_id='$id' AND Password ='$Password'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            session_start();
                            $_SESSION["Empid"] = $id;
                            
                            header("Location: Usermainprofile.php");
                        } else {
                            echo "Invalid username or password";
                            echo $Password;
                            echo $empid;
                            
                        }
                }
            }else{
                if(isset($_POST['login'])){
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id = $_POST["Empid"];
                        $Password = $_POST["Password"];
                        }
                        $sql = "SELECT * FROM admininfo WHERE Adm_id='$id' AND Password ='$Password'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            session_start();
                            $_SESSION["Empid"] = $id;
                            header("Location: Adminprofile.php");
                        } else {
                            echo "Invalid username or password";
                            
                        }
                }
            }

            mysqli_close($conn);

            ?>
</body>
</html>

