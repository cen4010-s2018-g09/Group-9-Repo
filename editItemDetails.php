<?php
session_start();
    $servername = "localhost";
    
    $part_number= $_POST['number'];
    $qty= $_POST['qty'];
    $vendor= $_POST['vendor'];
    $price= $_POST['price'];

    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE Inventory SET Quantity = '$qty',`Part Number` = '$part_number',Price = '$price', `Vendor P/N` = '$vendor'  WHERE `Part Number` = '$part_number' ;";
    $conn->exec($sql);
      
?>