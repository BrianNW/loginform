<?php

// did the user's browser send a cookie for the session?
if(isset($_COOKIE[session_name()])) {

  // empty cookie
  setcookie(session_name(), '', time() - 86400, '/' );
}

// clear all session variables
session_unset();

//destroy the session
session_destroy();

echo "You've been logged out! See you next time. <br>";

// log back in
echo "<p><a href='login.php'> Log back in</a></p>";



 ?>
