<?php
class Myclass {


function read_from_file($fname){
	if (($handle = fopen( $fname, "r")) !== FALSE) {
       $nn = 0;
       while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
           $c = count($data);
           for ($x=0;$x<$c;$x++) {
               $csvarray[$nn][$x] = $data[$x];
			}
           $nn++;
       }
fclose($handle);
//return ($csvarray);
var_dump($csvarray);
	}
	}
}
$data=new myClass();
$data->read_from_file("data.csv");
?>