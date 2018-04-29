<?php
session_start();
$servername = "localhost";
try{
    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
    $accnum = $_POST['accnum'];
    $pwd = $_POST['pwd'];
    //$pwd2 = $_POST['pwd2'];
    $netid = $_POST['netid'];

    $stmt = $conn->prepare("SELECT * FROM Profiles WHERE Account_Number = '$accnum' "); 
    $stmt->execute();
    $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchALL();

    if(count($result)>0)
    {
    $stmt2 = $conn->prepare("SELECT * FROM Logins WHERE Account_Number = '$accnum' "); 
    $stmt2->execute();
    $flag2=$stmt2->setFetchMode(PDO::FETCH_ASSOC);
    $result2 = $stmt2->fetchALL();
    if(count($result2)==0)
    {
    $sql = "insert into Logins values ('$netid','$pwd','$accnum');";
    $conn->exec($sql);
    echo "<script>alert('The account was created successfully');</script>";
    $link = "signin.php";
     echo "<script> 
    window.setTimeout(function(){ window.location = '$link'; },3000);
    </script>";
    }
    else{
        echo "<script>alert('Account already exists for this Z number');</script>";
        $link = "registration2.php";
        echo "<script>
        window.setTimeout(function(){ window.location = '$link'; },3000);
        </script>";
    }
}
    else
    {
        echo "<script>alert('This account was not found');</script>";
        $link = "registration2.php";
        echo "<script>
        window.setTimeout(function(){ window.location = '$link'; },3000);
        </script>";
    }
   
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>
    