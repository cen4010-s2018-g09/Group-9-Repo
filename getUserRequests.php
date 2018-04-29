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
    $stmt = $conn->prepare("SELECT * FROM JobRequests WHERE Account_Number = '$userID' ORDER BY Job_Number DESC;"); 
    $stmt->execute();
    $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchALL();

    //echo "console.log('"."orderID"."');";

    $stmt2 = $conn->prepare("SELECT * FROM RequestedItems WHERE Account_Number = '$userID' ORDER BY Request_Number DESC;"); 
    $stmt2->execute();
    $flag2=$stmt2->setFetchMode(PDO::FETCH_ASSOC);
    $result2 = $stmt2->fetchALL();

    $_SESSION['jobRequests']= array();
    $_SESSION['itemRequests'] = array();

    foreach($result as $jrequest){
        array_push($_SESSION['jobRequests'],$jrequest);
    }

    foreach($result2 as $irequest){
        array_push($_SESSION['itemRequests'],$irequest);
    }
    $itemRequests = $_SESSION['itemRequests'];
    $jobRequests = $_SESSION['jobRequests'];
    echo 'displayUserRequests('."'".json_encode($itemRequests)."'".','."'".json_encode($jobRequests)."'".');';
    }catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();}
      
?>