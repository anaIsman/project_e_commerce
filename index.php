<?php
error_reporting(-1);
// je vérifie si il y'a une session active = Null je demarre une session(les nombres des utilisateurs connecté)
if (session_status() === PHP_SESSION_NONE) {

    session_start();
    $_ENV['coucou'] = 'Ana';
}

require_once("php/utils/cnx.database.php");
require("php/utils/function.php");

// Si l'utilisateur est connécté et a déja un compte alors je le redirige vers la page d'accueil, sinon je le redirige vers la page connexion.

if (isConnected()) {
    header("Location: home");
} else {
    header("Location: login");
}
