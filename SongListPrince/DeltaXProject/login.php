
<!-- this code is responsible for login the user and authentication also it stores the session variable so 
so that user can surf this whole website and can visit desired page  -->
<?php
  if(isset($_POST['loginUser']))
  {
    include "db_config.php";
    $userEmail=mysqli_real_escape_string($conn,$_POST['userEmail']);
    $userPass=mysqli_real_escape_string($conn,md5($_POST['userPassword']));
    $sql="select user_id user_name from user_tb where user_email='{$userEmail}' and user_password='{$userPass}'";
    $result=mysqli_query($conn,$sql) or die("Query Failed");
    if(mysqli_num_rows($result)>0){
      echo"hello";
      while($row=mysqli_fetch_assoc($result))
      {
        session_start();
        $_SESSION['userName']=$row['user_name'];
        $_SESSION['userId']=$row['user_id'];

        header("Location:{$hostName}/index.php");
      }
    }
    else{
      echo"<div class='alert alert-danger'>User name and password are not matched</div>";
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeltaXSongList</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style1.css">
 
    
</head>
<body style="padding:0px; margin:0px">
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    <section class="vh-100" style="background-color: light;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="email"  placeholder="Email" name="userEmail" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
              <input type="password" placeholder="Password" name="userPassword"  class="form-control form-control-lg" />
            </div>

            <!-- Checkbox -->
            <!-- <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div> -->

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="loginUser">Login</button>

            <hr class="my-4">
            <div>
              <p class="mb-0">Don't have an account? <a href="register.php" class="text-dark-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>


</body>
</html>
