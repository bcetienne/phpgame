<?php
    session_start();
    /**
     * @param $x integer
     * @param $y integer
     * @return string
     */
    function displayCase($x, $y)
    {
        return "<div style='border:2px solid black; width:20px; height:20px; background-color: black'><span style='font-size:6px;'></span></div>";
    }

    /**
     * @param $x integer
     * @param $y integer
     * @return string
     */
    function displayObject($x, $y)
    {
        return "<div style='border:2px solid black; width:20px; background-color: black; height:20px;'><img style='width: 100%;' src='http://bit.ly/2gMpZd0' alt=''></div>";
    }

    /**
     * @param $x integer
     * @param $y integer
     * @return string
     */
    function displayTarget($x, $y)
    {
        return "<div style='border:2px solid black; width:20px; height:20px; background-color: black'><img style='width: 100%;' src='./10107-full.gif' alt=''></div>";
    }

    /**
     * @param $x int
     * @param $y int
     * @return string
     */
    function displayObstacle($x, $y)
    {
        return "<div style='border:2px solid black; width:20px; height:20px; background-color: black'><img style='width: 100%;' src='./triggereed.gif' alt=''></div>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['phpgame']['gameName'] ?></title>
</head>
<!--Pour la multiplication, prend en compte la width du carré et des deux bords (ici un width à 20px et des bords à 2px)-->
<body style="display:flex;width:<?php echo($_SESSION['phpgame']['axes']['x'] * 24) ?>px;flex-wrap:wrap;">
<?php
    // for qui itere sur chacun des elements d'axe Y
    for ($y = 1; $y <= $_SESSION['phpgame']['axes']['y']; $y++) {
        // for qui itere sur chacun des elements d'axe X
        for ($x = 1; $x <= $_SESSION['phpgame']['axes']['x']; $x++) {
            // Si le joueur n'a jamais ete place sur cette partie
            if (!isset($_SESSION['posPlayer'])) {
                // Si la position actuelle du generateur de plateau est a x1, y1
                if ($y == 1 && $x == 1) {
                    // Je stocke la position du joueur en session
                    $_SESSION['posPlayer'] = array(
                        "x" => $x,
                        "y" => $y,
                    );
                    // Affiche l'emplacement du joueur
                    echo displayObject($x, $y);
                } else {
                    // Si le joueur n'existe pas mais que ça n'est pas sa position, afficher un carre neutre sur le plateau
                    echo displayCase($x, $y);
                }
                // Si le joueur est deja stockee en session, et que sa position correspond a la position actuelle du generateur
            } else if ($y == $_SESSION['posPlayer']['y'] && $x == $_SESSION['posPlayer']['x']) {
                // Affiche l'emplacement du joueur
                echo displayObject($x, $y);
            } else {
                // Afficher une case qui contient une image de victoire
                if ($x == $_SESSION["phpgame"]["victory"]["x"] && $y == $_SESSION["phpgame"]["victory"]["y"]) {
                    echo displayTarget($x, $y);
                    // Affiche une case qui contient un obstacle
                } else if ($x == $_SESSION["phpgame"]["obstacle"]["x"] && $y == $_SESSION["phpgame"]["obstacle"]["y"]) {
                    echo displayObstacle($x, $y);
                } else {
                    // Affiche une case neutre
                    echo displayCase($x, $y);
                }
            }
        }
    }
    if ($_SESSION["phpgame"]["victory"]["x"] == $_SESSION["posPlayer"]["x"] && $_SESSION["phpgame"]["victory"]["y"] == $_SESSION["posPlayer"]["y"]){
        echo '<form action="./src/reset.php" method="POST"><input type="hidden" value="on"><input type="submit" value="Recommencer"></form>';
        var_dump("Victoire");die;
    }
    if ($_SESSION["phpgame"]["obstacle"]["x"] == $_SESSION["posPlayer"]["x"] && $_SESSION["phpgame"]["obstacle"]["y"] == $_SESSION["posPlayer"]["y"]){
        echo '<form action="./src/reset.php" method="POST"><input type="hidden" value="on"><input type="submit" value="Recommencer"></form>';
        var_dump("Perdu");die;
    }
?>
<form action="./src/reset.php" method="POST">
    <input type="hidden" value="on">
    <input type="submit" value="Recommencer">
</form>
<form action="./src/move.php" method="POST">
    <input type="hidden" name="direction" value="UP">
    <input type="submit" name="directionUp" value="&#8593;">
</form>
<form action="./src/move.php" method="POST">
    <input type="hidden" name="direction" value="DOWN">
    <input type="submit" name="directionDown" value="&#8595;">
</form>
<form action="./src/move.php" method="POST">
    <input type="hidden" name="direction" value="LEFT">
    <input type="submit" name="directionLeft" value="&#8592;">
</form>
<form action="./src/move.php" method="POST">
    <input type="hidden" name="direction" value="RIGHT">
    <input type="submit" name="directionRight" value="&#8594;">
</form>

</body>
</html>
