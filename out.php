<?php
session_start();
unset ($_SESSION["name"]);
unset ($_SESSION["pass"]);
echo "</br>";
echo '<center><a href="auth.php">Back to authorization</a></center>';
echo "</br>";
?>