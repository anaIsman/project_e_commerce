<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "project-e-commerce"; // le nom de ma base de donnée.
try {
    // connexion avec ma base de données, et configuration du mode d'errror pour PDO.
    $bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $bdd;
} catch (ErrorException $e) {
    $message = "Erreur PDO avec le message : " . $e->getMessage();
    die($message);
}
