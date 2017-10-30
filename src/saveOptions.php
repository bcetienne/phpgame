<?php
    session_start();
    unset($_SESSION["phpgame"]);
    $options =  [
        "gameName" => $_GET["gameName"],
        "axes" => [
            "x" => $_GET["x"],
            "y" => $_GET["y"],
        ],
        "victory" => [
            "x" => rand(2, $_GET["x"]),
            "y" => rand(2, $_GET["y"]),
        ],
        "obstacle" => [
            "x" => rand(2, $_GET["x"]),
            "y" => rand(2, $_GET["y"]),
        ],
    ];
    $_SESSION["phpgame"] = $options;
    header("Location: ../index.php");
