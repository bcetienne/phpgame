<?php
  session_start();
  // Si phpgame existe déjà alors on emmène sur l'écran de jeu...
  if(isset($_SESSION["phpgame"])) {
    header("Location: game.php");
  // sinon, on envoie sur la page de paramétrage pour pouvoir jouer au jeu
  } else {
    header("Location: launchOptions.php");
  }
?>
