<?php
    include "db_config.php";
    // $user_id = $_SESSION['userId'];
    $song_id=20;
    //$_POST['sid'];
    $user_rt=3.5;
    // $_POST['rate'];
    $ex_song_rate="";
    
    // $exist_rt_query="select song_rating from song_tb where song_id=20";
    // $resultExist = mysqli_query($conn,$exist_rt_query) or die("Query Filed");
    // if(mysqli_fetch_row($resultExist)>0)
    // {
    //     echo $user_rt;
    //     while($row=mysqli_fetch_array($resultExist))
    //     {
    //         $ex_song_rate=$row['song_rating'];
    //         echo $ex_song_rate."hello";
    //     }
        
    // }
    // else
    // {
    //     mysqli_close($conn);
    // }
    echo $ex_song_rate."hello";


    if($ex_song_rate==null)
    {
        $query = "update song_tb set song_rating =({$user_rt}+song_rating)/2 where song_id={$song_id}";
        $result = mysqli_query($conn, $query);
        echo 1;
    }
    else
    {
        if($ex_song_rate!=null)
        {
            $avg_rate=($user_rt+$ex_song_rate)/2;
            $query = "update song_tb set song_rating ={$avg_rate} where song_id={$song_id}";
            $result = mysqli_query($conn, $query);
            echo 1;
        }
        else{
            echo 0;
        }
       
    }

?>