<html>
<title>Add record</title>
<body>
<?php 
session_start();
include 'functions.php';
if (isset($_GET["id"])){
$rec=edit_record($_GET["id"]);
?>
<form action="rec_conf.php" method="post">
<input type="hidden" name="row" value="<?php =$rec[0]; ?>">
<input type="hidden" name="id" value="<?php =$rec[1]; ?>">
Marka: <input type="text" name="marka" value="<?php =$rec[2]; ?>">
Model: <input type="text" name="model" value="<?php =$rec[3]; ?>">
Rik: <input type="text" name="rik" value="<?php =$rec[4]; ?>">
<input type="submit" value="Change record">
</form>
</br>
<?php
}
else{	
echo $id=md5(microtime());
 ?>
<form action="rec_conf.php" method="post">
<input type="hidden" name="id" value="<?php  =$id; ?>">
Marka: <input type="text" name="marka">
Model: <input type="text" name="model">
Rik: <input type="text" name="rik">
<input type="submit" value="Create record">
</form>
</br>
<?php
}
?>
</body>
</html>
