<?php
require('dbconnection.php');
$msg="";

if(isset($_POST['btn_save'])){
    $email=$_POST['cust_email'];
    $password=$_POST['cust_password'];
    
    $sql="SELECT * FROM customers WHERE cust_email='$email' and cust_password='$password'";
    $result=mysqli_query($connection,$sql);
    $num=mysqli_num_rows($result);

    if($num >0){
      header("location:welcome.php");
    }
    else{
      echo'<script>alert("Email id and Password is not matching")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>   
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                <form class="mx-1 mx-md-4" action="welcome.php" method="post">

                  
                  <?php
                  if (isset($_GET['error'])){?>
                  <p class="error" style="background: #f2dede; color: #a94442; border-radius:5px; margin:20px auto;"><?php echo $_GET['error'];?></p>
                  <?php }
                  ?>
                  

                  <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fa fa-envelope fa-lg me-3 fa-fw" aria-hidden="true"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" name="cust_email" class="form-control" />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fa fa-lock fa-lg me-3 fa-fw" aria-hidden="true"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" name="cust_password" class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="btn_save" class="btn btn-primary btn-lg">Login</button>
                    
                  </div>
                  <center><div  style="background-color: rgb(255, 255, 255);">
                  <p>Don't have an account?<a href="customer_registration.php"> Signup Here</a></p>
                  <a href="student_login.php">Student Login</a>
                  </div></center>

                </form>

              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>