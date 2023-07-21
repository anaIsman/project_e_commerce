<?php
error_reporting(-1);
require_once("../src/php/utils/cnx.database.php");
require("../src/php/utils/function.php");

// Si l'utilisateur est connécté et a déja un compte alors je le redirige vers la page d'accueil, sinon je le redirige vers la page connexion.

if (isConnected()) {
    header("Location: ../src/home/login.php");
} else {
    header("Location: ../src/login/login.php");
}
