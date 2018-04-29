

<?php
session_start();

      $servername = "localhost";
      if(isset($_SESSION["accNumber"])){
      $userID = $_SESSION["accNumber"];
      try{
    
        $username= "CEN4010_S2018g09";
        $password= "cen4010_s2018";
        $conn = new
        PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM Inventory "); 
        $stmt->execute();
        $flag=$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchALL();
        }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();}

        if(count($result)==0){
            $link = "signin.php";
            echo "<script>window.location = '$link'; </script>";
        }
    }else
    {
        $link = "signin.php";
            echo "<script>window.location = '$link'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New Item</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="mycss/home.css" rel="stylesheet">
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand fixed-top logoNav">
  <div class="container">
      <img src="images/HNLogo5.png" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
       
        <li class="nav-item">
                <span id="cart-bubble" class="notify-bubble">0</span>
                <img src="images/SC2.png" width="30px" height="30px" alt="">
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signin.php">Log Out</a>
        </li>

      </ul>
    </div>
  </div>
</nav>   

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top fixed-top-2">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item active">
              <a class="nav-link" href="inventory.php">Inventory </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="#">Job Requests </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="#">Orders </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="#">Vendors </a>
            </li>

            <li class="nav-item active">
                    <a class="nav-link" href="#">Profiles </a>
            </li>
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    <!-- Page Content -->
    <div class="home">
    <div >
        <div class="row">
        <div class="col-2">
            <div class="nav flex-column nav-pills d-none d-sm-block" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link sideBar"  href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Add New Profile</a>
                <a class="nav-link sideBar" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Request New Item</a>
                <a class="nav-link sideBar" href="newItem.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Add New Item</a>
                <a class="nav-link sideBar" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Create New Kit</a>
                <a class="nav-link sideBar" href="#v-pills-vendor" role="tab" aria-controls="v-pills-vendor" aria-selected="false">Add New Vendor</a>
            </div>
        </div>
        <div class="col-5">
            
           
            <h1>View cart</h1> 
<a href="index.php?page=Inventory">Go back to products page</a> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM Inventory WHERE part_number IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $query=mysql_query($sql); 
                    $totalprice=0; 
                    while($row=mysql_fetch_array($query)){ 
                        $subtotal=$_SESSION['cart'][$row['part_number']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><?php echo $row['part_name'] ?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['part_number'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['part_number']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['price'] ?>$</td> 
                            <td><?php echo $_SESSION['cart'][$row['part_number']]['quantity']*$row['price'] ?>$</td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To remove an item, set it's quantity to 0. </p>
            
            
            
            
            
            
        </div>
            
            
            
            
            </div>
      </div>
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php
$servername = "localhost";
if(isset($_POST['SubmitButton'])){
  $_SESSION["part_number"] = $_POST['part_number']; 
  $_SESSION["part_name"] = $_POST['part_name'];
  $_SESSION["vendor"] = $_POST['vendor'];
  $_SESSION["price"] = $_POST['price'];
  $_SESSION["quantity"] = $_POST['quantity'];
  $_SESSION["description"] = $_POST['description'];

  $part_number =$_SESSION["part_number"];
  $part_name =$_SESSION["part_name"];
  $vendor =$_SESSION["vendor"];
  $price =$_SESSION["price"];
  $quantity =$_SESSION["quantity"];
  $description =$_SESSION["description"];

try{

  $username= "CEN4010_S2018g09";
  $password= "cen4010_s2018";
  $conn = new
  PDO("mysql:host=$servername;dbname=CEN4010_S2018g09",trim($username),trim($password));
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "insert into Inventory values ('$part_number','$part_name','NA','NA','$vendor','$quantity','$price','NA','$description')";
    $conn->exec($sql);
  echo '<script>window.location = "itemDetails.php";</script>';
  



}
catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}}
?>



