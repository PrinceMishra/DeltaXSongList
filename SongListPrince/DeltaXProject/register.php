<?php
// checking if the user is existing or not then inserting accordingly

  if(isset($_POST['resgiterUser'])){
    include 'db_config.php';

    $name=mysqli_real_escape_string($conn,$_POST['u_name']);
    $email=mysqli_real_escape_string($conn,$_POST['u_email']);
    $pass=mysqli_real_escape_string($conn,md5($_POST['u_password']));

    $sql="select user_name from user_tb where user_name='{$name}'";
    $result=mysqli_query($conn,$sql) or die("Query Failed.");
    if(mysqli_num_rows($result)>0)
    {
      // if user is already in the databse then it output the message below
      echo"<p style='font-weight:bold; color:red'>User Name already exist</p>";
    }
    else{
      $sqlInsert="insert into user_tb(user_name,user_email,user_password) values('{$name}','{$email}','{$pass}')";
      if(mysqli_query($conn,$sqlInsert))
      {
        // Redirecting to login page
        header("Location:{$hostName}/login.php");
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
    <title>DeltaXSongList</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style1.css">
 
    
</head>
<body style="padding:0px; margin:0px">
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Your Name</label>
                      <input type="text" id="form3Example1c" name="u_name" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Your Email</label>
                      <input type="email" id="form3Example3c" name="u_email" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" id="form3Example4c" name="u_password" class="form-control" />
                    </div>
                  </div>

                 

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="resgiterUser" class="btn btn-primary btn-lg">Register</button>
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

