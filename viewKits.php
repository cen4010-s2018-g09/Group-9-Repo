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

    <title>Kits</title>

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
                    <span id="cart-bubble" class="notify-bubble"></span>
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
          <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" id="search-box" placeholder="Search" onkeypress="searchBar(this.value);" aria-label="Search">
          </div>
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
        <div class="col" style="margin-right:0.5rem;">
            

            <div id="items" class="row" >

            </div>

        </div>
            
            
            
            
            </div>
        </div>
      
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/itemDetails.js"></script>
    <script src="js/homePage.js"></script>
    <script src="js/ShoppingCartItems.js"></script>
    <script src="js/kits.js"></script>
    <script src="js/searchBar.js"></script>
  </body>

  <script>
    <?php
      $servername = "localhost";
      $userID = $_SESSION["accNumber"];
      $profile_type = $_SESSION["profile_type"];
      echo 'usersetting('."'".$profile_type."'".');';
      try{
    
        $username= "CEN4010_S2018g09";
        $password= "cen4010_s2018";
        $conn = new
        PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //Connect to Kits Table
        $stmt = $conn->prepare("SELECT * FROM Kits ORDER BY kit_Number DESC"); 
        $stmt->execute();
        $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchALL();

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

        if(count($result)>0)
        {
            
$items = [];
$kits = [];
$first = true;
$kit_number_temp = "";
for($i=0;$i<count($result);$i++)
{
    
    
    $row = $result[$i];

    $kit_number =$row['Kit_Number'];

    if ($kit_number_temp != $kit_number)
    {   
        if ($i+1==count($result)){
            array_push($kits,$items);
            $items = [];
            array_push($items,$row);
        }
            
        if ($first != true )
            {
                array_push($kits,$items);
            }
        $items = [];
        $first = false;

    }elseif($i+1==count($result)){
        array_push($items,$row);
        array_push($kits,$items);
    }
    $kit_number_temp = $kit_number;
    array_push($items,$row);
    
   
    
  }
  echo "/*";
  print_r ($kits);
  echo "*/";

  for($i=0;$i<count($kits);$i++){

        $kit_name =$kits[$i][0]['Kit_Name'];
        $kit_number =$kits[$i][0]['Kit_Number'];
        $class =$kits[$i][0]['Class_For_Kit'];
    //Call create kit function
    echo "createKit('".$kit_number."','".$kit_name."','".$class."');";
    for($j=0;$j<count($kits[$i]);$j++){
      //Call append to kit function
      $kit_number =$kits[$i][$j]['Kit_Number'];
      $part_name =$kits[$i][$j]['Part_Name'];
      $part_number =$kits[$i][$j]['Part_Number'];
      $quantity =$kits[$i][$j]['Quantity_In_Kit'];
      echo "appendToKit('".$kit_number."','".$part_name."','".$part_number."','".$quantity."');";
    }
  }
           
        
        }

    }
    
    catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
  }

  

     
    ?>
    
  </script>

</html>
