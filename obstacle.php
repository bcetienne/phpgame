<?php
    session_start();
    unset($_SESSION["phpgame"]);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perdu</title>
</head>
<body>
<img src="./pas-de-chance.png" alt="Perdu, pas de chance">
<form action="./src/reset.php" method="POST">
    <input type="hidden" value="on">
    <input type="submit" value="Retour au menu">
</form>
</body>
</html>
