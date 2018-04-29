<?php
session_start();
    $_SESSION["part_number"] = $_COOKIE["number"];

    echo '<script>window.location = "itemDetails.php";</script>';

?>