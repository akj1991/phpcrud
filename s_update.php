<?php

session_start();

if (isset($_SESSION['customer_id']) && isset($_SESSION['cust_username'])){

?>
<?php
require('dbconnection.php');
$msg="";

$stID=$_GET['st_id'];
$exec_query=mysqli_query($connection,"SELECT * FROM students WHERE std_id='$stID'");
$row=mysqli_fetch_array($exec_query);
//print_r($row);
if(isset($_POST['btn_update'])){
    $fullname=$_POST['s_fullname'];
    $contact=$_POST['s_contact'];
    $email=$_POST['s_email'];
    $username=$_POST['s_username'];
    $password=$_POST['s_password'];
    $query="UPDATE students SET s_fullname='$fullname',s_contact='$contact',s_email='$email',s_username='$username',s_password='$password' WHERE std_id='$stID'";
    $exec_query=mysqli_query($connection,$query);
    if($exec_query){
        echo'<script>alert("Data Updated Successfully")</script>';
        header('location:viewstudent.php');
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div>
        <h1>Hello, <?php echo $_SESSION['cust_name']; ?></h1> 
        <center><a style="float: right;" href="logout.php">Logout</a></center></div>
        <div>
            <div class="container">
    <div class="title"><u>Student Registration</u></div>
        <form action="#" id="form" name="contact" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" placeholder="Enter your name" id="fullname" name="s_fullname" value="<?php echo $row[1] ?>">
                </div>
                <div class="input-box">
                    <span class="details">Contact</span>
                    <input type="text" placeholder="Enter your contact number" id="contact" name="s_contact" value="<?php echo $row[2] ?>">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" id="email" name="s_email" value="<?php echo $row[3] ?>">
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" placeholder="Enter your username" id="username" name="s_username" value="<?php echo $row[4] ?>">
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" id="password" name="s_password" value="<?php echo $row[5] ?>">
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="btn_update" class="btn btn-primary btn-lg">Update</button>
                  </div>
        </div>
    </div>
</div>
    <div>
        <a href="home.php">Back</a>
    </div>


    </form>
    
</body>
</html>