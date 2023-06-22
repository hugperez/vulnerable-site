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
<h1>File upload</h1>
<a href="/index.php">Accueil</a>
</div>

<div class="content">
<form class="login-form" action="" method="POST" enctype="multipart/form-data">
<label for="host">Inclure un fichier (.txt)</label>
<input type="file" id="host" class="file" name="file" accept=".txt" placeholder="">
<input type="submit" value="Upload" class="btn">
</form>
<pre>
<?php
    if (isset($_FILES['file'])) {
        $dir="/var/www/html/upload";
        $name = basename($_FILES['file']['name']);
        $parts = explode(".", $name);
        if ($parts[count($parts) - 1] === 'php') {
            $error = "Invalid extension";
        }
        if (!isset($error) && !is_dir($dir)) {
            mkdir($dir, 0700);
        }
        if (!isset($error) && !move_uploaded_file($_FILES['file']['tmp_name'], $dir . '/' . $name)) {
            $error = "Error while uploading file";
        } else {
            echo 'Le fichier a été uploadé avec succès. <a href="/upload/'.$name.'">Clique-ici </a>';
        }
    }
?>
</pre>
</div>

</body>
</html>