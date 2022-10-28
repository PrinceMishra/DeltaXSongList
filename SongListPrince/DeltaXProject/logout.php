

<!-- this code is for authentication wheather the user is logged or session is there or not -->

<?php
    session_start();
    include "db_config.php";
    if(!isset($_SESSION['userName']))
    {
        header("Location:{$hostName}/login.php");
    }
?>



<!-- this code is responsible for destroying the session or logout the user and 
it will redirect to the loginpage  -->



<?php
    include "db_config.php";
    session_start();
    session_unset();
    session_destroy();
    header("Location:{$hostName}/login.php");
?>