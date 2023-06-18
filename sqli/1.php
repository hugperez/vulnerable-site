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
  <h1>SQLi</h1>
  <a href="/index.php">Accueil</a>
  <a>Level 2</a>
</div>

<div class="content">
<form class="login-form" action="" method="POST">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Se connecter" class="btn">
  </form>
</div>

</body>
</html>