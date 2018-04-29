<?php
session_start();
    $servername = "localhost";
    $profile_type = $_SESSION["profile_type"];
    $userID = $_SESSION["accNumber"];


    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    
    if ($profile_type == "Staff" || $profile_type == "Admin"){
        //Connect to KitCart Table
      $stmt3 = $conn->prepare("SELECT * FROM KitCart WHERE Account_Number = '$userID';"); 
      $stmt3->execute();
      $flag3=$stmt3->setFetchMode(PDO::FETCH_ASSOC);
      $result3 = $stmt3->fetchALL();
      $quantity3=0;
      for($i=0;$i<count($result3);$i++)
      {
          $row3 = $result3[$i];
          $quantity3 += $row3['Quantity'];
        }
      echo "updateKitBubble(".$quantity3.");";
      }
    
      
?>