<?php
session_start();
require('dbconnection.php');

if (isset($_POST['s_email']) && isset($_POST['s_password'])){
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
        return $data;
    }
    $email =validate($_POST['s_email']);
    $password =validate($_POST['s_password']);

    if(empty($email)){
        header("location: student_login.php?error=Email is required");
        exit();
    }
    else if(empty($password)){
        header("location: student_login.php?error=Password is required");
        exit();
    }
    else{
        $sql="SELECT * FROM students WHERE s_email='$email' AND s_password='$password'";
        $result=mysqli_query($connection,$sql);

        
        if (mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);

            if ($row['s_email'] === $email && $row['s_password'] === $password ){
                $_SESSION['s_username'] = $row['s_username'];
                $_SESSION['s_fullname'] = $row['s_fullname'];
                $_SESSION['std_id'] = $row['std_id'];
                header("Location: s_home.php");
                exit();
            }
            else{
                header("Location: student_login.php?error=Incorrect Email or Password");
            exit(); 
            }
        }
        else{
            header("Location: student_login.php?error=Incorrect Email or Password");
        exit();
        }
    }
}
else{
    header("location: student_login.php");
    exit();
}
?>
