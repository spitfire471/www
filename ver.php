<html>
<body>
<title>User added</title>
<?php
$name=$_POST["name"];
$pass=md5($_POST["pass"]);
include 'functions.php';
db_connect();
$ver = mysql_query("SELECT * FROM users WHERE name='$name'");
$row = mysql_fetch_assoc($ver);
if ($name==$row["name"]){
	echo "Select other name. User with the same name already exist.";
	echo $row;
}
else{
$ver = mysql_query("INSERT INTO users (name, pass) VALUES ('$name', '$pass')");
echo "User ".$name." succsesfuly aded";
}
 ?>
 <center><a href="auth.php">Authorizatoin page</a></center>
 </body>
 </html>
 