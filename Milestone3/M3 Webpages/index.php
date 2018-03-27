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
       
        <li class="nav-item">
                <img src="images/SC2.png" width="30px" height="30px" alt="">
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
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item active">
              <a class="nav-link" href="inventory.php">Inventory </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="#">Job Requests </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="#">Orders </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="#">Vendors </a>
            </li>

            <li class="nav-item active">
                    <a class="nav-link" href="#">Profiles </a>
            </li>
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    <!-- Page Content -->
    <div class="home">
    <div >
        <div class="row">
        <div class="col-2 ">
                <div class="nav flex-column nav-pills d-none d-sm-block" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link sideBar"  href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Add New Profile</a>
                        <a class="nav-link sideBar" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Request New Item</a>
                        <a class="nav-link sideBar" href="newItem.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Add New Item</a>
                        <a class="nav-link sideBar" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Create New Kit</a>
                        <a class="nav-link sideBar" href="#v-pills-vendor" role="tab" aria-controls="v-pills-vendor" aria-selected="false">Add New Vendor</a>
                    </div>
                      
        </div>
        <div class="col-10">
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
                
        <div id="user-info" class="home">
          
            
          
        </div>

        </div>
            
            
            
            
            </div>
      </div>
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/homePage.js"></script>
  </body>

  <script>
    <?php
      $servername = "localhost";
      $userID = $_SESSION["accNumber"];
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
        
        if(count($result)>0)
        {
            
            
            for($i=0;$i<count($result);$i++)
            {
                
    
                $row = $result[$i];
                
                $_SESSION["name"] = $row["Name"];
                $_SESSION["college"] = $row["College"];
                $_SESSION["class_crn"] = $row["Class_crn"];
                $_SESSION["department"] = $row["Department"];
                $_SESSION["class"] = $row["Class"];
                $_SESSION["class_number"] = $row["Class_Number"];
                $_SESSION["email"] = $row["Email"];
                $_SESSION["profile_type"] = $row["Profile_Type"];
                
                
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
      $email = $_SESSION["email"];
      $profile_type = $_SESSION["profile_type"];

      echo 'displayUserData('.$userID.',"'.$college.'","'.$class_crn.'","'.$department.'","'.$class.'","'.$class_number.'","'.$email.'","'.$name.'");';
    ?>
  </script>

</html>
