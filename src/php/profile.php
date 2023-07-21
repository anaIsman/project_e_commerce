<?php

error_reporting(-1);

require_once("../php/utils/cnx.database.php");
require("../php/utils/function.php");
isConnected();

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    echo json_encode(["success" => false, "error" => "Mauvaise méthode"]);
    die;
}

if (!isset($_POST["firstname"], $_POST["lastname"]) || empty(trim($_POST["firstname"])) || empty(trim($_POST["lastname"]))) {

    echo json_encode(["success" => false, "error" => "Données introuvables ou vides"]);
    die;
}

$update = '';

if (isset($_POST["password"]) && !empty(trim($_POST["password"]))) {

    $update = ", pwd = :pwd";

    $regex = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9]{8,12}$/";
    if (!preg_match($regex, $_POST["password"])) {
        echo json_encode(["success" => false, "error" => "Le mot de passe ne correspond pas au format"]);
        die;
    }
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
}


$stmt = $bdd->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, $update WHERE id = :id");

$stmt->bindValue(":firstname", $_POST["firstname"]);
$stmt->bindValue(":lastname", $_POST["lastname"]);
$stmt->bindValue(":id", $_SESSION["user_id"]);
if ($update != '') $stmt->bindValue(":pwd", $hash);
$req->execute(); // J'execute ma requete

// J'envoie une réponse avec un success true
echo json_encode(["success" => true]);
