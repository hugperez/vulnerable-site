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
<h1>Command injection - niveau 2</h1>
<a href="/index.php">Accueil</a>
<a href="1.php">Niveau 1</a>
</div>

<div class="content">
<form class="login-form" action="" method="POST">
<label for="host">Hostname :</label>
<input type="text" id="host" name="host" placeholder="google.fr">
<label> Tester la connexion du serveur v2</label>
<input type="submit" value="Ping !" class="btn">
</form>
<pre>
<?php
    if (isset($_REQUEST['host']) && $_REQUEST['host'] !== "") {
        if (strstr($_REQUEST['host'], ';')) {
            $result = "Attaque detectée !";
        } else {
            $cmd = 'ping -c 4 "'.$_POST['host'].'" 2>&1';
            $result = system($cmd);
        }
        echo $result;
    }
?>
</pre>
</div>

</body>
</html>