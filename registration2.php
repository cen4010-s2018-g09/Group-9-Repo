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
  <link href="mycss/registration.css" rel="stylesheet">
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
           <form>
                        <div class="form-group">
                          <label for="account_number">Z#</label>
                          <input maxlength="8" type="text" class="form-control" name="accnum" placeholder="">
                        </div>
                        <div class="form-group">
                             <label for="faunetid">FAUNET ID</label>
                             <input maxlength="15" type="text" class="form-control" name="netid" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="password">Password</label>
                        <ul>
                          <li>Must be at least 8 characters long</li>
                          <li>Must have at least one number</li>
                          <li>Must be no longer than 20 characters</li>
                        </ul>
                         <input maxlength="20" type="password" name="pwd" class="form-control">
                         </div>
                         <div class="form-group">
                        <label for="password2">Re-type password</label>
                         <input maxlength="20" type="password" name="pwd2" class="form-control">
                         </div>
                </form>
                <button onclick="registerUser();" type="submit" class="btn btn-primary mb-2" name="SubmitButton">Submit</button>
          </div>
          <div class="col-2"></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/register2.js"></script>
  </body>

</html>
