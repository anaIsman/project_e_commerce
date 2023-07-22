<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "project-e-commerce";
try {
    // connexion avec ma base de données 
    $bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $bdd;
} catch (ErrorException $e) {
    $message = "Erreur PDO avec le message : " . $e->getMessage();
    die($message);
}
