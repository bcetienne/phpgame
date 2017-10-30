<?php
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Options de la partie</title>
  </head>
  <body>
    <form action="./src/saveOptions.php">
      <label>Nom de la partie :</label>
      <input required type="text" name="gameName">
      <label>Axe X :</label>
      <input required type="number" name="x" min="10" max="30">
      <label>Axe Y :</label>
      <input required type="number" name="y" min="10" max="30">
      <input type="submit" name="sendBtn" value="Send">
    </form>
  </body>
</html>
