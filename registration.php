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
          <form action="register.php" method="post">
                        <div class="form-group">
                          <label for="full_name">Full Name</label>
                          <input type="text" class="form-control" name="fname" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="account_number">Z#</label>
                          <input type="text" class="form-control" name="accnum" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="class_crn">Class crn</label>
                          <input type="text" class="form-control" name="ccrn" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="college">College</label>
                          <input type="text" class="form-control" name="college" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="department">Deparment</label>
                          <input type="text" class="form-control" name="department" placeholder="">
                        </div>
                        <div class="form-group">
                             <label for="classabv">Class Code</label>
                             <input type="text" class="form-control" name="classabv" placeholder="">
                        </div>
                        <div class="form-group">
                             <label for="class_number">Class Number</label>
                             <input type="text" class="form-control" name="classnum" placeholder="">
                        </div>
                        <div class="form-group">
                             <label for="class_name">Class Name</label>
                             <input type="text" class="form-control" name="classname" placeholder="">
                        </div>
                        <div class="form-group">
                             <label for="email">Email</label>
                             <input type="text" class="form-control" name="email" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="password">Password</label>
                         <input type="text" name="pwd" class="form-control">
                         </div>
                        <button type="submit" class="btn btn-primary mb-2" name="SubmitButton">Submit</button>
                </form>
          </div>
          <div class="col-2"></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
