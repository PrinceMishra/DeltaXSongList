<?php 
// this host variable contains the path or url
$hostName="http://localhost/DeltaXProject";

//this code is for making connection with the database

  $host='localhost';
  $userName='root';
  $password='';
  $db_name='deltaxsonglist';
  $conn=mysqli_connect($host,$userName,$password,$db_name)or die("Connection Failed : ".mysqli_connect_error());
?>