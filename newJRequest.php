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
        
        $stmt = $conn->prepare("SELECT * FROM JobRequests "); 
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

    <title>Job Request Form</title>

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
            <h1>New Job Request Form</h1>
            <p>Please fill out all fields for your job request.</p>
                
                <form  method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="job_type">Job Type</label>
                          <input type="text" class="form-control" name="job_type" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="file_one">File Attachment</label>
                          <input type="file" name="fileToUpload" id="fileToUpload">
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

$userID = $_SESSION["accNumber"];
$pType = $_SESSION["profile_type"];
echo "usersetting("."'".$pType."'".");";

$servername = "localhost";
$username= "CEN4010_S2018g09";
$password= "cen4010_s2018";
$conn = new
PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));

//Connect to ShoppingCart Table
$stmt2 = $conn->prepare("SELECT * FROM ShoppingCart"); 
$stmt2->execute();
$flag2=$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$result2 = $stmt2->fetchALL();

echo "updateBubble(".count($result2).");";

//Connect to JobRequests table
$stmt = $conn->prepare("SELECT * FROM JobRequests ORDER BY Job_Number DESC;"); 
$stmt->execute();
$flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchALL();
echo 'console.log("'.count($result).'");';

if(count($result)>0){
$row = $result[0];
$jobID = $row['Job_Number'];
$jobID++;
}
else 
{
  $jobID = 0;
}

if(isset($_FILES['fileToUpload'])){
  echo 'console.log("File");';
  $errors= array();
  $file = rand(1000,100000)."-".$_FILES['fileToUpload']['name'];
  $file_name = 'job_'.$jobID.'.'.pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
  $_SESSION["file_one"] = $file_name;
  $file_size = $_FILES['fileToUpload']['size'];
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];






   // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB

   // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 $final_file=str_replace(' ','-',$new_file_name);


  if($file_size > 2097152) {
     $errors[]='File size must be less than 2 MB';
  }
  //$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //$sql="INSERT INTO JobRequests(File_One) VALUES('$final_file')";
  //mysql_query($sql);

  if(empty($errors)==true) {
     move_uploaded_file($file_tmp,"uploads/".$file_name);
     echo "console.log('Success');";
  }else{
     echo 'console.log('.$errors.');';
  }
}

if(isset($_POST['SubmitButton'])){


  $_SESSION["job_type"] = $_POST['job_type']; 
  $filename = $_SESSION["file_one"];
  //$_SESSION["file_two"] = $_POST['file_two'];
  $_SESSION["comments"] = $_POST['comments'];

  $job_type =$_SESSION["job_type"];
  $comments =$_SESSION["comments"];

try{


  
  $userName = $_SESSION["uname"];
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO JobRequests VALUES ('$jobID','$job_type','$filename ','$comments','Pending',CURDATE(),'$userName','$userID')";
    $conn->exec($sql);
  //echo '<script>window.location = "confirm.php";</script>';
  echo 'alert("Your request has been submitted successfully");';



}
catch(PDOException $e){
echo 'console.log("'."Connection failed: " . $e->getMessage().'");';
}}
?>
</script>
</html>