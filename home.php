<?php
session_start();

if (isset($_SESSION['customer_id']) && isset($_SESSION['cust_username'])){

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
    <center><a style="float: right;" href="logout.php">Logout</a></center></div>
    <div>
        <div class="navbar-nav w-100">
            <a href="register.php" class="nav-item nav-link" ><i class="fa fa-laptop me-2"></i>Register Student</a> 
            <a href="viewstudent.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>View Active Students</a>
            <a href="updatestudent.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Update Student Profile</a>
        </div>
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