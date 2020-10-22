<!DOCTYPE html>
<?php session_start(); 
if (!isset($_SESSION["loggedin"])) {
        $_SESSION["loggedin"] = 0;
    }
     ?>
<html>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
	<meta charset="utf-8">
	<title>Kniha návštěv</title>
	<style type="text/css">
		body {text-align: center;}
	</style>
</head>
<body>
	<h1> Návštěvní kniha </h1>
	<p> Zde je návštěvní kniha </p>

	<?php 
	if($_SESSION["loggedin"] == 0) {
		echo '<p style="color: red;">Pouze pro přihlášené<a style="color: blue;" href="prihlaseni.php">Přihlásit se</a></p>';
		}else{ 
			echo '<form method="POST" action="skript1.php">
		<label for="Hvezdy">Hodnocení:</label>
        <select id="hodnoceni" name="hodnoceni">
             <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
		<label for="text">Zadejte text:</label>
		<input type="text" name="text"><br>
		<label for="Odeslat"></label>
		<input type="submit" name="submit"><br>
	</form>'; } ?>
	
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guestbook";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Připojení se nezdařilo: " . $conn->connect_error);
}
$sql = "SELECT hodnoceni, text_zpravy, jmeno, datum FROM gbook";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo  $row["jmeno"];echo " ("; echo  $row[ "datum"];echo ")";echo "<br>"."Text zprávy:" ."<br>". $row["text_zpravy"] ."<br>". "Hodnoceni:"; for($i = 0; $i < $row["hodnoceni"]; $i++){ echo "<i class='fas fa-star'></i>";} echo "<br>"; echo "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>