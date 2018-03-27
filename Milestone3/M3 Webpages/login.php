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
    
    $stmt = $conn->prepare("SELECT * FROM Logins WHERE Username = '$uname' AND Password = '$pwd' "); 
    $stmt->execute();
    $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchALL();
    
    if(count($result)>0)
    {
        $row = $result[0];
        $accnumber = $row["Account_Number"];
        
        $_SESSION["uname"] = $uname;
        $_SESSION["pwd"] = $pwd;
        $_SESSION["accNumber"] = $accnumber;

        
        echo "You have logged in successfully"."<br>"."You are now being redirected to the Home Page";
        $link = "index.php";
        echo "<script>
        window.setTimeout(function(){ window.location = '$link'; },3000);
        </script>";
    }
    else{
        echo "There is no account matching the credentials entered."."<br>"."Try again.";
        $link = "http://lamp.eng.fau.edu/~CEN4010_S2018g09/";
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

