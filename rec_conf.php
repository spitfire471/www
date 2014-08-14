<?php
session_start();
include 'functions.php';
if (isset ($_POST["row"])){
$csvarray=read_from_file();
$csvarray[$_POST["row"]][0]=$_POST["id"];
$csvarray[$_POST["row"]][1]=$_POST["marka"];
$csvarray[$_POST["row"]][2]=$_POST["model"];
$csvarray[$_POST["row"]][3]=$_POST["rik"];
$fp = fopen('data2.csv', 'a');
	foreach ($csvarray as $fields) {
		fputcsv($fp, $fields);
	}
fclose($fp);
unlink('data.csv');
rename('data2.csv', 'data.csv');
var_dump($csvarray);
echo "Record changed";
echo "</br>";
echo '<center><a href="main.php">main</a></center>';

}
else {
$id=$_POST["id"];
$marka=$_POST["marka"];
$model=$_POST["model"];
$rik=$_POST["rik"];
$data=array("$id,$marka,$model,$rik");
$file = fopen('data.csv', 'a');
foreach ($data as $fields) {
    fputcsv($file,split(',', $fields));
}
fclose($file);
echo "Record aded";

echo '<center><a href="main.php">main</a></center>';
}
?>
