<?php

session_start();

      $servername = "localhost";
      if(isset($_SESSION["accNumber"])){
      $userID = $_SESSION["accNumber"];
      
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

    <title>Vendor Details</title>

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
        <div id="item-details-content" class="col-7">
            <h1 id="product-name"></h1>
            <div class="row">
            <div id="product-image" class="col-6"></div>
            <div id="product-detail" class="col-6"></div>
            </div>
           
            <h3>Product Description</h3>
            <div id="product-description">

            </div>
                
                
        
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
    <script src="js/vendorDetails.js"></script>
   
  </body>
  <script>
<?php

  
$servername = "localhost";
$userID = $_SESSION["accNumber"];
$part_number =$_SESSION["part_number"];

try{

  $username= "CEN4010_S2018g09";
  $password= "cen4010_s2018";
  $conn = new
  PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  echo 'console.log('."'".$vendor_name."'".');';
  
  $stmt = $conn->prepare("SELECT * FROM Vendors "); 
  $stmt->execute();
  $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchALL();
  
  //Connect to ShoppingCart Table
  $stmt2 = $conn->prepare("SELECT * FROM ShoppingCart WHERE Account_Number = '$userID';"); 
  $stmt2->execute();
  $flag2=$stmt2->setFetchMode(PDO::FETCH_ASSOC);
  $result2 = $stmt2->fetchALL();

  echo "updateBubble(".count($result2).");";
        



        if(count($result)>0)
        {
            
            
            for($i=0;$i<count($result);$i++)
            {
                
    
                $row = $result[$i];
                
                
                if($row["Vendor_Name"] == $vendor_name){
                $_SESSION["vendor_website"] = $row['Vendor_Website'];
                $_SESSION["vendor_address"] = $row['Vendor_Address'];
                $_SESSION["vendor_phone_number"] = $row['Vendor_Phone_Number'];
                $_SESSION["vendor_point_of_contact"] = $row['Vendor_Point_Of_Contact'];
                $_SESSION["vendor_contact_email"] = $row['Vendor_Contact_Email'];
                $_SESSION["vendor_items"] = $row['Vendor_Items'];
              }
                
            }
        }

    
    }
    catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
  }
          
  $vendor_name =$_SESSION["vendor_name"];
  $vendor_website =$_SESSION["vendor_website"];
  $vendor_address =$_SESSION["vendor_address"];
  $vendor_phone_number =$_SESSION["vendor_phone_number"];
  $vendor_point_of_contact =$_SESSION["vendor_point_of_contact"];
  $vendor_contact_email =$_SESSION["vendor_contact_email"];
  $vendor_items =$_SESSION["vendor_items"];


      echo 'displayVendorDetails("'.$vendor_name.'","'.$vendor_website.'","'.$vendor_address.'","'.$vendor_phone_number.'","'.$vendor_point_of_contact.'","'.$vendor_contact_email.'","'.$vendor_itemsl.'");';
    ?>
    </script>
</html>