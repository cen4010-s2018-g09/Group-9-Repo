<?php
session_start();
$page = strrchr($_SERVER['REQUEST_URI'],'/') ;
$page = substr($page,1,-4);
$pType = $_SESSION["profile_type"];

echo "<script src='js/redirect.js'></script>";
echo "<script>userCheck('".$pType."','".$page."');</script>";
      $servername = "localhost";
      if(isset($_SESSION["accNumber"])){
      $userID = $_SESSION["accNumber"];
      try{
    
        $username= "CEN4010_S2018g09";
        $password= "cen4010_s2018";
        $conn = new
        PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM Inventory "); 
        $stmt->execute();
        $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchALL();
        }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();}

        if(count($result)==0){
            $link = "signin.php";
            echo "<script>window.location = '$link'; </script>";
        }
    }else
    {
        $link = "signin.php";
            echo "<script>window.location = '$link'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Request New Item</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="mycss/home.css" rel="stylesheet">
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

  <!-- Navigation -->
  <nav class="navbar navbar-expand fixed-top logoNav">
  <div class="container">
      <img src="images/HNLogo5.png" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item" id = "kit-cart">
                
                </li>
        <li class="nav-item">
                <span id="cart-bubble" class="notify-bubble">0</span>
                <a href="shoppingcart.php"><img  src="images/SC2.png" width="30px" height="30px" alt=""></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signin.php">Log Out</a>
        </li>

      </ul>
    </div>
  </div>
</nav>   

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top fixed-top-2">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" id="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>

            
          </ul>

        </div>
      </nav>
    <!-- Page Content -->
    <div class="home">
    <div >
        <div class="row">
        <div class="col-2">
            <div class="nav flex-column nav-pills d-none d-sm-block" id="v-pills-tab" role="tablist" aria-orientation="vertical">
           </div>
        </div>
        <div id="newItem-form" class="col-7">
            <h1>New Item Request Form</h1>
            <p>Please fill out all fields for the new inventory item request.</p>
                
                <form  method="post">
                        <div class="form-group">
                          <label for="part_number">Part Number</label>
                          <input type="text" class="form-control" name="part_number" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="part_name">Part Name</label>
                          <input type="text" class="form-control" name="part_name" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="quantity">Quantity</label>
                          <input type="text" class="form-control" name="quantity" placeholder="">
                        </div>
                        <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea class="form-control" name="comments" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" name="SubmitButton">Submit</button>
                </form>
        
        </div>
            
            
            
            
            </div>
      </div>
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/ShoppingCartItems.js"></script>
    <script src="js/homePage.js"></script>
  </body>

<script>
<?php

$pType = $_SESSION["profile_type"];
echo "usersetting("."'".$pType."'".");";

$servername = "localhost";
$username= "CEN4010_S2018g09";
$password= "cen4010_s2018";
$conn = new
PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));

        //Connect to ShoppingCart Table
        $stmt2 = $conn->prepare("SELECT * FROM ShoppingCart WHERE Account_Number = '$userID';"); 
        $stmt2->execute();
        $flag2=$stmt2->setFetchMode(PDO::FETCH_ASSOC);
        $result2 = $stmt2->fetchALL();
        $quantity=0;
        for($i=0;$i<count($result2);$i++)
        {
            $row2 = $result2[$i];
            $quantity += $row2['Quantity'];
          }
        echo "updateBubble(".$quantity.");";

   //Connect to RequestedItems Table
    $stmt = $conn->prepare("SELECT * FROM RequestedItems ORDER BY Request_Number DESC;"); 
    $stmt->execute();
    $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchALL();

    $row = $result[0];
    $requestID = $row['Request_Number'];
    $requestID++;
    echo "console.log('".$requestID."');"; 
    
    $stmt2 = $conn->prepare("SELECT * FROM Profiles WHERE Account_Number = '$userID';"); 
    $stmt2->execute();
    $flag2=$stmt2->setFetchMode(PDO::FETCH_ASSOC);
    $result2 = $stmt2->fetchALL();
    $row2 = $result2[0];
    $userName = $row2['Name'];
    
    
if(isset($_POST['SubmitButton'])){
  $_SESSION["part_number"] = $_POST['part_number']; 
  $_SESSION["part_name"] = $_POST['part_name'];
  $_SESSION["quantity"] = $_POST['quantity'];
  $_SESSION["comments"] = $_POST['comments'];

  $part_number =$_SESSION["part_number"];
  $part_name =$_SESSION["part_name"];
  $quantity =$_SESSION["quantity"];
  $comments =$_SESSION["comments"];
    
 

try{



  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "insert into RequestedItems values ('$part_name','$part_number','$quantity','$comments','Pending','$requestID',CURDATE(),'$userName', '$userID')";
$conn->exec($sql);
  

echo "alert('Your request has been made successfully');";


$URL="index.php";
echo "location.href='$URL';";

}
catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}}
?>
</script>
</html>