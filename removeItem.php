<?php
session_start();
    $servername = "localhost";
    
    $part_number= $_POST['number'];
    

    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['remove'])){
    $sql = "DELETE FROM ShoppingCart WHERE Part_Number = '$part_number'";}
    elseif(isset($_POST['update'])){
        $qty= $_POST['qty'];
        $sql = "UPDATE ShoppingCart SET Quantity = '$qty' WHERE Part_Number = '$part_number' ;";}
      $conn->exec($sql);
      
?>