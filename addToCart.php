<?php
session_start();
$page = strrchr($_SERVER['REQUEST_URI'],'/') ;
$page = substr($page,1,-4);
$pType = $_SESSION["profile_type"];

echo "<script src='js/redirect.js'></script>";
echo "<script>userCheck('".$pType."','".$page."');</script>";

    $servername = "localhost";
    $part_name = $_COOKIE["name"];
    $part_number= $_COOKIE["number"];
    $userID = $_SESSION["accNumber"];
    $quantity= 1;
    $description= $_COOKIE["description"];
    $qty= $_COOKIE["quantity"];

    try{
    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";

    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM ShoppingCart WHERE Account_Number = '$userID' AND Part_Number = '$part_number'; "); 
    $stmt->execute();
    $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchALL();
    $row = $result[0];
    $qty = $row['Quantity'];
    echo "console.log('hello');";
    if(count($result)>0)
    {
      
      $qty = 1+ $qty;
      $sql = "UPDATE ShoppingCart SET Quantity = '$qty' WHERE Part_Number = '$part_number' AND Account_Number = '$userID' ;";
    }else{
    $sql = "insert into ShoppingCart values ('$part_number','$part_name','$quantity','$description','$userID')";
    }
    $conn->exec($sql);}catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();}
      
?>