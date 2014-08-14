<?php
include 'functions.php';
$id=$_GET["id"];

header('Content-Type: text/html; charset=utf-8');
db_connect();
$ver = mysql_query("DELETE FROM users where id='$id'");
if(!$ver)
{
echo "Ошибка в запросе". mysql_error(); 
exit();
}
echo "User ".$_GET["name"]." deleted";
header("Refresh: 7; url=users.php");
?>