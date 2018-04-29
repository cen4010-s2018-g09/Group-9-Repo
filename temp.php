            
$items = [];
$orders = [];
$first = true;
$order_number_temp = "";
for($i=0;$i<count($result);$i++)
{
    
    
    $row = $result[$i];

    $order_number =$row['Account_Number'];

    if ($order_number_temp != $order_number)
    {   
        if ($i+1==count($result)){
            array_push($orders,$items);
            $items = [];
            array_push($items,$row);
        }
            
        if ($first != true )
            {
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

  for($i=0;$i<count($orders);$i++){

        $name =$orders[$i][0]['Order_Number'];
        $accNumber =$orders[$i][0]['Order_Date'];
        $email  =$orders[$i][0]['Order_Type'];
        $type =$orders[$i][0]['User_Name'];
        $college =$orders[$i][0]["College"];


                
    //Call create order function
    echo "createProfile('".$name."','".$accNumber."','".$email."','".$type."','".$email."','".$type."','".$college."');";
    for($j=0;$j<count($orders[$i]);$j++){
      //Call append to order function
        $class =$orders[$i][0]["Class"];
        $crn =$orders[$i][0]["Class_crn"];
        $class_number =$orders[$i][0]["Class_Number"];
        $class_name =$orders[$i][0]["Class_Name"];
        $department =$orders[$i][0]["Department"];
      echo "appendToProfile('".$class."','".$crn."','".$class_number."','".$class_name."','".$department."');";
    }
  }
           
     