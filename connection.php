<?php

  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "login_form_database";

  // Create a connection
  $conn = mysqli_connect( $server, $username, $password, $db );

  // Check connection

  if (!$conn) {
    die( "Connection failed: " . mysqli_connect_error() );
  }
  echo "Connected successfully";

 ?>
