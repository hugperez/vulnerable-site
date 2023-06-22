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
<h1>SSRF</h1>
<a href="/index.php">Accueil</a>
</div>

<div class="content">
<form class="login-form" action="" method="GET">
<label for="url">URL :</label>
<input type="text" id="url" name="url" placeholder="https://google.fr">
<label> Essayer d'afficher le contenu de la page /server-status</label>
<input type="submit" value="url" class="btn">
</form>
</div>
<?php
if (isset($_GET['url'])) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_GET['url']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
}
?>

</body>
</html>