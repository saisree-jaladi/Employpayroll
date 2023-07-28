<?php
session_start();
if(!isset($_SESSION['Empid'])){
    header('Location:login.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Main</title>
</head>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "payrolldb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$id=$_SESSION['Empid'];
$sql = "SELECT * FROM employee where Emp_id='$id'";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result)){
    $name=$row['Emp_NAME'];
}

if(isset($_POST['logout'])){
    session_destroy();
}
?>
<nav>
        <div class="Navbar">
        <h1 class="heading" > Welcome <?php echo $name;?> </h1>
            <ul>
                <li><a href="Usermainprofile.php">PROFILE</a></li>
                <li><a href="UserSalary.php">SALARY</a></li>
                <li><a href="login.php" name="logout">LOGOUT</a></li>
                
            </ul>
        </div>
    </nav>
<body>
    
    <div class="main-container">
        <?php

            $sql = "SELECT * FROM employee where Emp_id='$id'";
            $result = mysqli_query($conn, $sql);

            
            $days="";
            
            while ($row = mysqli_fetch_assoc($result)) {
                $days=$row["Attendance"];

                echo "Employee ID :    ".$row["Emp_id"];
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "Employee Name :     ".$row["Emp_NAME"];
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "Number of days present :    ".$row["Attendance"];
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "Status :    ".$row["Status"];
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "Salary is :     ".($days*2000);
            }


            mysqli_close($conn);
        ?>
    </div>
    
</body>
</html>