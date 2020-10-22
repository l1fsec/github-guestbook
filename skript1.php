<!DOCTYPE html>
<?php session_start();
header('Location: index.php');
  ?>
<html>
<head>
	<title>Příspěvek vložen!</title>
	<style type="text/css">
		body {text-align: center;}
	</style>
</head>
<body>
<h1> Příspěvek vložen! </h1>

<?php

	$mysqli = new mysqli("localhost", "root", "", "guestbook");
    $hodnoceni = $_POST["hodnoceni"];
    $text = $_POST["text"];
    $jmeno = $_SESSION["username"];
    $sql = "INSERT INTO gbook (hodnoceni, text_zpravy, jmeno) VALUES ('$hodnoceni', '$text', '$jmeno');";
    $mysqli->query($sql);
 
?>
</body>
</html>
