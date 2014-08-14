<?php
function db_connect(){
$dblocation = "127.0.0.1";
$dbname = "web";
$dbuser = "root";
$dbpasswd = "slava";
$dbcnx = mysql_connect($dblocation, $dbuser, $dbpasswd);
if (!$dbcnx){
	echo "Не доступен сервер mySQL";
	exit();
}
if (!mysql_select_db($dbname,$dbcnx)){
	echo "Не доступна база данных";
	exit();
}

}

function read_from_file(){
if (($handle = fopen("data.csv", "r")) !== FALSE) {
       $nn = 0;
       while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
           $c = count($data);
           for ($x=0;$x<$c;$x++) {
               $csvarray[$nn][$x] = $data[$x];
			}
           $nn++;
       }
fclose($handle);
return ($csvarray);
}
}
function delete_record($id){
$csvarray=read_from_file();
$c=count($csvarray);
for ($x=0;$x<$c;$x++) {
	$key = array_search($id, $csvarray[$x]);
	if ($key !== FALSE){
		unset ($csvarray[$x]);
		$fp = fopen('data2.csv', 'a');
			foreach ($csvarray as $fields) {
				fputcsv($fp, $fields);
			}
			fclose($fp);
			unlink('data.csv');
			rename('data2.csv', 'data.csv');
	}
}
}

function edit_record($id){
$csvarray=read_from_file();
$c=count($csvarray);
for ($x=0;$x<$c;$x++) {
	$key = array_search($id, $csvarray[$x]);
	if ($key !== FALSE){
		$rec=array($x,$csvarray[$x][0],$csvarray[$x][1],$csvarray[$x][2],$csvarray[$x][3]);
	}
}
return ($rec);
}

?>
