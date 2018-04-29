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
  
  //Connect to RequestedItems Table
  if($status =='')
  $stmt = $conn->prepare("SELECT * FROM RequestedItems ORDER BY Request_Number DESC"); 
  else
  $stmt = $conn->prepare("SELECT * FROM RequestedItems WHERE Status = '$status' ORDER BY Request_Number DESC"); 
  $stmt->execute();
  $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchALL();

  if(count($result)>0)
  {
      
$items = [];
$requests = [];
$first = 1;

$request_number_temp = "";
for($i=0;$i<count($result);$i++)
{

$row = $result[$i];

$request_number =$row['Request_Number'];

if ($request_number_temp != $request_number)
{   

  if ($i+1==count($result)){
      if ($i == 0)
        array_push($items,$row);
      array_push($requests,$items);
      $items = [];
      array_push($items,$row);
  }

  if ($first != 1 )
      {
        
          array_push($requests,$items);
                
      }
  $items = [];
  $first = 0;

}
elseif($i+1==count($result)){
    array_push($items,$row);
    array_push($requests,$items);
}
$request_number_temp = $request_number;
array_push($items,$row);



}


for($i=0;$i<count($requests);$i++){

  $request_number =$requests[$i][0]['Request_Number'];
  $request_date =$requests[$i][0]['Request_Date'];
  $user_name =$requests[$i][0]['User_Name'];
//Call create request function
echo "<script>createRequest('".$request_number."','".$request_date."','".$user_name."');</script>";
for($j=0;$j<count($requests[$i]);$j++){
//Call append to request function
$request_number =$requests[$i][$j]['Request_Number'];
$part_name =$requests[$i][$j]['Part_Name'];
$part_number =$requests[$i][$j]['Part_Number'];
$status =$requests[$i][$j]['Status'];
$quantity =$requests[$i][$j]['Quantity'];
$comments =$requests[$i][$j]['Comments'];
echo "<script>appendToRequest('".$request_number."','".$part_name."','".$part_number."','".$status."','".$quantity."');</script>";
}
}
     
  
  }

}

catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}




      
?>