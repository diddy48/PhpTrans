<?php
session_start();
$link = "10.0.1.252";
$db_name="5ib21";
$db_username = "5ib21";
$db_password = "5ib21";
$conn =new mysqli($link, $db_username, $db_password, $db_name); 
if (!$conn) {
    die("impossibile connettersi: " . mysqli_connect_error());
}
?>
