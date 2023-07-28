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
    <title>Update details</title>
</head>
<body>
    
        <div id="Main" class="Main-container">
        
            <div>
                <form class="FORM" method="POST">
                    
                    EMPLOYEE NAME<input class="input" type="text" name="empname" />
                    EMPLOYEE ID<input class="input" type="text" name="empid"/>
                    MOBILE<input class="input" type="text" name="mobile"/>
                    EMAIL<input class="input"type="email"name="email"/>
                    
                    <div class="radio">
                        M<input  type="radio" name="gender" value="M">
                        F<input  type="radio" name="gender" value="F">
                        Cant'Specify<input  type="radio" name="gender" value="C">
                    </div>
                    ADDRESS<input class="input"type="text"name="address"/>
                   
                    <div class="btn-container">
                        <button type="submit" class="btn" name="update">Update</button>
                    </div>
                </form>
            </div>
            <?php
                $id="";
                $name="";
                $Mobile="";
                $email="";
                $gender="";
                $addr="";
                
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $id=$_POST['empid'];
                    $name=$_POST['empname'];
                    $Mobile=$_POST['mobile'];
                    $email=$_POST['email'];
                    $gender=$_POST['gender'];
                    $addr=$_POST['address'];
                    

                }
                if(isset($_POST['update'])){
                
                        
                        $sql = "UPDATE employee SET Emp_id='$id',`Emp_NAME`='$name',`Mobile`='$Mobile' ,Email='$email', Gender='$gender',Addr='$addr' WHERE Emp_id='$id'";
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
    
</body>
</html>
