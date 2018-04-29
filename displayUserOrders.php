<?php
session_start();

      $servername = "localhost";
      $userID = $_SESSION["accNumber"];
      $profile_type = $_SESSION["profile_type"];

      try{
    
        $username= "CEN4010_S2018g09";
        $password= "cen4010_s2018";
        $conn = new
        PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //Connect to Orders Table
        $stmt = $conn->prepare("SELECT * FROM Orders  WHERE Account_Number = '$userID' ORDER BY Order_Number DESC;"); 
        $stmt->execute();
        $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchALL();
        


        if(count($result)>0)
        {
            
$items = [];
$orders = [];
$first = true;
$order_number_temp = "";
for($i=0;$i<count($result);$i++)
{
    
    
    $row = $result[$i];

    $order_number =$row['Order_Number'];

    if ($order_number_temp != $order_number )
    {   
        if ($i+1==count($result) && count($result) != 1){
            array_push($orders,$items);
            $items = [];
            array_push($items,$row);
        }
            
        if ($first != true )
            {
                array_push($orders,$items);
            }
        if(count($result) == 1)
        {
            array_push($items,$row);
            array_push($orders,$items);
        }
        $items = [];
        $first = false;

    }elseif($i+1==count($result)){
        array_push($items,$row);
        array_push($orders,$items);
    }
    $order_number_temp = $order_number;
    array_push($items,$row);
    
   
    
  }
  echo "/*";
  print_r ($orders);
  echo "*/";

  foreach ($orders as $order) {

        $order_number =$order[0]['Order_Number'];
        $order_date =$order[0]['Order_Date'];
        $order_type =$order[0]['Order_Type'];
        $user_name =$order[0]['User_Name'];
    //Call create order function
    echo "createUserOrder('".$order_number."','".$order_date."','".$order_type."','".$user_name."');";
    foreach ($order as $subOrder){
      //Call append to order function
      $order_number =$subOrder['Order_Number'];
      $part_name =$subOrder['Part_Name'];
      $part_number =$subOrder['Part_Number'];
      $status =$subOrder['Status'];
      $quantity =$subOrder['Quantity'];
      echo "appendToUserOrder('".$order_number."','".$part_name."','".$part_number."','".$status."','".$quantity."');";
    }
  }
           
        
        }

    }
    
    catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
  }

  

     
    ?>
    