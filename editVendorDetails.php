<?php
session_start();
    $servername = "localhost";
    
    $vendor_name= $_POST['name'];
    $vendor_website= $_POST['site'];
    $vendor_address= $_POST['address'];
    $vendor_number= $_POST['number'];
    $vendor_poc= $_POST['poc'];
    $vendor_email= $_POST['email'];

    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE Vendors SET Vendor_Name = '$vendor_name',`Vendor_Website` = '$vendor_website',Vendor_Address = '$vendor_address', `Vendor_Phone_Number` = '$vendor_number', `Vendor_Point_Of_Contact` = '$vendor_poc', Vendor_Contact_Email = '$vendor_email'  WHERE Vendor_Name = '$vendor_name' ;";
    $conn->exec($sql); 
      
?>