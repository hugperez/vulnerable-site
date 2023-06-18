<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="styles.css">
<title>Site vulnérable</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="topnav">
  <h1>Site vulnérable</h1>
</div>

<div class="content">
<a class="btn" href="auth/1.php"> Broken authentication</a>
<a class="btn" href="acc/1.php?sessionid=120984"> Broken access control</a>
<a class="btn" href="lfi/1.php"> LFI</a>
<a class="btn" href="xss/1.php"> XSS</a>
  <a class="btn" href="sqli/1.php"> Injection SQL</a>
  <!-- <a class="btn" href="33a2838ab91f7f01a24da38cb55cae10.php"> Secret</a> --> 


  <a class="btn" style="margin-top: 100px;" href="wordlist.zip"> Télécharger la wordlist</a>
  <p> Bonus : trouver les 5 secrets cachés sur le site</p>
</div>



</body>
</html>