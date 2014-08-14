<?php
include 'functions.php';
db_connect();
$id=$_GET["id"];
$perm=$_GET["id2"];
if ($perm==0){
	$query = mysql_query("UPDATE users SET permission=1  WHERE id='$id'");
	$text=" super rights added";
}
if ($perm==1){
	$query = mysql_query("UPDATE users SET permission=0  WHERE id='$id'");
	$text="super rights deleted";
}
echo "User ".$_GET["name"].$text;
header("Refresh: 7; url=main.php");

?>