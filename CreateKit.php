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

    $Kit_Name= $_POST['KitName'];
    $Kit_Class= $_POST['KitClass'];


    try{
//Connect to KitCart Table
    $stmt = $conn->prepare("SELECT * FROM Kits ORDER BY Kit_Number DESC;"); 
    $stmt->execute();
    $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchALL();
    if(count($result) != 0){
    $row = $result[0];
    $KitID = $row['Kit_Number'];
    }   else{
    $KitID = 0;
    }
    $KitID++;
    

    $stmt2 = $conn->prepare("INSERT INTO Kits (Kit_Name,Class_For_Kit,Kit_Number,Part_Number,Quantity_In_Kit,Part_Name,Account_Number,User_Name) select '$Kit_Name','$Kit_Class','$KitID',Part_Number,Quantity,Part_Name,'$userID','$userName' from KitCart where Account_Number = '$userID';"); 
    $stmt2->execute();
    $stmt2 = $conn->prepare("DELETE FROM KitCart where Account_Number = '$userID';"); 
    $stmt2->execute();

        
    echo "alert('Your kit has been created successfully');";

    $URL="viewKits.php";
    echo "location.href='$URL';";
        
    }catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();}
      
?>