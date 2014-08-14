<html>
<title>User administration</title>
<body>
<?php
include 'functions.php';
header('Content-Type: text/html; charset=utf-8');
db_connect();
$ver = mysql_query("SELECT * FROM users");
?>
<table border="1">
<tr>
<th>User ID</th>
<th>User Name</th>
<th></th>
<th></th>
</tr>
<tr>
<?php
while ($row = mysql_fetch_assoc($ver)) {
if ($row["permission"]==1){
	$pos="delete super rights";
}
if ($row["permission"]==0){
	$pos="add super rights";
}

?>
<td><?php =$row["id"]; ?></td>
<td><?php =$row["name"]; ?>  </td>
<td><a href="delete_user.php?id=<?php echo $row["id"];?>&name=<?php echo $row["name"];?>">delete</a></td>
<td><a href="perm.php?id=<?php echo $row["id"];?>&name=<?php echo $row["name"];?>&id2=<?php echo $row["permission"];?>"><?php echo $pos; ?></a>  </td>
</tr>
<?php
}
?>

</table>
<a href="create_backup.php">Create backup</a>
<a href="add_user.php">Add user</a>
<center><a href="main.php">Main</a></center>
</body>
</html>
