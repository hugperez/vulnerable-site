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
<h1>Broken authentication - niveau 1</h1>
<a href="/index.php">Accueil</a>
<a href="2.php">Niveau 2</a>
</div>

<div class="content">
<form class="login-form" action="" method="GET">
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

if (isset($_GET['username']) && isset($_GET['password'])) {
  $username = $_GET["username"];
  $password = $_GET["password"];
  
  $stmt = $conn->prepare("SELECT * FROM auth1 WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows == 1) {
    echo '<label class="success">Bravo !</label>';
  } else {
    echo '<label class="error">Identifiants invalides. Veuillez réessayer.</label>';
  }
  $stmt->close();
}

$conn->close();
?>

<input type="submit" value="Se connecter" class="btn">
</form>
</div>

</body>
</html>