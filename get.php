<?php
include 'functions.php';
db_connect();
/*$query=mysql_query("SELECT * FROM users");
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
echo "all OK";*/

if (($handle = fopen("users.csv", "r")) !== FALSE) {
       $nn = 0;
       while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
           $c = count($data);
           for ($x=0;$x<$c;$x++) {
               $csvarray[$nn][$x] = $data[$x];
			}
           $nn++;
       }
fclose($handle);
}
var_dump ($csvarray);
$c=count($csvarray);
for ($x=0;$x<$c;$x++) {
	$name=$csvarray[$x][1];
	$pass=$csvarray[$x][2];
	$permission=(int) $csvarray[$x][3];
	$query=mysql_query("INSERT INTO users2 (name,pass,permission) VALUES ('$name','$pass','$permission')");
	echo "</br>";
	echo mysql_error();
}
header('Location: main.php');
exit;

?>