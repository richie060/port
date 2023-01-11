<?php

  $host ='localhost';
  $user ='root';
  $pass ='';
  $db_name ='registration';

  $conn = new mysqli($host,$user,$pass,$db_name);

  if ($conn->connect_error) {

  	die("Database connection error");
  	// code...
  }
  
  




 ?>