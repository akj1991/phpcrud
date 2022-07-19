<?php
require('dbconnection.php');
$msg="";
$studentId=$_GET['id'];

$sql="DELETE FROM students WHERE std_id='$studentId'";
$exec_query=mysqli_query($connection,$sql);
if($exec_query){
    // $msg="Data Deleted Successfully";
    header('location:viewstudent.php');
}
else{
    $msg="error";
}
echo $msg;


//echo "hai";
?>