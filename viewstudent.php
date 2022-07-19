<?php



require('dbconnection.php');
$msg="";
$query="SELECT * FROM students";
$exec_query=mysqli_query($connection,$query);

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
    <link rel="stylesheet" type="text/css" href="viewstudent.css">
</head>
<body>
    <div>
    <h1>Hello, <?php echo $_SESSION['cust_name']; ?></h1> 
    <center><a style="float: right;" href="logout.php">Logout</a></center></div>
    <table border=1 style="background-color: rgb(255, 255, 255);">
        <tr>
            <th>Fullname</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Delete</th>
</tr>
<?php
if(mysqli_num_rows($exec_query)>0){
    while($row=mysqli_fetch_assoc($exec_query)){
    ?>.
    <tr>
        <td><?php echo $row['s_fullname'];?></td>
        <td><?php echo $row['s_contact'];?></td>
        <td><?php echo $row['s_email'];?></td>
        <td><?php echo $row['s_username'];?></td>
        <td><?php echo $row['s_password'];?></td>
        <td><a href="s_delete.php?id=<?php echo $row['std_id'];?>" onclick="confirm('are you sure, you want to delete');">Delete</a></td>
    </tr>
    <?php

    }
}
?>
    </table>
    <div style="margin-top: 50px;">
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