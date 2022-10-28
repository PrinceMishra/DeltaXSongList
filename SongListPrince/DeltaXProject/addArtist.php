
<!-- this code is for authentication wheather the user is logged or session is there or not -->

<?php
    session_start();
    include "db_config.php";
    if(!isset($_SESSION['userName']))
    {
        header("Location:{$hostName}/login.php");
    }
?>



<?php

   // this code is responsible for inserting the artist data into the artist table in database


   $aName=$_POST["art_name"];
   $aDob=$_POST["art_dob"];
   $aBio=$_POST["art_bio"];

    include 'db_config.php';
    $sql="select * from artist_tb where artist_name='{$aName}'";
    $result=mysqli_query($conn,$sql) or die("Unsuccessful Query");
    
    // $result=mysqli_query($conn,$sqlArtist) or die("Query Unsuccessful");
    if(mysqli_num_rows($result)>0){
        
        echo 0;
       
    }
    else{
        $sqlArtist="insert into artist_tb(artist_name,artist_dob,artist_bio) values('{$aName}','{$aDob}','{$aBio}') ";
        if(mysqli_query($conn,$sqlArtist))
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

?>


