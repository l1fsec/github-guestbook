<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guestbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT hodnoceni, text_zpravy FROM gbook";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Hodnoceni: " . $row["hodnoceni"]. " Text zprávy: " . $row["text_zpravy"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
	
</body>
</html>