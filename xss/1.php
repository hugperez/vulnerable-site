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
<h1>XSS - niveau 1</h1>
<a href="/index.php">Accueil</a>
<a href="2.php">Niveau 2</a>
</div>

<div class="content">
<form class="login-form" action="" method="GET">
<label for="recherche">Recherche :</label>
<input type="text" id="recherche" name="recherche">

<input type="submit" value="Rechercher" class="btn">
</form>

<?php
if (isset($_GET['recherche'])) {
    echo "<p> Résultat(s) pour '".$_GET['recherche']."'- 0 résultat </p>";
}
?>
</div>

</body>
</html>