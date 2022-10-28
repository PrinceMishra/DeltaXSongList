
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

// this code will first fetch the artist list and then send the data to the jquery function 
// and that will print on the html page 

include 'db_config.php';
$sqlArtist="Select artist_name from artist_tb ";
$result=mysqli_query($conn,$sqlArtist) or die("Query Unsuccessful");
$output="<select id='people' name='artistName[]' multiple>";
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result))
    {
        $output.="<option >{$row['artist_name']}</option>";
    }
$output.="</select>";
mysqli_close($conn);
echo $output;
}

?>

<!--  Jquery -->
<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<!-- multiselect Jquery -->
<script type="text/javascript" src="js/jquery.multi-select.js"></script>

<!-- this script is for mutltiselect of an artist -->
        <script type="text/javascript">
              // multiselect will work on id people using jquery
            $(function() {
                $('#people').multiSelect();
            });
        </script>