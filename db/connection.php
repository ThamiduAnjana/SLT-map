<?php

  /*$servername = "eu-cdbr-west-01.cleardb.com";
  $username = "b2a0b161bf5200";
  $password = "084a841a";
  $dbname = "heroku_6bafc677b869d27";*/
  //mysql://b2a0b161bf5200:084a841a@eu-cdbr-west-01.cleardb.com/heroku_6bafc677b869d27?reconnect=true
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "po_slt_network";

  

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>