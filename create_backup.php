<?php
include 'functions.php';
db_connect();
$query=mysql_query("SELECT * FROM users");
while ($row=mysql_fetch_array($query)){
	$id=$row["id"];
	$name=$row["name"];
	$pass=$row["pass"];
	$permission=$row["permission"];
	$data=array("$id,$name,$pass,$permission");
	$file = fopen('users.csv', 'a');
	foreach ($data as $fields) {
		fputcsv($file,split(',', $fields));
	}
	fclose($file);
}
echo "Backup created";
header("Refresh: 7; url=users.php");

?>