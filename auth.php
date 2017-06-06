

<?php
session_start();
if(!isset($_SESSION["admin_flag"])){
header("Location: login.php");
exit(); }
?>
