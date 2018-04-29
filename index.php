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
  <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118018298-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118018298-2');
    </script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

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

    <!-- Page Body -->
    <div class="home">
    <div>
        <div class="row">
        <!-- Sidebar -->
        <div class="col-2 ">
                <div class="nav flex-column nav-pills d-none d-sm-block" id="v-pills-tab" role="tablist" aria-orientation="vertical">
               </div>
                      
        </div>
        <!-- Page Content -->
        <div id="page_content" class="col-9">
        <div class="row" id="page_content_top" >
        <div id="slideshow" class="col">
        
            <div id="demo" class="carousel slide col-lg col-xl d-none d-sm-block" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="#demo" data-slide-to="2"></li>
                      <li data-target="#demo" data-slide-to="3"></li>
                    </ul>
                  
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="images/slider/01.png" align="center" alt="Los Angeles">
                      </div>
                      <div class="carousel-item">
                        <img src="images/slider/02.jpg" align="center" alt="Los Angeles">
                      </div>
                      <div class="carousel-item">
                        <img src="images/slider/03.png" align="center" alt="Los Angeles">
                      </div>
                      <div class="carousel-item">
                            <img src="images/slider/04.png" align="center" alt="Los Angeles">
                        </div>
                    </div>
                   
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
            </div>
          </div>

          </div> 
        
            <div id="user-info" class="home">
          
            
          
        </div>
        <div id="user-orders">

        </div>

        </div>
          <div class="col-1"></div>  
            
            
            
            </div>
      </div>
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/homePage.js"></script>
    <script src="js/ShoppingCartItems.js"></script>
    <script src="js/redirect.js"></script>
    <script src="js/displayUserRequests.js"></script>
  </body>

  <script>
    displayUserOrders();
    
    <?php
    
      $servername = "localhost";
      $userID = $_SESSION["accNumber"];
      
      $_SESSION['classes'] = array();
      
      try{
    
        $username= "CEN4010_S2018g09";
        $password= "cen4010_s2018";
        $conn = new
        PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM Profiles WHERE Account_Number = '$userID' "); 
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
            
            
            for($i=0;$i<count($result);$i++)
            {
                
    
                $row = $result[$i];
                
                $_SESSION["name"] = $row["Name"];
                $_SESSION["college"] = $row["College"];
                $_SESSION["class_crn"] = $row["Class_crn"];
                $_SESSION["department"] = $row["Department"];
                $_SESSION["class"] = $row["Class_Code"];
                $_SESSION["class_number"] = $row["Class_Number"];
                $_SESSION["class_name"] = $row["Class_Name"];
                $_SESSION["email"] = $row["Email"];
                $_SESSION["profile_type"] = $row["Profile_Type"];
                $class = array();
                array_push($class,$row["Class_crn"],$row["Class_Code"],$row["Class_Number"],$row["Class_Name"]);
                array_push($_SESSION['classes'],$class);
                
            }
        }

    
    }
    catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
  }
          
      $name = $_SESSION["name"];
      $college = $_SESSION["college"];
      $class_crn = $_SESSION["class_crn"];
      $department = $_SESSION["department"];
      $class = $_SESSION["class"];
      $class_number = $_SESSION["class_number"];
      $class_name = $_SESSION["class_name"];
      $email = $_SESSION["email"];
      $profile_type = $_SESSION["profile_type"];
      $classes = $_SESSION['classes'];
      
      echo 'displayUserData('.$userID.',"'.$college.'","'.$department.'",'."'".json_encode($classes)."'".',"'.$email.'","'.$name.'","'.$profile_type.'");';
      if ($profile_type == "Student"){
        echo 'getUserRequests();';}
    ?>

  </script>

</html>
