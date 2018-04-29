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
  
  //Connect to jrequests Table
  if($status =='')
  $stmt = $conn->prepare("SELECT * FROM JobRequests ORDER BY Job_Number DESC"); 
  else
  $stmt = $conn->prepare("SELECT * FROM JobRequests WHERE Status = '$status' ORDER BY Job_Number DESC"); 
  $stmt->execute();
  $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchALL();

  if(count($result)>0)
  {
      
    for($i=0;$i<count($result);$i++)
    {
    
        $row = $result[$i];


        $job_number =$row['Job_Number'];
        $job_date =$row['Job_Date'];
        $job_type =$row['Job_Type'];
        $user_name =$row['User_Name'];
        $comments=$row['Comments'];
        $file=$row['File_One'];
        $job_status=$row['Status'];
    //Call create job request function
    echo "createJobRequest('".$job_number."','".$job_date."','".$job_type."','".$user_name."','".$comments."','".$file."','".$job_status."');";

    
      }
               
       
  
  }

}

catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}




      
?>