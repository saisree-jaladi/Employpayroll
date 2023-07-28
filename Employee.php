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
    <link rel="stylesheet" href="adminside.css"/>
    <title>Employee</title>
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
    
        <div id="Main" class="Main-container">
        
            <div>
                <form class="FORM" method="POST">
                    
                    EMPLOYEE NAME<input class="input" type="text" name="empname" />
                    EMPLOYEE ID<input class="input" type="text" name="empid"/>
                    PASSWORD<input class="input" type="password" name="password"/>
                    CONFIRMPASSWORD<input class="input" type="password" name="cpassword"/>
                    MOBILE<input class="input" type="text" name="mobile"/>
                    EMAIL<input class="input"type="email"name="email"/>
                    
                    <div class="radio">
                        M<input  type="radio" name="gender" value="M">
                        F<input  type="radio" name="gender" value="F">
                        Cant'Specify<input  type="radio" name="gender" value="C">
                    </div>
                    ADDRESS<input class="input"type="text"name="address"/>
                    STATUS<input class="input"type="text"name="status"/>
                    <div class="btn-container">
                        <button type="submit" class="btn" name="add">Add</button>
                        <button type="submit" class="btn" name="update">Update</button>
                        <button type="submit" class="btn" name="delete">Delete</button>
                    </div>
                </form>
            </div>
            <?php
                $id="";
                $name="";
                $password="";
                $cp="";
                $Mobile="";
                $email="";
                $gender="";
                $addr="";
                $status="";
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $id=$_POST['empid'];
                    $name=$_POST['empname'];
                    $password=$_POST['password'];
                    $cp=$_POST['cpassword'];
                    $Mobile=$_POST['mobile'];
                    $email=$_POST['email'];
                    $gender=$_POST['gender'];
                    $addr=$_POST['address'];
                    $status=$_POST['status'];

                }

                if(isset($_POST['add'])){
                    
                $sql = "INSERT INTO employee ( Emp_id,Emp_NAME,Password,CONFIRMPASSWORD,Mobile,Email,Gender,Addr,Status)
                        VALUES ('$id', '$name','$password', '$cp','$Mobile','$email','$gender','$addr','$status')";
                $sql2="INSERT INTO employeeinfo (Emp_id,Password)
                VALUES('$id','$password')";
                $result2 = mysqli_query($conn, $sql2);
                $result = mysqli_query($conn, $sql);

                if ($result&&$result2) {
                    
                } else {
                    echo "Error inserting data: " . mysqli_error($conn);
                }

                }

                if(isset($_POST['delete'])){
                
                $sql = "DELETE FROM employeeinfo WHERE Emp_id='$id'";
                $sql2 = "DELETE FROM employee WHERE Emp_id='$id'";
                $result2 = mysqli_query($conn, $sql2);
                $result = mysqli_query($conn, $sql);

                if ($result&&$result2) {
                    
                } else {
                    echo "Error Deleting data: " . mysqli_error($conn);
                }

                }

                if(isset($_POST['update'])){
                
                        
                        $sql = "UPDATE employee SET Emp_id='$id',`Emp_NAME`='$name',`Password`='$password',`CONFIRMPASSWORD`='$cp',`Mobile`='$Mobile' ,Email='$email', Gender='$gender',Addr='$addr',Status='$status' WHERE Emp_id='$id'";
                        $sql2 = "UPDATE employeeinfo SET Emp_id='$id',`Password`='$password' WHERE Emp_id='$id'";
                        $result = mysqli_query($conn, $sql);
                        $result2 = mysqli_query($conn, $sql2);

                if ($result&&$result2) {
                    
                } else {
                    echo "Error Updating data: " . mysqli_error($conn);
                }

                }
                

            ?>

        
        </div>
        <div id="main" class=main-container>
            <h1 class="heading">Details</h1>
            <?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "payrolldb";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM employee";
            $result = mysqli_query($conn, $sql);

            echo "<table>";
            echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Mobile</th><th>Email</th><th>Address</th><th>Status</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["Emp_id"]."</td><td>".$row["Emp_NAME"]."</td><td>".$row["Mobile"]."</td><td>".$row["Email"]."</td><td>".$row["Addr"]."</td><td>".$row["Status"]."</td></tr>";
            }

            echo "</table>";

            mysqli_close($conn);
            ?>
      
    
    
</body>
</html>
