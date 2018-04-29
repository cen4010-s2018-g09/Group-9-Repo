<?php
session_start();

      $servername = "localhost";
      if(isset($_SESSION["accNumber"])){
      $userID = $_SESSION["accNumber"];
      try{
    
        $username= "CEN4010_S2018g09";
        $password= "cen4010_s2018";
        $conn = new
        PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM Vendors "); 
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

    <title>Add New Vendor</title>

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
           <h1>New Vendor Form</h1>
           <p>Please fill out all fields for creating a new vendor in the system.</p>
                
                <form  method="post">
                        <div class="form-group">
                          <label for="vendor_name">Vendor Name</label>
                          <input type="text" class="form-control" name="vendor_name" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="vendor_website">Vendor Website</label>
                          <input type="text" class="form-control" name="vendor_website" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="vendor_address">Vendor Address</label>
                          <input type="text" class="form-control" name="vendor_address" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="vendor_phone_number">Vendor Phone Number</label>
                          <input type="text" class="form-control" name="vendor_phone_number" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="vendor_poc">Vendor Point of Contact</label>
                          <input type="text" class="form-control" name="vendor_poc" placeholder="">
                        </div>
                         <div class="form-group">
                          <label for="vendor_contact_email">Vendor Email</label>
                          <input type="text" class="form-control" name="vendor_contact_email" placeholder="">
                        </div>
                        <div class="form-group">
                                <label for="vendor_items">Vendor Items</label>
                                <textarea class="form-control" name="vendor_items" rows="3"></textarea>
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
    <script src="js/homePage.js"></script>
    <script src="js/ShoppingCartItems.js"></script>
    <script src="js/vendorDetails.js"></script>
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

if(isset($_POST['SubmitButton'])){
  $_SESSION["vendor_name"] = $_POST['vendor_name']; 
  $_SESSION["vendor_website"] = $_POST['vendor_website'];
  $_SESSION["vendor_address"] = $_POST['vendor_address'];
  $_SESSION["vendor_phone_number"] = $_POST['vendor_phone_number'];
  $_SESSION["vendor_poc"] = $_POST['vendor_poc'];
  $_SESSION["vendor_contact_email"] = $_POST['vendor_contact_email'];
  $_SESSION["vendor_items"] = $_POST['vendor_items'];

  $vendor_name =$_SESSION["vendor_name"];
  $vendor_website =$_SESSION["vendor_website"];
  $vendor_address =$_SESSION["vendor_address"];
  $vendor_phone_number =$_SESSION["vendor_phone_number"];
  $vendor_poc =$_SESSION["vendor_poc"];
  $vendor_contact_email =$_SESSION["vendor_contact_email"];
  $vendor_items =$_SESSION["vendor_items"];

try{



  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO Vendors VALUES ('$vendor_name','$vendor_website ','$vendor_address','$vendor_phone_number','$vendor_poc','$vendor_contact_email','$vendor_items')";
    $conn->exec($sql);
//   echo '<script>window.location = "vendorDetails.php";</script>';
  
//$yourURL="http://lamp.cse.fau.edu/~CEN4010_S2018g09/dev/Alicia/vendorDetails.php";
//echo ("<script>location.href='$yourURL'</script>");


echo "alert('Your message has been sent successfully');";


$URL="vendorDetails.php";
echo "location.href='$URL';";


}
catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}}
?>
</script>
</html>