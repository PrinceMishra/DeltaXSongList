<?php

// this code is responsible for uploading the image file of jpeg jpg or png
// also it will restrict to 3mb upload  to the folder uploadImages and collecting 
// the path name to store in the database

    if(isset($_FILES["uploadImage"]))
    {
        $errors=array();

        $file_name=$_FILES["uploadImage"]["name"];
        $file_size=$_FILES["uploadImage"]["size"];
        $temp_name=$_FILES["uploadImage"]["tmp_name"];
        $file_type=$_FILES["uploadImage"]["type"];
        $file_ext=strtolower(end(explode('.',$file_name)));
        $extensions=array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)===false)
        {
            $errors[]="This extension file is not allowed, Please choose JPG or PNG image.";
        }


        // calculating file size 1kb= 1024 bytes, 1mb=1024kb
        if($file_size>3145728)
        {
            $errors[]="flie size must be 3mb or lower";
        }

        if(empty($errors)==true)
        {
            $uploads_dir='uploadImages';
            move_uploaded_file($temp_name,$uploads_dir.'/'.$file_name);
        }
        else{
            print_r($errors);
            die();
        }
       
    }
// including db_config file for connection
    require('db_config.php');
    
    $s_name=mysqli_real_escape_string($conn,$_POST['songName']);
    $s_rDate=mysqli_real_escape_string($conn,$_POST['releasedDate']);
   

    // query checking song name if already exist
    $sqlSongCheck="select song_name from song_tb where song_name='{$s_name}'";
    $resultCheck=mysqli_query($conn,$sqlSongCheck) or die("Query Unsuccessful");

    // this code will check wheather song name is already available if not then it will store 
    
    if(mysqli_num_rows($resultCheck)>0)
    {
        echo"<p style='font-weight:bold; color:red'>Song Name already exist</p>";
    }
    else{
        echo $s_name;
        $sqlSong="insert into song_tb(song_name,date_of_release,cover_image) values ('{$s_name}','{$s_rDate}','{$file_name}')";
        $result=mysqli_query($conn,$sqlSong) or die("Query Unsuccessful");
        // if(mysqli_query($conn,$sqlSong))
        //     {
        //         header("Location:{$hostName}/addSong.php");
        //     }
    }
    mysqli_close($conn);


    // it will store the into the relation table artist-id and song-id 
    
    require('db_config.php');

    // fetching the song id that is supposed to store in the relational table of the database


    // $sqlSongId="SELECT song_id FROM song_tb ORDER BY song_id DESC LIMIT 1";
    $songId="";
    $sqlSongCheck="select song_id from song_tb where song_name='{$s_name}'";
    $resultRelSong=mysqli_query($conn,$sqlSongCheck) or die("Query Unsuccessful");
    if(mysqli_num_rows($resultRelSong)>0)
    {
        while($row=mysqli_fetch_assoc($resultRelSong))
        {
            $songId=$row['song_id'];
        }
    }
   
// fetching artist id and storing both song and artist id into relational table
    
    
    $s_artist= $_POST['artistName'];
    // $cnt=count($s_artist);
    
    foreach ($s_artist as $a){
        echo "$a </br>";
    }

    $sqlArtistId="select artist_id,artist_name from artist_tb ";
    $resultRelArt=mysqli_query($conn,$sqlArtistId) or die("Query Unsuccessful");
    if(mysqli_num_rows($resultRelArt)>0)
    {
        
        while($row=mysqli_fetch_assoc($resultRelArt))
        {
            // echo $row['artist_id']." ";
            $index=0;
             foreach ($s_artist as $a){
                    if($row['artist_name']==="$s_artist[$index]")
                    {
                        // echo"Hello World $s_artist[$index]";
                        // echo"Hello World $songId;
                        $sqlArtistRel="insert into rel_song_artist(artist_id,song_id) values({$row['artist_id']},{$songId})";
                        $resultSong=mysqli_query($conn,$sqlArtistRel) or die("Query Unsuccessful");
                    }
                    $index++;
                }
          
                // print_r($row['artist_id']);
          
        }
       
    }
    $s_artName=mysqli_real_escape_string($conn,$_POST['artistName[]']);
    $sqlArtistId="select artist_id from artist_tb where artist_name='{$s_artName}'";
    $resultRelArt=mysqli_query($conn,$sqlArtistId) or die("Query Unsuccessful");
    if(mysqli_num_rows($resultRelArt)>0)
    {
        while($row=mysqli_fetch_assoc($resultRelArt))
        {
            $artistId=$row['artist_id'];
            $sqlArtistRel="insert into rel_song_artist(artist_id,song_id) values({$artistId},{$songId})";
            $resultSong=mysqli_query($conn,$sqlArtistRel) or die("Query Unsuccessful");
        }
        
    }

    //after closing the connection it will redirect to song form page
    mysqli_close($conn);
    header("Location:http://localhost/DeltaXProject/addSong.php");
    
  
?>