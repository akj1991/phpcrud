<?php
session_start();
require('dbconnection.php');

if (isset($_POST['cust_email']) && isset($_POST['cust_password'])){
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
        return $data;
    }
    $email =validate($_POST['cust_email']);
    $password =validate($_POST['cust_password']);

    if(empty($email)){
        header("location: index.php?error=Email is required");
        exit();
    }
    else if(empty($password)){
        header("location: index.php?error=Password is required");
        exit();
    }
    else{
        $sql="SELECT * FROM customers WHERE cust_email='$email' AND cust_password='$password'";
        $result=mysqli_query($connection,$sql);

        
        if (mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);

            if ($row['cust_email'] === $email && $row['cust_password'] === $password ){
                $_SESSION['cust_username'] = $row['cust_username'];
                $_SESSION['cust_name'] = $row['cust_name'];
                $_SESSION['customer_id'] = $row['customer_id'];
                header("Location: home.php");
                exit();
            }
            else{
                header("Location: index.php?error=Incorrect Email or Password");
            exit(); 
            }
        }
        else{
            header("Location: index.php?error=Incorrect Email or Password");
        exit();
        }
    }
}
else{
    header("location: index.php");
    exit();
}
?>
