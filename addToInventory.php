<?php
session_start();
    $servername = "localhost";
    
    $part_number= $_POST['number'];
    $part_name= $_POST['name'];
    $vendor= $_POST['vendor'];
    $quantity= $_POST['quantity'];
    $price= $_POST['price'];
    $description= $_POST['description'];


    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "insert into Inventory values ('$part_number','$part_name','NA','NA','$vendor','$quantity','$price','NA','$description')";
    if ($part_number)
        $conn->exec($sql);
    
      
?>