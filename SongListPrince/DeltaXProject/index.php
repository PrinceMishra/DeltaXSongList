<!-- including file for menu and header -->
<?php
  include('menu.php');
?>



<nav class="navbar bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" style="font-weight:bolder">Top 10 Songs</a>
        <form class="d-flex" action="addSong.php" role="AddSongs">
            <button class="btn btn-outline-success" id="addSongbtn" type="submit">Add Songs</button>
        </form>
    </div>
</nav>
<div class="secondHead">

    <div class='rowSong' style='background-color:#aaa;'>
        <div class='columnSong'>
            <h2>Artwork</h2>
        </div>
        <div class='columnSong'>
            <h2>Song</h2>
        </div>
        <div class='columnSong'>
            <h2>Date of Release</h2>
        </div>
        <div class='columnSong'>
            <h2>Artists</h2>
        </div>
        <div class='columnSong'>
            <h2>Rate</h2>
        </div>
    </div>

    <!-- to print song data from the database  -->
<?php 
      require_once'db_config.php';
      //  this query is basically getting the data from 
    //the data base with one song and its multiple artist if that is there 
    
      $sql="SELECT st.cover_image,st.song_id,st.song_name,st.date_of_release,
      st.song_rating,GROUP_CONCAT(art.artist_name) nameArtist
      from artist_tb art, song_tb st, rel_song_artist rsa
      where rsa.artist_id=art.artist_id and rsa.song_id=st.song_id and 
      st.song_id in (select song_id from song_tb order by song_rating desc)
      GROUP BY st.song_id
      limit 10";

      $result=mysqli_query($conn,$sql) or die("Query Unsuccessful");
      if(mysqli_num_rows($result)>0)
      {
        while($row=mysqli_fetch_assoc($result))
        {
    ?>
    <div class='rowSong'>
        <div class='columnSong'>
            <img src="uploadImages/<?php echo $row['cover_image']?>" style="height:60px; width:60px;">
        </div>
        <div class='columnSong'>
            <h4><?php echo $row['song_name'] ?></h4>
        </div>
        <div class='columnSong'>
            <h4><?php echo $row['date_of_release'] ?></h4>
        </div>
        <div class='columnSong'>
            <h4><?php echo $row['nameArtist'] ?></h4>
        </div>
        <div class='columnSong'>
            <section class="container">
                <input type="radio" name="example" class="rating" value="1" />
                <input type="radio" name="example" class="rating" value="2" />
                <input type="radio" name="example" class="rating" value="3" />
                <input type="radio" name="example" class="rating" value="4" />
                <input type="radio" name="example" class="rating" value="5" />
             </section>
        </div>
</div>
    
        <?php
                     
            }
        }
            
    ?>
</div>
 

<input type="hidden" value="<?php echo $row['song_id'];?>" name="song_id">
 

    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-weight:bolder">Top 10 Artists</a>

        </div>
    </nav>
   
    <div class='rowArtist' style='background-color:#aaa;'>
        <div class='columnArtist'>
            <h2>Artists</h2>
        </div>
        <div class='columnArtist'>
            <h2>Date Of Birth</h2>
        </div>
        <div class='columnArtist'>
            <h2>Song</h2>
        </div>

    </div>
    <!-- to print artist data from the database  -->
     <?php 
      require_once'db_config.php';
    //  this query is basically getting the data from 
    //the data base with one artist and his multiple song if that is there 
      $sqlSong="SELECT st.song_id,art.artist_name,art.artist_dob,GROUP_CONCAT(st.song_name) nameSong
      from artist_tb art, song_tb st, rel_song_artist rsa
      where rsa.artist_id=art.artist_id and rsa.song_id=st.song_id
      and st.song_id in (select song_id from song_tb order by song_rating desc )
      GROUP BY art.artist_id limit 10" ;
      $result=mysqli_query($conn,$sqlSong) or die("Query Unsuccessful");
      if(mysqli_num_rows($result)>0)
      {
        while($row=mysqli_fetch_assoc($result))
        {
    ?>
          <div class='rowArtist'>
          <div class='columnArtist'  >
          <h4><?php echo $row['artist_name'] ?></h4>
          </div>
          <div class='columnArtist' >
            <h4><?php echo $row['artist_dob'] ?></h4>
          </div>
          <div class='columnArtist' >
            <h4><?php echo $row['nameSong'] ?></h4>
          </div>
        
        </div>
        
    <?php
        }
    }
    ?>

</div>
</div>

<!-- this script file is included for star ratings -->


<!-- this script is for star ratings using ajax -->
   




  
</script>
</body>
</html>

</body>

</html>