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
<h1>Broken access control</h1>
<a href="/index.php">Accueil</a>
</div>

<div class="content">

<?php

if (isset($_GET['sessionid']) && ($_GET['sessionid'] == "120984" || $_GET['sessionid'] == "120983")) {
  echo "<p> Bonjour '";
  if ($_GET['sessionid'] == "120984") {
    echo "John";
  } else {
    echo "SuperAdmin";
  }

  echo "' ! </p>";
} else {
  echo "<p> Le session ID est invalide !";
}
?>

</div>

</body>
</html>