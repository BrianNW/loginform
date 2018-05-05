<?php


if( isset($_POST['login'] ) ) {

// Validate the form data
function validateFormData($formData) {
  $formData = trim( stripslashes( htmlspecialchars( $formData)));
  return $formData;
  }

$formUser = validateFormData($_POST['username']);
$formPass = validateFormData($_POST['password']);

// Connect to database
include('connection.php');

// Create a SQL query
$query = "SELECT username, password FROM users WHERE username='$formUser'";

// Store the result
$result = mysqli_query($conn, $query);

// Verify if result is returned
if(mysqli_num_rows($result) > 0 ) {

  // Store basic user data in variables
  while( $row = mysqli_fetch_assoc($result) ) {
    $user = $row['username'];
    // $email = $row['email'];
    $hashPass = $row['password'];
  }

  $hashedPass = password_hash("bobsmith", PASSWORD_DEFAULT);
  // echo $hashedPass;

    // verify hashed password with typed password
    if(password_verify($formPass, $hashedPass)) {
      // correct login details
      // start session
      session_start();

      // store data in SESSION variables
      $_SESSION['loggedInUser'] = $user;
      $_SESSION['loggedInEmail'] = $email;

      header("Location: profile.php");

    } else {

      $loginError = "<div class='alert alert-danger'> Wrong username / password combination. Please try again. </div>";

      }
} else { //there are no results in the database

    $loginError = "<div class='alert alert-danger'> No such user in database. Please try again. <a class='close' data-dismiss='alert'> &times; </a>
    </div>";

    }

  // close the mysql connection
  mysqli_close($conn);

}


?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <h1>Login</h1>
            <p class="lead">Use this form to log in to your account</p>

            <?php //if(isset($loginError)) { echo $loginError; }
            echo $loginError;
            ?>

            <form class="form-inline" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">

              <div class="form-group">
                <label class="sr-only" for="login-username">Username</label>
                <input type="text" class="form-control" id="login-username" name="username" placeholder="username">
              </div>
              <div class="form-group">
                <label class="sr-only" for="login-password">Password</label>
                <input type="text" class="form-control" id="login-password" name="password" placeholder="password">
              </div>


              <?php

              ?>

              <button type="submit" class="btn btn-default" name="login"> Login! </button>

            </form>


        </div>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
