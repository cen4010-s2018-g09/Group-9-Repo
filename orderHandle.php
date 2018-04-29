<?php
session_start();
    $servername = "localhost";
    
    $order_number= $_POST['order_number'];

    $status = $_POST['status'];

    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE Orders SET Status = '$status' WHERE Order_Number = '$order_number' ;";
    $conn->exec($sql);
    
    if ($status == "Approved"){
        $stmt = $conn->prepare("SELECT * FROM Orders WHERE Order_Number = '$order_number' ;"); 
        $stmt->execute();
        $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchALL();

        for($i=0;$i<count($result);$i++)
        {
            
            
            $row = $result[$i];
            
            $part_number =$row['Part_Number'];
            $quantity =$row['Quantity'];

            $sql2 = "UPDATE Inventory SET Quantity = Quantity - '$quantity' WHERE `Part Number` = '$part_number' ;";
            $conn->exec($sql2);
            
          }
    }
    echo "<script>location.reload();</script>";
      
?>