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
$Mobile="";
$email="";
$gender="";
$addr="";
$sql = "SELECT * FROM employee where Emp_id='$id'";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result)){
    $name=$row['Emp_NAME'];
    $Mobile=$row['Mobile'];
    $email=$row['Email'];
    $gender=$row['Gender'];
    $addr=$row['Addr'];
    

}
if(isset($_POST['logout'])){
    session_destroy();
}
?>
<body>
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
    
    <div class="Main">
        <div class="ID"><h1> ID: <?php echo $id;?> </h1> </div>
        <div class="Mobile"><h1> Mobile: <?php echo $Mobile;?> </h1> </div>
        <div class="Email"><h1> Mobile: <?php echo $email;?> </h1> </div>
        <div class="Gender"><h1> Gender: <?php echo $gender;?> </h1> </div>
        <div class="Address"><h1> Address: <?php echo $addr;?> </h1> </div>
        <button type="submit" class="btn" name="Edit" href="./Update.php" >Edit profile</button>
    </div>
</body>
</html>
<?php

?>