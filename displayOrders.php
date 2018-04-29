<?php

session_start();

$servername = "localhost";
$userID = $_SESSION["accNumber"];
$status = $_POST['status'];
try{

  $username= "CEN4010_S2018g09";
  $password= "cen4010_s2018";
  $conn = new
  PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
  //Connect to Orders Table
  if($status =='')
  $stmt = $conn->prepare("SELECT * FROM Orders ORDER BY Order_Number DESC"); 
  else
  $stmt = $conn->prepare("SELECT * FROM Orders WHERE Status = '$status' ORDER BY Order_Number DESC"); 
  $stmt->execute();
  $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchALL();

  if(count($result)>0)
  {
      
$items = [];
$orders = [];
$first = 1;

$order_number_temp = "";
for($i=0;$i<count($result);$i++)
{

$row = $result[$i];

$order_number =$row['Order_Number'];

if ($order_number_temp != $order_number)
{   

  if ($i+1==count($result)){
      if ($i == 0)
        array_push($items,$row);
      array_push($orders,$items);
      $items = [];
      array_push($items,$row);
  }

  if ($first != 1 )
      {
        
          array_push($orders,$items);
                
      }
  $items = [];
  $first = 0;

}
elseif($i+1==count($result)){
    array_push($items,$row);
    array_push($orders,$items);
}
$order_number_temp = $order_number;
array_push($items,$row);



}


for($i=0;$i<count($orders);$i++){

  $order_number =$orders[$i][0]['Order_Number'];
  $order_date =$orders[$i][0]['Order_Date'];
  $order_type =$orders[$i][0]['Order_Type'];
  $user_name =$orders[$i][0]['User_Name'];
//Call create order function
echo "<script>createOrder('".$order_number."','".$order_date."','".$order_type."','".$user_name."');</script>";
for($j=0;$j<count($orders[$i]);$j++){
//Call append to order function
$order_number =$orders[$i][$j]['Order_Number'];
$part_name =$orders[$i][$j]['Part_Name'];
$part_number =$orders[$i][$j]['Part_Number'];
$status =$orders[$i][$j]['Status'];
$quantity =$orders[$i][$j]['Quantity'];
echo "<script>appendToOrder('".$order_number."','".$part_name."','".$part_number."','".$status."','".$quantity."');</script>";
}
}
     
  
  }

}

catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}




      
?>