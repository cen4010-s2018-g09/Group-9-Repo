<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>"Login"</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="css/cover.css" type="text/css" rel="stylesheet"/>
    <link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php
$servername = "localhost";
try{
    $username= "CEN4010_S2018g09";
    $password= "cen4010_s2018";
    $conn = new
    PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    
    $uname = $_POST["uname"];
    $pwd = $_POST["pwd"];
    $_SESSION["uname"] = $uname;

    $stmt = $conn->prepare("SELECT * FROM Logins WHERE Username = '$uname' AND Password = '$pwd' "); 
    $stmt->execute();
    $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchALL();
    
    if(count($result)>0)
    {
        $row = $result[0];
        $accnumber = $row["Account_Number"];
        

        $_SESSION["accNumber"] = $accnumber;
        
        $stmt2 = $conn->prepare("SELECT * FROM Profiles WHERE Account_Number = '$accnumber' "); 
        $stmt2->execute();
        $flag2=$stmt2->setFetchMode(PDO::FETCH_ASSOC);
        $result2 = $stmt2->fetchALL();

        $row = $result2[0];
        $_SESSION["profile_type"] = $row["Profile_Type"];
        
        echo "You have logged in successfully"."<br>"."You are now being redirected to the Home Page";
        $link = "index.php";
        echo "<script>
        window.setTimeout(function(){ window.location = '$link'; },3000);
        </script>";
    }
    else{
        echo "There is no account matching the credentials entered."."<br>"."Try again.";
        $link = "signin.php";
        echo "<script>
        window.setTimeout(function(){ window.location = '$link'; },3000);
        </script>";
    }
    
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>
    

    
</body>    
</html>

