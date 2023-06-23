<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/styles.css">
<title>Site vulnérable</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha256/0.9.0/sha256.min.js"></script>
<script>
    function hashPassword() {
      var passwordInput = document.getElementById('password');
      var hashedPassword = sha256(passwordInput.value);
      passwordInput.value = hashedPassword;
    }
    </script>
</head>
<body>

<div class="topnav">
<h1>Broken authentication - niveau 3</h1>
<a href="/index.php">Accueil</a>
<a href="2.php">Niveau 2</a>
</div>

<div class="content">
<form class="login-form" action="" method="POST" onsubmit="hashPassword()">
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

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $stmt = $conn->prepare("SELECT * FROM auth3 WHERE username = ? AND password = ?");
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

<pre> Suite à un audit de sécurité, on stock maintenant le hash sha256 du mot de passe.
Par exemple => admin:49a8d6398bc509eb098ae5f0bb590b7ed7ee8ed7ee2b9ee4f46c61b904811505
Avec ça aucun risque de contourné l'authentification, de plus le mot de passe fait 22 caractères...
</pre>
</div>

</body>
</html>