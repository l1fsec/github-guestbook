<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>
<body>
	<h1> Vítej v admin panelu</h1>

	<p> Kliknutím si načti poslední příspěvky z DB.</p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guestbook";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Připojení se nezdařilo: " . $conn->connect_error);
}
$sql = "SELECT hodnoceni, text_zpravy, jmeno, id FROM gbook";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<div>Hodnoceni:</div>"; for($i = 0; $i < $row["hodnoceni"]; $i++){ echo "<i class='fas fa-star'></i>"; }echo "<br>".  "<div>Text zprávy:</div>". $row["text_zpravy"] ."<br>". "<div> Jmeno: </div>". $row["jmeno"] .
    "<div>ID:</div>".$row["id"] . "<form method='POST' action='delete.php'><button type='submit' name='idecko'value='".$row['id']." '>Odeslat</button></form>";
  }
} else {
  echo "0 results";
}
$conn->close();
  ?>


</body>
</html>
