<?php
class DB{
public $dblocation = "127.0.0.1";
public $dbname = "web";
public $dbuser = "root";
public $dbpasswd = "slava";

function connect_DB(){
	$con = mysql_connect($this->dblocation, $this->dbuser, $this->dbpasswd);
	if (!$con){
		echo "MySQL server not connected";
		exit();
	}
	$sel = mysql_select_db($this->dbname,$con);
	if (!$sel){
		echo "Database not reached";
		exit();
	}	
}
function select_user_DB($name){
	self::connect_DB();
	$query = mysql_query("SELECT * FROM users WHERE name='$name'");
	$row = mysql_fetch_assoc($query);	
	var_dump($row);
}
}
	
$a= new DB();
$a->select_user_DB("slava");
?>
