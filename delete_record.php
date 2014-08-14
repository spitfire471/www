<?php
session_start();
include 'functions.php';
delete_record($_GET["id"]);
echo "Record deleted";
echo "</br>";
echo '<center><a href="main.php">main</a></center>';
header("Refresh: 7; url=main.php");
?>