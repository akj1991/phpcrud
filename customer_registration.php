<?php
require('dbconnection.php');
$msg="";

if(isset($_POST['btn_save'])){
    $name=$_POST['cust_name'];
    $dob=$_POST['cust_dob'];
    $email=$_POST['cust_email'];
    $username=$_POST['cust_username'];
    $password=$_POST['cust_password'];
    
    $sql="SELECT * FROM customers WHERE cust_email='$email'";
    $result=mysqli_query($connection,$sql);
    $num=mysqli_num_rows($result);

    if($num >0){
      echo'<script>alert("Email already exsists!")</script>';
    }
    else{
      $query="INSERT INTO customers(cust_name,cust_dob,cust_email,cust_username,cust_password) VALUES('$name','$dob','$email','$username','$password')";

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
    <title>Document</title>
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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" action="" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-user fa-lg me-3 fa-fw" aria-hidden="true"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" name="cust_name" class="form-control" />
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-calendar fa-lg me-3 fa-fw" aria-hidden="true"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="date" id="form3Example3c" name="cust_dob" class="form-control" />
                        <label class="form-label" for="form3Example3c">Date of Birth</label>
                      </div>
                    </div>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fa fa-user-circle fa-lg me-3 fa-fw" aria-hidden="true"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example4c" name="cust_username" class="form-control" />
                      <label class="form-label" for="form3Example4c">Username</label>
                    </div>
                  </div>

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
                    <button type="submit" name="btn_save" class="btn btn-primary btn-lg">Register</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <p>Have an account?&nbsp;<a href="index.php"> Login Here</a></p>
                  </div>
                  

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