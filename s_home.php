<?php
session_start();

if (isset($_SESSION['std_id']) && isset($_SESSION['s_username'])){

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
    <h1>Welcome, <?php echo $_SESSION['s_fullname']; ?></h1> 
    <center><a style="float: right;" href="s_logout.php">Logout</a></center></div>
    <div>
        <!-- <div class="navbar-nav w-100">
            <a href="register.php" class="nav-item nav-link" ><i class="fa fa-laptop me-2"></i>Register Student</a> 
            
        </div> -->
    </div>
   
    
</body>
</html>

<?php
}
else{
    header("Location: student_login.php");
    exit();
}
?>