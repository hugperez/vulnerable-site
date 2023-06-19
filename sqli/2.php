<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/styles.css">
<title>Site vulnérable</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="topnav">
  <h1>SQLi - niveau 2</h1>
  <a href="/index.php">Accueil</a>
  <a href="3.php">Niveau 3</a>
  <a href="1.php">Niveau 1</a>

</div>

<div class="content">
<form class="login-form" action="" method="POST">
<label for="username">Nom d'utilisateur :</label>
<input type="text" id="username" name="username">

<label for="password">Mot de passe :</label>
<input type="password" id="password" name="password">

<?php
$servername = "localhost";
$username = "user"; 
$password = "pass"; 
$dbname = "vuln";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $stmt = $conn->prepare("SELECT * FROM sql1 WHERE username = ? AND password = '$password'");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
        echo '<label class="success">Bravo !</label>';
  } else {
    echo '<label class="error">Identifiants invalides. Veuillez réessayer.</label>';
  }
}

$conn->close();
?>

<input type="submit" value="Se connecter" class="btn">
</form>
</div>

</body>
</html>