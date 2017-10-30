<?php
    session_start();

    if ($_POST["direction"] == "UP"){
        if (($_SESSION["posPlayer"]["y"] - 1) > 0){
            $_SESSION["posPlayer"]["y"] --;
            header("Location: ../game.php");
            } else {
            var_dump("Impossible d'aller vers le haut");
        }
    } elseif ($_POST["direction"] == "DOWN"){
        if ($_SESSION["posPlayer"]["y"] + 1 <= $_SESSION["phpgame"]["axes"]["x"]){
            $_SESSION["posPlayer"]["y"]++;
            header("Location: ../game.php");
        } else {
            var_dump("Impossible d'aller vers le bas");
        }
    } elseif ($_POST["direction"] == "RIGHT") {
        if ($_SESSION["posPlayer"]["x"] + 1 <= $_SESSION["phpgame"]["axes"]["x"]){
            $_SESSION["posPlayer"]["x"]++;
            header("Location: ../game.php");
        } else {
            var_dump("Impossible d'aller vers la droite");
        }
    } elseif ($_POST["direction"] == "LEFT") {
        if (($_SESSION["posPlayer"]["x"] - 1) > 0){
            $_SESSION["posPlayer"]["x"]--;
            header("Location: ../game.php");
        } else {
            var_dump("Impossible d'aller vers la gauche");
        }
    }