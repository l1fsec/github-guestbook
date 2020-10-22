<?php
 session_start();
  $_SESSION["username"] = $_POST["username"];
if ($_SESSION["username"] == "admin") {
	header('Location: admin.php');
	exit();
}

 header('Location: index.php');
 $_SESSION['loggedin'] = 1;


 exit();



?>