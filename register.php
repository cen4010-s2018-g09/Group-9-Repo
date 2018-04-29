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

    $ptype = 'student';
    $fname = $_POST['fname'];
    $accnum = $_POST['accnum'];
    $ccrn = $_POST['ccrn'];
    $college = $_POST['college'];
    $department = $_POST['department'];
    $classabv = $_POST['classabv'];
    $classnum = $_POST['classnum'];
    $classname = $_POST['classname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $sql = "insert into Profiles values ('$fname','$accnum','$ccrn','$college','$department','$classabv','$classnum','$classname','$email','$ptype');";
    $conn->exec($sql);
    $sql = "insert into Logins values ('$fname','$pwd','$accnum');";
    $conn->exec($sql);
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>
    

    
</body>    
</html>