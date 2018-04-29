<?php
session_start();
    $_SESSION["vendor_name"] = $_COOKIE["name"];

    echo '<script>window.location = "vendorDetails.php";</script>';

?>