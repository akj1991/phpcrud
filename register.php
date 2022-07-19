<?php
session_start();

if (isset($_SESSION['customer_id']) && isset($_SESSION['cust_username'])){

?>
<?php
require('dbconnection.php');
$msg="";

if(isset($_POST['btn_save'])){
    $fullname=$_POST['s_fullname'];
    $contact=$_POST['s_contact'];
    $email=$_POST['s_email'];
    $username=$_POST['s_username'];
    $password=$_POST['s_password'];
    
    $sql="SELECT * FROM students WHERE s_email='$email'";
    $result=mysqli_query($connection,$sql);
    $num=mysqli_num_rows($result);

    if($num >0){
      echo'<script>alert("Email already exsists!")</script>';
    }
    else{
      $query="INSERT INTO students(s_fullname,s_contact,s_email,s_username,s_password) VALUES('$fullname','$contact','$email','$username','$password')";

      $exec_query=mysqli_query($connection,$query);
      if($exec_query){
          echo'<script>alert("Data inserted successfully")</script>';
      }
      else{
          $msg="error";
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
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
    <div>
    <h1>Hello, <?php echo $_SESSION['cust_name']; ?></h1> 
    <center><a style="float: right;" href="logout.php">Logout</a></center>
    </div>

    <div class="container">
        <div class="title"><u>Student Registration</u></div>
        <form action="#" id="form" name="contact" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" placeholder="Enter your name" id="fullname" name="s_fullname">
                </div>
                <div class="input-box">
                    <span class="details">Contact</span>
                    <input type="text" placeholder="Enter your contact number" id="contact" name="s_contact">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" id="email" name="s_email">
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" placeholder="Enter your username" id="username" name="s_username">
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" id="password" name="s_password">
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="btn_save" class="btn btn-primary btn-lg">Register</button>
                  </div>
        </div>
    </div>
    <div>
        <a href="home.php">Back</a>
    </div>
    
</body>
</html>

<?php
}
else{
    header("Location: index.php");
    exit();
}
?>