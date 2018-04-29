<?php

session_start();
    $servername = "localhost";
    $userName = $_SESSION["uname"];
    $userID = $_SESSION["accNumber"];
    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    try{
//Connect to ShoppingCart Table
    $stmt = $conn->prepare("SELECT * FROM Orders ORDER BY Order_Number DESC;"); 
    $stmt->execute();
    $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchALL();
    if(count($result>0)){
    $row = $result[0];
    $orderID = $row['Order_Number'];
    }else{
        $orderID = 0;
    }
    $orderID++;
    echo "console.log('".$orderID."');";

    $stmt2 = $conn->prepare("INSERT INTO Orders (Part_Number,Part_Name,Quantity,Account_Number,Order_Number,Order_Date,Order_Type,Status,User_Name) select Part_Number,Part_Name,Quantity,Account_Number,'$orderID',CURDATE(),'Item','Pending','$userName' from ShoppingCart where Account_Number = '$userID';"); 
    $stmt2->execute();
    $stmt2 = $conn->prepare("DELETE FROM ShoppingCart where Account_Number = '$userID';"); 
    $stmt2->execute();

    }catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();}
      
?>