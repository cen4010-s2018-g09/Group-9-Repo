<?php
session_start();
    $servername = "localhost";

 /*    if(isset($_POST['name']) && isset($_POST['accnum'])){
        $fname= $_POST['name'];
        $accNum= $_POST['accnum'];
        $accNum = urlencode($accNum); 
      } */
    
    $fname= $_POST['name'];
    $accNum= $_POST['accNum'];
    $classCrn= $_POST['classCrn'];
    $college= $_POST['college'];
    $dept= $_POST['dept'];
    $classCode= $_POST['classCode'];
    $classNum= $_POST['classNum'];
    $className= $_POST['className'];
    $email= $_POST['email'];
    $ptype= 'Student';


    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "insert into Profiles values ('$fname','$accNum','$classCrn','$college','$dept','$classCode','$classNum','$className','$email','$ptype')";
    if ($fname)
        $conn->exec($sql);
    
      
?>