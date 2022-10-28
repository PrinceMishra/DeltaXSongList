<!-- this code is for authentication wheather the user is logged or session is there or not -->

<?php
    session_start();
    include "db_config.php";
    if(!isset($_SESSION['userName']))
    {
        header("Location:{$hostName}/login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeltaXSongList</title>
    <link rel="stylesheet" type="text/css" href="css/example-styles.css">
    <link rel="stylesheet" type="text/css" href="css/demo-styles.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/jquery_popup.css"> -->

    <!-- bootstrap css link included -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- jquesy file included -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- style1 css included -->
    <link rel="stylesheet" href="css/style1.css">


    <!-- star rating css included -->

 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    
    <script type="text/javascript" src="js/rating.js"></script>
    <link rel="stylesheet" href="css/rating.css" type="text/css" media="screen" title="Rating CSS">
    
    <script type="text/javascript">
        $(function(){
            $('.container').rating();
        });
    </script>
   
    
</head>
<body style="padding:0px; margin:0px">
    <div class="header">
        <nav class="navbar bg-light">
            <div class="container-fluid">
                <a href="index.php"class="navbar-brand">Home</a>
                <form class="d-flex" action="addSong.php" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success"style="margin-right:50px;" id="searchSongbtn" type="button">Search</button>
                <button class="btn btn-outline-success" id="logoutBtn" onClick="myFunction()"  type="submit">Logout</button>
                </form>
            </div>

            <div  id="SearchBox"></div>
        </nav>
        
    </div>


    <!-- this script is to logout or destroy the session of the user on click logout button -->

    <script>
      function myFunction() {
        window.location.href="http://localhost/DeltaXProject/logout.php";  
      }
    </script>
</body>
</html>