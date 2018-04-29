<?php

session_start();

$servername = "localhost";
$userID = $_SESSION["accNumber"];
try{

  $username= "CEN4010_S2018g09";
  $password= "cen4010_s2018";
  $conn = new
  PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
  //Connect to Kits Table
  
  $stmt = $conn->prepare("SELECT * FROM Kits ORDER BY Kit_Number DESC");  
  $stmt->execute();
  $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchALL();

  if(count($result)>0)
  {
      
$items = [];
$kits = [];
$first = 1;

$kit_number_temp = "";
for($i=0;$i<count($result);$i++)
{

$row = $result[$i];

$kit_number =$row['Kit_Number'];

if ($kit_number_temp != $kit_number)
{   

  if ($i+1==count($result)){
      if ($i == 0)
        array_push($items,$row);
      array_push($kits,$items);
      $items = [];
      array_push($items,$row);
  }

  if ($first != 1 )
      {
        
          array_push($kits,$items);
                
      }
  $items = [];
  $first = 0;

}
elseif($i+1==count($result)){
    array_push($items,$row);
    array_push($kits,$items);
}
$kit_number_temp = $kit_number;
array_push($items,$row);



}


for($i=0;$i<count($kits);$i++){

  $kit_name =$kits[$i][0]['Kit_Name'];
  $kit_number =$kits[$i][0]['Kit_Number'];
  $class =$kits[$i][0]['Class_For_Kit'];
//Call create kit function
echo "<script>createKit('".$kit_number."','".$kit_name."','".$class."');</script>";
for($j=0;$j<count($kits[$i]);$j++){
//Call append to kit function
$kit_number =$kits[$i][$j]['Kit_Number'];
$part_name =$kits[$i][$j]['Part_Name'];
$part_number =$kits[$i][$j]['Part_Number'];
$quantity =$kits[$i][$j]['Quantity_In_Kit'];
echo "<script>appendToKit('".$kit_number."','".$part_name."','".$part_number."','".$quantity."');</script>";
}
}
     
  
  }

}

catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}




      
?>