<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 //echo "Connected successfully";

  //$con->close();
?>