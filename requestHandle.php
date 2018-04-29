<?php
session_start();
    $servername = "localhost";
    
    $request_number= $_POST['request_number'];

    $status = $_POST['status'];

    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE RequestedItems SET Status = '$status' WHERE Request_Number = '$request_number' ;";
    $conn->exec($sql);
    
    echo "<script>location.reload();</script>";
      
?>