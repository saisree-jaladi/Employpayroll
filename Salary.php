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
    <link rel="stylesheet" href="adminside.css">
    <title>Admin Main</title>
</head>
<body>
        <nav>
            <div class="Navbar">
                <h1 class="heading">Admin</h1>
                <ul>
                    <li><a href="Adminprofile.php">PROFILE</a></li>
                    <li><a href="Employee.php">EMPLOYEE</a></li>
                    <li><a href="Salary.php">SALARY</a></li>
                    <li><a href="login.php">LOGOUT</a></li>
                </ul>
            </div>
        </nav>
   <div class="body">
        
        
        <div class="Main-container">
            <form class="FORM" method="POST">
                <h1 class="heading">Post Attendance</h1>
                ID:<input class="input" type="text" name="Emp_id"/>
                <div class="radio">
                    P<input  type="radio" name="radio" value="Y"/>
                    A<input  type="radio" name="radio" value="N"/>
                </div>
                <button type="submit" class="btn" name="submit">Submit</button>
                <button type="submit" class="btn" name="Update">Update</button>
            </form>
            <?php
                $id="";
                
                $radio="";
                $count="";
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $id=$_POST['Emp_id'];
                
                    $radio=$_POST['radio'];
                    if($radio=='Y'){
                        $count=1;
                    }else{
                        $count=0;
                    }
                }

                if(isset($_POST['submit'])){
                    $sql1="SELECT * FROM employee where Emp_id='$id'";
                    $result1=mysqli_query($conn,$sql1);
                    while($row=mysqli_fetch_assoc($result1)){
                            $count+=$row['Attendance'];
                    }

                    $sql="UPDATE employee SET Attendance=$count where Emp_id='$id'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                           
                    }else{
                        echo "Error updating attendance: ".mysqli_error($conn);
                    }
                }
                if(isset($_POST['Update'])){
                    $sql1="SELECT * FROM employee where Emp_id='$id'";
                    $result1=mysqli_query($conn,$sql1);
                    while($row=mysqli_fetch_assoc($result1)){
                            $count=$row['Attendance'];
                    }
                    $sql="UPDATE employee SET Attendance=$count-1 where Emp_id='$id'";
                    $result=mysqli_query($conn,$sql);
                    if($result){

                    }else{
                        echo "<script>'Error updating attendance: '.mysqli_error($conn) </script>";
                    }
                }
            ?>
        </div>

        <div class="main-container">
                <?php

                    $sql = "SELECT * FROM employee";
                    $result = mysqli_query($conn, $sql);

                    echo "<table>";
                    echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Attendance</th></tr>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>".$row["Emp_id"]."</td><td>".$row["Emp_NAME"]."</td><td>".$row["Attendance"]."</td></tr>";
                    }

                    echo "</table>";

                    mysqli_close($conn);
                ?>
        </div>
    </div>
</body>
</html>


