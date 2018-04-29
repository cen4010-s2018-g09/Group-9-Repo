<?php
session_start();
$_SESSION = array();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

   
    <!-- Page Content -->
    <div class="container">
      <div class="row" style="margin-top:5rem;">
        <div class="col-2"></div>
        <div class="col-8">
          <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
              <img src="images/HNLogo5.png" style="margin-bottom:3rem;" alt="">
            </div>
            <div class="col-4"></div>
          </div>
          <form action="login.php" method="post">
            <div class="row">
            <label class="login" for="username">Username: </label>
            <input type="text" class="form-control" name="uname">
            </div>
            
            <div class="row">
            <label class="login" for="password">Password: </label>
            <input type="password" name="pwd" class="form-control">
            </div>
            <div class="row"><br></div>
            <input type="submit" class="login btn btn-primary" value="Login">        
          </form>
          <a href="registration2.php">New to the site? Register Now!</a>
          </div>
          <div class="col-2"></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
